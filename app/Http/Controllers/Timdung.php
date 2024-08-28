<?php

namespace App\Http\Controllers;

use App\Models\product;
use DB;
use Illuminate\Http\Request;

class Timdung extends Controller
{
    public function Timdung(Request $request)
    {
        $brand = DB::table('brand')
            ->get();
        $sanpham = product::all();
        $key = $request['key'];

        $sp = product::where("Product_name", "Like", "%" . $key . "%")
            ->get();
        //dd($sp);
        if ($sp->count() == 0) {
            return view('Timkiem/Sai', compact('sp', 'sanpham', 'key', 'brand'));
        } else {
            return view('Timkiem/Dung', compact('sp', 'sanpham', 'key', 'brand'));
        }
    }
}
