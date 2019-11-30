<?php

namespace App\Services;
use App\TaiKhoan;
use App\PhanQuyen;
use Illuminate\Support\Arr;
use App\Services\PhanQuyenService;


class ManagerUserService{
	public static function loadUser(){

		//$user= (new TaiKhoan)->phanquyen()->get();//->where('slug','user')->get();
		$idPhanQuyen=PhanQuyen::where('slug','user')->first();

		$user=TaiKhoan::where('id_phanquyen',$idPhanQuyen['id'])->get();

		return $user;
	}

	public static function deleteUser($id)
	{
		TaiKhoan::find($id)->delete();
	}

	public static function getProFileUser($id)
	{
		try {
			$user=TaiKhoan::find($id)->where('id_phanquyen',PhanQuyenService::getID_SlugWithUser())->first();
			return $user;
			
		} catch (Exception $e) {
			
		}
		
	}
}