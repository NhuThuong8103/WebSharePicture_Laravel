<?php
namespace App\Services;
use App\TaiKhoan;

class TaiKhoanService{

    public static function checkExistEmail($email)
    {
    	$check=TaiKhoan::where('email',$email)->count();
    	if($check!=0)
    		return false;
    	return true;
    }

    public static function getIdUser($email){
    	$idUser = TaiKhoan::where('email', $email)->first();
    	return $idUser->id;
    }
}
