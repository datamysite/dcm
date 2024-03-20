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
                     <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                     <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.contact_us') }}</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container">

        <div class="dcm_banner" style="background: url('{{URL::to('/')}}/public/web_assets/images/banner/dcm_banner.png') no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
            <h2 class="text-center" style="padding-top: 200px;color:#fff ;font-size:35px">{{ __('translation.contact_us') }}</2>
        </div>

        <div class="dcm_banner_mobile">
            <h2 class="text-center" style="padding-top:40px;color:#fff">{{ __('translation.contact_us') }}</2>
        </div>

    </div>
</section>
<!-- Slider Section End-->

<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-6 text-center">
            </div>
        </div>
    </div>
</section>

<!-- section -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-lg-12 col-12">

                <div class="row">
                    <div class="col-12">
                        <div class="mb-8">
                            <!-- heading -->
                            <h2 style="text-align: center;">{{ __('translation.contact_join_us') }}</h2>
                        </div>
                        <!-- <p class="text-center"> {{ __('translation.contact_join_us_txt') }} </p> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-12">

                <div class="row text-center"  style="justify-content: center;">

                    <div class="col-md-3" >
                        <div class="contact-us-feature">
                            <div class="about-us-title text-center"><i class="fa fa-solid fa-map-marker" style="font-size: 30px;" aria-hidden="true"></i> {{ __('translation.visit_us') }} </div>
                            <div class="about-us-text"><strong>{{ __('translation.visit_us_txt') }}</strong></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="contact-us-feature">
                            <div class="about-us-title text-center"><i class="fa fa-solid fa-phone" style="font-size: 30px;" aria-hidden="true"></i> {{ __('translation.call_us') }} </div>
                            <div class="about-us-text"><strong>{{ __('translation.call_us_txt') }}</strong></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="contact-us-feature ">
                            <div class="about-us-title text-center"><i class="fa fa-solid fa-envelope" style="font-size: 30px;" aria-hidden="true"></i> {{ __('translation.mail_us') }}</div>
                            <div class="about-us-text"><strong>{{ __('translation.mail_us_txt') }}</strong></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="contact-us-feature ">
                            <div class="about-us-title text-center"><i class="fa fa-solid fa-clock" style="font-size: 30px;" aria-hidden="true"></i>  {{ __('translation.opening_hours') }}</div>
                            <div class="about-us-text"><strong>{{ __('translation.opening_hours_txt') }}</strong></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- section -->

<!-- section -->
<section class="my-lg-14 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row text-center">

            <div class="col-lg-6 mx-auto">

                <div class="mb-8">
                    <!-- heading -->
                    <h2 style="text-align: left;">{{ __('translation.get_in_touch') }}</h2>
                </div>

                <div class="firstandlast">
                    <div class="floating-input">
                        <input type="text" id="firstname" size="30" placeholder="{{ __('translation.contact_us_form_01') }}" class="form-control rounded mt-5" required="required">
                    </div>
                    <div class="floating-input">

                        <input type="email" name="email" value="" placeholder="{{ __('translation.contact_us_form_02') }}" class="form-control rounded mt-5" required="required">
                    </div>
                </div>

                <div class="firstandlast">
                    <div class="floating-input">
                        <input type="text" name="phone" placeholder="{{ __('translation.contact_us_form_03') }}" class="form-control rounded mt-5" required="required">
                    </div>
                    <div class="floating-input">
                        <input type="text" name="subject" value="" placeholder="{{ __('translation.contact_us_form_04') }}" class="form-control rounded mt-5" required="required">
                    </div>
                </div>

                <div class="input-group py-5">
                    <textarea class="form-control rounded" name="user_msg" cols="10" rows="10" placeholder="{{ __('translation.contact_us_form_05') }}" required="required"></textarea>
                </div>

                <input type="submit" name="submit" class="btn btn-primary shadow-gray" style="font-weight: lighter;" value="{{ __('translation.contact_us_form_btn') }}">

            </div>

            <div class="col-lg-6">
                <div class="col-lg-5 mx-auto">
                    <div class="contact-us-feature" style="background-color: #1DACE3;color:aliceblue;height:auto; border-radius:20px; width:350px; height:450px">
                        <div class="about-us-title text-center">
                            <i class="fa fa-headphones" aria-hidden="true" style="font-size: 35px;"></i> {{ __('translation.live_chat') }}
                        </div>
                        <div class="about-us-text text-center">{{ __('translation.live_chat_txt') }}</div>

                        <div class="mt-5">
                            <input type="submit" name="submit" class="btn btn-white shadow-gray" style="font-weight: lighter;" value="{{ __('translation.lets_chat') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center mt-10">


        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1075.0648040771425!2d55.17229543432887!3d24.997650290812228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f696386c26f1b%3A0xa5dec2128b7a6441!2sDealsandcouponsmena!5e0!3m2!1sen!2sae!4v1710487682400!5m2!1sen!2sae" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


        </div>



    </div>
</section>
<!-- section -->


@endsection