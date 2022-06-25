<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = request()->validate([
            'email' => 'required|email|string',
            'password' => 'required|min:8|max:20|string'
       ],[
            'email.required' => 'Debes ingresar un correo',
            'email.email' => 'El formato del correo no es correcto',
            'password.max' => 'Debe ser de largo máximo :max',
            'password.min' => 'Debe ser de un largo mínimo :min',
            'password.required' => 'Debes ingresar una contraseña'
    
        ]);

        //$password = Hash::make($request->password);
        //$credentials = $request->only('email',$password);

        if(Auth::attempt($credentials)){
            request()->session()->regenerate();
            return redirect('/home')->with('status','Iniciaste sesión correctamente');
        }
 
        return redirect('login')->withErrors('Los datos ingresados no concuerdan con nuestra base de datos');
    }

    
}