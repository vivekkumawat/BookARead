<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderConfirmationController extends Controller
{
    public function index()
    {
       return view('cart.order-confirmation');
    }
}
