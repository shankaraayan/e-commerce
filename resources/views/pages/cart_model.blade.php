<div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="cartright_canvas">SHOPPING VENTURE</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body p-0">
    <div class="cart_body">
        <!----- While no product added in your cart ----->
        <div class="empty_cart mb-3 p-3">
            <div class="text-center mb-3">
                <i class="bi bi-cart-x" style="font-size: 6rem; color: #6f6f6f1f;"></i>
            </div>
            <div class="text-center">
                @if(count(session('cart')) < 1 )
                <h6 class="fs-6 text-center">THERE ARE NO PRODUCTS IN YOUR SHOPPING CART.</h6>
                @endif
                <a href="{{ url('/  ') }}" class="btn btn_primary mt-3">Back To Shop</a>
            </div>
        </div>
        <!----- While no product added in your cart ----->

        <!----- While product added in your cart ----->
        <div class="cart_products position-relative">   
            <ul class="cart_products_bulk list-inline">
                @php $total = 0 @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                
                  @php $decoded_data = json_decode($details['details']); @endphp
                <li class="cart_products_details d-flex align-items-start" id="">
                    <a href="{{asset('root/public/uploads/'.$details['images'])}}" class="cart_product_item">
                        <div class="cart_product_pic">
                            <img src="{{asset('root/public/uploads/'.$details['images'])}}" class="img-fluid" alt="">
                        </div>
                    </a>
                    <a href="{{ url('cart') }}" class="cart_product_item-detail">


                        <div class="cart_product_info me-1">
                            <div class="cart_product_name">{{ $decoded_data['names'] }}
                                <strong class="d-block cart_shipping_date mt-1">Estimated shipping
                                    date May 18, 2023</strong>
                            </div>
                            <div class="cart_product_price">
                                <span class="text-muted">{{ $details['quantity'] }}</span>
                                <span class="ci_green">$ {{ $decoded_data['total_price'] }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="cart_product_remove">
                        <button type="button" class="btn-close remove" onclick="remove_product(<?= $id ?>)" aria-label="Close"></button>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        <!----- While product added in your cart ----->

    </div>
</div>
<div class="offcanvas_footer p-3 border-top">
    <div class="cart_total_div d-flex align-items-center justify-content-between">
        <div class="">SUBTOTAL: </div>
        <div class="cart_totalamount">${{ $total }}</div>
    </div>
    <div class="proccedto_checkout mb-3 mt-4 text-center">
        <div class="cartPage_btn mb-3">
            <button type="button" class="btn btn_primary w-100"><a href="{{ 'cart' }}">View Shopping Cart</a></button>
        </div>
        <div class="checkoutPage_btn">
            <button type="button" class="btn btn_outline_primary w-100">Cash</button>
        </div>
    </div>
</div>

<script>
    function remove_product(id) {
        $('#cartcanvas_popup').html(" ");
        $.ajax({
            method: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            url: 'remove_from_cart',
            dataType: 'html',
            success: function(text) {
                $('#cartcanvas_popup').html(text);
            }
        })
    }
</script>