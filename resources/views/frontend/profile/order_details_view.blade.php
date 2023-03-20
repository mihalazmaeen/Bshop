@extends('frontend.main_master')
@section('content')


    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-5">
                    <div class="card">
                        <div class="card_header">
                            <h4>Shipping Details</h4>
                        </div><hr>
                        <div class="card-body" style="background: #E9EBEC;">
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

                </div>
                @php
                    $order_status=$order->status;
                    $order_id=$order->id;
                    $order_return=$order->return_reason;

                @endphp

                <div class="col-md-5">
                    <div class="card">
                        <div class="card_header">
                            <h4>Order Details</h4>
                            <h4>Invoice:{{$order->invoice_no}}</h4>
                        </div><hr>
                        <div class="card-body" style="background: #E9EBEC;">
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
                                    <th>Status: <span class="badge badge-pill badge-warning"></span>{{$order->status}}</th>
                                </tr>



                            </table>

                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr style="background:#E2E2E2;">
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
                                    <tr style="background:#E2E2E2;">
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

                @php

                @endphp

                @if($order_status == "delivered" && $order_return == NULL)
                    <form action="{{route('return-order',$order_id)}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="label"> Return Reason </label>
                            <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Return Reason</textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </form>
                @elseif($order_return !== NULL)

                    <label for=""><span class="badge badge-pill badge-info" style="background: red">Return Requested</span> </label>

                @else




                @endif
                <br><br>

            </div>
        </div>
    </div>

@endsection
