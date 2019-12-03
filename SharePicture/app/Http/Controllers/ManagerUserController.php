<?php

namespace App\Http\Controllers;
use Hash;
use App\TaiKhoan;
use Illuminate\Http\Request;
use App\Services\ManagerUserService;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailUpdateActiveUser;
use App\Http\Requests\editUserProfileValidate;
use App\Services\GetFileGoogleDriveService;
use App\Services\PutFileGoogleDriveService;


class ManagerUserController extends Controller
{
    public function index(){
    	$arr=ManagerUserService::loadUser();
    	return view('admin.managerUsers')->with('array',$arr);
    }

    public function deleteUser(Request $request)
    {
    	ManagerUserService::deleteUser($request->id);
    }

    public function editUser($id)
    {
        $user=ManagerUserService::getProFileUser($id);

        //dd($user);

        $data=GetFileGoogleDriveService::getOneFileImage($id, 'Avatar', $user['anhdaidien']);

    	return view('admin.editUserProfile')->with(['user'=>$user, 'data' => $data[0]['data'], 'path'=>$data[0]['id'], 'filename'=> $data[0]['filename'] ]);
    }

    public function saveUserProfile(editUserProfileValidate $request)
    {
    	$id=$request->idUser;
        $data=$request->ValueImageUser;
        $avatarImageUser=$request->avatarImageUser;
        //get the base-64 from data
        $base64_str = substr($data, strpos($data, ",")+1);
        //decode base64 strings
        $image = base64_decode($base64_str);

        PutFileGoogleDriveService::putAvatarFileImage($id, $avatarImageUser, $image);

    	if($request->has('ckactive'))
    		$active=true;
    	else {
    		$active=false;
    	}

    	TaiKhoan::find($id)->update([
    		'anhdaidien'=> $avatarImageUser,
    		'email'		=>$request->email,
    		'password'	=>Hash::make($request->password),
    		'ho'		=>$request->lastname,
    		'ten'		=>$request->firstname,
    		'phephoatdong'=>$active
    	]);

        if($active==false){
            Mail::to($request->email)->send(new SendMailUpdateActiveUser($request->email));
        }

        return back()->with('thongbaosaveUserProfile',"User profile has been changed");

    }
}
