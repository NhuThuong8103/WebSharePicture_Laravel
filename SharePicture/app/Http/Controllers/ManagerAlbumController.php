<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerAlbumController extends Controller
{
    public function showManagerAlbum()
    {
    	return view('admin.managerAlbums');
    }
}
