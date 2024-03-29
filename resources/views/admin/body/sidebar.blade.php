@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>BShop</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{($route=='dashboard')?'active':''}}">
                <a href="{{url('admin/dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @php
            $brand=(auth()->guard('admin')->user()->brand == 1);
            $category=(auth()->guard('admin')->user()->category == 1);
            $category=(auth()->guard('admin')->user()->category == 1);
            $product=(auth()->guard('admin')->user()->product == 1);
            $slider=(auth()->guard('admin')->user()->slider == 1);
            $coupons=(auth()->guard('admin')->user()->coupons == 1);
            $blog=(auth()->guard('admin')->user()->blog == 1);
            $shipping=(auth()->guard('admin')->user()->shipping == 1);
            $setting=(auth()->guard('admin')->user()->setting == 1);
            $returnorder=(auth()->guard('admin')->user()->returnorder == 1);
            $review=(auth()->guard('admin')->user()->review == 1);
            $orders=(auth()->guard('admin')->user()->orders == 1);
            $stock=(auth()->guard('admin')->user()->stock == 1);
            $reports=(auth()->guard('admin')->user()->reports == 1);
            $alluser=(auth()->guard('admin')->user()->alluser == 1);
            $adminuserrole=(auth()->guard('admin')->user()->adminuserrole == 1);
            @endphp

            @if($brand)
                <li class="treeview" class="{{($prefix=='/brand')?'active':''}}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Brands</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu" >
                        <li class="{{($route=='all.brand')?'active':''}}"><a href="{{route('all.brand')}}"><i class="ti-more"></i>All brands</a></li>

                    </ul>
                </li>
            @else
            @endif

            @if($category)
                <li class="treeview" class="{{($prefix=='/category')?'active':''}}">
                    <a href="#">
                        <i data-feather="mail"></i> <span>Category</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='all.category')?'active':''}}"><a href="{{route('all.category')}}"><i class="ti-more"></i>All Categories</a></li>
                        <li class="{{($route=='all.subcategory')?'active':''}}"><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>Sub Categories</a></li>
                        <li class="{{($route=='all.subsubcategory')?'active':''}}"><a href="{{route('all.subsubcategory')}}"><i class="ti-more"></i>Sub-> Sub-Categories</a></li>

                    </ul>
                </li>
            @else
            @endif

            @if($product)
                <li class="treeview" class="{{($prefix=='/product')?'active':''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Products</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='add-product')?'active':''}}"><a href="{{route('add-product')}}"><i class="ti-more"></i>Add Product</a></li>
                        <li class="{{($route=='manage-product')?'active':''}}"><a href="{{route('manage-product')}}"><i class="ti-more"></i>Manage Product</a></li>
                        <li class="{{($route=='product-stock')?'active':''}}"><a href="{{route('product-stock')}}"><i class="ti-more"></i>Product Stock</a></li>

                    </ul>
                </li>
            @else
            @endif

            @if($slider)
                <li class="treeview" class="{{($prefix=='/slider')?'active':''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Main Slider</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='manage-slider')?'active':''}}"><a href="{{route('manage-slider')}}"><i class="ti-more"></i>Manage Slider</a></li>
                        {{--                    <li class="{{($route=='manage-product')?'active':''}}"><a href="{{route('manage-product')}}"><i class="ti-more"></i>Manage Product</a></li>--}}

                    </ul>
                </li>
            @else
            @endif

            @if($coupons)
                <li class="treeview" class="{{($prefix=='/coupons')?'active':''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Coupons</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='manage-coupon')?'active':''}}"><a href="{{route('manage-coupon')}}"><i class="ti-more"></i>Manage Coupons</a></li>
                        {{--                    <li class="{{($route=='manage-product')?'active':''}}"><a href="{{route('manage-product')}}"><i class="ti-more"></i>Manage Product</a></li>--}}

                    </ul>
                </li>
            @else
            @endif

            @if($shipping)
                <li class="treeview" class="{{($prefix=='/shipping')?'active':''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Shipping Area</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='manage-division')?'active':''}}"><a href="{{route('manage-division')}}"><i class="ti-more"></i>Shipping Divisions</a></li>
                        <li class="{{($route=='manage-district')?'active':''}}"><a href="{{route('manage-district')}}"><i class="ti-more"></i>Shipping Districts</a></li>
                        <li class="{{($route=='manage-state')?'active':''}}"><a href="{{route('manage-state')}}"><i class="ti-more"></i>Shipping States</a></li>


                    </ul>
                </li>
            @else
            @endif

            @if($orders)
                <li class="treeview" class="{{($prefix=='/orders')?'active':''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Orders</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='pending-orders')?'active':''}}"><a href="{{route('pending-orders')}}"><i class="ti-more"></i>Pending Orders</a></li>
                        <li class="{{($route=='confirmed-orders')?'active':''}}"><a href="{{route('confirmed-orders')}}"><i class="ti-more"></i>Confirmed Orders</a></li>
                        <li class="{{($route=='processing-orders')?'active':''}}"><a href="{{route('processing-orders')}}"><i class="ti-more"></i>Processing Orders</a>
                        </li>
                        <li class="{{($route=='picked-orders')?'active':''}}"><a href="{{route('picked-orders')}}"><i class="ti-more"></i>Picked Orders</a></li>
                        <li class="{{($route=='shipped-orders')?'active':''}}"><a href="{{route('shipped-orders')}}"><i class="ti-more"></i>Shipped Orders</a>
                        <li class="{{($route=='delivered-orders')?'active':''}}"><a href="{{route('delivered-orders')}}"><i class="ti-more"></i>Delivered Orders</a></li>
                        <li class="{{($route=='canceled-orders')?'active':''}}"><a href="{{route('canceled-orders')}}"><i class="ti-more"></i>Canceled Orders</a></li>

                        {{--                    <li class="{{($route=='manage-product')?'active':''}}"><a href="{{route('manage-product')}}"><i class="ti-more"></i>Manage Product</a></li>--}}

                    </ul>
                </li>
            @else
            @endif

            @if($returnorder)
                <li class="treeview" class="{{($prefix=='/return')?'active':''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Return Requests</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='return-requests')?'active':''}}"><a href="{{route('return-requests')}}"><i class="ti-more"></i>All Requests</a></li>
                        <li class="{{($route=='approve-list')?'active':''}}"><a href="{{route('approve-list')}}"><i class="ti-more"></i>Approved Returns</a></li>



                    </ul>
                </li>
            @else
            @endif

            @if($reports)
                <li class="treeview" class="{{($prefix=='/reports')?'active':''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>All Reports</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='all-reports')?'active':''}}"><a href="{{route('all-reports')}}"><i class="ti-more"></i>All Reports</a></li>



                    </ul>
                </li>
            @else
            @endif

            @if($alluser)
                <li class="treeview" class="{{($prefix=='/allusers')?'active':''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>All Users</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='all-users')?'active':''}}"><a href="{{route('all-users')}}"><i class="ti-more"></i>All Reports</a></li>



                    </ul>
                </li>
            @else
            @endif

            @if($adminuserrole)
                <li class="treeview" class="{{($prefix=='/adminuserrole')?'active':''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>All Admins</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='all-admins')?'active':''}}"><a href="{{route('all-admins')}}"><i class="ti-more"></i>All Admins</a></li>



                    </ul>
                </li>
            @else
            @endif



            @if($review)
                <li class="treeview" class="{{($prefix=='/review')?'active':''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Product Reviews</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='pending-reviews')?'active':''}}"><a href="{{route('pending-reviews')}}"><i class="ti-more"></i>Pending Reviews</a></li>
                        <li class="{{($route=='published-reviews')?'active':''}}"><a href="{{route('published-reviews')}}"><i class="ti-more"></i>Published Reviews</a></li>



                    </ul>
                </li>
            @else
            @endif

            @if($setting)
                <li class="treeview" class="{{($prefix=='/sitesetting')?'active':''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Site Settings</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route=='site-setting')?'active':''}}"><a href="{{route('site-setting')}}"><i class="ti-more"></i>Site Setting</a></li>
                        <li class="{{($route=='seo-setting')?'active':''}}"><a href="{{route('seo-setting')}}"><i class="ti-more"></i>SEO Setting</a></li>



                    </ul>
                </li>
            @else
            @endif
















{{--            Reviews--}}








        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
