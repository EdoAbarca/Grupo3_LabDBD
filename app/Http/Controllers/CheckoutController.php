<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment_method;
use App\Models\User;
use App\Models\Receipt;

class CheckoutController extends Controller
{
    public function index()
    {
        $payment_methods = Payment_method::where('delete',false)->get();
        $users = User::where('delete',false)->get(); //Puede que este no sea necesario
        return view('checkout', ['payment_methods'=>$payment_methods, 'users'=>$users]);
    }

    public function pay(Request $request)
    {
        $payment_method = Payment_method::find($request->payment_method_id);
        if($payment_method->available_budget < $request->amount)
        {
            //Error, no se debe procesar la solicitud
            return redirect('checkout')->withErrors('El método de pago no posee el saldo suficiente para realizar la transacción');
        }
        $payment_method->available_budget = $payment_method->available_budget - $request->amount;
        $payment_method->save();

        $user = User::find($request->user_id);
        
        $newReceipt= new Receipt();
        $newReceipt->name               = "Pago de suscripción de ".$user->nickname;
        $newReceipt->sum                = $request->amount;
        $newReceipt->payment_time       = time('H:i:s');
        $newReceipt->payment_date       = date('y-m-d');
        $newReceipt->user_id            = $request->user_id;
        $newReceipt->payment_method_id  = $request->payment_method_id;
        $newReceipt->delete             = 0;
        $newReceipt->save();

        return redirect('home')->with('success', 'Suscripción pagada exitósamente!');
    }
}
