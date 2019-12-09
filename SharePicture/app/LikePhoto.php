<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikePhoto extends Model
{
    //
    public $table ="likephoto";
    
	protected $fillable = [
			'taikhoan_id',
	        'photo_id',
	    ];
    public function taikhoan(){
    	return $this->belongsTo(TaiKhoan::class,'id');
    }

    public function photo(){
    	return $this->belongsTo(Photo::class,'id');
    }
}
