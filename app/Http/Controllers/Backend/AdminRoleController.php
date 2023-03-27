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
    public function AllAdmin()
    {
        $admins = Admin::where('type', 2)->get();
        return view('backend.role.admin_role', compact('admins'));
    }
    public function AddAdmin()
    {
        return view('backend.role.add_admin');
    }
    public function StoreAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
        $save_url = 'upload/admin_images/' . $name_gen;

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'adminuserrole' => $request->adminuserrole,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupons' => $request->coupons,
            'blog' => $request->blog,
            'shipping' => $request->shipping,
            'setting' => $request->setting,
            'returnorder' => $request->returnorder,
            'review' => $request->review,
            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'alluser' => $request->alluser,

            'profile_photo_path' => $save_url,
            'type' => 2,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Admin Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all-admins')->with($notification);
    }
    public function EditAdmin($id)
    {
        $admins = Admin::findOrFail($id);
        return view('backend.role.admin_edit', compact('admins'));
    }
    public function UpdateAdminRole(Request $request)
    {
        $admin_id = $request->admin_id;
        $old_img = $request->old_image;

        if($request->file('profile_photo_path')){
            unlink($old_img);
            $image=$request->file('profile_photo_path');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
            $save_url='upload/admin_images/'.$name_gen;
            Admin::find($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->admin_phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->admin_product,
                'slider' => $request->admin_slider,
                'coupons' => $request->coupons,
                'blog' => $request->blog,
                'shipping' => $request->shipping,
                'setting' => $request->setting,
                'returnorder' => $request->returnorder,
                'review' => $request->review,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'adminuserrole' => $request->adminuserrole,
                'profile_photo_path'=>$save_url,

            ]);
            $notification=array(
                'message'=>'Admin Edited Successfully',
                'alert-type'=>'info'
            );
            return redirect()->route('all-admins')->with($notification);
        }else{
            Admin::find($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->admin_phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->admin_product,
                'slider' => $request->admin_slider,
                'coupons' => $request->coupons,
                'blog' => $request->blog,
                'shipping' => $request->shipping,
                'setting' => $request->setting,
                'returnorder' => $request->returnorder,
                'review' => $request->review,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'adminuserrole' => $request->adminuserrole,


            ]);
            $notification=array(
                'message'=>'Admin Edited Successfully',
                'alert-type'=>'info'
            );
            return redirect()->route('all-admins')->with($notification);

        }

    }
    public function DeleteAdmin($id){
        $admin=Admin::findOrFail($id);
        $img=$admin->profile_photo_path;
        unlink($img);
        Admin::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Admin Deleted Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('all-admins')->with($notification);
    }

}
