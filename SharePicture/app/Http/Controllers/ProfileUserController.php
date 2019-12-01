<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userEditInformationValidate;
use App\Http\Requests\userEditPasswordValidate;
use App\Services\ProfileUserService;
use Auth;


class ProfileUserController extends Controller
{
    function userEditInformation(userEditInformationValidate $request)
    {
    	$data=$request->ValueImageUser;
    	// //get the base-64 from data
     //    $base64_str = substr($data['base64_image'], strpos($data['base64_image'], ",")+1);

        //decode base64 strings
        $image = base64_decode($data);
    	$avatarImageUser=$request->avatarImageUser;
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
