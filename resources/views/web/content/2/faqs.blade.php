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

                        @if ( app()->getLocale() == 'en' )
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.FAQs') }}</a></strong></li>
                        @endif
                        @if ( app()->getLocale() == 'ar' )
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong> {{ __('translation.FAQs') }} </a></strong></li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container np-container">
        <div class="dcm_banner" style="background: url('{{URL::to('/public/web_assets/images/banner/dcm_banner.png')}}') no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
            <h1 class="text-center" style="padding-top: 200px;color:#fff ;font-size:35px">{{ __('translation.FAQs') }}</h1>
        </div>

        <div class="dcm_banner_mobile">
            <h1 class="text-center" style="padding-top:40px;color:#fff">{{ __('translation.FAQs') }}</h1>
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

<!-- FAQs section start-->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-lg-12 col-12">

                <div class="text-center text-md-start mb-5">

                    <p class="mb-0">
                        {{ __('translation.faq_page_text_01_ksa') }}
                    </p>

                </div>

            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12 col-12 mb-5">

                <h2 class="mb-5"> {{ __('translation.faq_page_text_02_ksa') }} </h2>
                <div class="accordion">
                    <div class="accordion-item">
                        <button id="accordion-button-1" aria-expanded="false">
                            <span class="accordion-title"> {{ __('translation.faq_page_text_question_01_ksa') }} </span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_01_ksa') }}
                            </p>

                            <li style="font-weight: bold;">{{ __('translation.ksa_coupons_list') }} </li>
                            <li style="font-weight: bold;">{{ __('translation.ksa_promo_list') }} </li>
                            <li style="font-weight: bold;">{{ __('translation.ksa_discount_list') }} </li>
                            <li style="font-weight: bold;">{{ __('translation.ksa_voucher_list') }} </li>

                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-2" aria-expanded="false">
                            <span class="accordion-title">{{ __('translation.faq_page_text_question_07_ksa') }} </span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_07_ksa') }}
                            </p>
                            <p>
                                {{ __('translation.faq_page_text_answer_08_ksa') }}
                            </p>
                            <p>
                                {{ __('translation.faq_page_text_answer_09_ksa') }}
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-3" aria-expanded="false">
                            <span class="accordion-title"> {{ __('translation.faq_page_text_question_02_ksa') }} </span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                <strong>{{ __('translation.faq_page_text_answer_02_01_ksa') }}</strong>
                            </p>
                            <ul>
                                <li>{{ __('translation.faq_page_text_answer_02_02_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_03_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_04_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_05_ksa') }}</li>
                            </ul>
                            <p>
                                <strong>{{ __('translation.faq_page_text_answer_02_06_ksa') }}</strong>
                            </p>
                            <ul>
                                <li>{{ __('translation.faq_page_text_answer_02_07_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_08_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_09_ksa') }}</li>
                           
                            </ul>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-4" aria-expanded="false">
                            <span class="accordion-title"> {{ __('translation.faq_page_text_question_03_ksa') }} </span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                        <p>
                                <strong>{{ __('translation.faq_page_text_answer_02_10_ksa') }}</strong>
                            </p>
                            <ul>
                                <li>{{ __('translation.faq_page_text_answer_02_11_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_12_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_13_ksa') }}</li>
            
                            </ul>
                            <p>
                                <strong>{{ __('translation.faq_page_text_answer_02_14_ksa') }}</strong>
                            </p>
                            <ul>
                                <li>{{ __('translation.faq_page_text_answer_02_15_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_16_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_17_ksa') }}</li>
                           
                            </ul>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-5" aria-expanded="false">
                            <span class="accordion-title">{{ __('translation.faq_page_text_question_04_ksa') }}</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_02_18_ksa') }}
                            </p>
                            <ul>
                                <li>{{ __('translation.faq_page_text_answer_02_19_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_20_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_21_ksa') }}</li>
                            </ul>
                            <p>
                                {{ __('translation.faq_page_text_answer_02_22_ksa') }}
                            </p>
                            <ul>
                                <li>{{ __('translation.faq_page_text_answer_02_23_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_24_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_25_ksa') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-5" aria-expanded="false">
                            <span class="accordion-title">{{ __('translation.faq_page_text_question_05_ksa') }}</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_02_26_ksa') }}
                            </p>
                            <p>
                            {{ __('translation.faq_page_text_answer_02_27_ksa') }}
                            </p>
                            <ul>
                                <li>{{ __('translation.faq_page_text_answer_02_28_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_29_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_30_ksa') }}</li>
                            </ul>
                            <p>
                                {{ __('translation.faq_page_text_answer_02_31_ksa') }}
                            </p>
                            <ul>
                                <li>{{ __('translation.faq_page_text_answer_02_32_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_33_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_34_ksa') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-5" aria-expanded="false">
                            <span class="accordion-title">{{ __('translation.faq_page_text_question_06_ksa') }}</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_02_35_ksa') }}
                            </p>
                            <p>
                                {{ __('translation.faq_page_text_answer_02_36_ksa') }}
                            </p>
                            <ul>
                                <li>{{ __('translation.faq_page_text_answer_02_37_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_38_ksa') }}</li>
                            </ul>
                            <p>
                                {{ __('translation.faq_page_text_answer_02_06_ksa') }}
                            </p>
                            <ul>
                                <li>{{ __('translation.faq_page_text_answer_02_40_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_41_ksa') }}</li>
                                <li>{{ __('translation.faq_page_text_answer_02_42_ksa') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <h3 style="color:#1DACE3" class="text-center">{{ __('translation.faq_page_text_07_ksa') }}</h3>
                    <span class="mt-2" style="text-align: center;"><input type="submit" name="sing-up" class="btn btn-primary px-5 " style="font-weight: lighter;" value="{{ __('translation.contact_us') }}"></span>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- FAQs section end-->

@endsection