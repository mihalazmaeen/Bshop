@extends('frontend.main_master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @section('title')
        My Cart Page
    @endsection

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->


    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">



                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <!-- guest-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle">Shipping Address</h4>
                                                <form class="register-form" action="{{route('checkout.store')}}" role="form">
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Name<span>*</span></label>
                                                        <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{Auth::user()->name}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email<span>*</span></label>
                                                        <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{Auth::user()->email}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Phone<span>*</span></label>
                                                        <input type="text" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{Auth::user()->phone}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Post Code<span>*</span></label>
                                                        <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Post Code" value="" required>
                                                    </div>




                                            </div>
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">


                                                <div class="form-group">
                                                    <h5>Select Division <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="division_id"  required="" class="form-control" >
                                                            <option value="" selected="" disabled="">Select Division</option>
                                                            @foreach($divisions as $division)
                                                                <option value="{{$division->id}}">{{$division->division_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('division_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Select District <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="district_id"  required="" class="form-control" >
                                                            <option value="" selected="" disabled="">Select District</option>

                                                        </select>
                                                        @error('district_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Select State <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="state_id"  required="" class="form-control" >
                                                            <option value="" selected="" disabled="">Select State</option>

                                                        </select>
                                                        @error('state_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Notes<span>*</span></label>
                                                    <textarea cols="30" rows="5" name="notes" class="form-control unicase-form-control text-input"  placeholder="Enter Notes" required></textarea>
                                                </div>




                                            </div>
                                            <!-- already-registered-login -->

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                            <!-- checkout-step-02  -->


                        </div><!-- /.checkout-steps -->
                    </div>
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
                                            @foreach($carts as $item)
                                            <li><strong>Image: </strong>
                                            <img src="{{asset($item->options->image)}}" style="height: 50px; width: 50px;"> </li>
                                            <li><strong>QTY: </strong>
                                            {{$item->qty}}
                                            <strong>Color: </strong>
                                            {{$item->options->color}}
                                            <strong>Size: </strong>
                                            {{$item->options->size}}<hr>
                                            </li>
                                            @endforeach
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
                                            <img src="{{asset('assets/payments/6.png')}}">
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="district_id"]').on('change',function(){
                let district_id=$(this).val();
                if(district_id){
                    $.ajax({
                        url:"{{url('/get-state/ajax')}}/" + district_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            console.log(data);
                            let d=$('select[name="state_id"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="state_id"]').append('<option value="'+value.id+'">'+value.state_name+'</option>');
                            })
                        }
                    })
                }else{
                    alert('danger')
                }
            })
            $('select[name="division_id"]').on('change',function(){
                let division_id=$(this).val();
                if(division_id){
                    $.ajax({
                        url:"{{url('/get-district/ajax')}}/"+division_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="state_id"]').empty();
                            let d=$('select[name="district_id"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
                            })
                        }
                    })
                }else{
                    alert('danger')
                }
            })

        })




    </script>
@endsection

