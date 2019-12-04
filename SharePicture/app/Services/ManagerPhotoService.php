<?php 
namespace App\Services;
use App\Photo;
use Illuminate\Support\Arr;

class ManagerPhotoService
{

	public static function loadAllPhoto(){

		$arrPhotoDB = Photo::all();

		$array=array();

		foreach ($arrPhotoDB as $key =>$value) {

			$path=GetFileGoogleDriveService::getImagePhoto($value['taikhoan_id_photo'],'Photo',$value['hinh_anh']);

			array_push($array, ['tieude'=>$value['tieude'], 'path'=>$path,'chedo_photo'=>$value['chedo_photo'],'idphoto' =>$value['id']]);
		}
		return $array;
	}
}