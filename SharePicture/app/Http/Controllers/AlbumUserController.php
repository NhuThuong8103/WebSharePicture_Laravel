<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class AlbumUserController extends BaseController
{
    // 
    // function saveNewAlbum(Request $request){
    // 	$request->session()->('edit-photo');
    // 	Validator::make($request->all()[
    // 		'tieude_album'		=>	'bail|required',
    // 		'mota_album'		=>	'bail|required',
    // 		'chedo_album'		=>	'bail|required',
    		
    // 	])->validate();
    // }

    

    public function store(Request $request)
    {
        
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $upload_success = $image->move(public_path('images'),$imageName);
        
        if ($upload_success) {
            return response()->json($upload_success, 200);
        }
        // Else, return error 400
        else {
            return response()->json('error', 400);
        }
    }
}
