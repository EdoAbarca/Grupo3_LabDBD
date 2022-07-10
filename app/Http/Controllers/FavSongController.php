<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Song;

class FavSongController extends Controller
{
    public function index()
    {
        $likes = Like::where('delete',false)->get();
        $songs = Song::where('delete',false)->get();
        return view('favsongs', ['likes'=>$likes,'songs'=>$songs]);
    }

    public function delete($id)
    {
        $like = Like::find($id);
        $like->delete = 1;
        $like->save();

        return redirect('favsongs')->with('success', 'Valoración eliminada exitósamente!');
    }
}
