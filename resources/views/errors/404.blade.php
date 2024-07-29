@extends('web.includes.master')
@section('amphtml')
<link rel="amphtml" href="{{$actual_link_m}}" />
@endsection

@section('content')

<div class="mt-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
</div>

<!-- 404 Main Section Start Here -->
<section class="my-lg-5 my-8">
    <div class="mt-5 container ad-container np-container">
        <div class="row text-center" style="justify-content: center;">
            <div class="col-12 text-center">
                <img src="{{URL::to('/public/web_assets/images/404.png')}}" alt="Cashback Banner" style="border-radius:20px;height:auto;width:50%;padding:70px 0px;">
            </div>
        </div>
    </div>
</section>
<!-- 404 Main Section End Here -->

<!-- Category Section Start-->
<section class="my-lg-12 my-8" style="margin: 0rem !important;">
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

@endsection

@section('addScript')
<script type="text/javascript" src="{{URL::to('/public/web_assets/js/home.js')}}"></script>


@endsection