@extends('web.includes.master')
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
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                        @if(!empty($category_slug))
                            <li class="breadcrumb-item"><a href="{{route('category', [$region, $category_slug])}}" style="color: #000;"><strong>{{app()->getLocale() == 'ar' ? $category->name_ar : $category->name}}</strong></a></li>
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
            <div class="col-12 text-center">
                <a href="{{route('brand', [$region, $retailer->slug])}}"><h3 class=" page-title">{{app()->getLocale() == 'ar' ? $retailer->name_ar : $retailer->name}}</h3></a>
            </div>
        </div>

        @php $bg = 2; @endphp
        @foreach($offers as $val)
            @php if($bg == count($stripColors)){ $bg = 2;} @endphp
            <div class="row d-flex  m-mt-16 mt-16" style="align-items: center;">
                <div class="col-12">
                    <div class="main_div_container" style="background-color: {{$stripColors[$bg]}};">

                        <div class="Lside_div">
                            <img src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$retailer->ar_logo : $retailer->logo}}" alt="Product Image" class="img" style="height:80%">
                        </div>

                        <div class="row col-8 col-xs-8 mt-0 p-5" style="align-items: left;">
                            <span style="color:#fff;">{{app()->getLocale() == 'ar' ? $val->title_ar : $val->title}}</span>

                            <span style="color:#fff;"></span>

                            <span class="col text-center">
                                <a href="javascript:void(0)" class="btn btn-white shadow-green showOffer" data-id="{{base64_encode($val->id)}}" style="font-weight:bold; color:#1dace3;">{{ __('translation.show_coupon') }}</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @php $bg++; @endphp
        @endforeach

        @php $bg = 0; @endphp
        @foreach($coupons as $val)
            @php if($bg == count($stripColors)){ $bg = 0;} @endphp
            <div class="row d-flex  m-mt-16 mt-16" style="align-items: center;">
                <div class="col-12">
                    <div class="main_div_container" style="background-color: {{$stripColors[$bg]}};">

                        <div class="Lside_div">
                            <img src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$retailer->ar_logo : $retailer->logo}}" alt="Product Image" class="img" style="height:80%">
                        </div>

                        <div class="row col-8 col-xs-8 mt-0 p-5" style="align-items: left;">
                            <span style="color:#fff;">{{app()->getLocale() == 'ar' ? $val->heading_ar : $val->heading}}</span>

                            <span style="color:#fff;"></span>

                            <span class="col text-center">
                                <a href="javascript:void(0)" class="btn btn-white shadow-green showCoupon" data-id="{{base64_encode($val->id)}}" style="font-weight:bold; color:#1dace3;">{{ __('translation.show_coupon') }}</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @php $bg++; @endphp
        @endforeach




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



        <div class=" mb-14 ">
            <div class="row mt-10">
                <div class="col-12 text-center blogToggle">
                    <h3 class="mb-5 page-title">About {{$retailer->name}}</h3>
                    <span class="arr"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="retailer-blog-content" id="retailerBlogs">
                @foreach($retailer->blogs as $val)
                    {!! $val->description !!}
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
    <script type="text/javascript" src="{{URL::to('/public/web_assets/js/review_slider.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            'use strict'
            let ar = 0;
            $(document).on('click', '.showCoupon', function(){
                var id = $(this).data('id');
                $('#ShowCouponModal .grap_deal_main').html("<img src='{{URL::to("/public/web-loader.gif")}}'>");
                $('#ShowCouponModal').modal('show');
                $.get("{{URL::to('/'.app()->getlocale().'/'.$region.'/coupon')}}/"+id, function(data){
                    $('#ShowCouponModal .grap_deal_main').html(data);
                });
            });


            $(document).on('click', '.showOffer', function(){
                var id = $(this).data('id');
                $('#ShowCouponModal .grap_deal_main').html("<img src='{{URL::to("/public/web-loader.gif")}}'>");
                $('#ShowCouponModal').modal('show');
                $.get("{{URL::to('/'.app()->getlocale().'/'.$region.'/offers')}}/"+id, function(data){
                    $('#ShowCouponModal .grap_deal_main').html(data);
                });
            });

            $(document).on('click', '.blogToggle', function(){
                if(ar == 0){
                    $('.blogToggle .arr').html('<i class="fa fa-arrow-up" aria-hidden="true"></i>');
                    ar = 1;
                }else{
                    $('.blogToggle .arr').html('<i class="fa fa-arrow-down" aria-hidden="true"></i>');
                    ar = 0;
                }
                $('#retailerBlogs').toggle();
            });

            $(document).on('click', '.grap_deal_btn', function(){
                var link = $(this).data('href');
                var id = $(this).data('id');
                $('#ShowCouponModal').modal('hide');
                $('#loading').css({display: 'block'});
                $.get("{{URL::to('/'.app()->getlocale().'/'.$region.'/coupon/grabDeal')}}/"+id, function(data){
                    $('#loading').css({display: 'none'});
                    window.location.href = link;
                });
            });

            $(document).on('click', '.whatsapp_chat', function(){
                var link = $(this).data('href');
                var id = $(this).data('id');
                $('#ShowCouponModal').modal('hide');
                $('#loading').css({display: 'block'});
                $.get("{{URL::to('/'.app()->getlocale().'/'.$region.'/offers/whatsapp')}}/"+id, function(data){
                    $('#loading').css({display: 'none'});
                    window.location.href = link;
                });
            });

        });
    </script>
@endsection