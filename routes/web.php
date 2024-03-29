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

Route::get('/', function () {
    return redirect('/home');
})->name('home');

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

Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')->middleware('auth');
Route::post('/checkout', 'App\Http\Controllers\CheckoutController@pay');

Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->middleware('auth');

// PLAY SONG
Route::get('/playing_song/{id}', 'App\Http\Controllers\Playing_songController@show');

Route::get('/playlist/{id}', 'App\Http\Controllers\PlaylistController@show')->middleware('auth');
Route::post('/playlist/{id}', 'App\Http\Controllers\Song_playlistController@deletePlaylistSong');

Route::get('/upload_song', 'App\Http\Controllers\Upload_songController@index')->middleware('artista'); //Esto sigue?

Route::get('/create_album', function () {
    return view('create_album');
})->name('create_album')->middleware('artista'); //Esto sigue?

// MY SONGS
Route::get('/songs/edit2/{id}','App\Http\Controllers\SongController@edit2')->middleware('artista');
Route::get('/my_songs/{id}', 'App\Http\Controllers\SongController@index2')->middleware('artista');
Route::put('/songs/update2/{id}','App\Http\Controllers\SongController@update2');

Route::get('update_song', function () {
    return view('update_song');
})->middleware('artista');

// FILTERS SONGS GENRE
Route::get('/songs_bygenre', function () {
    return view('/songs_bygenre');
})->middleware('auth');

Route::get('/songs_filter', 'App\Http\Controllers\Filter_genreController@songs_filter')->middleware('auth');
Route::get('/songs_bygenre/{id}', 'App\Http\Controllers\Filter_genreController@songs_bygenre')->middleware('auth');

// FILTERS SONGS LOCATION
Route::get('/songs_bylocation', function () {
    return view('/songs_bylocation');
})->middleware('auth');

Route::get('/locations_filter', 'App\Http\Controllers\Filter_locationController@locations_filter')->middleware('auth');
Route::get('/songs_bylocation/{id}', 'App\Http\Controllers\Filter_locationController@songs_bylocation')->middleware('auth');

// PLAY SONG
Route::get('/play_bar', function () {
    return view('play_bar');
})->middleware('auth');

Route::get('/favsongs', 'App\Http\Controllers\FavSongController@index')->middleware('auth');
Route::get('/favsongs/{id}', 'App\Http\Controllers\FavSongController@delete');

Route::get('/user_rates', 'App\Http\Controllers\User_ratesController@index')->middleware('auth');
Route::put('/user_rates/{id}', 'App\Http\Controllers\User_ratesController@delete');

Route::get('/user_playlists','App\Http\Controllers\User_playlistsController@index')->middleware('auth');
Route::get('/user_playlists/{id}','App\Http\Controllers\User_playlistsController@delete');

Route::get('/songranking', 'App\Http\Controllers\SongrankingController@index')->middleware('auth'); 


// UPDATE PROFILE
Route::get('profile/update_profile', function () {
    return view('profile/update_profile');
})->middleware('auth'); //¿Admin?

// ARTISTS
Route::get('/artists', 'App\Http\Controllers\ArtistController@index')->middleware('auth');
Route::get('/songsArtists/{id}', 'App\Http\Controllers\SongController@index3')->middleware('auth');

//CRUD
//Operaciones CRUD: ->middleware('admin');
//Operaciones artista: ->middleware('artista');
Route::get('/crud', 'App\Http\Controllers\AdmincrudController@index')->middleware('admin');

// USER
Route::get('/crud/user_crud/user_index', 'App\Http\Controllers\AdmincrudController@user_index')->middleware('admin');
Route::get('/crud/user_crud/user_create', function () {
    return view('/crud/user_crud/user_create');
})->middleware('admin');

Route::get('/crud/user_crud/user_update', function () {
    return view('/crud/user_crud/user_update');
})->middleware('admin');

Route::get('/crud/user_crud/user_show', function () {
    return view('/crud/user_crud/user_show');
})->middleware('admin');

// ROLE
Route::get('/crud/role_crud/role_index', 'App\Http\Controllers\AdmincrudController@role_index')->middleware('admin');
Route::get('/crud/role_crud/role_create', function () {
    return view('/crud/role_crud/role_create');
})->middleware('admin');
Route::get('/crud/role_crud/role_update', function () {
    return view('/crud/role_crud/role_update');
})->middleware('admin');
Route::get('/crud/role_crud/role_show', function () {
    return view('/crud/role_crud/role_show');
})->middleware('admin');

// LOCATION
Route::get('/crud/location_crud/location_index', 'App\Http\Controllers\AdmincrudController@location_index')->middleware('admin');
Route::get('/crud/location_crud/location_create', function () {
    return view('/crud/location_crud/location_create');
})->middleware('admin');
Route::get('/crud/location_crud/location_update', function () {
    return view('/crud/location_crud/location_update');
})->middleware('admin');
Route::get('/crud/location_crud/location_show', function () {
    return view('/crud/location_crud/location_show');
})->middleware('admin');

// GENRE
Route::get('/crud/genre_crud/genre_index', 'App\Http\Controllers\AdmincrudController@genre_index')->middleware('admin');
Route::get('/crud/genre_crud/genre_create', function () {
    return view('/crud/genre_crud/genre_create');
})->middleware('admin');
Route::get('/crud/genre_crud/genre_update', function () {
    return view('/crud/genre_crud/genre_update');
})->middleware('admin');
Route::get('/crud/genre_crud/genre_show', function () {
    return view('/crud/genre_crud/genre_show');
})->middleware('admin');

// PAYMENT_METHOD
Route::get('/crud/payment_method_crud/payment_method_index', 'App\Http\Controllers\AdmincrudController@payment_method_index')->middleware('admin');
Route::get('/crud/payment_method_crud/payment_method_create', function () {
    return view('/crud/payment_method_crud/payment_method_create');
})->middleware('admin');
Route::get('/crud/payment_method_crud/payment_method_update', function () {
    return view('/crud/payment_method_crud/payment_method_update');
})->middleware('admin');
Route::get('/crud/payment_method_crud/payment_method_show', function () {
    return view('/crud/payment_method_crud/payment_method_show');
})->middleware('admin');

// RATE
Route::get('/crud/rate_crud/rate_index', 'App\Http\Controllers\AdmincrudController@rate_index')->middleware('admin');
Route::get('/crud/rate_crud/rate_create', function () {
    return view('/crud/rate_crud/rate_create');
})->middleware('admin');
Route::get('/crud/rate_crud/rate_update', function () {
    return view('/crud/rate_crud/rate_update');
})->middleware('admin');
Route::get('/crud/rate_crud/rate_show', function () {
    return view('/crud/rate_crud/rate_show');
})->middleware('admin');

// SONG_GENRE
Route::get('/crud/song_genre_crud/song_genre_index', 'App\Http\Controllers\AdmincrudController@song_genre_index')->middleware('admin');
Route::get('/crud/song_genre_crud/song_genre_create', function () {
    return view('/crud/song_genre_crud/song_genre_create');
})->middleware('admin');
Route::get('/crud/song_genre_crud/song_genre_update', function () {
    return view('/crud/song_genre_crud/song_genre_update');
})->middleware('admin');
Route::get('/crud/song_genre_crud/song_genre_show', function () {
    return view('/crud/song_genre_crud/song_genre_show');
})->middleware('admin');

 // FOLLOW
 Route::get('/crud/follow_crud/follow_index', 'App\Http\Controllers\AdmincrudController@follow_index')->middleware('admin');
 Route::get('/crud/follow_crud/follow_create', function () {
     return view('/crud/follow_crud/follow_create');
 })->middleware('admin');
 Route::get('/crud/follow_crud/follow_update', function () {
     return view('/crud/follow_crud/follow_update');
 })->middleware('admin');
 Route::get('/crud/follow_crud/follow_show', function () {
     return view('/crud/follow_crud/follow_show');
 })->middleware('admin');

  // RECEIPT
  Route::get('/crud/receipt_crud/receipt_index', 'App\Http\Controllers\AdmincrudController@receipt_index')->middleware('admin');
  Route::get('/crud/receipt_crud/receipt_create', function () {
      return view('/crud/receipt_crud/receipt_create');
  })->middleware('admin');
  Route::get('/crud/receipt_crud/receipt_update', function () {
      return view('/crud/receipt_crud/receipt_update');
  })->middleware('admin');
  Route::get('/crud/receipt_crud/receipt_show', function () {
      return view('/crud/receipt_crud/receipt_show');
  })->middleware('admin');

 // ALBUM
Route::get('/crud/album_crud/album_index', 'App\Http\Controllers\AdmincrudController@album_index')->middleware('admin');
Route::get('/crud/album_crud/album_create', function () {
    return view('/crud/album_crud/album_create');
})->middleware('admin');
Route::get('/crud/album_crud/album_update', function () {
    return view('/crud/album_crud/album_update');
})->middleware('admin');
Route::get('/crud/album_crud/album_show', function () {
    return view('/crud/album_crud/album_show');
})->middleware('admin');

// PLAYLIST
Route::get('/crud/playlist_crud/playlist_index', 'App\Http\Controllers\AdmincrudController@playlist_index')->middleware('admin');
Route::get('/crud/playlist_crud/playlist_create', function () {
    return view('/crud/playlist_crud/playlist_create');
})->middleware('admin');
Route::get('/crud/playlist_crud/playlist_update', function () {
    return view('/crud/playlist_crud/playlist_update');
})->middleware('admin');
Route::get('/crud/playlist_crud/playlist_show', function () {
    return view('/crud/playlist_crud/playlist_show');
})->middleware('admin');

// SONG
Route::get('/crud/song_crud/song_index', 'App\Http\Controllers\AdmincrudController@song_index')->middleware('admin');

Route::get('/crud/song_crud/song_create', function () {
    return view('/crud/song_crud/song_create');
})->middleware('admin');
Route::get('/crud/song_crud/song_update', function () {
    return view('/crud/song_crud/song_update');
})->middleware('admin');
Route::get('/crud/song_crud/song_show', function () {
    return view('/crud/song_crud/song_show');
})->middleware('admin');

// LIKE 
Route::get('/crud/like_crud/like_index', 'App\Http\Controllers\AdmincrudController@like_index')->middleware('admin');

Route::get('/crud/like_crud/like_create', function () {
    return view('/crud/like_crud/like_create');
})->middleware('admin');
Route::get('/crud/like_crud/like_update', function () {
    return view('/crud/like_crud/like_update');
})->middleware('admin');
Route::get('/crud/like_crud/like_show', function () {
    return view('/crud/like_crud/like_show');
})->middleware('admin');

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
Route::get('/follows/edit/{id}','App\Http\Controllers\FollowController@edit');
Route::put('/follows/update/{id}','App\Http\Controllers\FollowController@update');
Route::put('/follows/delete/{id}','App\Http\Controllers\FollowController@delete');

Route::get('/genres','App\Http\Controllers\GenreController@index');
Route::get('/genres/{id}','App\Http\Controllers\GenreController@show');
Route::get('/genres2/{id}','App\Http\Controllers\GenreController@show2');
Route::post('/genres/create','App\Http\Controllers\GenreController@store');
Route::get('/genres/edit/{id}','App\Http\Controllers\GenreController@edit');
Route::put('/genres/update/{id}','App\Http\Controllers\GenreController@update');
Route::put('/genres/delete/{id}','App\Http\Controllers\GenreController@delete');

Route::get('/likes','App\Http\Controllers\LikeController@index');
Route::get('/likes/{id}','App\Http\Controllers\LikeController@show');
Route::post('/likes/create','App\Http\Controllers\LikeController@store');
Route::post('/likes/create2','App\Http\Controllers\LikeController@create');
Route::get('/likes/edit/{id}','App\Http\Controllers\LikeController@edit');
Route::put('/likes/update/{id}','App\Http\Controllers\LikeController@update');
Route::put('/likes/delete/{id}','App\Http\Controllers\LikeController@delete');

Route::get('/locations','App\Http\Controllers\LocationController@index');
Route::get('/locations/{id}','App\Http\Controllers\LocationController@show');
Route::post('/locations/create','App\Http\Controllers\LocationController@store');
Route::get('/locations/edit/{id}','App\Http\Controllers\LocationController@edit');
Route::put('/locations/update/{id}','App\Http\Controllers\LocationController@update');
Route::put('/locations/delete/{id}','App\Http\Controllers\LocationController@delete');

Route::get('/payment_methods','App\Http\Controllers\Payment_methodController@index');
Route::get('/payment_methods/{id}','App\Http\Controllers\Payment_methodController@show');
Route::post('/payment_methods/create','App\Http\Controllers\Payment_methodController@store');
Route::get('/payment_methods/edit/{id}','App\Http\Controllers\Payment_methodController@edit');
Route::put('/payment_methods/update/{id}','App\Http\Controllers\Payment_methodController@update');
Route::put('/payment_methods/delete/{id}','App\Http\Controllers\Payment_methodController@delete');

Route::get('/playlists','App\Http\Controllers\PlaylistController@index');
Route::get('/playlists/{id}','App\Http\Controllers\PlaylistController@show');
Route::get('/playlists2/{id}','App\Http\Controllers\PlaylistController@show2');
Route::post('/playlists/create','App\Http\Controllers\PlaylistController@store');
Route::post('/playlists/create2','App\Http\Controllers\PlaylistController@create');
Route::get('/playlists/edit/{id}','App\Http\Controllers\PlaylistController@edit');
Route::put('/playlists/update/{id}','App\Http\Controllers\PlaylistController@update');
Route::put('/playlists/delete/{id}','App\Http\Controllers\PlaylistController@delete');

Route::get('/rates','App\Http\Controllers\RateController@index');
Route::get('/rates/{id}','App\Http\Controllers\RateController@show');
Route::post('/rates/create','App\Http\Controllers\RateController@store');
Route::get('/rates/edit/{id}','App\Http\Controllers\RateController@edit');
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
Route::get('/song_genres/edit/{id}','App\Http\Controllers\Song_genreController@edit');
Route::put('/song_genres/update/{id}','App\Http\Controllers\Song_genreController@update');
Route::put('/song_genres/delete/{id}','App\Http\Controllers\Song_genreController@delete');

Route::get('/song_playlists','App\Http\Controllers\Song_playlistController@index');
Route::get('/song_playlists/{id}','App\Http\Controllers\Song_playlistController@show');
Route::post('/song_playlists/create','App\Http\Controllers\Song_playlistController@store');
//Route::get('/song_playlist/edit/{id}','App\Http\Controllers\Song_playlistController@edit');
Route::put('/song_playlists/update/{id}','App\Http\Controllers\Song_playlistController@update');
Route::put('/song_playlists/delete/{id}','App\Http\Controllers\Song_playlistController@delete');
Route::put('/song_playlists/deletePlaylistSong/{id}','App\Http\Controllers\Song_playlistController@deletePlaylistSong');

Route::get('/songs','App\Http\Controllers\SongController@index');
Route::get('/songs/{id}','App\Http\Controllers\SongController@show');
Route::post('/songs/create','App\Http\Controllers\SongController@store');
Route::post('/songs/create2','App\Http\Controllers\SongController@create');  
Route::get('/songs/edit/{id}','App\Http\Controllers\SongController@edit');
Route::put('/songs/update/{id}','App\Http\Controllers\SongController@update');
Route::put('/songs/delete/{id}','App\Http\Controllers\SongController@delete');

Route::get('/users_role','App\Http\Controllers\User_roleController@index');
Route::get('/users_role/{id}','App\Http\Controllers\User_roleController@show');
Route::post('/users_role/create','App\Http\Controllers\User_roleController@store');
//Route::get('/users_role/edit/{id}','App\Http\Controllers\User_roleController@edit');
Route::put('/users_role/update/{id}','App\Http\Controllers\User_roleController@update');
Route::put('/users_role/delete/{id}','App\Http\Controllers\User_roleController@delete');


Route::get('/users/edit2/{id}','App\Http\Controllers\UserController@edit2');
Route::put('/users/update2/{id}','App\Http\Controllers\UserController@update2');
Route::get('/users','App\Http\Controllers\UserController@index');
Route::get('/users/{id}','App\Http\Controllers\UserController@show');
Route::post('/users/create','App\Http\Controllers\UserController@store');
Route::post('/users/create2','App\Http\Controllers\UserController@create');
Route::get('/users/edit/{id}','App\Http\Controllers\UserController@edit');
Route::get('/profile/edit/{id}','App\Http\Controllers\UpdateProfileController@edit');
Route::put('/users/update/{id}','App\Http\Controllers\UserController@update');
Route::put('/users/delete/{id}','App\Http\Controllers\UserController@delete');

Route::get('/payment_methods','App\Http\Controllers\Payment_methodController@index');
Route::get('/payment_methods/{id}','App\Http\Controllers\Payment_methodController@show');
Route::post('/payment_methods/create','App\Http\Controllers\Payment_methodController@store');
Route::get('/payment_methods/edit/{id}','App\Http\Controllers\Payment_methodController@edit');
Route::put('/payment_methods/update/{id}','App\Http\Controllers\Payment_methodController@update');
Route::put('/payment_methods/delete/{id}','App\Http\Controllers\Payment_methodController@delete');