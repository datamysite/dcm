@extends('web.includes.master')

@section('content')


<div class="mt-110">
    <div class="container np-container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="Home" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item"><a href="Home" style="color: #000;"><strong>Products</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="Store-Single-Product" style="color:#1DACE3;"><strong>Store Single Product</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container np-container">
        <div class="hero-slider">
            <div style="background: url(./public/web_assets/images/slider/hero-img-slider-1.jpg) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                    <span class="badge text-bg-warning">Free Shipping - orders over $100</span>
                    <h2 class="text-dark display-5 fw-bold mt-4">
                        Free Shipping on
                        <br />
                        orders over
                        <span class="text-primary"><b style="color:#fff;">$100</b></span>
                    </h2>
                    <p class="lead" style="color:#fff">Free Shipping to First-Time Customers Only, After promotions and discounts are applied.</p>
                    <a href="#!" class="btn btn-dark mt-3">
                        Shop Now
                        <i class="feather-icon icon-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Slider Section End-->

<!-- Single Prodcut Section Start-->
<section class="mt-10">
    <div class="container np-container">
        <div class="row">
            <div class="col-12 mb- text-center">
                <h3 class="mb-5 page-title">Store Product</h3>
            </div>
        </div>

        <div class="row d-flex mt-12" style=" align-items: center;">
            <div class="col-12">
                <div class="main_div_container" style="background-color: #2dcc70;">

                    <div class="Lside_div">
                        <img src="{{URL::to('/public')}}/web_assets/images/png/nike.jpg" alt="Product Image" class="img" style="height:80%">
                    </div>

                    <div class="Rside_div">
                        <img src="{{URL::to('/public')}}/web_assets/images/adv/tesla.jpg" alt="Product Image" class="img" style="height:80%">
                    </div>

                    <div class="row col-6 mt-0 p-5" style="align-items: left;">
                        <span style="color:#fff;">Namshi Accessoris Promo code - Up to 80% off + Extra 10% off in UAE</span>

                        <span style="color:#fff;">Expires On: 01 JAN 2025</span>

                        <span class="col text-center">
                            <input type="submit" name="sing-up" class="btn btn-white shadow-green " style="font-weight:bold; color:#1dace3;" value="SHOW COUPON">
                        </span>
                    </div>
                </div>
            </div>
        </div>




        <div class="row col-lg-12 mt-10">
            <!-- col -->
            <div class="col-lg-12 col-12">
                <div class="row align-items-center mt-10">
                    <div class="col-lg-12">
                        <!-- text -->
                        <div class="text-center text-md-start ">

                            <h3 class="mb-0">About this product</h3>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-10 mt-5">
                <!-- col -->
                <div class="col-lg-6">
                    <div class="me-6" style="border-radius: 10px;">
                        <!-- img -->
                        <img src="{{URL::to('/public')}}/web_assets/images/adv/namshi_store.png" alt="" class="img-fluid w-100 rounded" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- text -->
                    <div>
                        <h3 class="mb-5">What is Lorem Ipsum?</h3>
                        <p class="mb-1 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <p class="mb-1 lead"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p class="mb-1 lead">Contrary to popular belief, Lorem Ipsum is not simply random text.making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 mb- text-center">
                <h3 class="mb-5">Feedback</h3>
            </div>
        </div>

        <div class="row col-lg-12 mt-10">

            <div class="col-lg-4">
                <div class="mb-8">

                    <div class="card bg-light border-0" style="border-radius: 10px;">
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="{{URL::to('/public')}}/web_assets/images/avatar/avatar-8.jpg" alt="" class="avatar avatar-md rounded-circle" />
                            </div>
                            <div class="ms-3 lh-1">
                                <h6 class="mb-0">Alishia Jones</h6>
                                <small>Customer</small>
                            </div>
                        </div>
                        <div class="card-body p-5">
                            <h6>Lorem ipsum dolor</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit. Curabitur iaculis maximus purus, a gravida dui tempor eget.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mb-8">

                    <div class="card bg-light border-0" style="border-radius: 10px;">
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="{{URL::to('/public')}}/web_assets/images/avatar/avatar-1.jpg" alt="" class="avatar avatar-md rounded-circle" />
                            </div>
                            <div class="ms-3 lh-1">
                                <h6 class="mb-0">Alishia Jones</h6>
                                <small>Customer</small>
                            </div>
                        </div>
                        <div class="card-body p-5">
                            <h6>Lorem ipsum dolor</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit. Curabitur iaculis maximus purus, a gravida dui tempor eget.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mb-8">

                    <div class="card bg-light border-0" style="border-radius: 10px;">
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="{{URL::to('/public')}}/web_assets/images/avatar/avatar-5.jpg" alt="" class="avatar avatar-md rounded-circle" />
                            </div>
                            <div class="ms-3 lh-1">
                                <h6 class="mb-0">Alishia Jones</h6>
                                <small>Customer</small>
                            </div>
                        </div>
                        <div class="card-body p-5">
                            <h6>Lorem ipsum dolor</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit. Curabitur iaculis maximus purus, a gravida dui tempor eget.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Single Prodcut Section End-->


@endsection