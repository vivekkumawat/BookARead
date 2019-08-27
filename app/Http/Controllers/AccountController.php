<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function orders()
    {
        if (session('order_placed_success_message')) {
            toast(session('order_placed_success_message'),'success');
        }

        return view('account.orders');
    }

    public function settings()
    {
        return view('account.settings');
    }

    public function addresses()
    {
        return view('account.addresses');
    }

    public function subscription()
    {
        return view('account.subscription');
    }
}
