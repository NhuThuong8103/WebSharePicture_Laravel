<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChitietAlbum extends Model
{
	public $table="chitiet_album";

	protected $fillable = [
		'id',
        'hinhanh_album',
        'album_id',
        'basename_hinhanh'
    ];

    public function album(){
    	return $this->hasMany(Album::class,'id');
    }
}
