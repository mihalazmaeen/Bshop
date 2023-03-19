@extends('frontend.main_master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    @section('title')
        Cash On Delivery
    @endsection


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>COD</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->


    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">

                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">

                                            <li>
                                                @if(Session::has('coupon'))
                                                    <strong>Subtotal:</strong>${{$cartTotal}}<hr>
                                                    <strong>Coupon: </strong>{{session()->get('coupon')['coupon_name']}}<hr>
                                                    <strong>Coupon: </strong>{{session()->get('coupon')['coupon_name']}}
                                                    ({{session()->get('coupon')['coupon_discount']}}%)<hr>
                                                    <strong>Coupon Discount: </strong>${{session()->get('coupon')['discount_amount']}}
                                                    <hr>
                                                    <strong>Grand Total: </strong>${{session()->get('coupon')['total_amount']}}
                                                    <hr>

                                                @else
                                                    <strong>Subtotal: </strong>${{$cartTotal}}<hr>
                                                    <strong>GrandTotal: </strong>${{$cartTotal}}
                                            </li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->				</div>
                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Payment Method</h4>
                                    </div>

                                    <form action="{{route('cod.order')}}" method="post" id="payment-form">
                                        @csrf
                                        <div class="form-row">
                                            <img src="{{asset('assets/payments/cash.png')}}">

                                                <input type="hidden" name="name" value="{{$data['shipping_name']}}">
                                                <input type="hidden" name="email" value="{{$data['shipping_email']}}">
                                                <input type="hidden" name="phone" value="{{$data['shipping_phone']}}">
                                                <input type="hidden" name="post_code" value="{{$data['post_code']}}">
                                                <input type="hidden" name="division_id" value="{{$data['division_id']}}">
                                                <input type="hidden" name="district_id" value="{{$data['district_id']}}">
                                                <input type="hidden" name="state_id" value="{{$data['state_id']}}">
                                                <input type="hidden" name="notes" value="{{$data['notes']}}">
                                            </label>


                                        </div>
                                        <br>
                                        <button class="btn btn-primary">Submit Payment</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->				</div>

                    </form>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->


@endsection

