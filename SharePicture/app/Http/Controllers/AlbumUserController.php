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
use App\Services\GetFileGoogleDriveService;
use App\Services\AlbumUserService;
use App\Http\Requests\newAlbumValidate;
use Illuminate\Pagination\LengthAwarePaginator;

class AlbumUserController extends BaseController
{
    public function newalbum(){
        return view('user.new_album');
    }

    public function editAlbumUser(){
        return view('user.editalbum');
    }

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

         #duyet mang de luu vao chi tiet album
        foreach ($arr as $key => $value) {
            $basename_img=GetFileGoogleDriveService::getImagePhoto($userID,$tieude,$value);
            ChitietAlbum::create(array(
                'hinhanh_album'=>$value,
                'album_id'     =>$idAlbum,
                'basename_hinhanh'=>$basename_img
            ));
        }
        return back()->with('thongbao','The album has been successfully created :)');
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

    public function loadAlbum(Request $request){  
        $userID = Auth::user()->id;

        $items=AlbumUserService::loadAlbumUser($userID);

        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($items);
 
        // Define how many items we want to be visible in each page
        $perPage = 12;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        $paginatedItems->setPath($request->url());

        return view('user.myalbums')->with(['array'=>$paginatedItems]);
    }

    public function editAlbum($idAlbum)
    {
        $album = Album::where('taikhoan_id',Auth::user()->id)->where('id',$idAlbum)->first();

        return view('user.editalbum')->with('value',['tieude_album'=>$album['tieude_album'], 'mota_album'=> $album['mota_album'],'idAlbum'=>$idAlbum]);//, 'chitiet'=> $array
    }

    public function updateAlbum(newAlbumValidate $request)
    {
        $userID = Auth::user()->id;
        $idAlbum=$request->id;
        $tieude = $request->get('tieude_album');
        $mota = $request->get('mota_album');
        $chedo = $request->get('chedo_album');
        $idUser = $userID;


        //dd($$request->id);
        Album::find($idAlbum)->delete();

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

        $root = FolderGoogleDriveService::createSubFoderGoogleDrive($idUser, $tieude);

        $subPath = FolderGoogleDriveService::getPathFolderAlbumGoogleDrive($idUser, $tieude, $root);

        //Storage::disk('google')->deleteDirectory($subPath);

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

         #duyet mang de luu vao chi tiet album
        foreach ($arr as $key => $value) {
            $basename_img=GetFileGoogleDriveService::getImagePhoto($userID,$tieude,$value);
            ChitietAlbum::create(array(
                'hinhanh_album'=>$value,
                'album_id'     =>$idAlbum,
                'basename_hinhanh'=>$basename_img
            ));
        }
        return back()->with('thongbao','The album has been successfully updated :)');
    }

    public function deleteAlbum(Request $request)
    {
        Album::find($request->id)->delete();
    }

}
