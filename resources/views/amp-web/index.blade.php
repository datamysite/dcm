@extends('amp-web.includes.master')
@section('addStyle')

@endsection
@section('content')

   <div class="nav-spacing"></div>


   <!-- Slider Section Start-->
   <section class="mb-lg-10 my-8 mobile-slider" style="height:187.281px;">
      <div class="container">
         <div class="hero-slider">
            <a href="https://wa.me/971585882973" target="_blank" aria-label="Banner 1">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/amp/{{'b1-'.app()->getLocale().'.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 1"></amp-img>
            </a>
<!-- 
            <a href="https://homzmart.com/en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank" aria-label="Banner 2">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/amp/{{'b2-'.app()->getLocale().'.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 2"></amp-img>
            </a>

            <a href="https://www.namshi.com/uae-en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank" aria-label="Banner 3">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/amp/{{'b3-'.app()->getLocale().'.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 3"></amp-img>
            </a>

            <a href="https://www.sivvi.com" target="_blank" aria-label="Banner 4">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/amp/{{'b4-'.app()->getLocale().'.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 4"></amp-img>
            </a>

            <a href="https://yallatoys.com/qa_en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank" aria-label="Banner 5">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/amp/{{'b5-'.app()->getLocale().'.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 5"></amp-img>
            </a>

            <a href="https://www.firstcry.ae?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank" aria-label="Banner 6">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/amp/{{'b6-'.app()->getLocale().'.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 6"></amp-img>
            </a> -->
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
         <div class="category-slider" id="hcategory-slider" style="height: 101.578px;">
            @foreach($categories as $val)
            @php 
               $string = strtolower(trim($val->name));
               $string = str_replace('&', 'and', $string);
               $string = str_replace(' ', '-', $string);
               $slug = preg_replace('/[^a-z0-9-]/', '', $string);
            @endphp
            <div class="item">
               <a href="{{route('category', [$region, $slug])}}/?type={{$val->type == '3' ? '1' : '2'}}" class="text-decoration-none text-inherit">
                  <amp-img src="{{URL::to('/public/storage/categories/'.$val->image)}}" width="65px" height="65px" layout="fixed" alt="Image - {{$val->name}}"></amp-img>
                  <div class="text-truncate">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</div>
               </a>
            </div>
            @endforeach
         </div>

      </div>
   </section>
   <!-- Category Section End-->


   <!-- Online Stores Section Start-->
   <section class="my-lg-12 my-8" style="height:280.907px">
      <div class="container np-container" style="height:280.907px">
         <!-- row -->
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="{{route('stores', [$region, 'online'])}}">
                  <h3 class="mb-0 page-title">{{ __('translation.ONLINE_STORES') }}</h3>
               </a>
            </div>
         </div>
         <!-- slider -->
         <div class="product-slider-second" id="slider-second" style="height:240px">
            @foreach($onlinestores as $val)
               <!-- item -->
               <div class="item">
                  <div class="custom_col">
                     <div class="flip-container">
                        <div class="flipper">
                           <div class="front">
                              <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->retailer->ar_logo : $val->retailer->logo}}" layout="responsive" width="185px" height="230.516px" alt="Store - {{$val->retailer->name}}" style="border-radius: 20px;"></amp-img>
                              <a href="?b={{$val->retailer->slug}}" class="img-pop-up" aria-label="Online Store - {{$val->retailer->name}}">
                                 <div class="custom_arrow-button2">
                                    <i class="bi bi-arrow-right-circle"></i>
                                 </div>
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
               <amp-img src="{{URL::to('/public/web_assets/images/banner/noon.avif')}}" layout="responsive" width="400px" height="180px" alt="Main Page Banner">
            </div>
         </div>
      </div>
   </section>
   <!--Ads Section 1 End Here-->

   <!-- Retailers Stories Section Start -->
   <section class="my-lg-12 my-8" style="height:280.907px">
      <div class="container np-container" style="height:280.907px">
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
               <amp-img src="{{URL::to('/public/loader-gif.gif')}}" width="100px" height="20px" layout="fixed" alt="Lazy Loader">
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
               <amp-img src="{{URL::to('/public/loader-gif.gif')}}" width="100px" height="20px" layout="fixed" alt="Lazy Loader">
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