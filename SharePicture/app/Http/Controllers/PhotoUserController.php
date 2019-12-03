<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\newPhotoValidate;
use App\Photo;
use Auth;
use App\Services\PutFileGoogleDriveService;
use App\Services\PhotoUserService;
use File;

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
        $arrPhotoDB = Photo::where('taikhoan_id_photo',Auth::user()->id)->where('id',$idPhoto)->get();

        //dd($arrPhotoDB);
        
        return view('user.editphoto')->with('value',['tieude'=>$arrPhotoDB[0]['tieude'], 'mota_photo'=> $arrPhotoDB[0]['mota']]);
    }
    
}
