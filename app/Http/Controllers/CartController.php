<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // tampilkan halaman cart
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // tambah barang ke cart
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;

        if (isset($cart[$id])) {
            // kalau produk sudah ada, qty ditambah
            $cart[$id]['qty'] += 1;
        } else {
            // kalau belum ada, buat item baru
            $cart[$id] = [
                'id'    => $id,
                'name'  => $request->name,
                'price' => $request->price,
                'image' => $request->image,
                'qty'   => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    // hapus 1 item dari cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang');
    }

    // kosongkan cart
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Keranjang dikosongkan');
    }

    // update qty (optional tapi bagus buat UKK)
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->qty as $id => $qty) {
            if (isset($cart[$id])) {
                $cart[$id]['qty'] = max(1, $qty);
            }
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Keranjang diperbarui');
    }

    // tambah qty
public function increment($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['qty'] += 1;
        session()->put('cart', $cart);
    }

    return redirect()->back();
}

// kurang qty
public function decrement($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['qty'] -= 1;

        if ($cart[$id]['qty'] <= 0) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);
    }

    return redirect()->back();
}

// hapus item
// public function remove($id)
// {
//     $cart = session()->get('cart', []);

//     if (isset($cart[$id])) {
//         unset($cart[$id]);
//         session()->put('cart', $cart);
//     }

//     return redirect()->back();
// }

}
