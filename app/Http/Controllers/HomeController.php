<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function contactUs()
    {
        return view('Giaodien/lienhe');
    }
    public function sendContact(Request $req)
    {
        $req->validate([
            'Name' => 'required',
            'Email' => 'required|Email',
            'message' => 'required',
        ]);

        try {
            $name = $req->Name;
            $message = $req->message;
            $email = $req->Email;
            Mail::to('duongdeptrai317@gmail.com')->send(new ContactMail($name, $message, $email));
            return redirect()->back()->with('ok', 'Đã gửi email liên hệ thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('ok', 'Đã gửi email liên hệ thành công');
        }
    }
}
