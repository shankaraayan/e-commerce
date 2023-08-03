<footer class="ps-footer ps-footer--1">
    <div class="ps-footer--top">
        <div class="container">
            <div class="row m-0">
                <div class="col-6 col-sm-3 py-2">
                    <div class="footer_usp_icon text-center pt-2">
                        <i class="icon-return2"></i>
                    </div>
                    <div class="footer_usp_txt">
                        <p class="text-center pt-1 pb-1">Kostenloser Rückversand</p>
                    </div>
                </div>
                <div class="col-6 col-sm-3 py-2">
                    <div class="footer_usp_icon text-center pt-2">
                        <i class="icon-box"></i>
                    </div>
                    <div class="footer_usp_txt">
                        <p class="text-center pt-1 pb-1">Original verpackte neue Waren</p>
                    </div>
                </div>
                <div class="col-6 col-sm-3 py-2">
                    <div class="footer_usp_icon text-center pt-2">
                        <i class="icon-lock"></i>
                    </div>
                    <div class="footer_usp_txt">
                        <p class="text-center pt-1 pb-1">Sichere Verarbeitung</p>
                    </div>
                </div>
                <div class="col-6 col-sm-3 py-2">
                    <div class="footer_usp_icon text-center pt-2">
                        <i class="icon-truck"></i>
                    </div>
                    <div class="footer_usp_txt">
                        <p class="text-center pt-1 pb-1">Zahlung und Versand</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="ps-footer__middle">
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="ps-footer--address">
                                <div class="ps-logo"><a href="{{ route('homepage') }}"> <img
                                            src="{{ asset('assets/img/stegpearl/Stegpearl-de-white.png') }}" alt></a>
                                </div>
                                <div class="ps-footer__title">Our store</div>
                                <p>Neuer Wall 50, <br>20354 Hamburg, <br>Deutschland</p>
                                <p><a target="_blank"
                                        href="https://www.google.com/maps/place/Stegpearl+Germany+GmbH+-+Osnabr%C3%BCck/@52.2782942,7.8986899,12z/data=!4m10!1m2!2m1!1sSolar+Energy+Company!3m6!1s0x6c9f7d61a8f1fd47:0x294e29b9efd94a44!8m2!3d52.2779866!4d8.0554296!15sChRTb2xhciBFbmVyZ3kgQ29tcGFueZIBFHNvbGFyX2VuZXJneV9jb21wYW554AEA!16s%2Fg%2F11shcvx0ys?entry=ttu">Show
                                        on map</a></p>
                                <ul class="ps-social">
                                    <li><a class="ps-social__link linkedin" href="#"><i
                                                class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="ps-footer--contact">
                                <h5 class="ps-footer__title">Kontakt Informationen</h5>
                                <div class="ps-footer__fax"><i class="icon-telephone"></i><a href="tel:4904042308603">49
                                        (0) 40 4230 8603</a></div>
                                <p class="ps-footer__work">Geschäftszeiten: <br> Montag bis Freitag: 09:00 -
                                    16:00 Uhr</p>
                                <hr style="border-top-color: var(--green-color);">
                                <p class="text-white"><i class="icon-envelope"></i><a class="ps-footer__email"
                                        href="mailto:germany@stegpearl.com"> germany@stegpearl.com </a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Kategorie</h5>
                                <ul class="ps-block__list">
                                    <li><a href="#">Balkonkraftwerk</a></li>
                                    <li><a href="#">Solar Komplettset</a></li>
                                    <li><a href="#">Easy Peak Power</a></li>
                                    <li><a href="#">Wechselrichter</a></li>
                                    <li><a href="#">Balkonkraftwerk Solar Hook</a></li>
                                    <li><a href="#">Balkonkraftwerk Marketing Produkt</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Schnelllinks</h5>
                                <ul class="ps-block__list">
                                    <li><a href="#">Über uns</a></li>
                                    <li><a href="#">Impressum</a></li>
                                    <li><a href="#">Datenschutzerklärung</a></li>
                                    <li><a href="#">Agb</a></li>
                                    <li><a href="#">Kontakt</a></li>
                                    <li><a href="#">Support ticket</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="ps-footer--bottom">
            <div class="row">
                <div class="col-12 col-md-6">
                    <p>Copyright © 2023 Stegpearl. Alle Rechte vorbehalten</p>
                </div>
                <div class="col-12 col-md-6 text-right"><img
                        src="https://campergold.net/wp-content/uploads/elementor/thumbs/paypal-plus-logo-p6reqcckrq9vz2hup9uo8cw42gewnawmxylsyq0w62.png"
                        alt><img class="payment-light" src="{{ asset('assets/img/payment-light.png') }}" alt></div>
            </div>
        </div>
    </div>
</footer>
{{-- Disclaimer  --}}



@php
    $cookieValue = request()->cookie('disclaimer');
@endphp   
@if(empty($cookieValue))
<div class="disclaimer-bar" id="disclaimerBar">
    <div class="d-lg-flex align-items-center justify-content-between">
    <div class="cookie_text_data text-left">
        <p>Wir verwenden Cookies auf unserer Website, um Ihnen die relevanteste Erfahrung zu bieten, indem wir uns an Ihre Vorlieben erinnern und Besuche wiederholen. Durch Klicken auf "Akzeptieren" stimmen Sie der Verwendung ALLER Cookies zu.</p>
    </div>
    <div class="d-flex align-items-center justify-content-end">
        <span class="detail-btn btn mr-1 fs-5" data-toggle="modal" data-target="#arky_cookies_Modal" ><u>Einstellungen</u></span>
        <span class="accept-btn mr-3 btn fs-5" onclick="setCookieViaAjax()">Akzeptieren</span>
        <span class="close-btn btn fs-5" onclick="closeDisclaimer()">Schließen</span>
    </div>
</div>
</div>
@endif
<!-- The Modal -->
<div class="modal" id="arky_cookies_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="font-family: inherit;font-size: 16px;margin-bottom: 15px;margin: 10px 0;">Overview of data protection</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p style="font-family: inherit;font-size: 12px;margin-bottom: 15px;margin: 0 0 12px 0;">
            This website uses cookies to improve your experience as you navigate through the website. Out of these, the cookies that are categorized as necessary are stored on your browser as they are essential for the working of basic functionalities of the website. We also use third-party cookies to help us analyze and understand how you use this website. These cookies are only stored in your browser with your consent. You also have the option to refuse these cookies. However, opting out of some of these cookies may impact your browsing experience.
        </p>

        <div class="cookies_data_modal">
            <div id="cookies_accordion">
            <div class="card mb-2">
                <div class="card-header" id="headingOne">
                <div class="mb-0 d-flex align-items-center justify-content-between">
                    <div class="w-100">
                    <a class="btn btn-link d-block fs-4 text-left" data-toggle="collapse" data-target="#cookies_collapseOne" aria-expanded="true" aria-controls="cookies_collapseOne">Functional</a>
                    </div>
                    <!-- <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                        <input type="checkbox" checked hidden>
                        <span class="circle"></span>
                    </label>
                    </div> -->

                    <!-- HTML code -->
                    <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span id="cookiesStatus" class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                            <input type="checkbox" checked hidden>
                            <span class="circle"></span>
                        </label>
                    </div>
                </div>
                </div>
                <div id="cookies_collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#cookies_accordion">
                <div class="card-body">
                    <p class="mb-0 fs-5">Functional cookies help perform certain functions, such as B. Sharing content of the website on social media platforms, collecting feedback and other functions provided by third parties.</p>
                </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header" id="headingOne">
                <div class="mb-0 d-flex align-items-center justify-content-between">
                    <div class="w-100">
                    <a class="btn btn-link d-block fs-4 text-left" data-toggle="collapse" data-target="#cookies_collapseTwo" aria-expanded="true" aria-controls="cookies_collapseOne">Leistungs</a>
                    </div>
                    <!-- <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                        <input type="checkbox" checked hidden>
                        <span class="circle"></span>
                    </label>
                    </div> -->

                    <!-- HTML code -->
                    <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span id="cookiesStatus" class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                            <input type="checkbox" checked hidden>
                            <span class="circle"></span>
                        </label>
                    </div>
                </div>
                </div>
                <div id="cookies_collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#cookies_accordion">
                <div class="card-body">
                    <p class="mb-0 fs-5">Leistungs-Cookies werden verwendet, um die wichtigsten Leistungsindizes der Website zu verstehen und zu analysieren, was dazu beiträgt, den Besuchern ein besseres Nutzererlebnis zu bieten.</p>
                </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header" id="headingOne">
                <div class="mb-0 d-flex align-items-center justify-content-between">
                    <div class="w-100">
                    <a class="btn btn-link d-block fs-4 text-left" data-toggle="collapse" data-target="#cookies_collapseThree" aria-expanded="true" aria-controls="cookies_collapseOne">Analytische</a>
                    </div>
                    <!-- <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                        <input type="checkbox" checked hidden>
                        <span class="circle"></span>
                    </label>
                    </div> -->

                    <!-- HTML code -->
                    <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span id="cookiesStatus" class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                            <input type="checkbox" checked hidden>
                            <span class="circle"></span>
                        </label>
                    </div>
                </div>
                </div>
                <div id="cookies_collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#cookies_accordion">
                <div class="card-body">
                    <p class="mb-0 fs-5">Analytische Cookies werden verwendet, um zu verstehen, wie Besucher mit der Website interagieren. Diese Cookies helfen bei der Bereitstellung von Informationen über die Anzahl der Besucher, die Absprungrate, die Verkehrsquelle usw.</p>
                </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header" id="headingOne">
                <div class="mb-0 d-flex align-items-center justify-content-between">
                    <div class="w-100">
                    <a class="btn btn-link d-block fs-4 text-left" data-toggle="collapse" data-target="#cookies_collapseFour" aria-expanded="true" aria-controls="cookies_collapseOne">Anzeige</a>
                    </div>
                    <!-- <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                        <input type="checkbox" checked hidden>
                        <span class="circle"></span>
                    </label>
                    </div> -->

                    <!-- HTML code -->
                    <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span id="cookiesStatus" class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                            <input type="checkbox" checked hidden>
                            <span class="circle"></span>
                        </label>
                    </div>
                </div>
                </div>
                <div id="cookies_collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#cookies_accordion">
                <div class="card-body">
                    <p class="mb-0 fs-5">Werbe-Cookies werden verwendet, um Besuchern relevante Werbung und Marketing-Kampagnen anzubieten. Diese Cookies verfolgen Besucher auf verschiedenen Websites und sammeln Informationen, um maßgeschneiderte Werbung zu liefern.</p>
                </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header" id="headingOne">
                <div class="mb-0 d-flex align-items-center justify-content-between">
                    <div class="w-100">
                    <a class="btn btn-link d-block fs-4 text-left" data-toggle="collapse" data-target="#cookies_collapseFive" aria-expanded="true" aria-controls="cookies_collapseOne">Andere</a>
                    </div>
                    <!-- <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                        <input type="checkbox" checked hidden>
                        <span class="circle"></span>
                    </label>
                    </div> -->

                    <!-- HTML code -->
                    <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span id="cookiesStatus" class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                            <input type="checkbox" checked hidden>
                            <span class="circle"></span>
                        </label>
                    </div>
                </div>
                </div>
                <div id="cookies_collapseFive" class="collapse" aria-labelledby="headingOne" data-parent="#cookies_accordion">
                <div class="card-body">
                    <p class="mb-0 fs-5">Andere nicht kategorisierte Cookies sind solche, die noch analysiert werden und noch nicht in eine Kategorie eingeordnet wurden.</p>
                </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header" id="headingOne">
                <div class="mb-0 d-flex align-items-center justify-content-between">
                    <div class="w-100">
                    <a class="btn btn-link d-block fs-4 text-left" data-toggle="collapse" data-target="#cookies_collapseSix" aria-expanded="true" aria-controls="cookies_collapseOne">Notwendige</a>
                    </div>
                    <!-- <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                        <input type="checkbox" checked hidden>
                        <span class="circle"></span>
                    </label>
                    </div> -->

                    <!-- HTML code -->
                    <div class="cookies_sec_tgl d-flex align-items-center justify-content-between">
                        <span id="cookiesStatus" class="cookies_status fs-5 mr-1">Activate</span>
                        <label class="toggle">
                            <input type="checkbox" checked hidden>
                            <span class="circle"></span>
                        </label>
                    </div>
                </div>
                </div>
                <div id="cookies_collapseSix" class="collapse" aria-labelledby="headingOne" data-parent="#cookies_accordion">
                <div class="card-body">
                    <p class="mb-0 fs-5">Notwendige Cookies sind für das ordnungsgemäße Funktionieren der Website unbedingt erforderlich. Diese Cookies gewährleisten grundlegende Funktionalitäten und Sicherheitsmerkmale der Website, anonym.</p>
                </div>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="setCookieViaAjax()">Save and Accept</button>
        </div>
      </div>

    </div>
  </div>
</div>

   

<script>
    function closeDisclaimer() {
        var disclaimerBar = document.getElementById('disclaimerBar');
        disclaimerBar.style.display = 'none';
    }

    function setCookieViaAjax() {
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/set-cookie', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ /* Your JSON data here */ }),
    })
    .then(response => response.text())
    .then(data => {
      if(data != ''){
        closeDisclaimer();
        $("#exampleModal").modal('hide');
      }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>

