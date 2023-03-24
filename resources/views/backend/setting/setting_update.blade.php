@extends('admin.admin_master')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Site Setting</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('update-site')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$setting->id}}" />
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Company Logo <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file"  name="logo" class="form-control" value="{{$setting->logo}}" required="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Phone One <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="phone_one"  name="phone_one" value="{{$setting->phone_one}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Phone Two <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="phone_two"  name="phone_two" value="{{$setting->phone_two}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Email <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="email" id="email"  name="email" value="{{$setting->email}}"  class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Company Name <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="company_name"  name="company_name" value="{{$setting->company_name}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Company Address <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="company_address"  name="company_address" value="{{$setting->company_address}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Facebook <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="facebook"  name="facebook" value="{{$setting->facebook}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Twitter <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="twitter"  name="twitter" value="{{$setting->twitter}}"  class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Linkedin <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="linkedin"  name="linkedin" value="{{$setting->linkedin}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Youtube <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="youtube"  value="{{$setting->youtube}}"   name="youtube" class="form-control" >
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
