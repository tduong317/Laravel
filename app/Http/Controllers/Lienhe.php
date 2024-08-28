<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class Lienhe extends Controller
{
    //
    public function Lienhe()
    {
        $brand = DB::table('brand')
            ->get();
        return view('Giaodien/lienhe', compact('brand'));
    }
}
