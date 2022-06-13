<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_role;
use Illuminate\Support\Facades\Validator;

class User_roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_roles = User_role::where('delete',false)->get();
        if($users_roles->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran roles de usuarios',
            ]);
        }
        return response($users_roles,200); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make(
            $request->all(),[
                'user_id' => 'required|integer',
                'role_id' => 'required|integer',
                'delete' => 'required|boolean', 
            ],
            [
                'user_id.required' => 'Debes ingresar el id del usuario al que se le dio like',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                'role_id.required' => 'Debes ingresar el id de la cancion a la que se le dio like',
                'role_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newUser_role= new User_role();
        $newUser_role->user_id        = $request->user_id;
        $newUser_role->role_id        = $request->role_id;
        $newUser_role->delete         = $request->delete;
        $newUser_role->save();
        return response()->json([
            'respuesta' => 'se ha creado un nuevo rol de usuario',
            'id'=> $newUser_role->id,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User_role = User_role::find($id);
        if(empty($User_role)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($User_role->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        return response($User_role,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator=Validator::make(
            $request->all(),[
                'user_id' => 'required|integer',
                'role_id' => 'required|integer',
                'delete' => 'required|boolean', 
            ],
            [
                'user_id.required' => 'Debes ingresar el id del usuario al que se le asigno el rol de usuario',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                'role_id.required' => 'Debes ingresar el id del rol al que se le asigno el rol de usuario',
                'role_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $User_role = User_role::find($id);
        if(empty($User_role)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($User_role->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $User_role->user_id        = $request->user_id;
        $User_role->role_id        = $request->role_id;
        $User_role->delete         = $request->delete;
        $User_role->save();
        return response()->json([
            'respuesta' => 'se ha modificado un rol de usuarios',
            'id'=> $User_role->id,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user_role = User_role::find($id);
        if(empty($user_role)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($user_role->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $user_role->delete = true;
        $user_role->save();
        return response()->json([
            'respuesta' => 'Se ha eliminado un rol de usuario',
            'id' => $user_role->id,
        ],200);
    }
}
