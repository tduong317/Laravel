<?php

namespace App\Http\Controllers;

use App\Models\product;
use DB;
use Illuminate\Http\Request;

class Thuonghieu extends Controller
{
    public function Thuonghieu($brand, $id)
    {
        $moi = product::where('brand', '=', $id)
            ->orderBy('Product_id', "DESC")
            ->get();
        $brand = DB::table('brand')
            ->get();
        return view('Giaodien/thuonghieu', compact('moi', 'brand'));
    }
}
