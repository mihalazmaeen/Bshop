<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function ChangetoBengali(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','bengali');
        return redirect()->back();
    }
    public function ChangetoEnglish(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }
}
