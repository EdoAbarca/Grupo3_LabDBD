<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Rate;

class User_ratesController extends Controller
{
    public function index()
    {
        $rates = Rate::where('delete',false)->get()->sortByDesc('id'); //Mas recientes primero
        $songs = Song::where('delete',false)->get();
        return view('user_rates', ['rates'=>$rates, 'songs'=>$songs]);
    }

    public function delete($id)
    {
        $rate = Rate::find($id);
        $rate->delete = 1;
        $rate->save();

        return redirect('user_rates')->with('success', 'Valoración eliminada exitósamente!');
    }
}
