<?php
use App\Http\Middleware\checkAdminLogin;
//use Auth;
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
Route::get('/logout',function(){
	Auth::logout();
	return view('user.home');

});

Route::get('/', function () {
	return view('user.home');
});


Route::get('/index', function () {
	return view('user.home');
});

Route::get('/feedsAlbum',function(){
	return view('user.feedsalbum');
});

Route::group(['middleware' => 'checkAdmin','prefix' => '/admin' ],function(){
	Route::get('/',function(){
		return view('admin.home');
	});

	Route::get('/index',function(){
		return view('admin.home');
	});

	Route::get('/managerAlbums', function() {
	    return view('admin.managerAlbums');
	});

	Route::get('/managerUsers', function() {
	    return view('admin.managerUsers');
	});
});	

//thuong

Route::group(['middleware' => 'ckUserLogin'], function() {
	Route::get('/myphotos', function(){
		return view('user.myphotos');
	});

	Route::get('/myalbums', function(){
		return view('user.myalbums');
	});

	Route::get('/myalbums/newalbum_upload', function(){
		return view('user.new_album');
	});

	Route::post('/myalbums/newalbum_upload','AlbumUserController@saveNewAlbum'); // luu album

	Route::get('/myphotos/newPhoto', function(){
		return view('user.newphoto');
	});

	Route::post('projects/media', 'AlbumUserController@storeMedia')->name('projects.storeMedia');




	//Route::get('/myphotos/newPhoto/store','DriveController@store');

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

