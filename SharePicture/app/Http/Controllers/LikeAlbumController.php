<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LikeAlbum;
use Auth;

class LikeAlbumController extends Controller
{
    public function likeAlbum(Request $request)
    {
    	LikeAlbum::create([
    		'taikhoan_id' 	=>Auth::user()->id,
    		'album_id'		=>$request->idAlbumLike
    	]);
    }

    public function removeLikeAlbum(Request $request)
    {
    	LikeAlbum::where('taikhoan_id',Auth::user()->id)->where('album_id',$request->idAlbumLike)->delete();
    }
}
