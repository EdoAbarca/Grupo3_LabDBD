<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song_genre;
use Illuminate\Support\Facades\Validator;

class Song_genreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $song_genres = Song_genre::where('delete',false)->get();
        if($song_genres->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran los generos de cancion',
            ]);
        }
        return response($song_genres,200);
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
               'genre_id' => 'required|integer',
               'song_id' => 'required|integer',
               'delete' => 'required|boolean', 
            ],
            [
                'genre_id.required' => 'Debes ingresar el id del genero al que pertenece el genero cancion',
                'genre_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'song_id.required' => 'Debes ingresar el id de la cancion al que le pertenece el genero cancion',
                'song_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newSong_genre= new Song_genre();
        $newSong_genre->genre_id        = $request->genre_id;
        $newSong_genre->song_id        = $request->song_id;
        $newSong_genre->delete         = $request->delete;
        $newSong_genre->save();
        return response()->json([
            'respuesta' => 'se ha creado una nueva lista de reproduccion cancion',
            'id'=> $newSong_genre->id,
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
        $song_genre = Song_genre::find($id);
        if(empty($song_genre)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($song_genre->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return response($song_genre,200);
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
               'genre_id' => 'required|integer',
               'song_id' => 'required|integer',
               'delete' => 'required|boolean', 
            ],
            [
                'genre_id.required' => 'Debes ingresar el id del genero al que pertenece el genero cancion',
                'genre_id.integer' => 'El id del genero debe ser de un tipo de dato integer',

                'song_id.required' => 'Debes ingresar el id de la cancion al que le pertenece el genero cancion',
                'song_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $song_genre = Song_genre::find($id);
        if(empty($song_genre)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }

        if($song_genre->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $song_genre->genre_id        = $request->genre_id;
        $song_genre->song_id        = $request->song_id;
        $song_genre->delete         = $request->delete;
        $song_genre->save();
        return response()->json([
            'respuesta' => 'se ha actualizado el genero cancion',
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
        $song_genre = Song_genre::find($id);
        if(empty($song_genre)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($song_genre->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $song_genre->delete = true;
        $song_genre->save();
        return response()->json([
            'respuesta' => 'Se ha eliminado un genero cancion',
            'id' => $song_genre->id,
        ],200);
    }
}
