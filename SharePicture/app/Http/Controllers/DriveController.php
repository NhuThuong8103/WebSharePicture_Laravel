<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Components\Google_Client;

use Google_Service_Drive;

use App\ChitietAlbum;

class DriveController extends Controller
{
    protected $client;

    public function __construct(GoogleClient $client)
    {
        $this->client = $client->getClient();
    }

    public function uploadPhoto_Thuong()
    {
        //return view('newphoto');
    }

    public function store(Request $request)
	{
	    // if ($request->hasFile('pic')) {
	    //     $imageID = $this->getImageID($request->file('pic'));
	    //     echo "File ID = ".$imageID;
	    //     exit;
	    // }
	    ChitietAlbum::create($request->all());
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
