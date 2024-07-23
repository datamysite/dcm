@extends('web.includes.master')
@section('amphtml')
<link rel="amphtml" href="{{$actual_link_m}}" />
@endsection
@section('addImagesrc')
<link rel="image_src" href="{{URL::to('/public/storage/blogs/'.$data['blog']->banner)}}" />
@endsection
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
                        <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item"><a href="{{route('Blogs')}}" style="color: #000;"><strong>Blogs</strong></a></li>
                        @if($data['blog']->category_id != 0)
                        <li class="breadcrumb-item"><a href="{{route('blog.categories',[ base64_encode($data['blog']->category->id) ])}}" style="color: #000;"><strong>{{$data['blog']->category->name }}</strong></a></li>
                        @endif
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{$data['blog']->heading}}</strong></a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

@if($data['blog']->author_id == 0)
<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container">
        <div class="hero-slider">
            <div class="feather-image-blog">
                <img src="{{config('app.storage').'/blogs/'.$data['blog']->banner}}" alt="{{empty($data['blog']->banner_alt) ? $data['blog']->slug : $data['blog']->banner_alt}}">
            </div>
        </div>
    </div>
</section>
@endif
<!-- Slider Section End-->
@if($data['blog']->author_id != 0)
<!-- Blog author details section start -->
<section class="my-lg-5 my-8 mt-5">
    <div Class="DesktopAuthorSection">
        <div class="container" style="background-color: #1F428A;border-radius: 10px; background-image: linear-gradient(90deg, #051129, #2791CC);width:100%;height:100%;">
            <div class="row">
                <div class="col-lg-12 tex-center mt-5">
                    <div class="row">

                        <!-- <div class="col-lg-3" style="text-align: end;">
                            <img src="{{URL::to('/public/storage/authors/'.$data['author']->image)}}" style="background-color:whitesmoke;height:160px;width:160px;border-radius:10px;object-fit:cover;">
                        </div> -->

                        <div class="col-lg-9">
                            <h2 class="mt-5" style="color: #fff;">{{$data['blog']->heading}}</h2>
                            <h5 class="mt-5" style="color: #fff;">Author: <a href="{{route('blog.author',[ base64_encode($data['author']->id) ])}}" style="color: #fff;">{{ $data['author']->name }}</a></h5>
                            <p class="mt-5" style="color: #fff;"><b>Created at: </b>{{date('d-M-Y', strtotime($data['blog']->created_at))}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="MobileUserProfile mt-5" style="border-radius:0px;height:145px;background-color: #1F428A;background-image: linear-gradient(90deg, #051129, #2791CC);">
        <div class="row" style="color: #fff;left: 20px;">
            <h5 class="mt-5" style="color: #fff;">{{$data['blog']->heading}}</h5>
            <h6 class="mt-1" style="color: #fff;">Author: <a href="{{route('blog.author',[ base64_encode($data['author']->id) ])}}" style="color:#fff;position:relative;bottom:0px;left:0px;background-color:transparent;">{{ $data['author']->name }}</a></h6>
            <p class="mt-1" style="color: #fff;"><b>Created at: </b>{{date('d-M-Y', strtotime($data['blog']->created_at))}}</p>
        </div>
    </div>
</section>
<!-- Blog author details section end -->
@endif
<!-- Single Blog section Start Here -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">

        <div class="row">
            
            <div class="col-lg-8">
                {!! $data['blog']->description !!}
            </div>

            <div class="col-lg-1">
                <div class="vertical-line" style="margin: 0px;left:40px;background-color:#d8cfcf;height:100%"></div>
            </div>

            @if(!empty($data['blogs_category']) )
            <div class="col-lg-3">

                <div class="row">

                    <div class="row" style="border-radius:5px;background-color: #1F428A;background-image: linear-gradient(90deg, #051129, #2791CC);margin-left:0px;">
                        <div class="text-left">
                            <h5 class="mt-2" style="color: #fff;">Categories</h5>
                        </div>
                    </div>

                    <div class="nav nav-category" id="categoryCollapseMenu">
                        <ul style="padding-left:20px">
                            @foreach($data['category'] as $val)
                            <li class="nav-item border-bottom">

                                <a href="{{route('blog.categories',[ base64_encode($val->id) ])}}" class="nav-link collapsed active">
                                    <span>{{$val->name}}</span>
                                </a>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row mt-1">

                    <div class="row" style="border-radius:5px;background-color: #1F428A;background-image: linear-gradient(90deg, #051129, #2791CC);margin-left:0px;">
                        <div class="text-left">
                            <h5 class="mt-2" style="color: #fff;">Related Blogs</h5>
                        </div>
                    </div>


                    @foreach($data['blogs_category'] as $val)
                    <div class="row mt-5">
                        <div class="col-lg-4" style="text-align: center;">
                            @if($val->author->image !='')
                            <a href="{{route('blog.author',[ base64_encode($val->author->id) ])}}">
                                <img src="{{URL::to('/public/storage/authors/'.$val->author->image)}}" alt="Circle Image" class="circle-image" style="margin-top:10px;width:50px;height:50px;background-color:antiquewhite;">
                            </a>
                            @else
                            <img src="{{URL::to('/public/storage/authors/4170724111224.png')}}" alt="Circle Image" class="circle-image" style="margin-top:10px;width:50px;height:50px;background-color:antiquewhite;">
                            @endif

                        </div>
                        <div class="col-lg-8">
                            <h6>{{ $val->heading }}</h6>
                            <p style="color: #000;">
                                {!! Str::limit($val->short_description, 80, '...') !!}<b><a href="{{route('blog.details', [$val->slug])}}">Read More</a></b>
                            </p>
                            <p><b style="color:#000;">{{date('d-M-Y', strtotime($val->created_at))}}</b></p>
                        </div>
                        <hr style="border-top: 2px solid #d8cfcf;">
                    </div>
                    @endforeach

                </div>

                <div class="row">

                    <div class="row" style="border-radius:5px;background-color: #1F428A;background-image: linear-gradient(90deg, #051129, #2791CC);margin-left:0px;">
                        <div class="text-left">
                            <h5 class="mt-2" style="color: #fff;">Follow Us</h5>
                        </div>
                    </div>
                </div>


                <div class="row mt-0">
                    <div class="col-lg-12">

                        <ul class="list-inline text-md-center social-media">
                            <ul class="list-inline social-media">

                                <li class="list-inline-item first">
                                    <a href="https://www.facebook.com/profile.php?id=100091291623092" target="_blank" class="btn btn-xs" aria-label="Facebook">
                                        <i class="fa fa-facebook-square" style="font-size: 33px;"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">|</li>
                                <li class="list-inline-item">
                                    <a href="https://ae.linkedin.com/company/dealsandcouponsmena-com?trk=public_post_feed-actor-name" target="_blank" class="btn btn-xs" aria-label="Linkedin">
                                        <i class="fa fa-linkedin-square" style="font-size: 33px;"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">|</li>
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/dealsandcouponsmena/" target="_blank" class="btn btn-xs" aria-label="Instagram">
                                        <i class="fa fa-instagram" style="font-size: 33px;"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">|</li>
                                <li class="list-inline-item">
                                    <a href="https://www.tiktok.com/@dcm_uae?_t=8ld3djl4gC8&amp;_r=1" class="btn btn-xs" aria-label="TikTok">
                                        <i class="fa fa-tiktok" style="font-size: 33px;"></i>
                                    </a>
                                </li>

                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
            @endif

        </div>

        @if(count($data['faq']) != 0 )
        <hr style="border-top: 1px solid #d8cfcf;">

        <div class="row mb-5 mt-5">
            <div class="col-lg-12 col-12 mb-5">
                <h2 class="mb-5"> {{ __('translation.faq_page_text_02') }} </h2>
                @foreach ($data['faq'] as $faq)
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
        @endif


    </div>
</section>
<!-- Single Blog section End Here -->


@include('web.includes.schema.speakable')
@include('web.includes.schema.organization')
@include('web.includes.schema.breadcrumbs')
@include('web.includes.schema.localBusiness')

<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{$actual_link}}"
        },
        "headline": "{{$data['blog']->heading}}",
        "description": "{{$data['blog']->short_description}}",
        "image": "{{config('app.storage').'/blogs/'.$data['blog']->banner}}",
        "author": {
            "@type": "Organization",
            "name": "Deals and Coupons Mena"
        },
        "publisher": {
            "@type": "Organization",
            "name": "{{ @$data['author']->name }}",
            "logo": {
                "@type": "ImageObject",
                "url": "{{URL::to('/')}}/public/web_assets/images/logo/logo-DCM.png"
            }
        },
        "datePublished": "{{date('Y-m-d', strtotime($data['blog']->created_at))}}",
        "dateModified": "{{date('Y-m-d', strtotime($data['blog']->updated_at))}}"
    }
</script>

@if(count($data['faq']) != 0 )
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            @foreach($data['faq'] as $faq) {
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
@endsection