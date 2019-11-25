<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    public $table ="photo";

    public function taikhoan(){
    	return $this->belongsTo(TaiKhoan::class,'id');
    }

    public function likephoto(){
    	return $this->hasMany(LikePhoto::class,'photo_id');
    }
}
