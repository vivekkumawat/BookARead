<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;

class PlanController extends Controller
{
    public function index () {
        return view('plans.index')
            ->with([
                'plans' => Plan::get(),
            ]);
    }

    public function show(Plan $plan) {
        return view('plans.show')->with([
            'plan' => $plan,
        ]);
    }

    public function pay (Request $request, Subscription $subscription) {
        $this->validate($request, [
            'mobile_no' => 'required|numeric|digits:10',
            'address' => 'required',
            'checkbox' =>'accepted',
            'pincode' => 'required|numeric|digits:6',
            'country' => 'required|not_in:0',
            'state' => 'required',
        ]);

        $user = $request->user();
        $plan = Plan::findOrFail($request->plan);


        $input = $request->all();
        $input['order_id'] = 'ORDER_ID-'.mt_rand(1111,9999);
        $payment = PaytmWallet::with('receive');

        User::where('id', $user->id)->update([
            'order_id' => $input['order_id'],
        ]);


        $subscription->create([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'order_id' => $input['order_id'],
            'plan_name' => $plan->name,
            'plan_price' => $plan->price,
        ]);

        $payment->prepare([
            'order' => $input['order_id'],
            'user' => 'BookARead',
            'mobile_number' => '8054845360',
            'email' => 'vivekkumawat360@gmail.com',
            'amount' => $plan->price,
            'callback_url' => url('api/payment/status')
        ]);
        return $payment->receive();
    }
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');
        $response = $transaction->response();
        $order_id = $transaction->getOrderId();
        // Transaction 1 = Failed, 2 = Success, 0 = Processing
        if($transaction->isSuccessful()){
            Subscription::where('order_id',$order_id)->update(['status'=>2, 'transaction_id'=>$transaction->getTransactionId()]);
            return redirect()->route('account');
        }else if($transaction->isFailed()){
            Subscription::where('order_id',$order_id)->update(['status'=>1, 'transaction_id'=>$transaction->getTransactionId()]);
            return redirect()->route('plans.index');
        }
    }
}
