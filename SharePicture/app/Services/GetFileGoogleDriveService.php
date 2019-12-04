<?php  
namespace App\Services;
use Illuminate\Support\ServiceProvider;
use App\Providers\GoogleDriveServiceProvider;
use App\TaiKhoan;
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