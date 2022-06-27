<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::where('delete',false)->get();
        $roles = Role::where('delete',false)->get();
        $locations = Location::where('delete',false)->get();
        $follows = Follow::where('delete',false)->get();

        return view('profile', ['users'=>$users,'roles'=>$roles,'locations'=>$locations,'follows'=>$follows]);
    }
}
