@extends('web.includes.master')
@section('amphtml')
<link rel="amphtml" href="{{$actual_link_m}}" />
@endsection
@section('addImagesrc')
<link rel="image_src" href="{{ config('app.storage').'blogs/'.$data['blog']->banner }}" />
@endsection
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<div class="mt-110">
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                        <li class="breadcrumb-item"><a href="{{route('Blogs')}}" style="color: #000;"><strong>{{ __('translation.Blogs') }}</strong></a></li>
                        @if($data['blog']->category_id != 0)

                        @php
                        $string = strtolower(trim($data['blog']->category->name));
                        $string = str_replace('&', 'and', $string);
                        $string = str_replace(' ', '-', $string);
                        $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                        @endphp

                        <li class="breadcrumb-item"><a href="{{route('blog.categories',[ ($slug) ])}}" style="color: #000;"><strong>{{$data['blog']->category->name }}</strong></a></li>
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
                <img src="{{config('app.storage').'blogs/'.$data['blog']->banner}}" alt="{{empty($data['blog']->banner_alt) ? $data['blog']->slug : $data['blog']->banner_alt}}">
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
                        <div class="col-lg-9">
                            <h1 class="mt-5" style="color: #fff;">{{$data['blog']->heading}}</h1>
                            <p class="mt-5" style="color: #fff;">Author: <a href="{{route('blog.author',$data['author']->slug )}}" style="color: #fff;">{{ $data['author']->name }}</a>
                                | <b>{{$data['blog']->read_time}} </b> Minute Read
                            </p>
                            <p class="mt-5" style="color: #fff;"><b>Created at: </b>{{date('d-M-Y', strtotime($data['blog']->created_at))}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="MwebAuthorSection mt-5" style="border-radius:0px;height:100%;background-color: #1F428A;background-image: linear-gradient(90deg, #051129, #2791CC);">
        <div class="row" style="color: #fff;left: 20px;padding-left:10px;">
            <b style="font-size:1.75rem;" class="mt-5" style="color: #fff;">{{$data['blog']->heading}}</b>
            <p class="mt-3" style="color: #fff;">
                <b>Author: </b> <a href="{{route('blog.author', $data['author']->slug )}}" style="color:#fff;">{{ $data['author']->name }}</a>
                | <b>{{$data['blog']->read_time}} </b> Minute Read
            </p>
            <p class="mt-0" style="color: #fff;"><b>Created at: </b>{{date('d-M-Y', strtotime($data['blog']->created_at))}}</p>
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
                            <h5 class="mt-2" style="color: #fff;">{{ __('translation.TOP_STORES') }}</h5>
                        </div>
                    </div>

                    <div class="nav nav-category" id="categoryCollapseMenu">
                        <ul style="padding-left:20px">
                            @foreach($data['top_stores'] as $val)
                            <li class="nav-item border-bottom">

                                <a href="{{URL::to('/'.app()->getLocale().'/'.$val->slug)}}" class="nav-link collapsed active">
                                    <span>{{app()->getlocale() == 'ar' ? $val->name_ar : $val->name}}</span>
                                </a>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                <div class="row mt-1">

                    <div class="row" style="border-radius:5px;background-color: #1F428A;background-image: linear-gradient(90deg, #051129, #2791CC);margin-left:0px;">
                        <div class="text-left">
                            <h5 class="mt-2" style="color: #fff;">{{ __('translation.related_blogs_txt') }}</h5>
                        </div>
                    </div>

                    @foreach($data['blogs_category'] as $val)
                    <div class="DesktopRelatedBlogs">

                        <div class="row mt-5">
                            <div class="col-lg-4" style="text-align: center;">
                                @if($val->author->image !='')
                                <a href="{{route('blog.author',$val->author->slug ) }}">
                                    <img src="{{ config('app.storage').'authors/'.$val->author->image }}" alt="Circle Image" class="circle-image" style="margin-top:10px;width:50px;height:50px;background-color:antiquewhite;">
                                    <p class="mt-2" style="color:#000;font-size: 11px;font-weight: bolder;">{{$val->author->name}}</p>
                                </a>
                                @else
                                <img src="{{ config('app.storage').'authors/4170724111224.png' }}" alt="Circle Image" class="circle-image" style="margin-top:10px;width:50px;height:50px;background-color:antiquewhite;">
                                @endif
                            </div>
                            <div class="col-lg-8">
                                <h6>{{ $val->heading }}</h6>
                                <p style="color: #000;">
                                    {!! Str::limit($val->short_description, 80, '...') !!}<b><a href="{{route('blog.details', [$val->slug])}}">{{ __('translation.read_more') }}</a></b>
                                </p>
                                <p><b style="color:#000;">{{date('d-M-Y', strtotime($val->created_at))}}</b></p>
                            </div>
                            <hr style="border-top: 2px solid #d8cfcf;">
                        </div>
                    </div>
                    @endforeach

                    <div class="MwebRelatedBlogs mt-5">
                        <div class="review-slider-second" id="slider-reviews">
                            @foreach ($data['blogs_category'] as $val)
                            <div class="item">
                                <div class="mb-8">
                                    <div class="card bg-light border-0" style="border-radius: 10px;height: 200px !important;">
                                        <div class="d-flex align-items-center">
                                            <div style="padding-left:10px;">
                                                <img src="{{ config('app.storage').'authors/'.$val->author->image }}" alt="Circle Image" class="circle-image" style="margin-top:10px;width:50px;height:50px;background-color:antiquewhite;">
                                            </div>
                                            <div class="ms-3 lh-1">
                                                <h6 class="mb-0">{{$val->author->name}}</h6>
                                                <small>Author</small>
                                            </div>
                                        </div>
                                        <div class="card-body p-0" style="padding: 15px !important;">
                                            <p style="color: #000;">
                                                {!! Str::limit($val->short_description, 150, '...') !!}<b><a href="{{route('blog.details', [$val->slug])}}">{{ __('translation.read_more') }}</a></b>
                                            </p>
                                            <p><b style="color:#000;">{{date('d-M-Y', strtotime($val->created_at))}}</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="row" style="border-radius:5px;background-color: #1F428A;background-image: linear-gradient(90deg, #051129, #2791CC);margin-left:0px;">
                        <div class="text-left">
                            <h5 class="mt-2" style="color: #fff;">{{ __('translation.blog_categories_txt') }}</h5>
                        </div>
                    </div>

                    <div class="nav nav-category" id="categoryCollapseMenu">
                        <ul style="padding-left:20px">
                            @foreach($data['category'] as $val)
                            @php
                            $string = strtolower(trim($val->name));
                            $string = str_replace('&', 'and', $string);
                            $string = str_replace(' ', '-', $string);
                            $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                            @endphp
                            <li class="nav-item border-bottom">

                                <a href="{{route('blog.categories', $slug )}}" class="nav-link collapsed active">
                                    <span>{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</span>
                                </a>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row">

                    <div class="row" style="border-radius:5px;background-color: #1F428A;background-image: linear-gradient(90deg, #051129, #2791CC);margin-left:0px;">
                        <div class="text-left">
                            <h5 class="mt-2" style="color: #fff;">{{ __('translation.share_blog_txt') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row mt-0">
                    <div class="col-lg-12">

                        <ul class="list-inline text-md-center social-media">
                            <ul class="list-inline social-media">

                                <li class="list-inline-item">
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ URL::current() }}" target="_blank" class="btn btn-xs" aria-label="Linkedin">
                                        <i class="fa fa-linkedin-square" style="font-size: 30px;"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">|</li>

                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}&amp;src=sdkpreparse" target="_blank" class="btn btn-xs" data-href="https://developers.facebook.com/docs/plugins/" data-layout="" data-size="">
                                        <i class="fa fa-facebook-square" style="font-size: 30px;"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">|</li>

                                <li class="list-inline-item">
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(URL::current()) }}&text={{ urlencode($data['blog']->heading) }}" target="_blank" class="btn btn-xs" aria-label="twitter">
                                        <i class="fa fa-twitter" style="font-size: 30px;"></i>
                                    </a>
                                </li>

                            </ul>
                        </ul>
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
<!-- Releated blogs slider js -->
<script>
    $(document).ready(function() {
        $('#slider-reviews').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    });
</script>

<!-- Facebook Share Lib -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v20.0" nonce="kqdFOKnl"></script>

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
            @foreach($data['faq'] as $key => $faq) {
                {
                    $key > 0 ? ',' : ''
                }
            } {
                "@type": "Question",
                "name": "{{ $faq->heading }}",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{{ $faq->content }}"
                }
            }
            @endforeach
        ]
    }
</script>
@endif

<!-- Schema Code (end) -->
@endsection