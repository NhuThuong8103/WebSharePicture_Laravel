<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChitietAlbum extends Model
{
    public $table="chitietAlbum";

    protected $fillable = [
        'hinhanh_album',
        'album_id',
    ];






    public function album(){
    	return $this->hasMany(Album::class,'id');
    }
}
