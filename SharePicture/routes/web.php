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
	return Redirect('/');

});

Route::get('/iconUser','LoginController@showIconUser')->name('iconUser');

Route::get('/','HomeController@showFeedPhoto');

Route::get('/index','HomeController@showFeedPhoto');

Route::get('/feedsAlbum',function(){
	return view('user.feedsalbum');
});

Route::group(['middleware' => 'checkAdmin','prefix' => '/admin' ],function(){
	Route::get('/',function(){
		return view('admin.managerPhotos');
	});

	Route::get('/index',function(){
		return view('admin.managerPhotos');
	});

	Route::get('/managerAlbums', function() {
	    return view('admin.managerAlbums');
	});

	Route::get('/managerUsers','ManagerUserController@index')->name('managerUserProfile');

	Route::post('/managerUsers/delete','ManagerUserController@deleteUser')->name('deleteUser');

	Route::get('/managerUsers/edit/{id}','ManagerUserController@editUser');

	Route::post('/managerUsers/edit/save','ManagerUserController@saveUserProfile')->name('saveUserProfile');


});	

//thuong

Route::group(['middleware' => 'ckUserLogin'], function() {
	Route::get('/profile','ProfileUserController@index')->name('usereditprofile');

	Route::post('/profile/editpassword','ProfileUserController@userEditPassword')->name('usereditpassword');

	Route::post('/profile/editinfo', 'ProfileUserController@userEditInformation')->name('usereditinfo');


	Route::get('/myalbums','AlbumUserController@loadAlbum');

	// Route::get('/myalbums/newalbum_upload', function(){
	// 	return view('user.new_album');
	// });
	Route::get('/myalbums/newalbum_upload', 'AlbumUserController@newalbum');



	Route::post('/myalbums/newalbum','AlbumUserController@saveNewAlbum'); // luu album

	Route::get('/myalbums/editalbum/{idAlbum}','AlbumUserController@editAlbum')->name('editAlbum');

	Route::post('/myalbums/updatealbum','AlbumUserController@updateAlbum')->name('updateAlbum');

	Route::post('/myalbums/deleteAlbum','AlbumUserController@deleteAlbum')->name('deleteAlbum');

	Route::post('/myalbums/createFile','AlbumUserController@test');

	Route::post('/myalbums/newalbum_upload', 'AlbumUserController@store')->name('dropzoneJs');

	Route::post('/myalbums/GetFileNameDelete', 'AlbumUserController@getFileName')->name('deleteFile');

	Route::get('/myalbums/editalbum', 'AlbumUserController@editAlbumUser');

	Route::get('/myphotos/newPhoto', function(){
		return view('user.newphoto');
	});

	Route::get('/myphotos','PhotoUserController@index');

	Route::post('/myphotos/savenewphoto','PhotoUserController@newPhoto')->name('savePhoto');
	//Route::post('projects/media', 'AlbumUserController@storeMedia')->name('projects.storeMedia');

	Route::get('/myphotos/editphoto/{idPhoto}','PhotoUserController@editPhoto')->name('editPhoto');

	Route::post('/myphotos/updatephoto','PhotoUserController@updatePhoto')->name('updatePhoto');

	Route::post('/myphotos/deletephoto','PhotoUserController@deletePhoto')->name('deletePhoto');

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

