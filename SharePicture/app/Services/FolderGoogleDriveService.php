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
	            //return 'Directory does not exist!';
	        }
	        Storage::disk('google')->makeDirectory($dir['path'].'/Photo');
	        Storage::disk('google')->makeDirectory($dir['path'].'/Avatar');

	        $root = "";
	        foreach ($contents as $key => $value) {
	            if($value['name'] == 'Photo')
	                $root = $value['path'];
	        }
	        $filePath = 'image/avatar.png';
	        $fileData = File::get($filePath);
	        $dirSub = '/'.$root.'/';
	        $recursiveSub = true;
	        $contentsSub = collect(Storage::disk('google')->listContents($dirSub, $recursiveSub));
	        $dirSub = $contentsSub->where('type', '=', 'dir')
	                            ->where('filename', '=', 'Avatar')
	                            ->first();
	        Storage::disk('google')->put($dirSub['path'].'/avatar.png', $fileData);	        
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
	}
?>