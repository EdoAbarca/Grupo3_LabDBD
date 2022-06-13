<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use Illuminate\Support\Facades\Validator;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = Playlist::where('delete',false)->get();
        if($playlists->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran playlists',
            ]);
        }
        return response($playlists,200); 
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
               'playlist_name' => 'required|min:1|max:30',
               'duration'=> 'required|date_format:H:i:s',
               'songs_quantity' => 'required|integer|min:1',
               'description' => 'required|min:1|max:1000',
               'creation_date' => 'required|date',
               'user_id' => 'required|integer',
               'delete' => 'required|boolean', 
            ],
            [
                'playlist_name.required' => 'Debes ingresar el nombre de la playlist',
                'playlist_name.min' => 'El nombre de la playlist debe tener un largo minimo de 1 caracter',
                'playlist_name.max' => 'El nombre de la playlist debe tener un largo maximo de 30 caracteres',

                'duration.required' => 'Debes ingresar la duracion total de la playlist',
                'duration.date_format' => 'La duracion total de la playlist debe seguir el formato: H:i:s',
                
                'songs_quantity.required' => 'Debes ingresar el numero de canciones de la playlist',
                'songs_quantity.integer' => 'El numero de canciones debe ser de un tipo de dato integer',
                'songs_quantity.min' => 'El numero de canciones debe tener como minimo valor 1',

                'description.required' => 'Debes ingresar la descripcion de la playlist',
                'description.min' => 'La descripcion debe tener un largo minimio de 1 caracter',
                'description.max' => 'La descripcion debe tener un largo maximo de 1000 caracteres',

                'creation_date.required' => 'Debes ingresar la fecha de creacion de la playlist',
                'creation_date.date' => 'La fecha de creacion debe ser una fecha valida',

                'user_id.required' => 'Debes ingresar el id del usuario al que le pertenece el album',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newPlaylist= new Playlist();
        $newPlaylist->playlist_name  = $request->playlist_name;
        $newPlaylist->duration       = $request->duration;
        $newPlaylist->songs_quantity = $request->songs_quantity;
        $newPlaylist->description    = $request->description;
        $newPlaylist->creation_date  = $request->creation_date;
        $newPlaylist->user_id        = $request->user_id;
        $newPlaylist->delete         = $request->delete;
        $newPlaylist->save();
        return response()->json([
            'respuesta' => 'se ha creado una nueva playlist',
            'id'=> $newPlaylist->id,
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
        $playlist = Playlist::find($id);
        if(empty($playlist)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($playlist->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return response($playlist,200);
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
               'playlist_name' => 'required|min:1|max:30',
               'duration'=> 'required|date_format:H:i:s',
               'songs_quantity' => 'required|integer|min:1',
               'description' => 'required|min:1|max:1000',
               'creation_date' => 'required|date',
               'user_id' => 'required|integer',
               'delete' => 'required|boolean', 
            ],
            [
                'playlist_name.required' => 'Debes ingresar el nombre de la playlist',
                'playlist_name.min' => 'El nombre de la playlist debe tener un largo minimo de 1 caracter',
                'playlist_name.max' => 'El nombre de la playlist debe tener un largo maximo de 30 caracteres',

                'duration.required' => 'Debes ingresar la duracion total de la playlist',
                'duration.date_format' => 'La duracion total de la playlist debe seguir el formato: H:i:s',
                
                'songs_quantity.required' => 'Debes ingresar el numero de canciones de la playlist',
                'songs_quantity.integer' => 'El numero de canciones debe ser de un tipo de dato integer',
                'songs_quantity.min' => 'El numero de canciones debe tener como minimo valor 1',

                'description.required' => 'Debes ingresar la descripcion de la playlist',
                'description.min' => 'La descripcion debe tener un largo minimio de 1 caracter',
                'description.max' => 'La descripcion debe tener un largo maximo de 1000 caracteres',

                'creation_date.required' => 'Debes ingresar la fecha de creacion de la playlist',
                'creation_date.date' => 'La fecha de creacion debe ser una fecha valida',

                'user_id.required' => 'Debes ingresar el id del usuario al que le pertenece el album',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $playlist = Playlist::find($id);
        if(empty($playlist)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($playlist->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        $playlist->playlist_name  = $request->playlist_name;
        $playlist->duration       = $request->duration;
        $playlist->songs_quantity = $request->songs_quantity;
        $playlist->description    = $request->description;
        $playlist->creation_date    = $request->creation_date;
        $playlist->user_id        = $request->user_id;
        $playlist->delete         = $request->delete;
        $playlist->save();
        return response()->json([
            'respuesta' => 'se ha modificado una playlist',
            'id'=> $playlist->id,
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $playlist = Playlist::find($id);
        if(empty($playlist)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($playlist->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $playlist->delete = true;
        $playlist->save();
        return response()->json([
            'respuesta' => 'Se ha eliminado una lista de reproduccion',
            'id' => $playlist->id,
        ],200);
    }
}
