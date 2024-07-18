@extends('web.includes.master')
@section('amphtml')
<link rel="amphtml" href="{{$actual_link_m}}" />
@endsection
@section('addImagesrc')

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

<!-- Blog author details section start -->
<section class="my-lg-5 my-8 mt-5">
    <div Class="DesktopAuthorSection">
        <div class="container" style="background-color: #1F428A;border-radius: 10px; background-image: linear-gradient(90deg, #051129, #2791CC);width:100%;height:200px;">
            <div class="row">
                <div class="col-lg-12 tex-center mt-5">
                    <div class="row">

                        <div class="col-lg-3" style="text-align: end;">
                            <img src="{{URL::to('/public/storage/authors/'.$data['author']->image)}}" style="background-color:whitesmoke;height:160px;width:160px;border-radius:10px;object-fit:cover;">
                        </div>

                        <div class="col-lg-9">
                            <h4 class="mt-10"><a href="{{route('blog.author',[ base64_encode($data['author']->id) ])}}" style="color: #fff;">{{ $data['author']->name }}</a></h4>

                            <ul class="list-inline text-md-right social-media mt-5">

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

<!-- About author section start -->
<div class="container np-container">
    <div class="row text-center">
        <h4  style="text-align: left;">About Author: </h4>
        <div style="text-align: left;">
        {!! $data['author']->about !!}
        </div>
    </div>
</div>
<!-- About author section end -->


<!-- Blogs section Start Here -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container np-container">

        <div class="row" style="align-items: center;justify-content: center;">
            @foreach($data['blog'] as $val)
            <div class="col-lg-4 blogItem mt-5">
                <div class="post-feather">
                    <img src="{{URL::to('/public/storage/blogs/'.$val->banner)}}" alt="{{empty($val->banner_alt) ? $val->slug : $val->banner_alt}}">
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


@endsection