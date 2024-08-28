<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class Category extends Controller
{
    public function Danhsachcate()
    {
        $category = DB::table("category")
            ->orderBy("Category_product")
            ->get();
        return view('Category/formcate', compact('category'));
    }
    public function Themcate(Request $request)
    {
        return view("Category/addcate");
    }
    public function Savecate(Request $request)
    {
        $categoryproduct = $request['Category_product'];
        $stt = $request['STT'];
        DB::table('category')->insert([
            'Category_product' => $categoryproduct,
        ]);
        return redirect()->route('danhsachcate');
    }
    public function Deletecate($id)
    {
        DB::table('category')->where('Category_id', $id)->delete();
        return redirect()->route('danhsachcate');
    }
    public function Editcate($id)
    {
        $category = DB::table('category')->where('Category_id', $id)->first();
        return view('Category/editcate', compact('category'));
    }
    public function Savenew($id, Request $request)
    {
        $id = $request['Category_id'];
        $categoryproduct = $request['Category_product'];

        DB::table('category')->where('Category_id', $id)->update([
            'Category_product' => $categoryproduct,
        ]);
        return redirect()->route('danhsachcate');
    }
}

