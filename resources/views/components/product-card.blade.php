@props(['productData'])
@php
$category = request()->segment(count(request()->segments()));

@endphp

@foreach($productData as $product)
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="ps-product ps-product--standard ">
            @include('components.card-design')
        </div>
    </div>
@endforeach