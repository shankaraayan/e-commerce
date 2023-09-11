
<rss xmlns:g="http://base.google.com/ns/1.0" xmlns:c="http://base.google.com/cns/1.0" version="2.0">
    <title>
        <![CDATA[ EPP Solar Shop ]]>
    </title>
    <link>
        <![CDATA[ <?php echo e(URL::to('/')); ?> ]]>
    </link>
    <description>
        <![CDATA[ CTX Feed - EPP Solar description ]]>
    </description>
    <g:product_type>
        <![CDATA[ <?php echo e($product->type); ?> ]]>
    </g:product_type>
    <g:id><?php echo e($product->id); ?></g:id>
    <g:title>
        <![CDATA[ <?php echo e($product->product_name); ?> ]]>
    </g:title>
    <g:link>
        <![CDATA[ <?php echo e(url('/product-detail/' .$product->categories[0]->slug.'/'. $product->slug)); ?> ]]>
    </g:link>
    <product>
        <g:price>
            <![CDATA[ <?php echo e(formatPrice($product->price)); ?> ]]>
        </g:price>
        <g:sale_price>
            <![CDATA[ <?php echo e(formatPrice($product->sale_price)); ?> ]]>
        </g:sale_price>
        <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <g:google_product_category>
                <![CDATA[ <?php echo e($category->slug); ?> ]]>
            </g:google_product_category>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <g:image_link>
            <![CDATA[ <?php echo e(asset('root/public/uploads/'.$product->thumb_image)); ?> ]]>
        </g:image_link>
        <g:condition>new</g:condition>
        <g:availability>in_stock</g:availability>
        <g:mpn>
            <![CDATA[ <?php echo e($product->sku); ?> ]]>
        </g:mpn>
        <g:description>
            <![CDATA[ <?php echo htmlspecialchars(strip_tags($product->product_description)); ?> ]]>
        </g:description>

        <?php $__currentLoopData = $product->groupSkus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <item>
                <g:id><?php echo e($combination->id); ?></g:id>
                <g:item_group_id><?php echo e($product->id); ?></g:item_group_id>
                <g:title>
                    <![CDATA[ <?php echo e($product->product_name); ?> ]]>
                </g:title>
                <g:mpn>
                    <![CDATA[ <?php echo e($combination->sku); ?> ]]>
                </g:mpn>
                <g:description>
                    <![CDATA[ <?php echo e(strip_tags($product->product_description)); ?> ]]>
                </g:description>
                
                <g:brand>
                    <![CDATA[ EPPSolar ]]>
                </g:brand>
                <g:canonical_link>
                    <![CDATA[ <?php echo e($combination->url); ?>  ]]>
                </g:canonical_link>
                
                <g:shipping><?php echo e($product->shipping_class); ?></g:shipping>
                <g:identifier_exists>yes</g:identifier_exists>
    
                <?php $__currentLoopData = $product['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <g:additional_image_link>
                        <![CDATA[ <?php echo e(asset('root/public/uploads/' . $value->images)); ?> ]]>
                    </g:additional_image_link>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
            </item>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $product['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <g:additional_image_link>
                <![CDATA[ <?php echo e(asset('root/public/uploads/' . $value->images)); ?> ]]>
            </g:additional_image_link>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </product>
</rss>
<?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/product/feed.blade.php ENDPATH**/ ?>