@extends('../Layout.Layout')

@section("style")
<style>
    /* Custom CSS to reduce Laravel paginate icon size */
     svg { width: 16px; /* Adjust the font size to your desired value */ }
    .new-li { list-style: none; padding-left: 0;}
    .new-li > li { display: flex; align-items: center; margin-bottom: 10px;}
    .new-li > li > a { color: #555; text-decoration: none; display: flex; align-items: center;}
    .new-li > li > a > .fa { margin-right: 5px; width: 10px; }
  </style>

@endsection

@section("content")

    <div class="ps-page">

        <div class="ps-categogy ps-categogy--separate">
            <x-filtter :value="__('DisabledShortBy')">Einkaufen nach Kategorien</x-filtter>
          
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
                                                <span class="sub-toggle {{ count($cat->subcategories) > 0 ? 'd-block' : 'd-none' }}" ><i class="fa fa-chevron-down"></i></span>
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

                         </div>
                    </div>
                    <div class="ps-categogy__product">
                       
                        <div class="row m-0 no-gutters" id="responseContainer">
                            @if(!empty(@$catalog))
                                @foreach($catalog as $product)
                                    <div class="col-12 col-lg-4">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('shop',$product->slug)}}">
                                                    <figure>
                                                        <img src="{{asset('root/public/uploads/category/'.$product->image)}}" alt="alt" class="img-fluid" />
                                                        <img src="{{asset('root/public/uploads/category/'.$product->image)}}" class="img-fluid" alt="alt" />
                                                    </figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                </div>
                                                <div class="ps-product__badge">
                                                    <div class="ps-badge ps-badge--hot">Hot</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                            <a href="{{route('shop',$product->slug)}}"><h6 class="ps-category__title text-center mb-4">{{$product->name}}</h6></a>
                                                <div class="ps-product__actions ps-product__group-mobile d-block">
                                                    <div class="ps-product__cart d-block">
                                           <div class="add_to_cart_box">
                                                <a class="btn cart_btn d-block" href="{{route('shop',$product->slug)}}">Kataloge anzeigen</a>
                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                           @endif

                        </div>

                        <div class="ps-pagination">
                            {{$catalog->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn scroll-top"><i class="fa fa-angle-double-up"></i></button>
   
    <div class="ps-preloader" id="preloader">
        <div class="ps-preloader-section ps-preloader-left"></div>
        <div class="ps-preloader-section ps-preloader-right"></div>
    </div>

  @include('elements.add_to_cart')


    <!-- For Show and hide filter on shop page -->
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
    <!-- For Show and hide filter on shop page -->

@endsection
