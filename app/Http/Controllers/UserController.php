<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::where('delete',false)->get();
        if($users->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran usuarios',
            ]);
        }
        return response($users,200); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),[
                'nickname' => 'required|min:2|max:30',
                'password' => 'required|min:8|max:300',
                'email' => 'required|min:7|max:200',
                //'biography' => 'required|min:5|max:500',
                //'signup_date' => 'required|date|after:birth_date',
                //'birth_date' => 'required|date',
                //'delete' => 'required|boolean',
                //'location_id' => 'required',
                //'role_id' => 'required'
            ],
            [
                'nickname.required' => 'Debes ingresar un nickname',
                'nickname.min' => 'El nickname debe tener un largo minimo de 2',
                'nickname.max' => 'El nickname debe tener un largo maximo de 30',
                
                'password.required' => 'Debes ingresar una password',
                'password.min' => 'La password debe tener un largo minimo de 10',
                'password.max' => 'La password debe tener un largo maximo de 300',

                'email.required' => 'Debes ingresar un email',
                'email.min' => 'El email debe tener un largo minimo de 7',
                'email.max' => 'El email debe tener un largo maximo de 200',
                
                //'biography.required' => 'Debes ingresar una biografia',
                //'biography.min' => 'La biography debe tener un largo minimo de 5',
                //'biography.max' => 'La biography debe tener un largo maximo de 500',

                //'signup_date.required' => 'Debes ingresar una fecha de registro',
                //'signup_date.date' => 'La fecha de registro debe ser una fecha valida',
                //'signup_date.after' => 'La fecha de registro debe ser posterior a la fecha de nacimiento del usuario',

                'birth_date.required' => 'Debes ingresar una fecha de nacimiento',
                'birth_date.date' => 'La fecha de nacimiento debe ser una fecha valida',

                //'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                //'delete.boolean' => '"delete" debe ser un booleano',
            ]
        );  
        if($validator->fails()){
            return response($validator->errors());
        }  
        $newUser = new User();
        $newUser->nickname      = $request->nickname;
        $newUser->password      = Hash::make($request->password);
        $newUser->email         = $request->email;
        $newUser->biography     = "";
        $newUser->signup_date   = date('y-m-d');
        $newUser->birth_date    = $request->birth_date;
        $newUser->delete        = 0;
        $newUser->location_id   = $request->location_id;
        $newUser->role_id       = $request->role_id;
        $newUser->save();
        return redirect('/crud/user_crud/user_index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validator = Validator::make(
            $request->all(),[
                'nickname' => 'required|min:2|max:30',
                'password' => 'required|min:8|max:300',
                'email' => 'required|min:7|max:200',
                //'biography' => 'required|min:5|max:500',
                //'signup_date' => 'required|date|after:birth_date',
                'birth_date' => 'required|date',
                //'delete' => 'required|boolean',
                'location_id' => 'required',
                'role_id' => 'required'
            ],
            [
                'nickname.required' => 'Debes ingresar un nickname',
                'nickname.min' => 'El nickname debe tener un largo minimo de 2',
                'nickname.max' => 'El nickname debe tener un largo maximo de 30',
                
                'password.required' => 'Debes ingresar una password',
                'password.min' => 'La password debe tener un largo minimo de 10',
                'password.max' => 'La password debe tener un largo maximo de 300',

                'email.required' => 'Debes ingresar un email',
                'email.min' => 'El email debe tener un largo minimo de 7',
                'email.max' => 'El email debe tener un largo maximo de 200',
                
                //'biography.required' => 'Debes ingresar una biografia',
                //'biography.min' => 'La biography debe tener un largo minimo de 5',
                //'biography.max' => 'La biography debe tener un largo maximo de 500',

                'signup_date.required' => 'Debes ingresar una fecha de registro',
                'signup_date.date' => 'La fecha de registro debe ser una fecha valida',
                'signup_date.after' => 'La fecha de registro debe ser posterior a la fecha de nacimiento del usuario',

                'birth_date.required' => 'Debes ingresar una fecha de nacimiento',
                'birth_date.date' => 'La fecha de nacimiento debe ser una fecha valida',

                //'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                //'delete.boolean' => '"delete" debe ser un booleano',
            ]
        );  
        if($validator->fails()){
            return response($validator->errors());
        }  
        $newUser = new User();
        $newUser->nickname      = $request->nickname;
        $newUser->password      = Hash::make($request->password);
        $newUser->email         = $request->email;
        $newUser->biography     = "";
        $newUser->signup_date   = date('y-m-d');
        $newUser->birth_date    = $request->birth_date;
        $newUser->delete        = 0;
        $newUser->location_id   = $request->location_id;
        $newUser->role_id       = $request->role_id;
        $newUser->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(empty($user)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($user->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        return view('crud/user_crud/user_show', compact('user'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('crud/user_crud/user_update', compact('user'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),[
                'nickname' => 'required|min:2|max:30',
                'password' => 'required|min:10|max:300',
                'email' => 'required|min:7|max:200',
                'biography' => 'required|max:500',
                //'signup_date' => 'required|date|after:birth_date',
                'birth_date' => 'required|date',
                //'delete' => 'required|boolean',
            ],
            [
                'nickname.required' => 'Debes ingresar un nickname',
                'nickname.min' => 'El nickname debe tener un largo minimo de 2',
                'nickname.max' => 'El nickname debe tener un largo maximo de 30',
                
                'password.required' => 'Debes ingresar una password',
                'password.min' => 'La password debe tener un largo minimo de 10',
                'password.max' => 'La password debe tener un largo maximo de 300',
                    
                'email.required' => 'Debes ingresar un email',
                'email.min' => 'El email debe tener un largo minimo de 7',
                'email.max' => 'El email debe tener un largo maximo de 200',

                'biography.required' => 'Debes ingresar una biografia',
                'biography.max' => 'La biography debe tener un largo maximo de 500',

                /*'signup_date.required' => 'Debes ingresar una fecha de registro',
                'signup_date.date' => 'La fecha de registro debe ser una fecha valida',
                'signup_date.after' => 'La fecha de registro debe ser posterior a la fecha de nacimiento del usuario',*/

                'birth_date.required' => 'Debes ingresar una fecha de nacimiento',
                'birth_date.date' => 'La fecha de nacimiento debe ser una fecha valida',

                /*'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',*/
            ]
        );  
        if($validator->fails()){
            return response($validator->errors());
        } 
        $user = User::find($id);
        if(empty($user)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($user->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        

        $user->nickname         = $request->nickname;
        $user->password         = $request->password;
        $user->email            = $request->email;
        $user->biography        = $request->biography;
        $user->signup_date      = date('y-m-d');
        $user->birth_date       = $request->birth_date;
        $user->delete           = 0;
        $user->location_id      = $request->location_id;
        $user->role_id          = $request->role_id;
        $user->save();

        return redirect('/crud/user_crud/user_index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::find($id);
        if(empty($user)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($user->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $user->delete = true;
        $user->save();
        return redirect('/crud/user_crud/user_index');
    }
}
