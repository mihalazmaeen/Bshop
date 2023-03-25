<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories=Category::latest()->get();
        $brands=Brand::latest()->get();
        return view('backend.product.add_product',compact('categories','brands'));
    }
    public function StoreProduct(Request $request){

        $image=$request->file('product_thumbnail');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(920,1000)->save('upload/products/thumbnail/'.$name_gen);
        $save_url='upload/products/thumbnail/'.$name_gen;
    $product_id=Product::insertGetId([
        'brand_id'=>$request->brand_id,
        'category_id'=>$request-> category_id,
        'subcategory_id'=>$request-> subcategory_id,
        'subsubcategory_id'=>$request-> subsubcategory_id,
        'product_name_en'=>$request-> product_name_en,
        'product_name_bengali'=>$request-> product_name_bengali,
        'product_slug_en'=>strtolower(str_replace('','-',$request-> product_name_en)),
        'product_slug_bengali'=>str_replace('','-',$request-> product_name_bengali),
        'product_code'=>$request-> product_code,
         'product_quantity'=>$request-> product_quantity,
        'product_tags_en'=>$request-> product_tags_en,
        'product_tags_bengali'=>$request-> product_tags_bengali,
        'product_size_en'=>$request-> product_size_en,
        'product_size_bengali'=>$request-> product_size_bengali,
        'product_color_en'=>$request-> product_color_en,
        'product_color_bengali'=>$request-> product_color_bengali,
         'selling_price'=>$request-> selling_price,
        'discount_price'=>$request-> discount_price,
        'short_description_en'=>$request-> short_description_en,
        'short_description_bengali'=>$request-> short_description_bengali,
        'long_description_en'=>$request-> long_description_en,
        'long_description_bengali'=>$request-> long_description_bengali,
        'product_thumbnail'=>$save_url,
        'hot_deals'=>$request-> hot_deals,
        'featured'=>$request-> featured,
        'special_offer'=>$request-> special_offer,
        'special_deals' =>$request->special_deals,
        'status'=>1,
        'created_at'=>Carbon::now(),
    ]);
//    Multiple images upload
        $images=$request->file('multi_img');
        foreach($images as $img){
            $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(920,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath='upload/products/multi-image/'.$make_name;
            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name'=>$uploadPath,
                'created_at'=>Carbon::now(),
            ]);
        }
        $notification=array(
            'message'=>'Product Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('manage-product')->with($notification);
    }
    public function ManageProduct(){
        $products=Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }
    public function EditProduct($id){
        $multiImgs=MultiImg::where('product_id',$id)->get();
        $brands=Brand::latest()->get();
        $categories=Category::latest()->get();
        $subcategories=SubCategory::latest()->get();
        $subsubcategories=SubSubCategory::latest()->get();
        $products=Product::findOrFail($id);
        return view('backend.product.edit_product',compact('categories','brands','subcategories','subsubcategories','products','multiImgs'));
    }
    public function UpdateProduct(Request $request){
        $product_id=$request->id;
        Product::findOrFail($product_id)->update([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request-> category_id,
            'subcategory_id'=>$request-> subcategory_id,
            'subsubcategory_id'=>$request-> subsubcategory_id,
            'product_name_en'=>$request-> product_name_en,
            'product_name_bengali'=>$request-> product_name_bengali,
            'product_slug_en'=>strtolower(str_replace('','-',$request-> product_name_en)),
            'product_slug_bengali'=>str_replace('','-',$request-> product_name_bengali),
            'product_code'=>$request-> product_code,
            'product_quantity'=>$request-> product_quantity,
            'product_tags_en'=>$request-> product_tags_en,
            'product_tags_bengali'=>$request-> product_tags_bengali,
            'product_size_en'=>$request-> product_size_en,
            'product_size_bengali'=>$request-> product_size_bengali,
            'product_color_en'=>$request-> product_color_en,
            'product_color_bengali'=>$request-> product_color_bengali,
            'selling_price'=>$request-> selling_price,
            'discount_price'=>$request-> discount_price,
            'short_description_en'=>$request-> short_description_en,
            'short_description_bengali'=>$request-> short_description_bengali,
            'long_description_en'=>$request-> long_description_en,
            'long_description_bengali'=>$request-> long_description_bengali,

            'hot_deals'=>$request-> hot_deals,
            'featured'=>$request-> featured,
            'special_offer'=>$request-> special_offer,
            'special_deals' =>$request->special_deals,
            'status'=>1,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Product Updated without Image Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('manage-product')->with($notification);

    }
//    Multiple images Update
public function UpdateProductMultiImage(Request $request){
        $imgs=$request->multi_img;
        foreach($imgs as $id => $image){
            $imageDelete=MultiImg::findOrFail($id);
            unlink($imageDelete->photo_name);
            $make_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(920,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath='upload/products/multi-image/'.$make_name;
            MultiImg::where('id',$id)->update([
               'photo_name'=>$uploadPath,
               'updated_at'=>Carbon::now(),
            ]);
        }
//        end foreach
    $notification=array(
        'message'=>'Product Multiple Images Updated Successfully',
        'alert-type'=>'info'
    );
    return redirect()->back()->with($notification);
}
//End Multiple images Update

//Product Thumbnail Update
public function UpdateProductThumbnail(Request $request){
        $product_id=$request->id;
        $oldImage=$request->old_img;
       unlink($oldImage);
    $image=$request->file('product_thumbnail');
    $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(920,1000)->save('upload/products/thumbnail/'.$name_gen);
    $save_url='upload/products/thumbnail/'.$name_gen;
    Product::findOrFail($product_id)->update([
        'product_thumbnail'=>$save_url,
        'updated_at'=>Carbon::now(),
    ]);
    $notification=array(
        'message'=>'Product Thumbnail Updated Successfully',
        'alert-type'=>'info'
    );
    return redirect()->back()->with($notification);

}
//Multi Image Delete
public function DeleteProductMultiImage($id){
$oldimg=MultiImg::findOrFail($id);
unlink($oldimg->photo_name);
MultiImg::findOrFail($id)->delete();
    $notification=array(
        'message'=>'Product Images deleted Successfully',
        'alert-type'=>'info'
    );
    return redirect()->back()->with($notification);

}
public function InactiveProduct($id){
        Product::findOrFail($id)->update([
            'status'=>0,
        ]);
    $notification=array(
        'message'=>'Product Inactive',
        'alert-type'=>'danger'
    );
    return redirect()->back()->with($notification);

}
    public function ActiveProduct($id){
        Product::findOrFail($id)->update([
            'status'=>1,
        ]);
        $notification=array(
            'message'=>'Product Active',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
    public function DeleteProduct($id){
        $product=Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();
        $images= MultiImg::where('product_id',$id)->get();
        foreach ($images as $image){
            unlink($image->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }
        $notification=array(
            'message'=>'Product Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function ProductStock(){
        $products=Product::latest()->get();
        return view('backend.product.product_stock',compact('products'));
    }






}
