@extends('admin.admin_master')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Product</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('store-product')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

{{--                                        start 1st row--}}
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Select Brand <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id"  required="" class="form-control" >
                                                            <option value="" selected="" disabled="">Select Your Brand</option>
                                                            @foreach($brands as $brand)
                                                                <option value="{{$brand->id}}" >{{$brand->brand_name_en}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{--end col-md-4--}}

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5>Select Category <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="category_id"  required="" class="form-control" >
                                                                <option value="" selected="" disabled="">Select Your Category</option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}" >{{$category->category_name_en}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                            </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5>Select Sub-Category <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subcategory_id"  required="" class="form-control" >
                                                                <option value="" selected="" disabled="">Select Your Sub-Category</option>

                                                            </select>
                                                            @error('subcategory_id')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Select Sub->Sub-Category <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id"  required="" class="form-control" >
                                                            <option value="" selected="" disabled="">Select Your Sub->Sub-Category</option>

                                                        </select>
                                                        @error('subsubcategory_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
{{--                                        end 1st row--}}
{{--                                        start 2nd row--}}
                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Product name (En) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_en" class="form-control" required="" >
                                                        @error('product_name_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Product name (Bengali) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_bengali" class="form-control" required=""  >
                                                        @error('product_name_bengali')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control" required="" >
                                                        @error('product_code')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_quantity" class="form-control" required="" >
                                                        @error('product_quantity')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
{{--                                        end 2nd row--}}

{{--                                        start 3rd row--}}
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Product Tangs En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add  product tags" required=""  >
                                                        @error('product_tags_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Product Tangs Bengali <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_bengali" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add  product tags" required=""  >
                                                        @error('product_tags_bengali')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Product Size En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_en" class="form-control" value="small,medium,large" data-role="tagsinput" placeholder="add  product size" required="" >
                                                        @error('product_size_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Product Size Bengali <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_bengali" class="form-control" value="বড়,ছোট,মাঝারি" data-role="tagsinput" placeholder="add product size" required=""  >
                                                        @error('product_size_bengali')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

{{--                                        end 3rd row--}}
{{--                                        start 4th row--}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product color English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_en" class="form-control" value="" data-role="tagsinput" placeholder="add product color" required=""  >
                                                        @error('product_color_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product color Bengali <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_bengali" class="form-control" value="" data-role="tagsinput" placeholder="add product color" required=""  >
                                                        @error('product_color_bengali')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                        end 4th row--}}

{{--                                        start 5th row--}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control" required="" >
                                                        @error('selling_price')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control"  >
                                                        @error('discount_price')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                        end 5th row--}}

{{--                                        start 6th row--}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Main Thumbnail <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thumbnail" class="form-control" onChange="mainThumbnailUrl(this)" required=""  >
                                                        @error('product_thumbnail')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <img src="" id="mainThumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product More Images <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" class="form-control" id="multiImg" multiple="" required=""  >
                                                        @error('multi_img[]')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="row" id="preview_img"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                        end 6th row--}}

{{--                                        start 7th row--}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_description_en" id="textarea" class="form-control" required placeholder="Textarea text" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description Bengali <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_description_bengali" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                        end 7th row--}}
{{--                                        start 8th row--}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1"  rows="10" cols="80" name="long_description_en" class="form-control" required placeholder="Textarea text"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description Bengali <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2"  rows="10" cols="80"  name="long_description_bengali"  class="form-control" required placeholder="Textarea text"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                        end 8th row--}}






                                    </div>


                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" name="hot_deals" id="checkbox_2" value="1">
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" name="featured" id="checkbox_3" value="1">
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" name="special_offer" id="checkbox_4"  value="1">
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" name="special_deals" id="checkbox_5" value="1">
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
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
        <!-- /.content -->
    </div>
    <script type="text/javascript">
{{--load Sub category--}}
        $(document).ready(function(){
            $('select[name="category_id"]').on('change',function(){
                let category_id=$(this).val();
                if(category_id){
                    $.ajax({
                        url:"{{url('/category/subcategory/ajax')}}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            console.log(data);
                         $('select[name="subsubcategory_id"]').empty();
                            let d=$('select[name="subcategory_id"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
                            })
                        }
                    })
                }else{
                    alert('danger')
                }
            });
            //Load Sub-Sub category
            $('select[name="subcategory_id"]').on('change',function(){
                let subcategory_id=$(this).val();
                if(subcategory_id){
                    $.ajax({
                        url:"{{url('/category/get-sub-subcategory/ajax')}}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
console.log(data);
                            let d=$('select[name="subsubcategory_id"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+value.id+'">'+value.subsubcategory_name_en+'</option>');
                            })
                        }
                    })
                }else{
                    alert('danger')
                }
            })
        })
    </script>

{{--    Show single image--}}
    <script type="text/javascript">
        function mainThumbnailUrl(input){
            if(input.files && input.files[0]){
                let reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThumbnail').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }







    </script>

{{--    Load Multiple Image--}}
    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>


@endsection
