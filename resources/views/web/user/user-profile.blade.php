@extends('web.includes.master')

@section('content')

<div class="mt-110">
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="Home" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="User-Profile" style="color:#1DACE3;"><strong>Profile</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container">
        <div class="hero-slider">

            <div style="background: url({{URL::to('public/web_assets/images/slider/about.jpg')}}) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">

                    <div class="slider_div">
                        <h3>How To Earn With</3>
                            <h6 style="font-size: 36px; font-weight: bold; color: black; margin: 0;"> Deals & Coupons Mena </h6>
                            <p style="font-size: 18px; color: black; margin: 10px 0;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                            <a href="#" style="display: inline-block; padding: 10px 20px; background: #1DACE3; color: white; font-weight: bold; border-radius: 10px; text-decoration: none;">EARN NOW</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider Section End-->

<!-- Total Earnings section start-->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <div class="wallet_container">
                    <div class="wallet_icon"></div>
                    <div class="wallet_title">Total Earnings</div>
                    <div class="wallet_amount">0.00$</div>
                    <hr />
                    <div class="wallet_note">
                        Earnings will show here after Invoice submission of your shopping within
                        your dealsandcouponsmena account.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Total Earnings section end-->


<!-- section -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <div class="mb-8">
                    <!-- heading -->
                    <h2 style="text-align:center; font-weight: bold;"><b>TAKE YOUR EARNING</b></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">
                    <div class="col-lg-4 py-5">
                        <div class="about-us-feature">
                            <div class="about-us-icon"></div>
                            <div class="about-us-title">Claim Cashback</div>
                            <div class="about-us-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            <a href="{{route('user.claimCashback')}}" class="btn btn-primary shadow-gray" style="float: right;">View More</a>
                            <p></p>
                        </div>
                    </div>
<!-- 
                    <div class="col-lg-4 py-5">
                        <div class="about-us-feature">
                            <div class="about-us-icon"></div>
                            <div class="about-us-title">My Earnings</div>
                            <div class="about-us-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            <a href="Referral-Earn" class="btn btn-primary shadow-gray" style="float: right;">View More</a>
                            <p></p>
                        </div>
                    </div> -->

                    <div class="col-lg-4 py-5">
                        <div class="about-us-feature">
                            <div class="about-us-icon"></div>
                            <div class="about-us-title">Withdraw</div>
                            <div class="about-us-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            <a href="{{route('user.withdrawPayment')}}" class="btn btn-primary shadow-gray" style="float: right;">View More</a>
                            <p></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 py-5">
                        <div class="about-us-feature">
                            <div class="about-us-icon"></div>
                            <div class="about-us-title">Payment History</div>
                            <div class="about-us-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            <a href="{{route('user.paymenyHistory')}}" class="btn btn-primary shadow-gray" style="float: right;">View More</a>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">

                    <!-- <div class="col-lg-4 py-5">
                        <div class="about-us-feature">
                            <div class="about-us-icon"></div>
                            <div class="about-us-title">Refer & Earn</div>
                            <div class="about-us-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            <a href="{{route('user.referralEarn')}}" class="btn btn-primary shadow-gray" style="float: right;">View More</a>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-lg-4 py-5">
                        <div class="about-us-feature">
                            <div class="about-us-icon"></div>
                            <div class="about-us-title">Referal Network</div>
                            <div class="about-us-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            <a href="#" class="btn btn-primary shadow-gray" style="float: right;">View More</a>
                            <p></p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

    </div>
</section>
<!-- section -->

@endsection