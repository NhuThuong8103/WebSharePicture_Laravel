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

				$arrChiTietAlbumDB=ChitietAlbum::where('album_id',$value['id'])->first();

				//dd($arrChiTietAlbumDB['basename_hinhanh']);
				//$path=GetFileGoogleDriveService::getImagePhoto($value['taikhoan_id'],$value['tieude_album'],$arrChiTietAlbumDB[0]['hinhanh_album']);

			 	array_push($array, ['tieude'=>$value['tieude_album'], 'mota' =>$value['mota_album'], 'path'=>$arrChiTietAlbumDB['basename_hinhanh'], 'chedo_album'=>$value['chedo_album'],'idalbum' =>$value['id']]);
		}
		return $array;
	}

}