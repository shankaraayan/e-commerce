{{-- @dd($product); --}}
<rss xmlns:g="http://base.google.com/ns/1.0" xmlns:c="http://base.google.com/cns/1.0" version="2.0">
<title>
    <![CDATA[ stegpearl Shop ]]>
</title>
<link>
    <![CDATA[ {{ URL::to('/') }} ]]>
</link>
<description>
    <![CDATA[ CTX Feed - stegperal description ]]>
</description>
<product>
    <item>
        <g:id>{{ $product->id }}</g:id>
        <g:title>
        <![CDATA[ {{ $product->product_name }} ]]>
        </g:title>
        <g:description>
            <![CDATA[ {{ $product->product_description }} ]]>
        </g:description>
        <g:item_group_id>105683</g:item_group_id>
        <link>
            <![CDATA[ {{ url('/product-detail/' . $product->slug) }} ]]>
        </link>
        <g:product_type>
        <![CDATA[ {{ $product->sku}} ]]>
        </g:product_type>
        <g:google_product_category>
        <![CDATA[ {{ $product->categories }} ]]>
        </g:google_product_category>
        <g:image_link>
        <![CDATA[  {{asset('root/public/uploads/'.$product->thumb_image)}} ]]>
        </g:image_link>
        <g:condition>new</g:condition>
        <g:availability>in_stock</g:availability>
        <g:price>
        <![CDATA[ {{$product->price}} ]]>
        </g:price>
        <g:sale_price>
        <![CDATA[ {{$product->sale_price}} ]]>
        </g:sale_price>
        <g:mpn>
        <![CDATA[ $product->sku ]]>
        </g:mpn>
        <g:brand>
        <![CDATA[ Campergold ]]>
        </g:brand>
        <g:canonical_link>
        <![CDATA[ {{$product->product_name}}  ]]>
        </g:canonical_link>
        @foreach($product['images'] as $value)
            <g:additional_image_link>
                <![CDATA[ {{ asset('root/public/uploads/' . $value->images) }} ]]>
            </g:additional_image_link>
        @endforeach
        
        <g:shipping>{{$product->shipping_class}}</g:shipping>
        <g:identifier_exists>yes</g:identifier_exists>
        </item>
   
</product>

</rss>