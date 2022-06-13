<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::where('delete',false)->get();
        if($locations->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran ubicaciones',
            ]);
        }
        return response($locations,200); 
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
               'location_name' => 'required|min:1|max:15',
               'delete' => 'required|boolean', 
            ],
            [
                'location_name.required' => 'Debes ingresar el nombre de la ubicacion',
                'location_name.min' => 'El nombre de la ubicacion debe tener un largo minimo de 1 caracter',
                'location_name.max' => 'El nombre de la ubicacion debe tener un largo maximo de 15 caracteres',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newLocation= new Location();
        $newLocation->location_name = $request->location_name;
        $newLocation->delete        = $request->delete;
        $newLocation->save();
        return response()->json([
            'respuesta' => 'se ha creado una nueva ubicacion',
            'id'=> $newLocation->id,
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
        $location = Location::find($id);
        if(empty($location)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($location->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return response($location,200);
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
               'location_name' => 'required|min:1|max:15',
               'delete' => 'required|boolean', 
            ],
            [
                'location_name.required' => 'Debes ingresar el nombre de la ubicacion',
                'location_name.min' => 'El nombre de la ubicacion debe tener un largo minimo de 1 caracter',
                'location_name.max' => 'El nombre de la ubicacion debe tener un largo maximo de 15 caracteres',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $location = Location::find($id);
        if(empty($location)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($location->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        $location->location_name = $request->location_name;
        $location->delete        = $request->delete;
        $location->save();   
        
        return response()->json([
            'respuesta' => 'se ha modificado una ubicacion',
            'id'=> $location->id,
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
        $location = Location::find($id);
        if(empty($location)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($location->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $location->delete = true;
        $location->save();
        return response()->json([
            'respuesta' => 'Se ha eliminado una ubicacion',
            'id' => $location->id,
        ],200);
    }
}
