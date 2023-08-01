@extends('../Layout.Layout')

@section("content")
<style>
    .ps-product--detail .ps-product__price {
        font-size: 18px;
        font-weight: 700;
    }

    .ps-product__variations_sec .accordion .card{
        background-color: white;
        color: var(--blue-color);
        font-weight: 600;
        padding: 3px 18px;
        border-radius: 10px !important;
        border: 1px solid #f0f2f5;
        margin-bottom: 10px;
    }
    .ps-product__variations_sec .accordion .card-header{
        background-color: transparent;
        border: none;
    }

    .ps-product__variations_sec .select_var_row {
        background: transparent!important;
        border: 2px solid #e1e1e1;
    }

    .ps-product__variations_sec .accordion .card:not(:first-of-type):not(:last-of-type) {
        border-radius: 10px !important;
        border: 1px solid #f0f2f5;
    }
    .ps-section__content h3.ps-section__title {
        margin-bottom: 0px;
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
        border: 2px solid #075095 !important;
        border-radius: 15px;
    }

    .ps-product__variations_sec .select_var_row {
        border-radius: 15px;
    }

    .ps-desc{
         border-radius: 15px;
     }

    .ps-product__variations_sec input[type=radio] {
        display: none;
    }

    /* Stuff after this is only to make things more pretty */
    .ps-product__variations_sec input[type=radio]+label>figure>img {
        transition: 500ms all;
    }
    .ps-product--detail .ps-product__title {
        font-size: 22px !important;
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
        font-family:sans-serif
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



<div class="ps-page--product4 mt-5">
    <div class="container">
        <!--<ul class="ps-breadcrumb">-->
        <!--    <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>-->
        <!--    <li class="ps-breadcrumb__item"><a href="category-grid-dark.html">Higiene</a></li>-->
        <!--    <li class="ps-breadcrumb__item active" aria-current="page">Face masks</li>-->
        <!--</ul>-->
        <div class="ps-page__content">
            <div class="ps-product--detail ps-product--full">
                <div class="row">
                    <div class="col-12 col-xl-5 col-lg-5 col-md-6">

                        <!-- Kartik -->
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
                    <div class="col-12 col-xl-7 col-lg-7 col-md-6">
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

                            <div class="ps-product__variations_sec">
                                 <div class="accordion" id="accordionExample">

                                    @foreach ($attributes as $key => $data)

                                        <div class="card py-3">
                                            <div class="card-header p-0" id="heading_Var{{$key}}" data-toggle="collapse" data-target="#collapse_var_{{$key}}" aria-expanded="true" aria-controls="collapse_var_{{$key}}">
                                                    <div class="card_header_inner pr-5" style="display:inline-block">
                                                            <a href="javascript:void(0)">
                                                                <h3 class="ps-section__title">{{$data->attribute_name}}
                                                                </h3>
                                                            </a>
                                                        </div>
                                                <span class="float-right text-secondary fs-4">Change</span>
                                            </div>

                                            <div id="collapse_var_{{$key}}" class="collapse{{$key == 0 ? ' show' : ''}}" aria-labelledby="heading_Var{{$key}}" data-parent="#accordionExample">
                                                <div class="card-body">
                                                     <p class="ps-checkout__checkbox row p-4 ps-desc bg-light">{{$data->attribute_description}}</p>
                                                    <div class="ps-checkout__checkbox row p-3">
                                                        @foreach ($data->attributeTerms as $keyss => $vales)

                                                        @if ($key == 0 && $data->attribute_type == 'panel')
                                                        <div class="form-check col-12 mb-3">
                                                            <input class="form-check-input"
                                                                type="radio"
                                                                name="var_radios{{$key}}"
                                                                id="var_radios{{$key}}_{{$keyss}}"
                                                                value="option{{$keyss}}"
                                                                data-atr-name="{{ $vales->attribute_term_name }}"
                                                                data-atr-price="{{ $vales->price }}"
                                                                data-value="{{ $vales->attribute_term_name }},{{ $vales->price }},{{$vales->id}}"
                                                                onclick="getData({{ $vales->id }},{{ $product->id }},{{ $key+1 }}); saveValue(this, '{{ $data->id }}','Panel','heading_Var{{$key}}',{{$vales->id}})">

                                                            <label class="form-check-label mx-2" for="var_radios{{$key}}_{{$keyss}}">
                                                                <div class="row select_var_row p-3">
                                                                    @if(@$vales->image)

                                                                        <div class="ps-section__thumbnail col-3">
                                                                            <img src="{{asset('root/public/uploads/'.$vales->image)}}" alt="" width="100px">
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-9 align-middle">
                                                                        <h3 class="ps-section__title py-2">{{$vales->attribute_term_name}}</h3>
                                                                        <p class="ps-desc">{{$vales->attribute_term_description}}</p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        @elseif($key == 1 && $data->attribute_type == 'inverter')
                                                        <div class="form-check p-0 col-12 mb-3" id="test">

                                                        </div>
                                                        @else
                                                        <div class="form-check col-12 mb-3">
                                                            <input class="form-check-input" type="radio" name="var_radios{{$key}}" id="var_radios{{$key}}_{{$keyss}}" value="option{{$keyss}}" data-atr-price="{{ $vales->price }}" data-atr-name="{{ $vales->attribute_term_name }}"  data-value="{{ $vales->attribute_term_name }},{{ $vales->price }},{{$vales->id}}"
                                                            onclick="saveValue(this, '{{ $data->id }}','','heading_Var{{$key}}',{{$vales->id}})">
                                                            <label class="form-check-label mx-2" for="var_radios{{$key}}_{{$keyss}}">
                                                                <div class="row select_var_row p-3">
                                                                     @if(@$vales->image)
                                                                        <div class="ps-section__thumbnail col-3">
                                                                            <img src="{{asset('root/public/uploads/'.$vales->image)}}" alt="" width="100px">
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-9 align-middle">
                                                                        <h3 class="ps-section__title py-2">{{$vales->attribute_term_name}}</h3>
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

                                            <a class="ps-btn ps-btn--warning ml-3"
                                                    onclick="checkSessionCount('{{ $product->id }}', '{{ $countAttribites }}')"
                                                    href="javascript:void(0)">ADD TO CART</a>
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
                    {{-- <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a></li>
                        <!--<li class="nav-item" role="presentation"><a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification-content" role="tab" aria-controls="specification-content" aria-selected="false">Specification</a></li>-->
                        <!--<li class="nav-item" role="presentation"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews (5)</a></li>-->
                    </ul>
                    <div class="tab-content" id="productContent">
                        <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                            <p class="ps-desc"></p>
                            @php echo $product->product_description  @endphp
                        </div>
                        <div class="tab-pane fade" id="specification-content" role="tabpanel" aria-labelledby="specification-tab">
                            <table class="table ps-table ps-table--oriented">
                                <tbody>
                                    <tr>
                                        <th class="ps-table__th">Higher memory bandwidth</th>
                                        <td>1,544 MHz</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-table__th">Higher pixel rate</th>
                                        <td>74.1 GPixel/s</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="ps-form--review">
                                <div class="ps-form__title">Write a review</div>
                                <div class="ps-form__desc">Your email address will not be published. Required fields are marked *</div>
                                <form action="do_action" method="post">
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <label class="ps-form__label">Your rating *</label>
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating--form" data-value="0" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select><div class="br-widget"><a href="#" data-rating-value="1" data-rating-text="1"></a><a href="#" data-rating-value="2" data-rating-text="2"></a><a href="#" data-rating-value="3" data-rating-text="3"></a><a href="#" data-rating-value="4" data-rating-text="4"></a><a href="#" data-rating-value="5" data-rating-text="5"></a><div class="br-current-rating"></div></div></div>
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <label class="ps-form__label">Name *</label>
                                            <input class="form-control ps-form__input">
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <label class="ps-form__label">Email *</label>
                                            <input class="form-control ps-form__input">
                                        </div>
                                        <div class="col-12">
                                            <div class="ps-form__block">
                                                <label class="ps-form__label">Your review *</label>
                                                <textarea class="form-control ps-form__textarea"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn ps-btn ps-btn--warning">Add Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="ps-product__tabreview">
                                <div class="ps-review--product">
                                    <div class="ps-review__row">
                                        <div class="ps-review__avatar"><img src="img/avatar-review.jpg" alt="alt"></div>
                                        <div class="ps-review__info">
                                            <div class="ps-review__name">Mark J.</div>
                                            <div class="ps-review__date">Oct 30, 2021</div>
                                        </div>
                                        <div class="ps-review__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars">
                                        <div class="ps-review__desc">
                                            <p>Everything is perfect. I would recommend!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="container" id="html_component">
                        {{-- <div class="ps-promo mt-5 ps-category--image mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="ps-section__title text-center pb-5">Beliebte Kategorien</h2>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12 mb-2">
                                    <div class="ps-promo__item">
                                        <a class="ps-category__image ps-promo__banner"
                                        href="https://custom.stegpearl.in/shop/solar-komplettsysteme-2">
                                        <img class="img-fluid"
                                            src="https://custom.stegpearl.in/root/public/uploads/category/1688643950.jpg" alt="1688643950.jpg">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12 mb-2">
                                    <div class="ps-desc">
                                        <h3 class="ps-section__title">Erleben Sie die Sonnenkraft auf innovative Art mit dem Balkonkraftwerk der Zukunft!</h3>
                                        <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="ps-block--about p-3">
                                                <div class="ps-block__icon"><img decoding="async" width="200" height="200" src="https://i0.wp.com/epp.solar/wp-content/uploads/2023/07/Best-Quatlity.png?fit=200%2C200&amp;ssl=1" class="img-fluid" alt=""></div>
                                                <h4 class="ps-block__title">Beste Qualität                  </h4>
                                                <div class="ps-block__subtitle">Vertrauen Sie auf unschlagbare Leistung und Langlebigkeit, denn wir garantieren höchste Produktqualität und erstklassige Materialien.

                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                            <div class="ps-block--about p-3">
                                                <div class="ps-block__icon"><img decoding="async" width="256" height="256" src="https://i0.wp.com/epp.solar/wp-content/uploads/2023/07/Hot-Spot-free.png?fit=256%2C256&amp;ssl=1" class="img-fluid" alt=""></div>
                                                <h4 class="ps-block__title">Hotspot frei:</h4>
                                                <div class="ps-block__subtitle">Erleben Sie unterbrechungsfreie Solarenergie dank klarer und stabiler Verbindungen, sodass Sie stets volle Kraft aus der Sonne schöpfen können.


                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                            <div class="ps-block--about p-3">
                                                <div class="ps-block__icon"><img decoding="async" width="256" height="256" src="https://i0.wp.com/epp.solar/wp-content/uploads/2023/07/25-year-guarantee.png?fit=256%2C256&amp;ssl=1" class="img-fluid" alt=""></div>
                                                <h4 class="ps-block__title">Plug & Play                  </h4>
                                                <div class="ps-block__subtitle">Genießen Sie ein müheloses Installationsvergnügen und erleben Sie nahtlosen Solarbetrieb - ohne aufwendiges Setup!


                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                            <div class="ps-block--about p-3">
                                                <div class="ps-block__icon"><img decoding="async" width="256" height="256" src="https://i0.wp.com/epp.solar/wp-content/uploads/2023/07/Beste-Qualitat.png?fit=256%2C256&amp;ssl=1" class="img-fluid" alt=""></div>
                                                <h4 class="ps-block__title">PERC Technologie</h4>
                                                <div class="ps-block__subtitle">Setzen Sie auf innovative, optimierte Zelltechnologie und maximieren Sie so Ihre Energieproduktion - für eine umweltfreundliche Zukunft mit vollem Potenzial.

                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                        </div> --}}

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
var savedValues = {};

function saveValue(element, attributeId, name = null,pids,term_id) {

var atr_name = element.getAttribute('data-atr-name');
var atr_price = element.getAttribute('data-atr-price');
atr_price = formatPrice(atr_price);


$("#" + pids).find("small").remove();
$("#" + pids).append(`<small>${atr_name}</small> <small class="text-danger mr-5 font-weight-bold pl-2">${atr_price}</small>`);

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


var nameDiv = document.getElementById('nameDiv');
var priceDiv = document.getElementById('priceDiv');
var totalPriceDiv = document.getElementById('totalPrice');


if (name === 'Panel') {
savedValues = {}; // Clear saved values when "panel" attribute is selected
}

if (attributeId in savedValues) {
// Replace existing values
savedValues[attributeId].name = attributeTermName;
savedValues[attributeId].price = attributeTermPrice;
savedValues[attributeId].price = attributeTermPrice;
savedValues[attributeId].termid = attributeTermID;


} else {
// Add new values
savedValues[attributeId] = {
  name: attributeTermName,
  price: attributeTermPrice,
  termid:attributeTermID

};
}

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

termIds: termIds.join(','),

};

// Check if termsID is an array and add it to sessionData

sessionStorage.setItem('sessionData', JSON.stringify(sessionData));
html_components(term_id);
// toggleAccordion(header)
}

function show_name(){
    $('.select_var_row').each(function(){
        $(this).click(function(){
            console.log(this);
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
        console.log(response)
    var users = response;
    var tableBody = $('#test');
    tableBody.empty();

    for (var i = 0; i < users.length; i++) {
        var user = users[i];
        let imageUrl = "{{ asset('root/public/uploads/') }}/" + user.image;

        tableBody.append(`
            <div class="row select_var_row mx-0 p-2" onclick="highlightDiv(this);saveValue(this, '${user.attribute_id}','','heading_Var${sid}',${id});" data-atr-name="${user.attribute_term_name}" data-atr-price="${user.price}" data-value="${user.attribute_term_name},${user.price},${user.id}">
                ${user.image !== null ? `<div class="ps-section__thumbnail col-3">
                    <img src="${imageUrl}" alt="" width="100px">
                </div>` : ""}
                <div class="col-9">
                    <div class="mb-3">
                        <h3 class="ps-section__title py-2">
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
    error: function(xhr, status, error) {

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
                    console.log(response);
                    $(".my_cart_count").text(response.data);
                    toastr.success(response.message);
                } else {
                    console.log(response);
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

        if (plusCount+1 < countAttributes) {
          toastr.error("Please select all attribute combinations!!");
        } else {
            add_to_cart(productId);
        }

    }


    // get attribute term html
    function html_components(id){
        let htmlComponent = $("#html_component");
        let url = window.location.href;
        const separator = .includes('?') ? '&' : '?';
      // Append the key-value pair to the URL
        let  url = url + separator + encodeURIComponent('id') + '=' + encodeURIComponent(id);
        console.log(url);
        return false;
        $.ajax({
            type: 'get',
            url: '{{ url('/term-html') }}',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
            },
            success : function(response){
                console.log(response);
                const {data} = response;
                $(htmlComponent).append(response.component_description)
            },
            error : function(err){
                console.log(err);
            }
        })
    }


</script>


@endsection
