<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Sanphamtranguser extends Controller
{
    public function Sp()
    {
        $moi = product::where("Status", "=", 0)
            ->orderBy('Product_id', "DESC")
            ->take(8)
            ->get();
        $hot = product::where("Status", "=", 1)
            ->orderBy('Product_id', "DESC")
            ->take(4)
            ->get();
        $brand = DB::table('brand')
            ->get();
        return view('Giaodien/sanpham', compact('moi', 'hot', 'brand'));
    }
}
