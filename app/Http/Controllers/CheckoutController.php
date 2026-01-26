<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use App\Models\OrderItem;

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
        $deliveryFee = 35000;
        $total = $subtotal + $tax + $deliveryFee;

        return view('checkout.checkout', compact(
            'cartItems',
            'subtotal',
            'tax',
            'deliveryFee',
            'total'
        ));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'payment_method' => 'required|in:transfer,cod',
        ]);

        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang kosong');
        }

        $subtotal = $cartItems->sum(fn ($item) => $item->price * $item->qty);
        $tax = $subtotal * 0.11;
        $deliveryFee = 35000;
        $total = $subtotal + $tax + $deliveryFee;

        // ✅ CREATE ORDER
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_code' => 'ORDER-' . time(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'delivery_fee' => $deliveryFee,
            'total' => $total,
            'status' => 'pending',
        ]);

        // ✅ SAVE ORDER ITEMS
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item->name,
                'price' => $item->price,
                'qty' => $item->qty,
                'subtotal' => $item->price * $item->qty,
            ]);
        }

        // CONFIG MIDTRANS
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $order->order_code, // 🔗 link ke DB
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        // ✅ CLEAR CART
        Cart::where('user_id', Auth::id())->delete();

        return view('checkout.payment', compact('snapToken', 'total', 'order'));
    }

    public function webhook(Request $request)
    {
        $payload = $request->all();

        $serverKey = config('services.midtrans.server_key');

        $signatureKey = hash(
            'sha512',
            $payload['order_id'] .
            $payload['status_code'] .
            $payload['gross_amount'] .
            $serverKey
        );

        // VALIDASI SIGNATURE MIDTRANS
        if ($signatureKey !== $payload['signature_key']) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // CARI ORDER BERDASARKAN ORDER CODE
        $order = Order::where('order_code', $payload['order_id'])->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // STATUS DARI MIDTRANS
        $transactionStatus = $payload['transaction_status'];

        if (in_array($transactionStatus, ['capture', 'settlement'])) {
            $order->update(['status' => 'paid']);
        } elseif ($transactionStatus == 'pending') {
            $order->update(['status' => 'pending']);
        } elseif (in_array($transactionStatus, ['expire', 'cancel', 'deny'])) {
            $order->update(['status' => 'failed']);
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
        // Security: user cuma boleh lihat order sendiri
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items');

        return view('orders.show', compact('order'));
    }
}