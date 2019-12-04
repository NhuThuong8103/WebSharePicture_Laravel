<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FeedPhotoService;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showFeedPhoto()
    {
        $ok= FeedPhotoService::getFeedPhoto();

        //dd($ok);

        return view('user.feedsphoto')->with('value',$ok);
    }

    public function showFeedAlbum()
    {
       // $album = 
    }
}
