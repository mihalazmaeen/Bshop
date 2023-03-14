@extends('frontend.main_master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @section('title')
        Stripe Payment Gateway
    @endsection

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Stripe</li>
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
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Payment Method</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Stripe</label>
                                            <input type="radio" name="payment_method" value="stripe">
                                            <img src="{{asset('assets/payments/2.png')}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Card</label>
                                            <input type="radio" name="payment_method" value="card">
                                            <img src="{{asset('assets/payments/3.png')}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">COD</label>
                                            <input type="radio" name="payment_method" value="cod">
                                            <img src="{{asset('assets/payments/2.png')}}">
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Confirm Order</button>
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

