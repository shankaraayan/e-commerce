<header class="ps-header ps-header--1">
    <div class="ps-noti py-2">
        <div class="container">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <!--<ul class="list-inline text-white">-->
                    <!--    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
                    <!--</ul>-->
                </div>
                <div class="col d-flex align-items-center justify-content-end">
                    <ul class="list-inline text-white">
                        <!--<li class="list-inline-item"><a href="#" class="font-weight-light">Über uns</a></li>-->
                        <!--<li class="list-inline-item">-->
                             @auth
                                <a href="{{ route('user.dashboard') }}" class="font-weight-light">{{Auth::user()->name}}</a>
                            @else
                                <a href="{{ route('login.register') }}" class="font-weight-light">Mein Konto</a>
                            @endauth

                        </li>
                        <li class="list-inline-item"><a href="{{ route('cart') }}" class="font-weight-light">Warenkorb</a></li>
                        <!--<li class="list-inline-item"><a href="#" class="font-weight-light">Kontakt</a></li>-->
                        <li class="list-inline-item">
                            @auth
                                <a href="{{ route('logout') }}" class="font-weight-light">
                                    <i class="fa fa-sign-in"></i>
                                    <span>Logout</span>
                                </a>
                            @else
                                <a href="{{ route('login.register') }}" class="font-weight-light">
                                    <i class="fa fa-sign-in"></i>
                                    <span>Login</span>
                                </a>
                            @endauth

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-header__top">
        <div class="container">
            <div class="ps-header__text"><strong><a href="tel:4904042308603"><i
                class="icon-telephone fs-2 font-weight-bold"></i> : 49 (0) 40 4230 8603</a></strong>
            </div>
        </div>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="/"><img class="{{ asset('assets/sticky-logo') }}"
                        src="{{ asset('assets/img/stegpearl/Stegpearl.png') }}" alt></a></div><a class="ps-menu--sticky"
                href="#"><i class="fa fa-bars"></i></a>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li class="ps-header__item"><a href="{{ route('shop') }}"><i class="icon-bag2"></i></a></li>
                    <li>
                        @auth
                            <a class="ps-header__item" href="{{ route('user.dashboard') }}"><i class="icon-user"></i></a>
                        @else
                            <a class="ps-header__item" href="{{ route('login.register') }}"><i class="icon-user"></i></a>
                        @endauth
                        <div class="ps-login--modal">
                            <form id="loginForm">
                                @csrf
                                <div class="form-group">
                                    <label>E-Mail Adresse</label>
                                    <input class="form-control" id="email" name="email" type="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Passwort</label>
                                    <input class="form-control" id="password" type="password" name="password"
                                        value="{{ old('password') }}">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group form-check">
                                    <input class="form-check-input" name="remember-me"
                                        {{ old('remember-me') ? 'checked' : '' }} type="checkbox">
                                    <label>Remember Me</label>
                                </div>
                                <button class="ps-btn ps-btn--warning" type="submit">Log In</button>
                            </form>
                        </div>
                    </li>
                    {{--<li>
                        <a class="ps-header__item" href="{{ route('user.wishlist') }}"><i class="fa fa-heart-o"></i>
                        <span class="badge">{{ count((array) session('wishlist')) }}</span></a>
                    </li> --}}
                    <li><a class="ps-header__item" href="{{ url('cart') }}" id="cart-mini"><i class="icon-cart-empty"></i><span
                                class="badge my_cart_count">{{ count((array) session('cart')) }}</span></a>

                        {{-- <div class="ps-cart--mini"> --}}
                            {{-- <ul class="ps-cart__items">
                                <li class="ps-cart__item">
                                    <div class="ps-product--mini-cart"><a class="ps-product__thumbnail"
                                            href="product-default.html"><img
                                                src="{{ asset('assets/img/products/055.jpg') }}" alt="alt" /></a>
                                        <div class="ps-product__content"><a class="ps-product__name"
                                                href="product-default.html">Somersung Sonic X2500 Pro White</a>
                                            <p class="ps-product__meta"> <span class="ps-product__price">$399.99</span>
                                            </p>
                                        </div><a class="ps-product__remove" href="javascript: void(0)"><i
                                                class="icon-cross"></i></a>
                                    </div>
                                </li>
                                <li class="ps-cart__item">
                                    <div class="ps-product--mini-cart"><a class="ps-product__thumbnail"
                                            href="product-default.html"><img
                                                src="{{ asset('assets/img/products/001.jpg') }}"
                                                alt="alt" /></a>
                                        <div class="ps-product__content"><a class="ps-product__name"
                                                href="product-default.html">Digital Thermometer X30-Pro</a>
                                            <p class="ps-product__meta"> <span
                                                    class="ps-product__sale">$77.65</span><span
                                                    class="ps-product__is-price">$80.65</span></p>
                                        </div><a class="ps-product__remove" href="javascript: void(0)"><i
                                                class="icon-cross"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="ps-cart__total"><span>Subtotal </span><span>$399</span></div>
                            <div class="ps-cart__footer"><a class="ps-btn ps-btn--outline"
                                    href="{{ url('cart') }}">View Cart</a><a class="ps-btn ps-btn--warning"
                                      href="checkout.html">Checkout</a></div>
                           </div> --}}
                    </li>
                </ul>
                <!-- <div class="ps-language-currency"><a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupLanguage">English</a><a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupCurrency">USD</a></div> -->
                <div class="ps-header__search">
                    <form action="do_action" method="post">
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text" placeholder="Producten zoeken" id="keyword" name="keyword">
                                <div class="input-group-append"><a href="javascript:void(0);"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="ps-search--result" >
                        <div class="ps-result__content">
                            <div class="row m-0" id="search-results-dropdown">


                            </div>
                            <div class="ps-result__viewall"><a href="{{route('shop')}}">View all results</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-navigation">
        <div class="container">
            <div class="ps-navigation__left">
                <nav class="ps-main-menu">
                    <ul class="menu">
                        <li class="has-mega-menu"><a href="/">Home</a></li>
                        <li class="has-mega-menu">
                            <a href="{{route('shop')}}">Shop</a>
                        </li>
                       @foreach(headerCategories() as $cat)
                        <li class="has-mega-menu"><a href="{{route('shop',$cat->slug)}}">{{$cat->name}}</a></li>
                        @endforeach

                        <!--<li class="has-mega-menu"><a href="javascript:void(0);">Blog</a></li>-->
                        <!--<li class="has-mega-menu"><a href="contact-us.html">Contact</a></li>-->
                    </ul>
                </nav>
            </div>
            <div class="ps-navigation__right"><strong><a href="tel:4904042308603"><i
                            class="icon-telephone fs-2 font-weight-bold"></i> : 49 (0) 40 4230 8603</a></strong>
            </div>
        </div>
    </div>
</header>
<header class="ps-header ps-header--1 ps-header--mobile">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0 text-white"><strong><a href="tel:4904042308603"><i
                            class="icon-telephone fs-2 font-weight-bold"></i> : 49 (0) 40 4230 8603</a></strong>
            </p>
        </div> </a>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="{{route('homepage')}}"> <img src="{{ asset('assets/img/stegpearl/Stegpearl.png') }}"
                        alt></a></div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li><a class="ps-header__item open-search" href="javascript: void(0)"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<script>
$(document).ready(function() {
    $('#keyword').keyup(function() {
        var keyword = $(this).val();

        if (keyword.length >= 2) {
            $.ajax({
                url: '{{route('search')}}',
                method: 'GET',
                data: { keyword: keyword },
                success: function(response) {
                    var dropdown = $('#search-results-dropdown');
                    dropdown.empty();

                    if (response.length > 0) {
                        response.slice(0, 4).map(function(item) {
                            let url = "{{ route('product.detail') }}/" + item.slug;

                            let imageUrl = "{{ asset('root/public/uploads/') }}/" + item.thumb_image;
                            console.log(url);
                            dropdown.append('<div class="col-12 col-lg-6">' +
                                '<div class="ps-product ps-product--horizontal">' +
                                '<div class="ps-product__thumbnail"><a class="ps-product__image" href="' + url + '">' +
                                '<figure><img src="' + imageUrl + '" alt="alt" /></figure>' +
                                '</a></div>' +
                                '<div class="ps-product__content">' +
                                '<h5 class="ps-product__title"><a>'+ item.product_name +'</a></h5>' +
                                '<p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>' +
                                '<div class="ps-product__meta"><span class="ps-product__price">'+'€'+item.price+'</span></div>' +
                                '</div></div></div>');
                                $(".ps-result__viewall").removeClass('d-none');
                        });
                    } else {
                        dropdown.append('<a class="dropdown-item" href="#">No results found</a>');
                         $(".ps-result__viewall").addClass('d-none');
                    }

                    dropdown.show();
                }
            });
        } else {
            $('#search-results-dropdown').empty().hide();
        }
    });
});





</script>