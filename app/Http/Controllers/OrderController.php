<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use App\Mail\OrderMailable;
use App\Models\customers;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    public function __construct()
    {
        //$this->middleware('Customer');
    }
    public function checkout(Cart $cart)
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
        $customer = auth('cus')->user();
        return view('order.checkout', compact('cart', 'customer', 'brand', 'hot', 'moi'));
    }
    public function post_checkout(Request $req, Cart $cart)
    {
        $data = $req->only('Name', 'Email', 'Address');
        $data['Customer_id'] = auth('cus')->id();
        $data['Status'] = 0;
        // lưu thông tin vào bagnr orders
        if ($order = Order::create($data)) {

            foreach ($cart->items as $item) {
                $detail = [
                    'Order_id' => $order->id,
                    'Product_id' => $item->Product_id,
                    'Price' => $item->Gia,
                    'quantity' => $item->Soluong,

                ];
                Order_detail::create($detail);
            }
            $cart->clear();
            $order->update(['token' => \Str::random(40)]);
            $customer = auth('cus')->user();
            Mail::to($customer->email)->send(new OrderMailable($order, $customer));
            // Mail::to('duongdeptrai317@gmail.com')->send(new OrderMailable($order, $customer));
            return redirect()->route('order.success');
        }
        return redirect()->back()->with('no', 'Có lỗi , vui lòng thử lại');
    }
    public function history()
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
        $lstorder = Order::all();
        return view('order.history', compact('lstorder', 'moi', 'hot', 'brand'));
    }
    public function detail($odid)
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
        $customer = auth('cus')->user();
        $order = Order::where("id", $odid)->first();
        return view('order.order_detail', compact('order', 'customer', 'moi', 'hot', 'brand'));
    }
    public function order_success()
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
        $customer = auth('cus')->user();
        return view('order.success', compact('moi', 'hot', 'brand', 'customer'));
    }
    public function verify_order($token)
    {
        $order = Order::where('token', $token);
        if ($order) {
            $order->update(['Status' => 1, 'token' => null]);
        }
        return abort(404);
    }
    public function detailadmin($odid)
    {
        $order = Order::where("id", $odid)->first();
        return view('QLDH.detailadmin', compact('order', 'odid'));
    }
    public function historyadmin()
    {
        $lstorder = Order::all();

        return view('QLDH/historyadmin', compact('lstorder'));
    }
    public function UpdateStatus($id, Request $request)
    {
        $id = $request['id'];
        $status = $request['Status'];
        DB::table('Order')->where('id', $id)->update([
            'Status' => $status
        ]);
        return redirect()->route('historyadmin');
    }
    public function DeleteOrder($id)
    {
        DB::table('Order')->where('id', $id)->delete();
        return redirect()->back();
    }
    public function DeleteDetail($id)
    {
        DB::table('Order_detail')->where('id', $id)->delete();
        return redirect()->route('historyadmin');
    }

}
