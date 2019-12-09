<?php 
namespace App\Services;
use App\Album;
use App\ChitietAlbum;
use App\Services\FolderGoogleDriveService;
use Illuminate\Support\Arr;
use Storage;

	
	class AlbumUserService
	{

		public static function loadAlbumUser($idUser){

			$arrFolder = Album::where('taikhoan_id',$idUser)->get();

			$array=array();

			foreach ($arrFolder as $value) {
				$path=ChitietAlbum::where('album_id',$value['id'])->first();
				array_push($array,['tieude_album' => $value['tieude_album'], 'mota_album'=>$value['mota_album'], 'chedo_album' => $value['chedo_album'],'idAlbum'=>$value['id'],'data'=>$path['basename_hinhanh'] ]);
			}
			// $arrayalbumuser=FolderGoogleDriveService::getImageOfAlbumGoogleDrive($idUser);

			// foreach ($arrayalbumuser as $key => $value) {
			// 	foreach ($arrFolder as $key1 => $value1) {
			// 		if($value['ten_album']==$value1['tieude_album']){
			// 			$data=Storage::disk('google')->get($value['data']);
			// 			$result="data:".$value['mimetype'].";base64,".base64_encode($data);
			// 			array_push($array,['tieude_album' => $value['ten_album'],'data'=>$result,'mota_album'=>$value1['mota_album'],'chedo_album' => $value1['chedo_album'], 'idAlbum'=>$value1['id']]);
			// 		}		
			// 	}
			// }
			
			return $array;
		}

		
	}
 ?>