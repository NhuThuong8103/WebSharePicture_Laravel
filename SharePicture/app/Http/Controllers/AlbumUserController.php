<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Album;
use Auth;

class AlbumUserController extends BaseController
{




    //  public function store(Request $request)
    // {
        
    //     $image = $request->file('file');
    //     $imageName = time().$image->getClientOriginalName();
    //     $upload_success = $image->move(public_path('images'),$imageName);
        
    //     if ($upload_success) {
    //         return response()->json($upload_success, 200);
    //     }
    //     else {
    //         return response()->json('error', 400);
    //     }
    // }
    function saveNewAlbum(Request $request){
         $data = $request->all();



        return response()->json($data);
        // $userID = Auth::user()->id;
        
        // $request->validate([
        //     'tieude_album'      =>  'bail|required',
        //     'mota_album'        =>  'bail|required',
        //     'chedo_album'       =>  'bail|required',
        // ]);

        // $tieude = $request->get('tieude_album');
        // $mota = $request->get('mota_album');
        // $chedo = $request->get('chedo_album');
        // $idUser = $userID;

        // $album = new Album();

        // $album['tieude_album'] = $tieude;
        // $album['mota_album'] = $mota;
        // $album['chedo_album'] = $chedo;
        // $album['taikhoan_id'] = $idUser;

        // $album->save();

        // $idAlbum = Album::where('taikhoan_id', $userID)->max('id');


       // print_r($idAlbum);

        // return back()->with('thongbao_addnewalbum_ok',"Add new album success :V"); 
        // 
        // 
        // 
        


        // $path = storage_path('picture/');
        // $file = file('file');

       // $name = uniqid().($file->getClientOriginalName());
        
        // return response()->json([
        //     'name'          => $name,
        //     'original_name' => $file->getClientOriginalName(),
        // ]);
        //$thuong = $file->getClientOriginalName();

        //print_r($file->getClientOriginalName());
    }


    public function storeMedia(Request $request)
    {

        //print_r($request->file('file'));
        // $path = storage_path('picture/');

        // if (!file_exists($path)) {
        //     mkdir($path, 0777, true);
        // }

        // $file = $request->file('file');

        // $name = uniqid() . '_' . trim($file->getClientOriginalName());

        // $file->move($path, $name);

        // return response()->json([
        //     'name'          => $name,
        //     'original_name' => $file->getClientOriginalName(),
        // ]);
        // 
        
        //$userID = Auth::user()->id;








        // $path = storage_path('picture/');

        // if (!file_exists($path)) {
        //     mkdir($path, 0777, true);
        // }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

       // $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);



    }

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
