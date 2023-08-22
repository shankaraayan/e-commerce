@extends('../Layout.Layout')

@section("style")
<style>

    svg {
        width: 16px; /* Adjust the font size to your desired value */
    }

    .menu--mobile>li{
        padding:5px 0px;
    }
    .new-li {
        list-style: none;
        padding-left: 0;
    }

    .new-li > li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .new-li > li > a {
        color: #555;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .new-li > li > a > .fa {
        /* Add your styles for the arrow here */
        margin-right: 5px; /* Adjust the margin to control the space between arrow and text */
        width: 10px; /* Adjust the width to make the arrow narrow */
    }
    </style>

@endsection

@section("content")
{{-- @dd(@$products); --}}
    <div class="ps-page">

        <div class="ps-categogy ps-categogy--separate">
            <x-filtter :value="__('na')">Shop</x-filtter>
            <div class="container">
                <!--<h1 class="ps-categogy__name mt-5">Shop</h1>-->
                @php
                    
                    $currentUri = $_SERVER['REQUEST_URI'];
                    $segments = explode('/', $currentUri);
                    $lastSegment = end($segments);

                @endphp
                
            </div>

            <div class="ps-categogy__main pb-40">
                <div class="container">
                    <div class="ps-categogy__widget">
                        <a href="javascript:void(0);" id="close-widget-product"><i class="fa fa-times"></i></a>
                        <div class="ps-widget ps-widget--product bg-white shadow pt-xl-5 pt-lg-5 pt-md-5 pt-3">
                            <div class="ps-widget__block">
                                <h4 class="ps-widget__title">Produkt-Kategorien</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                                <div class="ps-widget__content ps-widget__category">
                                 <ul class="menu--mobile">
                                        @if(!empty(@$Category))
                                            @foreach($Category as $cat)
                                                <li><a href="{{route('shop',$cat->slug)}}" id="{{$cat->id}}" onclick="categoryProduct(this.id);">{{ $cat->name }}</a>
                                                <span class="sub-toggle {{ count($cat->subcategories) > 0 ? 'd-block' : 'd-none' }}"><i class="fa fa-chevron-down"></i></span>
                                                    @if(count($cat->subcategories) > 0)
                                                    <ul class="sub-menu" style="display: none;">
                                                        @foreach($cat->subcategories as $subcat)
                                                            <li>
                                                                <a href="{{ route('shop', $subcat->slug) }}" id="{{ $subcat->id }}" onclick="categoryProduct(this.id);">
                                                                    {{ $subcat->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="ps-widget__block">
                                <h4 class="ps-widget__title">Ähnliche Produkte</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                                <div class="ps-widget__content" id="similarProductCon">
                                   
                                    @if(!empty(@$products))
                                        @foreach($products as $key => $product)
                                        
                                            @if($key == 5)
                                                @break
                                            @endif
                                            
                                                <div class="ps-widget__item">
                                                    <div class="row no-gutters">
                                                        <div class="col-3">
                                                            <div class="product_pics">
                                                                <img src="{{asset('root/public/uploads/'.$product->thumb_image)}}" class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-9 pl-3">
                                                        <div class="product_info_rel">
                                                            <p class="product_info_name ps-product__title">{{ $product->product_name }}</p>
                                                            {{-- <div class="product_info_price">€{{formatPrice($product->price)}} - €{{formatPrice($product->sale_price)}}</div> --}}
                                                            {{-- <div class="product_info_price fs-4">{{ formatPrice($product->sale_price) }}</div> --}}
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            
                                        @endforeach
                                    @endif


                            </div>
                         </div>
                    </div>
                    </div>
                    
                    <div class="ps-categogy__product">
                        <div class="row">
                            <div class="col-12">
                             <div class="category_banner">
                             @php
                                $banner = categories()->where('slug',$lastSegment)->pluck('banner')->first();
                             @endphp
                                @if($banner != null)
                                <img src="{{asset('root/public/uploads/category/'.$banner)}}" class="img-fluid w-100 rounded">
                                @else
                                <img src="https://campergold.net/wp-content/uploads/2023/05/campergold-2.jpg" class="img-fluid w-100 rounded">
                                @endif
                             </div>
                            </div>
                        </div>
                        <div class="row m-0 no-gutters" id="responseContainer">
                            @if(!empty(@$products))
                                @foreach($products as $product)
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image" onclick="addSimiliarProductId({{$product->id}})" href="{{route('product.detail',$product->slug)}}">
                                                    <figure>
                                                        <img src="{{asset('root/public/uploads/'.$product->thumb_image)}}" alt="alt" class="img-fluid" />
                                                        <img src="{{asset('root/public/uploads/'.$product->thumb_image)}}" class="img-fluid" alt="alt" />
                                                    </figure>
                                                </a>
                                               {{-- <div class="ps-product__actions">
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" id="{{$product->id}}" onclick="add_wishlist(this.id)" data-original-title="Wishlist"><a><i class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick view"><a href="javascript:void(0);" onclick="quickViewProducts( '{{$product->slug}}' );"><i class="fa fa-search"></i></a></div>
                                                </div> --}}
                                                <div class="ps-product__badge">
                                                    <div class="ps-badge ps-badge--hot">Hot</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content text-center">
                                            
                                                <a class="fs-5" href="{{ route('shop', ['slug' => categories()->where('id', $product->categories)->pluck('slug')->first()]) }}">
                                                    {{ categories()->where('id', $product->categories)->pluck('name')->first() }}
                                                </a>
                                                {{-- <a class="ps-product__branch" href="{{route('product.detail',$product->slug)}}">{{ categories()->where('id',$product->categories)->pluck('name')->first();}}</a> --}}
                                                {{-- <span>,</span> <a class="ps-product__branch" href="#">Subcategory</a> --}}
                                                
                                                <a onclick="addSimiliarProductId({{$product->id}})"  href="{{route('product.detail',$product->slug)}}"><h5 class="ps-product__title">{{$product->product_name}}</h5></a>
                                                <div class="ps-product__meta text-center">
                                                    @php
                                                        $attributeIDs = ($product->attributes_id);
                                                        $result = explode(',', $attributeIDs);
                                                        $prices = minmaxPrice($result);
                                                        // @dd($prices);die;
                                                    @endphp

                                                    {{-- @dd($prices['min_price']); --}}
                                                    {{-- @dd($product->type); --}}
                                                    @if ($product->type==='variable')
                                                        <span class="ps-product__price text-green">{{ formatPrice($prices['min_price']) .' - '.formatPrice($prices['sum_of_max_prices']) }}</span>
                                                    @else
                                                        <span class="ps-product__del text-muted">{{ formatPrice($product->price) }}</span>
                                                        <span class="ps-product__price text-green">{{ formatPrice($product->sale_price) }}</span>
                                                    @endif
                                                </div>

                                                

                                                {{-- <div class="ps-product__desc mb-4">
                                                    <p>{{$product->slug}} </p>
                                                </div> --}}
                                                <div class="ps-product__actions ps-product__group-mobile d-block">
                                                    <div class="ps-product__cart d-block">
                                                        @if($product->type !='variable')
                                                        <div class="add_to_cart_box"><a class="btn cart_btn d-block" href="javascript:void(0)" onclick="add_to_cart('{{ $product->id }}')">Add to cart</a>
                                                        </div>
                                                    @else
                                                    <div class="add_to_cart_box">
                                                            <a onclick="addSimiliarProductId({{$product->id}})" class="btn cart_btn d-block" href="{{route('product.detail',$product->slug)}}">View</a>
                                                        </div>
                                                    @endif
                                                    </div>
                                                    <!-- <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                           @endif

                        </div>
                        <div class="ps-pagination text-center">
                            {{$products->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>


        </div>
    </div>

    <div class="ps-search">
        <div class="ps-search__content ps-search--mobile"><a class="ps-search__close" href="#" id="close-search"><i class="icon-cross"></i></a>
            <h3>Search</h3>
            <form action="do_action" method="post">
                <div class="ps-search-table">
                    <div class="input-group">
                        <input class="form-control ps-input" type="text" placeholder="Producten zoeken">
                        <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a></div>
                    </div>
                </div>
            </form>
            <div class="ps-search__result">
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/052.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3-layer <span class='hightlight'>mask</span> with an elastic band (1 piece)</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price">$38.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/033.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3 Layer Disposable Protective Face <span class='hightlight'>mask</span>s</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$14.52</span><span class="ps-product__del">$17.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/051.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3-Ply Ear-Loop Disposable Blue Face <span class='hightlight'>mask</span></a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$14.99</span><span class="ps-product__del">$38.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/050.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>Disposable Face <span class='hightlight'>mask</span> for Unisex</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$8.15</span><span class="ps-product__del">$12.24</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn scroll-top"><i class="fa fa-angle-double-up"></i></button>
    <!-- Quick view modal -->
    <div class="modal fade" id="popupQuickview" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ps-quickview">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-quickview__body">
                        <button class="close ps-quickview__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-product--detail" id="quick-product-details">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal -->
    <div class="ps-preloader" id="preloader">
        <div class="ps-preloader-section ps-preloader-left"></div>
        <div class="ps-preloader-section ps-preloader-right"></div>
    </div>

  @include('elements.add_to_cart')


 

<script>
    function categoryProduct(id) {
        $.ajax({
            url: '{{route('categories-product')}}',
            method: 'GET',
            data: { category_id: id },
            success: function(response) {
                var data = response.products;
                $('#responseContainer').empty();
                if (data.length > 0) {
                    data.forEach(function(product) {
                        // console.log(product);
                        var categoryName = JSON.parse('{!! json_encode(htmlspecialchars(categories()->where('id', $product->categories)->pluck('name')->first())) !!}');
                        var html = `<div class="col-12 col-md-6 col-sm-6 col-lg-4 p-0">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('product.detail',$product->slug)}}">
                                                    <figure><img src="{{asset('root/public/uploads/${product.thumb_image}')}}" alt="alt" class="img-fluid" /><img src="img/stegpearl/easy peak power.png" class="img-fluid" alt="alt" />
                                                    </figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                                </div>
                                                <div class="ps-product__badge">
                                                    <div class="ps-badge ps-badge--hot">Hot</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <a class="ps-product__branch" href="#">${categoryName}</a>
                                                {{-- <span>,</span> <a class="ps-product__branch" href="#">Subcategory</a> --}}

 
                                                <a href="{{route('product.detail',$product->slug)}}"><h5 class="ps-product__title">${ product.product_name }</h5></a>
                                                <div class="ps-product__meta">
                                                    <span class="ps-product__price"><s>€${ product.price }</s></span>
                                                    <span class="ps-product__price">€${ product.sale_price }</span>
                                                </div>

                                                <div class="ps-product__desc d-none mb-4">
                                                    <p>${ product.slug } </p>
                                                </div>
                                                <div class="ps-product__actions ps-product__group-mobile d-block">

                                                    <div class="ps-product__cart d-block">
                                                    <a class="ps-btn ps-btn--warning w-100" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a>
                                                    </div>

                                                    <!-- <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                $('#responseContainer').append(html);

                    });
                }else{
                    var noProductHtml = '<div class="col-12"  style="height:500px">' +
                        '<p>No product found</p>' +
                        '</div>';
                    $('#responseContainer').append(noProductHtml);
                }
            }
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const sortLinks = document.querySelectorAll('a[data-sort]');

    sortLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const sortValue = this.getAttribute('data-sort');
                updateSortQueryParams(sortValue);
            });
        });

    function updateSortQueryParams(sortValue) {
        const urlParams = new URLSearchParams(window.location.search);
        const currentSortValue = urlParams.get('orderBy');
        
        if (currentSortValue !== sortValue) {
            urlParams.set('orderBy', sortValue);
        } else {
            urlParams.delete('orderBy');
        }
        const baseUrl = window.location.origin + window.location.pathname;
        const newUrl = baseUrl + '?' + urlParams.toString();
        window.history.pushState({}, '', newUrl);
        updateDisplayedProducts(sortValue);
    }
    function updateDisplayedProducts(sortValue) {
        var url = "{{request()->url()}}";
        var segments = url.split('/');
        var lastSegment =  segments[segments.length - 1];
         $.ajax({
                url: '{{route('categories-product')}}',
                method: 'GET',
                data: { category: lastSegment,shortBy: sortValue},
                success: function(response)
                {
                var data = response.products;
                $('#responseContainer').empty();
                if (data.length > 0) {
                    data.forEach(function(product) {
                        // console.log(product);
                        var categoryName = JSON.parse('{!! json_encode(htmlspecialchars(categories()->where('id', $product->categories)->pluck('name')->first())) !!}');
                        var html = `<div class="col-12 col-lg-4 p-0">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('product.detail',$product->slug)}}">
                                                    <figure><img src="{{asset('root/public/uploads/${product.thumb_image}')}}" alt="alt" class="img-fluid" /><img src="img/stegpearl/easy peak power.png" class="img-fluid" alt="alt" />
                                                    </figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                                </div>
                                                <div class="ps-product__badge">
                                                    <div class="ps-badge ps-badge--hot">Hot</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <a class="ps-product__branch" href="#">${categoryName}</a>
                                                {{-- <span>,</span> <a class="ps-product__branch" href="#">Subcategory</a> --}}


                                                <a href="{{route('product.detail',$product->slug)}}"><h5 class="ps-product__title">${ product.product_name }</h5></a>
                                                <div class="ps-product__meta">
                                                    <span class="ps-product__price"><s>€${ product.price }</s></span>
                                                    <span class="ps-product__price">€${ product.sale_price }</span>
                                                </div>

                                                <div class="ps-product__desc d-none mb-4">
                                                    <p>${ product.slug } </p>
                                                </div>
                                                <div class="ps-product__actions ps-product__group-mobile d-block">

                                                    <div class="ps-product__cart d-block">
                                                    <a class="ps-btn ps-btn--warning w-100" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a>
                                                    </div>

                                                    <!-- <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                $('#responseContainer').append(html);

                    });
                }else{
                    var noProductHtml = '<div class="col-12"  style="height:500px">' +
                        '<p>No product found</p>' +
                        '</div>';
                    $('#responseContainer').append(noProductHtml);
                }
                    
                }
            });
        
    }

});
</script>

<script>
    function add_wishlist(id){
       $.ajax({
            url: '/add_to_wishlist/'+id,
            method: 'get',
            data: { id: id },
            success: function(response)
            {
                console.log(response);
            }
       });
    }

    function quickViewProducts(slug) {
        $.ajax({
            url: "{{ route('quick.view') }}", // Add the missing comma here
            method: 'GET',
            data: { slug: slug },
            success: function(response) {
                console.log(response);
                $("#quick-product-details").html(`
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <img src="{{ asset('root/public/uploads/') }}/${response.thumb_image}" alt="${response.thumb_image}" />
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="ps-product__info">
                                <div class="ps-product__badge"><span class="ps-badge ps-badge--instock"> IN STOCK</span>
                                </div>
                                <div class="ps-product__branch"><a class="ps-product__branch" href="#">Balkonkraftwerk</a><span>,</span> <a class="ps-product__branch" href="#">Easy Peak Power</a></div>
                                <div class="ps-product__title"><a href="#">${response.product_name}</a></div>
                                {{-- <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4" selected="selected">4</option>
                                        <option value="5">5</option>
                                    </select><span class="ps-product__review">(5 Reviews)</span>
                                </div> --}}
                                
                                ${response.type !== 'variable' ? 
                                    `<div class="ps-product__desc mb-4">
                                        <p>${response.product_description}</p>
                                    </div>
                                    <div class="ps-product__meta"><span class="ps-product__price">
                                        € ${response.price}</span>
                                    </div>` :''
                                }
        
                                <div class="ps-product__quantity">
                                    ${response.type !== 'variable' ? 
                                        `<div>
                                            <h6>Quantity</h6>
                                            <div class="d-flex align-items-center">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus" id="minus-btn"><i class="icon-minus"></i></button>
                                                    <input class="quantity" min="1" id="quantity" name="quantity" value="1" type="number" />
                                                    <button class="plus" id="plus-btn"><i class="icon-plus"></i></button>
                                                </div>
                                                
                                                <div class="add_to_cart_box">
                                                    <a class="btn cart_btn d-block" href="javascript:void(0)" onclick="add_to_cart('${response.id}')">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>`: 
                                        `<div class="add_to_cart_box">
                                            <a class="btn cart_btn d-block" href="{{route('product.detail')}}/${response.slug}">View</a>
                                        </div>`}
                                </div>
                                </div>
                                <div class="ps-product__type">
                                    <ul class="ps-product__list">
                                        {{--<li> <span class="ps-list__title">Tags: </span><a class="ps-list__text" href="#">Schukostecker</a><a class="ps-list__text" href="#">Ohne WIFI</a>
                                        </li> --}}
                                        <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">${response.sku}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
                if(response.type!=="variable"){
                    quntity_handle();
                }
                    
                $(document).ready(function(){
                    
                    $("#popupQuickview").modal('show');
                })
                
            },
            error: function(error) {
                console.log(error);
            }
        });
    }


   

</script>


    <script>
        $(document).ready(function () {
            window.addEventListener('resize', function () {
                var minWidth = 1024;
                var element = document.getElementsByClassName('ps-categogy__main');
                //console.log(window.innerWidth, "slmvnsdakjdjjklafaof");
                if (window.innerWidth >= minWidth) {
                    element[0].classList.add('active');
                } else {
                    element[0].classList.remove('active');
                }
            });
            var minWidth = 1024;
            var element = document.getElementsByClassName('ps-categogy__main');
          //  console.log(window.innerWidth, "slmvnsdakjdjjklafaof");
            if (window.innerWidth >= minWidth) {
                //console.log(element[0]);
                element[0].classList.add('active');
            } else {
                element[0].classList.remove('active');
            }
        });
        
    </script>

<script>
  function quntity_handle(){
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
  }
</script>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel();
    })
</script>

<!-- similar product coding -->
<script>
   function addSimiliarProductId(id){
        sessionStorage.setItem('simProductId',id);
    }

    $(document).ready(function(){
        
        // fetch similiar products
        if( sessionStorage.getItem('simProductId')){
            let id = sessionStorage.getItem('simProductId');
      
            var data="";
            $.ajax({
                url: "/api/similar-products/"+id,
                method: 'get',
                data: {
                        "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);
                    return false;
                    response.map((item, index) => {
                    data += `
                    <a href="/product-detail/${item.slug}">
                        <div class="ps-widget__item">
                            <div class="row no-gutters">
                                <div class="col-3">
                                    <div class="product_pics">
                                        <img src="/root/public/uploads/${item.thumb_image}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="col-9 pl-3">
                                    <div class="product_info_rel">
                                        <p class="product_info_name ps-product__title">${item.product_name}</p>
                                        <div class="product_info_price fs-4">€${item.price}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    `;
                });

                    $("#similarProductCon").html(data);
                },
                error : function(err){
                    console.log(err);
                }
            })
        }
    })
</script>

<!-- end similar product coding -->
@endsection
