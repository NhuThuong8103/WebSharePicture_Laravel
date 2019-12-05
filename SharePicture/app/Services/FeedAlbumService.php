<?php 
namespace App\Services;
use Auth;
use App\Album;
use App\TaiKhoan;
use App\ChitietAlbum;
use App\Services\GetFileGoogleDriveService;
use Illuminate\Support\Arr;
use Storage;

	class FeedAlbumService{

		
		public static function getFeedAlbum(){

			$arrAlbumDB = Album::all();

			$array=array();
			

			foreach ($arrAlbumDB as $key =>$value) {
				    $user=TaiKhoan::find($value['taikhoan_id']);

				    $username=$user['ho']." ".$user['ten'];


					$arrPathCT=array();
					$arrChiTietAlbumDB=ChitietAlbum::where('album_id',$value['id'])->get();
					 $i = 0;
					foreach ($arrChiTietAlbumDB as $keyCT => $valueCT) {
						$pathavatar=GetFileGoogleDriveService::getIconAvatar($value['taikhoan_id'],'Avatar',$user['anhdaidien']);
						$path=GetFileGoogleDriveService::getImagePhoto($value['taikhoan_id'],$value['tieude_album'],$valueCT['hinhanh_album']);
						array_push($arrPathCT,['img'=>$path, 'stt'=>$i]);
						 $i++;
					}

				 	array_push($array, [
				 		'username' => $username,
				 		'avatar' => $pathavatar,
				 		'tieude'=>$value['tieude_album'],
				 		'mota' =>$value['mota_album'],
				 		'path'=>$arrPathCT,
				 		'chedo_album'=>$value['chedo_album'],
				 		'idalbum' =>$value['id'],
				 		'ngaygio' =>$value['created_at']
				 	]);
			}
			return $array;			 
			 
		} 
	}

 ?>