@extends('admin.admin_master')
@section('admin')


    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Products</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product Thumbnail</th>
                                        <th>Product Name (English)</th>
                                        <th>Product Name (bengali)</th>
                                        <th>Quantity</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $item)
                                        <tr>
                                            <td><img src="{{asset($item->product_thumbnail)}}" style="width: 60px; height: 50px"></td>
                                            <td>{{$item->product_name_en}}</td>
                                            <td>{{$item->product_name_bengali}}</td>
                                            <td>{{$item->product_quantity}}</td>
                                            <td>
                                                <a href="{{route('edit-product',$item->id)}}" class="btn btn-info" title="Edit Product"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('category.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Product"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->

                {{--                    ----------------Add Category------------}}


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
