@extends('web.includes.master')

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
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{$retailer->name}}</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<!-- Store Prodcut Section Start-->
<section class="mt-2">
    <div class="container np-container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class=" page-title">{{$retailer->name}}</h3>
            </div>
        </div>
        @php $bg = 0; @endphp
        @foreach($coupons as $val)
            @php if($bg == count($stripColors)){ $bg = 0;} @endphp
            <div class="row d-flex mt-16" style="align-items: center;">
                <div class="col-12">
                    <div class="main_div_container" style="background-color: {{$stripColors[$bg]}};">

                        <div class="Lside_div">
                            <img src="{{URL::to('/public/storage/retailers/'.$retailer->logo)}}" alt="Product Image" class="img" style="height:80%">
                        </div>

                        <div class="row col-6 mt-0 p-5" style="align-items: left;">
                            <span style="color:#fff;">{{$val->heading}}</span>

                            <span style="color:#fff;"></span>

                            <span class="col text-center">
                                <input type="submit" name="sing-up" class="btn btn-white shadow-green " style="font-weight:bold; color:#1dace3;" value="SHOW COUPON">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @php $bg++; @endphp
        @endforeach


        <div> 
            <div class="row mt-16">
                <div class="col-12 mb- text-center">
                    <h3 class="mb-5">Feedback</h3>
                </div>
            </div>

            <div class="row col-lg-12 mt-10">

                <div class="col-lg-4">
                    <div class="mb-8">

                        <div class="card bg-light border-0" style="border-radius: 10px;">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="{{URL::to('/public')}}/web_assets/images/avatar/avatar-10.jpg" alt="" class="avatar avatar-md rounded-circle" />
                                </div>
                                <div class="ms-3 lh-1">
                                    <h6 class="mb-0">Alishia Jones</h6>
                                    <small>Customer</small>
                                </div>
                            </div>
                            <div class="card-body p-5">
                                <h6>Lorem ipsum dolor</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit. Curabitur iaculis maximus purus, a gravida dui tempor eget.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-8">

                        <div class="card bg-light border-0" style="border-radius: 10px;">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="{{URL::to('/public')}}/web_assets/images/avatar/avatar-5.jpg" alt="" class="avatar avatar-md rounded-circle" />
                                </div>
                                <div class="ms-3 lh-1">
                                    <h6 class="mb-0">Alishia Jones</h6>
                                    <small>Customer</small>
                                </div>
                            </div>
                            <div class="card-body p-5">
                                <h6>Lorem ipsum dolor</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit. Curabitur iaculis maximus purus, a gravida dui tempor eget.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-8">

                        <div class="card bg-light border-0" style="border-radius: 10px;">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="{{URL::to('/public')}}/web_assets/images/avatar/avatar-4.jpg" alt="" class="avatar avatar-md rounded-circle" />
                                </div>
                                <div class="ms-3 lh-1">
                                    <h6 class="mb-0">Alishia Jones</h6>
                                    <small>Customer</small>
                                </div>
                            </div>
                            <div class="card-body p-5">
                                <h6>Lorem ipsum dolor</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit. Curabitur iaculis maximus purus, a gravida dui tempor eget.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div>
            <div class="row mt-10">
                <div class="col-12 mb- text-center">
                    <h3 class="mb-5 page-title">About {{$retailer->name}}</h3>
                </div>
            </div>
            <div class="retailer-blog-content">
                @foreach($retailer->blogs as $val)
                    {!! $val->description !!}
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Store Prodcut Section End-->

@endsection