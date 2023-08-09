@extends('../Layout.Layout')

@section("content")
<style> 

    .ps-product__variations_sec .accordion .attribute_box .card-header {
        cursor: pointer;
    }

    .attribute_box .ps-checkout__checkbox .form-check {
        padding-left: 1.25rem;
    }

    .bg-light-blue {
        background: #f5f8ff;
    }
    
    .attribute_price {
        color: var(--green-color);
        font-weight: 700;
        font-size: 14px;
    }

    @media only screen and (min-width: 1280px){
        .ps-product--detail .ps-product__title {
        font-size: 28px;
        font-weight: 600;
    }
    }
    @media only screen and (max-width: 1279px){
        .ps-product--detail .ps-product__title {
        font-size: 24px !important;;
        font-weight: 600;
    }
    }
    @media(max-width: 991px){
        .ps-product--detail .ps-product__title {
        font-size: 22px !important;
        font-weight: 500;
    }
    }
    @media(max-width: 767px){
        .ps-product--detail .ps-product__title {
        font-size: 18px !important;
        font-weight: 500;
    }
    }

    .ps-product--detail .ps-product__price {
        font-size: 22px;
        font-weight: 700;
    }
    .bg-gray {
        background-color: #d7d7d724;
    }
    .ps-product__variations_sec .accordion .attribute_box{
        background-color: white;
        color: var(--blue-color);
        font-weight: 600;
        padding: 15px;
        border-radius: 3px !important;
        border-bottom: 1px solid #dedede !important;
        margin-bottom: 15px;
        box-shadow: 0px 0px 2px 1px #e2e2e2de;
    }
    .ps-product__variations_sec .accordion .card-header{
        background-color: transparent;
        border: none;
    }

    .ps-product__variations_sec .select_var_row {
        background: transparent!important;
        border: 1px solid #e1e1e1;
    }

    .ps-product__variations_sec .accordion .card:not(:first-of-type):not(:last-of-type) {
        border-radius: 3px !important;
        border: 1px solid #f0f2f5;
    }

    .attribute_title {
         font-size: 16px !important;
         color: var(--green-color);
    }
    
    .attribute_title_name {
         font-size: 14px !important;
         color: var(--blue-color);
    }
    .form-check .form-check-label::before {
        display: none;
    }
    .ps-product__variations_sec .form-check .form-check-label {
        padding: 0;
    }
    /* .ps-product__variations_sec input[type=radio]:checked+label>figure,
    .ps-product__variations_sec input[type=radio]:checked+label {
        border: 2px solid #075095 !important;
        border-radius: 10px;
    } */
    .ps-product__variations_sec .select_var_row{
        background: #f0f2f5;

    }
    .ps-product__variations_sec input[type=radio]:checked+label>.select_var_row {
        border: 2px solid var(--green-color); !important;
        border-radius: 15px;
    }
   

    .ps-product__variations_sec .select_var_row {
        border-radius: 15px;
    }
    .bg-light {
         background-color: #f7f8f9 !important;
    }
    .ps-desc{
         border-radius: 13px;
         font-size:14px !important;
         color :#6f6f6f !important;
         text-align: justify;
     }

    .ps-product__variations_sec input[type=radio] {
        display: none;
    }

    /* Stuff after this is only to make things more pretty */
    .ps-product__variations_sec input[type=radio]+label>figure>img {
        transition: 500ms all;
    }
    
    .select_var_row:hover {
    cursor: pointer;
    }
    .related_product_view .ps-product__title {
        font-size: 16px;
        line-height: 26px;
        margin-bottom: 13px;
        color: var(--blue-color);
        font-weight: 700;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 50px;
    }
    .font-weight-400{
        font-weight:400 !important;
     }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<div class="ps-page--product4 mt-4">
    <div class="container">
    <x-filtter :value="__('DisabledShortBy')" :filterIcon="__('d-none')" :productName="__($product->product_name)">Products</x-filtter>
        <div class="ps-page__content pt-5">
            <div class="ps-product--detail ps-product--full">
                <div class="row">
                    <div class="col-12 col-xl-5 col-md-5">
                        <div class="ps-section__carousel related_product_view">
                            <div class="main-image owl-carousel owl-loaded owl-drag" data-owl-loop="true" data-owl-auto="false" data-owl-nav="false" data-owl-dots="false">
                                <div class="item">
                                    <img src="{{ asset('root/public/uploads/' . $product->thumb_image) }}" alt="alt" />
                                </div>
                                @foreach ($product->images as $image)
                                <div class="item">
                                    <img src="{{ asset('root/public/uploads/' . $image->images) }}" alt="alt" />
                                </div>
                                @endforeach
                            </div>
                            <div class="gallery owl-carousel owl-loaded owl-drag" data-owl-loop="true" data-owl-auto="false" data-owl-nav="true" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="4" data-owl-item-xl="4">
                                <div class="item" style="padding:10px;">
                                    <img src="{{ asset('root/public/uploads/' . $product->thumb_image) }}" alt="alt" data-index="0" />
                                </div>
                                @foreach ($product->images as $image)
                                <div class="item" style="padding:10px;">
                                    <img src="{{ asset('root/public/uploads/' . $image->images) }}" alt="alt" data-index="{{ $loop->index+1 }}" />
                                </div>
                                @endforeach
                            </div>
                        </div>
                            <!-- Kartik -->
                            
                        <div class="ps-product--gallery">
                            <!-- <div class="ps-product__thumbnail">
                                @foreach ($product->images as $image)
                                <div class="slide"><img src="{{ asset('root/public/uploads/' . $image->images) }}" alt="alt" /></div>
                                @endforeach

                            </div> -->
                            <!-- <div class="ps-gallery--image">
                                @foreach ($product->images as $image)
                                <div class="slide">
                                    <div class="ps-gallery__item"><img src="{{ asset('root/public/uploads/' . $image->images) }}" alt="alt" /></div>
                                </div>
                                @endforeach
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div> -->
                        </div>
                    </div>
                   
                    <div class="col-12 col-xl-7 col-md-7">
                        <div class="ps-product__info">
                            <div class="ps-product__branch"><a href="#">@if(isset($product->categories->name)) {{$product->categories->name}} @endif</a></div>
                            <div class="ps-product__title">{{$product->product_name}}</div>
                            {{-- <div class="ps-product__desc">
                                <ul class="ps-product__list">
                                    <li>Study history up to 30 days</li>
                                    <li>Up to 5 users simultaneously</li>
                                    <li>Has HEALTH certificate</li>
                                </ul>
                            </div> --}}
                            {{-- <div class="ps-product__meta"><span class="ps-product__price sale">Please Select Attributes for best price</span></div> --}}
                            <div  class="ps-product__meta"><span class="ps-product__price sale"  id="totalPrice">@if($product->type == 'variable') Please Select Attributes for best price @else {{ formatPrice($product->sale_price) }} @endif</span><span class="ps-product__del">@if($product->type == 'variable') @else{{ formatPrice($product->price) }} @endif</span>
                            </div>
                            <h5 class="mb-4 text-dark" id="nameDiv" style="display: none;"></h5>
                            <div id="priceDiv" style="display: none;"></div>
                            @if($product->type == 'variable')
                            <div class="ps-product__variations_sec">
                                 <div class="accordion" id="accordionExample">
                                    
                                    @foreach ($attributes as $key => $data)

                                        <div class="attribute_box">
                                            <div class="card-header p-0" id="heading_Var{{$key}}" data-toggle="collapse" data-target="#collapse_var_{{$key}}" aria-expanded="true" aria-controls="collapse_var_{{$key}}">
                                                    <div class="card_header_inner pr-3" style="display:inline-block">
                                                            <a href="javascript:void(0)">
                                                                <h3 class="attribute_title mb-0">{{$data->attribute_name}}</h3>
                                                            </a>
                                                        </div>
                                                <span class="float-right text-secondary fs-4">Change</span>
                                            </div>

                                            <div id="collapse_var_{{$key}}" class="collapse{{$key == 0 ? ' show' : ''}}" aria-labelledby="heading_Var{{$key}}" data-parent="#accordionExample">
                                                <div class="card-body">
                                                     <p class="ps-checkout__checkbox row p-4 ps-desc bg-light-blue mb-20 shadow-sm">
                                                         {{$data->attribute_description}}</p>
                                                    <div class="ps-checkout__checkbox row">
                                                  
                                                        @foreach ($data->attributeTerms as $keyss => $vales)

                                                        @if ($key == 0 && $data->attribute_type == 'panel')
                                                        <div class="form-check col-12 mb-4">
                                                            <input class="form-check-input"
                                                                type="radio"
                                                                name="var_radios{{$key}}"
                                                                id="var_radios{{$key}}_{{$keyss}}"
                                                                value="option{{$keyss}}"
                                                                data-atr-name="{{ $vales->attribute_term_name }}"
                                                                data-atr-price="{{ $vales->price }}"
                                                                data-value="{{ $vales->attribute_term_name }},{{ $vales->price }},{{$vales->id}},{{$data->attribute_name}}"
                                                                onclick="getData({{ $vales->id }},{{ $product->id }},{{ $key+1 }}); saveValue(this, '{{ $data->id }}','Panel','heading_Var{{$key}}',{{$vales->id}},'{{$data->attribute_name}}')">

                                                            <label class="form-check-label mx-2" for="var_radios{{$key}}_{{$keyss}}">
                                                                <div class="row select_var_row p-3 term-select-{{$vales->id}}">
                                                                    @if(@$vales->image)

                                                                        <div class="ps-section__thumbnail col-3">
                                                                            <img src="{{asset('root/public/uploads/'.$vales->image)}}" alt="" class="img-fluid">
                                                                        </div>
                                                                    @endif
                                                                    <div class="align-middle {{ @$vales->image ? 'col-9' : 'col-12' }}">
                                                                        <h3 class="attribute_title_name py-2 d-flex justify-content-between">
                                                                            {{ $vales->attribute_term_name }} <small class="attribute_price">{{ formatPrice($vales->price) }}</small>
                                                                        </h3>
                                                                        <p class="ps-desc">{{ $vales->attribute_term_description }}</p>
                                                                    </div>

                                                                </div>
                                                            </label>
                                                        </div>
                                                        @elseif($key == 1 && $data->attribute_type == 'inverter')
                                                       
                                                        <div class="form-check col-12 mb-4" id="test">
                                                        <input class="form-check-input" type="radio" name="var_radios{{$key}}" id="var_radios{{$key}}_{{$keyss}}" value="option{{$keyss}}" data-atr-price="{{ $vales->price }}" data-atr-name="{{ $vales->attribute_term_name }}" data-value="{{ $vales->attribute_term_name }},{{ $vales->price }},{{$vales->id}},{{$data->attribute_name}}"
                                                        onclick="saveValue(this, '{{ $data->id }}','','heading_Var{{$key}}',{{$vales->id}},'{{$data->attribute_name}}')">

                                                            <label class="form-check-label mx-2" for="var_radios{{$key}}_{{$keyss}}">
                                                                <div class="row select_var_row p-3 term-select-{{$vales->id}}">
                                                                     @if(@$vales->image)
                                                                        <div class="ps-section__thumbnail col-3">
                                                                            <img src="{{asset('root/public/uploads/'.$vales->image)}}" alt="" class="img-fluid">
                                                                        </div>
                                                                    @endif
                                                                    <div class="align-middle {{ @$vales->image ? 'col-9' : 'col-12' }}">
                                                                        <h3 class="attribute_title_name py-2 d-flex justify-content-between">
                                                                            {{ $vales->attribute_term_name }} <small class="attribute_price">{{ formatPrice($vales->price) }}</small>
                                                                        </h3>
                                                                        <p class="ps-desc">{{$vales->attribute_term_description}}</p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        @else
                                                        
                                                        <div class="form-check col-12 mb-4">
                                                            <input class="form-check-input" type="radio" name="var_radios{{$key}}" id="var_radios{{$key}}_{{$keyss}}" value="option{{$keyss}}" data-atr-price="{{ $vales->price }}" data-atr-name="{{ $vales->attribute_term_name }}"  data-value="{{ $vales->attribute_term_name }},{{ $vales->price }},{{$vales->id}},{{$data->attribute_name}}"
                                                            onclick="saveValue(this, '{{ $data->id }}','','heading_Var{{$key}}',{{$vales->id}},'{{$data->attribute_name}}')">
                                                            <label class="form-check-label mx-2" for="var_radios{{$key}}_{{$keyss}}">
                                                                <div class="row select_var_row p-3 term-select-{{$vales->id}}">
                                                                     @if(@$vales->image)
                                                                        <div class="ps-section__thumbnail col-3">
                                                                            <img src="{{asset('root/public/uploads/'.$vales->image)}}" alt="" class="img-fluid">
                                                                        </div>
                                                                    @endif
                                                                    <div class="align-middle {{ @$vales->image ? 'col-9' : 'col-12' }}">
                                                                       <h3 class="attribute_title_name py-2 d-flex justify-content-between">
                                                                            {{ $vales->attribute_term_name }} <small class="attribute_price">{{ formatPrice($vales->price) }}</small>
                                                                        </h3>
                                                                        <p class="ps-desc">{{$vales->attribute_term_description}}</p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>

                                                        @endif

                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>

                                        </div>


                                    @endforeach
                                 </div>
                            </div>
                            @endif

                            <div class="ps-product__quantity">
                                @if($product['type'] != 'variable')
                                <h6>Quantity</h6>
                                <div class="d-flex align-items-center">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus" id="minus-btn"><i class="icon-minus"></i></button>
                                        <input class="quantity" min="1" id="quantity" name="quantity" value="1" type="number" />
                                        <button class="plus" id="plus-btn"><i class="icon-plus"></i></button>

                                    </div>
                                     <script>
                                        // get the input element and the +/- buttons
                                        const input = document.getElementById("quantity");
                                        const plusBtn = document.getElementById("plus-btn");
                                        const minusBtn = document.getElementById("minus-btn");

                                        // add event listeners to the buttons
                                        plusBtn.addEventListener("click", function() {
                                            // increase the quantity value by 1
                                            input.value = parseInt(input.value) + 1;
                                        });

                                        minusBtn.addEventListener("click", function() {
                                            // decrease the quantity value by 1
                                            if (parseInt(input.value) > 1) {
                                                input.value = parseInt(input.value) - 1;
                                            }
                                        });
                                    </script>
                                                @endif
                                                   @php
                                                      $countAttribites = count($attributes);
                                                   @endphp
                                   <a class="ps-btn ps-btn--warning ml-3" onclick="checkSessionCount('{{ $product->id }}', '{{ $countAttribites }}')" href="javascript:void(0)">ADD TO CART</a>
                                </div>
                            </div>
                                <div class="well">
                                    <p>Estimate Shipping date {{ date('d-M-Y',strtotime(@$product->estimate_deliver_date) )}}</p>
                                </div>
                                <div class="align-items-center mt-5 mb-4">
                                    <label class="for-label">Lieferort auswählen</label>
                                    <select class="form-control" name="shipping_class" id="shipping_class">
                                        @php
                                            $result = shippingCountry()->where('shipping_id',$product->shipping_class)->where('status',1);
                                        @endphp

                                        @foreach ($result as $country)
                                            <option value="{{$country->country}}" > {{country()->where('id',$country->country)->pluck('country')->first()}} </option>
                                        @endforeach
                                    </select>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="ps-product__content">
                    <section class="pro_des panel p-5">
                        <div class="container">
                            <div class="ps-promo mt-5 ps-category--image mt-5">
                                <div class="col-12">
                                    {{--<h2 class="ps-section__title text-center pb-5">800 W / 600 W Balkonkraftwerk – Upgradebar 800W Photovoltaik Stecker Solaranlage</h2>--}}
                                </div>
                                <div class="row bg-gray rounded p-5 {{@$components ? '':'d-none'}}">
                                    <div class="row" id="short_des_html">
                                        @if(!empty($components))
                                            @foreach($components as $component)   
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="ps-block--about p-3">
                                                        <div class="ps-block__icon"><img decoding="async" src="{{asset('root/public/uploads/'.$component->image)}}"
                                                                class="img-fluid w-50" alt=""></div>
                                                        <h4 class="ps-block__title"><strong>{{$component->attribute_term_name}}</strong></h4>
                                                        <div class="ps-block__subtitle">
                                                            {{$component->attribute_term_description}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="container" id="html_component">
                   
                        @if(!empty($components))
                            @foreach($components as $component)
                                        
                                {!! $component->component_description !!}
                            @endforeach
                        @endif
                    </div>
            </div>
            <section class="ps-section--deals py-5">
                <div class="ps-section__header">
                    <h3 class="ps-section__title font-weight-400">Die besten Deals der Woche!</h3>
                </div>
                <div class="ps-section__carousel related_product_view">
                    <div class="owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                    data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="1" data-owl-item-sm="2"
                    data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">


                    <div class="owl-stage-outer shadow-sm">
                                    <div class="owl-stage" style="transform: translate3d(-1974px, 0px, 0px); transition: all 0s ease 0s; width: 7651px;">
                                    @foreach($products as $value)
                                    <div class="owl-item cloned" style="width: 246.8px;">
                                            <div class="ps-section__product">
                                                <div class="ps-product ps-product--standard">
                                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('product.detail',$value->slug)}}">
                                                            <figure>
                                                                <img src="{{asset('root/public/uploads/'.$value->thumb_image)}}" alt="alt">
                                                                <img src="{{asset('root/public/uploads/'.$value->thumb_image)}}" alt="alt">
                                                            </figure>
                                                        </a>

                                                        <div class="ps-product__badge">
                                                        </div>
                                                        <div class="ps-product__percent ps-badge ps-badge--hot">-61%</div>
                                                    </div>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__title"><a href="{{route('product.detail',$value->slug)}}">{{$value->product_name}}</a></p>
                                                        <div class="ps-product__meta"><span class="ps-product__price sale">{{$value->sale_price}}</span><span class="ps-product__del">{{$value->price}}</span>
                                                        </div>

                                                            @if($value->type !='variable')
                                                                 <div class="add_to_cart_box"><a class="btn cart_btn d-block" href="javascript:void(0)" onclick="add_to_cart('{{ $value->id }}')">Add to cart</a>
                                                                 </div>
                                                             @else
                                                                 <div class="add_to_cart_box">
                                                                     <a class="btn cart_btn d-block" href="{{route('product.detail',$value->slug)}}">View</a>
                                                                 </div>
                                                             @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                                <div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div>
                                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                                <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- kartik -->

<script>
    $(document).ready(function() {
        // Initialize Owl Carousel for the main image
        var mainCarousel = $('.main-image').owlCarousel({
            items: 1,
            nav: true,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000
        });

        // Initialize Owl Carousel for the gallery
        var galleryCarousel = $('.gallery').owlCarousel({
            nav: true,
            dots: false,
            responsive: {
                0: { items: 2 },
                576: { items: 3 },
                768: { items: 4 },
                992: { items: 4 },
                1200: { items: 4 }
            }
        });

        // Function to handle main image change on gallery click
        $('.gallery').on('click', '.item img', function() {
            var index = $(this).data('index');
            mainCarousel.trigger('to.owl.carousel', index);
        });
    });
</script>
<!-- kartik -->


<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,

    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>



<script>

function formatPrice(price) {
  var formattedPrice = parseFloat(price).toFixed(2);
  formattedPrice = formattedPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  return '€' + formattedPrice;
}

// PRice Formater


var isFirstIteration = true;
var savedValues;

if (sessionStorage.getItem('savedValues')) {
    savedValues = JSON.parse(sessionStorage.getItem('savedValues'));
    console.log(savedValues);
} else {
    savedValues = {};
}


function saveValue(element, attributeId, name = null,pids,term_id,attribute_name) {

 var id = parseInt(pids.split("heading_Var")[1]);
 var collapse_id = "collapse_var_"+id;

  $("#"+collapse_id).collapse('toggle');
   id++;
  
  $("#"+"collapse_var_"+id).addClass('show');
 
var atr_name = element.getAttribute('data-atr-name');
var atr_price = element.getAttribute('data-atr-price');
atr_price = formatPrice(atr_price);


$("#" + pids).find("small").remove();

if(atr_price!='€0.00'){
    $("#" + pids).append(`<small class="font-weight-bold">${atr_name}</small> <small class="mr-5 font-weight-bold pl-2" style="color: var(--green-color);">${atr_price}</small>`);
}


// console.log('col');
    // alert('ok');
var id = element.getAttribute('id');
var value = element.getAttribute('data-value');
//console.log(id,value);
var values = value.split(',');

// console.log(value);

var attributeTermName = values[0];
var attributeTermPrice = parseFloat(values[1]); // Parse price as a float
var attributeTermID = parseFloat(values[2]); // Parse price as a float
var attributeName = values[3];


var nameDiv = document.getElementById('nameDiv');
var priceDiv = document.getElementById('priceDiv');
var totalPriceDiv = document.getElementById('totalPrice');


if (name === 'Panel') {
 
    // Clear saved values when "panel" attribute is selected
    savedValues = {};
    $("#html_component").html(''); 
    // reset url
    let url = new URL(window.location.href);
 
   attribute_name = attribute_name.toLowerCase().split(" ").join("-");
    // Remove any existing occurrences of the parameter
    const params = new URLSearchParams(url.search);
    params.delete(attribute_name);

    // Add the new parameter
    params.append(attribute_name, term_id);

    // Update the search part of the URL with the updated parameters
    url.search = params.toString();

    // Use pushState to update the URL without reloading the page
    window.history.pushState({ path: url.pathname }, '', url.pathname);
 }

if (attributeId in savedValues) {
   
// Replace existing values
savedValues[attributeId].name = attributeTermName;
savedValues[attributeId].price = attributeTermPrice;
savedValues[attributeId].termid = attributeTermID;
savedValues[attributeId].attribute = attributeName;

} 
else {
    // Add new values
    savedValues[attributeId] = {
      name: attributeTermName,
      price: attributeTermPrice,
      termid:attributeTermID,
      attribute : attributeName
    };
}
sessionStorage.setItem('savedValues',JSON.stringify(savedValues));

var attributeIds = Object.keys(savedValues);

var count = attributeIds.length;

// Update nameDiv
var names = Object.values(savedValues).map(function(item) {
return item.name;
});
nameDiv.textContent = names.join(' + ');

var names = Object.values(savedValues).map(function(item) {
return item.name;
});
nameDiv.textContent = names.join(' + ');

var termIds = Object.values(savedValues).map(function(item) {
return item.termid;
});

var attributeName = Object.values(savedValues).map(function(item) {
return item.attribute;
});

// Update priceDiv
var prices = Object.values(savedValues).map(function(item) {
return item.price;
});
priceDiv.textContent = prices.reduce(function(sum, price) {
return sum + price;
}, 0).toFixed(2);

// Update totalPriceDiv
totalPriceDiv.textContent = '€' + priceDiv.textContent;

// Save values in session
var totalPrice = parseFloat(priceDiv.textContent);

var sessionData = {
product_id: {{ $product->id }},
prices : prices.join(','),
termIds: termIds.join(','),
names : names.join(','),
attribute : attributeName.join(',')

};

// Check if termsID is an array and add it to sessionData

let session = sessionStorage.setItem('sessionData', JSON.stringify(sessionData));

html_components(session);
// toggleAccordion(header)
}

function show_name(){
    $('.select_var_row').each(function(){
        $(this).click(function(){
            // console.log(this);
            let title = this.querySelector('.ps-section__title');
            let parent = this.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
            let child = parent.children[0];
            // console.log(parent);
            let span = child.querySelector('h3.ps-section__title small');
            // console.log(child);
            $(span).html($(title).html());
        })
    })
}

function getData(id,idpro,sid) {

// console.log(id,idpro);
// Send an AJAX request to the backend
$.ajax({
    url: '{{ route("product.attributeTerms") }}',
    method: 'GET',
    data: { id: id, productid:idpro }, // Pass the ID as a parameter
    success: function(response) {
    var users = response.related_terms;
    var tableBody = $('#test');
    tableBody.empty();

    for (var i = 0; i < users.length; i++) {
        var user = users[i];
        let imageUrl = "{{ asset('root/public/uploads/') }}/" + user.image;

        tableBody.append(`
            <div class="row select_var_row mx-0 p-2 term-select-${id}}" onclick="highlightDiv(this);saveValue(this, '${user.attribute_id}','','heading_Var${sid}',${id},'${user.attribute__name}');" data-atr-name="${user.attribute_term_name}" data-atr-price="${user.price}" data-value="${user.attribute_term_name},${user.price},${user.id},${response.arribute_name}">
                ${user.image !== null ? `<div class="ps-section__thumbnail col-3">
                    <img src="${imageUrl}" alt="" width="100px">
                </div>` : ""}
                <div class="col-9">
                    <div class="mb-3">
                        <h3 class="attribute_title_name py-2">
                            ${user.attribute_term_name}
                            </h3>
                        <p class="ps-desc">${user.attribute_term_description}</p>
                    </div>
                </div>
            </div>`
        );

        show_name();
}

    },
    error: function(error) {
        console.log(error);
    }
});
}

function highlightDiv(element) {
    element.style.border = '2px solid #075095';
}


   function add_to_cart(id) {
    var product_details = sessionStorage.getItem('sessionData');
    var shippingClassSelect = document.getElementById('shipping_class');
    var shippingCountry = shippingClassSelect.value;
    // console.log(shippingCountry);

        var qty = $("#quantity").val();
        $.ajax({
            type: 'post',
            url: '{{ url('/add-to-cart') }}',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "product_details":product_details,
                "quantity": qty,
                "shipping_country" : shippingCountry,
            },
            success: function(response) {

                response = JSON.parse(response);
                
                if (response.status == true) {
                    
                    $(".my_cart_count").text(response.data);
                    toastr.success(response.message);
                } else {
                    
                    toastr.warning(response.message);
                }
            }
        });

    }
</script>

<script>



function toggleAccordion(header) {
// Get the parent accordion element
var accordion = header.parentNode;

// Close all other accordions
var accordions = document.getElementsByClassName('accordion');
for (var i = 0; i < accordions.length; i++) {
if (accordions[i] !== accordion) {
  accordions[i].classList.remove('active');
}
}

// Toggle the active class on the clicked accordion
accordion.classList.toggle('active');
}
</script>
<script>
function checkSessionCount(productId, countAttributes) {
        var nameDiv = document.getElementById('nameDiv');
        var values = nameDiv.innerHTML;
        var plusCount = 0;
            
            for (var i = 0; i < values.length; i++) {
                if (values[i] === '+') {
                    plusCount++;
                }
            }
      var sessionData = sessionStorage.getItem('sessionData');
            // console.log(sessionData);
        if (plusCount+1 < countAttributes) {
            // console.log(countAttributes);
          toastr.error("Please select all attribute combinations!!");
        } else {
            add_to_cart(productId);
        }

    }


    // get attribute term html
    function html_components(session){
        
        const data = sessionStorage.getItem('sessionData');
        let {termIds,prices,attribute} = JSON.parse(data);
        const url = new URL(window.location.href);

        // Create an empty URLSearchParams object
        const emptySearchParams = new URLSearchParams();

        // Update the search params of the URL with the empty URLSearchParams
        url.search = emptySearchParams.toString();

        // Update the URL in the browser's history without reloading the page
        window.history.pushState({ path: url.pathname }, '', url.pathname);

        attribute = attribute.split(",");
        termIds = termIds.split(",");
        
        termIds.map((item,index)=>{
            
           let attr_name =  attribute[index].toLowerCase().split(" ").join("-");
        //   console.log(term_name);
            // Remove any existing occurrences of the parameter
            const params = new URLSearchParams(url.search);
            // params.delete(attr_name);
           
            // Add the new parameter
           
            params.append(attr_name, item);

            // Update the search part of the URL with the updated parameters
            url.search = params.toString();
           
            // Use pushState to update the URL without reloading the page
            window.history.pushState({ path: url.href }, '', url.href);
        });
     
        let ids = termIds;
        let short_des_div = document.querySelector("#short_des_html");
        let htmlComponentDiv = $("#html_component");
        $.ajax({
            type: 'get',
            url: '{{ url('/term-html') }}',
            data: {
                "_token": "{{ csrf_token() }}",
                "ids": ids,
            },
            success : function(response){
                $(".bg-gray").removeClass("d-none");
                // console.log(response);
                let short_des_html = '';
                let htmlComponent = '';
                response.map((item, index) => {
                    // Generate the HTML for each response item
                    let short_des = `
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="ps-block--about p-3">
                            <div class="ps-block__icon"><img decoding="async" src="{{ asset('root/public/uploads') }}/${item.image}" class="img-fluid w-50" alt=""></div>
                            <h4 class="ps-block__title"><strong>${item.attribute_term_name}</strong></h4>
                            <div class="ps-block__subtitle">
                                ${item.attribute_term_description}
                            </div>
                        </div>
                    </div>`;
                    
                    if(item.price!=0){
                        short_des_html += short_des;
                    }
                    htmlComponent += item.component_description;
                });
                // console.log(short_des_html);
                $(short_des_div).html(short_des_html);
                $(htmlComponentDiv).html(htmlComponent);
            },
            error : function(err){
                console.log(err);
            }
        })
    }


    // opend components code

    $(document).ready(function(){
        const url = window.location.href;
        const search = new URL(window.location.href);
        if(search.search){
            $("#totalPrice").css('display',"none");
            let paramString = url.split('?')[1];
            paramString = paramString.split("&");
            let firstQueryId = paramString[0].split("=")[1];
            // console.log(firstQueryId);
            // let queryString = new URLSearchParams(paramString);
            if(sessionStorage.getItem('sessionData')){
                const data = sessionStorage.getItem('sessionData')
      
                const {termIds,prices,names} = JSON.parse(data);
            
                let terms =  termIds.split(",");
                let price = prices.split(",");
                let name = names.split(",");
                terms.map((item,index)=>{

                    $(".term-select-"+item).css("border-color","var(--blue-color)");
                    let el = $(".term-select-"+item);
                    el = el[0].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
                    let card_header_inner = el.querySelector(".card_header_inner");
                    // console.log(card_header_inner);
                    const ps = card_header_inner.parentElement;
                    if(price[index]!=0){
                        $(ps).append(`<small class="font-weight-bold">${name[index]} </small> <small class="ml-3 font-weight-bold" style="color:var(--green-color);">${formatPrice(price[index])}</small>`)
                    }
                    
                   
                })
            }
            
            
        }
       
    })

    // update after page load attribute set name
    $(document).ready(function(){
        var nameDiv = document.getElementById('nameDiv');
        if(sessionStorage.getItem('sessionData')){
            var sessionData = sessionStorage.getItem('sessionData');
            let {names} = JSON.parse(sessionData);
            names = names.split(",").join(' + ');
            nameDiv.textContent = names;
        }else{
            $("#html_component").html(''); 
             $(".bg-gray").addClass("d-none");
            // reset url
            let url = new URL(window.location.href);
            window.history.pushState({ path: url.pathname }, '', url.pathname);
        }
        
    });

</script>

@endsection
