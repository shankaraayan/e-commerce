@extends('../Layout.Layout')
@section('style')

@endsection
@section("content")


  <div class="ps-page--product4 ps-categogy--separate">
    <x-filtter :value="__('DisabledShortBy')" :filterIcon="__('d-none')" :productName="__($product->product_name)"><a href="{{route('shop',[$category])}}">{{$category}}</a></x-filtter>
     {{-- @dd($components); --}}
    <input type="hidden" id="product_id" value="${{@$product->id}}">
      <div class="ps-page__content pt-2">
        <div class="ps-product--detail ps-product--full pt-40 pb-40 bg-light">
          {{-- Product details --}}
          <div class="container">
            <div class="row product-container">
                <div class="col-12 col-xl-5 col-md-5 product-image">
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
                  
                        <div class="gallery owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="false" data-owl-speed="13000" data-owl-gap="10" data-owl-nav="true" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="4" data-owl-item-sm="4" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="item">
                        <img src="{{ asset('root/public/uploads/' . $product->thumb_image) }}" alt="alt" data-index="0" />
                        </div>
                        @foreach ($product->images as $image)
                        <div class="item">
                        <img src="{{ asset('root/public/uploads/' . $image->images) }}" alt="alt"
                            data-index="{{ $loop->index+1 }}" />
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
                <div class="col-12 col-xl-7 col-md-7 bg-white">
                    <div class="ps-product__info mb-3 pt-md-0 pt-3">
                     <div class="sku_wrapper ean_wrapper text-secondary text-capitalize d-inline-block fs-5 fw-500 mb-2"><a href="/shop/{{$category}}">{{$category}}</a></div>
                    <div class="ps-product__title">{{$product->product_name}}</div>
                    <div class="ps-product__meta pt-2 mt-2 mb-3">
                      <span class="{{$product->type == 'variable'? '':'ps-product__del'}} fs-3 text-muted">@if($product->type == 'variable') @else{{ formatPrice($product->price) }} @endif</span>
                      <span class="ps-product__price sale fs-3" id="totalPrice">
                        @if($product->type == 'variable')Die Beschreibung wird verfügbar sein, sobald Sie Komponenten ausgewählt haben.
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
                            <span class="float-right text-secondary fs-4">Ändern</span>
                            </div>

                            <div id="collapse_var_{{$key}}" class="collapse{{$key == 0 ? ' show' : ''}}"
                            aria-labelledby="heading_Var{{$key}}" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row attr_desc py-2 px-4 bg-light-blue mb-20 shadow-sm">
                                  <p class="ps-desc mb-0">
                                    {{$data->attribute_description}}</p>
                                </div>
                                <div class="ps-checkout__checkbox row" @if (@$data->attribute_type == 'inverter') id="test" @endif>

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

                                        <div class="form-check col-12 mb-4">
                                              <label class="form-check-label mx-2" for="var_radios{{$key}}_{{$keyss}}">
                                                <input class="form-check-input" type="radio" name="var_radios{{$key}}"
                                                id="var_radios{{$key}}_{{$keyss}}" value="option{{$keyss}}"
                                                data-atr-price="{{ $vales->price }}" data-atr-name="{{ $vales->attribute_term_name }}"
                                                data-value="{{ $vales->attribute_term_name }},{{ $vales->price }},{{$vales->id}},{{$data->attribute_name}}"
                                                onclick="saveValue(this, '{{ $data->id }}','','heading_Var{{$key}}',{{$vales->id}},'{{$data->attribute_name}}')">
                                              </label>
                                              
                                              <label class="form-check-label mx-2" for="var_radios{{$key}}_{{$keyss}}">
                                                <div class="row align-items-center select_var_row p-2 term-select-{{$vales->id}}" onclick="highlightDiv(this)">
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
                    
                    <div class="d-flex align-items-center">
                      <x-quantity ></x-quantity>
                    
                    @php
                        $countAttribites = count($attributes);
                    @endphp

                    <a class="ps-btn ps-btn--warning"
                        onclick="checkSessionCount('{{ $product->id }}', '{{ $countAttribites }}')"
                        href="javascript:void(0)">In den Warenkorb</a>
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
                        Voraussichtliches Lieferdatum {{ working_days($product->product_availability ) }}
                      </div>
                    </div>
                    {{-- @dd($product); --}}

                    <div class="product_meta">
                        <div class="sku_wrapper ean_wrapper">EAN: <span class="ean">000001000</span></div>
                        <div class="sku_wrapper">Artikelnummer: <span class="sku" id="sku">{{$product->sku}}</span></div>
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

        <div class="ps-product__content mt-5">
          
          {{-- <div class="container">
            <div class="shadow border rounded">
              <div class="attribute_configure">

                <div class="atta_img_block bg-light-blue pb-10">
                    <div class="vari_imgs">
                      <img src="https://eppsolar.de/root/public/uploads/64da108282820.webp" class="img-fluid" alt="abc">  
                    </div> 
                
                </div>
                <div class="atta_caps_block">
                    <div class="atta_title">
                      <span>1000W</span>
                    </div>
                  
                </div>

              </div>
            </div>
          </div> --}}








          <section id="term_short_des_container" class="attribute_appendArea {{ @$components ? 'd-block' : 'd-none' }}">
            <div class="text-center mb-20 text-blue fs-1 fw-600">Lieferumfang</div>
            <div class="container border px-0">
                <div class="attribute_configure" id="short_des_html">
                    @if (!empty(@$components) && @$product->type === "variable")
                        <div class="atta_img_block bg-light-blue pb-10">
                            @foreach ($components as $component)
                                @if (strtolower($component->attribute_term_name) !== "ohne dtu")
                                <div class="vari_imgs">
                                  <img src="{{ asset('root/public/uploads/' . $component->image) }}" class="img-fluid" alt="{{ $component->attribute_term_name }}">  
                                </div> 
                                 
                                @endif
                            @endforeach
                        </div> <!-- Closing div tag for atta_img_block -->
        
                        <div class="atta_caps_block">
                            @foreach ($components as $component)
                                @if (strtolower($component->attribute_term_name) !== "ohne dtu")
                                <div class="atta_title">
                                  <span>{{ $component->attribute_term_name }}</span>
                                </div>
                                   
                                @endif
                            @endforeach
                        </div> <!-- Closing div tag for atta_caps_block -->
                    @endif
                </div>
            </div>
        </section>
        
       
            @if(!empty(@$product->product_description) && @$product->type !== "variable" )
                <div class="ps-product__content bg-light-blue">
                    <div class="container">
                      <div class="row align-items-center">
                          <div class="col-md-12">
                          <div class="productDescription">
                            <p>{!! $product->product_description !!}</p>
                            </div>
                          </div>
                        
                        </div>
                    </div>
                </div>
            @endif
        
            <div id="html_component" class="mt-5">
              @if(!empty(@$components) && @$product->type === "variable")
                @foreach(@$components as $component)
                    @if (strtolower($component->attribute_term_name) !== "ohne dtu")
                        {!! $component->component_description !!}
                    @endif
                @endforeach
              @endif
            </div>

        </div>

        {{-- Related products area --}}

            <section class="ps-section--deals pb-4 bg-light-blue pt-5">
                <div class="container">
                <div class="ps-section__header mb-0">
                    <h2 class="ps-section__title">Die besten Deals der Woche!</h2>
                </div>
                <div class="ps-section__carousel border-0">
                    <div class="owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
            
                        {{-- product Card --}}
                        <div class="owl-stage-outer py-md-5 py-2">
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
            </section>
        </div>
      </div>

      
  </div>

<!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


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
            0: { items: 4, margin: 10 },
            576: { items: 4, margin: 10 },
            768: { items: 4, margin: 10 },
            992: { items: 4, margin: 10 },
            1200: { items: 4, margin: 10 }
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

      // function formatPrice(price) {
      //   var formattedPrice = parseFloat(price).toFixed(2);
      //   formattedPrice = formattedPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      //   return '€' + formattedPrice;
      // }

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
      } else {
        savedValues = {};
      }
      

      function saveValue(element, attributeId, name = null, pids, term_id, attribute_name) {

        var id = parseInt(pids.split("heading_Var")[1]);
        var collapse_id = "collapse_var_" + id;
        $("#" + collapse_id).collapse('toggle');
        id++;
        $("#" + "collapse_var_" + id).addClass('show');
        var atr_name = element.getAttribute('data-atr-name');
        var atr_price = element.getAttribute('data-atr-price');
        atr_price = price_normal_to_euro(atr_price);
        $("#" + pids).find("small").remove();

        if (atr_price != '0,00') {
          $("#" + pids).append(`<small class="font-weight-bold">${atr_name}</small> <small class="mr-5 pl-2 selected_price">€${atr_price}</small>`);
        }
      
        var id = element.getAttribute('id');
        var value = element.getAttribute('data-value');
        var values = value.split(',');
        var attributeTermName = values[0];
        var attributeTermPrice = parseFloat(values[1]); // Parse price as a float
        var attributeTermID = parseFloat(values[2]); // Parse price as a float
        var attributeName = values[3];
        var nameDiv = document.getElementById('nameDiv');
        var priceDiv = document.getElementById('priceDiv');
        var totalPriceDiv = document.getElementById('totalPrice');


        if (name === 'Panel') {
          savedValues = {};
          $("#html_component").html('');
          let url = new URL(window.location.href);

          attribute_name = attribute_name.toLowerCase().split(" ").join("-");
          const params = new URLSearchParams(url.search);
          params.delete(attribute_name);
          params.append(attribute_name, term_id);
          url.search = params.toString();
          window.history.pushState({ path: url.pathname }, '', url.pathname);
        }

        if (attributeId in savedValues) {
          savedValues[attributeId].name = attributeTermName;
          savedValues[attributeId].price = attributeTermPrice;
          savedValues[attributeId].termid = attributeTermID;
          savedValues[attributeId].attribute = attributeName;

        }
        else {
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

        var prices = Object.values(savedValues).map(function (item) {
          return item.price;
        });
        priceDiv.textContent = prices.reduce(function (sum, price) {
          return sum + price;
        }, 0).toFixed(2);

        totalPriceDiv.textContent = '€' + price_normal_to_euro( priceDiv.textContent);

        var sessionData = {
          product_id: {{ $product-> id
        }},
        prices: prices.join(','),
          termIds: termIds.join(','),
            names : names.join(','),
              attribute : attributeName.join(',')

        };

        $(".attribute_box").each(function(index){
            $(this).removeClass('disabled-attr-box');    
        });
      
      sessionStorage.setItem('sessionData', JSON.stringify(sessionData));
      html_components();
      fetch_sku();
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
        $.ajax({
          url: '{{ route("product.attributeTerms") }}',
          method: 'GET',
          data: { id: id, productid: idpro }, // Pass the ID as a parameter
          success: function (response) {
            // console.log(response);
            $("#test").html('');
            for (var i = 0; i < response.length; i++) {
              var user = response[i];
              let imageUrl = "{{ asset('root/public/uploads/') }}/" + user.image;
              $("#test").append(`
              <div class="form-check col-12 mb-4">
                      <div class="row select_var_row align-items-center mx-0 mb-4 p-2 term-select-${id}}" onclick="highlightDiv(this);saveValue(this, '${user.attributes_id}','','heading_Var${sid}',${id},'${user.attribute_term_name}');" data-atr-name="${user.attribute_term_name}" data-atr-price="${user.price}" data-value="${user.attribute_term_name},${user.price},${user.id},${user.attribute_name}">
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
                                ${user.price > 0 ? `€${ price_normal_to_euro(user.price)}` : ''}
                            </small>
                          </div>
                      </div>
                 </div>
                  `
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
     
      const all_selected = element.parentElement.parentElement.parentElement;  
      const selectVarRows = all_selected.querySelectorAll('.select_var_row');
      // console.log(selectVarRows.length);
      selectVarRows.forEach(selectVarRow => {
          selectVarRow.style.border = ""; // Remove border from all elements
      });

    element.style.border = '2px solid #075095'; // Add border to the clicked element
}

            

      function add_to_cart(id,url=null) {
        var product_details = sessionStorage.getItem('sessionData');
        var shippingClassSelect = document.getElementById('shipping_class');
        var shippingCountry = shippingClassSelect.value;

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

      function toggleAccordion(header) {
        var accordion = header.parentNode;
        var accordions = document.getElementsByClassName('accordion');
        for (var i = 0; i < accordions.length; i++) {
          if (accordions[i] !== accordion) {
            accordions[i].classList.remove('active');
          }
        }
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
        if (plusCount + 1 < countAttributes) {
          flasher.error("Please select all attribute combinations!!");
        } else { 
          let url = window.location.href;
          add_to_cart(productId,url);
        }
      }


      $(document).ready(function () {
       
        const url = window.location.href;
        const search = new URL(window.location.href);

        if (search.search) {
          $("#totalPrice").css('display', "none");
          let paramString = url.split('?')[1];
          paramString = paramString.split("&");
          let firstQueryId = paramString[0].split("=")[1];

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
                let total_price = 0;
                response && response.map((item, index) => {
                    total_price = total_price + parseFloat(item.price); // Use parseFloat to handle decimal prices
                    $(".term-select-" + item.id).css("border-color", "var(--blue-color)");
                    let el = $(".term-select-" + item.id);
                    if (el[0]) {
                        el = el[0].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
                        let card_header_inner = el.querySelector(".card_header_inner");

                        const ps = card_header_inner.parentElement;
                        if (parseFloat(item.price) !== 0) {
                            $(ps).append(`<small class="font-weight-bold">${item.attribute_term_name}</small> <small class="ml-3 font-weight-bold selected_price">${'€'+price_normal_to_euro(item.price)}</small>`);
                        }
                    }
                  });

                $("#totalPrice").html('€'+price_normal_to_euro(total_price)); 
                $("#totalPrice").css('display', 'block');
              },
              error : function(error){
                console.log('error');
              }
          })
        }
      })
      
            

      $(document).ready(function () {
        var nameDiv = document.getElementById('nameDiv');
        if (sessionStorage.getItem('sessionData')) {
          var sessionData = sessionStorage.getItem('sessionData');
          let { names } = JSON.parse(sessionData);
          names = names.split(",").join(' + ');
          nameDiv.textContent = names;
          fetch_sku();
        } else {
          $(".bg-gray").addClass("d-none");
        }
      });

</script>

<script>
      function html_components() {

        const data = sessionStorage.getItem('sessionData');
        let { termIds, prices, attribute } = JSON.parse(data);
        const url = new URL(window.location.href);
        const emptySearchParams = new URLSearchParams();
        url.search = emptySearchParams.toString();
        window.history.pushState({ path: url.pathname }, '', url.pathname);
        attribute = attribute.split(",");
        termIds = termIds.split(",");
        termIds.map((item, index) => {

          let attr_name = attribute[index].toLowerCase().split(" ").join("-");
          const params = new URLSearchParams(url.search);
          params.append(attr_name, item);
          url.search = params.toString();
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
            $("#term_short_des_container").removeClass("d-none");
            // console.log(response);
            let short_des_img = '';
            let short_des_text = '';
            let short_des_html = '';
            let htmlComponent = '';
            if (response) {
                  response.map((item, index) => {
                      let short_des_im = `
                      ${item.attribute_term_name.toLowerCase() !== "ohne dtu" ? `
                            <div class="vari_imgs">
                                <img src="{{asset('root/public/uploads/')}}/${item.image}" class="img-fluid" alt="abc">  
                            </div>` : ''}
                      `;
                      let short_des_tx = `${item.attribute_term_name.toLowerCase() !== "ohne dtu" ? `
                      <div class="atta_title">
                      <span>${item.attribute_term_name}</span>
                    </div>
                        
                          ` : ''}
                      `;
                      short_des_img += short_des_im;
                      short_des_text += short_des_tx;

                      if(item.attribute_term_name.toLowerCase() !== "ohne dtu"){
                          htmlComponent += item.component_description;
                      } 
                  });   
              }
               
                  let res_img_con = `<div class="atta_img_block bg-light-blue pb-10"> ${short_des_img}</div>`;
                  let res_txt_con = `<div class="atta_caps_block">${short_des_text}</div>`;
            $(short_des_div).html(res_img_con+res_txt_con);
            $(htmlComponentDiv).html(htmlComponent);
          },
          error: function (err) {
            console.log(err);
          }
        })
      }
</script>

<script>
            
      // fetch sku 
      function fetch_sku() {
        if (sessionStorage.getItem("savedValues")) {
          let data = sessionStorage.getItem("savedValues");
          data = JSON.parse(data);
          let attr_count = $('.attribute_box').length;
          var obj_sku = {};
    
          for (const key in data) {
            obj_sku[key] = data[key].termid;
          }
    
          if (Object.keys(data).length === attr_count) {
            let productId = $("#product_id").val().replace('$', '');

            const final_sku = { [productId]: obj_sku };

            $.ajax({
              url: '{{ url('/sku-fetch') }}', // Make sure this is properly parsed by your server-side framework
              method: 'POST',
              data: {
                "_token": "{{ csrf_token() }}", // Make sure this is properly parsed by your server-side framework
                sku: final_sku,
                url : window.location.href
              },
              success: function (response) {
                console.log(response);
                if(response.status==true){
                  $("#sku").html(response.sku);
                }
              }
            });
          }
        }
      }

    </script>
    
    <script>
      // disabled attribute box
      $(document).ready(function(){
        const search = new URL(window.location.href);
          $(".attribute_box").each(function(index){
              if (index > 0 && sessionStorage.getItem('savedValues') == null && search.search==="") {
                  $(this).addClass('disabled-attr-box');
              }else{
                  $(this).removeClass('disabled-attr-box');
              }
          });
      });

    </script>
@endsection