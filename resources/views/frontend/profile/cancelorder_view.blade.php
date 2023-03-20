@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">Hello...</span><strong>{{Auth::user()->name}} </strong> Check Your Orders !!!
                        </h3>
                        <div class="card-body">
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr style="background:#E2E2E2;">
                                            <td class="col-md-1">
                                                <label for="">Date</label>
                                            </td>
                                            <td class="col-md-3">
                                                <label for="">Total</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label for="">Invoice</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label for="">Payment</label>
                                            </td>
                                            <td class="col-md-1">
                                                <label for="">Status </label>
                                            </td>
                                            <td class="col-md-3">
                                                <label for="">Action</label>
                                            </td>
                                        </tr>
                                        @forelse($orders as $order)
                                            <tr style="background:#E2E2E2;">
                                                <td class="col-md-1">
                                                    <label for="">{{$order->order_date}}</label>
                                                </td>
                                                <td class="col-md-3">
                                                    <label for="">{{$order->amount}}</label>
                                                </td>
                                                <td class="col-md-2">
                                                    <label for="">{{$order->invoice_no}}</label>
                                                </td>
                                                <td class="col-md-3">
                                                    <label for="">{{$order->payment_method}}</label>
                                                </td>
                                                <td class="col-md-1">
                                                    <label for=""><span class="badge badge-pill badge-info">{{$order->status}}</span> </label>
                                                </td>
                                                <td class="col-md-3">
                                                    <a href="{{url('user/order_details/'.$order->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>View</a>
                                                    <a href="{{url('user/invoice/'.$order->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i>Invoice</a>
                                                </td>
                                            </tr>

                                        @empty
                                        <h2 class="text-danger">No Order Found</h2>

                                        @endforelse

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
