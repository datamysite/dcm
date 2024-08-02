@extends('web.includes.master')
@section('amphtml')
<link rel="amphtml" href="{{$actual_link_m}}" />
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
                        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)" style="color:#000;"><strong>Authors</a></strong></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{$data['author']->name }}</a></strong></li>
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
                            <img src="{{ config('app.storage').'authors/'.$data['author']->image }}" style="background-color:whitesmoke;height:160px;width:160px;border-radius:10px;object-fit:cover;">
                        </div>

                        <div class="col-lg-9">
                            <p class="mt-10" style="padding-left:10px;font-size:1.75rem;color:#fff;">{{ $data['author']->name }}</p>

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

    <div class="MobileAuthorSection mt-0" style="border-radius:0px;height:100%;background-color: #1F428A;background-image: linear-gradient(90deg, #051129, #2791CC);">

        <div class="row col-lg-8 mt-0" style="justify-content:center">
            <img src="{{ config('app.storage').'authors/'.$data['author']->image }}" style="margin-top:10px;background-color:whitesmoke;height:150px;width:150px;border-radius:10px;object-fit:cover;">
        </div>
        <div class="row align-items-center" style="justify-items:center;justify-content:center;">
            <p class="mt-5 text-center" style="font-size:1.75rem;color:#fff;">{{ $data['author']->name }}</p>
            <div class="social-icons" style="display: flex;align-items: center;justify-content:space-evenly">
                <li class="list-inline-item">
                    <a href="{{ $data['author']->linkedin_url }}" target="_blank" class="btn btn-xs" aria-label="Linkedin" style="color: #fff;">
                        <i class="fa fa-linkedin-square" style="font-size: 24px;"></i>
                    </a>
                </li>
                <li class="list-inline-item">|</li>

                <li class="list-inline-item first">
                    <a href="{{ $data['author']->x_url }}" target="_blank" class="btn btn-xs" aria-label="Twitter" style="color: #fff;">
                        <i class="fa fa-twitter" style="font-size: 24px;"></i>
                    </a>
                </li>
                <li class="list-inline-item">|</li>

                <li class="list-inline-item">
                    <a href="{{ $data['author']->facebook_url }}" target="_blank" class="btn btn-xs" aria-label="Facebook" style="color: #fff;">
                        <i class="fa fa-facebook-square" style="font-size: 24px;"></i>
                    </a>
                </li>
            </div>
        </div>
    </div>
</section>
<!-- Blog author details section end -->

@if(!empty($data['author']->about))
<!-- About author section start -->
<div class="container np-container">
    <div class="row text-center">
        <b style="text-align: left;color:#000;font-size:22px;">About Author: </b>
        <div style="text-align: left;color:#000;">
            {!! $data['author']->about !!}
        </div>
    </div>
</div>
<!-- About author section end -->
@endif

@if(count($data['blog']) != 0 )
<!-- Author Blogs section Start Here -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container np-container">
        <div class="row" style="align-items: center;justify-content: center;">
            <hr style="border-top: 1px solid #1caae2;" class="mt-5">
            @foreach($data['blog'] as $val)
            <div class="col-lg-4 blogItem mt-5">
                <a href="{{route('blog.details', [$val->slug])}}" target="blank" style="color:#000;">
                    <div class="post-feather">
                        <img src="{{ config('app.storage').'blogs/'.$val->banner }}" alt="{{empty($val->banner_alt) ? $val->slug : $val->banner_alt}}">
                        <a href="{{route('blog.details', [$val->slug])}}" target="blank" class="readMorebutton">Read More</a>
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
                {{ $data['blog']->links() }}
            </div>
        </div>
    </div>
</section>
<!-- Author Blogs section End Here -->
@endif

@endsection