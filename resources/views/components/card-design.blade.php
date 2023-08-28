<div class="ps-product__thumbnail mb-1"><a class="ps-product__image" onclick="addSimiliarProductId({{$product->id}})" href="{{route('product.detail',[$category,$product->slug] )}}">
        <figure class="card-image-container">
            <img src="{{asset('root/public/uploads/'.$product->thumb_image)}}" alt="alt" class="img-fluid" />
            <img src="{{asset('root/public/uploads/'.$product->thumb_image)}}" class="img-fluid" alt="alt" />
        </figure>
    </a>
    <div class="ps-product__badge">
        <div class="ps-badge ps-badge--hot">
            @php
            if($product->type == 'single'){
                if(isset($product->sale_price)){
                    if($product->sale_price < $product->price){
                        $dicount = (($product->price - $product->sale_price) / $product->price ) * 100 ;
                        $dicount = round($dicount)."%";
                    }else{
                        $dicount = '';
                    }
                }
            }else {
                $dicount = 'Best Seller';
            }
            @endphp
            {{($dicount)}}
        </div>
    </div>
</div>
<div class="ps-product__content text-center mt-2">
    
    <a onclick="addSimiliarProductId({{$product->id}})"  href="{{route('product.detail',[$category,$product->slug])}}">
        <h5 class="ps-product__title mb-1">{{$product->product_name}}</h5>
    </a>
    
    <div class="ps-product__meta mb-1 text-center">
        @php
            $attributeIDs = ($product->attributes_id);
            $result = explode(',', $attributeIDs);
            $prices = minmaxPrice($result);
        @endphp
        @if ($product->type==='variable')
            <span class="ps-product__price text-green">bis zu - {{formatPrice($prices['sum_of_max_prices']) }}</span>
        @else
            <span class="ps-product__del text-muted">{{ formatPrice($product->price) }}</span>
            <span class="ps-product__price text-green">{{ formatPrice($product->sale_price) }}</span>
        @endif
    </div>

    <div class="ps-product__actions ps-product__group-mobile d-block">
        <div class="ps-product__cart d-block">
            @if($product->type !='variable')
            <div class="add_to_cart_box"><a class="btn cart_btn d-block" href="javascript:void(0)" onclick="add_to_cart('{{ $product->id }}')">In den Warenkorb</a>
            </div>
        @else
        <div class="add_to_cart_box">
                <a onclick="addSimiliarProductId({{$product->id}})" class="btn cart_btn d-block" href="{{route('product.detail',[$category,$product->slug] )}}">Variationen auswählen</a>
            </div>
        @endif
        </div>
    </div>
</div>