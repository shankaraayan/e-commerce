@extends('../Layout.Layout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="shortcut icon" href="https://ayushkitchen.com/img/main/favicon.png" />

        <title>Single Product Page - Custom Web</title>
        <meta name="description" content="EPP Solar" />
        <meta name="twitter:card" content="summary_large_image" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ URL::asset('css/product-detail.css') }}">
        <!-- Demo styles -->
        <style>
            /* Header */
            @import url(http://fonts.googleapis.com/css?family=Roboto:400,300,300itaâ€Œâ€‹lic,400italic,500,500italic,700,700italic,900italic,900);
        </style>
        <script>
            $(function() {
                var rk_header = $(".web_mainmenu");
                var rk_topheader = $(".top-header");

                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();
                    if (scroll >= 50) {
                        rk_topheader.addClass("d-none");
                        rk_header.addClass("sticky_css");
                    } else {
                        rk_topheader.removeClass("d-none");
                        rk_header.removeClass("sticky_css");
                    }
                });
            });
        </script>
    </head>
    @php
        $productid = request()->route('id');
    @endphp

    <body class="bg-white">
        <div id="layoutDefault">
            <div id="layoutDefault_content">
                <main class="mt-3">
                    <section class="breadcrumb bg-light py-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <p class="breadcrumb_links text-muted fw-light mb-0">
                                        <small>
                                            <a href="#" class="text-primary">
                                                <i class="fa fa-home me-1"></i>
                                                <span> Home </span>
                                            </a>
                                            <span class="text-muted-2 px-2">
                                                <i class="fa fa-angle-right"></i>
                                            </span> <a href="#" class="text-primary">
                                                <span> Shop </span>
                                            </a>
                                            <span class="text-muted-2 px-2">
                                                <i class="fa fa-angle-right"></i>
                                            </span> <a href="#" class="text-muted">
                                                <span> Shop page </span>
                                            </a>
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div id="product_description" class="container pt-2 pb-3">
                        <div class="row">
                            <div class="col-lg-6 mb-3" id="product-gallery">
                                <!-- Swiper -->
                                <div class="swiper_slider_container">
                                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                        class="swiper mySwiper2">
                                        <div class="swiper-wrapper">
                                            @foreach ($product->images as $image)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('root/public/uploads/' . $image->images) }}" />
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <div thumbsSlider="" class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($product->images as $image)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('root/public/uploads/' . $image->images) }}" />
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6" id="pt_1">
                                <div class="product_short_des_sec bg-light rounded p-3">
                                    <div class="product_usps">
                                        <p class="fs-6 mb-2 text-primary">
                                            Balkonkraftwerk
                                        </p>
                                        <h1 class="product_title fs-3 mb-3">{{ $product->product_name }}
                                        </h1>
                                        <h6 class="fw-bold fs-4 mb-3 text-secondary">
                                            Leistung
                                        </h6>
                                    </div>
                                    <div class="product_price fs-3 mb-3">
                                        <div class="product_price">
                                            <p class="fw-bold fs-5 mb-2 text-primary">
                                                Ihr Nettopreis (inkl. 0% MwSt)
                                            </p>
                                            <small class='text-muted'><s>€{{ formatPrice($product->price) }}</s></small>
                                            €<span id="totalPrice">{{ formatPrice($product->sale_price) }}</span>
                                        </div>
                                    </div>
                                    <div id="nameDiv"></div>
                                    <div id="priceDiv" style="display: none;"></div>
                                    @php
                                        $printed = false;
                                    @endphp
                                    @foreach ($attributes as $key => $data)
                                        <div class="accordion">
                                            <div class="accordion-header" onclick="toggleAccordion(this)">
                                                {{ $data->attribute_name }} </div>
                                            @foreach ($data->attributeTerms as $keyss => $vales)
                                                <div class="accordion-content">
                                                    @if ($key == 0 && $data->attribute_type == 'panel')
                                                        <div class="accordion-body">
                                                            <div class="bg-light rounded product_short_dec mb-3 p-3 border border-success"
                                                                style="border: 2px solid;"
                                                                data-value="{{ $vales->attribute_term_name }},{{ $vales->price }}"
                                                                onclick="getData({{ $vales->id }},{{ $product->id }});clickHighlight(this); saveValue(this, '{{ $data->id }}','Panel');">
                                                                <div class="mb-3">
                                                                    <h4>{{ $vales->attribute_term_name }}</h4>
                                                                    <p>{{ $vales->attribute_term_description }}.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($key == 1 && $data->attribute_type == 'inverter')
                                                        <div class="accordion-body" id="test">
                                                            @if (!$printed)
                                                                <center>
                                                                    <p><b>Please Select Panel</b></p>
                                                                </center>
                                                                @php
                                                                    $printed = true;
                                                                @endphp
                                                            @endif
                                                        </div>
                                                    @elseif($key == 2 && $data->attribute_type == 'cable')
                                                        <div class="accordion-body">
                                                            <div class="bg-light rounded product_short_dec mb-3 p-3 border border-success"
                                                                style="border: 2px solid;"
                                                                data-value="{{ $vales->attribute_term_name }},{{ $vales->price }}"
                                                                onclick="clickHighlight(this);saveValue(this, '{{ $data->id }}');">
                                                                <div class="mb-3">
                                                                    <h4>{{ $vales->attribute_term_name }}</h4>
                                                                    <p>{{ $vales->attribute_term_description }}.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="accordion-body">
                                                            <div class="bg-light rounded product_short_dec mb-3 p-3 border border-success"
                                                                style="border: 2px solid;"
                                                                data-value="{{ $vales->attribute_term_name }},{{ $vales->price }}"
                                                                onclick="clickHighlight(this);saveValue(this, '{{ $data->id }}');">
                                                                <div class="mb-3">
                                                                    <h4>{{ $vales->attribute_term_name }}</h4>
                                                                    <p>{{ $vales->attribute_term_description }}.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <!--old code-->
                                    {{-- @foreach ($attributes as $key => $data)
                                <div class="select_variation">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item mb-3">
                                            <h2 class="accordion-header rounded" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button"  data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$key}}" aria-expanded="false" aria-controls="flush-collapseOne{{$key}}">
                                                    {{$data->attribute_name}} <div id="data" style="    padding-left: 42px;
                                                                                margin-top: 15px;
                                                                                color: black;"></div>
                                                </button>
                                            </h2>

                                            @foreach ($data->attributeTerms as $keyss => $vales)


                                            <div id="flush-collapseOne{{$key}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
                                                @if ($key == 0 && $data->attribute_type == 'panel')
                                                <div class="accordion-body">
                                                    <div class="bg-light rounded product_short_dec mb-3 p-3 border border-success"  data-value="{{$vales->attribute_term_name}}" onclick="getData({{$vales->id}},{{$product->id}},(this));clickHighlight(this);">
                                                        <div class="mb-3">
                                                            <h4>{{$vales->attribute_term_name}}</h4>
                                                            <p>{{$vales->attribute_term_description}}.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @elseif($key==1 && $data->attribute_type =='inverter')
                                                <div class="accordion-body" id="test">
                                             
                                                </div>
                                                @elseif($key==2 && $data->attribute_type =='cable')
                                                   <div class="accordion-body">
                                                    <div class="bg-light rounded product_short_dec mb-3 p-3">
                                                        <div class="mb-3">
                                                            <h4>{{$vales->attribute_term_name}}</h4>
                                                            <p>{{$vales->attribute_term_description}}.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            @endforeach

                                        </div>


                                    </div>
                                </div>
                                @endforeach --}}
                                    <!--old code end-->

                                    <div class="item_selector">
                                        <div class="item_quantity mb-3">
                                            <div class="col-md-4">
                                                <div class="item_quan_wrpr d-flex align-items-center mb-3">
                                                    <span class="titleFinish">Quantity: </span>
                                                    <div>&nbsp;</div>
                                                    <div class="qty-box input-group">
                                                        <input type="hidden" value="1" id="hidden">
                                                        <input type="button" value="-"
                                                            class="form-input input-group-text btn_primary px-3 rounded-start"
                                                            field="quantity" id="minus-btn">
                                                        <input type="text" readonly="" id="quantity" name="quantity"
                                                             value="1"
                                                            class="form-control form-input bg-white text-center"
                                                            id="quantity-input" maxlength="">
                                                        <input type="button" value="+"
                                                            class="form-input input-group-text btn_primary px-3"
                                                            id="plus-btn" field="quantity">
                                                    </div>

                                                    <script>
                                                        // get the input element and the +/- buttons
                                                        const input = document.getElementById("quantity-input");
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart_btn row mb-3">
                                            <div class="col-6">
                                                <a class="btn btn_outline_primary d-block p-2"
                                                    onclick="add_to_cart('{{ $product->id }}')"
                                                    href="javascript:void(0)">ADD TO CART</a>
                                            </div>
                                            <div class="col-6">
                                                <a class="btn btn_primary d-block p-2" href="#">BUY NOW</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shipping">
                                        <div class="shipping_alert">
                                            <div class="bg-dark rounded product_short_dec mb-3 p-3">
                                                <p class="text-light">Folgende Versandarten stehen für Ihre Adresse zur
                                                    Verfügung</p>
                                                <p class="text-light fs-6 mb-0">Versandkosten: <strong
                                                        class="text-primary">€19,00</strong>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="shipping_zone_selector">
                                            <button class="btn btn_secondary mb-1" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#shipping_selector"
                                                aria-expanded="false" aria-controls="shipping_selector">
                                                Shipping
                                            </button>
                                            <div class="collapse" id="shipping_selector">
                                                <div class="card card-body">
                                                    <div class="shipping_selector">
                                                        <form>
                                                            <select class="form-select mb-3" aria-label="Default select">
                                                                <option selected>Select Country</option>
                                                                <option value="1">Germany</option>
                                                                <option value="2">Austria</option>
                                                            </select>
                                                            <button type="button"
                                                                class="btn btn_secondary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-group shipping-payment-terms mb-3 mt-1">
                                            <li class="list-group-item border p-2"><i
                                                    class="fa fa-truck text-primary border p-2 me-2"></i>
                                                Estimated delivery date May
                                                15, 2023</li>
                                        </ul>
                                    </div>
                                    <div class="wishlist">
                                        <ul class="list-group list-group-flush shipping-payment-terms mb-3">
                                            <li class="list-group-item bg-light"><a href="#" class="text-muted"><i
                                                        class="fa fa-heart text-primary me-2"></i> Add to
                                                    wishlist </a></li>
                                        </ul>
                                    </div>
                                    <div class="product_cats mb-3">
                                        <p class="fs-6 mb-3 text-muted">
                                            <strong>Artikelnummer:</strong> EPP-BLK-1000-EPP-800-STKR-10
                                        </p>
                                        <p class="fs-6 mb-1 text-muted">
                                            <strong>Kategorien: </strong>
                                            <a class="text-decoration-none text-secondary"
                                                href="javascript:;">{{ $product->categories }}
                                            </a>
                                        </p>
                                    </div>
                                    <div class="social_media d-flex align-items-center">
                                        <p class="text-decoration-none text-muted mb-0">
                                            Share:
                                        </p>
                                        <ul class="nav list-group-horizontal">
                                            <li class="nav-item p-2">
                                                <a href="#"><i
                                                        class="fa-brands fa fa-facebook text-primary"></i></a>
                                            </li>
                                            <li class="nav-item p-2">
                                                <a href="#"><i
                                                        class="fa-brands fa fa-instagram text-primary"></i></a>
                                            </li>
                                            <li class="nav-item p-2">
                                                <a href="#"><i class="fa-brands fa fa-twitter text-primary"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="product_description my-5">
                        <div class="container">
                            <h2 class="main_head text-center">Solarmodule der neusten Generation</h2>
                            <div class="row py-lg-5">
                                <div class="col-md-6">
                                    <figure class="figure">
                                        <img src="https://stegback.com/root/storage/uploads/01683789639-risensolarmodulemitangaben1768x643.webp"
                                            class="figure-img img-fluid rounded" alt="...">
                                        <figcaption class="figure-caption"></figcaption>
                                    </figure>
                                </div>
                                <div class="col-md-6">
                                    <div class="right_des">
                                        <h4>Risen PERC-Technik mit 21,3% Wirkungsgrad</h4>
                                        <p class="lead">Unsere Solarmodule der neusten Generation erreichen mit Ihrer
                                            monokristallinen Zellstruktur auch bei diffusen Tageslicht eine hohe Leistung.
                                            Die Hochleistungsmodule sind vollflächig schwarz und haben einen schwarzen
                                            Rahmen. Jedes Solarmodul erzeugt 410 Watt Spitzenleistung.</p>

                                        <div class="row py-3">
                                            <div class="col-md-6">
                                                <div class="right_des">
                                                    <h5>Risen PERC-Technik mit 21,3% Wirkungsgrad</h5>
                                                    <p>Unsere Solarmodule der neusten Generation erreichen mit
                                                        Ihrermonokristallinen Zellstruktur auch bei diffusen Tageslicht eine
                                                        hohe
                                                        Leistung.</p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="right_des">
                                                    <h5>Risen PERC-Technik mit 21,3% Wirkungsgrad</h5>
                                                    <p>Unsere Solarmodule der neusten Generation erreichen mit
                                                        Ihrer monokristallinen Zellstruktur auch bei diffusen Tageslicht
                                                        eine hohe
                                                        Leistung.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <p id="demo"></p>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.css">
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/default-skin/default-skin.css">
                    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="pswp__bg"></div>
                        <div class="pswp__scroll-wrap">
                            <div class="pswp__container">
                                <div class="pswp__item"></div>
                                <div class="pswp__item"></div>
                                <div class="pswp__item"></div>
                            </div>
                            <div class="pswp__ui pswp__ui--hidden">
                                <div class="pswp__top-bar">
                                    <div class="pswp__counter"></div>
                                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                    <button class="pswp__button pswp__button--share" title="Share"></button>
                                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                    <div class="pswp__preloader">
                                        <div class="pswp__preloader__icn">
                                            <div class="pswp__preloader__cut">
                                                <div class="pswp__preloader__donut"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                    <div class="pswp__share-tooltip"></div>
                                </div>
                                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                </button>
                                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                </button>
                                <div class="pswp__caption">
                                    <div class="pswp__caption__center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe-ui-default.min.js"></script>

                    <script>
                        'use strict';


                        (function($) {

                            var container = [];
                            $('#gallery').find('figure').each(function() {
                                var $link = $(this).find('a'),
                                    item = {
                                        src: $link.attr('href'),
                                        w: $link.data('width'),
                                        h: $link.data('height'),
                                        title: $link.data('caption')
                                    };
                                container.push(item);
                            });

                            $('a.pswp-img').click(function(event) {

                                event.preventDefault();

                                var $pswp = $('.pswp')[0],
                                    options = {
                                        index: $(this).parent('figure').index(),
                                        bgOpacity: 0.85,
                                        showHideOpacity: true
                                    };

                                var gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, container, options);
                                gallery.init();
                            });

                        }(jQuery));
                    </script>



                    <!-- Swiper JS -->
                    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

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
                        var isFirstIteration = true;
                        var savedValues = {};

                        function saveValue(element, attributeId, name = null) {

                            var value = element.getAttribute('data-value');
                            var values = value.split(',');

                            var attributeTermName = values[0];
                            var attributeTermPrice = parseFloat(values[1]); // Parse price as a float

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
                            } else {
                                // Add new values
                                savedValues[attributeId] = {
                                    name: attributeTermName,
                                    price: attributeTermPrice
                                };
                            }

                            // Update nameDiv
                            var names = Object.values(savedValues).map(function(item) {
                                return item.name;
                            });
                            nameDiv.textContent = names.join(' + ');

                            // Update priceDiv
                            var prices = Object.values(savedValues).map(function(item) {
                                return item.price;
                            });
                            priceDiv.textContent = prices.reduce(function(sum, price) {
                                return sum + price;
                            }, 0).toFixed(2);

                            // Update totalPriceDiv
                            totalPriceDiv.textContent = priceDiv.textContent;



                            // Save values in session
                            var totalPrice = parseFloat(priceDiv.textContent);
                            var sessionData = {
                                product_id: {{ $product->id }},
                                total_price: totalPrice,
                                names: names.join(', ')
                            };
                            sessionStorage.setItem('sessionData', JSON.stringify(sessionData));

                            console.log(sessionStorage.getItem('sessionData'));



                            //   var sessionData = JSON.parse(sessionStorage.getItem('sessionData'));
                            // console.log(sessionData.total_price); // Access the total price
                            // console.log(sessionData.names); // Access the names

                        }

                        function getData(id, idpro) {


                            // Send an AJAX request to the backend
                            $.ajax({
                                url: '{{ route('product.attributeTerms') }}',
                                method: 'GET',
                                data: {
                                    id: id,
                                    productid: idpro
                                }, // Pass the ID as a parameter
                                success: function(response) {
                                    // Handle the response data
                                    console.log(response);
                                    var users = response;
                                    var tableBody = $('#test');
                                    var myDiv = document.getElementById('test');
                                    myDiv.innerHTML = '';

                                    for (var i = 0; i < users.length; i++) {
                                        var user = users[i];
                                        tableBody.append(
                                            '<div class="bg-light rounded product_short_dec mb-3 p-3" style="border: 2px solid;" onclick="clickHighlight(this); saveValue(this, ' +
                                            user.attribute_id + ');" data-value="' + user.attribute_term_name + ',' + user
                                            .price + '"><div class="mb-3"><h4>' + user.attribute_term_name + '</h4><p>' +
                                            user.attribute_term_description + '</p></div></div>');

                                    }


                                },
                                error: function(xhr, status, error) {
                                    // Handle the error, if any
                                    <
                                    !--console.error(error);
                                    -- >
                                }
                            });
                        }

                        function add_to_cart(id) {
                            var product_details = sessionStorage.getItem('sessionData');
                            $.ajax({
                                type: 'post',
                                url: '{{ url('/add-to-cart') }}',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": id,
                                    "product_details": product_details,
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
                        let deselect = document.querySelectorAll("div.border,div.border-success");
                        deselect.forEach((item) => item.classList.remove("border"));

                        function clickHighlight(el) {

                            let deselect = document.querySelectorAll("div.border,div.border-success");
                            deselect.forEach((item) => item.classList.remove("border"));
                            // event.target.classList.add("border","border-success")
                            el.classList.add("border", "border-danger", "bg-success", "bg-color");
                        }


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

    </body>

    </html>
@endsection
