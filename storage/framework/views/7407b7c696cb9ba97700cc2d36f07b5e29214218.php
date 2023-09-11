<?php $__env->startSection("style"); ?>

<style>
    .counter-box span {
        font-size: 5vh;
    }

    .about-us-heading img {
        width: 70px;

    }
    .counter-box{
        min-height: 207px;
    }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.filtter','data' => ['value' => __('DisabledShortBy'),'filterIcon' => __('d-none')]]); ?>
<?php $component->withName('filtter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('DisabledShortBy')),'filterIcon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('d-none'))]); ?>Über uns <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<div class="about-banner">
    <img src="https://i0.wp.com/epp.solar/wp-content/uploads/2022/08/aboutbanner_new.jpg" alt="epp.solar"
        class="img-fluid w-100">
</div>

<div class="bg-light-blue pt-50 pb-50">
    <div class="about-us-heading pb-50">
        <div class="container">
            <div class="row mt-5 text-center justify-content-center align-items-center">
                <h3 class="text-center mb-0 fw-500 mr-3">Über</h3>
                <img class="img-fluid" src="https://i0.wp.com/epp.solar/wp-content/uploads/2022/08/epplogo.png?fit=500%2C227&ssl=1" alt="epp.solar">
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <p> <img class="img-fluid mr-3"
                        src="https://i0.wp.com/epp.solar/wp-content/uploads/2022/08/epplogo.png?fit=500%2C227&ssl=1"
                        alt="Epp Solar">ist ein E-Commerce-Marktplatz, wo Sie
                    Ihre Solarprodukte zum Bestpreis kaufen können. Steigen Sie mit Solarprodukten und <img
                        class="img-fluid"
                        src="https://i0.wp.com/epp.solar/wp-content/uploads/2022/08/epplogo.png?fit=500%2C227&ssl=1" alt="Epp Solar">
                    auf den Eigenverbrauch um. Unterschiedliche
                    Kunden, ob B2B (Von Geschäft zu Geschäft) oder B2C (Geschäft zum Kunden) Kunde, Sie alle können
                    die Marke <img class="img-fluid"
                        src="https://i0.wp.com/epp.solar/wp-content/uploads/2022/08/epplogo.png?fit=500%2C227&ssl=1" alt="Epp Solar">
                    für ihre persönlichen und geschäftlichen
                    Bedürfnisse auswählen. Unser umfangreiches Sortiment bietet für jeden Einsatzort eine
                    individuelle Lösung, mit der Sie nicht nur frei von Sorgen, sondern teils vollkommen autark
                    durchstarten können. Ob zu Hause auf dem eigenen Dach, auf dem Wohnmobil, Boot oder beim Zelten
                    ist immer Verlass auf unsere hochwertigen Produkte.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-50">
        <div class="row">
            <div class="col-md-6 col-12">
                <h1 class="text-center fs-1 mb-5">Milestone</h1>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="counter-box text-center p-5 bg-green-theme d-flex align-items-center justify-content-center">
                            <div>
                                <span class="timer count-title text-white count-number" data-to="16" data-speed="1500" class="fw-600"></span>
                                <span class="text-white ">K +</span>
                                <h3 class="text-white fw-400 fs-1">Verkaufte Produkte</h3>    
                            </div>         
                        </div>
                     </div>
                    <div class="col-md-6 mb-3">
                        <div class="counter-box text-center text-white p-5 bg-blue-theme d-flex align-items-center justify-content-center">
                            <div>
                             <span class="timer text-white count-title count-number" data-to="24" data-speed="1500"></span>
                             <span class="text-white"> M +</span>
                             <h3 class="text-white fw-400 fs-1">Umsatz generiert</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="counter-box text-center text-white p-5 bg-blue-theme d-flex align-items-center justify-content-center">
                            <div>
                                <span class="timer text-white count-title count-number" data-to="24" data-speed="1500"></span>
                                <span class="text-white">Jahre</span>
                                <h3 class="text-white fw-400 fs-1">Industrieerfahrung</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="counter-box text-center text-white p-5 bg-green-theme d-flex align-items-center justify-content-center">
                            <div>
                                <span class="timer text-white count-title count-number" data-to="24" data-speed="1500"></span>
                                <span class="text-white"> K +</span>
                                <h3 class="text-white text-white fw-400 fs-1">Zufriedene Kunden</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 mt-md-0 mt-5">
              <h1 class="text-center fs-1 mb-5">Auszeichnungen</h1>
                <div id="carouselExampleControls" class="carousel slide shadow border" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="https://i0.wp.com/epp.solar/wp-content/uploads/2023/03/pic-04-1.webp?fit=2084%2C1460&ssl=1"
                                    alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="https://i0.wp.com/epp.solar/wp-content/uploads/2023/03/epp.solar_trustami.jpg?fit=2084%2C1460&ssl=1"
                                    alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="https://i0.wp.com/epp.solar/wp-content/uploads/2023/03/pic-04-1.webp?fit=2084%2C1460&ssl=1"
                                    alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-chevron-left text-dark" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-chevron-right text-dark" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>  
            </div>
        </div>
    </div>
</div>



<script>
    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};
            return $(this).each(function () {
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from: $(this).data('from'),
                    to: $(this).data('to'),
                    speed: $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals: $(this).data('decimals')
                }, options);

                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

                $self.data('countTo', data);

                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);
                render(value);
                function updateTimer() {
                    value += increment;
                    loopCount++;
                    render(value);
                    if (typeof (settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof (settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0,
            to: 0,
            speed: 1000,
            refreshInterval: 100,
            decimals: 0,
            formatter: formatter,
            onUpdate: null,
            onComplete: null
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));

    jQuery(function ($) {
        $('.count-number').data('countToOptions', {
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        $('.timer').each(count);
        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/about.blade.php ENDPATH**/ ?>