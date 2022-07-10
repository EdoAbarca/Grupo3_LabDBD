<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Album;
use App\Models\Location;
use App\Models\Genre;
use App\Models\Song_genre;

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
        $locations = Location::where('delete',false)->get();
        $genres = Genre::where('delete',false)->get();
        return view('upload_song', ['users'=>$users, 'albums'=>$albums,'locations'=>$locations,'genres'=>$genres]);
    }
}
