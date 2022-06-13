<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        if($roles->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran roles',
            ]);
        }
        return response($roles,200); 
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
        $validator = Validator::make(
            $request->all(),[
                'role_name' => 'required|min:2|max:35',
                'delete' => 'required|boolean',
            ],
            [
                'role_name.required' => 'Debes ingresar un nombre de rol',
                'role_name.min' => 'El role_name debe tener un largo minimo de 2',
                'role_name.max' => 'El role_name debe tener un largo maximo de 35',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"celete" debe ser un booleano',
            ]
        ); 
        if($validator->fails()){
            return response($validator->errors());
        }  
        $newRole = new Role();
        $newRole->role_name = $request->role_name;
        $newRole->delete    = $request->delete;
        $newRole->save();
        return response()->json([
            'respuesta' => 'Se ha creado un nuevo nombre de rol',
            'id' => $newRole->id
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        if(empty($role)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return response($role,200);
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
        $validator = Validator::make(
            $request->all(),[
                'role_name' => 'required|min:2|max:35',
                'delete' => 'required|boolean',
            ],
            [
                'role_name.required' => 'Debes ingresar un nombre de rol',
                'role_name.min' => 'El role_name debe tener un largo minimo de 2',
                'role_name.max' => 'El role_name debe tener un largo maximo de 35',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
        ); 
        if($validator->fails()){
            return response($validator->errors());
        }
        $role = Role::find($id);
        if(empty($role)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }  
        $role->role_name = $request->role_name;
        $role->delete    = $request->delete;
        $role->save();

        return response()->json([
            'respuesta' => 'Se ha modificado un role_name',
            'id' => $role->id,
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
        $role = Role::find($id);
        if(empty($role)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($role->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $role->delete = true;
        $role->save();
        return response()->json([
            'respuesta' => 'Se ha eliminado un rol',
            'id' => $role->id,
        ],200);
    }
}
