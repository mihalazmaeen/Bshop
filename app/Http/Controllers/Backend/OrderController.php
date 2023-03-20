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
    public function ConfirmedOrders(){
        $confirmed=Order::where('status','confirmed')->orderBy('order_date','DESC')->get();
        return view('backend.order.confirmed_orders',compact('confirmed'));
    }
    public function DeliveredOrders(){
        $delivered=Order::where('status','delivered')->orderBy('order_date','DESC')->get();
        return view('backend.order.delivered_orders',compact('delivered'));
    }
    public function ShippedOrders(){
        $shipped=Order::where('status','shipped')->orderBy('order_date','DESC')->get();
        return view('backend.order.shipped_orders',compact('shipped'));
    }
    public function CanceledOrders(){
        $canceled=Order::where('status','canceled')->orderBy('order_date','DESC')->get();
        return view('backend.order.canceled_orders',compact('canceled'));
    }
    public function ProcessingOrders(){
        $processing=Order::where('status','processing')->orderBy('order_date','DESC')->get();
        return view('backend.order.processing_orders',compact('processing'));
    }
    public function PickedOrders(){
        $picked=Order::where('status','picked')->orderBy('order_date','DESC')->get();
        return view('backend.order.picked_orders',compact('picked'));
    }
    public function PendingOrderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $order_items=OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('backend.order.pendingorder_details_view',compact('order_items','order'));
    }
    public function PendingOrderConfirm($order_id){
        $confirm_order = Order::find($order_id)->update(['status' => 'confirmed']);
        $notification=array(
            'message'=>'Order Confirmed Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('pending-orders')->with($notification);
    }
}
