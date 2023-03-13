<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function SliderView(){
        $sliders=Slider::latest()->get();
        return view('backend.slider.slider_view',compact('sliders'));
    }
    public function SliderStore(Request $request ){
        $request->validate([

            'slider_image'=>'required',
        ]);
        $image=$request->file('slider_image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url='upload/slider/'.$name_gen;

        Slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,

            'slider_image'=>$save_url,

        ]);
        $notification=array(
            'message'=>'Slider Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SliderEdit($id){
        $slider=Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('slider'));
    }
    public function SliderUpdate(Request $request){
        $slider_id=$request->id;
        $old_img=$request->old_image;
        if($request->file('slider_image')){
            unlink($old_img);
            $image=$request->file('slider_image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
            $save_url='upload/slider/'.$name_gen;
            Slider::findOrFail($slider_id)->update([
                'title'=>$request->title,
                'description'=>$request->description,

                'slider_image'=>$save_url,

            ]);
            $notification=array(
                'message'=>'Slider Edited Successfully',
                'alert-type'=>'info'
            );
            return redirect()->route('manage-slider')->with($notification);
        }else{
            Slider::findOrFail($slider_id)->update([
                'title'=>$request->title,
                'description'=>$request->description,


            ]);
            $notification=array(
                'message'=>'Brand Edited Successfully',
                'alert-type'=>'info'
            );
            return redirect()->route('manage-slider')->with($notification);

        }
    }
    public function SliderDelete($id){
        $slider=Slider::findOrFail($id);
        $image=$slider->slider_image;
        unlink($image);
        Slider::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Slider Deleted Successfully',
            'alert-type'=>'info'
        );
        return redirect()->back()->with($notification);

    }
    public function InactiveSlider($id){
        Slider::findOrFail($id)->update([
            'status'=>0,
        ]);
        $notification=array(
            'message'=>'Slider Inactive',
            'alert-type'=>'danger'
        );
        return redirect()->back()->with($notification);

    }
    public function ActiveSlider($id){
        Slider::findOrFail($id)->update([
            'status'=>1,
        ]);
        $notification=array(
            'message'=>'Slider Active',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
}
