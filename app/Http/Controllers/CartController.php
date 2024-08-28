<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use App\Models\product;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Cart $cart)
    {
        $brand = DB::table('brand')
            ->get();
        return view('Giaodien/cart', compact('cart', 'brand'));
    }
    public function Muahang($id, Cart $cart)
    {
        $sp = product::where('Product_id', '=', $id)
            ->first();
        $cart->Add($sp, 1);
        return redirect()->route('cart');
    }
    public function Xoahang($id, Cart $cart)
    {
        $cart->Delete($id);
        return redirect()->route('cart');
    }
    public function Capnhat(Request $request, Cart $cart)
    {
        $id = $request['id'];
        $sl = $request['sl'];
        $cart->Update($id, $sl);
        return redirect()->route('cart');
    }
    public function Huydon(Cart $cart)
    {
        $cart -> Clear();
        return redirect()->route('cart');
    }
}
