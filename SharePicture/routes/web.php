<?php
use App\Http\Middleware\checkAdminLogin;
use Auth;
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

	Route::get('/myphotos/newPhoto', function(){
		return view('user.newphoto');
	});

});





//Route::get('/index', 'HomeController@index')->name('home');
//Route::get('/index', 'HomeController@index');http://127.0.0.1:8000/login/activeaccount

Route::group(['prefix' => '/login'], function(){
	Route::get('','LoginController@showLogin');

	Route::post('/checkLogin','LoginController@checkLogin');

	Route::post('/register','LoginController@register');

	Route::get('/activeaccount/{email}','LoginController@activeAccount');
});

Route::post('/password/reset','LoginController@getEmailForReset')->name('postResetPassword'); // goi link

Route::get('/password/reset/{email}', 'LoginController@viewResetPassword'); // return view

Route::post('/password/reset_success','LoginController@updatePasswordReset');

// upload album

//Route::post('/myalbums/newalbum_upload/save','AlbumUserController@saveNewAlbum');

//Route::get('/myalbums/newalbum__upload/image', 'AlbumUserController@fileCreate');

 //Route::post('/myalbums/newalbum_upload','DetailAlbumUserController@fileStore');

// Route::post('/myalbums/newalbum/image/delete','ImageUploadController@fileDestroy');

//Route::post('/myalbums/image/upload', 'DetailAlbumUserController@fileUpload');


//Route::get('image/upload','ImageUploadController@fileCreate');
Route::post('/myalbums/newalbum_upload/store','DetailAlbumUserController@fileStore');
Route::post('/myalbums/delete','DetailAlbumUserController@fileDestroy');

//Route::remove('/myalbums/image/remove', 'DetailAlbumUserController@removeUpload');






//Auth::routes();
