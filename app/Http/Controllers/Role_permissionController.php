<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role_permission;
use Illuminate\Support\Facades\Validator;

class Role_permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles_permissions = Role_permission::all();
        if($roles_permissions->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran roles de permisos',
            ]);
        }
        return response($roles_permissions,200); 
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
                'role_id' => 'required|integer',
                'permission_id' => 'required|integer',
                'delete' => 'required|boolean', 
            ],
            [
                'role_id.required' => 'Debes ingresar el id del rol',
                'role_id.integer' => 'El id del rol debe ser de un tipo de dato integer',

                'permission_id.required' => 'Debes ingresar el id del permiso',
                'permission_id.integer' => 'El id del permiso debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newRole_permission= new Role_permission();
        $newRole_permission->role_id        = $request->role_id;
        $newRole_permission->permission_id  = $request->permission_id;
        $newRole_permission->delete         = $request->delete;
        $newRole_permission->save();
        return response()->json([
            'respuesta' => 'se ha creado un nuevo rol de permisos',
            'id'=> $newRole_permission->id,
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
        $role_permission = Role_permission::find($id);
        if(empty($role_permission)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return response($role_permission,200);
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
                'role_id' => 'required|integer',
                'permission_id' => 'required|integer',
                'delete' => 'required|boolean', 
            ],
            [
                'role_id.required' => 'Debes ingresar el id del rol',
                'role_id.integer' => 'El id del rol debe ser de un tipo de dato integer',

                'permission_id.required' => 'Debes ingresar el id del permiso',
                'permission_id.integer' => 'El id del permiso debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $role_permission = Role_permission::find($id);
        if(empty($role_permission)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        $role_permission->user_id        = $request->user_id;
        $role_permission->song_id        = $request->song_id;
        $role_permission->delete         = $request->delete;
        $role_permission->save();
        return response()->json([
            'respuesta' => 'se ha modificado un rol de permisos',
            'id'=> $role_permission->id,
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
        $role_permission = Role_permission::find($id);
        if(empty($role_permission)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($role_permission->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $role_permission->delete = true;
        $role_permission->save();
        return response()->json([
            'respuesta' => 'Se ha eliminado un rol de permisos',
            'id' => $role_permission->id,
        ],200);
    }
}
