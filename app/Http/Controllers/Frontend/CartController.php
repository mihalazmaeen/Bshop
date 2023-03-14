<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function AddToCart(Request $request, $id ){
    $product=Product::findOrFail($id);
    if($product->discount_price == NULL){
        Cart::add([
            'id' => $id,
            'name' => $request->product_name,
            'qty' => $request->quantity,
            'price' => $product->selling_price,
            'weight' => 1,
            'options' => [
                'image'=>$product->product_thumbnail,
                'color'=>$request->color,
                'size' => $request->size,
            ]]);
        return response()->json(['success' =>'Successfully Added on your Cart']);
    }else{
        Cart::add([
            'id' => $id,
            'name' => $request->product_name,
            'qty' => $request->quantity,
            'price' => $product->discount_price,
            'weight' => 1,
            'options' => [
                'image'=>$product->product_thumbnail,
                'color'=>$request->color,
                'size' => $request->size,
            ]]);
        return response()->json(['success' =>'Successfully Added on your Cart']);
    }
    }
    public function AddMiniCart(){
        $carts=Cart::content();
        $cartQty=Cart::count();
        $cartTotal=Cart::total();
        return response()->json(array(
           'carts' =>$carts,
            'cartQty' =>$cartQty,
            'cartTotal' =>($cartTotal),
        ));
    }
    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success'=>'Product Removed from Cart']);
    }

public function AddToWishlist(Request $request,$product_id){
        if(Auth::check()){
            $exists=Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if(!$exists){
                Wishlist::insert([
                    'user_id'=>Auth::id(),
                    'product_id'=>$product_id,
                    'created_at'=>Carbon::now(),
                ]);
                return response()->json(['success'=>'Added to Wishlist Successfully !!']);
            }else{
                return response()->json(['error'=>'This product is already in your Wishlist !!']);
            }

        }else{
            return response()->json(['error'=>'Login to Your Account First !!']);
        }
}
    public function ApplyCoupon(Request $request)
    {
            $coupon=Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity', '>=',Carbon::now()->format('Y-m-d'))->first();
            if($coupon){
                $cart_total=str_replace(array(".", ","), array(".", ""), Cart::total());
                Session::put('coupon',[
                    'coupon_name'=>$coupon->coupon_name,
                    'coupon_discount'=>$coupon->coupon_discount,
                    'discount_amount'=>round(($cart_total * $coupon->coupon_discount)/100),
                    'total_amount'=>round(($cart_total - ($cart_total * $coupon->coupon_discount)/100)),

                ]);
                return response()->json(array(
                    'success'=>'Coupon Applied Successfully',

                ));
            }else{
                return response()->json(['error'=>'Invalid coupon']);
            }
    }
    public function CouponCalculation(){
        if (Session::has('coupon')){
            return response()->json(array(
                'subtotal'=>str_replace(array(".", ","), array(".", ""), Cart::total()),
                'coupon_name'=>session()->get('coupon')['coupon_name'],
                'coupon_discount'=>session()->get('coupon')['coupon_discount'],
                'discount_amount'=>session()->get('coupon')['discount_amount'],
                'total_amount'=>session()->get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total'=>str_replace(array(".", ","), array(".", ""), Cart::total()),
            ));
    }

}
    public function CouponRemove()
    {
        session::forget('coupon');
        return response()->json(['success'=>'Coupon Remove Successfully']);

    }


}
