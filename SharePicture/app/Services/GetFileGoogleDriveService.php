<?php  
namespace App\Services;
use Illuminate\Support\ServiceProvider;
use App\Providers\GoogleDriveServiceProvider;
use App\TaiKhoan;
use Storage;
use File;

class GetFileGoogleDriveService 
{
	public static function getOneFileImage($idUser, $Directory, $filename)
	{

		$dir = '/';
		$recursive = false;
		$contents = collect(Storage::disk('google')->listContents($dir, $recursive));
		$dir = $contents->where('type', '=', 'dir')
						->where('filename', '=', $idUser) 
						->first();

		$contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
		$dir = $contents->where('type', '=', 'dir')
                        ->where('filename', '=', $Directory)
                        ->first();
		$contents =collect(Storage::disk('google')->ListContents($dir['path'],$recursive));
		$file=$contents
					->where('type','=','file')
					->where('filename','=',pathinfo($filename,PATHINFO_FILENAME))
					->where('extension','=',pathinfo($filename,PATHINFO_EXTENSION))
					->first();
		$data=Storage::disk('google')->get($file['path']);

		$result="data:".$file['mimetype'].";base64,".base64_encode($data);

		return $result;
	}
}