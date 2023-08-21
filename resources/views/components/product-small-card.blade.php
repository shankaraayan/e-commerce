@props(['productData'])
@foreach ($productData as $value)

<div class="owl-item">
    <div class="ps-section__product">
        <div class="ps-product ps-product--standard">
            <div class="ps-product__thumbnail">
                <a class="ps-product__image" href="{{route('product.detail',$value->slug)}}">
                    <figure>
                        <img src="{{asset('root/public/uploads/'.$value->thumb_image)}}" alt="alt">
                        <img src="{{asset('root/public/uploads/'.$value->thumb_image)}}" alt="alt">
                    </figure>
                </a>
                <div class="ps-product__badge"></div>
                <div class="ps-product__percent ps-badge ps-badge--hot" style="font-size:14px">
                @php
                if(isset($value->sale_price)){
                    $dicount = (($value->price - $value->sale_price) / $value->price ) * 100 ;
                }
                @endphp
                -{{round($dicount)}}%
                </div>
            </div>
            <div class="ps-product__content">
                <p class="ps-product__title"><a href="{{route('product.detail',$value->slug)}}">{{$value->product_name}}</a></p>
                <div class="ps-product__meta text-center">
                    <span class="ps-product__del text-muted">{{formatPrice($value->price)}}</span>
                    <span class="ps-product__price sale">{{formatPrice($value->sale_price)}}</span>
                </div>
                    @if($value->type !='variable')
                        <div class="add_to_cart_box">
                            <a class="btn cart_btn d-block" href="javascript:void(0)" onclick="add_to_cart('{{ $value->id }}')">Add to cart</a>
                        </div>
                    @else
                        <div class="add_to_cart_box">
                            <a class="btn cart_btn d-block" href="{{route('product.detail',$value->slug)}}">View</a>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endforeach