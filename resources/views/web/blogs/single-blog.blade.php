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
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item"><a href="{{route('Blogs', [$region])}}" style="color: #000;"><strong>Blogs</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{$data['blog']->heading}}</strong></a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container">
        <div class="hero-slider">

            <div class="feather-image-blog">
                <img src="{{config('app.storage').'/blogs/'.$data['blog']->banner}}" alt="{{empty($data['blog']->banner_alt) ? $data['blog']->slug : $data['blog']->banner_alt}}">
                <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                    <div class="slider_div2" style="box-shadow: none; background-color: transparent;">

                        <br><br><br><br><br><br>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider Section End-->


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

        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "BlogPosting",
              "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "{{$actual_url}}"
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
                "name": "Author Name Here",
                "logo": {
                  "@type": "ImageObject",
                  "url": "{{URL::to('/')}}/public/web_assets/images/logo/logo-DCM.png"
                }
              },
              "datePublished": "{{date('Y-m-d', strtotime($data['blog']->created_at))}}",
              "dateModified": "{{date('Y-m-d', strtotime($data['blog']->updated_at))}}"
            }
        </script>

   <!-- Schema Code (end) -->
@endsection