<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\newPhotoValidate;
use App\Photo;
use Auth;
use App\Services\GetFileGoogleDriveService;
use App\Services\PutFileGoogleDriveService;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\PhotoUserService;
use Image;
use File;
use Response;

class PhotoUserController extends Controller
{

    public function shownewphoto()
    {
        return view('user.newphoto');
    }
    public function index(Request $request)
    {
        $userID = Auth::user()->id;

        $items=PhotoUserService::loadPhotoUser($userID);

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

        return view('user.myphotos')->with(['array'=>$paginatedItems]);;
    }

    public function newPhoto(newPhotoValidate $request)
    {
    	$userID = Auth::user()->id;

        $tieude = $request->get('tieude_photo');
        $mota = $request->get('mota_photo');
        $chedo = $request->get('chedo_photo');
        $filePath = $userID."/";
        
        #luu ten file upload cua userid ra 1 mang
        $namefile = "";
        if($handle = opendir($filePath)){
            while (false !== ($entry = readdir($handle))) {
                if($entry != "." && $entry != ".."){
                    $namefile=$entry;
                }
            }
        	closedir($handle);
        }

        $basename_img="";
        # lấy file ảnh trong thư mục tạo ở local, rồi lưu lên thư mục photo 
        if ($handle = opendir($filePath)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {  
                    $fileData = File::get($userID.'/'.$entry);
                    PutFileGoogleDriveService::putPhotoImage($userID,$entry,$fileData);
                    $basename_img=GetFileGoogleDriveService::getImagePhoto($userID,'Photo',$entry);
                    File::delete($userID.'/'.$entry);
                }
            }
            closedir($handle);
        }

         Photo::create(array(
            'hinh_anh'=>$namefile,
            'tieude'  =>$tieude,
            'mota'    =>$mota,
            'chedo_photo'   =>$chedo,
            'taikhoan_id_photo'   =>$userID,
            'basename_hinhanh'    =>$basename_img
        ));

        return back()->with('thongbao','Your photo has been uploaded :)');
         
    }

    public function editPhoto($idPhoto)
    {
        $photo = Photo::where('taikhoan_id_photo',Auth::user()->id)->where('id',$idPhoto)->first();

        $arrImg= GetFileGoogleDriveService::getImageAddDropzone(Auth::user()->id,'Photo',$photo['hinh_anh']);

        $image = base64_decode($arrImg[0]['data']);

        $path = public_path(Auth::user()->id.'/'.$arrImg[0]['filename']);

        file_put_contents($path, $image);

        return view('user.editphoto')->with('value',[
            'tieude'    =>$photo['tieude'], 
            'mota_photo'=> $photo['mota'],
            'idPhoto'   =>$idPhoto, 
            'imgadd_dz' =>$arrImg , 
            'basename'  =>$arrImg[0]['id'],
            'filename'  =>$arrImg[0]['filename'],
            'size'      =>$arrImg[0]['size'],
        ]);
    }

    public function updatePhoto(newPhotoValidate $request)
    {
        $userID = Auth::user()->id;
        $idPhoto=$request->get('idPhoto');
        $tieude = $request->get('tieude_photo');
        $mota = $request->get('mota_photo');
        $chedo = $request->get('chedo_photo');
        $filePath = $userID."/";
        
        #luu ten file upload cua userid ra 1 mang
        $namefile = "";
        if($handle = opendir($filePath)){
            while (false !== ($entry = readdir($handle))) {
                if($entry != "." && $entry != ".."){
                    $namefile=$entry;
                }
            }
            closedir($handle);
        }

        $basename_img="";
        # lấy file ảnh trong thư mục tạo ở local, rồi lưu lên thư mục photo 
        if ($handle = opendir($filePath)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {  
                    $fileData = File::get($userID.'/'.$entry);
                    PutFileGoogleDriveService::putPhotoImage($userID,$entry,$fileData);
                    $basename_img=GetFileGoogleDriveService::getImagePhoto($userID,'Photo',$entry);
                    File::delete($userID.'/'.$entry);
                }
            }
            closedir($handle);
        }


        Photo::find($idPhoto)->update([
            'hinh_anh'=>$namefile,
            'tieude'  =>$tieude,
            'mota'    =>$mota,
            'chedo_photo'   =>$chedo,
            'basename_hinhanh'    =>$basename_img
        ]);

        return back()->with('thongbao','Your photo has been updated :)');
         
    }

    public function deletePhoto(Request $request)
    {
        Photo::find($request->id)->delete();
    }

    //xoa all file anhr voi id user khi load laij trang hoacj ko save
    public function deletePhotoLocal(Request $request)
    {
        if ($handle = opendir(Auth::user()->id."/")) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {  
                    File::delete(Auth::user()->id.'/'.$entry);
                }
            }
            closedir($handle);
        }
    }

}
