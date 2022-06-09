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

