@extends('admin.admin_master')
@section('admin')


    <div class="container-full">
        <!-- Content Header (Page header) -->

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Order Details</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Invoice</li>
                                <li class="breadcrumb-item active" aria-current="page">{{$order->invoice_no}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Bordered</strong> box</h4>
                        </div>
                        <table class="table">
                            <tr>
                                <th>Shipping Name: {{$order->name}}</th>

                            </tr>
                            <tr>
                                <th>Shipping Phone: {{$order->phone}}</th>
                            </tr>
                            <tr>
                                <th>Shipping Email: {{$order->email}}</th>
                            </tr>
                            <tr>
                                <th>Division: {{$order->division->division_name}}</th>
                            </tr>
                            <tr>
                                <th>District: {{$order->district->district_name}}</th>
                            </tr>
                            <tr>
                                <th>State: {{$order->state->state_name}}</th>
                            </tr>
                            <tr>
                                <th>Post Code: {{$order->post_code}}</th>
                            </tr>
                            <tr>
                                <th>Order Date: {{$order->order_date}}</th>
                            </tr>

                        </table>
                    </div>
                </div>


                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Order</strong>Details</h4>
                        </div>
                        <table class="table">
                            <tr>
                                <th>Name: {{$order->user->name}}</th>

                            </tr>
                            <tr>
                                <th>Phone: {{$order->user->phone}}</th>
                            </tr>
                            <tr>
                                <th>Payment Type: {{$order->payment_method}}</th>
                            </tr>
                            <tr>
                                <th class="text-danger">Invoice: {{$order->invoice_no}}</th>
                            </tr>
                            <tr>
                                <th>Order Total: {{$order->amount}}</th>
                            </tr>
                            <tr>
                                <th>Status: <span class="badge badge-pill badge-info">{{$order->status}}</span></th>
                            </tr>
                            <tr>
                                <th>
                                    @if($order->status=='pending')
                                        <a href="{{route('pending-order-confirm',$order->id)}}" id="confirm_order" class="btn btn-block btn-success">Confirm Order</a>
                                    @endif
                                </th>

                            </tr>


                        </table>
                    </div>
                </div>
                <!-- /.col -->

                {{--                    ----------------Add Coupon------------}}

                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Ordered</strong>Items</h4>
                        </div>
                        <table class="table">
                            <tbody>
                            <tr style="">
                                <td class="col-md-1">
                                    <label for="">Image</label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">Product name</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Product Code</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Color</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Size </label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Quantity</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Price</label>
                                </td>
                            </tr>
                            @foreach($order_items as $order)
                                <tr style="">
                                    <td class="col-md-1">
                                        <label for=""><img src="{{asset($order->product->product_thumbnail)}}" height="50px" width="50px"></label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">{{$order->product->product_name_en}}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">{{$order->product->product_code}}</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">{{$order->color}}</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">{{$order->size}}</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">{{$order->qty}}</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for="">{{$order->price}} ({{$order->price*$order->qty}})</label>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
