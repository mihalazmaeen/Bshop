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
                            <h3 class="box-title">Pending Orders</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Invoice</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pending as $item)
                                        <tr>
                                            <td>{{$item->order_date}}</td>
                                            <td>{{$item->invoice_no}}</td>
                                            <td>{{$item->amount}}</td>
                                            <td>{{$item->payment_method}}</td>
                                            <td><span class="badge badge-pill badge-primary">{{$item->status}}</span></td>


                                            <td width="30%">
                                                <a href="{{route('pending-order-details',$item->id)}}" class="btn btn-info" title="Edit Category"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('coupon.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Category"><i class="fa fa-trash"></i></a>
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

                {{--                    ----------------Add Coupon------------}}


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
