@extends('web.includes.master')

@section('content')

   <div class="nav-spacing"></div>
   
   <div class="container emirates-container">
      <div class="emirates-section-nav">
         @foreach($allstates as $val)
            <a href="{{route('setRegion', $val->slug)}}" class="selectEmirates {{$val->slug == $region ? 'active' : ''}}" data-id="{{base64_encode($val->id)}}">
               <div class="header_card">
                  <img src="{{URL::to('/public/storage/states/'.$val->image)}}" alt="{{$val->name}}" />
                  {{app()->getLocale() == 'ar'  ? $val->name_ar : $val->name}}
               </div>
            </a>
         @endforeach
      </div>
   </div>


   <!-- Slider Section Start-->
   <section class="mb-lg-10 my-8">
      <div class="container">
         <div class="hero-slider">
            <a href="https://wa.me/971585882973" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/banner/{{app()->getLocale() == 'ar'  ? 'b1a.png' : 'nb1.png'}}">
            </a>

            <a href="https://homzmart.com/en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/banner/{{app()->getLocale() == 'ar'  ? 'b2a.png' : 'nb2.png'}}">
            </a>

            <a href="https://www.namshi.com/uae-en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/banner/{{app()->getLocale() == 'ar'  ? 'b3a.png' : 'nb3.png'}}">
            </a>

            <a href="https://www.sivvi.com" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/banner/{{app()->getLocale() == 'ar'  ? 'b4a.png' : 'nb4.png'}}">
            </a>

            <a href="https://yallatoys.com/qa_en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/banner/{{app()->getLocale() == 'ar'  ? 'b5a.png' : 'nb5.png'}}">
            </a>

            <a href="https://www.firstcry.ae?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/banner/{{app()->getLocale() == 'ar'  ? 'b6a.png' : 'nb6.png'}}">
            </a>
         </div>
      </div>
   </section>
   <!-- Slider Section End-->

   <!-- Category Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container">
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <h3 class="mb-0 page-title">{{ __('translation.Categories') }}</h3>
            </div>
         </div>
         <div class="category-slider">
            @foreach($categories as $val)
            @php 
               $string = strtolower(trim($val->name));
               $string = str_replace('&', 'and', $string);
               $string = str_replace(' ', '-', $string);
               $slug = preg_replace('/[^a-z0-9-]/', '', $string);
            @endphp
            <div class="item">
               <a href="{{route('category', [$region, $slug])}}/?type={{$val->type == '3' ? '1' : '2'}}" class="text-decoration-none text-inherit">
                  <img src="{{URL::to('/public/storage/categories/'.$val->image)}}" alt="{{$val->name}}" width="100px" height="100px" class="img-fluid" />
                  <div class="text-truncate">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</div>
               </a>
            </div>
            @endforeach

         </div>

      </div>
   </section>
   <!-- Category Section End-->


   <!-- How To Eearn Coupon Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container np-container">
         <div class="animated-banner">
            <img src="{{URL::to('public/web_assets/images/animated/nbackground.png')}}" style="width:100%; height: 100%;">
            <div class="content">
               <h1>{{ __('translation.earn_coupons_title') }}<br>{{ __('translation.earn_coupons_title01') }}</h1>
               <ol>
                  <li>{{ __('translation.earn_coupons_txt_01') }}</li>
                  <li>{{ __('translation.earn_coupons_txt_02') }}</li>
                  <li>{{ __('translation.earn_coupons_txt_03') }}</li>
               </ol>
            </div>
            <div class="object-section">
               <img class="light" src="{{URL::to('public/web_assets/images/animated/nlights-1.png')}}" style="width:100%; height: auto;">
               <img class="box-1" src="{{URL::to('public/web_assets/images/animated/nbox-3.png')}}">
               <img class="money-1" src="{{URL::to('public/web_assets/images/animated/nmoney1.png')}}">
               <img class="cover-1" src="{{URL::to('public/web_assets/images/animated/ncover-1.png')}}">
               <img class="box-2" src="{{URL::to('public/web_assets/images/animated/nbox-2-small.png')}}">
               <img class="box-3" src="{{URL::to('public/web_assets/images/animated/nbox-1.png')}}">
            </div>
         </div>
      </div>
   </section> 
   <!-- How To Eearn Coupon Section End-->

   <!-- Online Stores Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container np-container">
         <!-- row -->
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="javascript:void(0)">
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
                              <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" alt="Yalla Toys Store" style="border-radius: 20px;" />
                              <a href="javascript:void(0)" class="img-pop-up">
                                 <div class="custom_arrow-button2">
                                    <i class="bi bi-arrow-right-circle"></i>
                                 </div>
                              </a>
                           </div>
                           <div class="back">
                              <a href="{{route('brand',[$region, $val->slug])}}" class="img-pop-up">
                                 <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" alt="Yalla Toys Store" style="border-radius: 20px;" />
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
               <img src="{{URL::to('/public/web_assets/images/banner/noon.avif')}}">
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
               <a href="javascript:void(0)">
                  <h3 class="mb-0 page-title">{{ __('translation.RETAIL_STORES') }}</h3>
               </a>
            </div>
         </div>
         <!-- slider -->
         <div class="product-slider-second" id="slider-third">
            @foreach($retailstores as $val)
               <!-- item -->
               <div class="item">
                  <div class="custom_col">
                     <div class="flip-container">
                        <div class="flipper">
                           <div class="front">
                              <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" alt="Aldo Store" style="border-radius: 20px;" />
                              <a href="{{route('brand', [$region, $val->slug])}}" class="img-pop-up" target="_blank">
                                 <div class="custom_arrow-button2">
                                    <i class="bi bi-arrow-right-circle"></i>
                                 </div>
                              </a>
                           </div>
                           <div class="back">
                              <a href="{{route('brand', [$region, $val->slug])}}" class="img-pop-up">
                                 <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" alt="Aldo Store" style="border-radius: 20px;" />
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- item -->
            @endforeach

            @for($i=0; $i<(5-count($retailstores)); $i++)
            <!-- item -->
            <div class="item">
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{URL::to('/public')}}/{{app()->getLocale() == 'ar' ? 'ar-coming-soon.png' : 'coming-soon.png'}}" alt="Aldo Store" style="border-radius: 20px;" />
                           <a href="Store-Products" class="img-pop-up" target="_blank">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="javascript:void(0)" class="img-pop-up">
                              <img class="img-fluid w-100" src="{{URL::to('/public')}}/{{app()->getLocale() == 'ar' ? 'ar-coming-soon.png' : 'coming-soon.png'}}" alt="Aldo Store" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- item -->
            @endfor

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
               <a href="javascript:void(0)">
                  <h3 class="mb-0 page-title">{{ __('translation.All_Stores') }}</h3>
               </a>
            </div>
         </div>

         <div class="row">


            <div class="col-md-6 col-xs-12 mb-3">
               <a href="{{route('brand', [$region, $allstores[0]->slug])}}">
                  <div class="single-deal v-tile">
                     <div class="overlay"></div>
                     <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[0]->ar_logo : $allstores[0]->logo}}" alt="" style="border-radius: 20px;" />
                     <span class="img-pop-up">
                        <div class="deal-details">
                           <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                           <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                        </div>
                     </span>
                  </div>
               </a>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-3">
               <a href="{{route('brand', [$region, $allstores[1]->slug])}}">
                  <div class="single-deal">
                     <div class="overlay"></div>
                     <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[1]->ar_logo : $allstores[1]->logo}}" alt="Brand For Less" style="border-radius: 20px;" />
                     <span class="img-pop-up">
                        <div class="deal-details">
                           <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                           <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                        </div>
                     </span>
                  </div>
               </a>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-3">
               <a href="{{route('brand', [$region, $allstores[2]->slug])}}">
                  <div class="single-deal">
                     <div class="overlay"></div>
                     <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[2]->ar_logo : $allstores[2]->logo}}" alt="Brand For Less" style="border-radius: 20px;" />
                     <span class="img-pop-up">
                        <div class="deal-details">
                           <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                           <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                        </div>
                     </span>
                  </div>
               </a>
            </div>

         </div>

         <!-- <div class="divider"></div> -->

         <div class="row">

            <div class="col-6 col-xs-6 col-sm-6 col-md-3">
               <a href="{{route('brand', [$region, $allstores[3]->slug])}}">
                  <div class="single-deal">
                     <div class="overlay"></div>
                     <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[3]->ar_logo : $allstores[3]->logo}}" alt="Brand For Less" style="border-radius: 20px;" />
                     <span class="img-pop-up">
                        <div class="deal-details">
                           <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                           <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                        </div>
                     </span>
                  </div>
               </a>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-3">
               <a href="{{route('brand', [$region, $allstores[4]->slug])}}">
                  <div class="single-deal">
                     <div class="overlay"></div>
                     <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[4]->ar_logo : $allstores[4]->logo}}" alt="Brand For Less" style="border-radius: 20px;" />
                     <span class="img-pop-up">
                        <div class="deal-details">
                           <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                           <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                        </div>
                     </span>
                  </div>
               </a>
            </div>

            <div class="col-md-6 col-xs-12 mb-3">
               <a href="{{route('brand', [$region, $allstores[5]->slug])}}">
                  <div class="single-deal v-tile">
                     <div class="overlay"></div>
                     <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[5]->ar_logo : $allstores[5]->logo}}" alt="" style="border-radius: 20px;" />
                     <span class="img-pop-up">
                        <div class="deal-details">
                           <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                           <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                        </div>
                     </span>
                  </div>
               </a>
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
               <amp-ad width="100vw" height="320"
                    type="adsense"
                    data-ad-client="ca-pub-3180751570116638"
                    data-ad-slot="1784464113"
                    data-auto-format="rspv"
                    data-full-width="">
                 <div overflow=""></div>
               </amp-ad>

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