<?php 
namespace App\Services;
use App\Photo;
use App\Services\GetFileGoogleDriveService;
use Illuminate\Support\Arr;
	
	class PhotoUserService
	{

		public static function loadPhotoUser($idUser){

			$arrPhotoDB = Photo::where('taikhoan_id_photo',$idUser)->get();

			//dd($arrPhotoDB);

			//$arrayalbumuser=GetFileGoogleDriveService::getImagePhoto($idUser);

			$array=array();

			foreach ($arrPhotoDB as $key =>$value) {

				//$path=GetFileGoogleDriveService::getImagePhoto($idUser,'Photo',$value['hinh_anh']);
				$path=$value['basename_hinhanh'];

				array_push($array, ['tieude'=>$value['tieude'], 'path'=>$path,'chedo_photo'=>$value['chedo_photo'],'idphoto' =>$value['id']]);
			}
			// foreach ($arrayalbumuser as $key => $value) {
			// 	foreach ($arrFolder as $key1 => $value1) {
			// 		if($value['ten_album']==$value1['tieude_album']){
			// 			$data=Storage::disk('google')->get($value['data']);
			// 			$result="data:".$value['mimetype'].";base64,".base64_encode($data);
			// 			array_push($array,['tieude_album' => $value['ten_album'],'data'=>$result,'mota_album'=>$value1['mota_album'],'chedo_album' => $value1['chedo_album']]);
			// 		}		
			// 	}
			// }
			
			return $array;
		}
	}