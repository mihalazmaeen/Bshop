@extends('admin.admin_master')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Seo Setting</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('update-seo')}}" >
                                @csrf
                                <input type="hidden" name="id" value="{{$setting->id}}" />
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Meta Title <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_title" value="{{$setting->meta_title}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Meta Author <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_author" value="{{$setting->meta_author}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Meta Keyword <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_keyword" value="{{$setting->meta_keyword}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Meta Description <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_description" value="{{$setting->meta_description}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Google Analytics <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="google_analytics" value="{{$setting->google_analytics}}" class="form-control" >
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
