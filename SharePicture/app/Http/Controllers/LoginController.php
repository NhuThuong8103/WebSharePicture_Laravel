<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Carbon\Carbon;
use Session;
use Validator;
use Auth;
use Hash;
use DB;

class LoginController extends BaseController
{
	public function showLogin(){
		if(!Session::has('kt'))
			Session::put('kt','login');
		return view('login');
	}

	function checkLogin(Request $request){
		$request->session()->put('kt','login');
		Validator::make($request->all(), [
			'email'			=>'bail|required|email',
			'password'		=>'bail|required|min:6'
		])->validate();

		$userData=array(
			'email'			=>$request->get('email'),
			'password' 		=>$request->get('password')
		);

		if(Auth::attempt($userData)){
			if(Auth::user()->phephoatdong)
			{
				$kt=DB::table('taikhoan')
					->join('phanquyen','taikhoan.quyen_id','=','phanquyen.id')
					->where('taikhoan.quyen_id','=',Auth::user()->quyen_id)
					->where('taikhoan.email','=',Auth::user()->email)
					->select('phanquyen.loaiquyen')
					->get();
				if($kt[0]->loaiquyen==false)
				{
					return Redirect('index');
				}
				else {
					return Redirect('admin/index');
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

	function register(Request $request){
		$request->session()->put('kt','register');
		Validator::make($request->all(), [
			'emailre'		=>'bail|required|email',
			'firstname'		=>'bail|required|max:25',
			'lastname'		=>'bail|required|max:25',
			'password'		=>'bail|required|min:6|max:64',
			'passconfirm'	=>'bail|required|min:6|max:64'
		])->validate();
		$email=$request->get('emailre');
		$firstname=$request->get('firstname');
		$lastname=$request->get('lastname');
		$pass=$request->get('password');
		$repass=$request->get('passconfirm');
		if($repass !=$pass){
			return back()->with('thongbao_register',"Wrong confirm password!!!");
		}

		Mail::to($email)->send(new SendMail($email));

		DB::insert('insert into taikhoan (email, password,thoigian_dncuoi, ho,ten, phephoatdong,quyen_id) values (?, ?, ?, ?, ?, ?, ?)', [$email,Hash::make($pass), Carbon::now('GMT+7'),$lastname, $firstname,false,1]);
		return back()->with('thongbao_registersuccess',"Please check your mail for active account :V"); 

	}

	function activeAccount($email){
		DB::table('taikhoan')
        ->where('email', $email)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('phephoatdong' => true));  // update the record in the DB.

        Session::put('kt','login');

		return back()->with('thongbao_activesuccess',"Account actived, please login :V"); 
	}
}
