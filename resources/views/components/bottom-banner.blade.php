@props(['value'])
@php
    $banner = globalBanner()->toArray();
    shuffle($banner);
    $banner = end($banner);
@endphp
<div class="ps-categogy__main pt-0">
    @if(isset($banner))
    <a href="{{$banner['slider_url']}}">
        <img src="{{ asset('root/public/uploads/sliders/desktop/' . $banner['desktop']) }}" alt="Epp Solar" class="img-fluid w-100 rounded">
    </a>
    @else
        <img src="https://campergold.net/wp-content/uploads/2023/05/campergold-2.jpg" alt="Epp Solar" class="img-fluid w-100 rounded">
    @endif
</div>