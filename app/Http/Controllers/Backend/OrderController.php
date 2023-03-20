<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function PendingOrders(){
        $pending=Order::where('status','pending')->orderBy('order_date','DESC')->get();
        return view('backend.order.pending_orders',compact('pending'));
    }
    public function PendingOrderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $order_items=OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('backend.order.pendingorder_details_view',compact('order_items','order'));
    }
}
