@props(['value'])
@php
    $banner = globalBanner()->toArray();
    shuffle($banner);
    $banner = end($banner);
@endphp
<div class="ps-categogy__main pt-0">
    @if(isset($banner))
        <img src="https://custom.stegpearl.in/root/public/uploads/sliders/desktop/{{$banner['desktop']}}" class="img-fluid w-100 rounded">
    @else
        <img src="https://campergold.net/wp-content/uploads/2023/05/campergold-2.jpg" class="img-fluid w-100 rounded">
    @endif
</div>