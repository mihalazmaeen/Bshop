<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use Illuminate\Support\Carbon;

class ShippingController extends Controller
{
    public function DivisionView(){
        $divisions=ShipDivision::orderBy('id', 'desc')->get();
        return view('backend.ship.division.view_division',compact('divisions'));
    }
    public function DivisionStore(Request $request)
    {
        $request->validate([
           'division_name'=>'required',
        ]);
        ShipDivision::insert([
            'division_name'=>$request->division_name,
            'created_at'=>Carbon::now(),
        ]);
        $notification = array(
            'message'=>'Division added successfully',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);

    }
    public function DivisionEdit($id){
        $divisions=ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division',compact('divisions'));
    }
    public function DivisionUpdate(Request $request,$id){
        ShipDivision::findOrFail($id)->update([
            'division_name'=>$request->division_name ,
            'created_at'=>Carbon::now(),

        ]);
        $notification=array(
            'message'=>'Division Edited Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('manage-division')->with($notification);
    }
    public function DivisionDelete($id){
        ShipDivision::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Division Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('manage-division')->with($notification);
    }
//    District Methods
    public function DistrictView(){
        $divisions=ShipDivision::orderBy('division_name', 'asc')->get();
        $districts=ShipDistrict::with('division')->orderBy('id', 'desc')->get();
        return view('backend.ship.district.view_district',compact('divisions','districts'));
    }
    public function DistrictStore(Request $request)
    {
        $request->validate([
            'division_id'=>'required',
            'district_name'=>'required',
        ]);
        ShipDistrict::insert([
            'division_id'=>$request->division_id,
            'district_name'=>$request->district_name,
            'created_at'=>Carbon::now(),
        ]);
        $notification = array(
            'message'=>'District added successfully',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);

    }
    public function DistrictEdit($id){
        $divisions=ShipDivision::orderBy('division_name', 'asc')->get();
        $districts=ShipDistrict::findOrFail($id);
        return view('backend.ship.district.edit_district',compact('districts','divisions'));
    }
    public function DistrictUpdate(Request $request,$id){
        ShipDistrict::findOrFail($id)->update([
            'division_id'=>$request->division_id,
            'district_name'=>$request->district_name ,
            'created_at'=>Carbon::now(),

        ]);
        $notification=array(
            'message'=>'District Edited Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('manage-district')->with($notification);
    }
    public function DistrictDelete($id){
        ShipDistrict::findOrFail($id)->delete();
        $notification=array(
            'message'=>'District Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('manage-district')->with($notification);
    }
//    State Functions
    public function StateView(){
        $divisions=ShipDivision::orderBy('division_name', 'asc')->get();
        $districts=ShipDistrict::with('division')->orderBy('id', 'desc')->get();
        $states=ShipState::orderBy('id', 'asc')->get();
        return view('backend.ship.state.view_state',compact('divisions','districts',$states));
    }
    public function StateStore(Request $request)
    {
        $request->validate([
            'division_id'=>'required',
            'district_name'=>'required',
        ]);
        ShipDistrict::insert([
            'division_id'=>$request->division_id,
            'district_name'=>$request->district_name,
            'created_at'=>Carbon::now(),
        ]);
        $notification = array(
            'message'=>'District added successfully',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);

    }
    public function StateEdit($id){
        $divisions=ShipDivision::orderBy('division_name', 'asc')->get();
        $districts=ShipDistrict::findOrFail($id);
        return view('backend.ship.district.edit_district',compact('districts','divisions'));
    }
    public function StateUpdate(Request $request,$id){
        ShipDistrict::findOrFail($id)->update([
            'division_id'=>$request->division_id,
            'district_name'=>$request->district_name ,
            'created_at'=>Carbon::now(),

        ]);
        $notification=array(
            'message'=>'District Edited Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('manage-district')->with($notification);
    }
    public function StateDelete($id){
        ShipDistrict::findOrFail($id)->delete();
        $notification=array(
            'message'=>'District Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('manage-district')->with($notification);
    }
    public function GetDistrict($division_id){
        $districtid=ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
  
        return json_encode($districtid);
    }
}
