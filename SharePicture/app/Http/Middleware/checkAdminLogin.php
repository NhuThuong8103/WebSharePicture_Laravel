<?php

namespace App\Http\Middleware;
use App\TaiKhoan;

use Closure;
use Auth;

class checkAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user= Auth::user();

            $taikhoan=new TaiKhoan();

            $kt = $taikhoan->loaiQuyen(Auth::user()->quyen_id);

            if($kt){
                return $next($request);
            }
            else {
                Auth::logout();
                return Redirect('/login');
            }
        }
        else {
            return Redirect('/login');
        }
    }
}
