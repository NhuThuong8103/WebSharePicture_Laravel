<?php 
namespace App\Services;
use Auth;
use App\Album;
use App\TaiKhoan;
use App\Services\GetFileGoogleDriveService;
use Illuminate\Support\Arr;
use Storage;

	class FeedAlbumService{
		public static function getFeedAlbum(){
			$album = Album::where('chedo_album','=',true)->orderBy('create_at', 'DESC')->get();

			$array = array();

			foreach ($album as $value) {
				$user = TaiKhoan::find($value['taikhoan_id']);
				$username = $user['ho']." ".$user['ten'];
				$pathAvatar = GetFileGoogleDriveService::getIconAvatar($value['taikhoan_id'], 'Avatar', $user['anhdaidien']);
				//$pathAlbum = GetFileGoogleDriveService::get 
			}

			// foreach ($photo as $value) 
			// 	$user=TaiKhoan::find($value['taikhoan_id_photo']);

			// 	$username=$user['ho']." ".$user['ten'];

			// 	$pathavatar=GetFileGoogleDriveService::getIconAvatar($value['taikhoan_id_photo'],'Avatar',$user['anhdaidien']);
			// 	$pathimg=GetFileGoogleDriveService::getImagePhoto($value['taikhoan_id_photo'],'Photo',$value['hinh_anh']);
			// 	array_push($array,[
			// 		'idPhoto'		=>$value['id'],
			// 		'username'  	=>$username,
			// 		'pathavatar'	=>$pathavatar,
			// 		'tieude'		=>$value['tieude'],
			// 		'mota'			=>$value['mota'],
			// 		'ngaygio'		=>$value['created_at'],
			// 		'pathimg'		=>$pathimg  
			// 	]);
				
			// }			
			// return $array;
		}
	}

 ?>