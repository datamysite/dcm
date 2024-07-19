@extends('web.includes.master')
@section('amphtml')
<link rel="amphtml" href="{{$actual_link_m}}" />
@endsection
@section('addImagesrc')
<link rel="image_src" href="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$retailer->ar_logo : $retailer->logo}}" />
@endsection
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
                        <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                        @if(!empty($category_slug))
                        <li class="breadcrumb-item"><a href="{{URL::to('/'.app()->getLocale().'/'.$category_slug)}}" style="color: #000;"><strong>{{app()->getLocale() == 'ar' ? $category->name_ar : $category->name}}</strong></a></li>
                        @endif
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{app()->getLocale() == 'ar' ? $retailer->name_ar : $retailer->name}}</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<!-- Store Prodcut Section Start-->
<section class="mt-2">
    <div class="container np-container">
        <div class="row">
            <div class="col-12">
                <div class=" text-lg-center">
                    <a href="{{URL::to('/'.app()->getLocale().'/'.$retailer->slug)}}">
                        <h1 class=" page-title">{{app()->getLocale() == 'ar' ? $retailer->name_ar : $retailer->name}}</h1>
                    </a><br>
                    @php
                    if($retailer->type == '1'){
                    $brand_domain = explode('/', $retailer->store_link);
                    $brand_domain = $brand_domain[2];
                    }
                    @endphp
                    @if($retailer->type == '1')
                    <a class="brand_store_link" href="{{$retailer->store_link}}">{{$brand_domain}}</a>
                    @endif
                </div>
                <div>
                    <div class="col-12 text-right blogToggle">
                        <button class="btn btn-sm btn-primary btn-blog">About {{$retailer->name}} <span class="arr"><i class="fa fa-arrow-down" aria-hidden="true"></i></span></button>

                    </div>
                </div>
            </div>
            
            <!-- //Stroe Blog Header Section Start// -->
            @if($retailor_blog_header->isNotEmpty() && $retailor_blog_header->first()->section_id == 1)
            <div class="col-12">
                <div class="retailer-blog-content" id="retailerBlogs">
                    @foreach($retailer->blogs as $val)
                    {!! $val->description !!}
                    @endforeach
                </div>
            </div>
            @endif
            <!-- //Stroe Blog Header Section End// -->

        </div>

        @php $bg = 2; $it = 0; $sg = 0; @endphp
        @foreach($offers as $val)
        @php if($bg == count($stripColors)){ $bg = 2;} @endphp
        <div class="row d-flex  m-mt-16 mt-16" style="align-items: center;">
            <div class="col-lg-9">
                <div class="main_div_container" style="background-color: {{$stripColors[$bg]}};">

                    <div class="Lside_div">
                        <img src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$retailer->ar_logo : $retailer->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($retailer->alt_tag_ar) ? $retailer->name_ar : $retailer->alt_tag_ar}} @else {{empty($retailer->alt_tag) ? $retailer->name : $retailer->alt_tag}} @endif" class="img" style="height:80%">
                    </div>

                    <div class="row col-8 col-xs-8 mt-0 p-5" style="align-items: left;">
                        <span style="color:#fff;">{{app()->getLocale() == 'ar' ? $val->title_ar : $val->title}}</span>

                        <span style="color:#fff;"></span>

                        <span class="col text-center">
                            <a href="javascript:void(0)" class="btn btn-white shadow-green showOffer" onclick="return gtag_report_showcoupon;" data-id="{{base64_encode($val->id)}}" style="font-weight:bold; color:#1dace3;">{{ __('translation.show_coupon') }}</a>
                        </span>
                    </div>
                </div>
                <script type="application/ld+json">
                    {
                        "@context": "http://schema.org",
                        "@type": "SaleEvent",
                        "name": "{{$val->title}}",
                        "url": "{{$actual_link}}",
                        "startDate": "{{date('Y-m-d',strtotime('-1 days'))}}",
                        "endDate": "{{date('Y-m-d',strtotime('+5 days'))}}",
                        "location": {
                            "@type": "Place",
                            "name": "{{$retailer->name}}",
                            "url": "{{$retailer->store_link}}",
                            "address": "{{$retailer->name}}"
                        }
                    }
                </script>
            </div>
            <div class="col-lg-3 brand-ad-section">
                @if($it % 2 == 0)
                @if($isMobile)
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3180751570116638" crossorigin="anonymous"></script>
                <ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-g1-1j+1s-5u+hd" data-ad-client="ca-pub-3180751570116638" data-ad-slot="7508887874"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                @else
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3180751570116638" crossorigin="anonymous"></script>
                <!-- DCM Responsive -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3180751570116638" data-ad-slot="1784464113" data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                @endif
                @else
                <div class="row suggested-brand">
                    <div class="col-lg-12">
                        <p>{{$suggestedHeading[$sg]}}</p>
                    </div>
                    <div class="col-6">
                        <a href="{{URL::to('/'.app()->getLocale().'/'.$suggested[$sg]->slug)}}">
                            <img src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$suggested[$sg]->ar_logo : $suggested[$sg]->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($suggested[$sg]->alt_tag_ar) ? $suggested[$sg]->name_ar : $suggested[$sg]->alt_tag_ar}} @else {{empty($suggested[$sg]->alt_tag) ? $suggested[$sg]->name : $suggested[$sg]->alt_tag}} @endif">
                        </a>
                    </div>
                    @php $sg++; @endphp
                    <div class="col-6">
                        <a href="{{URL::to('/'.app()->getLocale().'/'.$suggested[$sg]->slug)}}">
                            <img src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$suggested[$sg]->ar_logo : $suggested[$sg]->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($suggested[$sg]->alt_tag_ar) ? $suggested[$sg]->name_ar : $suggested[$sg]->alt_tag_ar}} @else {{empty($suggested[$sg]->alt_tag) ? $suggested[$sg]->name : $suggested[$sg]->alt_tag}} @endif">
                        </a>
                    </div>
                    @php $sg++; @endphp
                </div>
                @endif
            </div>
        </div>



        @php $bg++; $it++; @endphp
        @endforeach

        @php $bg = 0; $it = 0; $sg = 0; @endphp
        @foreach($coupons as $val)
        @php if($bg == count($stripColors)){ $bg = 0;} @endphp
        <div class="row d-flex  m-mt-16 mt-16" style="align-items: center;">
            <div class="col-lg-9">
                <div class="main_div_container" style="background-color: {{$stripColors[$bg]}};">

                    <div class="Lside_div">
                        <img src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$retailer->ar_logo : $retailer->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($retailer->alt_tag_ar) ? $retailer->name_ar : $retailer->alt_tag_ar}} @else {{empty($retailer->alt_tag) ? $retailer->name : $retailer->alt_tag}} @endif" class="img" style="height:80%">
                    </div>

                    <div class="row col-8 col-xs-8 mt-0 p-5" style="align-items: left;">
                        <span style="color:#fff;">{{app()->getLocale() == 'ar' ? $val->heading_ar : $val->heading}}</span>

                        <span style="color:#fff;"></span>

                        <span class="col text-center">
                            <a href="javascript:void(0)" class="btn btn-white shadow-green showCoupon" onclick="return gtag_report_showcoupon;" data-id="{{base64_encode($val->id)}}" style="font-weight:bold; color:#1dace3;">{{ __('translation.show_coupon') }}</a>
                        </span>
                    </div>
                </div>

                <script type="application/ld+json">
                    {
                        "@context": "http://schema.org",
                        "@type": "SaleEvent",
                        "name": "{{$val->heading}}",
                        "url": "{{$actual_link}}",
                        "startDate": "{{date('Y-m-d',strtotime('-1 days'))}}",
                        "endDate": "{{date('Y-m-d',strtotime('+5 days'))}}",
                        "location": {
                            "@type": "Place",
                            "name": "{{$retailer->name}}",
                            "url": "{{$retailer->store_link}}",
                            "address": "{{$retailer->name}}"
                        }
                    }
                </script>
            </div>
            <div class="col-lg-3 brand-ad-section">
                @if($it % 2 == 0)
                @if($isMobile)
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3180751570116638" crossorigin="anonymous"></script>
                <ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-g1-1j+1s-5u+hd" data-ad-client="ca-pub-3180751570116638" data-ad-slot="7508887874"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                @else
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3180751570116638" crossorigin="anonymous"></script>
                <!-- DCM Responsive -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3180751570116638" data-ad-slot="1784464113" data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                @endif
                @else
                <div class="row suggested-brand">
                    <div class="col-lg-12">
                        <p>{{$suggestedHeading[$sg]}}</p>
                    </div>
                    <div class="col-6">
                        <a href="{{URL::to('/'.app()->getLocale().'/'.$suggested[$sg]->slug)}}">
                            <img src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$suggested[$sg]->ar_logo : $suggested[$sg]->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($suggested[$sg]->alt_tag_ar) ? $suggested[$sg]->name_ar : $suggested[$sg]->alt_tag_ar}} @else {{empty($suggested[$sg]->alt_tag) ? $suggested[$sg]->name : $suggested[$sg]->alt_tag}} @endif">
                        </a>
                    </div>
                    @php $sg++; @endphp
                    <div class="col-6">
                        <a href="{{URL::to('/'.app()->getLocale().'/'.$suggested[$sg]->slug)}}">
                            <img src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$suggested[$sg]->ar_logo : $suggested[$sg]->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($suggested[$sg]->alt_tag_ar) ? $suggested[$sg]->name_ar : $suggested[$sg]->alt_tag_ar}} @else {{empty($suggested[$sg]->alt_tag) ? $suggested[$sg]->name : $suggested[$sg]->alt_tag}} @endif">
                        </a>
                    </div>
                    @php $sg++; @endphp
                </div>
                @endif
            </div>
        </div>
        @php $bg++; $it++; @endphp
        @endforeach

        <!-- //Stroe Blog Footer Section Start// -->
        @if($retailor_blog_footer->isNotEmpty() && $retailor_blog_footer->first()->section_id == 2)
        <div class="container np-container mt-10">
            <div class="row mb-5">
                <div class="col-12">
                    <div>
                        @foreach($retailor_blog_footer as $footer_blog)
                        {!! $footer_blog->description !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- //Stroe Blog Footer Section End// -->

        <!-- //Stroe FAQs Section Start// -->
        @if(count($faqs) != 0)
        <div class="container np-container mt-10">
            <hr style="border-top: 1px solid #1caae2;" class="mt-5">
            <div class="row mb-5">
                <div class="col-lg-12 col-12 mb-5">
                    <h2 class="mb-5"> {{ __('translation.faq_page_text_02') }} </h2>
                    @foreach ($faqs as $faq)
                    <div class="accordion">
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <span class="accordion-title"> {{ $faq->heading }} </span>
                                <span class="icon" aria-hidden="true"></span>
                            </button>
                            <div class="accordion-content">
                                {!! $faq->content !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <!-- //Stroe FAQs Section End// -->

        <div class="container np-container">
            <div class="row mt-16">
                <div class="col-12 mb- text-center">
                    <h3 class="mb-5">{{ __('translation.Feedback') }}</h3>
                </div>
            </div>

            <div class="mt-10 review-slider-second" id="slider-reviews">

                @foreach($testimonials as $val)
                <div class="item">
                    <div class="mb-8">

                        <div class="card bg-light border-0" style="border-radius: 10px;">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="{{URL::to('/public')}}/web_assets/images/reviews/{{$val->gender}}/{{rand(1,3)}}.png" alt="" class="avatar avatar-md rounded-circle" />
                                </div>
                                <div class="ms-3 lh-1">
                                    <h6 class="mb-0">{{$val->name}}</h6>
                                    <small>{{ __('translation.Customer') }}</small>
                                </div>
                            </div>
                            <div class="card-body p-5">
                                <p>{{$val->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>




    </div>
</section>
<!-- Store Prodcut Section End-->



<div class="modal fade" id="ShowCouponModal" tabindex="-1" aria-labelledby="ShowCouponModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="justify-content: center;">
        <div class="modal-content">

            <div class="grap_deal_container">
                <div class="grap_deal_main">

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('addScript')


<!-- Schema Code  (start)-->

      @include('web.includes.schema.speakable')
      @include('web.includes.schema.organization')
      @include('web.includes.schema.breadcrumbs')
      @include('web.includes.schema.localBusiness')
      
        
        @if(count($faq) != 0)
            <script type="application/ld+json">
                {
                  "@context": "https://schema.org",
                  "@type": "FAQPage",
                   "mainEntity": [
                      @foreach ($faq as $faq)
                          {
                            "@type": "Question",
                            "name": "{{ $faq->heading }}",
                            "acceptedAnswer": {
                              "@type": "Answer",
                              "text": "{{ $faq->content }}"
                            }
                          },
                      @endforeach
                    ]
                }
            </script>
        @endif

<!-- Schema Code (end) -->


<script type="text/javascript" src="{{URL::to('/public/web_assets/js/review_slider.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        'use strict'
        let ar = 0;
        $(document).on('click', '.showCoupon', function() {
            var id = $(this).data('id');
            $('#ShowCouponModal .grap_deal_main').html("<img src='{{URL::to("/public/web-loader.gif")}}'>");
            $('#ShowCouponModal').modal('show');
            $.get("{{URL::to('/'.app()->getlocale().'/coupon')}}/" + id, function(data) {
                $('#ShowCouponModal .grap_deal_main').html(data);
            });
        });


        $(document).on('click', '.showOffer', function() {
            var id = $(this).data('id');
            $('#ShowCouponModal .grap_deal_main').html("<img src='{{URL::to("/public/web-loader.gif")}}'>");
            $('#ShowCouponModal').modal('show');
            $.get("{{URL::to('/'.app()->getlocale().'/offers')}}/" + id, function(data) {
                $('#ShowCouponModal .grap_deal_main').html(data);
            });
        });

        $(document).on('click', '.blogToggle', function() {
            if (ar == 0) {
                $('.blogToggle .arr').html('<i class="fa fa-arrow-up" aria-hidden="true"></i>');
                ar = 1;
            } else {
                $('.blogToggle .arr').html('<i class="fa fa-arrow-down" aria-hidden="true"></i>');
                ar = 0;
            }
            $('#retailerBlogs').toggle();
        });

        $(document).on('click', '.grap_deal_btn', function() {
            var link = $(this).data('href');
            var id = $(this).data('id');
            $('#ShowCouponModal').modal('hide');
            $('#loading').css({
                display: 'block'
            });
            $.get("{{URL::to('/'.app()->getlocale().'/coupon/grabDeal')}}/" + id, function(data) {
                $('#loading').css({
                    display: 'none'
                });
                window.location.href = link;
            });
        });

        $(document).on('click', '.whatsapp_chat', function() {
            var link = $(this).data('href');
            var id = $(this).data('id');
            $('#ShowCouponModal').modal('hide');
            $('#loading').css({
                display: 'block'
            });
            $.get("{{URL::to('/'.app()->getlocale().'/offers/whatsapp')}}/" + id, function(data) {
                $('#loading').css({
                    display: 'none'
                });
                window.location.href = link;
            });
        });



        $(document).on('click', '.downloadQrcode', function() {
            var link = $(this).data('href');
            $('#ShowCouponModal').modal('hide');
            window.location.href = link;
        });

    });
</script>
<script>
    gtag('event', 'brand_view', {
        'button_name': 'myBtn',
        'screen_name': 'Brand'
    });

    function gtag_report_showcoupon(url) {
        var callback = function() {
            if (typeof(url) != 'undefined') {
                window.location = url;
            }
        };
        gtag('event', 'show_coupon', {
            'button_name': 'myBtn',
            'screen_name': 'Brand'
        });
        return false;
    }


    function gtag_report_qrcodeDownload(url) {
        var callback = function() {
            if (typeof(url) != 'undefined') {
                window.location = url;
            }
        };
        gtag('event', 'qrcode_download', {
            'button_name': 'myBtn',
            'screen_name': 'Brand'
        });
        return false;
    }


    function gtag_report_whatsappButton(url) {
        var callback = function() {
            if (typeof(url) != 'undefined') {
                window.location = url;
            }
        };
        gtag('event', 'whatsapp_button', {
            'button_name': 'myBtn',
            'screen_name': 'Brand'
        });
        return false;
    }


    function gtag_report_grabDeal(url) {
        var callback = function() {
            if (typeof(url) != 'undefined') {
                window.location = url;
            }
        };
        gtag('event', 'grab_deal', {
            'button_name': 'myBtn',
            'screen_name': 'Brand'
        });
        return false;
    }
</script>
@endsection