<?php  
	namespace App\Services;
	use Illuminate\Support\ServiceProvider;
	use App\Providers\GoogleDriveServiceProvider;
	use App\TaiKhoan;
	use Storage;
	use File;
	/**
	 * 
	 */
	class FolderGoogleDriveService 
	{
		public static function createFoderGoogleDriveIdUser($idUser){
			Storage::disk('google')->makeDirectory($idUser);
	        $dir = '/';
	        $recursive = false;
	        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
	        $dir = $contents->where('type', '=', 'dir')
	                        ->where('filename', '=', $idUser)
	                        ->first(); // There could be duplicate directory names!
	        if ( ! $dir) {
	        }
	        Storage::disk('google')->makeDirectory($dir['path'].'/Photo');
	        Storage::disk('google')->makeDirectory($dir['path'].'/Avatar');

	        $filePath = "image/avatar.png";
	        $fileData = File::get($filePath);
	        $contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
	        $dir = $contents->where('type','=','dir')
	        				->where('filename','=','Avatar')
	        				->first();
	        Storage::disk('google')->put($dir['path'].'/avatar.png', $fileData);
		}

		public static function createSubFoderGoogleDrive($idUser, $tieude){ // tao thu muc ten album 
			$dir = '/';
	        $recursive = false;
	        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
	        $dir = $contents->where('type', '=', 'dir')
	                        ->where('filename', '=', $idUser)
	                        ->first(); // There could be duplicate directory names!
	        if ( ! $dir) {
	        }
	        Storage::disk('google')->makeDirectory($dir['path'].'/'.$tieude);

	        $root = "";
	        foreach ($contents as $key => $value) {
	            if($value['name'] == $tieude)
	                $root = $value['path'];
	        }
	        return $root;
		}

		public static function getPathFolderAlbumGoogleDrive($idUser, $tieude, $root){// lay duong dan thu muc album
			$dirSub = '/'.$root.'/';
	        $recursiveSub = true;
	        $contentsSub = collect(Storage::disk('google')->listContents($dirSub, $recursiveSub));
	        $dirSub = $contentsSub->where('type', '=', 'dir')
	                            ->where('filename', '=', $tieude)
	                            ->first();
	        return $dirSub['path'];
		}

		public static function getImageOfAlbumGoogleDrive($idUser){

			$dir = '/';
	        $recursive = false;
			$contents = collect(Storage::disk('google')->listContents($dir, $recursive));
			$dir = $contents->where('type', '=', 'dir')
	                        ->where('filename', '=', $idUser) // vao thu muc id tren gg
	                        ->first();
	        $contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
			$dir = $contents->where('type', '=', 'dir')
	                        ->where('filename', '!==', 'Photo')
	                        ->where('filename', '!==', 'Avatar');
	        //dd($dir);
	        $array=array();
	        foreach ($dir as $key => $value) {
	        	$contentsSub = collect(Storage::disk('google')->listContents($value['path'], $recursive));
		    	$file = $contentsSub->where('type','=','file')->first();
		    	array_push($array,['ten_album'=>$value['name'],'data'=> $file['path'],'mimetype'=>$file['mimetype']]);
	        }
	        return $array;
		}
	} 
?>