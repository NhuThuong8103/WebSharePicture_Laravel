<?php  
namespace App\Services;
use Illuminate\Support\ServiceProvider;
use App\Providers\GoogleDriveServiceProvider;
use App\ChitietAlbum;
use App\TaiKhoan;
use App\Album;
use Storage;
use File;

class GetFileGoogleDriveService 
{
	public static function getIconAvatar($idUser, $Directory, $filename)
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
		//set permission images
		$service = Storage::disk('google')->getAdapter()->getService();
        $permission = new \Google_Service_Drive_Permission();
        $permission->setRole('reader');
        $permission->setType('anyone');
        $permission->setAllowFileDiscovery(false);
        $permissions = $service->permissions->create($file['basename'], $permission);

		//$data=Storage::disk('google')->get($file['path']);

		//$result="data:".$file['mimetype'].";base64,".base64_encode($data);

		return $file['basename'];
	}

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
		//set permission images
		$service = Storage::disk('google')->getAdapter()->getService();
        $permission = new \Google_Service_Drive_Permission();
        $permission->setRole('reader');
        $permission->setType('anyone');
        $permission->setAllowFileDiscovery(false);
        $permissions = $service->permissions->create($file['basename'], $permission);

		$data=Storage::disk('google')->get($file['path']);

		$result="data:".$file['mimetype'].";base64,".base64_encode($data);

		$array=array([
			'id' =>$file['basename'],
			'data' =>$result,
			'filename'=>$file['name']
		]);

		return $array;
	}


	public static function getImagePhoto($idUser, $Directory, $filename)
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
		//set permission images
		$service = Storage::disk('google')->getAdapter()->getService();
        $permission = new \Google_Service_Drive_Permission();
        $permission->setRole('reader');
        $permission->setType('anyone');
        $permission->setAllowFileDiscovery(false);
        $permissions = $service->permissions->create($file['basename'], $permission);

		//$data=Storage::disk('google')->get($file['path']);

		//$result="data:".$file['mimetype'].";base64,".base64_encode($data);

		return $file['basename'];
	}

	public static function getListImage($idUser, $Directory)
	{
		$dir = "/";
		$recursive = false;
		$contents = collect(Storage::disk('google')->list($dir, $recursive));
		$dir = $contents->where('type', '=', 'dir')
						->where('filename', '=', $idUser)
						->first();

		$contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
		$dir = $contents->where('type', '=', 'dir')
						->where('filename', '=', $Directory)
						->first();

		$arrFileName = array();

		// $arrFileName = TaiKhoan::with(['id', ->	where('chitiet_album.hinhanh_album')->get();
		// $arrr = TaiKhoan::where(function($query) use $a{
		// 	$query->where
		// })
		//SELECT 	 chitiet_album.hinhanh_album
		// from taikhoan, album, chitiet_album, likealbum
		// where taikhoan.id = album.taikhoan_id and taikhoan.id = 11
		// and album.id = chitiet_album.album_id and album.id = 135
		// and likealbum.album_id = album.id

	}

	// public static function getOneFileImageSetDropZone($idUser, $Directory, $filename)
	// {

	// 	$dir = '/';
	// 	$recursive = false;
	// 	$contents = collect(Storage::disk('google')->listContents($dir, $recursive));
	// 	$dir = $contents->where('type', '=', 'dir')
	// 					->where('filename', '=', $idUser) 
	// 					->first();

	// 	$contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
	// 	$dir = $contents->where('type', '=', 'dir')
 //                        ->where('filename', '=', $Directory)
 //                        ->first();
	// 	$contents =collect(Storage::disk('google')->ListContents($dir['path'],$recursive));
	// 	$file=$contents
	// 				->where('type','=','file')
	// 				->where('filename','=',pathinfo($filename,PATHINFO_FILENAME))
	// 				->where('extension','=',pathinfo($filename,PATHINFO_EXTENSION))
	// 				->first();
	// 	//set permission images
	// 	$service = Storage::disk('google')->getAdapter()->getService();
 //        $permission = new \Google_Service_Drive_Permission();
 //        $permission->setRole('reader');
 //        $permission->setType('anyone');
 //        $permission->setAllowFileDiscovery(false);
 //        $permissions = $service->permissions->create($file['basename'], $permission);

	// 	$data=Storage::disk('google')->get($file['path']);

	// 	//$result="data:".$file['mimetype'].";base64,".base64_encode($data);

	// 	$array=array([
	// 		'id' =>$file['basename'],
	// 		'data' =>$data,
	// 		'filename'=>$file['name'],
	// 		'mimetype'=>$file['mimetype'],
	// 		'size'=>$file['size']
	// 	]);

	// 	return $data ;
	// }
}