<?php 
namespace App\Services;
use Auth;
use App\Photo;
use App\TaiKhoan;
use App\Services\GetFileGoogleDriveService;
use Illuminate\Support\Arr;
use Storage;

	
	class FeedPhotoService
	{
		public static function getFeedPhoto()
		{
			//tieude, mota, ngaygio,idtk
			$photo=Photo::where('chedo_photo','=',true)->orderBy('updated_at', 'DESC')->get();//getImagePhoto

			$array=array();

			foreach ($photo as $value) {
				$user=TaiKhoan::find($value['taikhoan_id_photo']);

				$username=$user['ho']." ".$user['ten'];

				$pathavatar=GetFileGoogleDriveService::getIconAvatar($value['taikhoan_id_photo'],'Avatar',$user['anhdaidien']);
				$pathimg=GetFileGoogleDriveService::getImagePhoto($value['taikhoan_id_photo'],'Photo',$value['hinh_anh']);
				array_push($array,[
					'idPhoto'		=>$value['id'],
					'username'  	=>$username,
					'pathavatar'	=>$pathavatar,
					'tieude'		=>$value['tieude'],
					'mota'			=>$value['mota'],
					'ngaygio'		=>$value['created_at'],
					'pathimg'		=>$pathimg  
				]);
				
			}			
			return $array;
			
		}
	}