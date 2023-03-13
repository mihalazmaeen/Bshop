<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subcategories=SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_view',compact('subcategories','categories'));
    }
    public function SubCategoryStore(Request $request ){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name_en'=>'required',
            'subcategory_name_bengali'=>'required',

        ]);


        SubCategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name_en'=>$request->subcategory_name_en,
            'subcategory_name_bengali'=>$request->subcategory_name_bengali,
            'subcategory_slug_en'=>strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_bengali'=>str_replace(' ', '-', $request->subcategory_name_bengali),



        ]);
        $notification=array(
            'message'=>'Sub-Category Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SubCategoryEdit($id){
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subcategory=SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit',compact('subcategory','categories'));
    }
    public function SubCategoryUpdate(Request $request){
        $subcategory_id=$request->id;



        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en'=>$request->subcategory_name_en,
            'subcategory_name_bengali'=>$request->subcategory_name_bengali,
            'subcategory_slug_en'=>strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_bengali'=>str_replace(' ', '-', $request->subcategory_name_bengali),



        ]);
        $notification=array(
            'message'=>'Sub-Category Edited Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('all.subcategory')->with($notification);

    }
    public function SubCategoryDelete($id){


        SubCategory::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Sub-Category Deleted Successfully',
            'alert-type'=>'info'
        );
        return redirect()->back()->with($notification);

    }
    public function SubSubCategoryView(){
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subsubcategories=SubSubCategory::latest()->get();
        return view('backend.subcategory.subsubcategory_view',compact('subsubcategories','categories'));

    }
    public function GetSubCategory($category_id){
        $subcategory=SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcategory);
    }
    public function GetSubSubCategory($subcategory_id){
        $subsubcategory=SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();

        return json_encode($subsubcategory);
    }
    public function SubSubCategoryStore(Request $request ){
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_name_en'=>'required',
            'subsubcategory_name_bengali'=>'required',

        ]);


        SubSubCategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_name_en'=>$request->subsubcategory_name_en,
            'subsubcategory_name_bengali'=>$request->subsubcategory_name_bengali,
            'subsubcategory_slug_en'=>strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bengali'=>str_replace(' ', '-', $request->subsubcategory_name_bengali),



        ]);
        $notification=array(
            'message'=>'Sub->Sub-Category Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SubSubCategoryEdit($id){
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subcategories=SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategory=SubSubCategory::findOrFail($id);
        return view('backend.subcategory.sub_subcategory_edit',compact('categories','subcategories','subsubcategory'));
    }
    public function SubSubCategoryUpdate(Request $request){
        $subsubcategory_id=$request->id;



        SubSubCategory::findOrFail($subsubcategory_id)->update([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_name_en'=>$request->subsubcategory_name_en,
            'subsubcategory_name_bengali'=>$request->subsubcategory_name_bengali,
            'subsubcategory_slug_en'=>strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bengali'=>str_replace(' ', '-', $request->subsubcategory_name_bengali),



        ]);
        $notification=array(
            'message'=>'Sub->Sub-Category Edited Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('all.subsubcategory')->with($notification);

    }
    public function SubSubCategoryDelete($id){


        SubSubCategory::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Sub->Sub-Category Deleted Successfully',
            'alert-type'=>'info'
        );
        return redirect()->back()->with($notification);

    }
}
