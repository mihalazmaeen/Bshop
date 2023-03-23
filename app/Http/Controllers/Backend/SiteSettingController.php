<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function SiteSettingView(){
        $setting=SiteSetting::find(1);
        return view('backend.setting.setting_update',compact('setting'));
    }
    public function SiteSettingUpdate(Request $request){
        $setting_id=$request->id;
        $old_img=$request->old_image;
        if($request->file('logo')){
            unlink($old_img);
            $image=$request->file('logo');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(139,36)->save('upload/logo/'.$name_gen);
            $save_url='upload/logo/'.$name_gen;
           SiteSetting::findOrFail($setting_id)->update([
                'phone_one'=>$request->phone_one,
                'phone_two'=>$request->phone_two,
                'email'=>$request->email,
                'company_name'=>$request->company_name,
                'company_address'=>$request->company_address,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'youtube'=>$request->youtube,
                'logo'=>$save_url,

            ]);
            $notification=array(
                'message'=>'Site Edited Successfully',
                'alert-type'=>'info'
            );
            return redirect()->back()->with($notification);
        }else{
            SiteSetting::findOrFail($setting_id)->update([
                'phone_one'=>$request->phone_one,
                'phone_two'=>$request->phone_two,
                'email'=>$request->email,
                'company_name'=>$request->company_name,
                'company_address'=>$request->company_address,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'youtube'=>$request->youtube,
             

            ]);
            $notification=array(
                'message'=>'Site Edited Successfully',
                'alert-type'=>'info'
            );
            return redirect()->back()->with($notification);

        }
    }
}
