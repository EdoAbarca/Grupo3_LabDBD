<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

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
//Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')->middleware('auth');
//Route::post('/checkout', 'App\Http\Controllers\CheckoutController@store')->middleware('auth');

Route::get('/albums','App\Http\Controllers\AlbumController@index');
Route::get('/albums/{id}','App\Http\Controllers\AlbumController@show');
Route::post('/albums/create','App\Http\Controllers\AlbumController@store');
Route::put('/albums/update/{id}','App\Http\Controllers\AlbumController@update');
Route::delete('/albums/delete/{id}','App\Http\Controllers\AlbumController@delete');

Route::get('/follows','App\Http\Controllers\FollowController@index');
Route::get('/follows/{id}','App\Http\Controllers\FollowController@show');
Route::post('/follows/create','App\Http\Controllers\FollowController@store');
Route::put('/follows/update/{id}','App\Http\Controllers\FollowController@update');
Route::delete('/follows/delete/{id}','App\Http\Controllers\FollowController@delete');

Route::get('/genres','App\Http\Controllers\GenreController@index');
Route::get('/genres/{id}','App\Http\Controllers\GenreController@show');
Route::post('/genres/create','App\Http\Controllers\GenreController@store');
Route::put('/genres/update/{id}','App\Http\Controllers\GenreController@update');
Route::delete('/genres/delete/{id}','App\Http\Controllers\GenreController@delete');

Route::get('/likes','App\Http\Controllers\LikeController@index');
Route::get('/likes/{id}','App\Http\Controllers\LikeController@show');
Route::post('/likes/create','App\Http\Controllers\LikeController@store');
Route::put('/likes/update/{id}','App\Http\Controllers\LikeController@update');
Route::delete('/likes/delete/{id}','App\Http\Controllers\LikeController@delete');

Route::get('/locations','App\Http\Controllers\LocationController@index');
Route::get('/locations/{id}','App\Http\Controllers\LocationController@show');
Route::post('/locations/create','App\Http\Controllers\LocationController@store');
Route::put('/locations/update/{id}','App\Http\Controllers\LocationController@update');
Route::delete('/locations/delete/{id}','App\Http\Controllers\LocationController@delete');

Route::get('/payment_methods','App\Http\Controllers\Payment_methodController@index');
Route::get('/payment_methods/{id}','App\Http\Controllers\Payment_methodController@show');
Route::post('/payment_methods/create','App\Http\Controllers\Payment_methodController@store');
Route::put('/payment_methods/update/{id}','App\Http\Controllers\Payment_methodController@update');
Route::delete('/payment_methods/delete/{id}','App\Http\Controllers\Payment_methodController@delete');

Route::get('/permissions','App\Http\Controllers\PermissionController@index');
Route::get('/permissions/{id}','App\Http\Controllers\PermissionController@show');
Route::post('/permissions/create','App\Http\Controllers\PermissionController@store');
Route::put('/permissions/update/{id}','App\Http\Controllers\PermissionController@update');
Route::delete('/permissions/delete/{id}','App\Http\Controllers\PermissionController@delete');

Route::get('/playlists','App\Http\Controllers\PlaylistController@index');
Route::get('/playlists/{id}','App\Http\Controllers\PlaylistController@show');
Route::post('/playlists/create','App\Http\Controllers\PlaylistController@store');
Route::put('/playlists/update/{id}','App\Http\Controllers\PlaylistController@update');
Route::delete('/playlists/delete/{id}','App\Http\Controllers\PlaylistController@delete');

Route::get('/rates','App\Http\Controllers\RateController@index');
Route::get('/rates/{id}','App\Http\Controllers\RateController@show');
Route::post('/rates/create','App\Http\Controllers\RateController@store');
Route::put('/rates/update/{id}','App\Http\Controllers\RateController@update');
Route::delete('/rates/delete/{id}','App\Http\Controllers\RateController@delete');

Route::get('/receipts','App\Http\Controllers\ReceiptController@index');
Route::get('/receipts/{id}','App\Http\Controllers\ReceiptController@show');
Route::post('/receipts/create','App\Http\Controllers\ReceiptController@store');
Route::put('/receipts/update/{id}','App\Http\Controllers\ReceiptController@update');
Route::delete('/receipts/delete/{id}','App\Http\Controllers\ReceiptController@delete');

Route::get('/role_permissions','App\Http\Controllers\Role_permissionController@index');
Route::get('/role_permissions/{id}','App\Http\Controllers\Role_permissionController@show');
Route::post('/role_permissions/create','App\Http\Controllers\Role_permissionController@store');
Route::put('/role_permissions/update/{id}','App\Http\Controllers\Role_permissionController@update');
Route::delete('/role_permissions/delete/{id}','App\Http\Controllers\Role_permissionController@delete');

Route::get('/roles','App\Http\Controllers\RoleController@index');
Route::get('/roles/{id}','App\Http\Controllers\RoleController@show');
Route::post('/roles/create','App\Http\Controllers\RoleController@store');
Route::put('/roles/update/{id}','App\Http\Controllers\RoleController@update');
Route::delete('/roles/delete/{id}','App\Http\Controllers\RoleController@delete');

Route::get('/song_genres','App\Http\Controllers\Song_genreController@index');
Route::get('/song_genres/{id}','App\Http\Controllers\Song_genreController@show');
Route::post('/song_genres/create','App\Http\Controllers\Song_genreController@store');
Route::put('/song_genres/update/{id}','App\Http\Controllers\Song_genreController@update');
Route::delete('/song_genres/delete/{id}','App\Http\Controllers\Song_genreController@delete');

Route::get('/song_playlists','App\Http\Controllers\Song_playlistController@index');
Route::get('/song_playlists/{id}','App\Http\Controllers\Song_playlistController@show');
Route::post('/song_playlists/create','App\Http\Controllers\Song_playlistController@store');
Route::put('/song_playlists/update/{id}','App\Http\Controllers\Song_playlistController@update');
Route::delete('/song_playlists/delete/{id}','App\Http\Controllers\Song_playlistController@delete');

Route::get('/songs','App\Http\Controllers\SongController@index');
Route::get('/songs/{id}','App\Http\Controllers\SongController@show');
Route::post('/songs/create','App\Http\Controllers\SongController@store');
Route::put('/songs/update/{id}','App\Http\Controllers\SongController@update');
Route::delete('/songs/delete/{id}','App\Http\Controllers\SongController@delete');

Route::get('/users_role','App\Http\Controllers\User_roleController@index');
Route::get('/users_role/{id}','App\Http\Controllers\User_roleController@show');
Route::post('/users_role/create','App\Http\Controllers\User_roleController@store');
Route::put('/users_role/update/{id}','App\Http\Controllers\User_roleController@update');
Route::delete('/users_role/delete/{id}','App\Http\Controllers\User_roleController@delete');

Route::get('/users','App\Http\Controllers\UserController@index');
Route::get('/users/{id}','App\Http\Controllers\UserController@show');
Route::post('/users/create','App\Http\Controllers\UserController@store');
Route::put('/users/update/{id}','App\Http\Controllers\UserController@update');
Route::delete('/users/delete/{id}','App\Http\Controllers\UserController@delete');

Route::get('/payment_methods','App\Http\Controllers\Payment_methodController@index');
Route::get('/payment_methods/{id}','App\Http\Controllers\Payment_methodController@show');
Route::post('/payment_methods/create','App\Http\Controllers\Payment_methodController@store');
Route::put('/payment_methods/update/{id}','App\Http\Controllers\Payment_methodController@update');
Route::delete('/payment_methods/delete/{id}','App\Http\Controllers\Payment_methodController@destroy');