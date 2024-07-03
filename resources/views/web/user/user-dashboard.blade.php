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
                    <h4 class="mb-5 mt-5"> <b style="color: #fff;">{{ __('translation.dashboard') }}</b></h4>
                </div>

                <div class="row mt-5">
                    @if(Auth::user()->email_verified == 0)
                        <div class="text-center mt-0" style="display:block;background-color: #1F428A;border-radius: 10px; background-image: linear-gradient(90deg, #1F428A, #2791CC); ">
                            <form id="verify_email_form" action="{{route('user.verify_email')}}">
                                @csrf
                                <div class="row col-lg-12 mt-1" style="justify-content:center;justify-items: center;justify-self: center;padding: 10px;">
                                    <div class="col-sm-4">
                                        <input type="number" name="email_otp" class="form-control form-control-sm" placeholder="{{ __('translation.otp_txt') }}" min="100000" max="999999" required>
                                    </div>
                                    <div class="col-4">
                                        <p><button type="submit" class="btn btn-primary btn-sm pull-right" style="width: 100px;">&nbsp;&nbsp;&nbsp;{{ __('translation.verify') }}&nbsp;&nbsp;&nbsp;</button></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                    <div class="col-lg-12 col-12 mt-5">

                        <div class="row text-center contact-us-pg">

                            <div class="col-md-4" style="border-radius: 20px;">
                                <div style="background-color: #F2F2F2; border: 1px solid;  border-color: white #009DDE;border-radius: 20px;" class="mt-5">
                                    <div class="about-us-title">
                                        <h5><b>{{ __('translation.available_balance_txt') }}</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="position: relative; top: -5px;">{{ __('translation.aed') }}</b> <b style="color: #009DDE;">{{number_format(Auth::user()->wallet)}}</b></span>
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
                                        <h5><b>{{ __('translation.pending_balance_txt') }}</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="position: relative; top: -5px;">{{ __('translation.aed') }}</b> <b style="color: #009DDE;">{{number_format($pending_balance)}}</b></span>
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
                                        <h5><b>{{ __('translation.requested_cashback_txt') }}</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="position: relative; top: -5px;"></b> <b style="color: #009DDE;">{{number_format($requested_cashback)}}</b></span>
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
                                        <h5><b>{{ __('translation.approved_cashback_txt') }}</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="position: relative; top: -5px;"></b> <b style="color: #009DDE;">{{number_format($approved_cashback)}}</b></span>
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
                                        <h5><b>{{ __('translation.total_coupons_used_txt') }}</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="color: #009DDE;">{{number_format($coupon_used)}} {{ __('translation.coupons_txt') }}</b></span>
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
                                        <h5><b>{{ __('translation.total_store_visits_txt') }}</b></h5>
                                    </div>
                                    <div class="about-us-text">

                                        <span><b style="color: #009DDE;">{{number_format($store_visits)}} {{ __('translation.visit_txt') }}</b></span>
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