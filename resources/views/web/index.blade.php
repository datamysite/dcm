@extends('web.includes.master')
@section('amphtml')
<link rel="amphtml" href="{{$actual_link_m}}" />

   <!-- Slider Preload -->
   @foreach($slider as $key => $val)
   <link rel="preload" as="image" href="{{config('app.storage').'slider/'.$val->img_name}}">
   @endforeach
@endsection
@section('content')

<div class="nav-spacing"></div>

<!-- <div class="container emirates-container np-container">
   <div class="emirates-section-nav">
      @foreach($allstates as $val)
      <a href="{{route('setRegion', [app()->getLocale(), $val->slug])}}" class="selectEmirates {{$val->slug == $region ? 'active' : ''}}" data-id="{{base64_encode($val->id)}}" aria-label="{{app()->getLocale() == 'ar'  ? $val->name_ar : $val->name}}">
         <div class="header_card">
            <img src="{{config('app.storage').'/states/'.$val->image}}" alt="Image - {{$val->name}}" class="{{$val->name}} emirates_view" onclick="return gtag_report_emiratesview;" />
            {{app()->getLocale() == 'ar'  ? $val->name_ar : $val->name}}
         </div>
      </a>
      @endforeach
   </div>
</div> -->

<!-- Cashback Popup Alert MWeb Message Start -->
@if( Auth::check() == null && Route::currentRouteName() === 'home' )
<div style="justify-content: center;justify-items:center;" {!! app()->getLocale() == 'ar' ? 'class="MWebPopUPMSG mt-1 join-cashback-block"' : 'class="MWebPopUPMSG mt-12 join-cashback-block"' !!}>

   <div class="mt-0">
      <div class="row row text-center">
         <div class="col-sm-12 mt-2">
            <span class="mt-2" style="color: black;"><b>{{ __('translation.cashback_txt') }}</b></span>
         </div>
         @if(Auth::user() === null)
         <div class="col-sm-12 mt-2 text-center">
            <span class="mt-2" style="color: black;">
               <a class="btn" href="javascript:void(0)" role="button" data-bs-toggle="modal" data-bs-target="#userModal" style="border-radius: 10px !important;">{{ __('translation.join_now_txt') }}</a>
            </span>
         </div>
         @endif

         <div class="col-sm-12 mt-3 text-center">
            <a href="{{route('claim_cashback')}}" class="how-to-earn">
               <h5> {{ __('translation.how_to_earn_txt') }}</h5>
            </a>
         </div>
         <p></p>
      </div>
   </div>

   </div>
   @endif
   <!-- Cashback Popup Alert MWeb Message End -->

   <!-- Slider Section Desktop Start-->
   <section class="mt-5 mb-lg-10 desktop-slider">
      <div class="container np-container">
         <a href="https://chromewebstore.google.com/detail/dcm-savings-companion/pbgekicjfckaoopigiohnfbdmhllekhf?hl=en-GB" target="_blank" class="ext-banner">
            <img src="{{URL::to('/public/extension-new.png')}}" style="width:100%; height:auto;">
         </a>

         <div class="hero-slider">
            @foreach($slider as $key => $val)
            <a href="{{$val->img_url}}" target="_blank" aria-label="Banner">
               <img fetchpriority="high" class="main_banner_{{++$key}} main_banner" onclick="return gtag_report_mainbanner;" src="{{config('app.storage').'slider/'.$val->img_name}}" alt="Hero Slider {{++$key}}">
            </a>
            @endforeach
         </div>
      </div>
   </section>
   <!-- Slider Section Desktop End-->


   <!-- Slider Section Mobile Start-->
   <div class="MwebSlider">
      <section class="mt-0 mb-lg-10">
         <div class="container np-container">
            <a href="https://chromewebstore.google.com/detail/dcm-savings-companion/pbgekicjfckaoopigiohnfbdmhllekhf?hl=en-GB" target="_blank" class="ext-banner">
               <img src="{{URL::to('/public/extension-new.png')}}" style="width:100%; height:auto;">
            </a>

            <div class="hero-slider">
               @foreach($slider as $key => $val)
               <a href="{{$val->img_url}}" target="_blank" aria-label="Banner">
                  <img fetchpriority="high" class="main_banner_{{++$key}} main_banner" onclick="return gtag_report_mainbanner;" src="{{config('app.storage').'slider/'.$val->img_name}}" alt="Hero Slider {{++$key}}">
               </a>
               @endforeach
            </div>
         </div>
      </section>
   </div>
   <!-- Slider Section Mobile End-->


   <!-- Category Section Start-->
   <section class="my-lg-12 my-8 home-category">
      <div class="container">
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="{{URL::to('/'.app()->getLocale().'/category')}}">
                  <h3 class="mb-0 page-title">{{ __('translation.Categories') }}</h3>
               </a>
            </div>
         </div>
         <div class="category-slider" id="hcategory-slider">
            @foreach($categories as $val)
            @php
            $string = strtolower(trim($val->name));
            $string = str_replace('&', 'and', $string);
            $string = str_replace(' ', '-', $string);
            $slug = preg_replace('/[^a-z0-9-]/', '', $string);
            @endphp
            <div class="item ">
               <a href="{{URL::to('/'.app()->getLocale().'/'.$slug)}}/?type={{$val->type == '3' ? '1' : '2'}}" class="text-decoration-none text-inherit">
                  <img src="{{config('app.storage').'categories/'.$val->image}}" alt="Image - {{$val->name}}" onclick="return gtag_report_categoryview;" class="{{$slug}} category_view" width="100px" height="100px" />
                  <div class="text-truncate">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</div>
               </a>
            </div>
            @endforeach
         </div>

      </div>
   </section>
   <!-- Category Section End-->

   <!-- How To Eearn Coupon Section Start-->
   <section class="my-lg-12 my-8 how-to-are-section">
      <a href="{{route('claim_cashback')}}">

         <!-- <div class="container np-container">
         <div class="animated-banner">
            <img src="{{URL::to('public/web_assets/images/animated/nbackground.png')}}" alt="How to Earn Background" style="width:100%; height: 100%;">
            <div class="content">
               <h1>{{ __('translation.earn_coupons_title') }}<br>{{ __('translation.earn_coupons_title01') }}</h1>
               <ol>
                  <li>{{ __('translation.earn_coupons_txt_01') }}</li>
                  <li>{{ __('translation.earn_coupons_txt_02') }}</li>
                  <li>{{ __('translation.earn_coupons_txt_03') }}</li>
               </ol>
            </div>
            <div class="object-section">
               <img class="light" src="{{URL::to('public/web_assets/images/animated/nlights-1.png')}}" alt="How to Earn 1" style="width:100%; height: auto;">
               <img class="box-1" src="{{URL::to('public/web_assets/images/animated/nbox-3.png')}}" alt="How to Earn 2">
               <img class="money-1" src="{{URL::to('public/web_assets/images/animated/nmoney1.png')}}" alt="How to Earn 3">
               <img class="cover-1" src="{{URL::to('public/web_assets/images/animated/ncover-1.png')}}" alt="How to Earn 4">
               <img class="box-2" src="{{URL::to('public/web_assets/images/animated/nbox-2-small.png')}}" alt="How to Earn 5">
               <img class="box-3" src="{{URL::to('public/web_assets/images/animated/nbox-1.png')}}" alt="How to Earn 6">
            </div>
         </div>
      </div> -->
         <div class="container np-container">
            <div class="row">
               <div class="col-12">
                  <img src="{{URL::to('/public/web_assets/images/banner/cashback_banner.png')}}" alt="Cashback Banner" style="border-radius:20px">
               </div>
            </div>
         </div>
      </a>
   </section>
   <!-- How To Eearn Coupon Section End-->

   <!-- Top Stores Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container np-container">
         <!-- row -->
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="{{URL::to('/'.app()->getLocale().'/stores/online')}}">
                  <h3 class="mb-0 page-title">{{ __('translation.TOP_STORES') }}</h3>
               </a>
            </div>
         </div>
         <!-- slider -->
         <div class="product-slider-second" id="slider-fourth">
            @foreach($topstores as $val)
            <!-- item -->
            <div class="item">
               <div class="custom_col" style="height: 100%;">
                  <div class="flip-container" style="height:150px !important">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($val->alt_tag_ar) ? $val->name_ar : $val->alt_tag_ar}} @else {{empty($val->alt_tag) ? $val->name : $val->alt_tag}} @endif" style="object-fit: cover;overflow: hidden;border-radius:10px;height:150px !important;" />
                           <a href="?b={{$val->slug}}" class="img-pop-up" aria-label="Online Store - {{$val->name}}">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="{{URL::to('/'.app()->getLocale().'/'.$val->slug)}}" class="img-pop-up" aria-label="Online Store - {{$val->name}}">
                              <img class="img-fluid w-100" src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($val->alt_tag_ar) ? $val->name_ar : $val->alt_tag_ar}} @else {{empty($val->alt_tag) ? $val->name : $val->alt_tag}} @endif" style="object-fit: cover;overflow: hidden;border-radius: 10px;height:150px !important;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         
         <div class="row" style="justify-content: flex-end;">
            <div class="col-lg-2 col-2">
               <div class="slider-arrow" id="slider-fourth-arrows"></div>
            </div>
         </div>
      </div>
   </section>
   <!-- Top Stores Section End-->

   <!-- Online Stores Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container np-container">
         <!-- row -->
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="{{URL::to('/'.app()->getLocale().'/stores/online')}}">
                  <h3 class="mb-0 page-title">{{ __('translation.ONLINE_STORES') }}</h3>
               </a>
            </div>
         </div>
         <!-- slider -->
         <div class="product-slider-second" id="slider-second">

            @foreach($onlinestores as $val)
            <!-- item -->
            <div class="item">
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($val->alt_tag_ar) ? $val->name_ar : $val->alt_tag_ar}} @else {{empty($val->alt_tag) ? $val->name : $val->alt_tag}} @endif" style="border-radius: 20px;" />
                           <a href="?b={{$val->slug}}" class="img-pop-up" aria-label="Online Store - {{$val->name}}">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="{{URL::to('/'.app()->getLocale().'/'.$val->slug)}}" class="img-pop-up" aria-label="Online Store - {{$val->name}}">
                              <img class="img-fluid w-100" src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($val->alt_tag_ar) ? $val->name_ar : $val->alt_tag_ar}} @else {{empty($val->alt_tag) ? $val->name : $val->alt_tag}} @endif" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         <div class="row" style="justify-content: flex-end;">
            <div class="col-lg-2 col-2">
               <div class="slider-arrow" id="slider-second-arrows"></div>
            </div>
         </div>
      </div>
   </section>
   <!-- Online Stores Section End-->

   <!--Ads Section 1 Start Here-->
   <section class="my-lg-12 my-8">
      <div class="container ad-container np-container">
         <div class="row">
            <div class="col-12">
               <img src="{{URL::to('/public/web_assets/images/banner/add-banner.png')}}" alt="Main Page Banner">
            </div>
         </div>
      </div>
   </section>
   <!--Ads Section 1 End Here-->

   @if(config('app.retail'))
   <!-- Retailers Stories Section Start -->
   <section class="my-lg-12 my-8">
      <div class="container np-container">
         <!-- row -->
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="{{URL::to('/'.app()->getLocale().'/stores/retail')}}">
                  <h3 class="mb-0 page-title">{{ __('translation.RETAIL_STORES') }}</h3>
               </a>
            </div>
         </div>
         <!-- slider -->
         <div class="product-slider-second" id="slider-third">
            <div class="lazyload-div lazyload-product">
               <img src="{{URL::to('/public/loader-gif.gif')}}" alt="Lazy Loader">
            </div>
         </div>

         <div class="row" style="justify-content: flex-end;">
            <div class="col-lg-2 col-2">
               <div class="slider-arrow" id="slider-third-arrows"></div>
            </div>
         </div>
      </div>
   </section>
   <!-- Retailers Stoires Section End-->
   @endif

   <!-- <div class="divider"></div> -->

   <!-- All Stores Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container np-container" id="all-stores">
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="{{URL::to('/'.app()->getLocale().'/stores')}}">
                  <h3 class="mb-0 page-title">{{ __('translation.All_Stores') }}</h3>
               </a>
            </div>
         </div>

         <div id="allstores-section" style="min-height: 822.281px;">
            <div class="lazyload-div">
               <img src="{{URL::to('/public/loader-gif.gif')}}" alt="Lazy Loader">
            </div>
         </div>

      </div>
   </section>
   <!-- All Stores Section End-->

   <!-- <div class="divider"></div> -->

   <!--Ads Section 2 Start Here-->
   <section class="my-lg-12 my-8">
      <div class="container ad-container np-container">
         <div class="row">
            <div class="col-12">
               @if($isMobile)
               <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3180751570116638" crossorigin="anonymous"></script>
               <ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-g1-1j+1s-5u+hd" data-ad-client="ca-pub-3180751570116638" data-ad-slot="7508887874"></ins>
               <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
               </script>
               @else
               <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3180751570116638" crossorigin="anonymous"></script>
               <!-- DCM_Footer_Horizontal_Responsive -->
               <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3180751570116638" data-ad-slot="4853480582" data-ad-format="auto" data-full-width-responsive="true"></ins>
               <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
               </script>
               @endif
            </div>
         </div>
   </section>
   <!--Ads Section 2 End Here-->

   <div class="divider"></div>

   </main>
   @endsection
   @section('addScript')

   <!-- Schema Code  (start)-->

   @include('web.includes.schema.speakable')
   @include('web.includes.schema.organization')
   @include('web.includes.schema.breadcrumbs')
   @include('web.includes.schema.localBusiness')

   <!-- Schema Code (end) -->

   <script type="text/javascript">
      @if(!empty($_GET['ref']) && $_GET['ref'] == 'signin')
      $(document).ready(function() {
         document.getElementById('open-signin').click();
      });
      @endif
      @if(!empty($_GET['ref']) && $_GET['ref'] == 'signup')
      $(document).ready(function() {
         document.getElementById('open-signin').click();
         document.getElementById('open-signup').click();
      });
      @endif
   </script>
   <script type="text/javascript" src="{{URL::to('/public/web_assets/js/home.js')}}"></script>
   <script type="text/javascript">
      function gtag_report_mainbanner(url) {
         var callback = function() {
            if (typeof(url) != 'undefined') {
               window.location = url;
            }
         };
         gtag('event', 'banner_view', {
            'button_name': 'myBtn',
            'screen_name': 'Home'
         });
         return false;
      }

      function gtag_report_categoryview(url) {
         var callback = function() {
            if (typeof(url) != 'undefined') {
               window.location = url;
            }
         };
         gtag('event', 'category_view', {
            'button_name': 'myBtn',
            'screen_name': 'Home'
         });
         return false;
      }

      function gtag_report_emiratesview(url) {
         var callback = function() {
            if (typeof(url) != 'undefined') {
               window.location = url;
            }
         };
         gtag('event', 'emirates_view', {
            'button_name': 'myBtn',
            'screen_name': 'Home'
         });
         return false;
      }
   </script>
   @endsection