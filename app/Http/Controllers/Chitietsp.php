<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\image_detail;
use App\Models\product;


use Illuminate\Http\Request;

class Chitietsp extends Controller
{
    public function Chitietsp($Tieude, $Product_id)
    {
        $spct = product::where("Product_id", "=", $Product_id)->get();
        $spimg = product::where("Product_id", "=", $Product_id)->get();
        $cate = category::all();
        $brand = brand::all();
        $imgdetail = image_detail::where("Product_id", "=", $Product_id)->get();

        return view("Chitiet/chitietsp", compact('spct', 'spimg', 'cate', 'brand','imgdetail'));
    }
}
