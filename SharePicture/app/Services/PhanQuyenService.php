<?php

namespace App\Services;
use App\PhanQuyen;


class PhanQuyenService {
	public static function loaiQuyen($id_quyen){
		$check=PhanQuyen::where('id',$id_quyen)->first();

		return $check['slug'];
	}
	
	public static function getID_SlugWithUser(){
		$check=PhanQuyen::where('slug','user')->first();

		return $check['id'];
	}
}
