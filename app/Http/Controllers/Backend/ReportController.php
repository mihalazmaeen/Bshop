<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use DateTime;

class ReportController extends Controller
{
    public function ReportsView(){
        return view('backend.reports.all_reports');
    }
    public function ReportByDate(Request $request){
        $date=new DateTime($request->date);
        $formatDate =$date->format('d F Y');
        $orders=Order::where('order_date',$formatDate)->latest()->get();
        return view('backend.reports.report_view',compact('orders'));
    }
    public function ReportByMonth(Request $request){

        $orders=Order::where('order_month',$request->month)->where('order_year',$request->year)->latest()->get();
        return view('backend.reports.report_view',compact('orders'));
    }
    public function ReportByYear(Request $request){

        $orders=Order::where('order_year',$request->year)->latest()->get();
        return view('backend.reports.report_view',compact('orders'));
    }
}
