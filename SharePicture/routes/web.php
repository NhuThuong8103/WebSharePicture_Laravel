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
Route::get('/logout','LoginController@logout');

Route::get('/iconUser','LoginController@showIconUser')->name('iconUser');

Route::get('/','HomeController@showFeedPhoto');

Route::get('/index','HomeController@showFeedPhoto');

Route::get('/feedsalbum', 'HomeController@showFeedAlbum');

Route::group(['middleware' => 'checkAdmin','prefix' => '/admin' ],function(){
	Route::get('/','ManagerPhotoController@showManagerPhoto');

	Route::get('/index','ManagerPhotoController@showManagerPhoto');

	Route::get('/managerPhotos/edit/{idphoto}','ManagerPhotoController@editPhoto');

	Route::post('/managerPhotos/edit/save','ManagerPhotoController@saveEditPhoto')->name('saveEditPhoto');

	Route::post('/managerPhotos/delete','ManagerPhotoController@deletePhotoUser')->name('deletePhotoUser');

	Route::get('/managerAlbums','ManagerAlbumController@showManagerAlbum');

	Route::get('/managerAlbums/edit/{idalbum}','ManagerAlbumController@editAlbum');

	Route::post('/managerAlbums/updateAlbum','ManagerAlbumController@updateAlbum');

	Route::post('/managerAlbums/deleteAlbum','ManagerAlbumController@deleteAlbum')->name('deleteAlbum');

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

	Route::get('/myalbums/newalbum_upload', 'AlbumUserController@newalbum');

	Route::post('/myalbums/newalbum','AlbumUserController@saveNewAlbum'); // luu album

	Route::get('/myalbums/editalbum/{idAlbum}','AlbumUserController@editAlbum')->name('editAlbum');

	Route::post('/myalbums/updatealbum','AlbumUserController@updateAlbum')->name('updateAlbum');

	Route::post('/myalbums/deleteAlbum','AlbumUserController@deleteAlbum')->name('deleteAlbum');

	Route::post('/myalbums/createFile','AlbumUserController@test');

	Route::post('/myalbums/newalbum_upload', 'AlbumUserController@store')->name('dropzoneJs');

	Route::post('/myalbums/GetFileNameDelete', 'AlbumUserController@getFileName')->name('deleteFile');

	Route::get('/myalbums/editalbum', 'AlbumUserController@editAlbumUser');

	Route::get('/myphotos/newPhoto','PhotoUserController@shownewphoto');

	Route::get('/myphotos','PhotoUserController@index');

	Route::post('/myphotos/savenewphoto','PhotoUserController@newPhoto')->name('savePhoto');
	//Route::post('projects/media', 'AlbumUserController@storeMedia')->name('projects.storeMedia');

	Route::get('/myphotos/editphoto/{idPhoto}','PhotoUserController@editPhoto')->name('editPhoto');

	Route::post('/myphotos/updatephoto','PhotoUserController@updatePhoto')->name('updatePhoto');

	Route::post('/myphotos/deletephoto','PhotoUserController@deletePhoto')->name('deletePhoto');

	Route::post('/myphotos/deletephotolocal','PhotoUserController@deletePhotoLocal')->name('deleteFileLocal');

	//Route::get('/myphotos/newPhoto/store','DriveController@store');

	Route::post('/likephoto','LikePhotoController@likePhoto')->name('likephoto');

	Route::post('/removelikephoto','LikePhotoController@removeLikePhoto')->name('removelikephoto');

	Route::post('/likealbum','LikeAlbumController@likeAlbum')->name('likealbum');

	Route::post('/removelikealbum','LikeAlbumController@removeLikeAlbum')->name('removelikealbum');


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

