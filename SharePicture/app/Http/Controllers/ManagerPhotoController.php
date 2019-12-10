<?php

namespace App\Http\Controllers;
use App\Photo;
use Auth;
use File;
use Illuminate\Http\Request;
use App\Services\ManagerPhotoService;
use App\Http\Requests\editPhotoUserValidate;
use App\Services\PutFileGoogleDriveService;
use App\Services\GetFileGoogleDriveService;
use Illuminate\Pagination\LengthAwarePaginator;


class ManagerPhotoController extends Controller
{
    public function showManagerPhoto(Request $request)
    {
    	$items= ManagerPhotoService::loadAllPhoto();

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
        
    	return view('admin.managerPhotos')->with('photo',$paginatedItems);
    }

    public function editPhoto($idphoto)
    {
    	$array=Photo::find($idphoto);

    	// dd($array);

    	//return view('admin.editPhotoUser')->with('value',$array);

        $arrImg= GetFileGoogleDriveService::getImageAddDropzone($array['taikhoan_id_photo'],'Photo',$array['hinh_anh']);

        $image = base64_decode($arrImg[0]['data']);

        $path = public_path(Auth::user()->id.'/'.$arrImg[0]['filename']);

        file_put_contents($path, $image);

        return view('admin.editPhotoUser')->with('value',[
            'tieude'    =>$array['tieude'], 
            'mota'=> $array['mota'],
            'idPhoto'   =>$idphoto, 
            'basename'  =>$arrImg[0]['id'],
            'filename'  =>$arrImg[0]['filename'],
            'size'      =>$arrImg[0]['size'],
        ]);
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
