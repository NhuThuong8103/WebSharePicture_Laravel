<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhanQuyen;
use Auth;


class TaiKhoan extends Model
{
    public $table="taikhoan";

    public function phanquyen(){
    	return $this->hasOne(PhanQuyen::class,"id");
    }

    public function loaiQuyen($id){
    	$check=TaiKhoan::find(Auth::user()->id)->phanquyen()->first();

    	return $check['loaiquyen'];
    }

    public function checkExistEmail($email)
    {
    	$check=TaiKhoan::where('email',$email)->count();
    	if($check!=0)
    		return false;
    	return true;
    }


}
