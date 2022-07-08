<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment_method;
use Illuminate\Support\Facades\Validator;

class Payment_methodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_methods = Payment_method::where('delete',false)->get();
        if($payment_methods->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran metodos de pago',
            ]);
        }
        return response($payment_methods,200); 
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
               'method_name' => 'required|min:3|max:15',
               'available_budget' => 'required|integer|min:0',
               'pmp' => 'required|min:8|max:300',
               //'user_id' => 'required|integer',
               //'delete' => 'required|boolean', 
            ],
            [
                'method_name.required' => 'Debes ingresar el nombre del metodo de pago',
                'method_name.min' => 'El nombre del metodo de pago debe tener un largo minimo de 3 caracteres',
                'method_name.max' => 'El nombre del metodo de pago debe tener un largo maximo de 15 caracteres',

                'available_budget.required' => 'Debes ingresar el presupuesto disponible del metodo de pago',
                'available_budget.integer' => 'El presupuesto disponible debe ser un tipo de dato integer',
                'available_budget.min' => 'El presupuesto disponible debe ser como mínimo 0',

                'pmp.required' => 'Debes ingresar la contraseña del metodo de pago',
                'pmp.min' => 'La contraseña del metodo de pago debe tener un largo minimo de 8 caracteres',
                'pmp.max' => 'La contraseña del metodo de pago debe tener un largo maximo de 300 caracteres',

                //'user_id.required' => 'Debes ingresar el id del usuario al que le pertenece el metodo de pago',
                //'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                //'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                //'delete.boolean' => '"delete" debe ser un booleano',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $newPayment_method= new Payment_method();
        $newPayment_method->method_name         = $request->method_name;
        $newPayment_method->pmp                 = $request->pmp;
        $newPayment_method->available_budget    = $request->available_budget;
        $newPayment_method->user_id             = $request->user_id;
        $newPayment_method->delete              = 0;
        $newPayment_method->save();
        return redirect('/crud/payment_method_crud/payment_method_index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment_method = Payment_method::find($id);
        if(empty($payment_method)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($payment_method->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        return view('crud/payment_method_crud/payment_method_show', compact('payment_method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment_method = Payment_method::find($id);
        return view('crud/payment_method_crud/payment_method_update', compact('payment_method'));  
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
               'method_name' => 'required|min:1|max:10',
               'available_budget' => 'required|integer|min:0',
               'pmp' => 'required|min:8|max:300',
               'user_id' => 'required|integer',
               /*'delete' => 'required|boolean', */
            ],
            [
                'method_name.required' => 'Debes ingresar el nombre del metodo de pago',
                'method_name.min' => 'El nombre del metodo de pago debe tener un largo minimo de 1 caracter',
                'method_name.max' => 'El nombre del metodo de pago debe tener un largo maximo de 15 caracteres',

                'pmp.required' => 'Debes ingresar la contraseña del metodo de pago',
                'pmp.min' => 'La contraseña del metodo de pago debe tener un largo minimo de 8 caracteres',
                'pmp.max' => 'La contraseña del metodo de pago debe tener un largo maximo de 300 caracteres',

                'available_budget.required' => 'Debes ingresar el presupuesto disponible del metodo de pago',
                'available_budget.integer' => 'El presupuesto disponible debe ser un tipo de dato integer',
                'available_budget.min' => 'El presupuesto disponible debe ser como mínimo 0',

                'user_id.required' => 'Debes ingresar el id del usuario al que le pertenece el metodo de pago',
                'user_id.integer' => 'El id del usuario debe ser de un tipo de dato integer',

                /*'delete.required' => 'Debes indicar si el elemento esta en estado de "delete" o no',
                'delete.boolean' => '"delete" debe ser un booleano',*/
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }

        $payment_method = Payment_method::find($id);
        if(empty($payment_method)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($payment_method->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        $payment_method->method_name         = $request->method_name;
        $payment_method->pmp                 = $request->pmp;
        $payment_method->available_budget    = $request->available_budget;
        $payment_method->user_id             = $request->user_id;
        $payment_method->delete              = 0;
        $payment_method->save();
        return redirect('/crud/payment_method_crud/payment_method_index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $payment_method = Payment_method::find($id);
        if(empty($payment_method)){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        if($payment_method->delete == true){
            return response()->json([
                'respuesta' => 'No se encuentra el id ingresado',
            ]);
        }
        
        $payment_method->delete = true;
        $payment_method->save();
        return redirect('/crud/payment_method_crud/payment_method_index');

    }
}
