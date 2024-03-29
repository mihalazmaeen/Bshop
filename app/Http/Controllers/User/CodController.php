<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;

class CodController extends Controller
{
    public function CashondeliveryOrder(Request $request){
        if(Session::has('coupon')){
            $total_amount=Session::get('coupon')['total_amount'];
        }else{
            $total_amount=str_replace(array(".", ","), array(".", ""), Cart::total());
        }
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
            'payment_type'=>'COD',
            'payment_method'=>'COD',

            'transaction_id'=>Null,
            'currency'=>'BDT',
            'amount'=>$total_amount,
            'order_number'=>Null,
            'invoice_no'=>'BSHOP'.mt_rand(1000000000,9999999999),
            'order_date'=>Carbon::now()->format('d F Y'),
            'order_month'=>Carbon::now()->format('F'),
            'order_year'=>Carbon::now()->format('Y'),
            'status'=>'pending',
            'created_at'=>Carbon::now(),

        ]);
        $invoice=Order::findOrFail($order_id);
        $data=[
            'invoice_no'=>$invoice->invoice_no,
            'amount'=>$total_amount,
            'name'=>$invoice->name,
            'email'=>$invoice->email,
            'payment_type'=>'COD',

        ];
        Mail::to($request->email)->send(new OrderMail($data));
        $carts=Cart::content();
        foreach ($carts as $cart){
            OrderItem::insert([
                'order_id'=>$order_id,
                'product_id'=>$cart->id,
                'user_id'=>Auth::user()->id,
                'color'=>$cart->options->color,
                'size'=>$cart->options->size,
                'qty'=>$cart->qty,
                'price'=>$cart->price,
                'created_at'=>Carbon::now(),

            ]);
        }
        if (Session::has('coupon')){
            Session::forget('coupon');

        }
        Cart::destroy();
        $notification=array(
            'message'=>'Order Placed Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }
}
