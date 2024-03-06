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
            <h2 class="text-center" style="padding-top: 200px;color:#fff ;font-size:35px">{{ __('translation.FAQs') }}</2>
        </div>

        <div class="dcm_banner_mobile">
            <h2 class="text-center" style="padding-top:40px;color:#fff">{{ __('translation.FAQs') }}</2>
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
                        {{ __('translation.faq_page_text_01') }}
                    </p>

                </div>

            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12 col-12 mb-5">

                <h2 class="mb-5"> {{ __('translation.faq_page_text_02') }} </h2>
                <div class="accordion">
                    <div class="accordion-item">
                        <button id="accordion-button-1" aria-expanded="false">
                            <span class="accordion-title"> {{ __('translation.faq_page_text_question_01') }} </span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_01') }}
                            </p>

                            <li style="font-weight: bold;">{{ __('translation.uae_coupons_list') }} </li>
                            <li style="font-weight: bold;">{{ __('translation.uae_promo_list') }} </li>
                            <li style="font-weight: bold;">{{ __('translation.uae_discount_list') }} </li>
                            <li style="font-weight: bold;">{{ __('translation.uae_voucher_list') }} </li>

                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-2" aria-expanded="false">
                            <span class="accordion-title">{{ __('translation.faq_page_text_question_07') }} </span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_07') }}
                            </p>
                            <p>
                                {{ __('translation.faq_page_text_answer_08') }}
                            </p>
                            <p>
                                {{ __('translation.faq_page_text_answer_09') }}
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-3" aria-expanded="false">
                            <span class="accordion-title"> {{ __('translation.faq_page_text_question_02') }} </span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_06') }}
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-4" aria-expanded="false">
                            <span class="accordion-title"> {{ __('translation.faq_page_text_question_03') }} </span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_06') }}
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-5" aria-expanded="false">
                            <span class="accordion-title">{{ __('translation.faq_page_text_question_04') }}</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_06') }}
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-5" aria-expanded="false">
                            <span class="accordion-title">{{ __('translation.faq_page_text_question_05') }}</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_06') }}
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-5" aria-expanded="false">
                            <span class="accordion-title">{{ __('translation.faq_page_text_question_06') }}</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ __('translation.faq_page_text_answer_06') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <h3 style="color:#1DACE3" class="text-center">{{ __('translation.faq_page_text_07') }}</h3>
                    <span class="mt-2" style="text-align: center;"><input type="submit" name="sing-up" class="btn btn-primary px-5 " style="font-weight: lighter;" value="{{ __('translation.contact_us') }}"></span>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- FAQs section end-->

@endsection
@section('addScript')
<script>
    const items = document.querySelectorAll('.accordion button');

    function toggleAccordion() {
        const itemToggle = this.getAttribute('aria-expanded');

        for (i = 0; i < items.length; i++) {
            items[i].setAttribute('aria-expanded', 'false');
        }

        if (itemToggle == 'false') {
            this.setAttribute('aria-expanded', 'true');
        }
    }

    items.forEach((item) => item.addEventListener('click', toggleAccordion));
</script>
@endsection