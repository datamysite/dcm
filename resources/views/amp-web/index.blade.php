@extends('amp-web.includes.master')
@section('addStyle')

   <style amp-custom>
      .hero-slider a amp-img {
          width: 100%;
          height: auto;
          border-radius: 20px;
      }
      .slick-slider amp-img {
          display: inline-block;
      }
   </style>

@endsection
@section('content')

   <div class="nav-spacing"></div>
   
   <div class="container emirates-container">
      
   </div>


   <!-- Slider Section Start-->
   <section class="mb-lg-10 my-8 mobile-slider">
      <div class="container">
         <div class="hero-slider">
            <a href="https://wa.me/971585882973" target="_blank" aria-label="Banner 1">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/mob/{{app()->getLocale() == 'ar'  ? 'b1a.png' : 'b1.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 1"></amp-img>
            </a>

            <a href="https://homzmart.com/en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank" aria-label="Banner 2">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/mob/{{app()->getLocale() == 'ar'  ? 'b2a.png' : 'b2.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 2"></amp-img>
            </a>

            <a href="https://www.namshi.com/uae-en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank" aria-label="Banner 3">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/mob/{{app()->getLocale() == 'ar'  ? 'b3a.png' : 'b3.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 3"></amp-img>
            </a>

            <a href="https://www.sivvi.com" target="_blank" aria-label="Banner 4">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/mob/{{app()->getLocale() == 'ar'  ? 'b4a.png' : 'b4.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 4"></amp-img>
            </a>

            <a href="https://yallatoys.com/qa_en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank" aria-label="Banner 5">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/mob/{{app()->getLocale() == 'ar'  ? 'b5a.png' : 'b5.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 5"></amp-img>
            </a>

            <a href="https://www.firstcry.ae?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank" aria-label="Banner 6">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/mob/{{app()->getLocale() == 'ar'  ? 'b6a.png' : 'b6.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 6"></amp-img>
            </a>
         </div>
      </div>
   </section>

   <!-- Category Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container">
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <h3 class="mb-0 page-title">{{ __('translation.Categories') }}</h3>
            </div>
         </div>
         <div class="category-slider" id="hcategory-slider">
            <div class="lazyload-div lazyload-category">
               <amp-img src="{{URL::to('/public/loader-gif.gif')}}" alt="Lazy Loader">
            </div>
         </div>

      </div>
   </section>
   <!-- Category Section End-->


   <!-- Online Stores Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container np-container">
         <!-- row -->
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="{{route('stores', [$region, 'online'])}}">
                  <h3 class="mb-0 page-title">{{ __('translation.ONLINE_STORES') }}</h3>
               </a>
            </div>
         </div>
         <!-- slider -->
         <div class="product-slider-second" id="slider-second">
            <div class="lazyload-div lazyload-product">
               <amp-img src="{{URL::to('/public/loader-gif.gif')}}" alt="Lazy Loader">
            </div>
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
               <amp-img src="{{URL::to('/public/web_assets/images/banner/noon.avif')}}" alt="Main Page Banner">
            </div>
         </div>
      </div>
   </section>
   <!--Ads Section 1 End Here-->

   <!-- Retailers Stories Section Start -->
   <section class="my-lg-12 my-8">
      <div class="container np-container">
         <!-- row -->
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="{{route('stores', [$region, 'retail'])}}">
                  <h3 class="mb-0 page-title">{{ __('translation.RETAIL_STORES') }}</h3>
               </a>
            </div>
         </div>
         <!-- slider -->
         <div class="product-slider-second" id="slider-third">
            <div class="lazyload-div lazyload-product">
               <amp-img src="{{URL::to('/public/loader-gif.gif')}}" alt="Lazy Loader">
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

   <!-- <div class="divider"></div> -->

   <!-- All Stores Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container np-container" id="all-stores">
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="?i=all-stores">
                  <h3 class="mb-0 page-title">{{ __('translation.All_Stores') }}</h3>
               </a>
            </div>
         </div>

         <div  id="allstores-section">
            <div class="lazyload-div">
               <amp-img src="{{URL::to('/public/loader-gif.gif')}}" alt="Lazy Loader">
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

               <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3180751570116638"
                       crossorigin="anonymous"></script>
                  <!-- DCM Responsive -->
                  <ins class="adsbygoogle"
                       style="display:block"
                       data-ad-client="ca-pub-3180751570116638"
                       data-ad-slot="1784464113"
                       data-ad-format="auto"
                       data-full-width-responsive="true"></ins>
                  <script>
                       (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
         </div>
      </div>
   </section>
   <!--Ads Section 2 End Here-->

   <div class="divider"></div>

</main>
@endsection
@section('addScript')
   <script type="text/javascript" src="{{URL::to('/public/web_assets/js/home.js')}}"></script>
@endsection