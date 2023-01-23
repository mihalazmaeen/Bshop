<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}} ">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}} ">



    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include ('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->

<!-- /#top-banner-and-menu -->
@yield ('content')
<!-- ============================================================= FOOTER

============================================================= -->
@include ('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}} "></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}} "></script>
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}} "></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}} "></script>
<script src="{{asset('frontend/assets/js/echo.min.js')}} "></script>
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}} "></script>
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}} "></script>
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}} "></script>
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}} "></script>
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}} "></script>
<script src="{{asset('frontend/assets/js/wow.min.js')}} "></script>
<script src="{{asset('frontend/assets/js/scripts.js')}} "></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
<!-- Add to Cart Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span id="product_name"></span></h5>
                <button type="button" class="close" data-dismiss="modal" id="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="..." id="product_image" style="width: 200px; height: 200px">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">Product Price:<strong class="text-danger">BDT <span id="pprice"></span></strong>
                            <del id="oldprice"></del></li>
                            <li class="list-group-item">Product Code:<strong id="product_code"></strong></li>
                            <li class="list-group-item">Category:<strong id="product_category"></strong></li>
                            <li class="list-group-item">Brand:<strong id="product_brand"></strong></li>
                            <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="available" style="background: green; color: white;"></span>
                                <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
{{--                        Color Selection--}}
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Choose Color</label>
                            <select class="form-control" id="color" name="color">


                            </select>
                        </div>
{{--                        end color selection--}}

{{--                        Size selection--}}
                        <div class="form-group" id="sizeArea">
                            <label for="exampleFormControlSelect1">Choose Size</label>
                            <select class="form-control" id="size" name="size">
                                <option>1</option>

                            </select>
                        </div>
{{--                        end size selection--}}
{{--                        quantity select--}}
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Enter Quantity</label>
                            <input type="number" class="form-control" id="qty" min="1">
                        </div>
{{--                        end quantity select--}}
                        <input type="hidden" class="form-control" id="product_id">
                        <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to Cart</button>
                    </div>


                </div>




            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
})
function productView(id){
    $.ajax({
        type:'get',
        url:'/product/view/modal/'+id,
        dataType: 'json',
        success:function (data){
            $('#product_name').text(data.product.product_name_en);
            $('#price').text(data.product.selling_price);
            $('#product_code').text(data.product.product_code);
            $('#product_category').text(data.product.category.category_name_en);
            $('#product_brand').text(data.product.brand.brand_name_en);
            $('#product_image').attr('src','/'+data.product.product_thumbnail);

            $('#product_id').val(id);
            $('#qty').val(1);

        //    price
            if(data.product.discount_price == null) {
                $('#pprice').text('');
                $('#oldprice').text('');
                $('#pprice').text(data.product.selling_price);
            }else{
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price);
            }
        //    stock available option
            if(data.product.product_quantity > 0){
                $('#stockout').text('');
                $('#available').text('');
                $('#available').text('available')
            }else{
                $('#stockout').text('');
                $('#available').text('');
                $('#stockout').text('Out of Stock')
            }
        //    color
            $('select[name="color"]').empty();
            $.each(data.color,function (key,value){
                $('select[name="color"]').append(' <option value=" '+value+' " >'+value+'</option> ')
            })
        //    Size
            $('select[name="size"]').empty();
            $.each(data.size,function (key,value){
                $('select[name="size"]').append(' <option value=" '+value+' " >'+value+'</option> ')
                if(data.size == ""){
                    $('#sizeArea').hide();
                }else{
                    $('#sizeArea').show();
                }
            })
        }
    })
}
//End showing cart data


//Add to cart functionality
function addToCart(){
    let product_name=$('#product_name').text();
    let id=$('#product_id').val();
    let color=$('#color option:selected').text();
    let size=$('#size option:selected').text();
    let quantity=$('#qty').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        data: {
            color: color,size: size,quantity: quantity,product_name:product_name,
        },
        url:"/cart/data/store/"+id,
        success: function(data) {
            miniCart()
            $('#closeModal').click();

        //    Start Alert Message
        const Toast=Swal.mixin({
            toast:true,
            position:'top-end',
            icon:'success',
            showConfirmButton:false,
            timer:3000
        })
            if($.isEmptyObject(data.error)){
                Toast.fire({
                    type:'success',
                    title:data.success
                })
            }else{
                Toast.fire({
                    type:'error',
                    title:data.error
                })
            }




        //    end alert message
        }
    })


}
//end add to cart functionality
</script>
{{--End Add to card Modal--}}

<script type="text/javascript">
   function miniCart(){
       $.ajax({
           type: "GET",
           url:'/product/mini/cart',
           dataType: "json",
           success: function(response){

               $('span[id="cartSubTotal"]').text(response.cartTotal);
               $('#cartQty').text(response.cartQty);


               let miniCart="";
              $.each(response.carts,function(key,value){



                  miniCart += ` <div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                            <div class="price">${value.price}*${value.qty}</div>
                                        </div>
                                        <div class="col-xs-1 action">
                                        <button type="submit" id="${value.rowId}" onClick="miniCartremove(this.id)"><i class="fa fa-trash"></i></button></div>
                                    </div>
                                </div>

                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>`
              });
              $('#miniCart').html(miniCart);



           }
       })

   }


   miniCart();
function miniCartremove(rowId){
    $.ajax({
        type:'GET',
        url: '/minicart/product-remove/'+rowId,
        dataType:'json',
        success: function(data){
            miniCart();
            //    Start Alert Message
            const Toast=Swal.mixin({
                toast:true,
                position:'top-end',
                icon:'success',
                showConfirmButton:false,
                timer:3000
            })
            if($.isEmptyObject(data.error)){
                Toast.fire({
                    type:'success',
                    title:data.success
                })
            }else{
                Toast.fire({
                    type:'error',
                    title:data.error
                })
            }




            //    end alert message
        }
    })
}
</script>
{{--Add to wishlist function--}}
<script type="text/javascript">

    function addToWishlist(product_id) {
$.ajax({
    type: "POST",
    dataType: "JSON",
    url:"/add-to-wishlist/"+product_id,
    success: function(data) {
        //    Start Alert Message
        const Toast=Swal.mixin({
            toast:true,
            position:'top-end',

            showConfirmButton:false,
            timer:3000
        })
        if($.isEmptyObject(data.error)){
            Toast.fire({
                icon:'success',
                type:'success',
                title:data.success
            })
        }else{
            Toast.fire({
                icon:'error',
                type:'error',
                title:data.error
            })
        }




        //    end alert message
    }
})

    }
</script>




{{--End add to wishlist function--}}
</body>
</html>
