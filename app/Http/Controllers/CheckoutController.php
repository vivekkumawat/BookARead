<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.checkout');
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

    public function store(Request $request, Order $order)
    {
        try{
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'mobile_no' => 'required|numeric|digits:10',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'pincode' => 'required|numeric|digits:6',
            ]);

            $user = $request->user();
            $input = $request->all();

            $order->create([
                'user_id' => $user->id,
                'email' => $input['email'],
                'name' => $input['name'],
                'mobile_no' => $input['mobile_no'],
                'address' => $input['address'],
                'city' => $input['city'],
                'state' => $input['email'],
                'pincode' => $input['pincode'],
            ]);
            Cart::instance('default')->destroy();
            return redirect()->route('cart.checkout.confirm')->with('order_placed_success_message', 'Order Placed Successfully!');
        }
        catch (Exception $e){
            //
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
