<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        if($genres->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran generos',
            ]);
        }
        return response($genres,200); 
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
               'genre_name'=>'required|min:3|max:15',
               'delete'=>'required|boolean', 
            ],
            [
                'genre_name.required' => 'Debes ingresar el nombre del genero',
                'genre_name.min' => 'El nombre del genero debe tener un largo minimo de 3 caracteres',
                'genre_name.max' => 'El nombre del genero debe tener un largo maximo de 15 caracteres',

                'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }
        $newGenre= new Genre();
        $newGenre->genre_name     =$request->genre_name;
        $newGenre->delete        =$request->delete;
        $newGenre->save();
        return response()->json([
            'respuesta' => 'se ha creado un nuevo genero',
            'id'=> $newGenre->id,
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
        $genre = Genre::find($id);
        if(empty($genre)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return response($genre,200);
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
                'genre_name'=>'required|min:3|max:15',
                'delete'=>'required|boolean', 
             ],
             [
                 'genre_name.required' => 'Debes ingresar el nombre del genero',
                 'genre_name.min' => 'El nombre del genero debe tener un largo minimo de 3 caracteres',
                 'genre_name.max' => 'El nombre del genero debe tener un largo maximo de 15 caracteres',

                 'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                 'delete.boolean' => '"delete" debe ser un booleano',
             ]
             );
        if($validator->fails()){
            return response($validator->errors());
        }
        $genre= Genre::find($id);
        if(empty($genre)){
            return response()->json([
                'respuesta' => 'No se encuentra el genero con el id ingresado',
            ]);
        }
        $genre->genre_name     =$request->genre_name;
        $genre->delete          =$request->delete;
        $genre->save();
        return response()->json([
            'respuesta' => 'se ha modificado un permiso',
            'id'=> $genre->id
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
        $genre = Genre::find($id);
        if(empty($genre)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($genre->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $genre->delete = true;
        $genre->save();
        return response()->json([
            'respuesta' => 'Se ha eliminado un genero',
            'id' => $genre->id,
        ],200);
    }
}
