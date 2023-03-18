<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function MyOrders(){
        $orders=Order::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('frontend.profile.orders_view',compact('orders'));
    }
}
