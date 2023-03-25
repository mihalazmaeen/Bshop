<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnOrderController extends Controller
{
    public function ReturnRequestView(){
        $returns=Order::where('return_order',1)->get();
        return view('backend.order.return_list',compact('returns'));
    }
    public function ApproveReturn($order_id){
        Order::where('id',$order_id)->update(['return_order'=>2]);
        $notification=array(
            'message'=>'Return Approved Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('approve-list')->with($notification);
    }
    public function Approvelist(){
        $returns=Order::where('return_order',2)->get();
        return view('backend.order.return_approve_list',compact('returns'));
    }
}
