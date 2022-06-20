<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        $role= Role::find($request->user()->id_role);
        if(strcasecmp($role->name,"admin")===0||strcasecmp($role->name,"developer")===0){
            return $next($request);
        }
        return redirect('home')->with('status','No tienes permisos para acceder a esta ruta');
    }
}