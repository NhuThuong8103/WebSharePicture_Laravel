<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TaiKhoan;


class PhanQuyen extends Model
{
	public $table ="phanquyen";

	protected $fillable = ['id','tenquyen','slug'];

	public function taikhoan(){
		return $this->belongsTo(TaiKhoan::class,"id");
	} 

	public function loaiQuyen($id_quyen){
		$check=PhanQuyen::where('id',$id_quyen)->first();

		return $check['slug'];
	}
	
	public function getID_SlugWithUser(){
		$check=PhanQuyen::where('slug','user')->first();

		return $check['id'];
	}
}
