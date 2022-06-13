<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $likes = Like::all();
        if($likes->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran likes',
            ]);
        }
        return response($likes,200); 
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
                'song_id' => 'required|integer',
                'delete' => 'required|boolean', 
            ],
            [
                'user_id.required' => 'Debes ingresar el id del usuario que dio like a una cancion',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                'song_id.required' => 'Debes ingresar el id de la cancion a la que se le dio like',
                'song_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newLike= new Like();
        $newLike->user_id        = $request->user_id;
        $newLike->song_id        = $request->song_id;
        $newLike->delete         = $request->delete;
        $newLike->save();
        return response()->json([
            'respuesta' => 'se ha creado un nuevo follow',
            'id'=> $newLike->id,
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
        $like = Like::find($id);
        if(empty($like)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return response($like,200);
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
                'song_id' => 'required|integer',
                'delete' => 'required|boolean', 
            ],
            [
                'user_id.required' => 'Debes ingresar el id del usuario que dio like',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                'song_id.required' => 'Debes ingresar el id de la cancion a la que se le dio like',
                'song_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $like = Like::find($id);
        if(empty($like)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        $like->user_id        = $request->user_id;
        $like->song_id        = $request->song_id;
        $like->delete         = $request->delete;
        $like->save();
        return response()->json([
            'respuesta' => 'se ha modificado un like',
            'id'=> $like->id,
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
        $like = Like::find($id);
        if(empty($like)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($like->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $like->delete = true;
        $like->save();
        return response()->json([
            'respuesta' => 'Se ha eliminado un like',
            'id' => $like->id,
        ],200);
    }
}
