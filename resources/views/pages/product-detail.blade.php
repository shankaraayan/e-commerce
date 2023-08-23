@extends('../Layout.Layout')
@section("content")

  <div class="ps-page--product4 mt-2 ps-categogy--separate">
    <x-filtter :value="__('DisabledShortBy')" :filterIcon="__('d-none')" :productName="__($product->product_name)"><a href="{{route('shop',[$category])}}">{{$category}}</a></x-filtter>
     {{-- @dd($product); --}}

      <div class="ps-page__content pt-2">
        <div class="ps-product--detail ps-product--full pt-40 pb-40 bg-light">
          {{-- Product details --}}
          <div class="container">
            <div class="row product-container">
                <div class="col-12 col-xl-5 col-md-5 product-image">
                    <div class="ps-section__carousel related_product_view">
                    <div class="main-image owl-carousel owl-loaded owl-drag" data-owl-loop="true" data-owl-auto="false"
                        data-owl-nav="false" data-owl-dots="false">
                        <div class="item">
                        <img src="{{ asset('root/public/uploads/' . $product->thumb_image) }}" alt="alt" />
                        </div>
                        @foreach ($product->images as $image)
                   
                        <div class="item">
                         
                        <img src="{{ asset('root/public/uploads/' . $image->images) }}" alt="alt" />
                        </div>
                        @endforeach
                    </div>
                    <div class="gallery owl-carousel owl-loaded owl-drag" data-owl-loop="true" data-owl-auto="false"
                        data-owl-nav="true" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="3"
                        data-owl-item-md="4" data-owl-item-lg="4" data-owl-item-xl="4">
                        <div class="item" style="padding:10px;">
                        <img src="{{ asset('root/public/uploads/' . $product->thumb_image) }}" alt="alt" data-index="0" />
                        </div>
                        @foreach ($product->images as $image)
                        <div class="item" style="padding:10px;">
                        <img src="{{ asset('root/public/uploads/' . $image->images) }}" alt="alt"
                            data-index="{{ $loop->index+1 }}" />
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
                <div class="col-12 col-xl-7 col-md-7 bg-white">
                    <div class="ps-product__info mb-3">
                    <div class="ps-product__branch"><a href="#">@if(isset($product->categories->name)) {{$product->categories->name}} @endif</a></div>
                    <div class="ps-product__title">{{$product->product_name}}</div>
                    <div class="sku_wrapper ean_wrapper bg-light fs-5 text-blue mb-2">{{$category}}</div>
                    <div class="ps-product__meta pt-2 mt-2 mb-3">
                      <span class="{{$product->type == 'variable'? '':'ps-product__del'}} fs-3 text-muted">@if($product->type == 'variable') @else{{ formatPrice($product->price) }} @endif</span>
                      <span class="ps-product__price sale fs-3" id="totalPrice">
                        @if($product->type == 'variable') Please Select Attributes for best price 
                        @else {{ formatPrice($product->sale_price) }} 
                        @endif
                      </span>

                      {{-- <p>Erleben Sie die Sonnenkraft auf innovative Art mit dem Balkonkraftwerk der ZukunftErleben Sie die Sonnenkraft auf innovative Art mit dem Balkonkraftwerk der ZukunftErleben Sie die Sonnenkraft auf innovative Art mit dem Balkonkraftwerk der Zukunft</p> --}}
                    </div>
                    <h5 class="mb-4 text-dark" id="nameDiv" style="display: none;"></h5>
                    <div id="priceDiv" style="display: none;"></div>
                    @if($product->type == 'variable')
                    <div class="ps-product__variations_sec mb-5">
                        <div class="accordion" id="accordionExample">

                        @foreach ($attributes as $key => $data)

                        <div class="attribute_box">
                            <div class="card-header p-0" id="heading_Var{{$key}}" data-toggle="collapse"
                            data-target="#collapse_var_{{$key}}" aria-expanded="true" aria-controls="collapse_var_{{$key}}">
                            <div class="card_header_inner pr-3" style="display:inline-block">
                                <a href="javascript:void(0)">
                                <h3 class="attribute_title mb-0">{{$data->attribute_name}}</h3>
                                </a>
                            </div>
                            <span class="float-right text-secondary fs-4">Change</span>
                            </div>

                            <div id="collapse_var_{{$key}}" class="collapse{{$key == 0 ? ' show' : ''}}"
                            aria-labelledby="heading_Var{{$key}}" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row attr_desc py-2 px-4 bg-light-blue mb-20 shadow-sm">
                                  <p class="ps-desc mb-0">
                                    {{$data->attribute_description}}</p>
                                </div>
                                <div class="ps-checkout__checkbox row">

                                @foreach ($data->attributeTerms as $keyss => $vales)

                                @if ($key == 0 && $data->attribute_type == 'panel')
                                <div class="form-check col-12 mb-4">
                                    <input class="form-check-input" type="radio" name="var_radios{{$key}}"
                                    id="var_radios{{$key}}_{{$keyss}}" value="option{{$keyss}}"
                                    data-atr-name="{{ $vales->attribute_term_name }}" data-atr-price="{{ $vales->price }}"
                                    data-value="{{ $vales->attribute_term_name }},{{ $vales->price }},{{$vales->id}},{{$data->attribute_name}}"
                                    onclick="getData({{ $vales->id }},{{ $product->id }},{{ $key+1 }}); saveValue(this, '{{ $data->id }}','Panel','heading_Var{{$key}}',{{$vales->id}},'{{$data->attribute_name}}')">

                                    <label class="form-check-label mx-2" for="var_radios{{$key}}_{{$keyss}}">
                                    <div class="row align-items-center select_var_row p-2 term-select-{{$vales->id}}">
                                        @if(@$vales->image)

                                        <div class="ps-section__thumbnail col-md-2 col-3">
                                        <img src="{{asset('root/public/uploads/'.$vales->image)}}" alt="" class="img-fluid">
                                        </div>
                                        @endif
                                        <div class="align-middle {{ @$vales->image ? 'col-md-7 col-9' : 'col-9' }}">
                                        <h3 class="attribute_title_name py-2 d-flex justify-content-between">{{ $vales->attribute_term_name }}</h3>
                                        <p class="ps-desc">{{ $vales->attribute_term_description }}</p>
                                        </div>
                                        <div class="{{ @$vales->image ? 'col-12 col-md-3' : 'col-3' }}  text-right mt-md-0 mt-2">
                                          {{-- <small class="attribute_price">{{formatPrice($vales->price) }}</small> --}}
                                         
                                              <small class="attribute_price">
                                                  @if($vales->price > 0)
                                                      {{ formatPrice($vales->price) }}
                                                  @endif
                                              </small>
                                        </div>
                                    </div>
                                    </label>
                                </div>
                                @elseif($key == 1 && $data->attribute_type == 'inverter')

                                <div class="form-check col-12 mb-4" id="test">
                                    <input class="form-check-input" type="radio" name="var_radios{{$key}}"
                                    id="var_radios{{$key}}_{{$keyss}}" value="option{{$keyss}}"
                                    data-atr-price="{{ $vales->price }}" data-atr-name="{{ $vales->attribute_term_name }}"
                                    data-value="{{ $vales->attribute_term_name }},{{ $vales->price }},{{$vales->id}},{{$data->attribute_name}}"
                                    onclick="saveValue(this, '{{ $data->id }}','','heading_Var{{$key}}',{{$vales->id}},'{{$data->attribute_name}}')">

                                    <label class="form-check-label mx-2" for="var_radios{{$key}}_{{$keyss}}">
                                    <div class="row align-items-center select_var_row p-2 term-select-{{$vales->id}}">
                                        @if(@$vales->image)
                                        <div class="ps-section__thumbnail col-md-2 col-3">
                                        <img src="{{asset('root/public/uploads/'.$vales->image)}}" alt="" class="img-fluid">
                                        </div>
                                        @endif
                                        <div class="align-middle {{ @$vales->image ? 'col-9 col-md-7' : 'col-9' }}">
                                        <h3 class="attribute_title_name py-2 d-flex justify-content-between">
                                            {{ $vales->attribute_term_name }} 
                                        </h3>
                                        <p class="ps-desc">{{$vales->attribute_term_description}}</p>
                                        </div>
                                        <div class="{{ @$vales->image ? 'col-12 col-md-3' : 'col-3' }}  text-right mt-md-0 mt-2">
                                          {{-- <small class="attribute_price">
                                            {{formatPrice($vales->price) }}
                                          </small>
                                          Copy code --}}
                                          <small class="attribute_price">
                                              @if($vales->price > 0)
                                                  {{ formatPrice($vales->price) }}
                                              @endif
                                          </small>
                                        </div>
                                    </div>
                                    </label>
                                </div>
                                @else

                                <div class="form-check col-12 mb-4">
                                    <input class="form-check-input" type="radio" name="var_radios{{$key}}"
                                    id="var_radios{{$key}}_{{$keyss}}" value="option{{$keyss}}"
                                    data-atr-price="{{ $vales->price }}" data-atr-name="{{ $vales->attribute_term_name }}"
                                    data-value="{{ $vales->attribute_term_name }},{{ $vales->price }},{{$vales->id}},{{$data->attribute_name}}"
                                    onclick="saveValue(this, '{{ $data->id }}','','heading_Var{{$key}}',{{$vales->id}},'{{$data->attribute_name}}')">
                                    <label class="form-check-label mx-2" for="var_radios{{$key}}_{{$keyss}}">
                                    <div class="row align-items-center select_var_row p-2 term-select-{{$vales->id}}">
                                        @if(@$vales->image)
                                        <div class="ps-section__thumbnail col-md-2 col-3">
                                        <img src="{{asset('root/public/uploads/'.$vales->image)}}" alt="" class="img-fluid">
                                        </div>
                                        @endif
                                        <div class="align-middle  {{ @$vales->image ? 'col-9 col-md-7' : 'col-9' }}">
                                        <h3 class="attribute_title_name py-2 d-flex justify-content-between">
                                            {{ $vales->attribute_term_name }} 
                                        </h3>
                                        <p class="ps-desc">{{$vales->attribute_term_description}}</p>
                                        </div>
                                        <div class="  {{ @$vales->image ? 'col-12 col-md-3' : 'col-3' }}  text-right mt-md-0 mt-2">
                                          {{-- <small class="attribute_price">{{formatPrice($vales->price) }}</small> --}}
                                          <small class="attribute_price">
                                            @if($vales->price > 0)
                                                {{ formatPrice($vales->price) }}
                                            @endif
                                        </small>
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
                            plusBtn.addEventListener("click", function () {
                            // increase the quantity value by 1
                            input.value = parseInt(input.value) + 1;
                            });

                            minusBtn.addEventListener("click", function () {
                            // decrease the quantity value by 1
                            if (parseInt(input.value) > 1) {
                                input.value = parseInt(input.value) - 1;
                            }
                            });
                        </script>
                     
                        @php
                        $countAttribites = count($attributes);
                        @endphp
                        <a class="ps-btn ps-btn--warning"
                            onclick="checkSessionCount('{{ $product->id }}', '{{ $countAttribites }}')"
                            href="javascript:void(0)">ADD TO CART</a>
                        </div>
                    </div>
                    <div class="select_shipping_area align-items-center mt-4 mb-0">
                      <a class="btn ps-btn--primary ps-btn--rounded for-label fs-4 px-4 py-2 shadow-none" data-toggle="collapse" href="#shipping_area" role="button" aria-expanded="false" aria-controls="shipping_area">
                          Lieferort auswählen
                      </a>
                      <div class="collapse mt-2" id="shipping_area">
                        <select class="form-control" name="shipping_class" id="shipping_class">
                            @php
                            $result = shippingCountry()->where('shipping_id',$product->shipping_class)->where('status',1);
                            @endphp
      
                            @foreach ($result as $country)
                            <option value="{{$country->country}}">
                                {{country()->where('id',$country->country)->pluck('country')->first()}} </option>
                            @endforeach
                            </select>
                      </div>
                      
                    </div>  
                    {{-- {{$product->product_availability ?? 'NA'}} --}}
                    <div class="shipping_box"> 
                      <div class="well shippingDate rounded-0 d-inline-block bg-light fs-5 text-blue">
                        
                        {{-- Estimate Shipping date {{ date('d-M-Y',strtotime(@today()->addDays($product->product_availability ?? 10)))}} --}}
                        Estimate Shipping date {{ working_days($product->product_availability ) }}
                      </div>
                    </div>
                    {{-- @dd($product); --}}

                    <div class="product_meta">
                        <div class="sku_wrapper ean_wrapper">EAN: <span class="ean">000001000</span></div>
                        <div class="sku_wrapper">Artikelnummer: <span class="sku">{{$product->sku}}</span></div>
                        <div class="sku_wrapper">Kategorien: <span class="productCat">
                          <x-category-list :prdoductCategories="$product->categories"></x-category-list>
                        </span>
                        </div>
                    </div>

                    @php
                    $banner = categories()->where('id',$product->categories)->pluck('banner')->first();
                    @endphp
                    @if($banner != null)
                    <img src="{{asset('root/public/uploads/category/'.$banner)}}" class="img-fluid w-100 rounded">
                    @else
                    <x-bottom-banner />
                    @endif

                    <x-payment-icon />
                    </div>
                </div>
            </div>
          </div>
        </div> 
        
        {{-- Attribute Htmls Begins --}}

        <div class="ps-product__content">
          
            <section class="pro_des bg-light-blue panel mb-5">
                <div class="container">
                    <div class="ps-promo mt-5 ps-category--image mt-5">
                        <div class="{{@$components ? '':'d-none'}}">
                            <div class="row align-self-center justify-content-around" id="short_des_html">
                                @if(!empty(@$components))
                                    @foreach($components as $component)
                                    <div class="col-xl-2 col-lg-3 col-md-6 col-6">
                                        <div class="ps-block--about p-0 py-5">
                                            <div class="ps-block__icon mb-3"><img decoding="async"
                                                src="{{asset('root/public/uploads/'.$component->image)}}" class="img-fluid" alt="">
                                            </div>
                                            <span class="fs-4 text-blue">{{$component->attribute_term_name}}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <div id="html_component">
              @if(!empty($components))
                @foreach($components as $component)
                {!! $component->component_description !!}
                @endforeach
                
              @elseif(@$components==null && @$product['type']==="single")
              @php
                  echo $product->product_description;
              @endphp
              {{-- {!! $product->product_description !!} --}}
              @endif
          </div>
        </div>

        {{-- Related products area --}}
        <section class="ps-section--deals py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ps-section__header">
                            <h3 class="ps-section__title font-weight-400">Die besten Deals der Woche!</h3>
                        </div>
                        <div class="ps-section__carousel related_product_view">
                          <div class="owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                
                            {{-- product Card --}}
                            <div class="owl-stage-outer">
                              <div class="owl-stage" style="transform: translate3d(-2228px, 0px, 0px); transition: all 1s ease 0s; width: 4706px;">
                               
                                <x-product-small-card :productData="$products" />

                              </div>
                            </div>
                
                            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i
                                    class="fa fa-chevron-left"></i></button><button type="button" role="presentation"
                                class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                            <div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div>
                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                    class="fa fa-chevron-left"></i></button><button type="button" role="presentation"
                                class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                            <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                                role="button" class="owl-dot"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
      </div>

      
  </div>

    <!-- Swiper JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> --}}
 
 
    <!-- kartik -->

    <script>
      $(document).ready(function () {
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
        $('.gallery').on('click', '.item img', function () {
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
        const url = window.location.href;
        const search = new URL(window.location.href);
        if (search.search) {
          savedValues = JSON.parse(sessionStorage.getItem('savedValues'));
        } else {
          sessionStorage.removeItem('savedValues');
          sessionStorage.removeItem('sessionData');
          savedValues = {};
        }

        // console.log(savedValues);
      } else {
        savedValues = {};
      }


      function saveValue(element, attributeId, name = null, pids, term_id, attribute_name) {
        // console.log(element);

        var id = parseInt(pids.split("heading_Var")[1]);
        var collapse_id = "collapse_var_" + id;

        $("#" + collapse_id).collapse('toggle');
        id++;

        $("#" + "collapse_var_" + id).addClass('show');

        var atr_name = element.getAttribute('data-atr-name');
        var atr_price = element.getAttribute('data-atr-price');
        atr_price = formatPrice(atr_price);
        console.log(atr_price);

        $("#" + pids).find("small").remove();

        if (atr_price != '€0.00') {
          $("#" + pids).append(`<small class="font-weight-bold">${atr_name}</small> <small class="mr-5 pl-2 selected_price">${atr_price}</small>`);
        }
        if(atr_price < 0){
          console.log(atr_price);
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
            termid: attributeTermID,
            attribute: attributeName
          };
        }
        sessionStorage.setItem('savedValues', JSON.stringify(savedValues));

        var attributeIds = Object.keys(savedValues);

        var count = attributeIds.length;

        // Update nameDiv
        var names = Object.values(savedValues).map(function (item) {
          return item.name;
        });
        nameDiv.textContent = names.join(' + ');

        var names = Object.values(savedValues).map(function (item) {
          return item.name;
        });
        nameDiv.textContent = names.join(' + ');

        var termIds = Object.values(savedValues).map(function (item) {
          return item.termid;
        });

        var attributeName = Object.values(savedValues).map(function (item) {
          return item.attribute;
        });

        // Update priceDiv
        var prices = Object.values(savedValues).map(function (item) {
          return item.price;
        });
        priceDiv.textContent = prices.reduce(function (sum, price) {
          return sum + price;
        }, 0).toFixed(2);

        // Update totalPriceDiv
        totalPriceDiv.textContent = '€' + priceDiv.textContent;

        // Save values in session
        var totalPrice = parseFloat(priceDiv.textContent);

        var sessionData = {
          product_id: {{ $product-> id
      }},
      prices: prices.join(','),
        termIds: termIds.join(','),
          names : names.join(','),
            attribute : attributeName.join(',')

      };

    sessionStorage.setItem('sessionData', JSON.stringify(sessionData));
      // Check if termsID is an array and add it to sessionData

      html_components();
      
      // toggleAccordion(header)
      }

      function show_name() {
        $('.select_var_row').each(function () {
          $(this).click(function () {
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

      function getData(id, idpro, sid) {

        // console.log(id,idpro);
        // Send an AJAX request to the backend
        $.ajax({
          url: '{{ route("product.attributeTerms") }}',
          method: 'GET',
          data: { id: id, productid: idpro }, // Pass the ID as a parameter
          success: function (response) {
            // console.log(response);
            var tableBody = $('#test');
            tableBody.empty();
            for (var i = 0; i < response.length; i++) {
              var user = response[i];
           
              let imageUrl = "{{ asset('root/public/uploads/') }}/" + user.image;
             
              tableBody.append(`
            <div class="row select_var_row align-items-center mx-0 p-2 term-select-${id}}" onclick="highlightDiv(this);saveValue(this, '${user.attributes_id}','','heading_Var${sid}',${id},'${user.attribute_term_name}');" data-atr-name="${user.attribute_term_name}" data-atr-price="${user.price}" data-value="${user.attribute_term_name},${user.price},${user.id},${user.attribute_name}">
                 <div class="ps-section__thumbnail ${user.image !== null ?'d-block col-md-2 col-3':'d-none'}">
                    <img src="${imageUrl}" alt="" width="100px">
                </div>
                <div class="${user.image !== null ?'col-md-7 col-9':'col-9'}">
                    <div class="mb-3">
                        <h3 class="attribute_title_name py-2 d-flex justify-content-between">
                            ${user.attribute_term_name}</h3>
                        <p class="ps-desc">${user.attribute_term_description}</p>
                    </div>
                </div>
                <div class="${user.image !== null ?'col-12 col-md-3' : 'col-3'}  text-right mt-md-0 mt-2">
                  <small class="attribute_price">
                      ${user.price > 0 ? `€ ${user.price}` : ''}
                  </small>
                </div>
            </div>`
              );

              show_name();
            }

          },
          error: function (error) {
            console.log(error);
          }
        });
      }

      function highlightDiv(element) {
        element.style.border = '2px solid #075095';
      }


      function add_to_cart(id,url=null) {
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
            "url" : url,
            "product_details": product_details,
            "quantity": qty,
            "shipping_country": shippingCountry,
          },
          success: function (response) {
            response = JSON.parse(response);

            if (response.status == true) {

              $(".my_cart_count").text(response.data);
              // toastr.success(response.message);
              flasher.success(response.message);
            } else {

              toastr.error(response.message);
            }
          },
          error : function(error){
              console.log(error);
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
        if (plusCount + 1 < countAttributes) {
          
          // console.log(countAttributes);
          // toastr.options.closeButton = true;
          // toastr.error("Please select all attribute combinations!!");
          flasher.error("Please select all attribute combinations!!");
        } else {
          let url = window.location.href;
          add_to_cart(productId,url);
        }

      }

   
      // get attribute term html

      


      // opend components code

      $(document).ready(function () {
        const url = window.location.href;
        const search = new URL(window.location.href);
        if (search.search) {
          $("#totalPrice").css('display', "none");
          let paramString = url.split('?')[1];
          paramString = paramString.split("&");
          let firstQueryId = paramString[0].split("=")[1];

          // if (sessionStorage.getItem('sessionData')) {
          //   const data = sessionStorage.getItem('sessionData')

          //   const { termIds, prices, names } = JSON.parse(data);
          //   let terms = termIds.split(",");
          //   let price = prices.split(",");
          //   let name = names.split(",");
          //   let total_price = 0;

          //   terms && terms.map((item, index) => {
          //       console.log(price[index]);

          //       total_price = total_price + parseInt(price[index]); // Use parseFloat to handle decimal prices

          //       $(".term-select-" + item).css("border-color", "var(--blue-color)");
          //       let el = $(".term-select-" + item);

          //       if (el[0]) {
          //           el = el[0].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
          //           let card_header_inner = el.querySelector(".card_header_inner");

          //           const ps = card_header_inner.parentElement;
          //           if (parseFloat(price[index]) !== 0) {
          //               $(ps).append(`<small class="font-weight-bold">${name[index]}</small> <small class="ml-3 font-weight-bold selected_price">${formatPrice(price[index])}</small>`);
          //           }
          //       }
          //   });

          //   // Update the total price in the HTML
          //   $("#totalPrice").html(formatPrice(total_price)); 
          //   $("#totalPrice").css('display', 'block');

          // }
          var termIdss = [];
          for (par of paramString) {
            termIdss.push(par.split('=')[1]);
          }
 
          $.ajax({
              type: 'get',
              url: '{{ url('/term-html') }}',
              data: {
                "_token": "{{ csrf_token() }}",
                "ids": termIdss,
              },
              success: function (response) {
                console.log(response);
                let total_price = 0;
                response && response.map((item, index) => {
                  console.log(item);
                    total_price = total_price + parseInt(item.price); // Use parseFloat to handle decimal prices
                  
                    $(".term-select-" + item.id).css("border-color", "var(--blue-color)");
                    let el = $(".term-select-" + item.id);

                    if (el[0]) {
                        el = el[0].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
                        let card_header_inner = el.querySelector(".card_header_inner");

                        const ps = card_header_inner.parentElement;
                        if (parseFloat(item.price) !== 0) {
                            $(ps).append(`<small class="font-weight-bold">${item.attribute_term_name}</small> <small class="ml-3 font-weight-bold selected_price">${formatPrice(item.price)}</small>`);
                        }
                    }
                  });

                // Update the total price in the HTML
                $("#totalPrice").html(formatPrice(total_price)); 
                $("#totalPrice").css('display', 'block');

              },
              error : function(error){
                console.log('error');
              }
          })

        }

      })

      // update after page load attribute set name
      
      $(document).ready(function () {
        var nameDiv = document.getElementById('nameDiv');
        if (sessionStorage.getItem('sessionData')) {
          var sessionData = sessionStorage.getItem('sessionData');
          let { names } = JSON.parse(sessionData);
          names = names.split(",").join(' + ');
          nameDiv.textContent = names;
        } else {
          // $("#html_component").html('');
          $(".bg-gray").addClass("d-none");
          // reset url
          // let url = new URL(window.location.href);
          // window.history.pushState({ path: url.pathname }, '', url.pathname);
        }

      });

    </script>
    
    <script>
        function html_components() {

        const data = sessionStorage.getItem('sessionData');
        let { termIds, prices, attribute } = JSON.parse(data);
        const url = new URL(window.location.href);

        // Create an empty URLSearchParams object
        const emptySearchParams = new URLSearchParams();

        // Update the search params of the URL with the empty URLSearchParams
        url.search = emptySearchParams.toString();

        // Update the URL in the browser's history without reloading the page
        window.history.pushState({ path: url.pathname }, '', url.pathname);

        attribute = attribute.split(",");
        termIds = termIds.split(",");

        termIds.map((item, index) => {

          let attr_name = attribute[index].toLowerCase().split(" ").join("-");
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
          success: function (response) {
            $(".bg-gray").removeClass("d-none");
            // console.log(response);
            let short_des_html = '';
            let htmlComponent = '';
            if (response) {
                  response.map((item, index) => {
                      console.log(item);
                      // Generate the HTML for each response item
                      let short_des = `
                          ${item.attribute_term_name !== "ohne DTU" ? `
                              <div class="col-12 col-md-6 col-lg-3">
                                  <div class="ps-block--about p-3">
                                      <div class="ps-block__icon"><img decoding="async" src="{{ asset('root/public/uploads') }}/${item.image}" class="img-fluid w-50" alt=""></div>
                                      <span class="fs-4 text-blue">${item.attribute_term_name}</span>
                                  </div>
                              </div>
                          ` : ''}
                      `;
                      short_des_html += short_des;
                      htmlComponent += item.component_description;
                  });
              }

            // console.log(short_des_html);
            $(short_des_div).html(short_des_html);
            $(htmlComponentDiv).html(htmlComponent);
          },
          error: function (err) {
            console.log(err);
          }
        })
      }
    </script>

@endsection