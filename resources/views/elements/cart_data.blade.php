<style>
    .ps-shopping .ps-shopping__footer .ps-btn {
        display: inline-block;
        width: auto;
        text-transform: initial;
        /* height: 44px; */
        padding: 5px 10px;
        font-size: 16px;
        font-weight: 500;
    }
</style>
<h3 class="ps-shopping__title">
    Einkaufskorb<sup>{{ count((array) session('cart')) }}</sup></h3>
<div class="ps-shopping__content">
    <div class="row">
        <div class="col-12 col-md-7 col-lg-9">
            <ul class="ps-shopping__list">

                @php $total = 0 @endphp
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)

                             @php @$shipping_country = (@$details['shipping_country']) @endphp

                            {{-- {{dd($shipping_country)}} --}}
                                @php $total+=(@$details['price']*@$details['quantity']); @endphp
                                <!-- Product with variations -->
                                @if (@$details['type'] == 'variable')
                                <li>
                                    <div class="ps-product ps-product--wishlist">
                                    <div class="ps-product__remove"><a href="javascript::void(0)" onclick="remove_to_cart(<?= $id ?>)"><i class="icon-trash2 text-danger"></i></a></div>
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{ route('product.detail', $details['slug']) }}">
                                            <figure><img src="{{ asset('root/public/uploads/' . @$details['images']) }}" alt="alt">
                                            </figure>
                                        </a></div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title d-block text-left">
                                            <a href="{{ route('product.detail', $details['slug']) }}"><span>{{ @$details['name'] }}</span><br>
                                                @if (!empty(@$details['details']))
                                                    @foreach (@$details['details'] as $val)
                                                        <span>{{ $val }}</span><br>
                                                    @endforeach
                                                @endif
                                            </a>
                                        </h5>
                                        <div class="ps-product__row">
                                            <div class="ps-product__label">Price:</div>
                                            <div class="ps-product__value"><span class="ps-product__price">{{ formatPrice(@$details['price']) }}</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__stock">
                                            <div class="ps-product__label">Stock:</div>
                                            <div class="ps-product__value"><span class="ps-product__in-stock">In
                                                    Stock</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart">
                                            <button class="ps-btn">Add to cart</button>
                                        </div>
                                        <div class="ps-product__row ps-product__quantity">
                                            <div class="ps-product__label">Quantity:</div>
                                            <div class="ps-product__value" style="width:60%">
                                                <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="QtyUpdate(<?= $id ?>,0)"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" step="1" min="1" id="qty<?= $id ?>"
                                                    name="quantity" type="number" onchange="update_to_cart(<?= $id ?>)"
                                                    name="qty[]" value="{{ $details['quantity'] }}"
                                                    onkeypress="return isNumber(event)" size="4" placeholder=""
                                                    inputmode="numeric">
                                                <button class="plus" onclick="QtyUpdate(<?= $id ?>,1)"><i
                                                        class="icon-plus"></i></button>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__subtotal">
                                            <div class="ps-product__label">Subtotal:</div>
                                            <div class="ps-product__value">{{ formatPrice( @$details['price'] * $details['quantity']) }}</div>
                                        </div>
                                    </div>
                                </div>
                                </li>
                                @else
                                <li>
                                    <div class="ps-product ps-product--wishlist">

                                    <div class="ps-product__remove"><a href="javascript::void(0)" onclick="remove_to_cart(<?= $id ?>)"><i class="icon-trash2 text-danger"></i></a></div>
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{ route('product.detail', @$details['slug']) }}">
                                            <figure><img src="{{ asset('root/public/uploads/' . @$details['images']) }}" alt="alt">
                                            </figure>
                                        </a></div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title d-block text-left">
                                            <a href="{{ route('product.detail', @$details['slug']) }}"><span>{{ @$details['name'] }}</span></a>
                                        </h5>
                                        <div class="ps-product__row">
                                            <div class="ps-product__label">Price:</div>
                                            <div class="ps-product__value"><span class="ps-product__price">{{ formatPrice(@$details['price']) }}</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__stock">
                                            <div class="ps-product__label">Stock:</div>
                                            <div class="ps-product__value"><span class="ps-product__in-stock">In
                                                    Stock</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart">
                                            <button class="ps-btn">Add to cart</button>
                                        </div>
                                        <div class="ps-product__row ps-product__quantity">

                                            <div class="ps-product__label">Quantity:</div>
                                            <div class="ps-product__value" style="width:60%">
                                                <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="QtyUpdate(<?= $id ?>,0)"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" step="1" min="1" id="qty<?= $id ?>"
                                                    name="quantity" type="number" onchange="update_to_cart(<?= $id ?>)"
                                                    name="qty[]" value="{{ @$details['quantity'] }}"
                                                    onkeypress="return isNumber(event)" size="4" placeholder=""
                                                    inputmode="numeric">
                                                <button class="plus" onclick="QtyUpdate(<?= $id ?>,1)"><i
                                                        class="icon-plus"></i></button>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__subtotal">
                                            <div class="ps-product__label">Subtotal:</div>
                                            <div class="ps-product__value">{{ formatPrice( @$details['price'] * @$details['quantity']) }}</div>
                                        </div>
                                    </div>
                                </div>
                                </li>
                                @endif
                            @endforeach
                         @endif
            </ul>
            <div class="ps-shopping__table table-responsive">
                <table class="table ps-table ps-table--product">
                    <thead>
                        <tr>
                            <th class="ps-product__remove"></th>
                            <th class="ps-product__thumbnail"></th>
                            <th class="ps-product__name">Name des Produkts</th>
                            <th class="ps-product__meta">Preis pro Einheit</th>
                            <th class="ps-product__quantity">Menge</th>
                            <th class="ps-product__subtotal">Zwischensumme</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)

                                @php $total+=(@$details['price']*@$details['quantity']); @endphp

                                @php @$shipping_country = (@$details['shipping_country']) @endphp
                                <!-- Product with variations -->
                                @if ($details['type'] == 'variable')
                                    <tr>
                                        <td class="ps-product__remove"> <a href="javascript::void(0)"
                                                onclick="remove_to_cart(<?= $id ?>)"><i
                                                    class="icon-trash2 text-danger"></i></a></td>
                                        <td class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="{{ route('product.detail', @$details['slug']) }}">
                                                <figure><img
                                                        src="{{ asset('root/public/uploads/' . $details['images']) }}"
                                                        alt=""></figure>
                                            </a></td>
                                        <td class="ps-product__name">
                                            <div class="cart_product_name">
                                                <a href="{{ route('product.detail', $details['slug']) }}"><span>{{ @$details['name'] }}</span><br>
                                                    @if (!empty(@$details['details']))
                                                        @foreach (@$details['details'] as $val)
                                                            <span>{{ $val }}</span><br>
                                                        @endforeach
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="cart_product_shipping">
                                                <span class="text-muted fs-5">Voraussichtliches Versanddatum Juli 14,
                                                    2023</span>
                                            </div>
                                        </td>
                                        <td class="ps-product__meta"> <span
                                                class="ps-product__price">{{ formatPrice(@$details['price']) }}</span>
                                        </td>
                                        <td class="ps-product__quantity">

                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="QtyUpdate(<?= $id ?>,0)"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" step="1" min="1" id="qty<?= $id ?>"
                                                    name="quantity" type="number" onchange="update_to_cart(<?= $id ?>)"
                                                    name="qty[]" value="{{ $details['quantity'] }}"
                                                    onkeypress="return isNumber(event)" size="4" placeholder=""
                                                    inputmode="numeric">
                                                <button class="plus" onclick="QtyUpdate(<?= $id ?>,1)"><i
                                                        class="icon-plus"></i></button>
                                            </div>
                                        </td>
                                        <td class="ps-product__subtotal">
                                            {{ formatPrice( @$details['price'] * $details['quantity']) }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="ps-product__remove"> <a href="javascript::void(0)"
                                                onclick="remove_to_cart(<?= $id ?>)"><i
                                                    class="icon-trash2 text-danger"></i></a></td>
                                        <td class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="{{ route('product.detail', @$details['slug']) }}">
                                                <figure><img
                                                        src="{{ asset('root/public/uploads/' . @$details['images']) }}"
                                                        alt=""></figure>
                                            </a></td>
                                        <td class="ps-product__name">
                                            <div class="cart_product_name">
                                                <a
                                                    href="{{ route('product.detail', @$details['slug']) }}">{{ @$details['name'] }}</a>
                                            </div>
                                            <div class="cart_product_shipping">
                                                <span class="text-muted fs-5">Voraussichtliches Versanddatum Juli 14,
                                                    2023</span>
                                            </div>
                                        </td>
                                        <td class="ps-product__meta"> <span
                                                class="ps-product__price sale">{{ formatPrice(@$details['price']) }}</span>
                                            {{-- <span class="ps-product__del">$80.65</span> --}}
                                        </td>
                                        <td class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="QtyUpdate(<?= $id ?>,0)"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" step="1" min="1"
                                                    id="qty<?= $id ?>" name="quantity" type="number"
                                                    onchange="update_to_cart(<?= $id ?>)" name="qty[]"
                                                    value="{{ @$details['quantity'] }}"
                                                    onkeypress="return isNumber(event)" inputmode="numeric">
                                                <button class="plus" onclick="QtyUpdate(<?= $id ?>,1)"><i
                                                        class="icon-plus"></i></button>

                                                {{-- <input type="button" value="-" class="minus btn_primary btn"
                                                        onclick="QtyUpdate(<?= $id ?>,0)">
                                                    <input type="number" id="qty<?= $id ?>" class="input-text cart_qty mx-1"
                                                        step="1" min="1" onchange="update_to_cart(<?= $id ?>)"
                                                        name="qty[]" value="{{ $details['quantity'] }}"
                                                        onkeypress="return isNumber(event)" size="4" placeholder=""
                                                        inputmode="numeric">
                                                    <input type="button" value="+" class="plus btn_primary btn"
                                                        onclick="QtyUpdate(<?= $id ?>,1)"> --}}
                                            </div>
                                        </td>
                                        <td class="ps-product__subtotal">
                                            {{ formatPrice(@$details['price'] * @$details['quantity']) }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="ps-shopping__footer">
                <div class="row">
                    {{-- <div class="col-12">
                        <div class="ps-shopping__coupon">
                            <input class="form-control ps-input" type="text" placeholder="Kupon-Code" style="width:50%">
                            <button class="ps-btn ps-btn--primary" type="button">Coupon anwenden</button>
                        </div>
                    </div> --}}
                    {{-- <div class="col-12 col-md-6">
                        <div class="ps-shopping__button d-flex" >
                            <button class="ps-btn ps-btn--primary" type="button">Alle löschen</button>
                            <button class="ps-btn ps-btn--primary" type="button">Warenkorb aktualisieren</button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-3">
            <div class="ps-shopping__label">Warenkorb-Summen</div>
            <div class="ps-shopping__box">
                <div class="ps-shopping__row">
                    <div class="ps-shopping__label">Zwischensumme</div>
                    <div class="ps-shopping__price">{{ formatPrice(@$total) }}</div>
                </div>

                <div class="ps-shopping__row">
                    <div class="ps-shopping__label">Versand</div>
                    <div class="ps-shopping__price">
                        {{ formatPrice($shipping_price = shippingCountry()->where('id',@$shipping_country)->pluck('price')->first()) }}
                    </div>
                </div>

               {{--<div class="ps-shopping__text">Die Versandoptionen werden während des Bestellvorgangsaktualisiert.</div>
                <a class="ps-shopping__toggle" href="javascript::void(0)">Versand</a>
                <div class="ps-shopping__form">
                    <div class="ps-shopping__group">

                        <select class="js-example-basic-single select2-hidden-accessible" name="state"
                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option selected="" data-select2-id="3">Wählen Sie ein Land / eine Region…
                            </option>
                            <option>Afghanistan</option>
                            <option>Åland Islands</option>
                            <option>Albania</option>

                        </select>
                    </div>

                </div> --}}

                <div class="ps-shopping__row">
                    <div class="ps-shopping__label">Insgesamt</div>
                    <div class="ps-shopping__price">{{ formatPrice(@$total+$shipping_price) }}</div>
                </div>
                <div class="ps-shopping__checkout">
                    @if(count((array) session('cart'))>0)
                    <a class="ps-btn ps-btn--warning"
                        href="{{ url('checkout') }}">Zur
                        Kasse gehen</a>
                    @else
                    <a class="ps-btn ps-btn--disabled"
                        href="javascript::void(0)">Zur
                        Kasse gehen</a>
                    @endif
                        <a class="ps-shopping__link" href="{{ url('/') }}">Weiter zum Einkaufen</a></div>
            </div>
        </div>
    </div>

</div>
