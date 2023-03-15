<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){
        if(Session::has('coupon')){
            $total_amount=Session::get('coupon')['total_amount'];
        }else{
            $total_amount=str_replace(array(".", ","), array(".", ""), Cart::total());
        }
        \Stripe\Stripe::setApiKey('sk_test_51K411CAS0IFiYWoIHSmERtAF6cUOXiYexOYnFjqwYoPEoKyGMGzUF5A49wHTGW61lF64BBxXrqFlwNVRx7t2ghX600WX748aip');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total_amount,
            'currency' => 'BDT',
            'description' => 'BShop',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        $order_id=Order::insertGetId([
            'user_id'=>Auth::id(),
            'division_id'=>$request->division_id,
            'district_id'=>$request->district_id,
            'state_id'=>$request->state_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'post_code'=>$request->post_code,
            'notes'=>$request->notes,
            'payment_type'=>'Stripe',
            'payment_method'=>'Stripe',
            
            'transaction_id'=>$charge->balance_transaction,
            'currency'=>$charge->currency,
            'amount'=>$total_amount,
            'order_number'=>$charge->metadata->order_id,
            'invoice_no'=>'BSHOP'.mt_rand(1000000000,9999999999),
            'order_date'=>Carbon::now()->format('d F Y'),
            'order_month'=>Carbon::now()->format('F'),
            'order_year'=>Carbon::now()->format('Y'),
            'status'=>'pending',
            'created_at'=>Carbon::now(),


        ]);

    }
}
