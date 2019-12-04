<?php

namespace App\Http\Controllers;
use App\Photo;
use Auth;
use File;
use Illuminate\Http\Request;
use App\Services\ManagerPhotoService;
use App\Http\Requests\editPhotoUserValidate;
use App\Services\PutFileGoogleDriveService;


class ManagerPhotoController extends Controller
{
    public function showManagerPhoto()
    {
    	$photo= ManagerPhotoService::loadAllPhoto();
    	return view('admin.managerPhotos')->with('photo',$photo);
    }

    public function editPhoto($idphoto)
    {
    	$array=Photo::find($idphoto);

    	// dd($array);

    	return view('admin.editPhotoUser')->with('value',$array);
    }

    public function saveEditPhoto(editPhotoUserValidate $request)
    {
    	$Idadmin = Auth::user()->id;
    	$idUser_Photo=$request->idUser_Photo;
        $idPhoto=$request->get('idPhoto');
        $tieude = $request->get('tieude_photo');
        $mota = $request->get('mota_photo');
        $chedo = $request->get('chedo_photo');
        $filePath = $Idadmin."/";
        
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
                    $fileData = File::get($Idadmin.'/'.$entry);
                    PutFileGoogleDriveService::putPhotoImage($idUser_Photo,$entry,$fileData);
                    File::delete($Idadmin.'/'.$entry);
                }
            }
            closedir($handle);
        }

        return back()->with('thongbao','Photo has been updated :)');
    }

    public function deletePhotoUser(Request $request)
    {
    	$idphoto=$request->id;

    	Photo::find($idphoto)->delete();

    	return response('deletesucess',200);
    }
}
