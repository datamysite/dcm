@extends('web.includes.master')
@section('amphtml')
   <link rel="amphtml" href="{{$actual_link_m}}" />
@endsection
@section('addImagesrc')
<link rel="image_src" href="{{URL::to('/public/storage/blogs/'.$blog->banner)}}" />
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{$blog->heading}}</strong></a></li>
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
                <img src="{{URL::to('/public/storage/blogs/'.$blog->banner)}}" alt="{{empty($blog->banner_alt) ? $blog->slug : $blog->banner_alt}}">
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
                        <h1 style="text-align: left;">{{$blog->heading}}</h1>
                    </div>
                </div>
            </div>
            
            <br><br>

            {!! $blog->description !!}

        </div>
    </section>
    <!-- Single Blog section End Here -->


@endsection