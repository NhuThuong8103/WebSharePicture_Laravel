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
use DB;
use App\TaiKhoan;
use App\PhanQuyen;
use App\Album;



class LoginController extends BaseController
{
	public function showLogin(){
		return view('login');
	}

	function checkLogin(loginValidate $request){

		$validated = $request->validated();

		$userData=array(
			'email'			=>$request->get('email'),
			'password' 		=>$request->get('password')
		);

		if(Auth::attempt($userData)){
			if(Auth::user()->phephoatdong)
			{
				$phanquyen=new PhanQuyen();
				$taikhoan=new TaiKhoan();

				$kt = $phanquyen->loaiQuyen(Auth::user()->id_phanquyen);//lấy quyền đangư nhập 
				
				//update time login last
				$taikhoan->find(Auth::user()->id)->update(['thoigian_dncuoi' => Carbon::now('GMT+7')]);

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
		
		$validated=$request->validated();

		$email    =$request->get('emailre');
		$firstname=$request->get('firstname');
		$lastname =$request->get('lastname');
		$pass     =$request->get('passwordre');
		$repass   =$request->get('passconfirm');
		if($repass !=$pass){
			return back()->with('thongbao_register',"Wrong confirm password!!!");
		}

		$taikhoan = new TaiKhoan();

		if(!$taikhoan->checkExistEmail($email)){
			return back()->with('thongbao_register',"Email already exists");
		}

		Mail::to($email)->send(new SendMail($email));

		$phanquyen= new PhanQuyen();
		$id= $phanquyen->getID_SlugWithUser();
		TaiKhoan::create(array(
			'email'				=>$email,
			'password' 			=>Hash::make($pass),
			'thoigian_dncuoi'	=>Carbon::now('GMT+7'),
			'ho'				=>$lastname,
			'ten'				=>$firstname,
			'phephoatdong'		=>false,
			'id_phanquyen'		=>$id,
		));

		return back()->with('thongbao_registersuccess',"Please check your mail for active account :V"); 

	}

	function activeAccount($email){

		TaiKhoan::where('email',$email)->update(['phephoatdong'=>true]);

		return back()->with('thongbao_activesuccess',"Account actived, please login :V"); 
	}

	function getEmailForReset(resetPasswordValidate $request){
		
		$validated=$request->validated();

		$email = $request->get('email_reset');

		$taikhoan = new TaiKhoan();

		if($taikhoan->checkExistEmail($email)){
			return back()->with('thongbao_forgot',"Email not exist,Please enter the correct email");
		}

		Mail::to($email)->send(new SendMailResetPassword($email));

		return back()->with('thongbao_forgotsuccess',"Please check your mail for reset password!");
	}

	function viewResetPassword($email){
		return view('resetpassword',compact('email'));
	}

	function updatePasswordReset(updatePasswordValidate $request){
		
		$validated=$request->validated();

		$new_password = $request->get('new_password');
		$confirm_password = $request->get('confirm_password');
		$email = $request->get('email_reset');

		if($confirm_password != $new_password)
			return back()->with('thongbao_resetorror',"Password confirm must be the same as the password!");
		TaiKhoan::where('email',$email)->update(['password' => Hash::make($new_password) ]);
		
		return back()->with('thongbao_resetsuccess',"Password has been changed!");
	}


	function thuong(){
		$p = TaiKhoan::find(1)->Album()->first();
		//$p['so_like_album'];
		print_r($p['tieude_album']);
	}

}
