<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Location;



class Filter_locationController extends Controller
{
    public function locations_filter()
    {   
        $locations= Location::where('delete',false)->get();

        return view('/locations_filter', ['locations'=>$locations]);
    }
    
    
    public function songs_bylocation($idLocation)
    {   
        //$genre= Genre::find($id);
        $songs = Song::where('delete',false)->get();
        return view('/songs_bylocation', ['idLocation'=>$idLocation,'songs'=>$songs]);
    }
}
