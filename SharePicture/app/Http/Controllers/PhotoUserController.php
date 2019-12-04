<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\newPhotoValidate;
use App\Photo;
use Auth;
use App\Services\GetFileGoogleDriveService;
use App\Services\PutFileGoogleDriveService;
use App\Services\PhotoUserService;
use File;
use Response;

class PhotoUserController extends Controller
{
    public function index()
    {
        $userID = Auth::user()->id;

        $arr=PhotoUserService::loadPhotoUser($userID);

        return view('user.myphotos')->with(['array'=>$arr]);;
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

        Photo::create(array(
        	'hinh_anh'=>$namefile,
            'tieude'  =>$tieude,
            'mota'    =>$mota,
            'chedo_photo'   =>$chedo,
            'taikhoan_id_photo'   =>$userID,
        ));

        # lấy file ảnh trong thư mục tạo ở local, rồi lưu lên thư mục photo 
        if ($handle = opendir($filePath)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {  
                    $fileData = File::get($userID.'/'.$entry);
                    PutFileGoogleDriveService::putPhotoImage($userID,$entry,$fileData);
                    File::delete($userID.'/'.$entry);
                }
            }
            closedir($handle);
        }

        return back()->with('thongbao','Your photo has been uploaded :)');
         
    }

    public function editPhoto($idPhoto)
    {
        $photo = Photo::where('taikhoan_id_photo',Auth::user()->id)->where('id',$idPhoto)->first();

        //dd($arrPhotoDB);
        
        return view('user.editphoto')->with('value',['tieude'=>$photo['tieude'], 'mota_photo'=> $photo['mota'],'idPhoto'=>$idPhoto]);
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

        Photo::find($idPhoto)->update([
            'hinh_anh'=>$namefile,
            'tieude'  =>$tieude,
            'mota'    =>$mota,
            'chedo_photo'   =>$chedo,
        ]);

        # lấy file ảnh trong thư mục tạo ở local, rồi lưu lên thư mục photo 
        if ($handle = opendir($filePath)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {  
                    $fileData = File::get($userID.'/'.$entry);
                    PutFileGoogleDriveService::putPhotoImage($userID,$entry,$fileData);
                    File::delete($userID.'/'.$entry);
                }
            }
            closedir($handle);
        }

        return back()->with('thongbao','Your photo has been updated :)');
         
    }

    public function deletePhoto(Request $request)
    {
        Photo::find($request->id)->delete();
    }

}
