<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChitietAlbum extends Model
{
    public $table="chitietAlbum";

    public function album(){
    	return $this->hasMany(Album::class,'id');
    }
}
