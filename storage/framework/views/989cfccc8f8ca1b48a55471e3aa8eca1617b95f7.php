<?php $__env->startSection("style"); ?>
<style>
    .home-icon {
        padding-left: 12px;
    }

    .home-icon i {
        background: #335080;
        color: #fff;
        padding: 16px;
        border-radius: 50%;
    }

    .contact-left-box h1 {
        font-size: 18px;
        color: #4c9f64;
    }

    .contact-left-box h4 {
        font-size: 18px;
        color: #4c9f64;
        margin-bottom: 5%;
    }

    .contact-right-box {
        border-left: 1px dotted #222222
    }
    .contact-right-box  h1 {
        font-size: 18px;
        color: #4c9f64;
    }
    .support_ticket {
        height: 800px;
    }
   .contact-right-box .support_ticket .mx-auto{
        padding: 0 !important;
    }
    @media  only screen and (min-width: 320px) and (max-width: 767px) { 
        .contact-left-box .col-md-11 {
            margin-top: 5%;
        }
        .contact-left-box .ml-5, .mx-5 {
margin-left: 2rem!important;
}
.contact-left-box .p-2 {
padding: 1.5rem!important;
}
    }

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
<div class=" pt-70 pb-70 bg-light">
    <div class="container">
        <div class="bg-white p-xl-5 p-lg-5 p-md-3 p-2 shadow">
            <div class="row  justify-content-center d-flex ">
                <div class="col-md-6 col-12">
                    <div class="contact-left-box">
                        <h1>In Kontakt kommen</h1>
                        <p>Kontaktieren Sie uns und wir werden uns so schnell wie möglich mit einer Lösung für
                            Ihre Probleme bei Ihnen melden.</p>
                        <span class="divider-separator">
                        </span>

                        <!-- <h4>Das Büro</h4> -->


                        <div class="row">
                            <div class="col-md-1">
                                <div class="home-icon">
                                    <i class="fa fa-home"></i>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <h6 class="ml-5">Büro adresse:</h6>
                                <p class="ml-5 pb-0">EPP Energy Peak Power GmbH
                                    Neuer Wall 50,
                                    20354 Hamburg.</p>
                                <br>

                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-1">
                                <div class="home-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <h6 class="ml-5">
                                    E-Mail:</h6>
                                <p class="ml-5 pb-0">contact@epp.solar</p>


                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-12 contact-right-box">
                    <h1>Kontaktieren Sie uns</h1>
                    <iframe class="support_ticket" src="https://stegback.com/api/ticket_generate/1/0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/contact.blade.php ENDPATH**/ ?>