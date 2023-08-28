@props(['productData'])
@foreach ($productData as $product)

@php
 

    $cat = explode(',',$product->categories);
    shuffle($cat);
    $categoryName = categories()->where('id',$cat[0])->pluck('slug')->first();
    $category = $categoryName;


@endphp

<div class="owl-item">
    <div class="ps-section__product">
        <div class="ps-product ps-product--standard m-0">
            @include('components.card-design')
        </div>
    </div>
</div>
@endforeach