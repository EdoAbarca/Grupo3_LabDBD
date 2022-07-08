<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Validator;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $follows = Follow::where('delete',false)->get();
        if($follows->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran los seguimientos',
            ]);
        }
        return response($follows,200);
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
               'user_id1' => 'required|integer',
               'user_id2' => 'required|integer',
               /*'delete'   => 'required|boolean', */
            ],
            [
                'user_id1.required' => 'Debes ingresar el id del usuario 1 al que le pertenece el seguimiento',
                'user_id1.integer' => 'El id del usuario 1 debe ser de un tipo de dato integer',

                'user_id2.required' => 'Debes ingresar el id del usuario 2 al que le pertenece el seguimiento',
                'user_id2.integer' => 'El id del usuario 2 debe ser de un tipo de dato integer',

                /*'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',*/
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newfollow= new Follow();
        $newfollow->user_id1        = $request->user_id1;
        $newfollow->user_id2       = $request->user_id2;
        $newfollow->delete         = 0;
        $newfollow->save();
        return redirect('/crud/follow_crud/follow_index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $follow = Follow::find($id);
        if(empty($follow)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($follow->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return view('crud/follow_crud/follow_show', compact('follow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $follow = Follow::find($id);
        return view('crud/follow_crud/follow_update', compact('follow'));  
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
               'user_id1' => 'required|integer',
               'user_id2' => 'required|integer',
               /*'delete' => 'required|boolean', */
            ],
            [
                'user_id1.required' => 'Debes ingresar el id del usuario 1 al que le pertenece el seguimiento',
                'user_id1.integer' => 'El id del usuario 1 debe ser de un tipo de dato integer',

                'user_id2.required' => 'Debes ingresar el id del usuario 2 al que le pertenece el seguimiento',
                'user_id2.integer' => 'El id del usuario 2 debe ser de un tipo de dato integer',

                /*'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',*/
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $follow= Follow::find($id);
        if(empty($follow)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($follow->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        $follow->user_id1       = $request->user_id1;
        $follow->user_id2       = $request->user_id2;
        $follow->delete         = 0;
        $follow->save();
        return redirect('/crud/follow_crud/follow_index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $follow = Follow::find($id);
        if(empty($follow)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($follow->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $follow->delete = true;
        $follow->save();
        return redirect('/crud/follow_crud/follow_index');

    }
}
