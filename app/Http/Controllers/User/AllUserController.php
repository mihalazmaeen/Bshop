<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function InvoiceDownload($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::user()->id)->first();
        $order_items=OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('frontend.profile.invoice',compact('order_items','order'))->setPaper('a4')->setOptions([
            'tempDir'=>public_path(),
            'chroot'=>public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    }
    public function ReturnOrder(Request $request,$order_id){
        Order::findOrFail($order_id)->update([
           'return_date'=>Carbon::now()->format('d F Y'),
           'return_reason'=>$request->return_reason,
           'return_order'=>1,
        ]);
        $notification=array(
            'message'=>'Return Initiated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('orders')->with($notification);
    }
    public function ReturnOrderView(){
        $orders=Order::where('user_id',Auth::user()->id)->where('return_reason','!=','NULL')->orderBy('id','DESC')->get();
        return view('frontend.profile.return_view',compact('orders'));
    }
    public function CancelOrderView(){
        $orders=Order::where('user_id',Auth::user()->id)->where('status','cancelled')->orderBy('id','DESC')->get();
        return view('frontend.profile.cancelorder_view',compact('orders'));
    }
    public function TrackOrder(Request $request){
        $invoice=$request->invoice;
        $track=Order::where('invoice_no',$invoice)->first();
        if($track){
            return view('frontend.profile.trackorder_view',compact('track'));
        }else{
            $notification=array(
                'message'=>'Invalid Invoice',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}

