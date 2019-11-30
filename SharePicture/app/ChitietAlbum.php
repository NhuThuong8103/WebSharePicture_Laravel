<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChitietAlbum extends Model
{

	protected $fillable = [
		'id',
        'hinhanh_album',
        'album_id',
    ];




    public $table="chitietAlbum";

    





    public function album(){
    	return $this->hasMany(Album::class,'id');
    }
}
