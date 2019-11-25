<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailAlbumUserController extends Controller
{
    //
    function fileUpload(Request $request){
        $image = $request->file('file');

        //$imageName = $image->getClientOriginalName();
        $filename = time().$image->getClientOriginalName();

        $uploadPath = 'public/image/upload_images/';

        $image->move($uploadPath,$filename);

        echo json_encode($filename);
    }

    function removeUpload(Request $request){
    	try {
    		$image = str_replace('"', '', $request->file);
    		$directory = public_path().'/image/upload_images/'.$image;
    		@unlink(public_path().'/image/upload_images/'.$image);
    	} catch (Exception $e) {
    		
    	}
    	finally{
    		$message = 'sucssecc';
    	}
    	return json_encode($emage);
    }

    function fileStore(Request $request){
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('/public/image/upload_images/'),$imageName);
        
        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    function fileDestroy(Request $request){
        $filename =  $request->get('filename');
        ImageUpload::where('filename',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }



}
