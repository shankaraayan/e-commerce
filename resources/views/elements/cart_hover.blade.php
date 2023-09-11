<ul class="ps-cart__items">
    @php $total = 0 @endphp
    @if (session('cart'))
        @foreach (session('cart') as $id => $details)
            @php $total+=($details['price']*$details['quantity']); @endphp
            @if ($details['type'] == 'variable')
                <li class="ps-cart__item">
                    <div class="ps-product--mini-cart"><a class="ps-product__thumbnail"
                            href="{{ route('product.detail', $details['slug']) }}"><img
                                src="{{ asset('root/public/uploads/' . $details['images']) }}" alt="Epp Solar" /></a>
                        <div class="ps-product__content"><a class="ps-product__name"
                                href="{{ route('product.detail', $details['slug']) }}">
                                <span>{{ @$details['name'] }}</span><br>
                                @if (!empty(@$details['details']))
                                    @foreach (@$details['details'] as $val)
                                        <span>{{ $val }}</span><br>
                                    @endforeach
                                @endif
                            </a>
                            <p class="ps-product__meta"> <span class="ps-product__price">{{ @$details['price'] }}</span>
                            </p>
                        </div><a class="ps-product__remove" href="javascript: void(0)"><i class="icon-cross"></i></a>
                    </div>
                </li>
            @else
                <li class="ps-cart__item">
                    <div class="ps-product--mini-cart"><a class="ps-product__thumbnail" href="{{ route('product.detail', $details['slug']) }}"><img
                                src="{{ asset('root/public/uploads/' . $details['images']) }}" alt="Epp Solar" /></a>
                        <div class="ps-product__content"><a class="ps-product__name" href="{{ route('product.detail', $details['slug']) }}">{{ @$details['name'] }}</a>
                            <p class="ps-product__meta"> <span class="ps-product__sale">{{ @$details['price'] }}</span>
                                {{-- <span class="ps-product__is-price">$80.65</span> --}}
                                </p>
                        </div><a class="ps-product__remove" href="javascript: void(0)"><i class="icon-cross"></i></a>
                    </div>
                </li>
            @endif
        @endforeach
    @endif
</ul>
<div class="ps-cart__total"><span>Subtotal </span><span>{{ @$total }}</span></div>
<div class="ps-cart__footer"><a class="ps-btn ps-btn--outline" href="shopping-cart.html">View Cart</a><a
        class="ps-btn ps-btn--warning" href="checkout.html">Checkout</a></div>
</div>
