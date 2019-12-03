<?php  
namespace App\Services;
use Illuminate\Support\ServiceProvider;
use App\Providers\GoogleDriveServiceProvider;
use App\TaiKhoan;
use Storage;
use File;

class PutFileGoogleDriveService 
{
	public static function putAvatarFileImage($idUser, $filename, $data){
		$dir = '/';
		$recursive = false;
		$contents = collect(Storage::disk('google')->listContents($dir, $recursive));
		$dir = $contents->where('type', '=', 'dir')
		->where('filename', '=', $idUser) 
		->first();

		$contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
		$dir = $contents->where('type', '=', 'dir')
		->where('filename', '=', 'Avatar')
		->first();

		Storage::disk('google')->put($dir['path'].'/'.$filename, $data);
	}

	public static function putPhotoImage($idUser, $filename, $data){
		$dir = '/';
		$recursive = false;
		$contents = collect(Storage::disk('google')->listContents($dir, $recursive));
		$dir = $contents->where('type', '=', 'dir')
		->where('filename', '=', $idUser) 
		->first();

		$contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
		$dir = $contents->where('type', '=', 'dir')
		->where('filename', '=', 'Photo')
		->first();

		Storage::disk('google')->put($dir['path'].'/'.$filename, $data);
	}

}