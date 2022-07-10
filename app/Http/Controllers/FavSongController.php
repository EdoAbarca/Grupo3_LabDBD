<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Like;
use App\Models\Song;
use App\Models\Album;

class FavSongController extends Controller
{
    public function index()
    {
        $users = User::where('delete',false)->get();
        $likes = Like::where('delete',false)->get();
        $songs = Song::where('delete',false)->get();
        $albums = Album::where('delete',false)->get();
        return view('favsongs', ['users'=>$users,'songs'=>$songs,'likes'=>$likes,'albums'=>$albums]);
    }
}
