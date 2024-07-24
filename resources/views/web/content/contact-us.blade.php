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
                     <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
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
            <h1 class="text-center" style="padding-top: 200px;color:#fff ;font-size:35px">{{ __('translation.contact_us') }}</h1>
        </div>

        <div class="dcm_banner_mobile">
            <h1 class="text-center" style="padding-top:40px;color:#fff">{{ __('translation.contact_us') }}</h1>
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

                <div class="row text-center contact-us-pg"  style="justify-content: center;">

                    <div class="col-md-3" >
                        <div class="contact-us-feature">
                            <div class="about-us-title"><i class="fa fa-solid fa-map-marker" style="font-size: 30px;" aria-hidden="true"></i> {{ __('translation.visit_us') }} </div>
                            <div class="about-us-text">Al Bayan Building, office# 205, Dubai Investment Park, Dubai - UAE</div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="contact-us-feature">
                            <div class="about-us-title"><i class="fa fa-solid fa-phone" style="font-size: 30px;" aria-hidden="true"></i> {{ __('translation.call_us') }} </div>
                            <div class="about-us-text">TEL: <strong>042 957 001</strong> <br>WHATSAPP: <strong>042 957 001</strong></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="contact-us-feature ">
                            <div class="about-us-title"><i class="fa fa-solid fa-envelope" style="font-size: 30px;" aria-hidden="true"></i> {{ __('translation.mail_us') }}</div>
                            <div class="about-us-text"><a href="mailto:info@dealsandcouponsmena.com">info@dealsandcouponsmena.com</a> <br><a href="mailto:contact@dealsandcouponsmena.com">contact@dealsandcouponsmena.com</a></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="contact-us-feature ">
                            <div class="about-us-title"><i class="fa fa-solid fa-clock" style="font-size: 30px;" aria-hidden="true"></i>  {{ __('translation.opening_hours') }}</div>
                            <div class="about-us-text">Mon - Fri | 9:30 am - 7:30 pm<br>Saturday & Sunday | Closed</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- section -->

<!-- section -->
<section class="my-lg-14 my-8" style="background-color: #f2f2f2; padding: 15px 0;">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row text-center">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 mx-auto">
                <form id="contactUsForm">
                    @csrf
                    <div class="mb-8">
                        <!-- heading -->
                        <h2 style="text-align: center;">{{ __('translation.get_in_touch') }}</h2>
                    </div>

                    <div class="firstandlast">
                        <div class="floating-input">
                            <input type="text" name="name" placeholder="{{ __('translation.contact_us_form_01') }}" class="form-control rounded mt-5">
                            <span class="errors name_error"></span>
                        </div>
                        <div class="floating-input">

                            <input type="email" name="email" value="" placeholder="{{ __('translation.contact_us_form_02') }}" class="form-control rounded mt-5">
                            <span class="errors email_error"></span>
                        </div>
                    </div>

                    <div class="firstandlast">
                        <div class="floating-input">
                            <input type="text" name="phone_number" placeholder="{{ __('translation.contact_us_form_03') }}" class="form-control phoneMask rounded mt-5">
                            <span class="errors phone_number_error"></span>
                        </div>
                        <div class="floating-input">
                            <input type="text" name="subject" value="" placeholder="{{ __('translation.contact_us_form_04') }}" class="form-control rounded mt-5">
                            <span class="errors subject_error"></span>
                        </div>
                    </div>

                    <div class=" py-5">
                        <textarea class="form-control rounded" name="messages" cols="10" rows="10" placeholder="{{ __('translation.contact_us_form_05') }}"></textarea>
                        <span class="errors messages_error"></span>
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary shadow-gray" style="font-weight: lighter;" value="{{ __('translation.contact_us_form_btn') }}">

                    <div class="lead-loader">
                        <img src="{{URL::to('/public/loader.gif')}}">
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>

    </div>
</section>
<!-- section -->


<!-- section -->
<section class="my-lg-14 my-8">
    <!-- container -->
    <div class="container">

        <div class="row text-center mt-10">


        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1075.0648040771425!2d55.17229543432887!3d24.997650290812228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f696386c26f1b%3A0xa5dec2128b7a6441!2sDealsandcouponsmena!5e0!3m2!1sen!2sae!4v1710487682400!5m2!1sen!2sae" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


        </div>



    </div>
</section>
<!-- section -->


@endsection
@section('addScript')
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script type="text/javascript" src="{{URL::to('/public/web_assets/js/contact.js')}}"></script>
@endsection