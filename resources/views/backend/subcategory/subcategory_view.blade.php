@extends('admin.admin_master')
@section('admin')


    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Sub-Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Category </th>
                                        <th>Sub-Category Name (English)</th>
                                        <th>Sub-Category Name (bengali)</th>

                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subcategories as $item)
                                        <tr>
                                            <td>{{$item['category']['category_name_en']}}</td>
                                            <td>{{$item->subcategory_name_en}}</td>
                                            <td>{{$item->subcategory_name_bengali}}</td>
                                            <td width="25%">
                                                <a href="{{route('subcategory.edit',$item->id)}}" class="btn btn-info" title="Edit SubCategory"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('subcategory.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Category"><i class="fa fa-trash"></i></a>
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

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('subcategory.store')}}"  >
                                    @csrf



                                    <div class="form-group">
                                        <h5>Select Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id"  required="" class="form-control" >
                                                <option value="" selected="" disabled="">Select Your Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Sub Category Name (English) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en" class="form-control" >
                                            @error('subcategory_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Sub Category Name (Bengali) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"   name="subcategory_name_bengali" class="form-control"  >
                                            @error('subcategory_name_bengali')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Sub-Category">
                                    </div>


                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
