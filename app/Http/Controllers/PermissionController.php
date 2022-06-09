<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        if($permissions->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran permisos',
            ]);
        }
        return response($permissions,200); 
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
               'description'=>'required|min:1|max:1000',
               'delete'=>'required|boolean', 
            ],
            [
                'description.required' => 'Debes ingresar una description',
                'description.min' => 'La description debe tener un largo minimo de 1 caracteres',
                'description.max' => 'La description debe tener un largo maximo de 1000 caracteres',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }
        $newPermission= new Permission();
        $newPermission->description     =$request->description;
        $newPermission->delete          =$request->delete;
        $newPermission->save();
        return response()->json([
            'respuesta' => 'se ha creado un nuevo permiso',
            'id'=> $newPermission->id,
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
        $permission = Permission::find($id);
        if(empty($permission)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return response($permission,200);
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
               'description'=>'required|min:1|max:1000',
               'delete'=>'required|boolean', 
            ],
            [
                'description.required' => 'Debes ingresar una description',
                'description.min' => 'La description debe tener un largo minimo de 1 caracteres',
                'description.max' => 'La description debe tener un largo maximo de 1000 caracteres',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }
        $permission= Permission::find($id);
        if(empty($permission)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        $permission->description     =$request->description;
        $permission->delete          =$request->delete;
        $permission->save();
        return response()->json([
            'respuesta' => 'se ha modificado un permiso',
            'id'=> $permission->id
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}