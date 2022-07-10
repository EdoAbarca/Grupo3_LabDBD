<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\Song_playlist;

class User_playlistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = Playlist::where('delete',false)->get();
        return view('playlist', ['playlist'=>$playlist]);
    }
}
