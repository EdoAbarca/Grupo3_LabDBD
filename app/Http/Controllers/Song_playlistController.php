<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song_playlist;
use Illuminate\Support\Facades\Validator;

class Song_playlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $song_playlists = Song_playlist::where('delete',false)->get();
        if($song_playlists->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran lista de reproduccion cancion',
            ]);
        }
        return response($song_playlists,200);
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
               'playlist_id' => 'required|integer',
               'song_id' => 'required|integer',
               'delete' => 'required|boolean', 
            ],
            [
                'playlist_id.required' => 'Debes ingresar el id de la playlist al que le pertenece la lista de reproduccion cancion',
                'playlist_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'song_id.required' => 'Debes ingresar el id de la cancion al que le pertenece la lista de reproduccion cancion',
                'song_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newSong_playlist= new Song_playlist();
        $newSong_playlist->playlist_id        = $request->playlist_id;
        $newSong_playlist->song_id        = $request->song_id;
        $newSong_playlist->delete         = $request->delete;
        $newSong_playlist->save();
        return response()->json([
            'respuesta' => 'se ha creado una nueva lista de reproduccion cancion',
            'id'=> $newSong_playlist->id,
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
        $song_playlist = Song_playlist::find($id);
        if(empty($song_playlist)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($song_playlist->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return response($song_playlist,200);
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
               'playlist_id' => 'required|integer',
               'song_id' => 'required|integer',
               'delete' => 'required|boolean', 
            ],
            [
                'playlist_id.required' => 'Debes ingresar el id de la playlist al que le pertenece la lista de reproduccion cancion',
                'playlist_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'song_id.required' => 'Debes ingresar el id de la cancion al que le pertenece la lista de reproduccion cancion',
                'song_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $song_playlist = Song_playlist::find($id);
        if(empty($song_playlist)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        if($song_playlist->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $song_playlist->playlist_id        = $request->playlist_id;
        $song_playlist->song_id        = $request->song_id;
        $song_playlist->delete         = $request->delete;
        $song_playlist->save();
        return response()->json([
            'respuesta' => 'se ha actualizado la lista de reproduccion cancion',
            'id'=> $song_playlist->id,
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
        $song_playlist = Song_playlist::find($id);
        if(empty($song_playlist)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($song_playlist->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $song_playlist->delete = true;
        $song_playlist->save();
        return response()->json([
            'respuesta' => 'Se ha eliminado una cancion de lista de reproduccion',
            'id' => $song_playlist->id,
        ],200);
    }

    public function deletePlaylistSong(Request $request, $id)
    {
        $song_playlist = Song_playlist::find($id);
        $song_playlist->delete = true;
        $song_playlist->save();
        return redirect('/playlists/{{$request->playlist_id}}')->with('success','Se ha quitado la canción de la lista de reproducción exitósamente!');  
    }
}
