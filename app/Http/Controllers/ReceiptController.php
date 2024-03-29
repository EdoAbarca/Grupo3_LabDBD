<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;
use Illuminate\Support\Facades\Validator;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = Receipt::where('delete',false)->get();
        if($receipts->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran boletas',
            ]);
        }
        return response($receipts,200);
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
                'name' => 'required|min:1|max:30',
                'sum' => 'required|integer',
                'payment_date' => 'required|date',
                'payment_time'=>'required|date_format:H:i:s',
                'payment_method_id' => 'required|integer',
                'user_id' => 'required|integer',    
                /*'delete' => 'required|boolean', */
            ],
            [
                'name.required' => 'Debes ingresar el nombre de la boleta',
                'name.min'      => 'El nombre de debe tener un largo minimo de 1 caracter',
                'name.max'      => 'El nombre de  debe tener un largo maximo de 30 caracteres',

                'sum.required'=> 'Debes ingresar el monto de la boleta',
                'sum.integer'=> '"sum" debe ser un integer',

                'payment_date.required' => 'Debes ingresar la fecha del pago efectuado',
                'payment_date.date'     => 'La fecha del pago debe ser una fecha valida',

                'payment_time.required' => 'Debes ingresar la hora del pago efectuado',
                'payment_time.date_format'     => 'La hora del pago debe ser una hora valida',

                'payment_method_id.required' => 'Debes ingresar el id de la cancion a la que se le dio like',
                'payment_method_id.integer' => 'El id del tipo de dato debe ser de un tipo de dato integer',
                
                'user_id.required' => 'Debes ingresar el id del usuario al que le pertenece la boleta',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                /*'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',*/

            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newReceipt= new Receipt();
        $newReceipt->name               = "Pago de suscripción.";
        $newReceipt->sum                = 2990;
        $newReceipt->payment_time       = time('H:i:s');
        $newReceipt->payment_date       = date('y-m-d');
        $newReceipt->user_id            = $request->user_id;
        $newReceipt->payment_method_id  = $request->payment_method_id;
        $newReceipt->delete             = 0;
        $newReceipt->save();

        return redirect('/crud/receipt_crud/receipt_index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receipt = Receipt::find($id);
        if(empty($receipt)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($receipt->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return view('crud/receipt_crud/receipt_show', compact('receipt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receipt = Receipt::find($id);
        return view('crud/receipt_crud/receipt_update', compact('receipt'));  
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
                'name' => 'required|min:1|max:30',
                'sum' => 'required|integer',
                'payment_date' => 'required|date',
                'payment_time'=>'required|date_format:H:i:s',
                'payment_method_id' => 'required|integer',
                'user_id' => 'required|integer',    
                /*'delete' => 'required|boolean', */
            ],
            [
                'name.required' => 'Debes ingresar el nombre de la boleta',
                'name.min'      => 'El nombre de debe tener un largo minimo de 1 caracter',
                'name.max'      => 'El nombre de  debe tener un largo maximo de 30 caracteres',
                
                'user_id.required' => 'Debes ingresar el id del usuario al que se le dio like',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                'payment_method_id.required' => 'Debes ingresar el id de la cancion a la que se le dio like',
                'payment_method_id.integer' => 'El id del tipo de dato debe ser de un tipo de dato integer',

                /*'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',*/
                
                'payment_date.required' => 'Debes ingresar la fecha del pago efectuado',
                'payment_date.date'     => 'La fecha del pago debe ser una fecha valida',

                'sum.required'=> 'Debes ingresar el monto de la boleta',
                'sum.integer'=> '"sum" debe ser un integer',

                'payment_time.required' => 'Debes ingresar la hora del pago efectuado',
                'payment_time.date_format:H:i:s'     => 'La hora del pago debe ser una hora valida',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }
        $receipt = Receipt::find($id);
        if(empty($receipt)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        } 
        if($receipt->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        } 
        $receipt->name              = $request->name;
        $receipt->sum               = $request->sum;
        $receipt->payment_time      = $request->payment_time;
        $receipt->payment_date      = $request->payment_date;
        $receipt->user_id           = $request->user_id  ;       
        $receipt->payment_method_id = $request->payment_method_id;       
        $receipt->delete = 0;     
        $receipt->save();
        return redirect('/crud/receipt_crud/receipt_index');

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $receipt = Receipt::find($id);
        if(empty($receipt)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($receipt->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $receipt->delete = true;
        $receipt->save();
        return redirect('/crud/receipt_crud/receipt_index');

    }
}
