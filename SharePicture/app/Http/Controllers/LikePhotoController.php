<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\LikePhoto;


class LikePhotoController extends Controller
{
    public function likePhoto(Request $request)
    {
    	LikePhoto::create([
    		'taikhoan_id' 	=>Auth::user()->id,
    		'photo_id'		=>$request->idPhotoLike
    	]);
    }

    public function removeLikePhoto(Request $request)
    {
    	LikePhoto::where('taikhoan_id',Auth::user()->id)->where('photo_id',$request->idPhotoLike)->delete();
    }
}
