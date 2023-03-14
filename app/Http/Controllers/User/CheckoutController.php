<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function GetDistrict($division_id){
        $districtid=ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($districtid);
    }
    public function GetState($district_id){
        $stateid=ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($stateid);
    }
}
