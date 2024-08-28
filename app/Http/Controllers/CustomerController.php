<?php

namespace App\Http\Controllers;

use App\Models\customers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function login()
    {
        $brand = DB::table('brand')
            ->get();
        return view('Customer.login', compact('brand'));
    }

    public function post_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $login_data = [
            'email' => $email,
            'password' => $password
        ];
        $check_login = Auth::guard('cus')->attempt($login_data);
        if ($check_login) {
            return redirect()->route('sanpham');
        } else {
            return "Lỗi không đăng nhập được";
        }
        // return redirect()->route('sanpham');
    }
    public function register()
    {
        return view('Customer.register');
    }
    public function post_register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $password = bcrypt($request->password);

        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|unique:customer|max:100',
            'address' => 'required|max:200',
            'password' => 'required|min:6|max:12',
        ];

        $message = [
            'name.required' => 'Vui lòng nhập họ tên',
            'name.max' => 'Tên không được quá 100 kí tự',
            'email.required' => "Vui lòng nhập email",
            'email.max' => 'Email không được quá 100 kí tự',
            'email.unique' => 'Email không được trùng lập',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.max' => 'Địa chỉ không được quá 100 kí tự',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật Khẩu không được nhỏ hơn 6 kí tự',
            'password.max' => 'Mật khẩu không được lớn hơn 12 kí tự',
        ];
        $request->validate($rules, $message);
        $add = customers::create([
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'password' => $password
        ]);
        if ($add == false) {
            return redirect()->back()->with('error', 'Đăng ký không thành công vui lòng thử lại');
        }
        return redirect()->route('customer.login');

    }
    public function logout()
    {
        Auth::guard('cus') -> logout();
        return view('customer.login');
    }
}
