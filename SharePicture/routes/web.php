<?php
use App\Http\Middleware\checkAdminLogin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
	return view('user.home');
});


Route::get('/index', function () {
	return view('user.home');
});

Route::group(['middleware' => 'checkAdmin'],function(){
	Route::get('/admin/index',function(){
		return view('admin.home');
	});
});	

//thuong
Route::get('/myalbums', function(){
	return view('user.myalbums');
});

Route::get('/myalbums/newalbum_upload', function(){
	return view('user.new_album');
});

Route::get('/newphoto', function(){
	return view('user.newphoto');
});


Route::group(['prefix' => '/login'], function(){
	Route::get('','LoginController@showLogin');

	Route::post('/checkLogin','LoginController@checkLogin');

	Route::post('/register','LoginController@register');

	Route::get('/activeaccount/{email}','LoginController@activeAccount');
});

Route::post('/password/reset','LoginController@getEmailForReset')->name('postResetPassword'); // goi link

Route::get('/password/reset/{email}', 'LoginController@viewResetPassword'); // return view

Route::post('/password/reset_success','LoginController@updatePasswordReset');



Route::get('/my','LoginController@thuong');



//Auth::routes();
