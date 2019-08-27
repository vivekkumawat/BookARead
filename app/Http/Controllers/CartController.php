<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function index () {
        if (session('duplicate_item_message')) {
            toast(session('duplicate_item_message'),'info');
        }

        if (session('item_removed_from_cart_message')) {
            toast(session('item_removed_from_cart_message'),'error');
        }

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
            return redirect()->route('cart.index')->with('duplicate_item_message', 'Book is already in your cart!');
        }

        cart::add($request->id, $request->name, 1, 0.00)
        ->associate('App\Models\Product');
        return redirect()->back()->with('item_added_to_cart_message', 'Book is added to your cart');
    }

    public function destroy ($id)
    {
        Cart::remove($id);
        return back()->with('item_removed_from_cart_message', 'Book is removed from your cart');
    }

}
