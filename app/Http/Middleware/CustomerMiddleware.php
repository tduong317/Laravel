<?php
namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;
use Symfony\Component\HttpFoundation\Response;
class CustomerMiddleWare
{

    private $cus;
    public function __construct()
    {

    }
    public function handle($request, Closure $next): Response
    {
        // kiểm tra nếu chưa đăng nhập
        if (!Auth::guard('cus')->check()) {
            // chuyển hướng về form đăng nhập
            return redirect()->route('customer.login');
        }
        else
        return $next($request);
    }
}
