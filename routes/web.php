<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\CrudController;


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
Route::get('/','App\Http\Controllers\SongController@index');

Route::get('/home', 'App\Http\Controllers\SongController@index');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::get('/register','App\Http\Controllers\RegisterController@index')->middleware('guest');

Route::post('/login','App\Http\Controllers\LoginController@authenticate');

Route::post('/logout', function(){
    Auth::logout();
    request()->session()->invalidate();
    return redirect('/home');
});

//Mientras tanto
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->middleware('auth');

Route::get('/playlist', function () {
    return view('playlist');
})->name('playlist');

/*Route::get('/upload_song', function () {
    return view('upload_song');
})->name('upload_song');*/

Route::get('/upload_song', 'App\Http\Controllers\Upload_songController@index');

Route::get('/create_role', function () {
    return view('create_role');
})->name('create_role');

Route::get('/create_payment_method', function () {
    return view('create_payment_method');
})->name('create_payment_method');

Route::get('/create_album', function () {
    return view('create_album');
})->name('create_album');

Route::get('/play_bar', function () {
    return view('play_bar');
});

Route::get('/favsongs', 'App\Http\Controllers\FavSongController@index')->middleware('auth');

Route::get('/songranking', 'App\Http\Controllers\SongrankingController@index')->middleware('auth'); 

Route::get('/crud', 'App\Http\Controllers\AdmincrudController@index');


// USER
Route::get('/crud/user_crud/user_index', 'App\Http\Controllers\AdmincrudController@user_index');
Route::get('/crud/user_crud/user_create', function () {
    return view('/crud/user_crud/user_create');
});
Route::get('/crud/user_crud/user_update', function () {
    return view('/crud/user_crud/user_update');
});

Route::get('/crud/user_crud/user_show', function () {
    return view('/crud/user_crud/user_show');
});

// ROLE
Route::get('/crud/role_crud/role_index', 'App\Http\Controllers\AdmincrudController@role_index');
Route::get('/crud/role_crud/role_create', function () {
    return view('/crud/role_crud/role_create');
});
Route::get('/crud/role_crud/role_update', function () {
    return view('/crud/role_crud/role_update');
});

 // ALBUM

Route::get('/crud/album_crud/album_index', 'App\Http\Controllers\AdmincrudController@album_index');
Route::get('/crud/album_crud/album_create', function () {
    return view('/crud/album_crud/album_create');
});
Route::get('/crud/album_crud/album_update', function () {
    return view('/crud/album_crud/album_update');
});

Route::get('/crud/album_crud/album_show', function () {
    return view('/crud/album_crud/album_show');
});


Route::get('/home','App\Http\Controllers\SongController@index');
//Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')->middleware('auth');
//Route::post('/checkout', 'App\Http\Controllers\CheckoutController@store')->middleware('auth');

Route::get('/albums','App\Http\Controllers\AlbumController@index');
Route::get('/albums/{id}','App\Http\Controllers\AlbumController@show');
Route::post('/albums/create','App\Http\Controllers\AlbumController@store');
Route::post('/albums/create2','App\Http\Controllers\AlbumController@create');
Route::get('/albums/edit/{id}','App\Http\Controllers\AlbumController@edit');
Route::put('/albums/update/{id}','App\Http\Controllers\AlbumController@update');
Route::put('/albums/delete/{id}','App\Http\Controllers\AlbumController@delete');

Route::get('/follows','App\Http\Controllers\FollowController@index');
Route::get('/follows/{id}','App\Http\Controllers\FollowController@show');
Route::post('/follows/create','App\Http\Controllers\FollowController@store');
//Route::get('/follows/edit/{id}','App\Http\Controllers\FollowController@edit');
Route::put('/follows/update/{id}','App\Http\Controllers\FollowController@update');
Route::put('/follows/delete/{id}','App\Http\Controllers\FollowController@delete');

Route::get('/genres','App\Http\Controllers\GenreController@index');
Route::get('/genres/{id}','App\Http\Controllers\GenreController@show');
Route::post('/genres/create','App\Http\Controllers\GenreController@store');
//Route::get('/genres/edit/{id}','App\Http\Controllers\GenreController@edit');
Route::put('/genres/update/{id}','App\Http\Controllers\GenreController@update');
Route::put('/genres/delete/{id}','App\Http\Controllers\GenreController@delete');

Route::get('/likes','App\Http\Controllers\LikeController@index');
Route::get('/likes/{id}','App\Http\Controllers\LikeController@show');
Route::post('/likes/create','App\Http\Controllers\LikeController@store');
//Route::get('/likes/edit/{id}','App\Http\Controllers\LikeController@edit');
Route::put('/likes/update/{id}','App\Http\Controllers\LikeController@update');
Route::put('/likes/delete/{id}','App\Http\Controllers\LikeController@delete');

Route::get('/locations','App\Http\Controllers\LocationController@index');
Route::get('/locations/{id}','App\Http\Controllers\LocationController@show');
Route::post('/locations/create','App\Http\Controllers\LocationController@store');
//Route::get('/locations/edit/{id}','App\Http\Controllers\LocationController@edit');
Route::put('/locations/update/{id}','App\Http\Controllers\LocationController@update');
Route::put('/locations/delete/{id}','App\Http\Controllers\LocationController@delete');

Route::get('/payment_methods','App\Http\Controllers\Payment_methodController@index');
Route::get('/payment_methods/{id}','App\Http\Controllers\Payment_methodController@show');
Route::post('/payment_methods/create','App\Http\Controllers\Payment_methodController@store');
//Route::get('/payment_methods/edit/{id}','App\Http\Controllers\Payment_methodsController@edit');
Route::put('/payment_methods/update/{id}','App\Http\Controllers\Payment_methodController@update');
Route::put('/payment_methods/delete/{id}','App\Http\Controllers\Payment_methodController@delete');

Route::get('/permissions','App\Http\Controllers\PermissionController@index');
Route::get('/permissions/{id}','App\Http\Controllers\PermissionController@show');
Route::post('/permissions/create','App\Http\Controllers\PermissionController@store');
//Route::get('/permissions/edit/{id}','App\Http\Controllers\PermissionsController@edit');
Route::put('/permissions/update/{id}','App\Http\Controllers\PermissionController@update');
Route::put('/permissions/delete/{id}','App\Http\Controllers\PermissionController@delete');

Route::get('/playlists','App\Http\Controllers\PlaylistController@index');
Route::get('/playlists/{id}','App\Http\Controllers\PlaylistController@show');
Route::post('/playlists/create','App\Http\Controllers\PlaylistController@store');
//Route::get('/playlists/edit/{id}','App\Http\Controllers\PlaylistController@edit');
Route::put('/playlists/update/{id}','App\Http\Controllers\PlaylistController@update');
Route::put('/playlists/delete/{id}','App\Http\Controllers\PlaylistController@delete');

Route::get('/rates','App\Http\Controllers\RateController@index');
Route::get('/rates/{id}','App\Http\Controllers\RateController@show');
Route::post('/rates/create','App\Http\Controllers\RateController@store');
//Route::get('/rates/edit/{id}','App\Http\Controllers\RateController@edit');
Route::put('/rates/update/{id}','App\Http\Controllers\RateController@update');
Route::put('/rates/delete/{id}','App\Http\Controllers\RateController@delete');

Route::get('/receipts','App\Http\Controllers\ReceiptController@index');
Route::get('/receipts/{id}','App\Http\Controllers\ReceiptController@show');
Route::post('/receipts/create','App\Http\Controllers\ReceiptController@store');
Route::get('/receipts/edit/{id}','App\Http\Controllers\ReceiptController@edit');
Route::put('/receipts/update/{id}','App\Http\Controllers\ReceiptController@update');
Route::put('/receipts/delete/{id}','App\Http\Controllers\ReceiptController@delete');

Route::get('/roles','App\Http\Controllers\RoleController@index');
Route::get('/roles/{id}','App\Http\Controllers\RoleController@show');
Route::post('/roles/create','App\Http\Controllers\RoleController@store');
Route::put('/roles/update/{id}','App\Http\Controllers\RoleController@update');
Route::get('/roles/edit/{id}','App\Http\Controllers\RoleController@edit');
Route::put('/roles/delete/{id}','App\Http\Controllers\RoleController@delete');

Route::get('/song_genres','App\Http\Controllers\Song_genreController@index');
Route::get('/song_genres/{id}','App\Http\Controllers\Song_genreController@show');
Route::post('/song_genres/create','App\Http\Controllers\Song_genreController@store');
//Route::get('/song_genres/edit/{id}','App\Http\Controllers\Song_genreController@edit');
Route::put('/song_genres/update/{id}','App\Http\Controllers\Song_genreController@update');
Route::put('/song_genres/delete/{id}','App\Http\Controllers\Song_genreController@delete');

Route::get('/song_playlists','App\Http\Controllers\Song_playlistController@index');
Route::get('/song_playlists/{id}','App\Http\Controllers\Song_playlistController@show');
Route::post('/song_playlists/create','App\Http\Controllers\Song_playlistController@store');
//Route::get('/song_playlist/edit/{id}','App\Http\Controllers\Song_playlistController@edit');
Route::put('/song_playlists/update/{id}','App\Http\Controllers\Song_playlistController@update');
Route::put('/song_playlists/delete/{id}','App\Http\Controllers\Song_playlistController@delete');

Route::get('/songs','App\Http\Controllers\SongController@index');
Route::get('/songs/{id}','App\Http\Controllers\SongController@show');
Route::post('/songs/create','App\Http\Controllers\SongController@store'); 
//Route::get('/songs/edit/{id}','App\Http\Controllers\SongController@edit');
Route::put('/songs/update/{id}','App\Http\Controllers\SongController@update');
Route::put('/songs/delete/{id}','App\Http\Controllers\SongController@delete');

Route::get('/users_role','App\Http\Controllers\User_roleController@index');
Route::get('/users_role/{id}','App\Http\Controllers\User_roleController@show');
Route::post('/users_role/create','App\Http\Controllers\User_roleController@store');
//Route::get('/users_role/edit/{id}','App\Http\Controllers\User_roleController@edit');
Route::put('/users_role/update/{id}','App\Http\Controllers\User_roleController@update');
Route::put('/users_role/delete/{id}','App\Http\Controllers\User_roleController@delete');

Route::get('/users','App\Http\Controllers\UserController@index');
Route::get('/users/{id}','App\Http\Controllers\UserController@show');
Route::post('/users/create','App\Http\Controllers\UserController@store');
Route::post('/users/create2','App\Http\Controllers\UserController@create');
Route::get('/users/edit/{id}','App\Http\Controllers\UserController@edit');
Route::put('/users/update/{id}','App\Http\Controllers\UserController@update');
Route::put('/users/delete/{id}','App\Http\Controllers\UserController@delete');

Route::get('/payment_methods','App\Http\Controllers\Payment_methodController@index');
Route::get('/payment_methods/{id}','App\Http\Controllers\Payment_methodController@show');
Route::post('/payment_methods/create','App\Http\Controllers\Payment_methodController@store');
//Route::get('/payment_methods/edit/{id}','App\Http\Controllers\Payment_methodController@edit');
Route::put('/payment_methods/update/{id}','App\Http\Controllers\Payment_methodController@update');
Route::put('/payment_methods/delete/{id}','App\Http\Controllers\Payment_methodController@delete');