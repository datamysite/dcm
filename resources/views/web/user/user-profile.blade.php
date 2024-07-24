@extends('web.includes.master')

@section('content')

<div class="breadcrumbMENU mt-110">
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="User-Profile" style="color:#1DACE3;"><strong>{{ __('translation.dashboard') }}</a></strong></li>
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
                        <h3>{{ __('translation.earn_coupons_title') }}</h3>
                            <h6 style="font-size: 36px; font-weight: bold; color: black; margin: 0;"> {{ __('translation.earn_coupons_title01') }}</h6>
                            <p style="font-size: 18px; color: black; margin: 10px 0;">
                            <ul>
                                <li>
                                    <h5>{{ __('translation.earn_coupons_txt_01') }}</h5>
                                </li>
                                <li>
                                    <h5>{{ __('translation.earn_coupons_txt_02') }}</h5>
                                </li>
                               
                            </ul>

                            </p>
                            <a href="javascript:void(0)" style="display: inline-block; padding: 10px 20px; background: #1DACE3; color: white; font-weight: bold; border-radius: 10px; text-decoration: none;"> {{ __('translation.earn_coupons_btn_01') }} </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider Section End-->

@if(Auth::user()->email_verified == 0)
<!-- Total Earnings section start-->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12 alert alert-warning">
                <form id="verify_email_form" action="{{route('user.verify_email')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <p>Please verify you email!</p>
                        </div>
                        <div class="col-lg-2">
                            <input type="number" name="email_otp" class="form-control form-control-sm" placeholder="Email OTP" min="100000" max="999999" required>
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-primary btn-sm pull-right">&nbsp;&nbsp;&nbsp;Verify&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Total Earnings section end-->
@endif

<!-- Total Earnings section start-->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <div class="wallet_container">
                    <div class="wallet_icon" {!! app()->getLocale() == 'ar' ? 'style="float: left;"' : '' !!}></div>
                    <div class="wallet_title">{{ __('translation.total_earnings') }}</div>
                    <div class="wallet_amount">0.00$</div>
                    <hr />
                    <div class="wallet_note">
                        {{ __('translation.total_earnings_txt_01') }}
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
                    <h2 style="text-align:center; font-weight: bold;"><b>{{ __('translation.total_earnings_txt_02') }}</b></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">
                    <div class="col-lg-4 py-5">
                        <div class="about-us-feature">
                            <div class="about-us-icon"></div>
                            <div class="about-us-title"> {{ __('translation.total_earnings_txt_heading_03') }} </div>
                            <div class="about-us-text">{{ __('translation.profile_para_1') }}</div>
                            <a href="{{route('user.claimCashback')}}" class="btn btn-primary shadow-gray" {!! app()->getLocale() == 'ar' ? 'style="float: left;"' : 'style="float: right;"' !!}>{{ __('translation.view_more_btn_txt') }}</a>
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
                            <div class="about-us-title">{{ __('translation.total_earnings_txt_heading_02') }} </div>
                            <div class="about-us-text">{{ __('translation.profile_para_2') }}</div>
                            <a href="{{route('user.withdrawPayment')}}" class="btn btn-primary shadow-gray" {!! app()->getLocale() == 'ar' ? 'style="float: left;"' : 'style="float: right;"' !!}>{{ __('translation.view_more_btn_txt') }}</a>
                            <p></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 py-5">
                        <div class="about-us-feature">
                            <div class="about-us-icon"></div>
                            <div class="about-us-title">{{ __('translation.total_earnings_txt_heading_01') }}</div>
                            <div class="about-us-text">{{ __('translation.profile_para_3') }}</div>
                            <a href="{{route('user.paymenyHistory')}}" class="btn btn-primary shadow-gray" {!! app()->getLocale() == 'ar' ? 'style="float: left;"' : 'style="float: right;"' !!}>{{ __('translation.view_more_btn_txt') }}</a>
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
@section('addScript')
    <script type="text/javascript" src="{{URL::to('/public/web_assets/js/profile.js')}}"></script>
@endsection