@extends('../Layout.Layout')
<style>
    .loader {
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: inherit;
        z-index: 10000;
        opacity: 0.5;
    }
    .loader i {
        position: relative;
        top : 20%;
        left : 50%;
        font-size: 80px;
    }
</style>

@section('content')

    @php
        if(session('cart')){
        $cart = session('cart');
        // dd($cart);
        $lastCartItem = end($cart);
        $session_country = @$lastCartItem['shipping_country'];
        if($session_country == 0){
            $session_country ='';
        }
        $session_shipping_class = (int)@$lastCartItem['shipping_class'];
        $shippingCountry =  shippingCountry()->where('shipping_id',$session_shipping_class);
        }else {
            return redirect()->back();
        }

        $cart = session('cart');
        $class = [];
        foreach ($cart as $item) {
            $class[] = $item['shipping_class'];
        }

        $countriesByClass = [];
        foreach ($class as $key => $shippingClassId) {
            $countries = shippingCountry()
                ->where('shipping_id', $shippingClassId)
                ->pluck('country')
                ->toArray();
            $countriesByClass[$shippingClassId] = $countries;
        }

        $commonCountries = [];
        $uncommonCountries = [];

        foreach ($countriesByClass as $classId => $countries) {
            if ($classId === reset($class)) {
                $commonCountries = $countries;
                $uncommonCountries = $countries;
            } else {
                $commonCountries = array_intersect($commonCountries, $countries);
                $uncommonCountries = array_diff($uncommonCountries, $countries);
            }
        }

// dd([
//     'common_countries' => $commonCountries,
//     'uncommon_countries' => $uncommonCountries,
// ]);

    @endphp

    <div class="ps-checkout ps-categogy--separate">
        <div class="container">
            <x-filtter :value="__('DisabledShortBy')" :filterIcon="__('d-none')" :productName="__('Checkout')">Cart</x-filtter>  
        </div>    
            {{-- <h3 class="ps-checkout__title"> Checkout</h3>  --}}
           
                <div class="ps-checkout__content bg-light">
                    <div class="container">
                    <div class="ps-checkout__wapper">
                        <p class="ps-checkout__text mb-4">Sie haben noch kein Konto? <a href="{{route('login')}}">Zum Anmelden hier klicken</a></p>
                        <div class="ps-shopping__coupon row">
                            <div class="col-lg-8 col-md-12 col-12">
                                    <p class="ps-checkout__text ">Haben Sie einen Gutschein? <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> Klicken Sie hier, um Ihren Code einzugeben</a></p>
                                    
                                <div class="collapse mt-4" id="collapseExample">
                                        <div class="bg-white shadow p-5">
                                        <div class="row justify-content-between">
                                            <div class="col-md-7 mb-md-0 mb-4">
                                                <input class="form-control ps-input" type="text" id="couponCode" name="couponCode" placeholder="Kupon-Code"  value="{{old('couponCode') ?? @$lastCartItem['discount']['code'] ?? ''}}" >
                                            </div>
                                             <div class="col-md-5 mb-md-0 mb-4">
                                                <button id="couponApply" onclick="couponApply()" id="couponButton" class="ps-btn ps-btn--primary m-0" type="button" >Coupon anwenden</button>
                                            </div>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <form  method="post" class="mb-0">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="ps-checkout__form bg-white shadow">
                                    <h3 class="ps-checkout__heading">Angaben zur Rechnungsstellung</h3>
                                    <div class="row"> 
                                        <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label for="fullname" class="ps-checkout__label">Vollständiger Name <span class="text-danger">*</span></label>
                                                    <input class="ps-input" type="text" name="fullname"
                                                        value="{{ old('fullname') }}">
                                                    @error('fullname')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                        </div>
    
                                        <div class="col-12">
                                            <div class="ps-checkout__group">
                                                <label class="ps-checkout__label">Country <span class="text-danger">*</span></label>
                                                
                                                <select value="{{ old('country') }}" class="ps-input country_shipping" name="country" id="country"
                                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option value="">Wählen Sie ein Land / eine Region…</option>
                                            
                                                @foreach ($commonCountries as $countryId)
                                                    @php
                                                        $countryName = country()->where('id', $countryId)->pluck('country')->first();
                                                    @endphp
                                                    <option value="{{ $countryId }}">
                                                        {{ $countryName }}
                                                    </option>
                                                @endforeach
                                            
                                                @foreach ($uncommonCountries as $countryId)
                                                    @php
                                                        $countryName = country()->where('id', $countryId)->pluck('country')->first();
                                                    @endphp
                                                    <option value="{{ $countryId }}" disabled>
                                                        {{ $countryName }}
                                                    </option>
                                                @endforeach
                                                </select>
                                            
                                            
                                            
                                                @error('country')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <script>
                                            if(sessionStorage.getItem('selected')){
                                                $("#country").val(sessionStorage.getItem('selected'));
                                            }
    
                                        </script>
    
                                        
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
                                                    <input class="form-check-input shipping_check" type="checkbox" name="ship-address"
                                                        id="ship-address">
                                                    <label class="form-check-label" for="ship-address">Versand an eine andereAdresse?</label>
                                                </div>
                                            </div>
                                        </div>
                                        

                                       <div class="col-12 ps-hidden" data-for="ship-address">
                                           
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="ps-checkout__group">
                                                            <label for="fullname" class="ps-checkout__label">Vollständiger Name <span class="text-danger">*</span></label>
                                                            <input class="ps-input" type="text" name="shipping_fullname" value="{{ old('shipping_fullname') }}">
                                                            @error('shipping_fullname')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                            <div class="ps-checkout__group">
                                                <label class="ps-checkout__label">Country  <span class="text-danger">*</span></label>
                                                <select value="{{ old('shipping_country') }}" class="ps-input" id="shipping_conuntry" name="shipping_country" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                    <option>Wählen Sie ein Land / eine Region…</option>
                                                    @foreach ($shippingCountry as $country)
                                                        <option @if($session_country == $country->country) selected @endif value="{{country()->where('id', $country->country)->pluck('id')->first()}}">
                                                            {{ country()->where('id', $country->country)->pluck('country')->first() }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('district')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                         </div>
    
    
                                                <div class="col-12">
                                                    <div class="ps-checkout__group">
                                                        <label for="email" class="ps-checkout__label">E-Mail Adresse<span class="text-danger">*</span></label>
                                                        <input class="ps-input" type="email" name="shipping_email" value="{{ old('shipping_email') }}">
                                                        @error('shipping_email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
    
                                                <div class="col-12">
                                                    <div class="ps-checkout__group">
                                                        <label for="company_name" class="ps-checkout__label">Firmenname (optional)<span class="text-danger">*</span></label>
                                                        <input class="ps-input" type="text" name="shipping_company_name" value="{{ old('shipping_company_name') }}">
                                                        @error('shipping_company_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
    
                                                <div class="col-12">
                                                    <div class="ps-checkout__group">
                                                        <label class="ps-checkout__label" for="billing_address1">Straße und Hausnummer <span class="text-danger">*</span></label>
                                                        <input class="ps-input mb-3" type="text" placeholder="Hausnummer und Straßenname" name="shipping_billing_address1" value="{{ old('shipping_billing_address1') }}">
                                                        @error('shipping_billing_address1')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input class="ps-input" type="text" placeholder="Wohnung, Appartement, Einheit usw. (fakultativ)" name="shipping_billing_address2" value="{{ old('shipping_billing_address2') }}">
                                                        @error('shipping_billing_address2')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
    
                                                <div class="col-12 col-md-6">
                                                    <div class="ps-checkout__group">
                                                        <label class="ps-checkout__label" for="shipping_city">Stadt / Ortschaft <span class="text-danger">*</span></label>
                                                        <input class="ps-input" type="text" id="shipping_city" name="shipping_city" value="{{ old('shipping_city') }}">
                                                        @error('shipping_city')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
    
                                                <div class="col-12 col-md-6">
                                                    <div class="ps-checkout__group">
                                                        <label class="ps-checkout__label">Postleitzahl <span class="text-danger">*</span></label>
                                                        <input class="ps-input" type="number" id="shipping_postal_code" name="shipping_postal_code" value="{{ old('shipping_postal_code') }}">
                                                        @error('shipping_postal_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
    
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Telefon <span class="text-danger">*</span></label>
                                            <input class="ps-input" type="number" id="shipping_phone_number" name="shipping_phone_number" value="{{ old('shipping_phone_number') }}">
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
                            <div class="col-12 col-lg-4 position-relative">
                                <div class="ps-checkout__order bg-white shadow">
                                    <h3 class="ps-checkout__heading">Ihre Bestellung</h3>
                                    <div class="ps-checkout__row">
                                        <div class="ps-title text-blue">Produkt</div>
                                        <div class="ps-title text-blue">Zwischensumme</div>
                                    </div>
                                    <div id="dynmicElChekout">
                                    @php $total = 0 @endphp
                                    @if (session('cart'))
                                    {{-- @dd(session('cart')); --}}
                                        @foreach (session('cart') as $id => $details)
                                        
                                            @php
                                                $tax = getTaxCountry((int)$details['shipping_country']);
    
                                                if(empty($tax)){
                                                    $tax['vat_tax'] = 0;
                                                }
    
                                                if(isset($details['solar_product']) && $details['solar_product'] === 'yes'){
                                                    if($tax['short_code'] == 'DE'){
                                                        $tax['vat_tax'] = 0;
                                                    }
                                                }
                                                $total+=($details['price']*$details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']) ) ;
                                            @endphp
    
                                            <!-- Product with variations -->
                                            @if ($details['type'] == 'variable')
    
                                                <div class="ps-checkout__row ps-product">
                                                    <div class="ps-product__name">{{ @$details['name'] }}<span class="mx-2 text-green prod_qty">x {{ $details['quantity'] }}</span><br>
                                                        @if (!empty(@$details['details']))
                                                            @foreach (@$details['details'] as $val)
                                                                <span class="font-weight-normal text-muted">{{ $val }}</span><br>
                                                            @endforeach
                                                        @endif
                                                     </div>
                                                    <div class="ps-product__price">
                                                        {{ formatPrice(@$details['price'] * $details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity'])) }}</div>
                                                </div>
                                            @else
                                                <div class="ps-checkout__row ps-product">
                                                    <div class="ps-product__name">
                                                        {{ @$details['name'] }}<span class="mx-2 text-green prod_qty">x {{ $details['quantity'] }}</span>
                                                    </div>
                                                    <div class="ps-product__price">
                                                        {{ formatPrice(@$details['price'] * $details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']) ) }}</div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
    
                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Zwischensumme</div>
                                        <div class="ps-product__price">{{ formatPrice(@$total) }}</div>
                                    </div>
    
    
                                        @php
                                            $cartDiscount =  session('cart');
                                            $cartDiscount = end($cartDiscount);
    
                                            $discountValue = @$cartDiscount['discount']['discount_value'] ?? 0;
                                            $discountType = @$cartDiscount['discount']['type'] ?? '';
                                            $discountCode = @$cartDiscount['discount']['code'] ?? 'Not Applied';
    
                                            if($discountType == 'flat'){
                                                $discountPrice = formatPrice($discountValue);
                                            }
                                            else{
                                                $discountPrice = $discountValue.'%';
                                            }
                                        @endphp
    
                                        @if(!empty(@$cartDiscount['discount']['code']))
                                        <div class="ps-checkout__row">
                                            <div class="ps-title">Discount ({{$discountCode ?? 'Not Applied'}})
    
                                                <div class="ps-title" style="font-size:12px"><a class="text-danger" href="javascript:void(0);" onclick="remove_coupon()">Remove Coupon</a></div>
                                            </div>
    
                                            <div class="ps-product__price">
                                                {{$discountPrice}}
                                            </div>
                                        </div>
                                        @endif
                                        <div class="ps-checkout__row">
                                            <div class="ps-title">Versand</div>
                                            <div class="ps-checkout__checkbox">
                                                <div class="form-check">
                                                    {{--<input class="form-check-input" type="checkbox" id="free-ship" checked>--}}
                                                    <label for="free-ship" id="shipping_price">
    
                                                        @php
                                                        // dd($details);
                                                        $shipping_country = $details['shipping_country'];
    
                                                        // dd($shipping_country);
                                                        @endphp
                                                        {{ formatPrice($shipping_price = shippingCountry()->where('country',$shipping_country)->pluck('price')->first()) }}
                                                        {{-- @dd($shipping_price); --}}
                                                    </label>
                                                </div>
    
                                            </div>
                                        </div>
                                        <div class="ps-checkout__row">
                                            <div class="ps-title final_price">Total</div>
                                            <div class="ps-product__price final_priceEuro text-green">
                                                @php
                                                    if($discountType == 'flat'){
                                                        $afterDiscount = $total-$discountValue;
                                                    }
                                                    else{
                                                        $dis =  $total * ($discountValue)/100;
                                                        $afterDiscount = $total - $dis;
                                                    }
                                                @endphp
                                                {{-- {{$afterDiscount}} --}}
                                                {{ formatPrice(@$afterDiscount +  $shipping_price) }}
                                                {{-- + $shipping_price --}}
                                            </div>
                                        </div>
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
                                <div class="loader position-absolute d-none">
                                    <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            
        </div>
    </div>

    <script>

        var country = document.getElementById('country').value;
        function couponApply() {
           var couponCode = document.getElementById('couponCode').value;

           var dynmicElChekout = document.querySelector("#dynmicElChekout");

           $.ajax({
                url: "/coupon/apply",
                method: 'post',
                data: {
                        "_token": "{{ csrf_token() }}",
                        "code": couponCode,
                        "country": country,
                    },
                    beforeSend : function(){
                        $(".loader").removeClass("d-none");
                    },
                    success: function(response) {
                        $(".loader").addClass("d-none");
                        console.log(response);

                        const {message,status,data} = JSON.parse(response);

                        if(status === "success"){

                            let product = data.cart.map((item, index) => {
                            return `
                            ${item.type === "variable" ? `
                            <div class="ps-checkout__row ps-product">
                                <div class="ps-product__name">${item.name}<span>x</span><span>${item.quantity}</span><br>
                                    ${item.details ? item.details.map((val) => (
                                    `<span>${val}</span><br>`
                                    )).join('') : ''}
                                </div>
                                <div class="ps-product__price">
                                    ${item.price_with_tax}
                                </div>
                            </div> `: `<div class="ps-checkout__row ps-product">
                                <div class="ps-product__name">
                                    ${item.name}<span>x</span><span>${item.quantity}</span>
                                </div>
                                <div class="ps-product__price">
                                    ${item.price_with_tax}
                                </div>
                            </div> `}`;

                        });
                            $(dynmicElChekout).html(`
                                    ${product}
                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Zwischensumme</div>
                                        <div class="ps-product__price">${data.subtotal}</div>
                                    </div>
                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Discount

                                            <div class="ps-title" style="font-size:12px"><a class="text-danger" onclick="remove_coupon()" href="javascript:void(0);">Remove Coupon</a></div>
                                            </div>

                                            <div class="ps-product__price">
                                            ${data.discount_value}
                                            </div>
                                        </div>

                                <div class="ps-checkout__row">
                                    <div class="ps-title">Versand</div>
                                    <div class="ps-checkout__checkbox">
                                        <div class="form-check">
                                            <label for="free-ship" id="shipping_price">
                                                ${data.shipping_price}
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="ps-checkout__row">
                                    <div class="ps-title">Total</div>
                                    <div class="ps-product__price">
                                    ${data.total}
                                    </div>
                                </div>
                            `);
                            toastr.success(message);
                        }else{

                            toastr.error(message);
                        }
                    },
                    error : function(err){
                        console.log(err);
                    }
            });
       }



    </script>

    <script>
      $(document).ready(function () {
        const country_el = document.querySelectorAll('.country_shipping');
        // country shipping
        var dynmicElChekout = document.querySelector("#dynmicElChekout");
        $("#country").on('change', function(){
            const id = $(this).val();
            sessionStorage.setItem("selected", id);
            
            if(!sessionStorage.getItem("checkded")){
                shipping_update(id, dynmicElChekout);
            }else{
                shipping_update(id, dynmicElChekout);
            }
            
        });

         if(sessionStorage.getItem("checkded")){
             $('.shipping_check').prop("checked", true);
             $(".ps-hidden").css('display',"block");
             $("#shipping_conuntry").on('change', function () {
                var id = $(this).val();

                shipping_update(id, dynmicElChekout);
            });
        }

        $(".shipping_check").on('click', function () {

            if ($(this).prop("checked")) {
                var id =  $("#shipping_conuntry").val();
                shipping_update(id, dynmicElChekout);

                sessionStorage.setItem("checkded","shipping" );
                
                $("#shipping_conuntry").on('change', function () {
                var id = $(this).val();
                shipping_update(id, dynmicElChekout);
                
                });
            }else{
                sessionStorage.removeItem("checkded");
               let id =  $("#country").val();
               shipping_update(id, dynmicElChekout);
            }
        });
      });

    function shipping_update(id, dynmicElChekout,shipping=null) {
    $.ajax({
        url: "/admin/shipping/country/shipping_country_update",
        method: 'post',
        data: {
        "_token": "{{ csrf_token() }}",
        "shipping":shipping,
        "shipping_country": id,
        },
        beforeSend : function(){
            $(".loader").removeClass("d-none");
        },
        success: function (response) {
            $(".loader").addClass("d-none");
            const {cart} = response;
        console.log(response);
            var el="";
            cart.map((item, index) => {
            el+= `${item.type === "variable" ? `
                   <div class="ps-checkout__row ps-product">
                    <div class="ps-product__name">${item.name}<span>x</span><span>${item.quantity}</span><br>
                        ${item.details ? item.details.map((val) => (
                        `<span>${val}</span><br>`
                        )).join('') : ''}
                    </div>
                    <div class="ps-product__price">
                        ${item.price_with_tax}
                    </div>
                </div> `: `<div class="ps-checkout__row ps-product">
                    <div class="ps-product__name">
                        ${item.name}<span>x</span><span>${item.quantity}</span>
                    </div>
                    <div class="ps-product__price">
                        ${item.price_with_tax}
                    </div>
                </div> `}`;

        });
        // console.log(el);

        $(dynmicElChekout).html(`
            ${el}
            <div class="ps-checkout__row">
                <div class="ps-title">Zwischensumme</div>
                <div class="ps-product__price">${response.subtotal}</div>
            </div>
            ${response.coupon ?
            `<div class="ps-checkout__row">
                <div class="ps-title">Discount
                <div class="ps-title" style="font-size:12px">
                    <a class="text-danger" href="javascript:void(0);" onclick="remove_coupon()">Remove Coupon</a>
                </div>
                </div>
                <div class="ps-product__price">
                ${response.discount_value} <span>${response.type !== 'flat' ? '%' : ''}</span>
                </div>
            </div>`
            : ''}
            <div class="ps-checkout__row">
            <div class="ps-title">Versand</div>
            <div class="ps-checkout__checkbox">
                <div class="form-check">
                <label for="free-ship" id="shipping_price">
                    ${response.shipping_price}
                </label>
                </div>
            </div>
            </div>
            <div class="ps-checkout__row">
            <div class="ps-title">Total</div>
            <div class="ps-product__price">
                ${response.total}
            </div>
            </div>
        `);
        },
        error: function (err) {
        console.log(err);
        }
    });
    };

    function remove_coupon() {
    $.ajax({
        url: "coupon/remove",
        method: 'get',
        data: {
        "_token": "{{ csrf_token() }}",
        },
        beforeSend : function(){
            $(".loader").fadeOut("slow", function() {
                $(this).removeClass("d-none");
            });
        },
        success: function (response) {
            $(".loader").fadeOut("slow", function() {
                $(this).addClass("d-none");
            });
        var res = JSON.parse(response);
        const { data } = res;
        let product = data.cart.map((item, index) => {
                return `
                ${item.type === "variable" ? `
                   <div class="ps-checkout__row ps-product">
                    <div class="ps-product__name">${item.name}<span>x</span><span>${item.quantity}</span><br>
                        ${item.details ? item.details.map((val) => (
                        `<span>${val}</span><br>`
                        )).join('') : ''}
                    </div>
                    <div class="ps-product__price">
                        ${item.price_with_tax}
                    </div>
                </div> `: `<div class="ps-checkout__row ps-product">
                    <div class="ps-product__name">
                        ${item.name}<span>x</span><span>${item.quantity}</span>
                    </div>
                    <div class="ps-product__price">
                        ${item.price_with_tax}
                    </div>
                </div> `}`;

        });


        if (res.status === "success") {
            $(dynmicElChekout).html(`
            ${product}
            <div class="ps-checkout__row">
                <div class="ps-title">Zwischensumme</div>
                <div class="ps-product__price">${data.subtotal}</div>
            </div>
            <div class="ps-checkout__row">
                <div class="ps-title">Versand</div>
                <div class="ps-checkout__checkbox">
                <div class="form-check">
                    <label for="free-ship" id="shipping_price">
                    ${data.shipping_price}
                    </label>
                </div>
                </div>
            </div>
            <div class="ps-checkout__row">
                <div class="ps-title">Total</div>
                <div class="ps-product__price">
                ${data.total}
                </div>
            </div>
            `);
            toastr.success(res.message);
        } else {
            toastr.error(message);
        }
        },
        error: function (err) {
        console.log(err);
        }
    });
}

  </script>

@endsection
