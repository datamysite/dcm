@extends('web.includes.master')

@section('content')

<div class="breadcrumbMENU mt-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.profile')}}" style="color: #000;"><strong>{{ __('translation.Profile') }}</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.settings_menu') }}</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- section start-->
<div class="mt-8 mb-lg-14 mb-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row gx-10">

            @include('web.includes.user-nav')

            <!-- col -->
            <div class="col-lg-8 m-1">

                <div class="row" style="background-color: #F2F2F2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A);">
                    <h4 class="mb-5 mt-5"> <b style="color: #fff;">Dashboard </b></h4>
                </div>

                <div class="row mt-5">

                   
                        <!-- col -->
                        <div class="col-lg-12 alert alert-warning" style="background-color: #009DDE;background-image: linear-gradient(90deg, #2791CC, #1F428A);">
                            <form id="verify_email_form" action="{{route('user.verify_email')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-9">
                                        <p style="color: #fff;">Please verify you email!</p>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="number" name="email_otp" class="form-control form-control-sm" placeholder="Email OTP" min="100000" max="999999" required>
                                    </div>
                                    <div class="col-lg-1">
                                        <button type="submit" class="btn btn-primary btn-sm pull-right">&nbsp;&nbsp;&nbsp;Verify&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                   

                    <div class="col-lg-12 col-12">

                        <div class="row text-center contact-us-pg">

                            <div class="col-md-4" style="border-radius: 20px;">
                                <div style="background-color: #F2F2F2; border: 1px solid;  border-color: white #009DDE;border-radius: 20px;" class="mt-5">
                                    <div class="about-us-title">
                                        <h5><b>Available Balance</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="position: relative; top: -5px;">AED</b> <b style="color: #009DDE;">0.00</b></span>
                                        <span style="padding-left:25px;">
                                            <img src="{{URL::to('/public')}}/web_assets/images/icons/available_balance.png" alt="Dashboard" style="width:45px; height:45px;">
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="divider" style="height: 5px;"></div>
                                </div>
                            </div>

                            <div class="col-md-4" style="border-radius: 20px">
                                <div style="background-color: #F2F2F2; border: 1px solid;  border-color: white #009DDE;border-radius: 20px;" class="mt-5">
                                    <div class="about-us-title">
                                        <h5><b>Pending Balance</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="position: relative; top: -5px;">AED</b> <b style="color: #009DDE;">0.00</b></span>
                                        <span style="padding-left:25px;">
                                            <img src="{{URL::to('/public')}}/web_assets/images/icons/pending_blance.png" alt="Dashboard" style="width:45px; height:45px;">
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="divider" style="height: 5px;"></div>
                                </div>
                            </div>

                            <div class="col-md-4" style="border-radius: 20px">
                                <div style="background-color: #F2F2F2; border: 1px solid;  border-color: white #009DDE;border-radius: 20px;" class="mt-5">
                                    <div class="about-us-title">
                                        <h5><b>Requested Cashback</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="position: relative; top: -5px;">AED</b> <b style="color: #009DDE;">0.00</b></span>
                                        <span style="padding-left:25px;">
                                            <img src="{{URL::to('/public')}}/web_assets/images/icons/requested_cashback.png" alt="Dashboard" style="width:45px; height:45px;">
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="divider" style="height: 5px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mt-5">

                    <div class="col-lg-12 col-12">

                        <div class="row text-center contact-us-pg">

                            <div class="col-md-4" style="border-radius: 20px">
                                <div style="background-color: #F2F2F2; border: 1px solid;  border-color: white #009DDE;border-radius: 20px;" class="mt-5">
                                    <div class="about-us-title">
                                        <h5><b>Approved Cashback</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="position: relative; top: -5px;">AED</b> <b style="color: #009DDE;">0.00</b></span>
                                        <span style="padding-left:25px;">
                                            <img src="{{URL::to('/public')}}/web_assets/images/icons/approved_cashback.png" alt="Dashboard" style="width:45px; height:45px;">
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="divider" style="height: 5px;"></div>
                                </div>
                            </div>

                            <div class="col-md-4" style="border-radius: 20px">
                                <div style="background-color: #F2F2F2; border: 1px solid;  border-color: white #009DDE;border-radius: 20px;" class="mt-5">
                                    <div class="about-us-title">
                                        <h5><b>Total Coupons Used</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="color: #009DDE;">5 Coupons</b></span>
                                        <span style="padding-left:25px;">
                                            <img src="{{URL::to('/public')}}/web_assets/images/icons/total_coupons.png" alt="Dashboard" style="width:45px; height:45px;">
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="divider" style="height: 5px;"></div>
                                </div>
                            </div>

                            <div class="col-md-4" style="border-radius: 20px">
                                <div style="background-color: #F2F2F2; border: 1px solid;  border-color: white #009DDE;border-radius: 20px;" class="mt-5">
                                    <div class="about-us-title">
                                        <h5><b>Total Store Visits</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="color: #009DDE;">10 Visit</b></span>
                                        <span style="padding-left:25px;">
                                            <img src="{{URL::to('/public')}}/web_assets/images/icons/total_visit.png" alt="Dashboard" style="width:45px; height:45px;">
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="divider" style="height: 5px;"></div>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- section end-->


@endsection
@section('addScript')
<script type="text/javascript" src="{{URL::to('/public/web_assets/js/profile.js')}}"></script>
@endsection