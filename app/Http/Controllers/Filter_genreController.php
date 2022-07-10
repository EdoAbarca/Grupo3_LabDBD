<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Song_genre;
use App\Models\Genre;



class Filter_genreController extends Controller
{
    public function songs_filter()
    {   
        $genres= Genre::where('delete',false)->get();

        return view('/songs_filter', ['genres'=>$genres]);
    }
    
    
    public function songs_bygenre($idGenre)
    {   
        //$genre= Genre::find($id);
        $songs = Song::where('delete',false)->get();
        $song_genres = Song_genre::where('delete',false)->get();
        return view('/songs_bygenre', ['idGenre'=>$idGenre,'songs'=>$songs,'song_genres'=>$song_genres]);
    }
}
