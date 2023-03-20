<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function PendingOrders(){
        $pending=Order::where('status','pending')->orderBy('order_date','DESC')->get();
        return view('backend.order.pending_orders',compact('pending'));
    }
}
