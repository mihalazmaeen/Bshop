<ul>
    @foreach($products as $product)
        <li><img src="{{asset($product->product_thumbnail)}}" style="width: 30px;height: 30px">{{$product->product_name_en}}</li>
    @endforeach
</ul>
