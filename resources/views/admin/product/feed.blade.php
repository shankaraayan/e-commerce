{{-- @dd($product); --}}
<rss xmlns:g="http://base.google.com/ns/1.0" xmlns:c="http://base.google.com/cns/1.0" version="2.0">
<title>
    <![CDATA[ EPP Solar Shop ]]>
</title>
<link>
    <![CDATA[ {{ URL::to('/') }} ]]>
</link>
<description>
    <![CDATA[ CTX Feed - EPP Solar description ]]>
</description>
<g:product_type>
    <![CDATA[ {{ $product->type}} ]]>
    </g:product_type>
<g:id>{{ $product->id }}</g:id>
<g:title>
    <![CDATA[ {{ $product->product_name }} ]]>
</g:title>
<g:link>
    <![CDATA[ {{ url('/product-detail/' .$product->categories[0]->slug.'/'. $product->slug) }} ]]>
</g:link>
<product>

    <g:price>
        <![CDATA[ {{formatPrice($product->price)}} ]]>
        </g:price>
        <g:sale_price>
        <![CDATA[ {{formatPrice($product->sale_price)}} ]]>
        </g:sale_price>
    @foreach ($product->categories as $category)
    <g:google_product_category>
    <![CDATA[ {{ $category->slug }} ]]>
    </g:google_product_category>
    @endforeach
    <g:image_link>
    <![CDATA[  {{asset('root/public/uploads/'.$product->thumb_image)}} ]]>
    </g:image_link>
    <g:condition>new</g:condition>
    <g:availability>in_stock</g:availability>
    <g:mpn>
        <![CDATA[ {{$product->sku}} ]]>
    </g:mpn>
    <g:description>
        <![CDATA[ {{ $product->product_description }} ]]>
    </g:description>

    @foreach ($product->groupSkus as $combination)
    <item>
        <g:id>{{ $combination->id }}</g:id>
        <g:item_group_id>{{ $product->id }}</g:item_group_id>
        <g:title>
        <![CDATA[ {{ $product->product_name }} ]]>
        </g:title>
        <g:mpn>
        <![CDATA[ {{$combination->sku}} ]]>
        </g:mpn>
        <g:description>
            <![CDATA[ {{ $product->product_description }} ]]>
        </g:description>
       
        
        <g:brand>
        <![CDATA[ EPPSolar ]]>
        </g:brand>
        <g:canonical_link>
        <![CDATA[ {{ $combination->url }}  ]]>
        </g:canonical_link>
        
        
        <g:shipping>{{$product->shipping_class}}</g:shipping>
        <g:identifier_exists>yes</g:identifier_exists>

        @foreach($product['images'] as $value)
            <g:additional_image_link>
                <![CDATA[ {{ asset('root/public/uploads/' . $value->images) }} ]]>
            </g:additional_image_link>
        @endforeach

        </item>
        @endforeach
        @foreach($product['images'] as $value)
            <g:additional_image_link>
                <![CDATA[ {{ asset('root/public/uploads/' . $value->images) }} ]]>
            </g:additional_image_link>
        @endforeach
</product>

</rss>