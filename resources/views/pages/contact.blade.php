@extends('Layout.Layout')
@section("style")
<style>
  
 

 
     
    .support_ticket {
        height: 800px;
    }
    
   

</style>
@endsection
@section("content")
<x-filtter :value="__('DisabledShortBy')" :filterIcon="__('d-none')">Kontakt</x-filtter>
<div class="bg-light-blue pt-50 pb-50">
    <div class="container">
        <div class="bg-white p-5 shadow">
            <div class="row">
                <div class="col-md-6 col-12 border-right">
                    <div class="contact-left-box">
                        <h1 class="fs-2">In Kontakt kommen</h1>
                        <p>Kontaktieren Sie uns und wir werden uns so schnell wie möglich mit einer Lösung für
                            Ihre Probleme bei Ihnen melden.</p>
                   
                        <div class="d-flex mt-5">
                            <div class="home-icon mr-5">
                                    <i class="fa fa-building bg-blue-theme text-white rounded-circle p-4"></i>
                            </div>
                            <div>
                                <h6>Büro adresse:</h6>
                                <p class="pl-0">EPP Energy Peak Power GmbH <br>
                                    Neuer Wall 50,<br>
                                    20354 Hamburg,<br> Deutschland.</p>
                            </div>
                        </div>

                        <div class="d-flex mt-3">
                            <div class="home-icon mr-5">
                                <i class="fa fa-envelope bg-blue-theme text-white rounded-circle p-4"></i>
                            </div>
                            <div>
                                <h6>E-Mail:</h6>
                                <p class="pb-0"><a href="mailto:contact@epp.solar">contact@epp.solar</a></p>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="home-icon mr-5">
                                <i class="fa fa-phone bg-blue-theme text-white rounded-circle p-4"></i>
                            </div>
                            <div>
                                <h6>Hotline:</h6>
                                <p class="pb-0"><a href="tel:49 541 96251000">49 541 96251000</a></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-12 contact-right-box mt-md-0 mt-5">
                    <h1 class="fs-2">Kontaktieren Sie uns</h1>
                    <iframe class="support_ticket" src="https://stegback.com/api/ticket_generate/1/0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection