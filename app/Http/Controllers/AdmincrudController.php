<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Like;
use App\Models\Song;
use App\Models\Album;

class AdmincrudController extends Controller
{
    public function index()
    {
        $users = User::where('delete',false)->get();
        $likes = Like::where('delete',false)->get();
        $songs = Song::where('delete',false)->get();
        $albums = Album::where('delete',false)->get();

        return view('crud', ['users'=>$users,'songs'=>$songs,'likes'=>$likes,'albums'=>$albums]);
    }

    public function user_index()
    {
        $users = User::where('delete',false)->get();
        $users = $users->sortBy('id');
        $users->values()->all();
        return view('/crud/user_crud/user_index', ['users'=>$users]);
    }
}
