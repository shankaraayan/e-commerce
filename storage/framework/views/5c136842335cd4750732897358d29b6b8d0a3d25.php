<?php $__env->startSection("content"); ?>
            <!--------------- Product Category Section ------------------------->

            <section class="py-5" style=" background: #c5cddf70 !important;">
                <div class="container">
                    <div id="content">
                        <div class="row">
                            <div class="col-md-4 col-lg-3 col-xl-3 d-xl-block d-lg-block d-md-none d-none">
                                <div class="accordion" id="dtp_accordionfilter">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button shadow-none" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                Product Category
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Balkonkraftwerk
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Wechselrichter
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Solarmodule
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Montage
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button shadow-none collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Product Watt
                                            </button>
                                        </h2>

                                        <div id="collapseTwo" class="accordion-collapse collapse show"
                                            aria-labelledby="headingTwo">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Balkonkraftwerk
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckChecked">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Wechselrichter
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckChecked">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Solarmodule
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button shadow-none collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Price Range
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse show"
                                            aria-labelledby="headingThree">
                                            <div class="accordion-body">
                                                <div class="card-body">

                                                    <form class="row g-3 needs-validation" novalidate>
                                                        <div class="col-md-12">
                                                            <input type="range" class="custom-range form-range" min="0"
                                                                max="100" name="">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationCustom01"
                                                                class="form-label">Min</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom01" placeholder="$0">

                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationCustom02"
                                                                class="form-label">Max</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom02" type="number"
                                                                placeholder="$1,0000">

                                                        </div>
                                                    </form>
                                                    <div class="mt-3 text-end">
                                                        <button class="btn btn_primary">Apply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button shadow-none collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#product_sugg_collapse"
                                                aria-expanded="false" aria-controls="product_sugg_collapse">
                                                Related Products
                                            </button>
                                        </h2>
                                        <div id="product_sugg_collapse" class="accordion-collapse collapse show"
                                            aria-labelledby="headingThree">
                                            <div class="accordion-body">
                                                <ul class="list-inline product_sugg_div mb-0">
                                                    <li class="row g-2">
                                                        <div class="col-3">
                                                            <div class="relatedproduct_pic">
                                                                <img src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                    class="img-fluid" alt="Epp Solar">
                                                            </div>
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="relatedproduct_info">
                                                                <div class="relatedproduct_title mb-1">Solar-PV 1520W
                                                                    Balkonkraftwerk Photovoltaik Solaranlage – Mit EPP
                                                                    380W
                                                                </div>
                                                                <div class="relatedproduct_price ci_green">
                                                                    $449 - $649/-
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <hr>
                                                    <li class="row g-2">
                                                        <div class="col-3">
                                                            <div class="relatedproduct_pic">
                                                                <img src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                    class="img-fluid" alt="Epp Solar">
                                                            </div>
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="relatedproduct_info">
                                                                <div class="relatedproduct_title mb-1">Solar-PV 1520W
                                                                    Balkonkraftwerk Photovoltaik Solaranlage – Mit EPP
                                                                    380W
                                                                </div>
                                                                <div class="relatedproduct_price ci_green">
                                                                    $449 - $649/-
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <hr>
                                                    <li class="row g-2">
                                                        <div class="col-3">
                                                            <div class="relatedproduct_pic">
                                                                <img src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                    class="img-fluid" alt="Epp Solar">
                                                            </div>
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="relatedproduct_info">
                                                                <div class="relatedproduct_title mb-1">Solar-PV 1520W
                                                                    Balkonkraftwerk Photovoltaik Solaranlage – Mit EPP
                                                                    380W
                                                                </div>
                                                                <div class="relatedproduct_price ci_green">
                                                                    $449 - $649/-
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <hr>
                                                    <li class="row g-2">
                                                        <div class="col-3">
                                                            <div class="relatedproduct_pic">
                                                                <img src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                    class="img-fluid" alt="Epp Solar">
                                                            </div>
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="relatedproduct_info">
                                                                <div class="relatedproduct_title mb-1">Solar-PV 1520W
                                                                    Balkonkraftwerk Photovoltaik Solaranlage – Mit EPP
                                                                    380W
                                                                </div>
                                                                <div class="relatedproduct_price ci_green">
                                                                    $449 - $649/-
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-xl-9 col-lg-9 col-md-12 col-12">
                                <div class="card p-3">
                                    <div class="row border-bottom pb-2">
                                        <div class="col-md-6 col-lg-6 col-12">
                                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                                                aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                                </ol>
                                            </nav>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-4 d-lg-block d-md-block d-xl-block d-none">
                                            <nav aria-label="Page navigation example ">
                                                <div class="woodmart-products-per-page bd-highlight text-end">
                                                    <span class="per-page-title"><strong> Show: </strong></span>
                                                    <a rel="nofollow" href="#" class="per-page-variation">
                                                        <span>9</span> </a>
                                                    <span>/</span>
                                                    <span class="per-page-border"></span>
                                                    <a rel="nofollow" href="#" class="per-page-variation">
                                                        <span>24</span> </a>
                                                    <span>/</span>
                                                    <a rel="nofollow" href="#" class="per-page-variation">
                                                        <span>36</span> </a>
                                                    <span class="per-page-border"></span>
                                                </div>
                                            </nav>
                                        </div>
                                        <!----------- Mobile Filter ----------->
                                        <div class="col-md-4 col-lg-4 col-6 d-xl-none d-lg-none d-md-block d-block">
                                            <i class="fa fa-bars text-dark d-flex align-items-center fs-4"
                                                data-bs-toggle="offcanvas" href="#productmobile_canvas" role="button"
                                                aria-controls="productmobile_canvas">
                                                <span class="p ms-1">Show filter</span>
                                            </i>

                                            <div class="offcanvas offcanvas-start" tabindex="-1"
                                                id="productmobile_canvas" aria-labelledby="productmobile_filter">
                                                <div class="offcanvas-header border-bottom">
                                                    <h5 class="offcanvas-title" id="productmobile_filter">Product Filter
                                                    </h5>
                                                    <button type="button" class="btn-close text-reset"
                                                        data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body">
                                                    <div class="accordion" id="mbl_accordionfilter">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseOne" aria-expanded="true"
                                                                    aria-controls="collapseOne">
                                                                    Product Category
                                                                </button>
                                                            </h2>
                                                            <div id="collapseOne"
                                                                class="accordion-collapse collapse show"
                                                                aria-labelledby="headingOne">
                                                                <div class="accordion-body">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="flexRadioDefault"
                                                                            id="flexRadioDefault1">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1">
                                                                            Balkonkraftwerk
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="flexRadioDefault"
                                                                            id="flexRadioDefault2">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault2">
                                                                            Wechselrichter
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="flexRadioDefault"
                                                                            id="flexRadioDefault2">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault2">
                                                                            Solarmodule
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="flexRadioDefault"
                                                                            id="flexRadioDefault2">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault2">
                                                                            Montage
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwo" aria-expanded="false"
                                                                    aria-controls="collapseTwo">
                                                                    Product Watt
                                                                </button>
                                                            </h2>

                                                            <div id="collapseTwo"
                                                                class="accordion-collapse collapse show"
                                                                aria-labelledby="headingTwo">
                                                                <div class="accordion-body">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="flexCheckDefault">
                                                                        <label class="form-check-label"
                                                                            for="flexCheckDefault">
                                                                            Balkonkraftwerk
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="flexCheckChecked">
                                                                        <label class="form-check-label"
                                                                            for="flexCheckChecked">
                                                                            Wechselrichter
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="flexCheckChecked">
                                                                        <label class="form-check-label"
                                                                            for="flexCheckChecked">
                                                                            Solarmodule
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingThree">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseThree"
                                                                    aria-expanded="false" aria-controls="collapseThree">
                                                                    Price Range
                                                                </button>
                                                            </h2>
                                                            <div id="collapseThree"
                                                                class="accordion-collapse collapse show"
                                                                aria-labelledby="headingThree">
                                                                <div class="accordion-body">
                                                                    <div class="card-body">

                                                                        <form class="row g-3 needs-validation"
                                                                            novalidate>
                                                                            <div class="col-md-12">
                                                                                <input type="range"
                                                                                    class="custom-range form-range"
                                                                                    min="0" max="100" name="">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="validationCustom01"
                                                                                    class="form-label">Min</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="validationCustom01"
                                                                                    placeholder="$0">

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="validationCustom02"
                                                                                    class="form-label">Max</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="validationCustom02"
                                                                                    type="number" placeholder="$1,0000">

                                                                            </div>
                                                                        </form>
                                                                        <div class="mt-3 text-end">
                                                                            <button
                                                                                class="btn btn_primary">Apply</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingThree">
                                                                <button class="accordion-button shadow-none collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#product_sugg_collapse"
                                                                    aria-expanded="false"
                                                                    aria-controls="product_sugg_collapse">
                                                                    Related Products
                                                                </button>
                                                            </h2>
                                                            <div id="product_sugg_collapse"
                                                                class="accordion-collapse collapse show"
                                                                aria-labelledby="headingThree">
                                                                <div class="accordion-body">
                                                                    <ul class="list-inline product_sugg_div mb-0">
                                                                        <li class="row g-2">
                                                                            <div class="col-3">
                                                                                <div class="relatedproduct_pic">
                                                                                    <img src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                                        class="img-fluid" alt="Epp Solar">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="relatedproduct_info">
                                                                                    <div
                                                                                        class="relatedproduct_title mb-1">
                                                                                        Solar-PV 1520W Balkonkraftwerk
                                                                                        Photovoltaik Solaranlage – Mit
                                                                                        EPP 380W
                                                                                    </div>
                                                                                    <div
                                                                                        class="relatedproduct_price ci_green">
                                                                                        $449 - $649/-
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <hr>
                                                                        <li class="row g-2">
                                                                            <div class="col-3">
                                                                                <div class="relatedproduct_pic">
                                                                                    <img src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                                        class="img-fluid" alt="Epp Solar">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="relatedproduct_info">
                                                                                    <div
                                                                                        class="relatedproduct_title mb-1">
                                                                                        Solar-PV 1520W Balkonkraftwerk
                                                                                        Photovoltaik Solaranlage – Mit
                                                                                        EPP 380W
                                                                                    </div>
                                                                                    <div
                                                                                        class="relatedproduct_price ci_green">
                                                                                        $449 - $649/-
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <hr>
                                                                        <li class="row g-2">
                                                                            <div class="col-3">
                                                                                <div class="relatedproduct_pic">
                                                                                    <img src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                                        class="img-fluid" alt="Epp Solar">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="relatedproduct_info">
                                                                                    <div
                                                                                        class="relatedproduct_title mb-1">
                                                                                        Solar-PV 1520W Balkonkraftwerk
                                                                                        Photovoltaik Solaranlage – Mit
                                                                                        EPP 380W
                                                                                    </div>
                                                                                    <div
                                                                                        class="relatedproduct_price ci_green">
                                                                                        $449 - $649/-
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <hr>
                                                                        <li class="row g-2">
                                                                            <div class="col-3">
                                                                                <div class="relatedproduct_pic">
                                                                                    <img src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                                        class="img-fluid" alt="Epp Solar">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="relatedproduct_info">
                                                                                    <div
                                                                                        class="relatedproduct_title mb-1">
                                                                                        Solar-PV 1520W Balkonkraftwerk
                                                                                        Photovoltaik Solaranlage – Mit
                                                                                        EPP 380W
                                                                                    </div>
                                                                                    <div
                                                                                        class="relatedproduct_price ci_green">
                                                                                        $449 - $649/-
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!----------- Mobile Filter ----------->
                                        <div class="col-md-8 col-lg-2 col-6">
                                            <div class="dropdown text-end">
                                                <a class="dropdown-toggle" herf="#" id="dropdownMenuButton1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    FILTER
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#">Popularität</a></li>
                                                    <li><a class="dropdown-item" href="#">Durchschnittliche
                                                            Bewertung</a></li>
                                                    <li><a class="dropdown-item" href="#">Neuheit</a></li>
                                                    <li><a class="dropdown-item" href="#">Preis niedrig bis hoch</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Preis: hoch bis niedrig</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-3 g-3">
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div id="pt_1" class="p-2 border position-relative rounded">
                                                <div class="product_thumb position-relative">
                                                    <div class="label_wrapper text-end d-flex justify-content-end">
                                                        <ul
                                                            class="list-inline text-center d-inline-block p-2 bg-white shadow mb-0">
                                                            <li class="prod_wishlist_icon mb-2"><a href="#"><i
                                                                        class="fa fa-shopping-cart fs-5"></i> </a></li>
                                                            <li class="cart_icon_heart"><a href="#"><i
                                                                        class="fa fa-heart-o fs-5"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product_thumb_info">
                                                        <a href="#" class="product_thumb_img">
                                                            <div class="overflow-hidden">
                                                                <img class="img-fluid"
                                                                    src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                    width="100%">
                                                            </div>
                                                        </a>
                                                        <div class="product_info_box text-white py-2 mt-1">
                                                            <div class="product_title">
                                                                <h6
                                                                    class="px-2 text-center product_thumb_title fw-normal">
                                                                    Solar-PV 1520W Balkonkraftwerk Photovoltaik
                                                                    Solaranlage – Mit EPP 380W</h6>
                                                            </div>
                                                            <div
                                                                class="px-2 text-center d-flex align-items-center justify-content-center">
                                                                <small
                                                                    class="discount_price ci_green"><s>₹449</s></small>
                                                                <span class="net_price ci_green ms-2">₹349/-</span>
                                                            </div>
                                                        </div>
                                                        <!-- <a class="btn btn_outline_primary d-block m-2" href="#">ADD TO CART</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div id="pt_1" class="p-2 border position-relative rounded">
                                                <div class="product_thumb position-relative">
                                                    <div class="label_wrapper text-end d-flex justify-content-end">
                                                        <ul
                                                            class="list-inline text-center d-inline-block p-2 bg-white shadow mb-0">
                                                            <li class="prod_wishlist_icon mb-2"><a href="#"><i
                                                                        class="fa fa-shopping-cart fs-5"></i> </a></li>
                                                            <li class="cart_icon_heart"><a href="#"><i
                                                                        class="fa fa-heart-o fs-5"></i></a></li>
                                                        </ul>
                                                        <!-- <a href="#"> <i class="fa fa-shopping-cart pr-1"></i> </a>
                                                                <a href="#"><i class="m-1 fab-small fa fa-heart-o"></i></a> -->
                                                    </div>
                                                    <div class="product_thumb_info">
                                                        <a href="#" class="product_thumb_img">
                                                            <div class="overflow-hidden">
                                                                <img class="img-fluid"
                                                                    src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                    width="100%">
                                                            </div>
                                                        </a>
                                                        <div class="product_info_box text-white py-2 mt-1">
                                                            <div class="product_title">
                                                                <h6
                                                                    class="px-2 text-center product_thumb_title fw-normal">
                                                                    Solar-PV 1520W Balkonkraftwerk Photovoltaik
                                                                    Solaranlage – Mit EPP 380W</h6>
                                                            </div>
                                                            <div
                                                                class="px-2 text-center d-flex align-items-center justify-content-center">
                                                                <small
                                                                    class="discount_price ci_green"><s>₹449</s></small>
                                                                <span class="net_price ci_green ms-2">₹349/-</span>
                                                            </div>
                                                        </div>
                                                        <!-- <a class="btn btn_outline_primary d-block m-2" href="#">ADD TO CART</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div id="pt_1" class="p-2 border position-relative rounded">
                                                <div class="product_thumb position-relative">
                                                    <div class="label_wrapper text-end d-flex justify-content-end">
                                                        <ul
                                                            class="list-inline text-center d-inline-block p-2 bg-white shadow mb-0">
                                                            <li class="prod_wishlist_icon mb-2"><a href="#"><i
                                                                        class="fa fa-shopping-cart fs-5"></i> </a></li>
                                                            <li class="cart_icon_heart"><a href="#"><i
                                                                        class="fa fa-heart-o fs-5"></i></a></li>
                                                        </ul>
                                                        <!-- <a href="#"> <i class="fa fa-shopping-cart pr-1"></i> </a>
                                                                <a href="#"><i class="m-1 fab-small fa fa-heart-o"></i></a> -->
                                                    </div>
                                                    <div class="product_thumb_info">
                                                        <a href="#" class="product_thumb_img">
                                                            <div class="overflow-hidden">
                                                                <img class="img-fluid"
                                                                    src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                    width="100%">
                                                            </div>
                                                        </a>
                                                        <div class="product_info_box text-white py-2 mt-1">
                                                            <div class="product_title">
                                                                <h6
                                                                    class="px-2 text-center product_thumb_title fw-normal">
                                                                    Solar-PV 1520W Balkonkraftwerk Photovoltaik
                                                                    Solaranlage – Mit EPP 380W</h6>
                                                            </div>
                                                            <div
                                                                class="px-2 text-center d-flex align-items-center justify-content-center">
                                                                <small
                                                                    class="discount_price ci_green"><s>₹449</s></small>
                                                                <span class="net_price ci_green ms-2">₹349/-</span>
                                                            </div>
                                                        </div>
                                                        <!-- <a class="btn btn_outline_primary d-block m-2" href="#">ADD TO CART</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div id="pt_1" class="p-2 border position-relative rounded">
                                                <div class="product_thumb position-relative">
                                                    <div class="label_wrapper text-end d-flex justify-content-end">
                                                        <ul
                                                            class="list-inline text-center d-inline-block p-2 bg-white shadow mb-0">
                                                            <li class="prod_wishlist_icon mb-2"><a href="#"><i
                                                                        class="fa fa-shopping-cart fs-5"></i> </a></li>
                                                            <li class="cart_icon_heart"><a href="#"><i
                                                                        class="fa fa-heart-o fs-5"></i></a></li>
                                                        </ul>
                                                        <!-- <a href="#"> <i class="fa fa-shopping-cart pr-1"></i> </a>
                                                                <a href="#"><i class="m-1 fab-small fa fa-heart-o"></i></a> -->
                                                    </div>
                                                    <div class="product_thumb_info">
                                                        <a href="#" class="product_thumb_img">
                                                            <div class="overflow-hidden">
                                                                <img class="img-fluid"
                                                                    src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                    width="100%">
                                                            </div>
                                                        </a>
                                                        <div class="product_info_box text-white py-2 mt-1">
                                                            <div class="product_title">
                                                                <h6
                                                                    class="px-2 text-center product_thumb_title fw-normal">
                                                                    Solar-PV 1520W Balkonkraftwerk Photovoltaik
                                                                    Solaranlage – Mit EPP 380W</h6>
                                                            </div>
                                                            <div
                                                                class="px-2 text-center d-flex align-items-center justify-content-center">
                                                                <small
                                                                    class="discount_price ci_green"><s>₹449</s></small>
                                                                <span class="net_price ci_green ms-2">₹349/-</span>
                                                            </div>
                                                        </div>
                                                        <!-- <a class="btn btn_outline_primary d-block m-2" href="#">ADD TO CART</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div id="pt_1" class="p-2 border position-relative rounded">
                                                <div class="product_thumb position-relative">
                                                    <div class="label_wrapper text-end d-flex justify-content-end">
                                                        <ul
                                                            class="list-inline text-center d-inline-block p-2 bg-white shadow mb-0">
                                                            <li class="prod_wishlist_icon mb-2"><a href="#"><i
                                                                        class="fa fa-shopping-cart fs-5"></i> </a></li>
                                                            <li class="cart_icon_heart"><a href="#"><i
                                                                        class="fa fa-heart-o fs-5"></i></a></li>
                                                        </ul>
                                                        <!-- <a href="#"> <i class="fa fa-shopping-cart pr-1"></i> </a>
                                                                <a href="#"><i class="m-1 fab-small fa fa-heart-o"></i></a> -->
                                                    </div>
                                                    <div class="product_thumb_info">
                                                        <a href="#" class="product_thumb_img">
                                                            <div class="overflow-hidden">
                                                                <img class="img-fluid"
                                                                    src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                    width="100%">
                                                            </div>
                                                        </a>
                                                        <div class="product_info_box text-white py-2 mt-1">
                                                            <div class="product_title">
                                                                <h6
                                                                    class="px-2 text-center product_thumb_title fw-normal">
                                                                    Solar-PV 1520W Balkonkraftwerk Photovoltaik
                                                                    Solaranlage – Mit EPP 380W</h6>
                                                            </div>
                                                            <div
                                                                class="px-2 text-center d-flex align-items-center justify-content-center">
                                                                <small
                                                                    class="discount_price ci_green"><s>₹449</s></small>
                                                                <span class="net_price ci_green ms-2">₹349/-</span>
                                                            </div>
                                                        </div>
                                                        <!-- <a class="btn btn_outline_primary d-block m-2" href="#">ADD TO CART</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div id="pt_1" class="p-2 border position-relative rounded">
                                                <div class="product_thumb position-relative">
                                                    <div class="label_wrapper text-end d-flex justify-content-end">
                                                        <ul
                                                            class="list-inline text-center d-inline-block p-2 bg-white shadow mb-0">
                                                            <li class="prod_wishlist_icon mb-2"><a href="#"><i
                                                                        class="fa fa-shopping-cart fs-5"></i> </a></li>
                                                            <li class="cart_icon_heart"><a href="#"><i
                                                                        class="fa fa-heart-o fs-5"></i></a></li>
                                                        </ul>
                                                        <!-- <a href="#"> <i class="fa fa-shopping-cart pr-1"></i> </a>
                                                                <a href="#"><i class="m-1 fab-small fa fa-heart-o"></i></a> -->
                                                    </div>
                                                    <div class="product_thumb_info">
                                                        <a href="#" class="product_thumb_img">
                                                            <div class="overflow-hidden">
                                                                <img class="img-fluid"
                                                                    src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg"
                                                                    width="100%">
                                                            </div>
                                                        </a>
                                                        <div class="product_info_box text-white py-2 mt-1">
                                                            <div class="product_title">
                                                                <h6
                                                                    class="px-2 text-center product_thumb_title fw-normal">
                                                                    Solar-PV 1520W Balkonkraftwerk Photovoltaik
                                                                    Solaranlage – Mit EPP 380W</h6>
                                                            </div>
                                                            <div
                                                                class="px-2 text-center d-flex align-items-center justify-content-center">
                                                                <small
                                                                    class="discount_price ci_green"><s>₹449</s></small>
                                                                <span class="net_price ci_green ms-2">₹349/-</span>
                                                            </div>
                                                        </div>
                                                        <!-- <a class="btn btn_outline_primary d-block m-2" href="#">ADD TO CART</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-12 col-lg-12">
                                            <nav aria-label="Page navigation example ">
                                                <ul class="pagination justify-content-center my-4">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--------------- Product Category Section ------------------------->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/products/products.blade.php ENDPATH**/ ?>