<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ManagerAlbumService;
use App\Album;
use App\Http\Requests\newAlbumValidate; 

class ManagerAlbumController extends Controller
{
    public function showManagerAlbum()
    {
    	$array= ManagerAlbumService::loadAllAlbum();

    	return view('admin.managerAlbums')->with('album',$array);
    }


    public function editAlbum($idalbum)
    {
    	$array=Album::find($idalbum);
    	return view('admin.editAlbumUser')->with('value',$array);
    }

    public function updateAlbum(newAlbumValidate $request)
    {
    	
    }

    public function deleteAlbum(Request $request)
    {
    	Album::find($request->id)->delete();
    }
}
