@extends('admin.admin_master')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Create Admin</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('store.admin')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Username <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required="" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Admin Email <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control" required="" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>






                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Phone <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone" class="form-control" required="" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Admin Password <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="password" name="password" class="form-control" required="" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>






                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Profile Photo <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input id="image" type="file" name="profile_photo_path" class="form-control" required=""> <div class="help-block"></div></div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <img id="showimage" src="{{url('upload/no_image.jpg')}}" style="width: 100px;height: 100px;" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" name="adminuserrole" id="checkbox_17" value="1">
                                                            <label for="checkbox_17">adminuserrole</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="brand" id="checkbox_3" value="1">
                                                            <label for="checkbox_3">brand</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="category" id="checkbox_4" value="1">
                                                            <label for="checkbox_4">category</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="product" id="checkbox_5" value="1">
                                                            <label for="checkbox_5">product</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="slider" id="checkbox_6" value="1">
                                                            <label for="checkbox_6">slider</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                        <input type="checkbox" name="coupons" id="checkbox_7" value="1">
                                                        <label for="checkbox_7">coupons</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="blog" id="checkbox_8" value="1">
                                                            <label for="checkbox_8">blog</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="shipping" id="checkbox_9" value="1">
                                                            <label for="checkbox_9">shipping</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="setting" id="checkbox_10" value="1">
                                                            <label for="checkbox_10">setting</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="returnorder" id="checkbox_11" value="1">
                                                            <label for="checkbox_11">returnorder</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" name="review" id="checkbox_12" value="1">
                                                            <label for="checkbox_12">review</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="orders" id="checkbox_13" value="1">
                                                            <label for="checkbox_13">orders</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="stock" id="checkbox_14" value="1">
                                                            <label for="checkbox_14">stock</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="reports" id="checkbox_15" value="1">
                                                            <label for="checkbox_15">reports</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="alluser" id="checkbox_16" value="1">
                                                            <label for="checkbox_16">alluser</label>
                                                        </fieldset>


                                                    </div>
                                                </div>
                                            </div>
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                let reader=new FileReader();
                reader.onload=function(e){
                    $('#showimage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })





    </script>
@endsection
