<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;

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
        return view('user_playlists', ['playlists'=>$playlists]);
    }

    public function delete($id)
    {
        $playlist = Playlist::find($id);
        $playlist->delete = 1;
        $playlist->save();
        return redirect('user_playlists')->with('success','Se ha eliminado la lista de reproducción exitósamente!');
    }
}
