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

                </ul>
            </li>

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



                </ul>
            </li>




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
