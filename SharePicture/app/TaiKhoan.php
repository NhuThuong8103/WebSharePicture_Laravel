<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhanQuyen;
use Auth;


class TaiKhoan extends Model
{
    public $table="taikhoan";

    protected $fillable = ['id','email','password','thoigian_dncuoi','ho','ten','anhdaidien','phephoatdong','quyen_id'];

    public function phanquyen(){
    	return $this->hasOne(PhanQuyen::class,"id");
    }

    public function photo(){
        return $this->hasMany(Photo::class,"taikhoan_id_photo");
    }

    public function likephoto(){
        return $this->hasMany(LikePhoto::class,'taikhoan_id');
    }

    public function likealbum(){
        return $this->hasMany(LikeAlbum::class,'album_id');
    }

    public function album(){
        return $this->hasMany(Album::class,'taikhoan_id');
    }

    public function loaiQuyen($id_quyen){
    	$check=PhanQuyen::where('id',$id_quyen)->first();

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
