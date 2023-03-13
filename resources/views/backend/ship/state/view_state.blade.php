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
                            <h3 class="box-title">All States</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Division Name</th>
                                        <th>District Name</th>
                                        <th>State Name</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($districts as $item)
                                        <tr>
                                            <td>{{$item->division->division_name}}</td>
                                            <td>{{$item->district_name}}</td>


                                            <td width="30%">
                                                <a href="{{route('district.edit',$item->id)}}" class="btn btn-info" title="Edit District"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('district.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete District"><i class="fa fa-trash"></i></a>
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
                            <h3 class="box-title">Add District</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('state.store')}}"  >
                                    @csrf

                                    <div class="form-group">
                                        <h5>Select Division <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id"  required="" class="form-control" >
                                                <option value="" selected="" disabled="">Select Division</option>
                                                @foreach($divisions as $division)
                                                    <option value="{{$division->id}}">{{$division->division_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Select District <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="district_id"  required="" class="form-control" >
                                                <option value="" selected="" disabled="">Select District</option>

                                            </select>
                                            @error('district_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>State Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="state_name" class="form-control" >
                                            @error('state_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add State">
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
            $('select[name="division_id"]').on('change',function(){
                let division_id=$(this).val();
                if(division_id){
                    $.ajax({
                        url:"{{url('/get-district/ajax')}}/"+division_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            let d=$('select[name="district_id"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
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
