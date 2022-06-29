<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Song;
use App\Models\Album;

class SongrankingController extends Controller
{
    public function index()
    {
        $users = User::where('delete',false)->get();
        $songs = Song::where('delete',false)->get();
        $ordenados = $songs->sortByDesc('stream');
        $ordenados->values()->all();
        
        $albums = Album::where('delete',false)->get();

        return view('songranking', ['users'=>$users,'songs'=>$songs,'albums'=>$albums, 'ordenados'=>$ordenados]);
    }
}
