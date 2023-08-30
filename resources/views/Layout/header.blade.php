<style>
   
   .fl-main-container .fl-container.fl-flasher{
       line-height: 1.5 !important
    }

</style>
<header class="ps-header ps-header--1">
    <div class="ps-noti py-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-4 col-md-4 d-flex align-items-center topleft_socialicons">
                    <ul class="list-inline text-white">
                        <li class="list-inline-item"><a class="ps-social__link facebook" href="#"><i
                                    class="fa fa-facebook fs-3"></i></a></li>
                        <li class="list-inline-item"><a class="ps-social__link twitter" href="#"><i
                                    class="fa fa-twitter fs-3"></i></a></li>
                        <li class="list-inline-item"><a class="ps-social__link youtube" href="#"><i
                                    class="fa fa-youtube fs-3"></i></a></li>
                        <li class="list-inline-item"><a class="ps-social__link instagram" href="#"><i
                                    class="fa fa-instagram fs-3"></i></a></li>
                        <li class="list-inline-item"><a class="ps-social__link linkedin" href="#"><i
                                    class="fa fa-linkedin fs-3"></i></a></li>
                    </ul>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-3 d-xl-flex d-none">
                    <div class="topheader_runningtxt text-white fw-600">
                        {{-- <marquee behavior="scroll" direction="left" scrollamount="5" class="text-white">Reach us now on
                            our new hotline number +49 541 96251000.</marquee> --}}
                        Hotline: <a href="tel:+49 541 96251000"> +49 541 96251000</a> <span class="fs-6 ml-2">(Montag Bis Freitag : 10:00 - 12:30 & 14:00 - 17:00)</span>
                    </div>
                </div>
                <div
                    class="col-xl-4 col-lg-8 col-md-8 d-flex align-items-center justify-content-end topright_userlogin">
                    <ul class="list-inline text-white d-flex align-items-center">
                        <!-- <li class="list-inline-item"><a href="#" class="font-weight-light">Über uns</a></li> -->
                        <!--<li class="list-inline-item">-->
                        <li class="list-inline-item"><a href="{{ route('login') }}"
                                class="">Mein Konto</a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"
                                    class="">Über uns</a></li>
                        <li class="list-inline-item"><a href="{{ route('cart') }}"
                                class="">Warenkorb</a></li>
                        <!--<li class="list-inline-item"><a href="#" class="font-weight-light">Kontakt</a></li>-->

                        @auth
                        <li class="dropdown user_dropdown">
                            <a href="{{ route('user.dashboard') }}"  class="dropdown-toggle shadow-none mr-0" type="button" id="loginuser_dropdown" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="loginuser_dropdown">
                                <a class="dropdown-item user_link d-flex align-items-center justify-content-between" href="{{ route('user.dashboard') }}">Dashboard <i class="icon-grid fw-700"></i></a>
                                <a class="dropdown-item user_link d-flex align-items-center justify-content-between" href="{{ route('user.account') }}">Profile <i class="icon-user fw-700"></i></a>
                                <a class="dropdown-item user_link d-flex align-items-center justify-content-between" href="{{ route('user.orders') }}">Orders <i class="icon-outbox fw-700"></i></a>
                                <a class="dropdown-item user_link d-flex align-items-center justify-content-between" href="{{ route('user.address') }}">Address <i class="icon-map2 fw-700"></i></a>
                                <a href="{{ route('logout') }}" class="user_link d-flex align-items-center justify-content-between mr-0"><span>Logout</span><i class="fa fa-sign-in mr-1"></i></a>
                            </div>
                        </li>
                        @else
                            <a href="{{ route('login') }}" class="user_link">
                                <i class="fa fa-sign-in mr-1"></i>
                                <span>Login</span>
                            </a>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-header__top d-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ps-header__text"><strong><a class="d-flex align-items-center justify-content-center"
                                href="tel:4904042308603"><i class="icon-telephone fs-2 font-weight-bold mr-2"></i> : 49
                                (0) 40 4230 8603</a></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="/"><img class="{{ asset('assets/sticky-logo') }}"
                        src="{{ asset('assets/img/stegpearl/epp-green-white.png') }}" alt="epp.solar"></a></div><a class="ps-menu--sticky"
                href="#"><i class="fa fa-bars"></i></a>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li class="ps-header__item"><a href="{{ route('catalog') }}"><i class="icon-bag2"></i></a></li>
                    <li class="ps-header__item">
                        @auth
                            <a href="{{ route('user.dashboard') }}"><i class="icon-user"></i></a>
                        @else
                            <a href="{{ route('login') }}"><i
                                    class="icon-user"></i></a>
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
                                    <input class="form-control" type="password" name="password"
                                        value="{{ old('password') }}"  />
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group form-check">
                                    <input class="form-check-input" name="remember-me"
                                        {{ old('remember-me') ? 'checked' : '' }} type="checkbox" />
                                    <label>Remember Me</label>
                                </div>
                                <button class="ps-btn ps-btn--warning" type="submit">Log In</button>
                            </form>
                        </div>
                    </li>
                    {{-- <li>
                        <a class="ps-header__item" href="{{ route('user.wishlist') }}"><i class="fa fa-heart-o"></i>
                        <span class="badge">{{ count((array) session('wishlist')) }}</span></a>
                    </li> --}}
                    <li class="ps-header__item">
                        <a href="{{ url('cart') }}" id="cart-mini"><i
                        class="icon-cart-empty"></i><span
                        class="badge my_cart_count">{{ count((array) session('cart')) }}</span></a>
                    </li>
                </ul>
                <!-- <div class="ps-language-currency"><a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupLanguage">English</a><a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupCurrency">USD</a></div> -->
                <div class="ps-header__search">
                    <form >
                    {{-- @csrf --}}
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text" placeholder="Producten zoeken"
                                    id="keyword" name="keyword">
                                <div class="input-group-append bg-light"><a href="javascript:void(0);"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="ps-search--result">
                        <div class="ps-result__content">
                            <div class="row m-0" id="search-results-dropdown">
                            </div>
                            <div class="ps-result__viewall"><a href="{{ route('catalog') }}">Alle Ergebnisse anzeigen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-navigation">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <div class="sticky_logo d-none">
                        <a href="/"><img class="mr-5" style="width: calc(500px - 400px);"
                            src="{{ asset('assets/img/stegpearl/epp-green-white.png') }}" alt="epp.solar"></a>
                    </div>
                    <div class="ps-navigation__left">
                        <nav class="ps-main-menu">
                            <ul class="menu" id="main_menu">
                                <li class="has-mega-menu"><a class="menuName" href="/">Home</a></li>
                                <li class="has-mega-menu  "><a class="menuName" href="{{ route('catalog') }}">Shop</a></li>
                                @foreach (headerCategories() as $cat)
                                    <li class="has-mega-menu"><a class="menuName" href="{{ route('shop', $cat->slug) }}">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="ps-navigation__right d-none"><strong><a class="d-flex align-items-center justify-content-end"
                        href="tel:+49 541 96251000"><i class="icon-telephone fs-2 font-weight-bold mr-2"></i> : +49 541 96251000</a></strong>
            </div>
        </div>
    </div>
</header>
<header class="ps-header ps-header--1 ps-header--mobile">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0 text-white py-3"><strong><a class="d-flex align-items-center justify-content-center"
                        href="tel:+49 541 96251000"><i class="icon-telephone fs-2 font-weight-bold mr-2"></i> : +49 541 96251000</a></strong>
            </p>
        </div> </a>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo py-2"><a href="{{ route('homepage') }}"> <img
                        src="{{ asset('assets/img/stegpearl/epp-green-white.png') }}" alt="epp.solar"></a></div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li><a class="ps-header__item open-search" href="javascript: void(0)"><i
                                class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

 
<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("main_menu");
    var btns = header.getElementsByClassName("menuName");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      if (current.length > 0) { 
        current[0].className = current[0].className.replace(" active", "");
      }
      this.className += " active";
      });
    }
</script>

<script>
    $(document).ready(function() {
       
        $('#keyword').keyup(function() {
            var keyword = $(this).val();
                $('form').on('submit', function(event) {
                    event.preventDefault();
                });
            if (keyword.length >= 2) {
                $.ajax({
                    url: '{{ route('search') }}',
                    method: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(response) {
                        var dropdown = $('#search-results-dropdown');
                        dropdown.empty();

                        if (response.length > 0) {
                            response.slice(0, 4).map(function(item) {
                                let url = "{{ route('product.detail') }}/" + item
                                    .slug;

                                let imageUrl =
                                    "{{ asset('root/public/uploads/') }}/" + item
                                    .thumb_image;
                                console.log(item);
                                dropdown.append('<div class="col-12 col-lg-6">' +
                                    '<div class="ps-product ps-product--horizontal">' +
                                    '<div class="ps-product__thumbnail"><a class="ps-product__image" href="' +
                                    url + '">' +
                                    '<figure><img src="' + imageUrl +
                                    '" alt="alt" /></figure>' +
                                    '</a></div>' +
                                    '<div class="ps-product__content">' +
                                    '<h5 class="ps-product__title"><a href="/product-detail/'+ item.slug+'">' + item
                                    .product_name + '</a></h5>' +
                                    '<p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>' +
                                    '<div class="ps-product__meta"><span class="ps-product__price">' +
                                    '€' + item.sale_price + '</span></div>' +
                                    '</div></div></div>');
                                $(".ps-result__viewall").removeClass('d-none');
                            });
                        } else {
                            dropdown.append(
                                '<a class="dropdown-item" href="#">No results found</a>'
                            );
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

