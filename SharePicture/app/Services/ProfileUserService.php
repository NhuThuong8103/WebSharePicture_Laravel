<?php

namespace App\Services;
use App\TaiKhoan;
use Hash;
use Auth;


class ProfileUserService{
	public static function editProfileInfoUser($idUser,$avatar, $firstname, $lastname, $email)
	{
		TaiKhoan::find($idUser)->update([
			'anhdaidien'=>$avatar,
    		'ten'		=>$firstname,
    		'ho'		=>$lastname,
    		'email'		=>$email
    	]);
	}

	public static function editProfilePasswordUser($idUser,$password)
	{
		TaiKhoan::find($idUser)->update([
			'password'=>Hash::make($password),
    	]);
	}
	public static function checkPassword($email,$password)
	{
		if(Auth::attempt(['email' => $email,'password'=>$password])){
			return true;
		}
		return false;
	}
}