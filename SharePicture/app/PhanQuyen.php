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

	
}
