<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\loginValidate;
use App\Http\Requests\registerValidate;
use App\Http\Requests\resetPasswordValidate;
use App\Http\Requests\updatePasswordValidate;
use Cookie;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailResetPassword;
use App\Mail\SendMail;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;
use App\Album;
use App\TaiKhoan;
use App\Services\PhanQuyenService;
use App\Services\TaiKhoanService;
use App\Services\FolderGoogleDriveService;
use App\Services\GetFileGoogleDriveService;


class LoginController extends BaseController
{
	public function logout()
	{
		Auth::logout();
		return Redirect('/');
	}

	public function showLogin(){
		return view('login');
	}

	function checkLogin(loginValidate $request){

		$userData=array(
			'email'			=>$request->get('email'),
			'password' 		=>$request->get('password')
		);

		if(Auth::attempt($userData)){
			if(Auth::user()->phephoatdong)
			{
				$kt=PhanQuyenService::loaiQuyen(Auth::user()->id_phanquyen);//lấy quyền đangư nhập 
				
				//update time login last
				TaiKhoan::find(Auth::user()->id)->update(['thoigian_dncuoi' => Carbon::now('GMT+7')]);

				if($kt=='admin')
				{
					return Redirect('admin/index');
				}
				else {
					return Redirect('index');
				}
			}
			else {
				return back()->with('thongbaoerror',"Account of you is temporarily locked!!!");
			}
		}
		else {
			return back()->with('thongbaoerror',"Wrong username or password!!!");
		}

	}

	function register(registerValidate $request){
		
		$email    =$request->get('emailre');
		$firstname=$request->get('firstname');
		$lastname =$request->get('lastname');
		$pass     =$request->get('passwordre');
		$repass   =$request->get('passconfirm');
		if($repass !=$pass){
			return back()->with('thongbao_register',"Wrong confirm password!!!");
		}

		if(!TaiKhoanService::checkExistEmail($email)){
			return back()->with('thongbao_register',"Email already exists");
		}

		Mail::to($email)->send(new SendMail($email));

		$id= PhanQuyenService::getID_SlugWithUser();
		TaiKhoan::create(array(
			'email'				=>$email,
			'password' 			=>Hash::make($pass),
			'thoigian_dncuoi'	=>Carbon::now('GMT+7'),
			'ho'				=>$lastname,
			'ten'				=>$firstname,
			'anhdaidien'		=>'avatar.png',
			'phephoatdong'		=>false,
			'id_phanquyen'		=>$id,
		));

		return back()->with('thongbao_registersuccess',"Please check your mail for active account :V"); 

	}

	function activeAccount($email){

		TaiKhoan::where('email',$email)->update(['phephoatdong'=>true]);

		$idUser = TaiKhoanService::getIdUser($email);

		FolderGoogleDriveService::createFoderGoogleDriveIdUser($idUser);

		return back()->with('thongbao_activesuccess',"Account actived, please login :V");

	}

	function getEmailForReset(resetPasswordValidate $request){
		
		$validated=$request->validated();

		$email = $request->get('email_reset');

		if(TaiKhoanService::checkExistEmail($email)){
			return back()->with('thongbao_forgot',"Email not exist,Please enter the correct email");
		}

		Mail::to($email)->send(new SendMailResetPassword($email));

		return back()->with('thongbao_forgotsuccess',"Please check your mail for reset password!");
	}

	function viewResetPassword($email){
		return view('resetpassword',compact('email'));
	}

	function updatePasswordReset(updatePasswordValidate $request){
		
		$new_password = $request->get('new_password');
		$confirm_password = $request->get('confirm_password');
		$email = $request->get('email_reset');

		if($confirm_password != $new_password)
			return back()->with('thongbao_resetorror',"Password confirm must be the same as the password!");
		TaiKhoan::where('email',$email)->update(['password' => Hash::make($new_password) ]);
		
		return back()->with('thongbao_resetsuccess',"Password has been changed!");
	}


	public function showIconUser()
	{
		$img=Auth::user()->anhdaidien;

		$result=GetFileGoogleDriveService::getIconAvatar(Auth::user()->id,'Avatar',$img);

		return response($result,200)->header('Content-Type', 'text/plain');
	}

}
