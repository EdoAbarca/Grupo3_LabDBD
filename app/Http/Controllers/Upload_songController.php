<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Album;

class Upload_songController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('delete',false)->get();
        $albums = Album::get();
        return view('upload_song', ['users'=>$users, 'albums'=>$albums]);
    }

    

}
