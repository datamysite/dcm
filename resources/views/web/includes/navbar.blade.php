@php
$url = url()->full();
$pos = strpos($url, "/".app()->getLocale());
@endphp


<div class="">
   <div class="mobile-navbar">
      <div class="list-inline d-flex ">

         <div class="justify-content-center w-100 d-lg-none">
            <a class="navbar-brand" href="{{route('home')}}">
               <img src="{{URL::to('/public')}}/web_assets/images/logo/m-logo.png" alt="dealsandcouponsmena" style="width: 140px;" />
            </a>
         </div>

         @if ( app()->getLocale() == 'en' )
         <div class="d-flex align-items-center" style="padding: 4px 10px;">
            <i class="bi bi-globe"></i>&nbsp;&nbsp;
            <span> <a class="nav-link" href="{{ substr_replace($url,"/ar",$pos,3) }}"><span><b>AR</b></span></a></span>
         </div>

         @else
         <div class="d-flex align-items-center" style="padding: 4px 10px;">
            <i class="bi bi-globe"></i>&nbsp;&nbsp;
            <span> <a class="nav-link" href="{{ substr_replace($url,"/en",$pos,3) }}"><span><b>EN</b></span></a></span>
         </div>
         @endif

         <i class="navbar-flag">
            <img src="{{URL::to('/public/web_assets/images/countries/'.config('app.country').'.png')}}" width="34px" height="24.281px">
         </i>

         <div class="list-inline-item d-inline-block d-lg-none">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-label="Toggle navigation">
               <img src="{{URL::to('/public/web_assets/images/icons/menu.svg')}}" width="36px" height="36px" alt="Menu" />
            </button>
         </div>
      </div>
      <div class="nav-tray">

         <div class="tray-item tray-search">
            <div class="input-group  main-search-div">
               <input class="form-control rounded mob-main-search" type="search" placeholder="{{ __('translation.Search') }}" />

               <div class="mob-main-search-result">
               </div>
            </div>
         </div>

         <div class="tray-item tray-emirates">
            @foreach($allstates as $val)
            <a href="{{route('setRegion', [app()->getLocale(), $val->slug])}}" class="selectEmirates {{$val->slug == $region ? 'active' : ''}}" data-id="{{base64_encode($val->id)}}">
               <div class="header_card">
                  <img src="{{config('app.storage').'states/'.$val->image}}" alt="{{$val->name}}" />
                  {{$val->shortname}}
               </div>
            </a>
            @endforeach
         </div>
      </div>
   </div>

   <div class="mobile-footbar">
      <div class="list-inline d-flex ">
         <a href="{{route('home')}}" class="" data-option="home">
            <i class="fa fa-home"></i>
            {{ __('translation.Home') }}
         </a>

         <a href="#" class="mobile-nav-button" data-option="search">
            <i class="fa fa-search"></i>
            {{ __('translation.search_') }}
         </a>

         <a href="{{route('claim_cashback')}}" class="center-nav-mob" data-option="home">
            <i class="fa-solid fa-dollar"></i>
            {{ __('translation.Earn_Cashback') }}
         </a>

         <!-- <a href="{{route('Sell_With_DCM')}}" class="center-nav-mob" data-option="home">
            <i class="fa fa-bullseye"></i>
            {{ __('translation.Sell_With_us') }}
         </a> -->

         <a href="#" class="mobile-nav-button" data-option="home">
            <i class="fa fa-bullseye"></i>
            {{ __('translation.Sell_With_us') }}
         </a>


         <!-- <a href="#" class="mobile-nav-button" data-option="emirates">
            <i class="fa fa-crosshairs"></i>
            @if(config('app.country') == '1')
            {{ __('translation.all_emirates') }}
            @else
            {{ __('translation.All Provices') }}
            @endif
         </a> -->

         @if(Auth::check())
         <a href="{{route('user.dashboard',[app()->getLocale()])}}">
            <i class="fa fa-user"></i>
            {{ __('translation.Profile') }}
         </a>
         @else
         <a href="#" class="" data-option="login" data-bs-toggle="modal" data-bs-target="#userModal">
            <i class="fa fa-user-circle-o"></i>
            {{ __('translation.Sign_IN') }}
         </a>
         @endif
      </div>
   </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light navbar-default py-0" aria-label="Offcanvas navbar large">
   <div class="container">

      <div class="offcanvas offcanvas-start" tabindex="-1" id="navbar-default" aria-labelledby="navbar-defaultLabel">
         <div class="offcanvas-header pb-1">
            <a href="{{route('home')}}"><img src="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" width="50px" height="50px" alt="DCM" /></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>

         <div class="offcanvas-body">

            <!-- Desktop Menu Start Here -->
            <div class="d-flex align-items-center">
               <a class="desktop-navbar-brand" href="{{route('home')}}">
                  <img src="{{URL::to('/public')}}/web_assets/images/logo/logo-DCM.png" alt="Logo" width="90px" height="50px">
               </a>
            </div>

            <div class="desktop-nav">

               <div class="d-flex align-items-center text-center">
                  <ul class="navbar-nav">

                     @if(config('app.retail'))
                     <li class="nav-item dropdown" style="padding: 10px;">

                        <a class="nav-link dropdown-toggle" href="{{URL::to('/'.app()->getLocale().'/stores')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('translation.All_Stores') }}</a>

                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item allstore_view" href="{{route('stores', ['online'])}}" onclick="return gtag_report_allstore;">{{ __('translation.Online') }}</a></li>
                           <li><a class="dropdown-item allstore_view" href="{{route('stores', ['retail'])}}" onclick="return gtag_report_allstore;">{{ __('translation.Retail') }}</a></li>
                        </ul>

                     </li>
                     @else
                     <li class="nav-item dropdown" style="padding: 10px;">
                        <a class="nav-link" href="{{URL::to('/'.app()->getLocale().'/stores')}}" role="button" aria-expanded="false">{{ __('translation.All_Stores') }}</a>
                     </li>
                     @endif

                     <li class="nav-item dropdown w-100 w-lg-auto" style="padding: 10px;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('translation.Categories') }}</a>

                        <ul class="dropdown-menu desktopMenuCategories">
                           @foreach($navbarCategories as $val)
                           @php
                           $string = strtolower(trim($val->name));
                           $string = str_replace('&', 'and', $string);
                           $string = str_replace(' ', '-', $string);
                           $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                           @endphp
                           @if(config('app.retail'))
                           @if($val->type == 3)
                           <li class="dropdown-submenu dropend">
                              <a class="dropdown-item dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a>
                              <ul class="dropdown-menu">

                                 <li><a class="dropdown-item" href="{{URL::to('/'.app()->getLocale().'/'.$slug.'/online')}}">{{ __('translation.Online') }}</a></li>
                                 <li><a class="dropdown-item" href="{{URL::to('/'.app()->getLocale().'/'.$slug.'/retail')}}">{{ __('translation.Retail') }}</a></li>

                              </ul>
                           </li>
                           @else
                           <li><a class="dropdown-item" href="{{URL::to('/'.app()->getLocale().'/'.$slug)}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a></li>
                           @endif
                           @else
                           <li>
                              <a class="dropdown-item" href="{{URL::to('/'.app()->getLocale().'/'.$slug)}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a>
                           </li>
                           @endif
                           @endforeach
                        </ul>
                     </li>

                     @if(app()->getLocale() == 'en')
                     <li class="nav-item dropdown w-100 w-lg-auto" style="padding: 10px;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blogs</a>

                        <ul class="dropdown-menu desktopMenuCategories">
                           @foreach($navbarBlogs as $val)
                           @php
                           $string = strtolower(trim($val->name));
                           $string = str_replace('&', 'and', $string);
                           $string = str_replace(' ', '-', $string);
                           $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                           @endphp

                           <li>
                              <a class="dropdown-item" href="{{route('blog.categories', $slug )}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a>
                           </li>

                           @endforeach
                        </ul>
                     </li>
                     @endif

                     <li class="nav-item dropdown" style="padding: 10px;">

                        <a class="nav-link" href="{{route('claim_cashback')}}" role="button" aria-expanded="false">{{ __('translation.Earn_Cashback') }}</a>

                     </li>
                  </ul>
                  <form class="ms-auto d-flex align-items-center" style="padding: 10px;">
                     <div class="input-group main-search-div">
                        <input class="form-control main-search" type="text" placeholder="{{ __('translation.Search') }}" style="width: 380px;">
                        @if ( app()->getLocale() == 'en' )
                        <span class="input-group-append">
                           <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="button">
                              <i class="fa fa-search"></i>
                           </button>
                        </span>
                        @endif

                        <div class="main-search-result">
                        </div>
                     </div>
                  </form>

                  <ul class="navbar-nav">
                     <li class="nav-item dropdown" style="padding: 10px;">
                        <a class="nav-link" href="{{route('Sell_With_DCM')}}" role="button" aria-expanded="false"><b>{{ __('translation.Sell_With_DCM') }}</b></a>
                     </li>
                     <ul class="navbar-nav">
                        @if(Auth::check())
                        <li class="nav-item dropdown" {!! app()->getLocale() == 'ar' ? 'style="padding: 10px;"' : 'style="padding: 10px;"' !!} >

                           <a class="nav-link" href="#" role="button" aria-expanded="false">
                              <i class="fa-solid fa-user" style="font-weight: bold; color: black; font-size:14px;"></i>
                              | <span style="top: -5px; right: 0;">{{ __('translation.aed_coin') }}</span> <strong>{{number_format(Auth::user()->wallet)}}</strong>
                              <i class="fa-solid fa-caret-down" style="margin-right: 1px;"></i>
                           </a>

                           <div class="dropdown-menuMainDIV">

                              <div class="menuSubDIV mt-0">
                                 <div class="row" {!! app()->getLocale() == 'ar' ? 'style="text-align: right;padding-right:20px;"' : 'style="text-align: left;padding-left:20px"' !!} >
                                    <div class="col-lg-12 mt-3">
                                       <h6 class="mt-0" style="color: #fff;">{{ __('translation.hi_txt') }} {{Auth::user()->name}}</h6>
                                    </div>
                                 </div>
                                 <div class="row text-center" style="color: #fff;">
                                    <div class="col-lg-6 mt-3">
                                       <span class="mt-0">{{ __('translation.available_balance') }}</span><br>
                                       <span class="mt-2"><b {!! app()->getLocale() == 'ar' ? 'style="position: relative; top: -2px; right:-10px; color:#ffb01b"' : 'style="position: relative; top: -2px; left:-10px; color:#ffb01b"' !!} ><i class="fa fa-coins"></i></b> <b class="menu-coins">{{number_format(Auth::user()->wallet)}}</b></span>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                       <span class="mt-0"> {{ __('translation.pending_balance') }}</span><br>
                                       <span><b {!! app()->getLocale() == 'ar' ? 'style="position: relative; top: -2px; right:-10px; color:#ffb01b"' : 'style="position: relative; top: -2px; left:-10px; color:#ffb01b"' !!} ><i class="fa fa-coins"></i></b> <b class="menu-coins">{{number_format($pending_balance)}}</b></span>
                                    </div>

                                    <div class="row mt-0" {!! app()->getLocale() == 'ar' ? 'style="text-align: right; padding-right: 30px; text-decoration: underline;"' : 'style="text-align: left; padding-left: 30px; text-decoration: underline;"' !!} >

                                       <span class="menu-sub-difference" style="color: #fff;">
                                          <i class="fa fa-info-circle" aria-hidden="true" {!! app()->getLocale() == 'ar' ? 'style="padding-left: 5px;"' : 'style="padding-right: 5px;"' !!}></i>
                                          <a href="#" style="color: #fff;">{{ __('translation.what_is_difference') }}</a>
                                       </span>
                                    </div>
                                    <div class="divider"></div>
                                 </div>
                              </div>

                              <div class="menuSubDIV2">
                                 <div class="row" style="text-align: left; padding-left: 30px;">
                                    <div class="nav nav-category" id="categoryCollapseMenu">
                                       <ul>
                                          <li class="nav-item border-bottom">
                                             <a href="{{route('user.dashboard')}}" class="nav-link collapsed">
                                                <span>{{ __('translation.dashboard') }}</span><span><i class="fa fa-dashboard"></i></span>
                                             </a>
                                          </li>
                                          <li class="nav-item border-bottom">
                                             <a href="{{route('user.claimCashback')}}" class="nav-link collapsed">
                                                <span>{{ __('translation.claim_cashback_menu') }}</span><span><i class="fa fa-money"></i></span>
                                             </a>
                                          </li>
                                          <li class="nav-item border-bottom">
                                             <a href="{{route('user.withdrawPayment')}}" class="nav-link collapsed">
                                                <span>{{ __('translation.with_draw_menu') }}</span><span><i class="fa fa-wallet"></i></span>
                                             </a>
                                          </li>
                                          <li class="nav-item border-bottom">
                                             <a href="{{route('user.referralEarn')}}" class="nav-link collapsed">
                                                <span>{{ __('translation.referral_earn_menu') }}</span><span><i class="fa fa-user-plus"></i></span>
                                             </a>
                                          </li>
                                          <li class="nav-item border-bottom">
                                             <a href="{{route('user.settings')}}" class="nav-link collapsed">
                                                <span>{{ __('translation.settings_menu') }}</span><span><i class="fa fa-cog"></i></span>
                                             </a>
                                          </li>
                                          <li class="nav-item border-bottom">
                                             <a href="{{route('user.logout')}}" class="nav-link collapsed">
                                                <span><b>{{ __('translation.logout_menu') }}</b></span><span><i class="fa fa-sign-out"></i></span>
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>


                        @else
                        <li class="nav-item dropdown" style="padding: 10px;">
                           <a class="nav-link" href="javascript:void(0)" id="open-signin" role="button" data-bs-toggle="modal" data-bs-target="#userModal"><b>{{ __('translation.Sign_Up') }}</b></a>
                        </li>
                        @endif

                        @if ( app()->getLocale() == 'en' )
                        <a class="nav-link" href="{{ substr_replace($url,"/ar",$pos,3) }}">
                           <div class="nav-link ms-3 d-flex align-items-center" style="padding: 10px;">
                              <i class="bi bi-globe"></i>&nbsp;&nbsp;
                              <span><b>AR</b></span>
                           </div>
                        </a>
                        @else
                        <a class="nav-link" href="{{ substr_replace($url,"/en",$pos,3) }}">
                           <div class="nav-link ms-3 d-flex align-items-center" style="padding: 10px;">
                              <i class="bi bi-globe"></i>&nbsp;&nbsp;
                              <span><b>EN</b></span>
                           </div>
                        </a>
                        @endif
                        <i class="navbar-flag" data-bs-toggle="modal" data-bs-target="#locationModal">
                           <img src="{{URL::to('/public/web_assets/images/countries/'.config('app.country').'.png')}}" width="25px" height="17.844px">
                        </i>
                     </ul>
               </div>

            </div>
            <!-- Desktop Menu End Here -->

            <!-- Mobile Menu Start Here -->
            <div class="mobile-nav">

               @if(Auth::check())
               <div class="MobileWallet mt-0" style="background-color: #1F428A;border-radius: 20px; background-image: linear-gradient(90deg, #1F428A, #2791CC);justify-items: center;justify-content: center;">

                  <div class="mt-0">

                     <div class="row" {!! app()->getLocale() == 'ar' ? 'style="text-align: right;padding-right:20px;"' : 'style="text-align: left;padding-left:20px;"' !!}>
                        <div class="col-lg-12 mt-5">
                           <h4 class="mt-0" style="color: #fff;">{{ __('translation.hi_txt') }} <a href="{{route('user.dashboard', [app()->getLocale()])}}" style="color: #fff;">{{Auth::user()->name}} </a> </h4>
                        </div>
                     </div>

                     <div class="row" style="color: #fff;">


                        <div class="col-6 mt-5">
                           <span class="mt-0" {!! app()->getLocale() == 'ar' ? 'style="padding-right:10px"' : 'style="padding-left:10px"' !!} >{{ __('translation.available_balance') }}</span><br>
                           <span class="mt-2" {!! app()->getLocale() == 'ar' ? 'style="padding-right:35px"' : 'style="padding-left:35px"' !!} >
                              <b {!! app()->getLocale() == 'ar' ? 'style="position: relative; top: -2px; right:-10px; color:#ffb01b"' : 'style="position: relative; top: -2px; left:-10px; color:#ffb01b"' !!}><i class="fa fa-coins"></i></b> <b>{{number_format(Auth::user()->wallet)}}</b></span>
                        </div>


                        <div class="col-6 mt-5">
                           <span class="mt-0"> {{ __('translation.pending_balance') }}</span><br>
                           <span {!! app()->getLocale() == 'ar' ? 'style="padding-right:35px"' : 'style="padding-left:35px"' !!}>
                              <b {!! app()->getLocale() == 'ar' ? 'style="position: relative; top: -2px; right:-10px; color:#ffb01b"' : 'style="position: relative; top: -2px; left:-10px; color:#ffb01b"' !!} ><i class="fa fa-coins"></i></b> <b>{{number_format($pending_balance)}}</b></span>
                        </div>

                        <div class="row mt-2" {!! app()->getLocale() == 'ar' ? 'style="text-align: right; padding-right: 30px; text-decoration: underline;"' : 'style="text-align: left; padding-left: 30px; text-decoration: underline;"' !!} >
                           <span class="mt-2" style="color: #fff;">
                              <i class="fa fa-info-circle" aria-hidden="true" {!! app()->getLocale() == 'ar' ? 'style="padding-left: 5px;"' : 'style="padding-right: 5px;"' !!}></i>
                              <a href="#" style="color: #fff;">{{ __('translation.what_is_difference') }}</a>
                           </span>
                        </div>

                        <div class="mt-2"></div>
                     </div>
                  </div>

               </div>
               @endif

               <div class="offcanvas-body">

                  <div>
                     <ul class="navbar-nav align-items-center">

                        @if(config('app.retail'))
                        <li class="nav-item dropdown w-100 w-lg-auto">
                           <a class="nav-link dropdown-toggle" href="{{URL::to('/'.app()->getLocale().'/stores')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('translation.All_Stores') }}</a>
                           <ul class="dropdown-menu">
                              <li><a class="dropdown-item allstore_view" href="{{route('stores', ['online'])}}" onclick="return gtag_report_allstore;">{{ __('translation.Online') }}</a></li>
                              <li><a class="dropdown-item allstore_view" href="{{route('stores', ['retail'])}}" onclick="return gtag_report_allstore;">{{ __('translation.Retail') }}</a></li>
                           </ul>
                        </li>
                        @else
                        <li class="nav-item w-100 w-lg-auto">
                           <a class="nav-link" href="{{URL::to('/'.app()->getLocale().'/stores')}}">{{ __('translation.All_Stores') }}</a>
                        </li>
                        @endif

                        <li class="nav-item dropdown w-100 w-lg-auto">
                           <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('translation.Categories') }}</a>
                           <ul class="dropdown-menu mobMenuCategories">

                              @foreach($navbarCategories as $val)
                              @php
                              $string = strtolower(trim($val->name));
                              $string = str_replace('&', 'and', $string);
                              $string = str_replace(' ', '-', $string);
                              $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                              @endphp

                              @if(config('app.retail'))
                              @if($val->type == 3)
                              <li class="dropdown-submenu dropend mob-nav">
                                 <a class="dropdown-item dropdown-toggle nested-link" href="javascript:void(0)" data-link="{{$val->id}}" role="button" data-bs-toggle="dropdown">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a>
                                 <ul class="dropdown-menu cat_{{$val->id}}">

                                    <li><a class="dropdown-item" href="{{URL::to('/'.app()->getLocale().'/'.$slug.'/online')}}">{{ __('translation.Online') }}</a></li>
                                    <li><a class="dropdown-item" href="{{URL::to('/'.app()->getLocale().'/'.$slug.'/retail')}}">{{ __('translation.Retail') }}</a></li>

                                 </ul>
                              </li>
                              @else
                              <li><a class="dropdown-item" href="{{URL::to('/'.app()->getLocale().'/'.$slug)}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a></li>
                              @endif
                              @else
                              <li><a class="dropdown-item" href="{{URL::to('/'.app()->getLocale().'/'.$slug)}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a></li>
                              @endif
                              @endforeach
                           </ul>
                        </li>

                        @if(app()->getLocale() == 'en')
                        <li class="nav-item dropdown w-100 w-lg-auto">
                           <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blogs</a>

                           <ul class="dropdown-menu desktopMenuCategories">
                              @foreach($navbarBlogs as $val)
                              @php
                              $string = strtolower(trim($val->name));
                              $string = str_replace('&', 'and', $string);
                              $string = str_replace(' ', '-', $string);
                              $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                              @endphp

                              <li>
                                 <a class="dropdown-item" href="{{route('blog.categories', $slug )}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a>
                              </li>

                              @endforeach
                           </ul>
                        </li>
                        @endif


                        <li class="nav-item w-100 w-lg-auto">

                           <a class="nav-link" href="{{route('claim_cashback')}}">{{ __('translation.Earn_Cashback') }}</a>

                        </li>

                        <li class="nav-item w-100 w-lg-auto">
                           <a class="nav-link" href="{{route('Sell_With_DCM')}}">{{ __('translation.Sell_With_DCM') }}</a>
                        </li>

                        @if(Auth::check())
                        <li class="nav-item w-100 w-lg-auto dropdown">
                           <a class="nav-link" href="{{route('user.logout')}}">{{ __('translation.Logout') }}</a>
                        </li>
                        @else

                        <li class="nav-item w-100 w-lg-auto">
                           <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="modal" data-bs-target="#userModal">{{ __('translation.Sign_IN') }}</a>
                        </li>
                        @endif

                        <li>
                           <button type="button" class="btn btn-primary menu-close" data-bs-dismiss="offcanvas">{{ __('translation.close') }}</button>
                        </li>

                     </ul>
                  </div>
               </div>
            </div>
            <!-- Mobile Menu End Here -->
         </div>
      </div>
   </div>
</nav>


@if(!Str::contains(url()->current(), 'user') && Auth::check() && Route::currentRouteName() === 'home' )
<!-- Mobile Upper Menu Start Here -->

<div class="MobileUpperMenu mt-11">
   <div style="background-color: #1F428A; background-image: linear-gradient(90deg, #1F428A, #2791CC);">
      <div class="row" style="height: 75px;">
         <div class="col-9" {!! app()->getLocale() == 'ar' ? 'style="color: #fff;padding-right: 25px;"' : 'style="color: #fff;padding-left: 25px;"' !!} >
            <h6 class="mt-3" style="color: #fff;">{{ __('translation.hi_txt') }} {{Auth::user()->name}}</h6>
            <span style="color: #fff;">{{ __('translation.available_balance') }}</span>
         </div>

         <div class="col-3 mt-2">
            <span style="top: 2px; padding-left: 10px;color:#ffa804;">{{ __('translation.aed_coin') }}</span>
            <h4 class="mt-0" {!! app()->getLocale() == 'ar' ? 'style="color: #fff;padding-right:0px;"' : 'style="color: #fff;padding-left:0px;"' !!}> {{number_format(Auth::user()->wallet)}}</h4>
         </div>

      </div>
   </div>

   <div class="row" style="height: autopx;justify-items: center;justify-content: center; border-bottom: 1px solid gray;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);">

      <div class="col-3 text-center">
         <a href="{{route('claim_cashback')}}">
            <h6 class="mt-3" style="color: black;">{{ __('translation.how_to_earn') }}</h6>
         </a>
      </div>

      <div class="col-4 text-center">
         <a href="{{route('user.referralEarn')}}">
            <h6 class="mt-3" style="color: black;">{{ __('translation.refer_and_get') }}</h6>
         </a>
      </div>

      <div class="col-3 text-center">
         <a href="{{route('user.transactionHistory')}}">
            <h6 class="mt-3" style="color: black;">{{ __('translation.history') }}</h6>
         </a>
      </div>

   </div>

</div>
@endif

<!-- Mobile Upper Menu End Here -->


<!-- UserLogin Welcome Message Start -->
@if (session()->get('welcomeMessageShown', false))

<div class="MobileWelcomeMSG mt-10">
   <div class="mt-0">
      <div class="row" {!! app()->getLocale() == 'ar' ? 'style="text-align: right;padding-right:25px ;"' : 'style="text-align: left;padding-left:25px ;"' !!}>
         <div class="col-sm-10 mt-5">
            <h6 class="mt-2">{{ __('translation.hi_txt') }} {{Auth::user()->name}}</h6>
            <b style="color:black;">{{ __('translation.we_are_glade') }}</b>
            <p style="font-size: 15px; color:black;">
               {{ __('translation.discover') }}
            </p>
         </div>
         <div {!! app()->getLocale() == 'ar' ? 'style="position: absolute; top: 10px; right: 85%;"' : 'style="position: absolute; top: 10px; left: 85%;"' !!}>
            <a href="javascript:void(0);" onclick="closeWelcomeMessage()" style="color:red;"><strong>x</strong></a>
         </div>
      </div>
   </div>
</div>

<div class="WebsiteWelcomeMSG mt-10">
   <div class="mt-0">
      <div class="row" {!! app()->getLocale() == 'ar' ? 'style="text-align: right;padding-right:25px ;"' : 'style="text-align: left;padding-left:25px ;"' !!}>
         <div class="col-sm-10 mt-5">
            <h6 class="mt-2">{{ __('translation.hi_txt') }} {{Auth::user()->name}}</h6>
            <b style="color:black;">{{ __('translation.we_are_glade') }}</b>
            <p style="font-size: 15px; color:black;">
               {{ __('translation.discover') }}
            </p>
         </div>
         <div {!! app()->getLocale() == 'ar' ? 'style="position: absolute; top: 10px; right: 85%;"' : 'style="position: absolute; top: 10px; left: 85%;"' !!}>
            <a href="javascript:void(0);" onclick="closeWelcomeMessage()" style="color:red;">X</a>
         </div>
      </div>
   </div>
</div>

@endif
<!-- UserLogin Welcome Message end -->
@if( Route::currentRouteName() === 'home' && !Auth::check() )

<!-- Promot Message (SignIn,SignUp) start -->
<div class="WebsiteWelcomeMSG mt-11" style="width:420px !important; border-radius:10px !important ; ">
   <div class="mt-0">
      <div class="row" {!! app()->getLocale() == 'ar' ? 'style="text-align: right;padding-right:25px ;"' : 'style="text-align: left;padding-left:25px ;"' !!}>
         <div class="col-sm-12 mt-5">
            <b style="color:black;font-size: 14px;">{{ __('translation.login_or_sigup_txt') }}</b>
            <p style="font-size: 15px; color:black;">
               <a class="nav-link" href="{{route('claim_cashback')}}" onclick="closePromotMessage()">
                  {{ __('translation.how_to_earn_cashback') }}</a>
            </p>
            <p>
               <a class="btn btn-primary btn-sm shadow-gray" onclick="closePromotMessage()" href="javascript:void(0);" role="button" data-bs-toggle="modal" data-bs-target="#userModal">{{ __('translation.earn_now') }}</a>
            </p>
         </div>
         <div {!! app()->getLocale() == 'ar' ? 'style="position: absolute; top: 5px; right: 90%;"' : 'style="position: absolute; top: 5px; left: 90%;"' !!}>
            <a href="javascript:void(0);" onclick="closePromotMessage()" style="color:red;">X</a>
         </div>
      </div>
   </div>
</div>
<!-- Promot Message end -->
@endif