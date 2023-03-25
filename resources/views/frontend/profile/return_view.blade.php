@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">Hello...</span><strong>{{Auth::user()->name}} </strong> Check Your Returns !!!
                        </h3>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr style="background:#E2E2E2;">
                                            <td class="col-md-3">
                                                <label for="">Date</label>
                                            </td>
                                            <td class="col-md-1">
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
                                                <label for="">Return Reason</label>
                                            </td>
                                        </tr>
                                        @foreach($orders as $order)
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
                                                    @if($order->return_order==1)

                                                    <label for=""><span class="badge badge-pill badge-info">Return Pending</span> </label>
                                                    <label for=""><span class="badge badge-pill badge-info" style="background: red">Return Requested</span> </label>
                                                    @elseif($order->return_order==2)
                                                        <label for=""><span class="badge badge-pill badge-success">Return Success</span> </label>

                                                    @endif

                                                </td>
                                                <td class="col-md-3">
                                                    <label for="">{{$order->return_reason}}</label>
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
            </div>
        </div>
    </div>

@endsection
