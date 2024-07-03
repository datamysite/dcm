@extends('web.includes.master')

@section('content')

<div class="mt-110">
    <div class="container">
    </div>
</div>


<!-- VideoBanner Section Start-->
<section class="mt-2">
    <div class="container np-container">

        <div class="dcm_banner" style="background-color: #F2F2F2; border-radius: 10px; background-image: linear-gradient(90deg, #012a7d, #2791CC);height:400px">
            <div class="text-center" style="width: 100%;justify-content: center;justify-items:center">
                <div class="row text-center" style="justify-content: center;padding-top:10px">

                    <div class="col-lg-6 mt-5" style="border-radius: 10px;width:40%; color:#fff;">
                        <div class="col-sm-6 mt-10">
                            <h5 {!! app()->getLocale() == 'ar' ? 'style="text-align: right;color:#fff;"' : 'style="text-align: left;color:#fff;"' !!} >{{ __('translation.how_to_earn_txt') }}</h5>
                        </div>
                        <p class="mt-5" {!! app()->getLocale() == 'ar' ? 'style="text-align: right;font-size:18px"' : 'style="text-align: left;font-size:18px"' !!} >
                            {{ __('translation.how_to_earn_txt_1') }} <br> {{ __('translation.how_to_earn_txt_2') }} <a href="https://dealsandcouponsmena.ae/" style="color: #fff;"><b>{{ __('translation.how_to_earn_txt_3') }}</b></a> {{ __('translation.how_to_earn_txt_4') }} <br>
                            {{ __('translation.how_to_earn_txt_5') }} <a href="https://dealsandcouponsmena.ae/" style="color: #fff;"><b>{{ __('translation.how_to_earn_txt_3') }}</b></a> {{ __('translation.how_to_earn_txt_6') }}<br> {{ __('translation.how_to_earn_txt_7') }}
                        </p>
                        <p class="mt-5" {!! app()->getLocale() == 'ar' ? 'style="text-align: right;"' : 'style="text-align: left;"' !!} >
                            <a href="https://dealsandcouponsmena.ae/" class="btn btn-white shadow-blue" style="color:#012a7d;" style="font-weight: lighter;">{{ __('translation.how_to_earn_txt_8') }}</a>
                        </p>
                    </div>
                    <div class="col-lg-6 mt-10" style="border-radius: 10px;width:40%">

                        <div class="video-container">
                            <div class="video-player">
                                <!-- Local-Video -->
                                <video src="{{ asset('/public/web_assets/images/video/promo_video.mp4') }}" type="video/mp4" controls muted loop autoplay></video>
                                <!-- Youtube-Video -->
                                <!-- <iframe width="100%" height="350" src="https://www.youtube.com/embed/uRRbCDxX5WE?autoplay=1&mute=1" title="DCM" frameborder="0" allow="clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider" style="height: 40px;"></div>
        </div>

        <div class="dcm_banner_mobile" style="background-color: #F2F2F2; border-radius: 25px; background-image: linear-gradient(90deg, #012a7d, #2791CC);height: auto;">
            <h4 class="text-center" style="padding-top:20px;color:#fff">{{ __('translation.how_to_earn_txt') }}</h4>
            <p class="text-center" style="color:#fff; font-size:15px">
                {{ __('translation.how_to_earn_txt_1') }} <br> {{ __('translation.how_to_earn_txt_2') }} <a href="https://dealsandcouponsmena.ae/" style="color: #fff;"><b>{{ __('translation.how_to_earn_txt_3') }}</b></a> {{ __('translation.how_to_earn_txt_4') }} <br>
                {{ __('translation.how_to_earn_txt_5') }} <a href="https://dealsandcouponsmena.ae/" style="color: #fff;"><b>{{ __('translation.how_to_earn_txt_3') }}</b></a> {{ __('translation.how_to_earn_txt_6') }}<br> {{ __('translation.how_to_earn_txt_7') }}
            </p>

            <div class="video-container" style=" border-radius: 25px;margin:10px">
                <div class="video-player">
                    <!-- Local-Video -->
                    <video src="{{ asset('/public/web_assets/images/video/promo_video.mp4') }}" type="video/mp4" controls muted loop autoplay></video>
                    <!-- Youtube-Video -->
                    <!-- <iframe width="100%" src="https://www.youtube.com/embed/uRRbCDxX5WE?autoplay=1&mute=1" title="DCM" frameborder="0" allow="clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                </div>
            </div>
            <p class="mt-1 text-center">
                <a href="https://dealsandcouponsmena.ae/" class="btn btn-white shadow-blue" style="color:#012a7d;" style="font-weight: lighter;">{{ __('translation.how_to_earn_txt_8') }}</a>
            </p>
            <div style="height: 3px;"></div>
        </div>

    </div>
</section>
<!-- VideoBanner Section End-->

<!-- section -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container np-container">
        <!-- row -->

        <div class="DesktopView row mt-5">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-2 d-flex flex-column justify-content-top">
                            <div class="vertical-line">
                                <div class="circle1"></div>
                            </div>
                        </div>

                        <div class="col-lg-4 text-center">
                            <span {!! app()->getLocale() == 'ar' ? 'style="padding-right: 200px;"' : 'style="padding-left: 200px;"' !!} >
                                <img src="{{URL::to('/public')}}/web_assets/images/icons/1a.png" alt="DCM" style="width:200px; height:200px;">
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-12">
                                <h5>{{ __('translation.how_to_earn_setps_txt_1') }}</h5>
                                <p>
                                    {{ __('translation.how_to_earn_setps_txt_2') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-0">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-2 d-flex flex-column justify-content-top">
                            <div class="vertical-line">
                                <div class="circle2"></div>
                            </div>
                        </div>

                        <div class="col-lg-4 text-center">
                            <span {!! app()->getLocale() == 'ar' ? 'style="padding-right: 200px;"' : 'style="padding-left: 200px;"' !!}>
                                <img src="{{URL::to('/public')}}/web_assets/images/icons/1b.png" alt="DCM" style="width:200px; height:200px;">
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-12">
                                <h5>{{ __('translation.how_to_earn_setps_txt_3') }}</h5>
                                <p>
                                    {{ __('translation.how_to_earn_setps_txt_4') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-0">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-2 d-flex flex-column justify-content-top">
                            <div class="vertical-line">
                                <div class="circle3"></div>
                            </div>
                        </div>

                        <div class="col-lg-4 text-center">
                            <span {!! app()->getLocale() == 'ar' ? 'style="padding-right: 200px;"' : 'style="padding-left: 200px;"' !!}>
                                <img src="{{URL::to('/public')}}/web_assets/images/icons/1c.png" alt="DCM" style="width:200px; height:200px;">
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-12">
                                <h5>{{ __('translation.how_to_earn_setps_txt_5') }}</h5>
                                <p>
                                    {{ __('translation.how_to_earn_setps_txt_6') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divider" style="height: 20px;">

            </div>
            <hr>

            <div class="container ad-container np-container">
                <div class="row">
                    <div class="col-12">
                        <img src="{{URL::to('/public')}}/web_assets/images/banner/discount_banner_.png" alt="Main Page Banner">
                    </div>
                </div>
            </div>
        </div>

        <div class="MobileView row" style="justify-content: center;justify-items:center">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 text-center">
                            <span>
                                <img src="{{URL::to('/public')}}/web_assets/images/icons/1a.png" alt="Dashboard" style="width:155px; height:155px;">
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-5 text-center">
                                <h5>{{ __('translation.how_to_earn_setps_txt_1') }}</h5>
                                <p>
                                    {{ __('translation.how_to_earn_setps_txt_2') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="row text-center">
                        <div class="col-lg-4 text-center">
                            <span>
                                <img src="{{URL::to('/public')}}/web_assets/images/icons/1b.png" alt="Dashboard" style="width:155px; height:155px;">
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-5 text-center">
                                <h5>{{ __('translation.how_to_earn_setps_txt_3') }}</h5>
                                <p>
                                    {{ __('translation.how_to_earn_setps_txt_4') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="row text-center">
                        <div class="col-lg-4 text-center">
                            <span>
                                <img src="{{URL::to('/public')}}/web_assets/images/icons/1c.png" alt="Dashboard" style="width:155px; height:155px;">
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-5 text-center">
                                <h5>{{ __('translation.how_to_earn_setps_txt_5') }}</h5>
                                <p>
                                    {{ __('translation.how_to_earn_setps_txt_6') }}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="container ad-container np-container">
                <div class="row">
                    <div class="col-12">
                        <img src="{{URL::to('/public')}}/web_assets/images/banner/eid-banner.png" alt="Main Page Banner">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- section -->

@endsection