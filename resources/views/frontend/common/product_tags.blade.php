@php
$tags_en=App\models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
$tags_bengali=App\models\Product::groupBy('product_tags_bengali')->select('product_tags_bengali')->get();
@endphp


<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if (session()->get('language')=='bengali')
                @foreach($tags_bengali as $tag_bengali)
            <a class="item" title="Phone" href="category.html">
                {{str_replace(',',' ',$tag_bengali->product_tags_bengali)}}
            </a>
                @endforeach
            @else
                @foreach($tags_en as $tag_en)
                    <a class="item" title="Phone" href="category.html">
                        {{str_replace(',',' ',$tag_en->product_tags_en)}}
                    </a>
                @endforeach
            @endif
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
