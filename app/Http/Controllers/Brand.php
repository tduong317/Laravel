<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class Brand extends Controller
{
    public function Danhsachbrand()
    {
        $brand = DB::table("brand")
            ->orderBy("Brand_name")
            ->get();
        return view('Brand/formbrand', compact('brand'));
    }
    public function Thembrand(Request $request)
    {
        return view('Brand/addbrand');
    }
    public function Savebrand(Request $request)
    {
        $brandname = $request['Brand_name'];

        DB::table('brand')->insert([
            'Brand_name' => $brandname,
        ]);
        return redirect()->route('danhsachbrand');
    }
    public function Deletebrand($id)
    {
        DB::table('brand')->where('Brand_id', $id)->delete();
        return redirect()->route('danhsachbrand');
    }
    public function Editbrand($id)
    {
        $brand = DB::table('brand')->where('Brand_id', $id)->first();
        return view('Brand/editbrand', compact('brand'));
    }
    public function Savenew($id, Request $request)
    {
        $id = $request['Brand_id'];
        $brandname = $request['Brand_name'];

        DB::table('brand')->where('Brand_id', $id)->update([
            'Brand_name' => $brandname,
        ]);
        return redirect()->route('danhsachbrand');
    }
}
