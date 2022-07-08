<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment_method;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {
        $payment_methods = Payment_method::where('delete',false)->get();
        return view('checkout', ['payment_methods'=>$payment_methods]);
    }
}
