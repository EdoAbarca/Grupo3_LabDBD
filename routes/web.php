<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/users','App\Http\Controllers\UserController@index');
Route::get('/users/{id}','App\Http\Controllers\UserController@show');
Route::post('/users/create','App\Http\Controllers\UserController@store');
Route::put('/users/update/{id}','App\Http\Controllers\UserController@update');
Route::delete('/users/delete/{id}','App\Http\Controllers\UserController@destroy');

Route::get('/roles','App\Http\Controllers\RoleController@index');
Route::get('/roles/{id}','App\Http\Controllers\RoleController@show');
Route::post('/roles/create','App\Http\Controllers\RoleController@store');
Route::put('/roles/update/{id}','App\Http\Controllers\RoleController@update');
Route::delete('/roles/delete/{id}','App\Http\Controllers\RoleController@destroy');

Route::get('/permissions','App\Http\Controllers\PermissionController@index');
Route::get('/permissions/{id}','App\Http\Controllers\PermissionController@show');
Route::post('/permissions/create','App\Http\Controllers\PermissionController@store');
Route::put('/permissions/update/{id}','App\Http\Controllers\PermissionController@update');

Route::get('/genres','App\Http\Controllers\GenreController@index');
Route::get('/genres/{id}','App\Http\Controllers\GenreController@show');
Route::post('/genres/create','App\Http\Controllers\GenreController@store');
Route::put('/genres/update/{id}','App\Http\Controllers\GenreController@update');

Route::get('/albums','App\Http\Controllers\AlbumController@index');
Route::get('/albums/{id}','App\Http\Controllers\AlbumController@show');
Route::post('/albums/create','App\Http\Controllers\AlbumController@store');
Route::put('/albums/update/{id}','App\Http\Controllers\AlbumController@update');

Route::get('/playlists','App\Http\Controllers\PlaylistController@index');
Route::get('/playlists/{id}','App\Http\Controllers\PlaylistController@show');
Route::post('/playlists/create','App\Http\Controllers\PlaylistController@store');
Route::put('/playlists/update/{id}','App\Http\Controllers\PlaylistController@update');

Route::get('/songs','App\Http\Controllers\SongController@index');
Route::get('/songs/{id}','App\Http\Controllers\SongController@show');
Route::post('/songs/create','App\Http\Controllers\SongController@store');
Route::put('/songs/update/{id}','App\Http\Controllers\SongController@update');

Route::get('/locations','App\Http\Controllers\LocationController@index');
Route::get('/locations/{id}','App\Http\Controllers\LocationController@show');
Route::post('/locations/create','App\Http\Controllers\LocationController@store');
Route::put('/locations/update/{id}','App\Http\Controllers\LocationController@update');

Route::get('/song_playlists','App\Http\Controllers\Song_playlistController@index');
Route::get('/song_playlists/{id}','App\Http\Controllers\Song_playlistController@show');
Route::post('/song_playlists/create','App\Http\Controllers\Song_playlistController@store');
Route::put('/song_playlists/update/{id}','App\Http\Controllers\Song_playlistController@update');

Route::get('/song_genres','App\Http\Controllers\Song_genreController@index');
Route::get('/song_genres/{id}','App\Http\Controllers\Song_genreController@show');
Route::post('/song_genres/create','App\Http\Controllers\Song_genreController@store');
Route::put('/song_genres/update/{id}','App\Http\Controllers\Song_genreController@update');

Route::get('/follows','App\Http\Controllers\FollowController@index');
Route::get('/follows/{id}','App\Http\Controllers\FollowController@show');
Route::post('/follows/create','App\Http\Controllers\FollowController@store');
Route::put('/follows/update/{id}','App\Http\Controllers\FollowController@update');