<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    public function AllAdmin(){
        $admins=Admin::where('type',2)->get();
        return view('backend.role.admin_role',compact('admins'));
    }

}
