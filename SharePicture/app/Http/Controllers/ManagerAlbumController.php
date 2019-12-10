<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ManagerAlbumService;
use App\Services\FolderGoogleDriveService;
use App\Services\GetFileGoogleDriveService;
use App\Album;
use App\ChitietAlbum;
use Auth;
use File;
use Storage;
use App\Http\Requests\newAlbumValidate; 
use Illuminate\Pagination\LengthAwarePaginator;


class ManagerAlbumController extends Controller
{
    public function showManagerAlbum(Request $request)
    {
    	$items= ManagerAlbumService::loadAllAlbum();

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

    	return view('admin.managerAlbums')->with('album',$paginatedItems);
    }


    public function editAlbum($idalbum)
    {
    	$array=Album::find($idalbum);
    	return view('admin.editAlbumUser')->with('value',$array);
    }

    public function updateAlbum(newAlbumValidate $request)
    {
    	$userID = Auth::user()->id;
        $idtaikhoan=$request->idtaikhoan;
        $idAlbum=$request->id;
        $tieude = $request->get('tieude_album');
        $mota = $request->get('mota_album');
        $chedo = $request->get('chedo_album');
        $idUser = $userID;

        //dd($idAlbum);
        //dd($$request->id);
        Album::find($idAlbum)->delete();

        Album::create(array(
            'tieude_album'  =>$tieude,
            'mota_album'    =>$mota,
            'chedo_album'   =>$chedo,
            'taikhoan_id'   =>$idtaikhoan,

        ));

        #luu ten anh vao chi tiet album
        $idAlbum = Album::where('taikhoan_id', $idtaikhoan)->max('id');

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

        $root = FolderGoogleDriveService::createSubFoderGoogleDrive($idtaikhoan, $tieude);

        $subPath = FolderGoogleDriveService::getPathFolderAlbumGoogleDrive($idtaikhoan, $tieude, $root);

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
            $basename_img=GetFileGoogleDriveService::getImagePhoto($idtaikhoan,$tieude,$value);
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
