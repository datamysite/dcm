@extends('web.includes.master')
@section('amphtml')
   <link rel="amphtml" href="{{$actual_link_m}}" />
@endsection
@section('addImagesrc')
<link rel="image_src" href="{{URL::to('/public/storage/blogs/'.$featured->banner)}}" />
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
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="Blogs" style="color:#1DACE3;"><strong>Blogs</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container np-container">
        <div class="hero-slider">

            <div class="feather-image-blog">
                <img src="{{URL::to('/public/storage/blogs/'.$featured->banner)}}" alt="{{empty($featured->banner_alt) ? $featured->slug : $featured->banner_alt}}">
                <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                    <div class="slider_div2">
                        <h3>Featured</h3>
                        <h6>{{$featured->heading}}</h6>
                        <p>{{ $featured->short_description }}</p>
                        <a href="{{route('blog.details', [$region, $featured->slug])}}" target="_blank">Read More</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider Section End-->


<!-- Blogs section Start Here -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container np-container">

        <div class="row" style="align-items: center;justify-content: center;">
            @foreach($blogs as $val)
                <div class="col-lg-4 blogItem mt-5">
                    <div class="post-feather">
                        <img src="{{URL::to('/public/storage/blogs/'.$val->banner)}}" alt="{{empty($val->banner_alt) ? $val->slug : $val->banner_alt}}">
                        <a href="{{route('blog.details', [$region, $val->slug])}}" target="blank" class="readMorebutton">Read More</a>
                    </div>
                    <h5 title="{{$val->heading}}">{{$val->heading}}</h5>
                    <p title="{{ $val->short_description }}">{{ $val->short_description }}</p>
                </div>
            @endforeach

        </div>

        <div class="row mt-8 text-center">
            <div class="col">
                <!-- nav -->
                {{ $blogs->links() }}
            </div>
        </div>

    </div>
</section>
<!-- Blogs section End Here -->

    
    
   <!-- Schema Code  (start)-->

      @include('web.includes.schema.speakable')
      @include('web.includes.schema.organization')
      @include('web.includes.schema.breadcrumbs')

   <!-- Schema Code (end) -->
@endsection