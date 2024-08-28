<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class Gioithieu extends Controller
{
    public function Gioithieu()
    {
        $brand = DB::table('brand')
            ->get();
        return view('Giaodien/gioithieu', compact('brand'));
    }
}
