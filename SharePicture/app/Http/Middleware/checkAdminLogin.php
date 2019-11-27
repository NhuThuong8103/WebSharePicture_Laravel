<?php

namespace App\Http\Middleware;
use App\PhanQuyen;
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

            $phanquyen=new PhanQuyen();

            $kt = $phanquyen->loaiQuyen(Auth::user()->id_phanquyen);//lấy quyền đangư nhập 

            if($kt=='admin'){
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
