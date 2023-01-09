@extends('admin.admin_master')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Sub->Sub-Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Category </th>
                                        <th>Sub-Category Name (English)</th>
                                        <th>Sub->Sub-Category Name (English)</th>

                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subsubcategories as $item)
                                        <tr>
                                            <td>{{$item['category']['category_name_en']}}</td>
                                            <td>{{$item['subcategory']['subcategory_name_en']}}</td>
                                            <td>{{$item->subsubcategory_name_en}}</td>

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
                            <h3 class="box-title">Add Sub->Sub Category</h3>
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
                                        <h5>Select Sub Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id"  required="" class="form-control" >
                                                <option value="" selected="" disabled="">Select Your Category</option>

                                            </select>
                                            @error('subcategory_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Sub->Sub Category Name (English) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_en" class="form-control" >
                                            @error('subsubcategory_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Sub->Sub Category Name (Bengali) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"   name="subsubcategory_name_bengali" class="form-control"  >
                                            @error('subsubcategory_name_bengali')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Sub->Sub-Category">
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

    <script type="text/javascript">

        $(document).ready(function(){
            $('select[name="category_id"]').on('change',function(){
                let category_id=$(this).val();
                if(category_id){
                    $.ajax({
                        url:"{{url('/category/subcategory/ajax')}}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            let d=$('select[name="subcategory_id"]').empty();
                                $.each(data,function(key,value){
                                 $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
                            })
                        }
                    })
                }else{
                    alert('danger')
                }
            })
        })




















    </script>

@endsection
