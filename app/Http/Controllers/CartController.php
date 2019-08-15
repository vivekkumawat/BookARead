<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index () {
        return view('cart.index');
    }

    public function create () {
        //
    }

    public function store (Request $request) {

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()){
            return redirect()->route('cart.index');
        }

        cart::add($request->id, $request->name, 1, 0.00)
        ->associate('App\Models\Product');
        return redirect()->route('cart.index');
    }

    public function destroy ($id)
    {
        Cart::remove($id);
        return back();
    }

}
