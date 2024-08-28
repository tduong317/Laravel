<?php

use App\Http\Controllers\Brand;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Category;
use App\Http\Controllers\Chitietsp;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Gioithieu;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lienhe;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Quanlisanpham;
use App\Http\Controllers\Sanphamtranguser;
use App\Http\Controllers\Thuonghieu;
use App\Http\Controllers\Timdung;
use App\Http\Middleware\CustomerMiddleWare;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/trangchu', function () {
    return view('Admin/trangchu');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('Admin/admin');
    });
    Route::prefix('QLSP')->group(function () {
        Route::get('dssp', [Quanlisanpham::class, 'Danhsachsp'])->name('danhsachsp');
        Route::get('addsp', [Quanlisanpham::class, 'Themsp'])->name('addsp');
        Route::post('savesp', [Quanlisanpham::class, 'Savesp'])->name('savesp');
        Route::get('editsp/{Product_id}', [Quanlisanpham::class, 'Editsp'])->name('editsp');
        Route::delete('deletesp/{Product_id}', [Quanlisanpham::class, 'Deletesp'])->name('deletesp');
        Route::put('savenewsp/{Product_id}', [Quanlisanpham::class, 'Savenewsp'])->name('savenewsp');
        Route::get('upload', [Quanlisanpham::class, 'upload'])->name('upload.form');
        Route::post('upload', [Quanlisanpham::class, 'upload'])->name('upload.form');
        Route::get('themanh/{Product_id}', [Quanlisanpham::class, 'Themanh'])->name('themanh');
        Route::post('luuanh/{Product_id}', [Quanlisanpham::class, 'Luuanh'])->name('luuanh');
        Route::delete('xoaanh/{Product_id}', [Quanlisanpham::class, 'Xoaanh'])->name('Xoaanh');
    });

    Route::prefix('Category')->group(function () {
        Route::get('formcate', [Category::class, 'Danhsachcate'])->name('danhsachcate');
        Route::get('addcate', [Category::class, 'Themcate'])->name('addcate');
        Route::post('savecate', [Category::class, 'Savecate'])->name('savecate');
        Route::delete('deletecate/{Category_id}', [Category::class, 'Deletecate'])->name('deletecate');
        Route::get('editcate/{Category_id}', [Category::class, 'Editcate'])->name('editcate');
        Route::put('savenew/{Category_id}', [Category::class, 'Savenew'])->name('savenewcate');
    });
    Route::prefix('Brand')->group(function () {
        Route::get('formbrand', [Brand::class, 'Danhsachbrand'])->name('danhsachbrand');
        Route::get('addbrand', [Brand::class, 'Thembrand'])->name('addbrand');
        Route::post('savebrand', [Brand::class, 'Savebrand'])->name('savebrand');
        Route::delete('deletebrand/{Brand_id}', [Brand::class, 'Deletebrand'])->name('deletebrand');
        Route::get('editbrand/{Brand_id}', [Brand::class, 'Editbrand'])->name('editbrand');
        Route::put('savenew/{Brand_id}', [Brand::class, 'Savenew'])->name('savenewbrand');
    });
});

Route::get('/', [Sanphamtranguser::class, 'Sp'])->name('sanpham');
Route::get('chitiet/{Tieude}_{Product_id}', [Chitietsp::class, 'chitietsp'])->name('chitietsp');
Route::get('gioithieu', [Gioithieu::class, 'Gioithieu'])->name('gioithieu');
Route::get('lienhe', [Lienhe::class, 'Lienhe'])->name('lienhe');
Route::get('hang/{brand}_{id}', [Thuonghieu::class, 'Thuonghieu'])->name('thuonghieu');
Route::get('Timkiem', [Timdung::class, 'Timdung'])->name('Timdung');
Route::get('Timkiemsai', function () {
    return view('Timkiem/Sai');
});

Route::prefix('Giohang')->group(function () {
    Route::get('view', [CartController::class, 'index'])->name('cart');
    Route::get('add/{id}', [CartController::class, 'Muahang'])->name('Muahang');
    Route::get('xoa/{id}', [CartController::class, 'Xoahang'])->name('xoagiohang');
    Route::put('update', [CartController::class, 'Capnhat'])->name('updategiohang');
    Route::get('huy', [CartController::class, 'Huydon'])->name('huygiohang');

});
Route::group(['prefix' => 'customer'], function () {
    Route::get('login', [CustomerController::class, 'login'])->name('customer.login');
    Route::post('login', [CustomerController::class, 'post_login']);
    Route::get('register', [CustomerController::class, 'register'])->name('customer.register');
    Route::post('register', [CustomerController::class, 'post_register']);
    Route::get('logout', [CustomerController::class, 'logout'])->name('dangxuat');
});
Route::get('contact', [HomeController::class, 'contactUs'])->name('home.contact');
Route::post('contact', [HomeController::class, 'sendContact'])->name('home.sendContact');

Route::prefix('order')->middleware([CustomerMiddleWare::class])->group(function () {
    Route::get('checkout', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::post('checkout', [OrderController::class, 'post_checkout']);
    Route::get('history', [OrderController::class, 'history'])->name('order.history');
    Route::get('detail/{odid}', [OrderController::class, 'detail'])->name('order.detail');
    Route::get('order_success', [OrderController::class, 'order_success'])->name('order.success');
    Route::get('verify-order/{token}', [OrderController::class, 'verify_order'])->name('order.verify_order');

    Route::get('admin_history', [OrderController::class, 'historyadmin'])->name('historyadmin');
    Route::get('admin_detail/{odid}', [OrderController::class, 'detailadmin'])->name('detailadmin');


    Route::put('Cap-nhat-trang-thai/{id}', [OrderController::class, 'UpdateStatus'])->name('update');
    Route::delete('Xoa-don-hang/{id}', [OrderController::class, 'DeleteOrder'])->name('delete');
    Route::delete('Xoa-chi-tiet-don-hang/{id}', [OrderController::class, 'DeleteDetail'])->name('delete_detail');
});

Route::prefix('order_detail')->group(function () {
    Route::get('dsdh', []);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
