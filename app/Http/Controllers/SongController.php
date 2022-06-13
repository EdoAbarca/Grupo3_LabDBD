<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::where('delete',false)->get();
        if($songs->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran canciones',
            ]);
        }
        return response($songs,200); 
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
               'song_name' => 'required|min:1|max:30',
               'duration'=> 'required|date_format:H:i:s',
               'stream' => 'required|integer|min:0',
               'release_date' => 'required|date',
               'parental_advisory' => 'required|boolean',
               'rate' => 'required|integer|min:0|max:100',
               'album_id' => 'required|integer',
               'delete' => 'required|boolean', 
            ],
            [
                'song_name.required' => 'Debes ingresar el nombre de la cancion',
                'song_name.min'      => 'El nombre de la cancion debe tener un largo minimo de 1 caracter',
                'song_name.max'      => 'El nombre de la cancion debe tener un largo maximo de 30 caracteres',

                'duration.required' => 'Debes ingresar la duracion del album',
                'duration.date_format' => 'El formato de la duracion debe ser el siguiente: "H:i:s"',

                'stream.required' => 'Debes ingresar el numero de reproducciones de la cancion',
                'stream.integer'  => 'El numero de reproducciones debe ser un tipo de dato integer',
                'stream.min'      => 'El numero de reproducciones debe ser un numero mayor o igual a 0',

                'release_date.required' => 'Debes ingresar la fecha de lanzamiento de la cancion',
                'release_date.date'     => 'La fecha de lanzamiento debe ser una fecha valida',

                'parental_advisory.required' => 'Debes ingresar si la cancion tiene restriccion de edad o no',
                'parental_advisory.boolean'  => '"Parental_advisory" debe ser un tipo de dato booleano',

                'rate.required' => 'Debes ingresar la valoracion de la cancion',
                'rate.integer' => 'La valoracion de la cancion debe ser de un tipo de dato integer',
                'rate.min' => 'La valoracion de la cancion debe ser un numero mayor o igual a 0',
                'rate.max' => 'La valoracion de la cancion debe ser un numero menor o igual a 100',

                'album_id.required' => 'Debes ingresar el id del album al que le pertenece la cancion',
                'album_id.integer' => 'El id del album debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }
        
        $newSong = new Song();
        $newSong->song_name         = $request->song_name;
        $newSong->duration          = $request->duration;
        $newSong->stream            = $request->stream;
        $newSong->release_date      = $request->release_date;
        $newSong->parental_advisory = $request->parental_advisory;
        $newSong->rate              = $request->rate;
        $newSong->album_id          = $request->album_id;
        $newSong->delete            = $request->delete;
        $newSong->save();
        return response()->json([
            'respuesta' => 'se ha creado una nueva cancion',
            'id'=> $newSong->id,
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
        $song = Song::find($id);
        if(empty($song)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($song->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return response($song,200);
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
               'song_name' => 'required|min:1|max:30',
               'duration'=> 'required|date_format:H:i:s',
               'stream' => 'required|integer|min:0',
               'release_date' => 'required|date',
               'parental_advisory' => 'required|boolean',
               'rate' => 'required|integer|min:0|max:100',
               'album_id' => 'required|integer',
               'delete' => 'required|boolean', 
            ],
            [
                'song_name.required' => 'Debes ingresar el nombre de la cancion',
                'song_name.min'      => 'El nombre de la cancion debe tener un largo minimo de 1 caracter',
                'song_name.max'      => 'El nombre de la cancion debe tener un largo maximo de 30 caracteres',

                'duration.required' => 'Debes ingresar la duracion del album',
                'duration.date_format' => 'El formato de la duracion debe ser el siguiente: "H:i:s"',

                'stream.required' => 'Debes ingresar el numero de reproducciones de la cancion',
                'stream.integer'  => 'El numero de reproducciones debe ser un tipo de dato integer',
                'stream.min'      => 'El numero de reproducciones debe ser un numero mayor o igual a 0',

                'release_date.required' => 'Debes ingresar la fecha de lanzamiento de la cancion',
                'release_date.date'     => 'La fecha de lanzamiento debe ser una fecha valida',

                'parental_advisory.required' => 'Debes ingresar si la cancion tiene restriccion de edad o no',
                'parental_advisory.boolean'  => '"Parental_advisory" debe ser un tipo de dato booleano',

                'rate.required' => 'Debes ingresar la valoracion de la cancion',
                'rate.integer' => 'La valoracion de la cancion debe ser de un tipo de dato integer',
                'rate.min' => 'La valoracion de la cancion debe ser un numero mayor o igual a 0',
                'rate.max' => 'La valoracion de la cancion debe ser un numero menor o igual a 100',

                'album_id.required' => 'Debes ingresar el id del album al que le pertenece la cancion',
                'album_id.integer' => 'El id del album debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $song = Song::find($id);
        if(empty($song)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($song->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }

        $song->song_name         = $request->song_name;
        $song->duration          = $request->duration;
        $song->stream            = $request->stream;
        $song->release_date      = $request->release_date;
        $song->parental_advisory = $request->parental_advisory;
        $song->rate              = $request->rate;
        $song->album_id          = $request->album_id;
        $song->delete            = $request->delete;
        $song->save();
        return response()->json([
            'respuesta' => 'se ha modificado una cancion',
            'id'=> $song->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $song = Song::find($id);
        if(empty($song)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($song->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $song->delete = true;
        $song->save();
        return response()->json([
            'respuesta' => 'Se ha eliminado una cancion',
            'id' => $song->id,
        ],200);
    }
}
