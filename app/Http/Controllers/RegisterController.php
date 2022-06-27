<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Location;

class RegisterController extends Controller
{
    public function index()
    {
        $roles = Role::where('delete',false)->get();
        $locations = Location::where('delete',false)->get();
        return view('register', ['locations'=>$locations, 'roles'=>$roles]);
    }
}
