<?php $__env->startSection('style'); ?>
<style>
    .order-cancel-page i {
        font-size: 24px;
        background: #335080;
        color: #fff !important;
        padding: 24px;
        border-radius: 50%;
    }

    .order-cancel-page h1 {
        margin-top: 5%;
        font-family: 'Lexend', sans-serif;
        color: #dc3545;
        font-size: 27px;
    }

    .order-cancel-page .shadow {
        padding-top: 41px !important;
    }

    @media  only screen and (min-width: 320px) and (max-width: 767px) {
        .order-cancel-page h1 {
            margin-top: 7%;
            font-family: 'Lexend', sans-serif;
            color: #dc3545;
            font-size: 27px;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="order-cancel-page pt-70 pb-70 bg-light-blue">
    <div class="container">
        <div class="bg-white p-xl-5 p-lg-5 p-md-3  shadow">
            <div class="row  justify-content-center  p-5">
                <div class="col-md-10 col-12">
                    <div class="order_thankyou d-flex align-items-center justify-content-center">
                        <div class="order_details_msg text-center">
                            <i class="icon-cross2 text-danger mr-1 bg-danger" style="font-size: 24px;"></i>
                            <h1>Zahlung fehlgeschlagen</h1>
                            <h4 class="font-weight-normal mb-4">Sie haben Ihre Zahlung storniert oder etwas ist schiefgegangen.</h4>
                            <p>"Es tut uns leid, aber es scheint ein Problem mit der Zahlung für Ihre Bestellung zu geben. Bitte setzen Sie sich mit unserem <a  href="/support-ticket"><span style="text-decoration: underline">Kundensupport-Team</span></a> in Verbindung, um dieses Problem zu lösen.</p>
                            <span class="thanyou_customer_name">
                                <a class="btn btn-link text-green fs-3" href="<?php echo e(route('checkout')); ?>">Bitte versuchen Sie es erneut!</a>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/payment-cencel.blade.php ENDPATH**/ ?>