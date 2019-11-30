<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Google_Client;
use Illuminate\Http\Request;
use Google_Service_Drive;
use App\ChitietAlbum;
use App\Album;
use Auth;




class AlbumUserController extends BaseController
{


    protected $client;

    public function __construct(GoogleClient $client)
    {
        $this->client = $client->getClient();
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

        // $idAlbum = Album::find('taikhoan_id', $userID)->max('id');

        
    }


    public function storeMedia(Request $request)
    {
        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

       // $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);

    }    

    public function store(Request $request)
    {

        
        
          $image = $request->file('file');
          $imageName = time().$image->getClientOriginalName();
          $upload_success = $image->move(public_path('images'),$imageName);
        
        if ($upload_success) {

            return response()->json($upload_success, 200);
        }
        else {
            return response()->json('error', 400);
        }

        $imageID = $this->getImageID($request->file('file'));
        ChitietAlbum::create($request->all());

        ChitietAlbum::create(array_merge($request->all(), [
                // 'id' => $imageID,
                'hinhanh_album'=>$imageName,
                'album_id'  =>$idAlbum,
        ]));
        
        
    }

    private function getImageID($image)
    {
        $driveService = new Google_Service_Drive($this->client);

        try {
            $fileMetadata = new \Google_Service_Drive_DriveFile([
                'name' => time().'.'.$image->getClientOriginalExtension(),
            ]);
            $file = $driveService->files->create($fileMetadata, [
                'data' => file_get_contents($image->getRealPath()),
                'uploadType' => 'multipart',
                'fields' => 'id',
            ]);
            return $file->id;
        } catch (\Exception $e) {
            //
        }
    }



}
