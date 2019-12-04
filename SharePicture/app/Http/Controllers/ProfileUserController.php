<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userEditInformationValidate;
use App\Http\Requests\userEditPasswordValidate;
use App\Services\GetFileGoogleDriveService;
use App\Services\ProfileUserService;
use App\Services\PutFileGoogleDriveService;
use App\Services\PhanQuyenService;
use Auth;


class ProfileUserController extends Controller
{
    function index(){
        $data=GetFileGoogleDriveService::getOneFileImage(Auth::user()->id, 'Avatar', Auth::user()->anhdaidien);

        if(Auth::user()->id_phanquyen==PhanQuyenService::getID_SlugWithUser()){

            return view('user.editprofile')->with(['data' => $data[0]['data'], 'path'=>$data[0]['id'], 'filename'=> $data[0]['filename'] ]);
        }else {
            return view('admin.editprofile')->with(['data' => $data[0]['data'], 'path'=>$data[0]['id'], 'filename'=> $data[0]['filename'] ]);
        }
    }

    function userEditInformation(userEditInformationValidate $request)
    {
        //$data= GetFileGoogleDriveService::getOneFileImage(Auth::user()->id,'Avatar','avatar.png');
    	$data=$request->ValueImageUser;
        $avatarImageUser=$request->avatarImageUser;
    	//get the base-64 from data
        $base64_str = substr($data, strpos($data, ",")+1);
        //decode base64 strings
        $image = base64_decode($base64_str);

        PutFileGoogleDriveService::putAvatarFileImage(Auth::user()->id, $avatarImageUser, $image);

    	$firstname=$request->firstname;
    	$lastname=$request->lastname;
    	$email=$request->email;
    	$idUser=Auth::user()->id;

    	ProfileUserService::editProfileInfoUser($idUser,$avatarImageUser, $firstname, $lastname, $email);

        return back()->with('thongbao',"Information profile has been changed");
    }

    function userEditPassword(userEditPasswordValidate $request)
    {
        $email=Auth::user()->email;

    	$ck=ProfileUserService::checkPassword($email,$request->password);
    	if (!$ck) {
        	return back()->with('thongbaofail',"Wrong current password :(");
    	}
    	
        ProfileUserService::editProfilePasswordUser(Auth::user()->id,$request->newpassword);

        return back()->with('thongbao',"Password profile has been changed");
    }
}
