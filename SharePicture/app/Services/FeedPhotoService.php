<?php 
namespace App\Services;
use Auth;
use App\Photo;
use App\TaiKhoan;
use App\LikePhoto;
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

				$likecount= LikePhoto::where('photo_id',$value['id'])->count();
				$checklike=0;
				if(Auth::check()){
					$checklike= LikePhoto::where('photo_id',$value['id'])->where('taikhoan_id',Auth::user()->id)->count();
				}
				array_push($array,[
					'idPhoto'		=>$value['id'],
					'username'  	=>$username,
					'pathavatar'	=>$pathavatar,
					'tieude'		=>$value['tieude'],
					'mota'			=>$value['mota'],
					'ngaygio'		=>$value['created_at'],
					'pathimg'		=>$value['basename_hinhanh'],
					'likecount'		=>$likecount,
					'checklike'		=>$checklike,
				]);
				
			}			
			return $array;
			
		}
	} 