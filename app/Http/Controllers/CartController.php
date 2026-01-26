<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();

        $subtotal = $cartItems->sum(fn ($item) => $item->price * $item->qty);
        $tax = $subtotal * 0.11;
        $deliveryFee = 35000;
        $discount = session('discount', 0);
        $total = $subtotal + $tax + $deliveryFee - $discount;

        return view('cart.cart', compact(
            'cartItems',
            'subtotal',
            'tax',
            'deliveryFee',
            'total'
        ));
    }

    public function add(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id'
        ]);

        $menu = Menu::findOrFail($request->menu_id);

        $cart = Cart::where('user_id', Auth::id())
            ->where('menu_id', $menu->id)
            ->first();

        if ($cart) {
            $cart->qty += 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'menu_id' => $menu->id,
                'name'    => $menu->name,
                'price'   => $menu->price,
                'image'   => $menu->image ?? 'https://via.placeholder.com/300',
                'qty'     => 1,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Menu ditambahkan ke cart');
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($request->action === 'increase') {
            $cart->qty++;
        }

        if ($request->action === 'decrease' && $cart->qty > 1) {
            $cart->qty--;
        }

        $cart->save();

        return redirect()->back();
    }

    public function remove($id)
    {
        Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return redirect()->route('cart.index');
    }

    public function applyCoupon(Request $request)
    {
        $coupons = [
            'MILKEY10' => 10000,
            'WELCOME20' => 20000,
            'SAVE50' => 50000,
        ];

        if (isset($coupons[$request->coupon_code])) {
            session(['discount' => $coupons[$request->coupon_code]]);
            return redirect()->route('cart.index')->with('success', 'Coupon applied');
        }

        return redirect()->route('cart.index')->with('error', 'Invalid coupon');
    }
}
