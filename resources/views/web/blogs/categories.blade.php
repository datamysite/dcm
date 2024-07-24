@extends('web.includes.master')
@section('amphtml')
   <link rel="amphtml" href="{{$actual_link_m}}" />
@endsection
@section('addImagesrc')
<link rel="image_src" href="{{ config('app.storage').'blogs/'.$data['featured']->banner }}" />
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
                        <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('Blogs')}}" style="color:#000;"><strong>Blogs</a></strong></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{$data['category']->name }}</a></strong></li>
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
                <img src="{{ config('app.storage').'blogs/'.$data['featured']->banner }}" alt="{{empty($data['featured']->banner_alt) ? $data['featured']->slug : $data['featured']->banner_alt}}">
                <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                    <div class="slider_div2">
                        <h3>Featured</h3>
                        <h6>{{$data['featured']->heading}}</h6>
                        <p>{{ $data['featured']->short_description }}</p>
                        <a href="{{route('blog.details', [$data['featured']->slug])}}" target="_blank">Read More</a>

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
            @foreach($data['blog'] as $val)
                <div class="col-lg-4 blogItem mt-5">
                    <div class="post-feather">
                        <img src="{{ config('app.storage').'blogs/'.$val->banner }}" alt="{{empty($val->banner_alt) ? $val->slug : $val->banner_alt}}">
                        <a href="{{route('blog.details', [$val->slug])}}" target="blank" class="readMorebutton">Read More</a>
                    </div>
                    <h5 title="{{$val->heading}}">{{$val->heading}}</h5>
                    <p title="{{ $val->short_description }}">{{ $val->short_description }}</p>
                </div>
            @endforeach

        </div>

        <div class="row mt-8 text-center">
            <div class="col">
                <!-- nav -->
                {{ $data['blog']->links() }}
            </div>
        </div>

    </div>
</section>
<!-- Blogs section End Here -->

    
    
   <!-- Schema Code  (start)-->

      @include('web.includes.schema.speakable')
      @include('web.includes.schema.organization')
      @include('web.includes.schema.breadcrumbs')
      @include('web.includes.schema.localBusiness')

   <!-- Schema Code (end) -->
@endsection