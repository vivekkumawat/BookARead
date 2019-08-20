<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Plan;
use Illuminate\Http\Request;

class CouponController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
        $plan = Plan::get();
        if (!$coupon){
            return redirect()->route('plans.show');
        }

        session()->put('coupon_code', [
            'name' => $coupon->coupon_code,
            'discount' => $coupon->discount($plan->sum('total_price')),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon_code');
        return redirect()->back();
    }
}
