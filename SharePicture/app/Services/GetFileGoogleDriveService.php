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



// choỏ này có thể cần iduser ko? vid get list ảnh , nếu 1 id có nhiều user rhif căng.nếu ko có id htif qua bên feddalbumservice phai foreach thư mujcc vầ đương nhieen phải forach iduser  ==> suy nghĩ
	// public static function getListImage($idUser, $Directory)
	// {
	// 	$dir = "/";
	// 	$recursive = false;
	// 	$contents = collect(Storage::disk('google')->list($dir, $recursive));
	// 	$dir = $contents->where('type', '=', 'dir')
	// 					->where('filename', '=', $idUser)
	// 					->first();

	// 	$contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
	// 	$dir = $contents->where('type', '=', 'dir')
	// 					->where('filename', '=', $Directory);

	// 	$arrFileName = array();

	// 	$arrFileName = TaiKhoan::with('taikhoan', 'album', 'chitiet_album')
	// 	 							->select('chitiet_album.hinhanh_album')->get();// ten hinh o csdl

	// 	$contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
	// 	$list = array();

	// 	foreach ($arrFileName as $value) {
	// 		$file = $contents->where('type','=','file')
	// 						-> where('filename','=',pathinfo($value['hinhanh_album'], PATHINFO_FILENAME))
	// 						->where('extension','=',pathinfo($value['hinhanh_album'],PATHINFO_EXTENSION))
	// 						->get();
	// 		$service = Storage::disk('google')->getAdapter()->getService();
	// 		$permission = new \Google_Service_Drive_Permission();
	//         $permission->setRole('reader');
	//         $permission->setType('anyone');
	//         $permission->setAllowFileDiscovery(false);
	//         $permissions = $service->permissions->create($file['basename'], $permission);
	//         array_push($list, $file['basename']);
	// 	}
	// 	return $list;
	// }


	public static function getListImage($idUser)
	{
		$dir = "/";
		$recursive = false;
		$contents = collect(Storage::disk('google')->list($dir, $recursive));
		$dir = $contents->where('type', '=', 'dir')
						->where('filename', '=', $idUser)
						->first();

		$contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
		$dir = $contents->where('type', '=', 'dir')
	                    ->where('filename', '!==', 'Photo')
	                    ->where('filename', '!==', 'Avatar');

		$arrFileName = array();

		$arrFileName = TaiKhoan::with('taikhoan', 'album', 'chitiet_album')
		 							->select(['taikhoan.id','album.id','album.tieude_album','chitiet_album.hinhanh_album'])->get();// ten hinh o csdl

		$contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
		$list = array();
		$file;

		foreach ($arrFileName as $value) {
			$file = $contents->where('type','=','file')
							-> where('filename','=',pathinfo($value['hinhanh_album'], PATHINFO_FILENAME))
							->where('extension','=',pathinfo($value['hinhanh_album'],PATHINFO_EXTENSION))
							->get();
			$service = Storage::disk('google')->getAdapter()->getService();
			$permission = new \Google_Service_Drive_Permission();
	        $permission->setRole('reader');
	        $permission->setType('anyone');
	        $permission->setAllowFileDiscovery(false);
	        $permissions = $service->permissions->create($file['basename'], $permission);
	        array_push($list, $file['basename']);
		}
		return $list;
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