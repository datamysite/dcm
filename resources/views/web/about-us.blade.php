@extends('web.includes.master')

@section('content')

<!-- Slider Section Start-->
<section class="mt-110">
    <div class="container">
        <div class="hero-slider">

            <div style="background: url(./public/web_assets/images/slider/about.jpg) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">

                    <div class="slider_div">
                        <h3>Get Your Discounts from</3>
                            <h6 style="font-size: 36px; font-weight: bold; color: black; margin: 0;"> Deals & Coupons Mena </h6>
                            <p style="font-size: 18px; color: black; margin: 10px 0;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                            <a href="#" style="display: inline-block; padding: 10px 20px; background: limegreen; color: white; font-weight: bold; border-radius: 10px; text-decoration: none;">GET NOW</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider Section End-->


<div class="mt-0">
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="Home" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="About-Us" style="color:#1DACE3;"><strong>About Us</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- about us main section start here-->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-lg-12 col-12">
                <div class="row align-items-center mb-14">
                    <div class="col-lg-6">
                        <!-- text -->
                        <div class="text-center text-md-start">
                            <h1 class="mb-6">About Us</h1>
                            <p class="mb-0 lead text-sm-justified">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <p class=" text-sm-justified"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-lg-6">
                        <div class="me-6" style="border-radius: 10px;">
                            <!-- img -->
                            <img src=" {{URL::to('/public')}}/web_assets/images/Adv/head_phone.jpg" alt="" class="img-fluid rounded" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="mb-8">
                            <!-- heading -->
                            <h2 style="text-align: center;">WHY CHOOSE US</h2>
                        </div>
                        <p class="text-center text-sm-justified">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <p class="text-sm-justified"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">
                    <div class="col-lg-4 py-5">
                        <div class="about-us-feature">
                            <div class="about-us-icon"></div>
                            <div class="about-us-title">Quality</div>
                            <div class="about-us-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            <div class="about-us-button">More</div>
                        </div>
                    </div>

                    <div class="col-lg-4 py-5">
                        <div class="about-us-feature">
                            <div class="about-us-icon"></div>
                            <div class="about-us-title">Longevity</div>
                            <div class="about-us-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            <div class="about-us-button">More</div>
                        </div>
                    </div>

                    <div class="col-lg-4 py-5">
                        <div class="about-us-feature">
                            <div class="about-us-icon"></div>
                            <div class="about-us-title">Community</div>
                            <div class="about-us-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            <div class="about-us-button">More</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about us main section end here-->

<!-- join with us section start here-->
<section class="my-lg-14 my-8">
    <!-- container -->
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="mb-8">
                    <!-- heading -->
                    <h2 style="text-align: center;">Join With US</h2>
                </div>
                <p class="text-center text-sm-justified">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
            </div>
        </div>

        <!-- row -->
        <div class="row">

            <div class="col-lg-6">

                <div class="" style="border-radius: 20px;">
                    <!-- img -->
                    <img src=" {{URL::to('/public')}}/web_assets/images/Adv/1.png" alt="" class="img-fluid rounded" />
                    <br>
                </div>
            </div>


            <div class="col-lg-6">

                <form action="#" class="form-control p-10">
                    <div class="input-group py-5">
                        <input class="form-control rounded " type="eamil" name="user_email" placeholder="Email" required="required" />

                    </div>

                    <div class="input-group py-5">
                        <input class="form-control rounded" type="password" name="user_password" placeholder="Password" required="required" />

                    </div>

                    <input type="submit" name="sing-up" class="btn btn-signup px-5 py-1 mb-3 me-5" style="font-weight: lighter; float:right;" value="Sign Up">
                </form>

            </div>
        </div>
    </div>

</section>
<!-- join with us section end here-->

@endsection