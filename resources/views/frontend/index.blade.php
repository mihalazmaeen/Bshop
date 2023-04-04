@extends('frontend.main_master')
@section('content')

    @section('title')
        BShop
    @endsection
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

             @include('frontend.common.vertical_menu')

                <!-- ============================================== HOT DEALS ============================================== -->
                @include('frontend.common.hot_deals')
                <!-- ============================================== HOT DEALS: END ============================================== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Offer</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

                            <div class="item">
                                <div class="products special-product">
                                    @foreach($special_offer as $product)
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img src="{{asset($product->product_thumbnail)}}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                                @if(session()->get('language')=='bengali') {{$product->product_name_bengali}} @else {{$product->product_name_en}} @endif
                                                            </a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        @if($product->discount_price==NULL)
                                                            <div class="product-price"> <span class="price"> BDT {{$product->selling_price}}</span></div>
                                                        @else
                                                            <div class="product-price"><span class="price">BDT {{$product->discount_price}}</span> > </div>
                                                        @endif
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                <!-- ============================================== PRODUCT TAGS ============================================== -->
                @include ('frontend.common.product_tags')
                <!-- /.sidebar-widget -->
                <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                <!-- ============================================== SPECIAL DEALS ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Deals</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    @foreach($special_deals as $product)
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"> <img src="{{asset($product->product_thumbnail)}}"  alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                                @if(session()->get('language')=='bengali') {{$product->product_name_bengali}} @else {{$product->product_name_en}} @endif
                                                            </a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        @if($product->discount_price==NULL)
                                                            <div class="product-price"> <span class="price"> BDT {{$product->selling_price}}</span></div>
                                                        @else
                                                            <div class="product-price"><span class="price">BDT {{$product->discount_price}}</span>  </div>
                                                        @endif
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                <!-- ============================================== NEWSLETTER ============================================== -->
                <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                    <h3 class="section-title">Newsletters</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <p>Sign Up for Our Newsletter!</p>
                        <form>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                            </div>
                            <button class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== NEWSLETTER: END ============================================== -->

                <!-- ============================================== Testimonials============================================== -->
                @include ('frontend.common.testimonials')

                <!-- ============================================== Testimonials: END ============================================== -->

                <div class="home-banner"> <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach($sliders as $slider)
                        <div class="item" style="background-image: url({{asset($slider->slider_image)}});">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
                                    <div class="slider-header fadeInDown-1">{{$slider->title}}</div>
                                    <div class="big-text fadeInDown-1">{{$slider->description}}</div>

                                    <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->


                        <!-- /.item -->
                        @endforeach

                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">money back</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">30 Days Money Back Guarantee</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">free shipping</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Shipping on orders over $99</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Special Sale</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Extra $5 off on all items </h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">New Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                           <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                            @foreach($categories as $category)
                            <li><a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">
                                    @if(session()->get('language')=='bengali') {{$category->category_name_bengali}} @else {{$category->category_name_en}} @endif
                                </a></li>
                            @endforeach

                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach($products as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                                    <!-- /.image -->
                                                    @php
                                                    $amount=$product->selling_price-$product->discount_price;
                                                    $discount=($amount/$product->selling_price)*100;
                                                        @endphp
                                                    <div>
                                                        @if($product->discount_price==NULL)
                                                            <div class="tag new"><span>New</span></div>
                                                        @else
                                                            <div class="tag hot"><span>{{round($discount)}}%</span></div>
                                                        @endif
                                                    </div>


                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                            @if(session()->get('language')=='bengali') {{$product->product_name_bengali}} @else {{$product->product_name_en}} @endif
                                                        </a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    @if($product->discount_price==NULL)
                                                        <div class="product-price"> <span class="price"> BDT {{$product->selling_price}}</span></div>
                                                    @else
                                                        <div class="product-price"><span class="price">BDT {{$product->discount_price}}</span> <span class="price-before-discount">BDT {{$product->selling_price}}</span> </div>
                                                    @endif
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                            </li>

                                                            <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishlist(this.id)"> <i class="fa fa-heart"></i> </button>
                                                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>

                                    <!-- /.item -->
                                    @endforeach
{{--                                    end item carousel foreach--}}

                                    <!-- /.item -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->

                        @foreach($categories as $category)
                        <div class="tab-pane" id="category{{$category->id}}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @php
                                    $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                    @endphp
                                    @forelse($catwiseProduct as $product)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                                        <!-- /.image -->
                                                        @php
                                                            $amount=$product->selling_price-$product->discount_price;
                                                            $discount=($amount/$product->selling_price)*100;
                                                        @endphp
                                                        <div>
                                                            @if($product->discount_price==NULL)
                                                                <div class="tag new"><span>New</span></div>
                                                            @else
                                                                <div class="tag hot"><span>{{round($discount)}}%</span></div>
                                                            @endif
                                                        </div>


                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                                @if(session()->get('language')=='bengali') {{$product->product_name_bengali}} @else {{$product->product_name_en}} @endif
                                                            </a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>
                                                        @if($product->discount_price==NULL)
                                                            <div class="product-price"> <span class="price"> BDT {{$product->selling_price}}</span></div>
                                                        @else
                                                            <div class="product-price"><span class="price">BDT {{$product->discount_price}}</span> <span class="price-before-discount">BDT {{$product->selling_price}}</span> </div>
                                                        @endif
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                </li>

                                                                <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishlist(this.id)"> <i class="fa fa-heart"></i> </button>
                                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>

                                        <!-- /.item -->
                                    @empty
                                        <h5 class="text-danger">No Product Found</h5>


                                    @endforelse
                                    {{--                                    end item carousel foreach--}}

                                    <!-- /.item -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        @endforeach
{{--                        categorywise product ends here--}}
                        <!-- /.tab-pane -->



                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner1.jpg" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner2.jpg" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Featured products</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
{{--                        featured product Loop--}}
                        @foreach($featured as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                            <!-- /.image -->
                                            @php
                                                $amount=$product->selling_price-$product->discount_price;
                                                $discount=($amount/$product->selling_price)*100;
                                            @endphp
                                            <div>
                                                @if($product->discount_price==NULL)
                                                    <div class="tag new"><span>New</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{round($discount)}}%</span></div>
                                                @endif
                                            </div>


                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                    @if(session()->get('language')=='bengali') {{$product->product_name_bengali}} @else {{$product->product_name_en}} @endif
                                                </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            @if($product->discount_price==NULL)
                                                <div class="product-price"> <span class="price"> BDT {{$product->selling_price}}</span></div>
                                            @else
                                                <div class="product-price"><span class="price">BDT {{$product->discount_price}}</span> <span class="price-before-discount">BDT {{$product->selling_price}}</span> </div>
                                            @endif
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    </li>

                                                        <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishlist(this.id)"> <i class="fa fa-heart"></i> </button>

                                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                        @endforeach
                        <!-- /.item -->


                        <!-- /.item -->


                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
{{--                Skip Category 0 Starts--}}
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language')=='bengali') {{$skip_category_0->category_name_bengali}} @else {{$skip_category_0->category_name_en}} @endif </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        {{--                        featured product Loop--}}
                        @foreach($skip_product_0 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                            <!-- /.image -->
                                            @php
                                                $amount=$product->selling_price-$product->discount_price;
                                                $discount=($amount/$product->selling_price)*100;
                                            @endphp
                                            <div>
                                                @if($product->discount_price==NULL)
                                                    <div class="tag new"><span>New</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{round($discount)}}%</span></div>
                                                @endif
                                            </div>


                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                    @if(session()->get('language')=='bengali') {{$product->product_name_bengali}} @else {{$product->product_name_en}} @endif
                                                </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            @if($product->discount_price==NULL)
                                                <div class="product-price"> <span class="price"> BDT {{$product->selling_price}}</span></div>
                                            @else
                                                <div class="product-price"><span class="price">BDT {{$product->discount_price}}</span> <span class="price-before-discount">BDT {{$product->selling_price}}</span> </div>
                                            @endif
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    </li>

                                                    <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishlist(this.id)"> <i class="fa fa-heart"></i> </button>
                                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                        @endforeach
                        <!-- /.item -->


                        <!-- /.item -->


                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>

                {{--                Skip Category 0 Ends--}}
{{--                skip category 1 starts--}}
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language')=='bengali') {{$skip_category_1->category_name_bengali}} @else {{$skip_category_1->category_name_en}} @endif </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        {{--                        featured product Loop--}}
                        @foreach($skip_product_1 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                            <!-- /.image -->
                                            @php
                                                $amount=$product->selling_price-$product->discount_price;
                                                $discount=($amount/$product->selling_price)*100;
                                            @endphp
                                            <div>
                                                @if($product->discount_price==NULL)
                                                    <div class="tag new"><span>New</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{round($discount)}}%</span></div>
                                                @endif
                                            </div>


                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                    @if(session()->get('language')=='bengali') {{$product->product_name_bengali}} @else {{$product->product_name_en}} @endif
                                                </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            @if($product->discount_price==NULL)
                                                <div class="product-price"> <span class="price"> BDT {{$product->selling_price}}</span></div>
                                            @else
                                                <div class="product-price"><span class="price">BDT {{$product->discount_price}}</span> <span class="price-before-discount">BDT {{$product->selling_price}}</span> </div>
                                            @endif
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    </li>

                                                    <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishlist(this.id)"> <i class="fa fa-heart"></i> </button>
                                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                        @endforeach
                        <!-- /.item -->


                        <!-- /.item -->


                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>

{{--                skip category 1 ends--}}


                <!-- ============================================== WIDE PRODUCTS ============================================== -->
             
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== BEST SELLER ============================================== -->
{{--                skip Brand 0 starts here--}}
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language')=='bengali') {{$skip_brand_1->brand_name_bengali}} @else {{$skip_brand_1->brand_name_en}} @endif </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($skip_brand_product_1 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                            <!-- /.image -->
                                            @php
                                                $amount=$product->selling_price-$product->discount_price;
                                                $discount=($amount/$product->selling_price)*100;
                                            @endphp
                                            <div>
                                                @if($product->discount_price==NULL)
                                                    <div class="tag new"><span>New</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{round($discount)}}%</span></div>
                                                @endif
                                            </div>


                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                    @if(session()->get('language')=='bengali') {{$product->product_name_bengali}} @else {{$product->product_name_en}} @endif
                                                </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            @if($product->discount_price==NULL)
                                                <div class="product-price"> <span class="price"> BDT {{$product->selling_price}}</span></div>
                                            @else
                                                <div class="product-price"><span class="price">BDT {{$product->discount_price}}</span> <span class="price-before-discount">BDT {{$product->selling_price}}</span> </div>
                                            @endif
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    </li>

                                                    <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishlist(this.id)"> <i class="fa fa-heart"></i> </button>
                                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                        @endforeach
                        <!-- /.item -->


                        <!-- /.item -->


                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>



{{--                skip Brand 0 ends here--}}

               
                <!-- /.sidebar-widget -->
                <!-- ============================================== BEST SELLER : END ============================================== -->

                <!-- ============================================== BLOG SLIDER ============================================== -->
           
                <!-- /.section -->
                <!-- ============================================== BLOG SLIDER : END ============================================== -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
             
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>


@endsection

