<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    public $table ="album";

    protected $fillable = [
        'tieude_album',
        'mota_album',
        'chedo_album',
        'taikhoan_id',
        'updated_at'
    ];







    public function chitiet_album(){
    	return $this->hasMany(ChitietAlbum::class,'album_id');
    }

    public function taikhoan(){
    	return $this->belongsTo(TaiKhoan::class,'id');
    }

    public function likealbum(){
    	return $this->hasMany(LikeAlbum::class,'album_id');
    }

}
