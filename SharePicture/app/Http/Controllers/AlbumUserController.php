<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Providers\GoogleDriveServiceProvider;
use App\ChitietAlbum;
use App\Album;
use Auth;
use Storage;
use File;




class AlbumUserController extends BaseController
{
    private $drive;

    public function test(){
        $filePath = 'images/15751104793.png';
        $fileData = File::get($filePath);
        Storage::disk('google')->put('images', $fileData);
    }

    function createFolder($folder_name){
        $folder_meta = new Google_Service_Drive_DriveFile(array(
            'name' => $folder_name,
            'mimeType' => 'application/vnd.google-apps.folder'));
        // $folder = $this->drive->files->create($folder_meta, array(
        //     'fields' => 'id'));
        $folder = $drive->files->create($folder_meta, array(
            'fields' => 'id',
        ));
        return $folder->id;
    }

    public function saveNewAlbum(Request $request){
        
        $userID = Auth::user()->id;
        
        $request->validate([
            'tieude_album'      =>  'bail|required',
            'mota_album'        =>  'bail|required',
            'chedo_album'       =>  'bail|required',
        ]);

        $tieude = $request->get('tieude_album');
        $mota = $request->get('mota_album');
        $chedo = $request->get('chedo_album');
        $idUser = $userID;

        Album::create(array(
            'tieude_album'  =>$tieude,
            'mota_album'    =>$mota,
            'chedo_album'   =>$chedo,
            'taikhoan_id'   =>$idUser,

        ));

        #luu ten anh vao chi tiet album
        $idAlbum = Album::where('taikhoan_id', $userID)->max('id');

        $filePath = $userID."/";
        
        #luu ten file upload cua userid ra 1 mang
        $arr = array();
        if($handle = opendir($filePath)){
            while (false !== ($entry = readdir($handle))) {
                if($entry != "." && $entry != ".."){
                    array_push($arr,$entry);
                }
            }
            closedir($handle);
        }

        #duyet mang de luu vao chi tiet album
        foreach ($arr as $key => $value) {
            ChitietAlbum::create(array(
                'hinhanh_album'=>$value,
                'album_id'     =>$idAlbum,
            ));
        }



        # xong roi upload len driver va xoa: dung de xoa anh khi da upload thanh cong len driver

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
        Storage::disk('google')->makeDirectory($dir['path'].'/'.$tieude);
        Storage::disk('google')->makeDirectory($dir['path'].'/'.'Avatar');
        $root = "";
        foreach ($contents as $key => $value) {
            if($value['name'] == $tieude)
                $root = $value['path'];
        }
        //dd($root);
        $dirSub = '/'.$root.'/';
        $recursiveSub = true;
        $contentsSub = collect(Storage::disk('google')->listContents($dirSub, $recursiveSub));
        $dirSub = $contentsSub->where('type', '=', 'dir')
                            ->where('filename', '=', $tieude)
                            ->first();


        if ($handle = opendir($filePath)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {  
                    $fileData = File::get($userID.'/'.$entry);
                    //Storage::disk('google')->put($entry, $fileData);
                    Storage::disk('google')->put($dirSub['path'].'/'.$entry, $fileData);
                    File::delete($userID.'/'.$entry);
                }
            }
            closedir($handle);

        }
        //print_r($folder->name); Storage::cloud()->put($dir['path'].'/test.txt', 'Hello World');
    }


      

    public function store(Request $request){   
        $userID = Auth::user()->id;

        $image = $request->file('file');
        //$imageName = time().$image->getClientOriginalName();
        $imageName = $image->getClientOriginalName();
        
        $upload_success = $image->move($userID,$imageName);
        if ($upload_success) {

            return response()->json($upload_success, 200);
        }
        else {
            return response()->json('error', 400);
        }        
        
    }

    public function getFileName(Request $request){
        $userID = Auth::user()->id;
        $names = $request->name;
        $filePath = $userID."/";
        if($handle = opendir($filePath)){
            while (false !== ($entry = readdir($handle))) {
                if($entry == $names){
                    File::delete($userID.'/'.$entry);
                }
            }
            closedir($handle);
        }
    }


    



}
