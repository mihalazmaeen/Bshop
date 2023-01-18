@php
    $categories=App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp
<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach($categories  as $category)
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{$category->category_icon}}" aria-hidden="true"></i>
                        @if(session()->get('language')=='bengali') {{$category->category_name_bengali}} @else {{$category->category_name_en}} @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                {{--                                            get sub category data--}}
                                @php
                                    $subcategories=App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                @endphp
                                @foreach($subcategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">
                                        <a href="{{url('subcategory/product/'.$subcategory->id.'/' .$subcategory->subcategory_slug_en)}}">
                                        <h2 class="title">
                                            @if(session()->get('language')=='bengali') {{$subcategory->subcategory_name_bengali}} @else {{$subcategory->subcategory_name_en}} @endif
                                        </h2>
                                        </a>
                                        {{--                                                get sub sub categories data--}}
                                        @php
                                            $subsubcategories=App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
                                        @endphp
                                        @foreach($subsubcategories as $subsubcat)
                                            <ul class="links list-unstyled">
                                                <li><a href="#">
                                                        @if(session()->get('language')=='bengali') {{$subsubcat->subsubcategory_name_bengali}} @else {{$subsubcat->subsubcategory_name_en}} @endif
                                                    </a></li>

                                            </ul>
                                        @endforeach
                                    </div>
                                @endforeach
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu --> </li>
            @endforeach
            <!-- /.menu-item -->


            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>
                <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->
