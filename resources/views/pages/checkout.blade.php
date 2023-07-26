@extends('../Layout.Layout')

@section('content')

@php
    if(session('cart')){
    $cart = session('cart');
    $lastCartItem = end($cart);
    $session_country = $lastCartItem['shipping_country'];
    if($session_country == 0){
        $session_country ='';
    }
    $session_shipping_class = (int)$lastCartItem['shipping_class'];
    $shippingCountry =  shippingCountry()->where('shipping_id',$session_shipping_class);
    }else {
        return redirect()->back();
    }
@endphp

    <div class="ps-checkout">
        <div class="container">
            <ul class="ps-breadcrumb">
                <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
                <li class="ps-breadcrumb__item" aria-current="page">Cart</li>
                <li class="ps-breadcrumb__item active" aria-current="page">Checkout</li>
            </ul>
            <h3 class="ps-checkout__title"> Checkout</h3>
            <div class="ps-checkout__content">
                <div class="ps-checkout__wapper">
                    <p class="ps-checkout__text">Sie haben noch kein Konto? <a href="#">Zum Anmelden hier klicken</a>
                    </p>
                </div>
                <form  method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="ps-checkout__form">
                                <h3 class="ps-checkout__heading">Angaben zur Rechnungsstellung</h3>
                                <div class="row">

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Country</label>
                                            <select value="{{ old('country') }}" class="ps-input country_shipping" name="country"
                                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Wählen Sie ein Land / eine Region…</option>
                                                @foreach ($shippingCountry as $country)
                                                    <option @if($session_country == $country->id) selected @endif value="{{$country->id}}">{{$country->country}} / {{formatPrice($country->price)}}</option>
                                                @endforeach
                                            </select>

                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                            <div class="ps-checkout__group">
                                                <label for="fullname" class="ps-checkout__label">Vollständiger Name <span
                                                        class="text-danger">*</span></label>
                                                <input class="ps-input" type="text" name="fullname"
                                                    value="{{ old('fullname') }}">
                                                @error('fullname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label for="email" class="ps-checkout__label">E-Mail Adresse<span
                                                    class="text-danger">*</span></label>
                                            <input class="ps-input" type="email" name="email"
                                                value="{{ old('email') ?? auth()->user()->email ?? '' }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">

                                        <div class="ps-checkout__group">
                                            <label for="company_name" class="ps-checkout__label">Firmenname (optional)</label>
                                            <input class="ps-input" type="text" name="company_name"
                                                value="{{ old('company_name') }}">
                                            @error('company_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label" for="billing_address1">Straße und Hausnummer
                                                <span class="text-danger">*</span></label>
                                            <input class="ps-input mb-3" type="text"
                                                placeholder="Hausnummer und Straßenname" name="billing_address1"
                                                value="{{ old('billing_address1') }}">
                                            @error('billing_address1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input class="ps-input" type="text"
                                                placeholder="Wohnung, Appartement, Einheit usw. (fakultativ)"
                                                name="billing_address2" value="{{ old('billing_address2') }}">
                                            @error('billing_address2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>


                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label" for="city">Stadt / Ortschaft <span
                                                    class="text-danger">*</span></label>
                                            <input class="ps-input" type="text" id="city" name="city"
                                                value="{{ old('city') }}">
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Postleitzahl <span
                                                    class="text-danger">*</span></label>
                                            <input class="ps-input"  type="number" id="postal_code"
                                                name="postal_code" value="{{ old('postal_code') }}">
                                            @error('postal_code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Telefon <span
                                                    class="text-danger">*</span></label>
                                            <input class="ps-input" type="number" id="phone_number" name="phone_number"
                                                value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="ship-address"
                                                    id="ship-address">
                                                <label class="form-check-label" for="ship-address">Versand an eine andere
                                                    Adresse?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ps-hidden" data-for="ship-address">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Country</label>
                                                    <select value="{{ old('shipping_country') }}" class="ps-input country_shipping" name="shipping_country"
                                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                        <option>Wählen Sie ein Land / eine Region…</option>
                                                        @foreach ($shippingCountry as $country)
                                                            <option @if($session_country == $country->id) selected @endif value="{{$country->id}}">{{$country->country}} / {{formatPrice($country->price)}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('district')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                    <div class="ps-checkout__group">
                                                        <label for="fullname" class="ps-checkout__label">Vollständiger
                                                            Name <span class="text-danger">*</span></label>
                                                        <input class="ps-input" type="text" name="shipping_fullname"
                                                            value="{{ old('shipping_fullname') }}">
                                                        @error('shipping_fullname')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label for="email" class="ps-checkout__label">E-Mail Adresse<span
                                                            class="text-danger">*</span></label>
                                                    <input class="ps-input" type="email" name="shipping_email"
                                                        value="{{ old('shipping_email') }}">
                                                    @error('shipping_email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label for="company_name" class="ps-checkout__label">Firmenname
                                                        (optional)<span class="text-danger">*</span></label>
                                                    <input class="ps-input" type="text" name="shipping_company_name"
                                                        value="{{ old('shipping_company_name') }}">
                                                    @error('shipping_company_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label" for="billing_address1">Straße und
                                                        Hausnummer
                                                        <span class="text-danger">*</span></label>
                                                    <input class="ps-input mb-3" type="text"
                                                        placeholder="Hausnummer und Straßenname"
                                                        name="shipping_billing_address1"
                                                        value="{{ old('shipping_billing_address1') }}">
                                                    @error('shipping_billing_address1')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input class="ps-input" type="text"
                                                        placeholder="Wohnung, Appartement, Einheit usw. (fakultativ)"
                                                        name="shipping_billing_address2"
                                                        value="{{ old('shipping_billing_address2') }}">
                                                    @error('shipping_billing_address2')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>


                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label" for="shipping_city">Stadt /
                                                        Ortschaft
                                                        <span class="text-danger">*</span></label>
                                                    <input class="ps-input" type="text" id="shipping_city"
                                                        name="shipping_city" value="{{ old('shipping_city') }}">
                                                    @error('shipping_city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Postleitzahl <span
                                                            class="text-danger">*</span></label>
                                                    <input class="ps-input"  type="number"
                                                        id="shipping_postal_code" name="shipping_postal_code"
                                                        value="{{ old('shipping_postal_code') }}">
                                                    @error('shipping_postal_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Telefon <span
                                                            class="text-danger">*</span></label>
                                                    <input class="ps-input" type="number" id="shipping_phone_number"
                                                        name="shipping_phone_number"
                                                        value="{{ old('shipping_phone_number') }}">
                                                    @error('shipping_phone_number')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label" for="message">Bestellhinweise
                                                (optional)</label>
                                            <textarea class="ps-textarea" rows="7"
                                                placeholder="Anmerkungen zu Ihrer Bestellung, z. B. besondere Hinweise zur Lieferung." for="message"
                                                name="comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="ps-checkout__order">
                                <h3 class="ps-checkout__heading">Ihre Bestellung</h3>
                                <div class="ps-checkout__row">
                                    <div class="ps-title">Produkt</div>
                                    <div class="ps-title">Zwischensumme</div>
                                </div>
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)

                                        @php $total+=($details['price']*$details['quantity']); @endphp
                                        <!-- Product with variations -->
                                        @if ($details['type'] == 'variable')
                                            <div class="ps-checkout__row ps-product">
                                                <div class="ps-product__name">{{ @$details['name'] }}</span><br>
                                                    @if (!empty(@$details['details']))
                                                        @foreach (@$details['details'] as $val)
                                                            <span>{{ $val }}</span><br>
                                                        @endforeach
                                                    @endif
                                                    <span>x</span><span>{{ $details['quantity'] }}</span>
                                                </div>
                                                <div class="ps-product__price">
                                                    {{ formatPrice(@$details['price'] * $details['quantity']) }}</div>
                                            </div>
                                        @else
                                            <div class="ps-checkout__row ps-product">
                                                <div class="ps-product__name">
                                                    {{ @$details['name'] }}<span>x</span><span>{{ $details['quantity'] }}</span>
                                                </div>
                                                <div class="ps-product__price">
                                                    {{ formatPrice(@$details['price'] * $details['quantity']) }}</div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                                <div class="ps-checkout__row">
                                    <div class="ps-title">Zwischensumme</div>
                                    <div class="ps-product__price">{{ formatPrice(@$total) }}</div>
                                </div>

                                <div class="ps-checkout__row">
                                    <div class="ps-title">Versand</div>
                                    <div class="ps-checkout__checkbox">
                                        <div class="form-check">
                                            {{--<input class="form-check-input" type="checkbox" id="free-ship" checked>--}}
                                            <label for="free-ship" id="shipping_price">

                                                @php
                                                $shipping_country = $details['shipping_country'];
                                                // dd($shipping_country);
                                                @endphp
                                                {{ formatPrice($shipping_price = shippingCountry()->where('id',$shipping_country)->pluck('price')->first()) }}
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="ps-checkout__row">
                                    <div class="ps-title">Total</div>
                                    <div class="ps-product__price">{{ formatPrice(@$total + $shipping_price) }}</div>
                                </div>
                                <div class="ps-checkout__payment">
                                    <div class="direct-bank-method mb-15">
                                        <div class="form-check">
                                            <input class="form-check-input" name="payment_method"
                                                type="checkbox" id="bank" value="Direkte Banküberweisung">
                                            <label class="form-check-label" for="bank"> Direkte Banküberweisung

                                            @error('payment_method')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </label>
                                        </div>
                                    </div>

                                    <div class="check-faq">
                                        <div class="form-check">
                                            <input class="form-check-input" required type="checkbox" id="agree-faq" checked />
                                            <label class="form-check-label" for="agree-faq">Ich habe die Allgemeinen
                                                Geschäftsbedingungen für die Website gelesen und stimme ihnen zu <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    @if (count((array) session('cart')) > 0)
                                    <button class="ps-btn ps-btn--warning" type="submit">Bestellung aufgeben</button>
                                    @else
                                    <button class="ps-btn ps-btn--warning" type="disabled" disabled>Bestellung aufgeben</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
  window.onload = function(){

  const country_el = document.querySelectorAll('.country_shipping');
  country_el.forEach(selectElement => {
    selectElement.onchange = function(e) {

       var id = e.target.value;
       document.querySelectorAll('.country_shipping').forEach(selectd =>{
             if( !selectd.value==""){
                 selectd.value = e.target.value;

             }
        });

       $.ajax({
           url: "/admin/shipping/country/shipping_country_update",
           method: 'post',
           data: {
                    "_token": "{{ csrf_token() }}",
                    "shipping_country": id,
                },
                success: function(response) {
                //    console.log(response)
                window.location.reload();
                },
                error : function(err){
                    console.log(err);
                }
            });


      };
    });

}
</script>
@endsection