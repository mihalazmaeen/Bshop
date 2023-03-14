@extends('frontend.main_master')
@section('content')
    @section('title')
        Wishlist Page
    @endsection

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Wishlist</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="my-wishlist-page">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">My Wishlist</th>
                                </tr>
                                </thead>
                                <tbody id="wishlist">


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Discount Code</span>
                                    <p>Enter your coupon code if you have one..</p>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.estimate-ship-tax -->








                </div><!-- /.row -->
            </div>
                <br>
                @include('frontend.body.brands')
            </div><!-- /.sigin-in-->



@endsection
