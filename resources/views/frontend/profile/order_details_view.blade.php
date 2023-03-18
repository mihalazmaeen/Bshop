@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-5">
                    <div class="card">
                        <div class="card_header">
                            <h4>Order Details</h4>
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

            </div>
        </div>
    </div>

@endsection
