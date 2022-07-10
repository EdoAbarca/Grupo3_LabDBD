<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ArtistController extends Controller
{   
    public function index()
    {
        $users = User::where('delete',false)->get();

        return view('artists', ['users'=>$users]);
    }
}