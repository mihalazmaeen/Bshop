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
                                <h3 class="box-title">All Brands</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Brand Name (English)</th>
                                            <th>Brand Name (bengali)</th>
                                            <th>Brand Image</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($brands as $item)
                                        <tr>
                                            <td>{{$item->brand_name_en}}</td>
                                            <td>{{$item->brand_name_bengali}}</td>
                                            <td><img src="{{asset($item->brand_image)}}" style="width: 70px; height: 40px;"></td>
                                            <td><a href="" class="btn btn-info">Edit</td>
                                            <td><a href="" class="btn btn-danger">Delete</td>

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
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>

@endsection
