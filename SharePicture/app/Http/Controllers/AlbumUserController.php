<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumUserController extends BaseController
{
    // 
    function saveNewAlbum(Request $request){
    	$request->session()->('edit-photo');
    	Validator::make($request->all()[
    		'tieude_album'		=>	'bail|required',
    		'mota_album'		=>	'bail|required',
    		'chedo_album'		=>	'bail|required',
    		
    	])->validate();
    }

    
}
