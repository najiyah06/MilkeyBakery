<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang masih kosong');
        }

        $subtotal = $cartItems->sum(fn ($item) => $item->price * $item->qty);
        $tax = $subtotal * 0.11;
        $deliveryFee = 0;
        $total = $subtotal + $tax + $deliveryFee;

        return view('checkout.checkout', compact(
            'cartItems',
            'subtotal',
            'tax',
            'deliveryFee',
            'total'
        ));
    }

    private function getSnapTokenDirect($params, $serverKey)
    {
        $url = 'https://app.sandbox.midtrans.com/snap/v1/transactions';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Basic ' . base64_encode($serverKey . ':')
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
        
        if ($error) {
            throw new \Exception('cURL Error: ' . $error);
        }
        
        if ($httpCode !== 201) {
            throw new \Exception('Midtrans API Error (HTTP ' . $httpCode . '): ' . $response);
        }
        
        $decoded = json_decode($response, true);
        
        if (!isset($decoded['token'])) {
            throw new \Exception('Invalid Midtrans response: ' . $response);
        }
        
        return $decoded['token'];
    }

    private function getDeliveryFeeByCity($city)
    {
        $fees = [
            'Tegalsari'     => 20000,
            'Genteng'       => 20000,
            'Gubeng'        => 20000,
            'Wonokromo'     => 20000,
            'Tambaksari'    => 20000,
            'Sawahan'       => 20000,
            'Rungkut'       => 25000,
            'Sukolilo'      => 25000,
            'Mulyorejo'     => 25000,
            'Gayungan'      => 25000,
            'Jambangan'     => 25000,
            'Kenjeran'      => 30000,
            'Tandes'        => 30000,
            'Dukuh Pakis'   => 30000,
            'Wiyung'        => 30000,
            'Benowo'        => 35000,
            'Lakarsantri'   => 35000,
        ];

        return $fees[$city] ?? 0;
    }

public function process(Request $request)
{
    try {
        Log::info('=== CHECKOUT STARTED ===');

        // ====================
        // VALIDATION
        // ====================
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'payment_method' => 'required|in:transfer,cod',
        ]);

        // ====================
        // GET CART
        // ====================
        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            // COD → redirect HTML
            if ($validated['payment_method'] === 'cod') {
                return redirect()->route('cart.index')
                    ->with('error', 'Cart masih kosong');
            }

            // TRANSFER → JSON (UNTUK MIDTRANS)
            return response()->json([
                'error' => true,
                'message' => 'Cart empty'
            ], 400);
        }

        // ====================
        // CALCULATE PRICE
        // ====================
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += ((int) $item->price * (int) $item->qty);
        }

        $tax = (int) round($subtotal * 0.11);
        $deliveryFee = $this->getDeliveryFeeByCity($validated['city']);
        $total = $subtotal + $tax + $deliveryFee;

        // ====================
        // ORDER CODE
        // ====================
        $orderCode = 'ORD' . time() . rand(100, 999);

        // ====================
        // CREATE ORDER
        // ====================
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_code' => $orderCode,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'postal_code' => $validated['postal_code'],
            'subtotal' => $subtotal,
            'tax' => $tax,
            'delivery_fee' => $deliveryFee,
            'total' => $total,
            'status' => 'pending',
            'payment_method' => $validated['payment_method'],
        ]);

        // ====================
        // SAVE ORDER ITEMS
        // ====================
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item->name,
                'price' => (int) $item->price,
                'qty' => (int) $item->qty,
                'subtotal' => (int) ($item->price * $item->qty),
            ]);
        }

        // ====================
        // COD FLOW (HTML REDIRECT)
        // ====================
        if ($validated['payment_method'] === 'cod') {
            Log::info('COD selected');

            Cart::where('user_id', Auth::id())->delete();

            // ⬅️ STRUK LANGSUNG
            return redirect()->route('orders.show', $order->id);
        }

        // ==================================================
        // MIDTRANS FLOW (ASLI PUNYAMU — TIDAK DIUBAH)
        // ==================================================
        Log::info('=== MIDTRANS PAYMENT ===');

        $serverKey = config('services.midtrans.server_key');

        if (empty($serverKey)) {
            throw new \Exception('Midtrans server key not configured');
        }

        // BUILD ITEMS
        $items = [];
        $counter = 1;

        foreach ($cartItems as $item) {
            $items[] = [
                'id' => 'ITEM' . $counter,
                'price' => (int) $item->price,
                'quantity' => (int) $item->qty,
                'name' => substr($item->name, 0, 50)
            ];
            $counter++;
        }

        // Tax
        $items[] = [
            'id' => 'TAX',
            'price' => $tax,
            'quantity' => 1,
            'name' => 'Tax 11%'
        ];

        // Delivery
        $items[] = [
            'id' => 'DELIVERY',
            'price' => $deliveryFee,
            'quantity' => 1,
            'name' => 'Delivery Fee'
        ];

        $params = [
            'transaction_details' => [
                'order_id' => $orderCode,
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
            ],
            'item_details' => $items
        ];

        // SNAP TOKEN
        $snapToken = $this->getSnapTokenDirect($params, $serverKey);

        // CLEAR CART
        Cart::where('user_id', Auth::id())->delete();

        return response()->json([
            'snapToken' => $snapToken,
            'order_id' => $order->id
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'error' => true,
            'message' => 'Validation failed',
            'errors' => $e->errors()
        ], 422);

    } catch (\Exception $e) {
        Log::error('CHECKOUT ERROR: ' . $e->getMessage());

        return response()->json([
            'error' => true,
            'message' => $e->getMessage()
        ], 500);
    }
}


    public function payment(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('checkout.payment', compact('order'));
    }

public function webhook(Request $request)
{
    $payload = $request->json()->all();
    $serverKey = config('services.midtrans.server_key');

    $signatureKey = hash(
        'sha512',
        $payload['order_id'] .
        $payload['status_code'] .
        $payload['gross_amount'] .
        $serverKey
    );

    if ($signatureKey !== $payload['signature_key']) {
        return response()->json(['message' => 'Invalid signature'], 403);
    }

    // SESUAIKAN DENGAN order_id SAAT CREATE TRANSAKSI
    $order = Order::where('order_code', $payload['order_id'])->first();

    if (!$order) {
        return response()->json(['message' => 'Order not found'], 404);
    }

    switch ($payload['transaction_status']) {
        case 'capture':
        case 'settlement':
            $order->update(['status' => 'paid']);
            break;

        case 'pending':
            $order->update(['status' => 'pending']);
            break;

        case 'expire':
        case 'cancel':
        case 'deny':
            $order->update(['status' => 'failed']);
            break;
    }

    return response()->json(['message' => 'OK']);
}

    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function showOrder(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items');

        return view('orders.show', compact('order'));
    }
}