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
        <div class="container" style="background-color: #1F428A;border-radius: 10px; background-image: linear-gradient(90deg, #051129, #2791CC);width:100%;height:200px;">
            <div class="row">
                <div class="col-lg-12 tex-center mt-5">
                    <div class="row">

                        <!-- <div class="col-lg-3" style="text-align: end;">
                            <img src="{{URL::to('/public/storage/authors/'.$data['author']->image)}}" style="background-color:whitesmoke;height:160px;width:160px;border-radius:10px;object-fit:cover;">
                        </div> -->
                       
                        <div class="col-lg-9">
                            <h4 class="mt-5"><a href="{{route('blog.author',[ base64_encode($data['author']->id) ])}}" style="color: #fff;">{{ $data['author']->name }}</a></h4>

                            <ul class="list-inline text-md-right social-media">

                                @if($data['author']->linkedin_url != '')
                                <li class="list-inline-item">
                                    <a href="{{ $data['author']->linkedin_url }}" target="_blank" class="btn btn-xs" aria-label="Linkedin" style="color: #fff;">
                                        <i class="fa fa-linkedin-square"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">|</li>
                                @endif
                                @if($data['author']->x_url != '')
                                <li class="list-inline-item first">
                                    <a href="{{ $data['author']->x_url }}" target="_blank" class="btn btn-xs" aria-label="Twitter" style="color: #fff;">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">|</li>
                                @endif
                                @if($data['author']->facebook_url != '')
                                <li class="list-inline-item">
                                    <a href="{{ $data['author']->facebook_url }}" target="_blank" class="btn btn-xs" aria-label="Facebook" style="color: #fff;">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                </li>
                                @endif
                            </ul>
                            <span class="mt-0" style="color: #fff;"><b>Created at: </b>{{date('d-M-Y', strtotime($data['blog']->created_at))}}</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="MobileUserProfile mt-5" style="height: 140px;">
        <img src="{{URL::to('/public/storage/authors/'.$data['author']->image)}}" alt="Circle Image" class="circle-image" style="top:30px;">
        <div class="row" style="color: #fff;padding-left:25px;">
            <h4 class="mt-5" style="color: #fff;">{{ $data['author']->name }}</h4>
            <p style="color: #fff;">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
          
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
            <div class="col-12">
                <div class="mb-8">
                    <!-- heading -->
                    <h1 style="text-align: left;">{{$data['blog']->heading}}</h1>
                </div>
            </div>
        </div>

        <br><br>

        {!! $data['blog']->description !!}

        @if(count($data['faq']) != 0 )
        <hr style="border-top: 1px solid #1caae2;">

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

    

   <!-- Schema Code  (start)-->

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
                      @foreach ($data['faq'] as $faq)
                          {
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