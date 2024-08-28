<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Quanlisanpham extends Controller
{
    //
    public function Danhsachsp(Request $request)
    {
        $brand = DB::table('brand')->get();

        $id = $request['Brand'];

        if ($id != 0) {
            $product = DB::table('product')
                ->join('brand', 'Brand_id', '=', 'Brand')
                ->select('Product_id', 'Product_name', 'Price', 'Images', 'Brand_name')
                ->where('Brand', '=', $id)
                ->get();
        } else {
            $product = DB::table('product')
                ->orderBy('Product_id', 'DESC')
                ->join('brand', 'Brand_id', '=', 'Brand')
                ->select('Product_id', 'Product_name', 'Price', 'Images', 'Brand_name')
                ->get();
        }
        return view('QLSP/dssp', compact('product', 'brand', 'id'));
    }
    public function Themsp()
    {
        $brand = DB::table('brand')->get();
        $category = DB::table('category')->get();
        $img = DB::table('image_detail')->get();
        return view('QLSP/addsp', compact('brand', 'category', 'img'));
    }
    public function Upload(Request $request)
    {
        $rules = ['upload' => 'required:mimes:jpeg,png,gif'];
        $mesages = [
            'upload.required' => 'Vui lòng chọn một file',
            'upload.mimes' => 'Định dạng file cho phép là: jpg, png, gif',
        ];

        $request->validate($rules, $mesages);

        $file_name = $request->upload->getClientOriginalName();
        $request->upload->move(public_path('uploads'), $file_name);
        // quay lại form upload và gửi kèm một flash message
        return redirect()->back()->with('success', "Upload ảnh thành công");
    }
    public function Savesp(Request $request)
    {
        $productname = $request['Product_name'];
        $categoryID = $request['Category_id'];
        $brand = $request['Brand'];
        $price = $request['Price'];
        $status = $request['Status'];


        if ($request->upload) {
            $filename = $request->upload->getClientOriginalName();
            $request->upload->move(public_path('Img'), $filename);
            $images = '/Img/' . $filename;
        } else {
            $images = "";
        }
        DB::table('Product')->insert([
            'Category_id' => $categoryID,
            'Product_name' => $productname,
            'Brand' => $brand,
            'Price' => $price,
            'Images' => $images,
            'Status' => $status

        ]);
        return redirect()->route('danhsachsp');
    }
    public function Deletesp($id)
    {
        DB::table('product')->where('Product_id', $id)->delete();
        return redirect()->route('danhsachsp');
    }
    public function Editsp($id)
    {
        $product = DB::table('product')
            ->where('Product_id', $id)
            ->first();
        $brand = DB::table('brand')->get();
        $category = DB::table('category')->get();
        $img = DB::table('image_detail')->get();
        return view('QLSP/editsp', compact('product', 'brand', 'category', 'img'));
    }

    public function Savenewsp(Request $request, $id)
    {
        $file_name = $request->upload->getClientOriginalName();
        $productname = $request['Product_name'];
        $categoryID = $request['Category_id'];
        $brand = $request['Brand'];
        $price = $request['Price'];
        $status = $request['Status'];
        if ($request->upload) {
            $file_name = $request->upload->getClientOriginalName();
            $request->upload->move(public_path('Img'), $file_name);
            $images = '/Img/' . $file_name;
        } else {
            $images = "";
        }
        DB::table('product')->where('Product_id', $id)->update([
            'Product_name' => $productname,
            'Category_id' => $categoryID,
            'Brand' => $brand,
            'Price' => $price,
            'Status' => $status
        ]);
        return redirect()->route('danhsachsp');
    }
    public function Themanh($id)
    {
        $product = DB::table('product')->where('Product_id', $id)->first();
        $productname = $product->Product_name;
        $themanh = DB::table('image_detail')->where('Product_id', $id)->get();
        return view('/QLSP/themanh', compact('product', 'productname', 'themanh', 'id'));
    }
    public function Luuanh(Request $request)
    {
        $id = $request['Product_id'];
        //Lấy ảnh 
        if ($request->upload) {
            $filename = $request->upload->getClientOriginalName();
            $request->upload->move(public_path('Img'), $filename);
            $images = '/Img/' . $filename;
        } else {
            $images = "";
        }
        DB::table('image_detail')->insert([
            'Product_id' => $id,
            'Images' => $images
        ]);
        return redirect()->back();
    }
    public function Xoaanh($id)
    {
        $img = DB::table('image_detail')->where('Images_id', $id)->delete();
        return redirect()->back();
    }
}
