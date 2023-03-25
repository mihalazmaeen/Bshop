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
                            <h3 class="box-title">Return Requests</h3>
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


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($returns as $item)
                                        <tr>
                                            <td>{{$item->order_date}}</td>
                                            <td>{{$item->invoice_no}}</td>
                                            <td>{{$item->amount}}</td>
                                            <td>{{$item->payment_method}}</td>
                                            <td><span class="badge badge-pill badge-primary">Return Approved</span></td>




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
