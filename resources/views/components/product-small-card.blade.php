@props(['productData'])
@foreach ($productData as $product)

@php
 
$currentUrl = url()->current();
$path = parse_url($currentUrl, PHP_URL_PATH);
$pathSegments = explode('/', trim($path, '/'));
$category = end($pathSegments);
if($category == null || $category == ''){
    $cat = explode(',',$product->categories);
    shuffle($cat);
    $categoryName = categories()->where('id',$cat[0])->pluck('slug')->first();
    $category = $categoryName;
}

@endphp

<div class="owl-item">
    <div class="ps-section__product m-4">
        <div class="ps-product ps-product--standard">
            @include('components.card-design')
        </div>
    </div>
</div>
@endforeach