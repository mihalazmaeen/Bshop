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
                            <h3 class="box-title">All Admins</h3>
                            <a href="{{route('add.admin')}}" class="btn btn-danger" style="float: right">Add Admin</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Access</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $item)
                                        <tr>
                                            <td><img src="{{asset($item->profile_photo_path)}}"></td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>

                                           <td>


                                               @if($item->brand==1)
                                                   <span class="badge btn-primary">brand</span>
                                               @else
                                               @endif
                                               @if($item->category==1)
                                                   <span class="badge btn-primary">category</span>
                                               @else
                                               @endif
                                               @if($item->product==1)
                                                   <span class="badge btn-primary">product</span>
                                               @else
                                               @endif
                                               @if($item->slider==1)
                                                   <span class="badge btn-primary">slider</span>
                                               @else
                                               @endif
                                               @if($item->coupons==1)
                                                   <span class="badge btn-primary">coupons</span>
                                               @else
                                               @endif
                                               @if($item->blog==1)
                                                   <span class="badge btn-primary">blog</span>
                                               @else
                                               @endif
                                               @if($item->shipping==1)
                                                   <span class="badge btn-primary">shipping</span>
                                               @else
                                               @endif
                                               @if($item->setting==1)
                                                   <span class="badge btn-primary">setting</span>
                                               @else
                                               @endif
                                               @if($item->returnorder==1)
                                                   <span class="badge btn-primary">returnorder</span>
                                               @else
                                               @endif
                                               @if($item->review==1)
                                                   <span class="badge btn-primary">review</span>
                                               @else
                                               @endif
                                               @if($item->orders==1)
                                                   <span class="badge btn-primary">orders</span>
                                               @else
                                               @endif
                                               @if($item->stock==1)
                                                   <span class="badge btn-primary">stock</span>
                                               @else
                                               @endif
                                               @if($item->reports==1)
                                                   <span class="badge btn-primary">reports</span>
                                               @else
                                               @endif
                                               @if($item->alluser==1)
                                                   <span class="badge btn-primary">alluser</span>
                                               @else
                                               @endif
                                               @if($item->adminuserrole==1)
                                                   <span class="badge btn-primary">adminuserrole</span>
                                               @else
                                               @endif


                                           </td>


                                            <td width="30%">
                                                <a href="{{route('edit-admin-role',$item->id)}}" class="btn btn-info" title="Edit Admin"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('delete-admin-role',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Admin"><i class="fa fa-trash"></i></a>
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
