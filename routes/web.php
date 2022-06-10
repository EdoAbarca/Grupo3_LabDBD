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
