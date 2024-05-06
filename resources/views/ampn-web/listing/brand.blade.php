@extends('ampn-web.includes.master')
@section('custom-script')
<?php
   $script_links = [
      URL::to('/public/web_assets/js/amp/main.js'),
      URL::to('/public/web_assets/js/amp/brand.js'),
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
   $style_link = app()->getLocale() == 'ar' ? '/web_assets/css/amp/n_brand_style-ar.css' : '/web_assets/css/amp/n_brand_style.css'; 

   $content = \App\Helpers\AmpHelper::minify(URL::to('/public'.$style_link));
   echo $content;

?>
@endsection
@section('addImagesrc')
<link rel="image_src" href="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$retailer->ar_logo : $retailer->logo}}" />
@endsection
@section('content')


<div class="mt-85">
    <div class="container np-container">

        <!-- breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                @if(!empty($category_slug))
                    <li class="breadcrumb-item"><a href="{{route('category', [$region, $category_slug])}}" style="color: #000;"><strong>{{app()->getLocale() == 'ar' ? $category->name_ar : $category->name}}</strong></a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page"><strong>{{app()->getLocale() == 'ar' ? $retailer->name_ar : $retailer->name}}</strong></li>
            </ol>
        </nav>
    </div>
</div>


<!-- Store Prodcut Section Start-->
<section class="mt-2">
    <div class="container np-container">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{route('brand', [$region, $retailer->slug])}}"><h3 class=" page-title">{{app()->getLocale() == 'ar' ? $retailer->name_ar : $retailer->name}}</h3></a>
            </div>
            <div class="col-12">
                <amp-img src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$retailer->ar_logo : $retailer->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($retailer->alt_tag_ar) ? $retailer->name_ar : $retailer->alt_tag_ar}} @else {{empty($retailer->alt_tag) ? $retailer->name : $retailer->alt_tag}} @endif" height="125px" width="100px" layout="fixed" class="img" style="border-radius: 10px;"></amp-img>
            </div>
        </div>

        @php $bg = 2; @endphp
        @foreach($offers as $val)
            @php if($bg == count($stripColors)){ $bg = 2;} @endphp
                    <div class="main_div_container" style="background-color: {{$stripColors[$bg]}};">
                            <span style="color:#fff;">{{app()->getLocale() == 'ar' ? $val->title_ar : $val->title}}</span>

                            <span class="col text-center">
                                <button type="button" class="btn btn-white shadow-green showOffer" data-loader="{{URL::to('/public/web-loader.gif')}}" data-id="{{base64_encode($val->id)}}" style="font-weight:bold; color:#1dace3;">
                                    <amp-img src="{{URL::to('/public/web_assets/images/icons/coupon.png')}}" layout="fixed" width="20px" height="20px" style="margin-top: 3px; margin-bottom: -3px;"></amp-img>
                                </button>
                            </span>
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
            @php $bg++; @endphp
        @endforeach

        @php $bg = 0; @endphp
        @foreach($coupons as $val)
            @php if($bg == count($stripColors)){ $bg = 0;} @endphp
                    <div class="main_div_container" style="background-color: {{$stripColors[$bg]}};">
                            <span style="color:#fff;">{{app()->getLocale() == 'ar' ? $val->heading_ar : $val->heading}}</span>

                            <span class="col text-center">
                                <button type="button" class="btn btn-white shadow-green showCoupon" data-loader="{{URL::to('/public/web-loader.gif')}}" data-id="{{base64_encode($val->id)}}" style="font-weight:bold; color:#1dace3;">
                                    <amp-img src="{{URL::to('/public/web_assets/images/icons/coupon.png')}}" layout="fixed" width="20px" height="20px" style="margin-top: 3px; margin-bottom: -3px;"></amp-img>
                                </button>
                            </span>
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
            @php $bg++; @endphp
        @endforeach




        <div class="container np-container"> 
            <div class="row mt-10">
                <div class="col-12 mb- text-center">
                    <h3 class="mb-5">{{ __('translation.Feedback') }}</h3>
                </div>
            </div>

            <div class="mt-10 review-slider-second" id="slider-reviews">

                <amp-carousel width="450" height="300" layout="responsive" type="slides" role="region" aria-label="Hero carousel" controls="false" autoplay loop delay="4000">
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
                </amp-carousel>
            </div>
        </div>



        <div class=" mb-14 ">
            <div class="row mt-10 text-center">
                <div class="col-12 text-center blogToggle" id="blogTogglebtn">
                    <h3 class="mb-5 page-title">About {{$retailer->name}}</h3>
                    <span class="arr"><img src="{{URL::to('/public/arrow-down.png')}}"/></span>
                </div>
                @php 
                    $brand_domain = explode('/', $retailer->store_link);
                    $brand_domain = $brand_domain[2];
                @endphp
                <a class="brand_store_link" href="{{$retailer->store_link}}">{{$brand_domain}}</a>
            </div>
            <div class="retailer-blog-content" id="retailerBlogs">
                @foreach($retailer->blogs as $val)
                    @php $blogDes = str_replace("!important;", ";", $val->description); $blogDes = str_replace('width="602"', 'width="300px"', $blogDes); @endphp 
                    {!! $blogDes !!}
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
            <img src="{{URL::to('/public/ticket.png')}}" width="300px" height="471.6px"></img>
            <button type="button" class="grap_deal_close_btn" id="close_token_modal">x</button>
           <div class="grap_deal_main">
           </div>
        </div>

     </div>
  </div>
</div>
@endsection
