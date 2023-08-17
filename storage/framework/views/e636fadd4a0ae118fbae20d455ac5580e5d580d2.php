
<rss xmlns:g="http://base.google.com/ns/1.0" xmlns:c="http://base.google.com/cns/1.0" version="2.0">
<title>
    <![CDATA[ stegpearl Shop ]]>
</title>
<link>
    <![CDATA[ <?php echo e(URL::to('/')); ?> ]]>
</link>
<description>
    <![CDATA[ CTX Feed - stegperal description ]]>
</description>
<product>
    <item>
        <g:id><?php echo e($product->id); ?></g:id>
        <g:title>
        <![CDATA[ <?php echo e($product->product_name); ?> ]]>
        </g:title>
        <g:description>
            <![CDATA[ <?php echo e($product->product_description); ?> ]]>
        </g:description>
        <g:item_group_id>105683</g:item_group_id>
        <link>
            <![CDATA[ <?php echo e(url('/product-detail/' . $product->slug)); ?> ]]>
        </link>
        <g:product_type>
        <![CDATA[ <?php echo e($product->sku); ?> ]]>
        </g:product_type>
        <g:google_product_category>
        <![CDATA[ <?php echo e($product->categories); ?> ]]>
        </g:google_product_category>
        <g:image_link>
        <![CDATA[  <?php echo e(asset('root/public/uploads/'.$product->thumb_image)); ?> ]]>
        </g:image_link>
        <g:condition>new</g:condition>
        <g:availability>in_stock</g:availability>
        <g:price>
        <![CDATA[ <?php echo e($product->price); ?> ]]>
        </g:price>
        <g:sale_price>
        <![CDATA[ <?php echo e($product->sale_price); ?> ]]>
        </g:sale_price>
        <g:mpn>
        <![CDATA[ $product->sku ]]>
        </g:mpn>
        <g:brand>
        <![CDATA[ Campergold ]]>
        </g:brand>
        <g:canonical_link>
        <![CDATA[ <?php echo e($product->product_name); ?>  ]]>
        </g:canonical_link>
        <?php $__currentLoopData = $product['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <g:additional_image_link>
                <![CDATA[ <?php echo e(asset('root/public/uploads/' . $value->images)); ?> ]]>
            </g:additional_image_link>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <g:shipping><?php echo e($product->shipping_class); ?></g:shipping>
        <g:identifier_exists>yes</g:identifier_exists>
        </item>
   
</product>

</rss><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/product/feed.blade.php ENDPATH**/ ?>