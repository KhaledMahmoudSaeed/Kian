@extends('layouts.app')

@section('content')
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        @include('components.navbar_specific')
    </header>


    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>@lang('messages.BEST_OFFER')</h4>
                    <h2>@lang('messages.NEW_ARRIVALS_ON_SALE')</h2>
                </div>
            </div>
            <div class="banner-item-02">
                <div class="text-content">
                    <h4>@lang('messages.FLASH_DEALS')</h4>
                    <h2>@lang('messages.GET_YOUR_BEST_PRODUCTS')</h2>
                </div>
            </div>
            <div class="banner-item-03">
                <div class="text-content">
                    <h4>@lang('messages.LAST_MINUTE')</h4>
                    <h2>@lang('messages.GRAB_LAST_MINUTE_DEALS')</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>@lang('messages.LAST_PRODUCT')</h2>
                        <a href="products.html">@lang('messages.VIWE_ALL_PRODUCTS') <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="assets/images/product_01.jpg" alt=""></a>
                        <div class="down-content">
                            <a href="#">
                                <h4>Tittle goes here</h4>
                            </a>
                            <h6>$25.75</h6>
                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (24)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="assets/images/product_02.jpg" alt=""></a>
                        <div class="down-content">
                            <a href="#">
                                <h4>Tittle goes here</h4>
                            </a>
                            <h6>$30.25</h6>
                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (21)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="assets/images/product_03.jpg" alt=""></a>
                        <div class="down-content">
                            <a href="#">
                                <h4>Tittle goes here</h4>
                            </a>
                            <h6>$20.45</h6>
                            <p>Sixteen Clothing is free CSS template provided by TemplateMo.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (36)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="assets/images/product_04.jpg" alt=""></a>
                        <div class="down-content">
                            <a href="#">
                                <h4>Tittle goes here</h4>
                            </a>
                            <h6>$15.25</h6>
                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (48)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="assets/images/product_05.jpg" alt=""></a>
                        <div class="down-content">
                            <a href="#">
                                <h4>Tittle goes here</h4>
                            </a>
                            <h6>$12.50</h6>
                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (16)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="assets/images/product_06.jpg" alt=""></a>
                        <div class="down-content">
                            <a href="#">
                                <h4>Tittle goes here</h4>
                            </a>
                            <h6>$22.50</h6>
                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (32)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>About Sixteen Clothing</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h4>Looking for the best products?</h4>
                        <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This
                                template</a> is free to use for your business websites. However, you have no permission
                            to
                            redistribute
                            the downloadable ZIP file on any template collection website. <a rel="nofollow"
                                href="https://templatemo.com/contact">Contact us</a> for more info.</p>
                        <ul class="featured-list">
                            <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                            <li><a href="#">Consectetur an adipisicing elit</a></li>
                            <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                            <li><a href="#">Corporis, omnis doloremque</a></li>
                            <li><a href="#">Non cum id reprehenderit</a></li>
                        </ul>
                        <a href="about.html" class="filled-button">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="assets/images/feature-image.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                                    author nulla.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="filled-button">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd. - Design: <a rel="nofollow noopener"
                                href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @include('components.footer')
@endsection
