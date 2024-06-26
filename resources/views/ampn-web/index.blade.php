@extends('ampn-web.includes.master')
@section('custom-script')
<?php
   $script_links = [
      URL::to('/public/web_assets/js/amp/main.js'),
   ];
   $main_script = '';
   foreach ($script_links as $key => $value) {
      $content = \App\Helpers\AmpHelper::minify($value);
      $main_script .= $content;
      echo $content;
   }
?>
@endsection
@section('ampscript-hash')
<?php
   $hash = \App\Helpers\AmpHelper::hash_ampscript($main_script); echo $hash;
?>
@endsection
@section('custom-css')
<?php
   $style_link = app()->getLocale() == 'ar' ? '/web_assets/css/amp/n_style-ar.css' : '/web_assets/css/amp/n_style.css'; 

   $content = \App\Helpers\AmpHelper::minify(URL::to('/public'.$style_link));
   echo $content;

?>
@endsection
@section('content')

   <!-- Slider Section Start-->
   <section class="mb-lg-10 my-8 mobile-slider text-center" style="height:187.281px; margin-top: 10px;">
      <div class="hero-slider">
         <amp-carousel width="450" height="185.750" layout="responsive" type="slides" role="region" aria-label="Hero carousel" controls autoplay loop delay="4000">
           <a href="https://wa.me/971585882973" target="_blank" aria-label="Banner 1">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/amp/{{'b1-'.app()->getLocale().'.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 1"></amp-img>
            </a>

            <a href="https://homzmart.com/en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank" aria-label="Banner 2">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/amp/{{'b2-'.app()->getLocale().'.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 2"></amp-img>
            </a>

            <a href="https://www.namshi.com/uae-en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank" aria-label="Banner 3">
               <amp-img src="{{URL::to('/public')}}/web_assets/images/banner/amp/{{'b3-'.app()->getLocale().'.png'}}" layout="responsive" width="400px" height="180px" alt="Hero Slider 3"></amp-img>
            </a>
         </amp-carousel>
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
         <div class="category-slider" id="hcategory-slider" style="height: 100px; padding-top: 20px;">
            <amp-carousel width="450" height="150" layout="responsive" type="slides" role="region" aria-label="Hero carousel" controls="false" autoplay loop delay="4000">
               @php $s = 1; $i=1; @endphp
               <div class="cat-item">
                  @foreach($categories as $val)
                  @php 
                     $string = strtolower(trim($val->name));
                     $string = str_replace('&', 'and', $string);
                     $string = str_replace(' ', '-', $string);
                     $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                  @endphp
                     <a href="{{route('category', [$region, $slug])}}/?type={{$val->type == '3' ? '1' : '2'}}" class="text-decoration-none text-inherit " style="height: 100px;">
                        <amp-img src="{{URL::to('/public/storage/categories/'.$val->image)}}" width="50px" height="50px" alt="Image - {{$val->name}}"></amp-img>
                        <div class="text-truncate">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</div>
                     </a>
                     @php $s++; if($s==5){ echo '</div>'; $i++;} if($s==5 && $i==2){ echo '<div class="cat-item">';$s=1;} @endphp
                  @endforeach
               </div>
            </amp-carousel>
         

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
         <div class="product-slider-second" id="slider-second" style="height:270px">
            <amp-carousel width="450" height="270" layout="responsive" type="slides" role="region" aria-label="Hero carousel" controls="false" autoplay loop delay="4000">
               @php $s = 1; $i=1; @endphp
               <div class="brand-item">
                  @foreach($onlinestores as $val)
                     <a href="{{route('brand', [$region, $val->slug])}}" class="img-pop-up" aria-label="Online Store - {{$val->name}}">
                        <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" layout="responsive" width="185px" height="230px" alt="@if(app()->getLocale() == 'ar') {{empty($val->alt_tag_ar) ? $val->name_ar : $val->alt_tag_ar}} @else {{empty($val->alt_tag) ? $val->name : $val->alt_tag}} @endif" style="border-radius: 20px;"></amp-img>
                              
                     </a>
                     @php $s++; if($s==3){ echo '</div>'; $i++;} if($s==3 && $i==2){ echo '<div class="brand-item">';$s=1;} @endphp
                  @endforeach
               </div>
            </amp-carousel>
      </div>
   </section>
   <!-- Online Stores Section End-->

   <!--Ads Section 1 Start Here-->
   <section class="my-lg-12 my-8">
      <div class="container ad-container np-container">
         <div class="row">
            <div class="col-12">
               <amp-img src="{{URL::to('/public/web_assets/images/banner/add-banner.png')}}" layout="responsive" width="400px" height="165px" alt="Main Page Banner">
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
         <div class="product-slider-second" style="height:270px;">

            <amp-carousel width="450" height="270" layout="responsive" type="slides" role="region" aria-label="Hero carousel" controls="false" autoplay loop delay="4000" id="slider-third">
               @php $s = 1; $i=1; @endphp
               <div class="brand-item">
                  @foreach($retailstores as $val)
                     <a href="{{route('brand', [$region, $val->retailer->slug])}}" class="img-pop-up" aria-label="Online Store - {{$val->retailer->name}}">
                        <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->retailer->ar_logo : $val->retailer->logo}}" layout="responsive" width="185px" height="230px" alt="@if(app()->getLocale() == 'ar') {{empty($val->retailer->alt_tag_ar) ? $val->retailer->name_ar : $val->retailer->alt_tag_ar}} @else {{empty($val->retailer->alt_tag) ? $val->retailer->name : $val->retailer->alt_tag}} @endif" style="border-radius: 20px;"></amp-img>
                              
                     </a>
                     @php $s++; if($s==3){ echo '</div>'; $i++;} if($s==3 && $i==2){ echo '<div class="brand-item">';$s=1;} @endphp
                  @endforeach
               </div>
            </amp-carousel>

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
         <br>
         <div  id="allstores-section">
            <div class="row">
               <div class="col-6">
                  <a href="{{route('brand', [$region, $allstores[1]->slug])}}" aria-label="All Store - {{$allstores[1]->name}}">
                     <div class="single-deal">
                        <div class="overlay"></div>
                        <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[1]->ar_logo : $allstores[1]->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($allstores[1]->alt_tag_ar) ? $allstores[1]->name_ar : $allstores[1]->alt_tag_ar}} @else {{empty($allstores[1]->alt_tag) ? $allstores[1]->name : $allstores[1]->alt_tag}} @endif" layout="responsive" width="185px" height="230.516px"  style="border-radius: 20px;"></amp-img>
                     </div>
                  </a>
               </div>

               <div class="col-6">
                  <a href="{{route('brand', [$region, $allstores[2]->slug])}}" aria-label="All Store - {{$allstores[2]->name}}">
                     <div class="single-deal">
                        <div class="overlay"></div>
                        <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[2]->ar_logo : $allstores[2]->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($allstores[2]->alt_tag_ar) ? $allstores[2]->name_ar : $allstores[2]->alt_tag_ar}} @else {{empty($allstores[2]->alt_tag) ? $allstores[2]->name : $allstores[2]->alt_tag}} @endif" layout="responsive" width="185px" height="230.516px"  style="border-radius: 20px;"></amp-img>
                     </div>
                  </a>
               </div>
               
               <div class="col-12 mb-3">
                  <a href="{{route('brand', [$region, $allstores[0]->slug])}}" aria-label="All Store - {{$allstores[0]->name}}">
                     <div class="single-deal v-tile">
                        <div class="overlay"></div>
                        <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[0]->ar_logo : $allstores[0]->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($allstores[0]->alt_tag_ar) ? $allstores[0]->name_ar : $allstores[0]->alt_tag_ar}} @else {{empty($allstores[0]->alt_tag) ? $allstores[0]->name : $allstores[0]->alt_tag}} @endif" layout="responsive" width="390px" height="240px"  style="border-radius: 20px;"></amp-img>
                     </div>
                  </a>
               </div>

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
         </div>
      </div>
   </section>
   <!--Ads Section 2 End Here-->

   <div class="divider"></div>

</main>
@endsection
@section('addScript')

@endsection