@extends('admin.admin_master')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Password for Admin</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('update.admin.password')}}" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="current_password" name="oldpassword" class="form-control" required="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>New Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="password"  name="password" class="form-control" required="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Confirm password<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">



                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>

    </div>


@endsection
