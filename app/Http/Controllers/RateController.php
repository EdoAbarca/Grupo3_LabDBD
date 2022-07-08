<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use Illuminate\Support\Facades\Validator;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rate::where('delete',false)->get();
        if($rates->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran valoraciones.',
            ]);
        }
        return response($rates,200); 
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
                'score' => 'required|integer|min:0|max:100',
                /*'delete' => 'required|boolean',*/
            ],
            [
                'user_id.required' => 'Debes ingresar el id del usuario el cual envio la valoracion',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                'song_id.required' => 'Debes ingresar el id de la cancion que recibio la valoracion',
                'song_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'score.required' => 'Debes ingresar el puntaje de la valoracion',
                'score.integer' => 'El puntaje debe ser un tipo de dato integer',
                'score.min' => 'El puntaje minimo asignable es 0',
                'score.max' => 'El puntaje maximo asignable es 100',

                /*'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',*/
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newRate= new Rate();
        $newRate->user_id        = $request->user_id;
        $newRate->song_id        = $request->song_id;
        $newRate->score          = $request->score;
        $newRate->delete         = 0;
        $newRate->save();
        return redirect('/crud/rate_crud/rate_index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rate = Rate::find($id);
        if(empty($rate)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($rate->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return view('crud/rate_crud/rate_show', compact('rate'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rate = Rate::find($id);
        return view('crud/rate_crud/rate_update', compact('rate'));  
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
                'score' => 'required|integer|min:0|max:100',
                /*'delete' => 'required|boolean',*/
            ],
            [
                'user_id.required' => 'Debes ingresar el id del usuario el cual envio la valoracion',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                'song_id.required' => 'Debes ingresar el id de la cancion que recibio la valoracion',
                'song_id.integer' => 'El id de la cancion debe ser de un tipo de dato integer',

                'score.required' => 'Debes ingresar el puntaje de la valoracion',
                'score.integer' => 'El puntaje debe ser un tipo de dato integer',
                'score.min' => 'El puntaje minimo asignable es 0',
                'score.max' => 'El puntaje maximo asignable es 100',

                /*'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',*/
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $rate = Rate::find($id);
        if(empty($rate)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($rate->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        $rate->user_id        = $request->user_id;
        $rate->song_id        = $request->song_id;
        $rate->score          = $request->score;
        $rate->delete         = 0;
        $rate->save();
        return redirect('/crud/rate_crud/rate_index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $rate = Rate::find($id);
        if(empty($rate)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($rate->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $rate->delete = true;
        $rate->save();
        return redirect('/crud/rate_crud/rate_index');

    }
}
