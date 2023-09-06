
@props(['prdoductCategories']) 

@php
    $categoryArray = explode(',',$prdoductCategories);
    $category = []; // Initialize the category array

    foreach ($categoryArray as $categoryId) {
        $categoryInstance = categories()->where('id', $categoryId)->first();

        if ($categoryInstance) {
            // Only access properties if the category instance exists
            $category[$categoryInstance->slug] = $categoryInstance->name;
        }
    }
@endphp

@foreach($category as $key=>$category)
<a href="{{ route('shop', [$key]) }}">
    {{$category}},
</a>
@endforeach
