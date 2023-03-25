@extends('admin.admin_master')
@section('admin')
    @php
    $date=date('d-m-y');
    $today=\App\Models\Order::where('order_date',$date)->sum('amount');

    $month=date('F');
    $monthly=\App\Models\Order::where('order_month',$month)->sum('amount');

     $year=date('Y');
    $yearly=\App\Models\Order::where('order_year',$year)->sum('amount');

    $pending=\App\Models\Order::where('status','pending')->count('id');

    @endphp
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Today's Sell</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$today}}<small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Monthly Sell</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$monthly}} <small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-info-light rounded w-60 h-60">
                            <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Yearly Sell</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$yearly}} <small class="text-danger"><i class="fa fa-caret-down"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Pending Orders</p>
                            <h3 class="text-white mb-0 font-weight-500">{{$pending}}<small class="text-danger"><i class="fa fa-caret-up"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>

            @php
            $recents=\App\Models\Order::latest()->limit(10)->get();
            @endphp
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title align-items-start flex-column">
                            Recent Orders
                            <small class="subtitle"></small>
                        </h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <thead>
                                <tr class="text-uppercase bg-lightest">
                                    <th style="min-width: 250px"><span class="text-white">Date</span></th>
                                    <th style="min-width: 100px"><span class="text-fade">Invoice</span></th>
                                    <th style="min-width: 100px"><span class="text-fade">Payment Method</span></th>
                                    <th style="min-width: 150px"><span class="text-fade">Amount</span></th>
                                    <th style="min-width: 130px"><span class="text-fade">User Name</span></th>
                                    <th style="min-width: 120px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recents as $recent)
                                <tr>
                                    <td class="pl-0 py-8">
                                          <span class="text-white font-weight-600 d-block font-size-16">
													{{$recent->order_date}}
                                          </span>
                                    </td>
                                    <td class="pl-0 py-8">
                                          <span class="text-white font-weight-600 d-block font-size-16">
													{{$recent->invoice_no}}
                                          </span>
                                    </td>
                                    <td class="pl-0 py-8 text-center">
                                          <span class="text-white font-weight-600 d-block font-size-16">
													{{$recent->payment_method}}
                                          </span>
                                    </td>
                                    <td class="pl-0 py-8 text-center">
                                          <span class="text-white font-weight-600 d-block font-size-16">
													{{$recent->amount}}
                                          </span>
                                    </td>
                                    <td class="pl-0 py-8">
                                          <span class="text-white font-weight-600 d-block font-size-16">
													{{$recent->name}}
                                          </span>
                                    </td>

                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
