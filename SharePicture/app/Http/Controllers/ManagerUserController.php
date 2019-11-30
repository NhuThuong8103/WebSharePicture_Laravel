<?php

namespace App\Http\Controllers;
use Hash;
use App\TaiKhoan;
use Illuminate\Http\Request;
use App\Services\ManagerUserService;


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
    	return view('admin.editUserProfile')->with('user',ManagerUserService::getProFileUser($id));
    }

    public function saveUserProfile(Request $request)
    {
    	$id=$request->idUser;

    	if($request->has('ckactive'))
    		$active=true;
    	else {
    		$active=false;
    	}

    	TaiKhoan::find($id)->update([
    		'anhdaidien'=> $request->avatarImageUser,
    		'email'		=>$request->email,
    		'password'	=>Hash::make($request->password),
    		'ho'		=>$request->lastname,
    		'ten'		=>$request->firstname,
    		'phephoatdong'=>$active
    	]);

    }
}
