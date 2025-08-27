@extends('web.includes.master')
@section('metaAddition')
@if(!empty($_GET['page']))
<meta name="robots" content="noindex, follow">
@endif
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
                        <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="Blogs" style="color:#1DACE3;"><strong>{{ __('translation.Blogs') }}</a></strong></li>
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
                <img src="{{ config('app.storage').'blogs/'.$featured->banner }}" alt="{{empty($featured->banner_alt) ? $featured->slug : $featured->banner_alt}}" style="object-fit:cover !important ;">
                <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                    <div class="slider_div2" style="background-color:#889397 !important ;">
                        <!-- <h3>Featured</h3> -->
                        <h6>{{$featured->heading}}</h6>
                        <p>{{ $featured->short_description }}</p>
                        <a href="{{route('blog.details', [$featured->slug])}}" target="_blank">{{ __('translation.read_more') }}</a>

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
                <a href="{{route('blog.details', [$val->slug])}}" target="blank" style="color:#000;">
                    <div class="post-feather">
                        <img src="{{ config('app.storage').'blogs/'.$val->banner }}" alt="{{empty($val->banner_alt) ? $val->slug : $val->banner_alt}}">
                        <span target="blank" class="readMorebutton">{{ __('translation.read_more') }}</span>
                    </div>
                    <h5 title="{{$val->heading}}">{{$val->heading}}</h5>
                    <p title="{{ $val->short_description }}">{{ $val->short_description }}</p>
                </a>
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
@include('web.includes.schema.localBusiness')

<!-- Schema Code (end) -->
@endsection