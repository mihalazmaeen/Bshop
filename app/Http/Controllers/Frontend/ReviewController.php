<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function ReviewStore(Request $request){
        $product_id = $request->product_id;
        $request->validate([
            'summary'=>'required',
            'comment'=>'required',
        ]);
        Review::insert([
           'product_id'=>$product_id,
           'user_id'=>Auth::id(),
            'comment'=>$request->comment,
            'summary'=>$request->summary,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Review added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function PendingReviews(){
        $pending=Review::where('status',0)->get();
        return view('backend.reviews.pending',compact('pending'));
    }
    public function ApproveReviews($review_id){
        Review::where('id',$review_id)->update(['status' =>1]);
        $notification=array(
            'message'=>'Review Approved Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
    public function PublishedReviews(){
        $published=Review::where('status',1)->get();
        return view('backend.reviews.published',compact('published'));
    }

}
