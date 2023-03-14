<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function MyCart(){
        return view('frontend.wishlist.view_mycart');
    }
    public function GetCartProduct(){
        $carts=Cart::content();
        $cartQty=Cart::count();
        $cartTotal=Cart::total();
        return response()->json(array(
            'carts' =>$carts,
            'cartQty' =>$cartQty,
            'cartTotal' =>($cartTotal),
        ));
    }
    public function RemoveCartProduct($rowId){
        Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success'=>'Product Removed from Cart']);
    }
    public function CartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::Update($rowId, $row->qty+1);
        if (Session::has('coupon')){
            $coupon_name=Session::get('coupon')['coupon_name'];
            $coupon=Coupon::where('coupon_name',$coupon_name)->first();
            $cart_total=str_replace(array(".", ","), array(".", ""), Cart::total());
            Session::put('coupon',[
                'coupon_name'=>$coupon->coupon_name,
                'coupon_discount'=>$coupon->coupon_discount,
                'discount_amount'=>round(($cart_total * $coupon->coupon_discount)/100),
                'total_amount'=>round(($cart_total - ($cart_total * $coupon->coupon_discount)/100)),

            ]);
        }
        return response()->json('Incremented');
    }
    public function CartDecrement($rowId){
        $row = Cart::get($rowId);
        Cart::Update($rowId, $row->qty-1);
        if (Session::has('coupon')){
            $coupon_name=Session::get('coupon')['coupon_name'];
            $coupon=Coupon::where('coupon_name',$coupon_name)->first();
            $cart_total=str_replace(array(".", ","), array(".", ""), Cart::total());
            Session::put('coupon',[
                'coupon_name'=>$coupon->coupon_name,
                'coupon_discount'=>$coupon->coupon_discount,
                'discount_amount'=>round(($cart_total * $coupon->coupon_discount)/100),
                'total_amount'=>round(($cart_total - ($cart_total * $coupon->coupon_discount)/100)),

            ]);
        }
        return response()->json('Decremented');
    }
}
