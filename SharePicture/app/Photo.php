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

    //26/11/2019
    protected $fillable = [
        'hinh_anh',
        'mota',
        'tieude',
        'chedo_photo',
        'taikhoan_id_photo',
        'updated_at'
    ];


}
