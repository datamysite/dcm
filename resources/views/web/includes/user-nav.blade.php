<style>
    /* .nav-item:hover {
    padding-left: 5px;
    padding-top: 5px;
  } */
</style>
<!-- old color : #f0f3f2
new color : #dfe1e5 
 background-image: linear-gradient(90deg, #1F428A, #2791CC);
-->
<div class="MobileMenuNav mt-10">
    <div class="menu-container text-center">
        <div class="menu-wrapper">
            <ul class="inline-menu">
                <li><a href="{{route('user.dashboard')}}" class="active">{{ __('translation.dashboard') }}</a></li>
                <li><a href="{{route('user.claimCashback')}}">{{ __('translation.claim_cashback_menu') }}</a></li>
                <li><a href="{{route('user.withdrawPayment')}}">{{ __('translation.with_draw_menu') }}</a></li>
                <li><a href="{{route('user.referralEarn')}}">{{ __('translation.referral_earn_menu') }}</a></li>
                <li><a href="{{route('user.settings')}}">{{ __('translation.settings_menu') }}</a></li>
                <li><a href="{{route('user.logout')}}" style="color:red;">Logout</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row col-lg-3 m-1 mt-1">

    <div class="user-nav-mobile" style="display:none;">
        <div class="d-block d-lg-none mb-4">
            <a class="btn btn-primary w-100 d-flex justify-content-center align-items-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                </span>
                {{ __('translation.menu') }}
            </a>
            <div class="collapse mt-2" id="collapseExample">
                <div class="card card-body">
                    <ul class="mb-0 list-unstyled">
                        <li><a class="dropdown-item" href="{{route('user.claimCashback')}}">{{ __('translation.dashboard') }}</a></li>
                        <li><a class="dropdown-item" href="{{route('user.claimCashback')}}">{{ __('translation.claim_cashback_menu') }}</a></li>
                        <li><a class="dropdown-item" href="{{route('user.paymenyHistory')}}">{{ __('translation.payment_history_menu') }}</a></li>
                        <!--   <li><a class="dropdown-item" href="{{route('user.referralEarn')}}">{{ __('translation.referral_earn_menu') }}</a></li> -->
                        <li><a class="dropdown-item" href="{{route('user.withdrawPayment')}}">{{ __('translation.with_draw_menu') }}</a></li>
                        <li><a class="dropdown-item" href="{{route('user.transactionHistory')}}">{{ __('translation.transaction_history') }}</a></li>
                        <li><a class="dropdown-item" href="{{route('user.settings')}}">{{ __('translation.settings_menu') }}</a></li>
                        <li><a class="dropdown-item" href="{{route('user.logout')}}">{{ __('translation.logout_menu') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Section Start-->

    <!-- Main Mobile div for main profile Start-->
    <div class="MobileUserProfile mt-5" style="background-color: #1F428A;border-radius: 10px; background-image: linear-gradient(90deg, #1F428A, #2791CC);justify-items: center;justify-content: center;">
        <div class="row mt-2">
            <div class="col-sm-2">
                <img src="{{URL::to('/public')}}/web_assets/images/reviews/male/1.png" alt="Circle Image" class="circle-image">
            </div>
            <div class="col-sm-8 ">
                <h6 class="mt-5" style="color: #fff;padding-left:25px;">Hi, Mohammed Abuelgassim Hussain</h6>
                <p style="color: #fff;padding-left:25px;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
            </div>
            <div class="col-sm-2 d-flex flex-column justify-content-end">
                <a href="{{route('user.logout')}}"><b class="mt-0" style="color: #fff;">{{ __('translation.logout_menu') }}</b></a>
            </div>
        </div>
        <div class="mt-2"></div>
    </div>
    <!-- Main Mobile div for main profile End-->


    <!-- Mobile Section End-->



    <!-- Desktop Profile Div -->
    <!-- col -->
    <div class="DesktopUserMenu text-center mt-1" style="background-color: #1F428A;border-radius: 10px; background-image: linear-gradient(90deg, #1F428A, #2791CC);">
        <div class="mt-5">
            <!-- heading -->
            <h6 style="color: #fff;text-transform: uppercase;">{{ __('translation.Profile') }}</h6>
        </div>

        <div class="row">
            <div class="col">
                <img src="{{URL::to('/public')}}/web_assets/images/reviews/male/1.png" alt="Circle Image" class="circle-image">
            </div>
            <div class="mt-2">
                <h6 style="color:#fff;">{{Auth::user()->name}}</h6>
            </div>
        </div>
    </div>

    <!-- Wallet Section Start -->
    <!-- //Default Wallet design -->
    <div class="text-center mt-5" style="display:block;background-color: #1F428A;border-radius: 10px; background-image: linear-gradient(90deg, #1F428A, #2791CC); ">

        <div class="row mt-2" style="justify-content: center;justify-items:center;">
            <div class="col-sm-3 d-flex flex-column justify-content-top" style="padding-top:0px">
                <span><img src="{{URL::to('/public')}}/web_assets/images/icons/coins.jpg" alt="DCM Coins" class="circle-image" style="width:50px; height:50px;mix-blend-mode:hard-light !important;filter:brightness(0.5) invert(1);"></span>
            </div>
            <div class="col-sm-3 d-flex flex-column justify-content-center" style="padding-top:25px">

                <h4 class="text-center" style="color: #fff;">
                    0.00
                </h4>
            </div>
            <div class="col-sm-4 d-flex flex-column justify-content-top" style="padding-top:15px">
                <b class="mt-0" style="color: #fff;"> Coins</b>
            </div>
        </div>
        <div class="mt-2"></div>
    </div>
    <!-- Wallet Section End -->
    <div class="mt-5" style="background-color: #f0f3f2;border-radius: 10px">

        <div class="user-nav-desktop">
            <div class="row">
                <div class="nav nav-category" id="categoryCollapseMenu">
                    <ul>
                        <li class="nav-item border-bottom"><a href="{{route('user.dashboard')}}" class="nav-link collapsed">{{ __('translation.dashboard') }}</a></li>
                        <li class="nav-item border-bottom w-100"><a href="{{route('user.claimCashback')}}" class="nav-link collapsed">{{ __('translation.claim_cashback_menu') }}</a></li>
                        <li class="nav-item border-bottom"><a href="{{route('user.paymenyHistory')}}" class="nav-link collapsed">{{ __('translation.payment_history_menu') }}</a></li>
                        <li class="nav-item border-bottom"><a href="{{route('user.referralEarn')}}" class="nav-link collapsed">{{ __('translation.referral_earn_menu') }}</a></li>
                        <li class="nav-item border-bottom"><a href="{{route('user.withdrawPayment')}}" class="nav-link collapsed">{{ __('translation.with_draw_menu') }}</a></li>
                        <li class="nav-item border-bottom"><a href="{{route('user.transactionHistory')}}" class="nav-link collapsed">{{ __('translation.transaction_history') }}</a></li>
                        <li class="nav-item border-bottom"><a href="{{route('user.settings')}}" class="nav-link collapsed">{{ __('translation.settings_menu') }}</a></li>
                        <li class="nav-item border-bottom"><a href="{{route('user.logout')}}" class="nav-link collapsed"><b>{{ __('translation.logout_menu') }}</b></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>