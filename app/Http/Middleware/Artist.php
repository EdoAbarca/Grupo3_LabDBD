<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class Artist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            $role= Role::find($request->user()->role_id);
            if(strcasecmp($role->role_name,"admin")===0||strcasecmp($role->role_name,"artista")===0){
                return $next($request);
            }
            return redirect('home')->with('status','No tienes permisos para acceder a esta ruta');
        }
        return redirect('home')->with('status','No has iniciado sesión, no puedes acceder a esta ruta');
    }
}