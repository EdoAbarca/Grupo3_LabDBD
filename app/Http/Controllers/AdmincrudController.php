<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Like;
use App\Models\Song;
use App\Models\Album;
use App\Models\Role;
use App\Models\Location;
use App\Models\Genre;
use App\Models\Payment_method;
use App\Models\Rate;
use App\Models\Song_genre;
use App\Models\Playlist;
use App\Models\Follow;
use App\Models\Receipt;

class AdmincrudController extends Controller
{
    public function index()
    {
        $users = User::where('delete',false)->get();
        $likes = Like::where('delete',false)->get();
        $songs = Song::where('delete',false)->get();
        $albums = Album::where('delete',false)->get();
        $roles = Role::where('delete',false)->get();

        return view('crud', ['users'=>$users,'songs'=>$songs,'likes'=>$likes,'albums'=>$albums, 'roles'=>$roles]);
    }

    public function user_index()
    {
        $users = User::where('delete',false)->get();
        $users = $users->sortBy('id');
        $users->values()->all();
        return view('/crud/user_crud/user_index', ['users'=>$users]);
    }

    public function role_index()
    {
        $roles = Role::where('delete',false)->get();
        $roles = $roles->sortBy('id');
        $roles->values()->all();
        return view('/crud/role_crud/role_index', ['roles'=>$roles]);
    }
    
    public function album_index()
    {
        $albums = Album::where('delete',false)->get();
        $albums = $albums->sortBy('id');
        $albums->values()->all();
        return view('/crud/album_crud/album_index', ['albums'=>$albums]);
    }

    public function location_index()
    {
        $locations = Location::where('delete',false)->get();
        $locations = $locations->sortBy('id');
        $locations->values()->all();
        return view('/crud/location_crud/location_index', ['locations'=>$locations]);
    }

    public function genre_index()
    {
        $genres = Genre::where('delete',false)->get();
        $genres = $genres->sortBy('id');
        $genres->values()->all();
        return view('/crud/genre_crud/genre_index', ['genres'=>$genres]);
    }

    public function payment_method_index()
    {
        $payment_methods = Payment_method::where('delete',false)->get();
        $payment_methods = $payment_methods->sortBy('id');
        $payment_methods->values()->all();
        return view('/crud/payment_method_crud/payment_method_index', ['payment_methods'=>$payment_methods]);
    }

    public function rate_index()
    {
        $rates = Rate::where('delete',false)->get();
        $rates = $rates->sortBy('id');
        $rates->values()->all();
        return view('/crud/rate_crud/rate_index', ['rates'=>$rates]);
    }

    public function song_genre_index()
    {
        $song_genres = Song_genre::where('delete',false)->get();
        $song_genres = $song_genres->sortBy('id');
        $song_genres->values()->all();
        return view('/crud/song_genre_crud/song_genre_index', ['song_genres'=>$song_genres]);}
    
    public function playlist_index()
    {
        $playlists = Playlist::where('delete',false)->get();
        $playlists = $playlists->sortBy('id');
        $playlists->values()->all();
        return view('/crud/playlist_crud/playlist_index', ['playlists'=>$playlists]);
    }

    public function follow_index()
    {
        $follows = Follow::where('delete',false)->get();
        $follows = $follows->sortBy('id');
        $follows->values()->all();
        return view('/crud/follow_crud/follow_index', ['follows'=>$follows]);
    }

    public function receipt_index()
    {
        $receipts = Receipt::where('delete',false)->get();
        $receipts = $receipts->sortBy('id');
        $receipts->values()->all();
        return view('/crud/receipt_crud/receipt_index', ['receipts'=>$receipts]);
    }
        public function song_index()
    {
        $songs = Song::where('delete',false)->get();
        $songs = $songs->sortBy('id');
        $songs->values()->all();
        return view('/crud/song_crud/song_index', ['songs'=>$songs]);
    }
}
