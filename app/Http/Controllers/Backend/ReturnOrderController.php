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
}
