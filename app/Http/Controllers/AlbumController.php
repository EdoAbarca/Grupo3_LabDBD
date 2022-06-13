<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        if($albums->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran albums',
            ]);
        }
        return response($albums,200); 
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
               'album_name' => 'required|min:1|max:50',
               'release_date' => 'required|date',
               'songs_quantity' => 'required|integer|min:1',
               'duration'=> 'required|date_format:H:i:s',
               'user_id' => 'required|integer',
               'delete' => 'required|boolean',
            ],
            [
                'album_name.required' => 'Debes ingresar el nombre del album',
                'album_name.min' => 'El nombre del album debe tener un largo minimo de 1 caracter',
                'album_name.max' => 'El nombre del album debe tener un largo maximo de 50 caracteres',

                'release_date.required' => 'Debes ingresar la fecha de lanzamiento del album',
                'release_date.date' => 'La fecha de lanzamiento debe ser una fecha valida con el formato: "YYYY:MM:DD',
                
                'songs_quantity.required' => 'Debes ingresar el numero de canciones del album',
                'songs_quantity.integer' => 'El numero de canciones debe ser de un tipo de dato integer',
                'songs_quantity.min' => 'El numero de canciones debe tener como minimo valor 1',

                'duration.required' => 'Debes ingresar la duracion total del album',
                'duration.date_format:H:i:s' => 'La duracion total del album debe seguir el formato: H:i:s',

                'user_id.required' => 'Debes ingresar el id del usuario al que le pertenece el album',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newAlbum= new Album();
        $newAlbum->album_name     = $request->album_name;
        $newAlbum->release_date   = $request->release_date;
        $newAlbum->songs_quantity = $request->songs_quantity;
        $newAlbum->duration       = $request->duration;
        $newAlbum->user_id        = $request->user_id;
        $newAlbum->delete         = $request->delete;
        $newAlbum->save();
        return response()->json([
            'respuesta' => 'se ha creado un nuevo album',
            'id'=> $newAlbum->id,
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
        $album = Album::find($id);
        if(empty($album)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return response($album,200);
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
               'album_name' => 'required|min:1|max:50',
               'release_date' => 'required|date',
               'songs_quantity' => 'required|integer|min:1',
               'duration'=> 'required|date_format:H:i:s',
               'user_id' => 'required|integer',
               'delete'  => 'required|boolean'
            ],
            [
                'album_name.required' => 'Debes ingresar el nombre del album',
                'album_name.min' => 'El nombre del album debe tener un largo minimo de 1 caracter',
                'album_name.max' => 'El nombre del album debe tener un largo maximo de 50 caracteres',

                'release_date' => 'Debes ingresar la fecha de lanzamiento del album',
                'release_date' => 'La fecha de lanzamiento debe ser una fecha valida',
                
                'songs_quantity.required' => 'Debes ingresar el numero de canciones del album',
                'songs_quantity.integer' => 'El numero de canciones debe ser de un tipo de dato integer',
                'songs_quantity.min' => 'El numero de canciones debe tener como minimo valor 1',

                'duration.required' => 'Debes ingresar la duracion total del album',
                'duration.date_format' => 'La duracion total del album debe seguir el formato: H:i:s',

                'user_id.required' => 'Debes ingresar el id del usuario al que le pertenece el album',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano'
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $album = Album::find($id);
        if(empty($album)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }

        $album->album_name     = $request->album_name;
        $album->release_date   = $request->release_date;
        $album->songs_quantity = $request->songs_quantity;
        $album->duration       = $request->duration;
        $album->user_id        = $request->user_id;
        $album->delete         = $request->delete;
        $album->save();
        return response()->json([
            'respuesta' => 'se ha modificado un album',
            'id'=> $album->id,
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
        $album = Album::find($id);
        if(empty($album)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($album->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $album->delete = true;
        $album->save();
        return response()->json([
            'respuesta' => 'Se ha eliminado un album',
            'id' => $album->id,
        ],200);
    }
}
