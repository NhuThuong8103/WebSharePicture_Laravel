<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Providers\GoogleDriveServiceProvider;
use App\ChitietAlbum;
use App\Album;
use Auth;
use Storage;
use File;
use App\Services\FolderGoogleDriveService;
use App\Services\AlbumUserService;
use App\Http\Requests\newAlbumValidate;



class AlbumUserController extends BaseController
{
    private $drive;

    public function saveNewAlbum(newAlbumValidate $request){
        
        $userID = Auth::user()->id;

        $tieude = $request->get('tieude_album');
        $mota = $request->get('mota_album');
        $chedo = $request->get('chedo_album');
        $idUser = $userID;

        Album::create(array(
            'tieude_album'  =>$tieude,
            'mota_album'    =>$mota,
            'chedo_album'   =>$chedo,
            'taikhoan_id'   =>$idUser,

        ));

        #luu ten anh vao chi tiet album
        $idAlbum = Album::where('taikhoan_id', $userID)->max('id');

        $filePath = $userID."/";
        
        #luu ten file upload cua userid ra 1 mang
        $arr = array();
        if($handle = opendir($filePath)){
            while (false !== ($entry = readdir($handle))) {
                if($entry != "." && $entry != ".."){
                    array_push($arr,$entry);
                }
            }
            closedir($handle);
        }

        #duyet mang de luu vao chi tiet album
        foreach ($arr as $key => $value) {
            ChitietAlbum::create(array(
                'hinhanh_album'=>$value,
                'album_id'     =>$idAlbum,
            ));
        }

        $root = FolderGoogleDriveService::createSubFoderGoogleDrive($idUser, $tieude);

        $subPath = FolderGoogleDriveService::getPathFolderAlbumGoogleDrive($idUser, $tieude, $root);

        # lấy file ảnh trong thư mục tạo ở local, rồi lưu lên thư mục album vừa tạo ở trên
        if ($handle = opendir($filePath)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {  
                    $fileData = File::get($userID.'/'.$entry);
                    Storage::disk('google')->put($subPath.'/'.$entry, $fileData);
                    File::delete($userID.'/'.$entry);
                }
            }
            closedir($handle);
        }
    }

    public function store(Request $request){   
        $userID = Auth::user()->id;

        $image = $request->file('file');
        //$imageName = time().$image->getClientOriginalName();
        $imageName = $image->getClientOriginalName();
        
        $upload_success = $image->move($userID,$imageName);
        if ($upload_success) {

            return response()->json($upload_success, 200);
        }
        else {
            return response()->json('error', 400);
        }        
        
    }

    public function getFileName(Request $request){
        $userID = Auth::user()->id;
        $names = $request->name;
        $filePath = $userID."/";
        if($handle = opendir($filePath)){
            while (false !== ($entry = readdir($handle))) {
                if($entry == $names){
                    File::delete($userID.'/'.$entry);
                }
            }
            closedir($handle);
        }
    }

    public function loadAlbum(){  
        $userID = Auth::user()->id;

        $arr=AlbumUserService::loadAlbumUser($userID);
        return view('user.myalbums')->with(['array'=>$arr]);
    }


    



}
