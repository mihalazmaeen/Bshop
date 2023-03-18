<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function MyOrders(){
        $orders=Order::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('frontend.profile.orders_view',compact('orders'));
    }
    public function OrderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::user()->id)->first();
        $order_items=OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.profile.order_details_view',compact('order_items','order'));
    }
}

