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
                            <h3 class="box-title">All Users</h3>
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
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td><img class="card-img-top" style="border-radius:50% " src="{{(!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path): url('upload/no_image.jpg')}}" height="50px" width="50px"></td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>
                                                @if($user->UserOnline())
                                                <span class="badge badge-pill badge-success">Active Now</span>
                                                @else
                                                <span class="badge badge-pill badge-danger">
                                                    {{Carbon\Carbon::parse($user->last_seen)->diffforHumans()}}
                                                </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('brand.edit',$user->id)}}" class="btn btn-info" title="Edit Brand"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('brand.delete',$user->id)}}" id="delete" class="btn btn-danger" title="Delete Brand"><i class="fa fa-trash"></i></a>
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

                {{--                    ----------------Add brand------------}}


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
