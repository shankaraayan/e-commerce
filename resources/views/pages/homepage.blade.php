@extends('../Layout.Layout')

@section('content')
    <!---------------- Home Page Start --------------------->
    <div class="ps-home ps-home--1">
        <section class="ps-section--banner">
            <div class="ps-section__overlay">
                <div class="ps-section__loading"></div>
            </div>
            <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="8000" data-owl-gap="0"
                data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
                data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
               
               {{-- @dd($sliders->toarray()); --}}
                
                {{-- @dd($sliders); --}}
                @if(!empty($sliders))
                    @foreach($sliders as $values)
                            <!-- Image for desktop -->
                            <a href="{{$values->slider_url}}">
                            <div class="ps-banner">
                                <picture>
                                    <source media="(min-width: 768px)" srcset="{{ asset('root/public/uploads/sliders/desktop/' . $values['desktop']) }}" class="img-fluid">
                                    <img src="{{ asset('root/public/uploads/sliders/phone/' . $values['phone']) }}" alt="Epp Solar" class="img-fluid">
                                </picture>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </section>

        <div class="ps-home__content">
            <div class="container">
                <div class="ps-promo my-5 ps-section--category ps-section--latest ps-category--image mt-5">
                    <h2 class="ps-section__title">Beliebte Kategorien</h2>
                    <div class="row justify-content-center">
                        @foreach(categories()->where('parent_id','0') as $cat)
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-lg-0 mb-4 px-3">
                                <div class="homepage_category rounded border p-1">
                                    <div class="ps-promo__item">
                                        <a class="ps-category__image ps-promo__banner" href="{{route('shop',$cat->slug)}}">
                                            <img class="ps-promo__banner" src="{{asset('root/public/uploads/category/'.$cat->image)}}" alt="{{ @$cat->image }}">
                                        </a>
                                    </div>
                                    <div class="text-center fs-3 fw-600 text-blue my-3">
                                        {{ $cat->name }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            
            <section class="ps-section--deals pb-5 bg-light-blue">
                <div class="container">
                <div class="ps-section__header mb-0">
                    <h2 class="ps-section__title">Bestseller-Produkte</h2>
                </div>
                <div class="ps-section__carousel border-0">
                        <div class="owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
            
                        {{-- product Card --}}
                        <div class="owl-stage-outer py-md-5 py-2">
                            <div class="owl-stage" style="transform: translate3d(-2228px, 0px, 0px); transition: all 1s ease 0s; width: 4706px;">
                
                            <x-product-small-card :productData="$bestSellingProducts" />

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
            

            <section class="homepage-video pt-50 pb-50">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-md-6">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/DPNi84fXucw?si=KsYLCLaTW0BXpoUb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                  <div class="col-12 col-md-6 mt-5 mt-md-0">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/zvM7pkltqnY?si=DNb1ziyziaV9wglA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                  </div>
                </div>
                 </div>
            </section>

            <section class="homepage-about pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="about_block bg-blue-theme p-5 rounded">
                                <h1 class="text-left text-white mb-0 pb-20">Die Zukunft gestalten mit EPP Solar: Ihr strahlender Weg zu bezahlbarer und nachhaltiger Energie!</h1>
                                <p class="text-white">EPP Solar ist ein führender E-Commerce-Marktplatz, der hochwertige Solarmodule zum besten Preis anbietet. Unser breites Produktsortiment umfasst verschiedene Balkonkraftwerk, Wechselrichter, <b>Speichersysteme</b>, Montagesysteme und andere photovoltaische Zubehörteile, die für unterschiedliche Kundenbedürfnisse geeignet sind, ob für den persönlichen oder geschäftlichen Gebrauch in <b>B2B oder B2C</b>.</p>
                                <p class="text-white">Dank unserer umfassenden Kenntnisse im Bereich Photovoltaik und einem engagierten Team von Experten können wir unseren Kunden eine schnelle Lieferzeit, flexible Zahlungsoptionen und maßgeschneiderte Lösungen anbieten.</p>
                                <p class="text-white">Bei EPP Solar streben wir danach, unseren Kunden die bestmöglichen Angebote zu bieten und hochwertige Produkte zu liefern. Unser Ziel ist es, ein führender Marktplatz für Solartechnikprodukte zu sein, auf dem Kunden ihre gewünschten Artikel auf benutzerfreundliche Weise finden oder kaufen können.</p>
                                <p class="text-white">Wir sind stolz darauf, unseren Kunden eine breite Palette an Solarprodukten anzubieten, die jedes Budget abdecken. Ob Sie eine einzelne Solarmodule oder ein
                                    komplettes Photovoltaiksystem suchen, bei uns werden Sie fündig.</p>
                                <p class="text-white">Mit EPP Solar können Sie auf erneuerbare Energien umsteigen und nicht nur die Umwelt schonen, sondern auch langfristig Geld sparen. Wir sind davon überzeugt, dass Solarenergie die Zukunft ist und möchten unseren Kunden dabei helfen, diese Zukunft aktiv mitzugestalten.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="homepage-banner d-none">
                <div class="container">
                    <div class="ps-promo mt-5 mb-3 pt-5">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="ps-promo__item">
                                    <img class="ps-promo__banner" src="{{ asset('assets/img/stegpearl/hybrid-01.jpg') }}" alt="Epp Solar" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="ps-promo__item">
                                    <img class="ps-promo__banner" src="{{ asset('assets/img/stegpearl/solar-01.jpg') }}" alt="Epp Solar" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ps-section--deals pb-5 bg-light-blue">
                <div class="container">
                <div class="ps-section__header mb-0">
                    <h2 class="ps-section__title">Die besten Deals der Woche!</h2>
                </div>
                <div class="ps-section__carousel border-0">
                      <div class="owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
            
                        {{-- product Card --}}
                        <div class="owl-stage-outer py-md-5 py-2">
                          <div class="owl-stage" style="transform: translate3d(-2228px, 0px, 0px); transition: all 1s ease 0s; width: 4706px;">
                           
                            <x-product-small-card :productData="$featuredProducts" />

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

            <div class="container">
                
                <section class="ps-about--info mt-5 pb-5">
                    <h2 class="ps-about__title">Warum EPP Solar ?</h2>
                    <div class="ps-about__extent">
                        <div class="row m-0">
                            <div class="col-12 col-md-4 p-0">
                                <div class="ps-block--about">
                                    <div class="ps-block__icon"><i class="fa fa-mobile"></i></div>
                                    <h4 class="ps-block__title">Experten Beratung</h4>
                                    <div class="ps-block__subtitle">Wir sind telefonisch und per Mail für Sie erreichbar: vor, während und nach dem Kauf. Wenn Sie Hilfe benötigen, melden Sie sich gerne bei uns. Unsere erfahrenen Berater helfen Ihnen weiter.</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 p-0">
                                <div class="ps-block--about">
                                    <div class="ps-block__icon"><i class="fa fa-cubes"></i></div>
                                    <h4 class="ps-block__title">Selber Aufbauen</h4>
                                    <div class="ps-block__subtitle">All unsere Produkte sind so ausgewählt, dass sie mit unseren Montageanleitungen möglichst einfach aufgebaut werden können. So können Sie viel Geld sparen.</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 p-0">
                                <div class="ps-block--about">
                                    <div class="ps-block__icon"><i class="fa fa-truck"></i></div>
                                    <h4 class="ps-block__title">Schneller Versand</h4>
                                    <div class="ps-block__subtitle">Neben günstigen Angeboten, Rabattaktionen und Mengenrabatten profitieren Sie auch von schnellem Versand innerhalb Deutschlands.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <section class="ps-section--reviews" data-background="{{ asset('assets/img/stegpearl/roundbg.png') }}">
                <h2 class="ps-section__title"> Unsere Marktplätze</h2>
                <div class="ps-section__content">

                    <div class="owl-carousel owl-loaded owl-drag container mx-auto" data-owl-auto="false" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="20" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="owl-stage-outer py-md-5 py-2">
                            <div class="owl-stage" style="transform: translate3d(-2228px, 0px, 0px); transition: all 1s ease 0s; width: 4706px;"> 
                              <div class="owl-item">
                                <a href="javascript:void(0)">
                                    <div class="ps-review">
                                        <div class="ps-review__text">
                                            <img src="{{ asset('assets/img/stegpearl/kaufland.webp') }}" class="img-fluid"
                                                alt="kaufland">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-item">
                                <a href="javascript:void(0)">
                                    <div class="ps-review">
                                        <div class="ps-review__text">
                                            <img src="{{ asset('assets/img/stegpearl/amazon.webp') }}" class="img-fluid"
                                                alt="amazon">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-item">
                                <a href="javascript:void(0)">
                                    <div class="ps-review">
                                        <div class="ps-review__text">
                                            <img src="{{ asset('assets/img/stegpearl/otto.webp') }}" class="img-fluid"
                                                alt="otto">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-item">
                                <a href="javascript:void(0)">
                                    <div class="ps-review">
                                        <div class="ps-review__text">
                                            <img src="{{ asset('assets/img/stegpearl/ebay.webp') }}" class="img-fluid"
                                                alt="ebay">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <section class="ps-section--newsletter" data-background="{{ asset('assets/img/newsletter-bg.jpg') }}">
                    <h3 class="ps-section__title">Abonnieren Sie unseren Newsletter<br> und erhalten Sie die
                        neuesten Produktangebote</h3>
                    <div class="ps-section__content">
                        <form action="/subscribe-email" method="post">
                            @csrf
                            <div class="ps-form--subscribe">
                                <div class="ps-form__control">
                                    <input class="form-control ps-input" name="email" type="email" required
                                        placeholder="Enter your email address">
                                    <button class="ps-btn ps-btn--warning">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!--------------- Product Category Section ------------------------->
    @include('elements.add_to_cart')

@endsection
