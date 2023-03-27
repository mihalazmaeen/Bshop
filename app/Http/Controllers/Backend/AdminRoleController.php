<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminRoleController extends Controller
{
    public function AllAdmin(){
        $admins=Admin::where('type',2)->get();
        return view('backend.role.admin_role',compact('admins'));
    }
    public function AddAdmin(){
        return view('backend.role.add_admin');
    }
    public function StoreAdmin(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $image=$request->file('profile_photo_path');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
        $save_url='upload/admin_images/'.$name_gen;

        Admin::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'adminuserrole'=>$request->adminuserrole,
            'brand'=>$request->brand,
            'category'=>$request->category,
            'product'=>$request->product,
            'slider'=>$request->slider,
            'coupons'=>$request->coupons,
            'blog'=>$request->blog,
            'shipping'=>$request->shipping,
            'setting'=>$request->setting,
            'returnorder'=>$request->returnorder,
            'review'=>$request->review,
            'orders'=>$request->orders,
            'stock'=>$request->stock,
            'reports'=>$request->reports,
            'alluser'=>$request->alluser,

            'profile_photo_path'=>$save_url,
            'type'=>2,
            'created_at'=>Carbon::now(),

        ]);
        $notification=array(
            'message'=>'Admin Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all-admins')->with($notification);
    }

}
