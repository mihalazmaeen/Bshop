<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

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


}
