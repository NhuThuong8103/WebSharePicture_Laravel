<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeAlbum extends Model
{
    //
    public $table ="likealbum";
    protected $fillable = [
			'taikhoan_id',
	        'album_id',
	    ];
    public function taikhoan(){
    	return $this->belongsTo(TaiKhoan::class,'id');
    }
    public function album(){
    	return $this->belongsTo(Album::class,'id');
    } 
}
