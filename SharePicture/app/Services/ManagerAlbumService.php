<?php 
namespace App\Services;
use App\Album;
use App\ChitietAlbum;
use Illuminate\Support\Arr;

class ManagerAlbumService
{
	public static function loadAllAlbum()
	{
		$arrAlbumDB = Album::all();

		$array=array();
		$arrPathCT=array();

		foreach ($arrAlbumDB as $key =>$value) {

				$arrChiTietAlbumDB=ChitietAlbum::where('album_id',$value['id'])->get();

				$path=GetFileGoogleDriveService::getImagePhoto($value['taikhoan_id'],$value['tieude_album'],$arrChiTietAlbumDB[0]['hinhanh_album']);
				// foreach ($arrChiTietAlbumDB as $keyCT => $valueCT) {
				// 	$path=GetFileGoogleDriveService::getImagePhoto($value['taikhoan_id'],$value['tieude_album'],$valueCT['hinhanh_album']);
				// 	$arrPathCT=array_push($arrPathCT, $path);
				// }

			 	array_push($array, ['tieude'=>$value['tieude_album'], 'mota' =>$value['mota_album'], 'path'=>$path,'chedo_album'=>$value['chedo_album'],'idalbum' =>$value['id']]);
		}
		return $array;
	}

}