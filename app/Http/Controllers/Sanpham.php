<?php

namespace App\Http\Controllers;

use App\Models\product;
use DB;
use Illuminate\Http\Request;

class Sanpham extends Controller
{
    public function Sanpham()
    {
        $sp = product::all();
        return view('Giaodien/tranguser', compact('sp', 'brand'));
    }

}
