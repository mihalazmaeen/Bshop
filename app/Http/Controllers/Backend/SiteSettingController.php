<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function SiteSettingView()
    {
        $setting = SiteSetting::find(1);
        return view('backend.setting.setting_update', compact('setting'));
    }

    public function SiteSettingUpdate(Request $request)
    {
        $setting_id = $request->id;

        if ($request->file('logo')) {

            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(139, 36)->save('upload/logo/' . $name_gen);
            $save_url = 'upload/logo/' . $name_gen;
            SiteSetting::findOrFail($setting_id)->update([
                'logo' => $save_url,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,


            ]);
            $notification = array(
                'message' => 'Site Edited Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            SiteSetting::findOrFail($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,


            ]);
            $notification = array(
                'message' => 'Site Edited Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);

        }
    }

    public function SeoSetting()
    {
        $setting = Seo::find(1);
        return view('backend.setting.seo_update', compact('setting'));
    }

    public function SeoSettingUpdate(Request $request)
    {
        $setting_id = $request->id;


        Seo::findOrFail($setting_id)->update([

            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,

        ]);
        $notification = array(
            'message' => 'Seo Edited Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);


    }



}
