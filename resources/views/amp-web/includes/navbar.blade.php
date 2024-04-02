@php
$url = url()->full();
$pos = strpos($url, "/".app()->getLocale()."/");
@endphp
   <div class="">
      <div class="mobile-navbar">
         <div class="list-inline d-flex ">

            <div class="justify-content-center w-100 d-lg-none">
               <a class="navbar-brand" href="{{route('home', [$region])}}">
                  <amp-img src="{{URL::to('/public')}}/web_assets/images/logo/m-logo.png" alt="dealsandcouponsmena" width="140px" height="39.828px" layout="fixed"></amp-img>
               </a>
            </div>

            @if ( app()->getLocale() == 'en' )
               <div class="d-flex align-items-center" style="padding: 10px; height: 27.188px;">
                  <i class="bi bi-globe"></i>&nbsp;&nbsp;
                  <span> <a class="nav-link" href="{{ substr_replace($url,"/ar/",$pos,4) }}"><span><b>AR</b></span></a></span>
               </div>
         
            @else
               <div class="d-flex align-items-center" style="padding: 10px; height: 27.188px;">
                  <i class="bi bi-globe"></i>&nbsp;&nbsp;
                  <span> <a class="nav-link" href="{{ substr_replace($url,"/en/",$pos,4) }}"><span><b>EN</b></span></a></span>
               </div>
            @endif

            <div class="list-inline-item d-inline-block d-lg-none">
               <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-label="Toggle navigation">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000" class="bi bi-text-indent-left text-primary" viewBox="0 0 16 16">
                     <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                  </svg>
               </button>
            </div>
         </div>
         <div class="nav-tray">

            <div class="tray-item tray-search">
               <div class="input-group  main-search-div">
                  <input class="form-control rounded mob-main-search" type="search" placeholder="{{ __('translation.Search') }}" />
                  <span class="input-group-append">
                     <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                           <circle cx="11" cy="11" r="8"></circle>
                           <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                     </button>
                  </span>


                  <div class="mob-main-search-result">
                  </div>
               </div>
            </div>

            
            <div class="tray-item tray-emirates">
               
            </div>
         </div>
      </div>

      <div class="mobile-footbar">
         <div class="list-inline d-flex ">
               <a href="{{route('home', [$region])}}" class="" data-option="home">
                  <i class="fa fa-home"></i>
                  {{ __('translation.Home') }}
               </a>

               <a href="javascript:void(0)" class="mobile-nav-button" data-option="search">
                  <i class="fa fa-search"></i>
                  {{ __('translation.search_') }}
               </a>

               <a href="{{route('Sell_With_DCM', [$region])}}" class="center-nav-mob" data-option="home">
                  <i class="fa fa-bullseye"></i>
                  {{ __('translation.Sell_With_us') }}
               </a>

               <a href="javascript:void(0)" class="mobile-nav-button" data-option="emirates">
                  <i class="fa fa-crosshairs"></i>
                  {{ __('translation.all_emirates') }}
               </a>

               @if(Auth::check())
                  <a href="{{route('user.profile')}}">
                     <i class="fa fa-user-o"></i>
                     {{ __('translation.Profile') }}
                  </a>
               @else
                  <a href="javascript:void(0)" class="" data-option="login"  data-bs-toggle="modal" data-bs-target="#userModal">
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
            <a href="{{route('home', [$region])}}"><img src="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" width="50px" height="50px" alt="DCM" /></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>

         <div class="offcanvas-body">

            <!-- Mobile Menu Start Here -->
            <div class="mobile-nav">

               <div class="offcanvas-body">

                  <div>
                     <ul class="navbar-nav align-items-center">

                        <li class="nav-item dropdown w-100 w-lg-auto">
                           <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('translation.All_Stores') }}</a>
                           <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('stores', [$region, 'online'])}}">{{ __('translation.Online') }}</a></li>
                              <li><a class="dropdown-item" href="{{route('stores', [$region, 'retail'])}}">{{ __('translation.Retail') }}</a></li>
                           </ul>
                        </li>

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
                                 @if($val->type == 3)
                                    <li class="dropdown-submenu dropend mob-nav">
                                       <a class="dropdown-item dropdown-toggle nested-link" href="javascript:void(0)" data-link="{{$val->id}}" role="button" data-bs-toggle="dropdown">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a>
                                       <ul class="dropdown-menu cat_{{$val->id}}">

                                          <li><a class="dropdown-item" href="{{route('category.sub', [$region, $slug, 'online'])}}">{{ __('translation.Online') }}</a></li>
                                          <li><a class="dropdown-item" href="{{route('category.sub', [$region, $slug, 'retail'])}}">{{ __('translation.Retail') }}</a></li>

                                       </ul>
                                    </li>
                                 @else
                                    <li><a class="dropdown-item" href="{{route('category', [$region, $slug])}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a></li>
                                 @endif
                              @endforeach
                           </ul>
                        </li>

                        <li class="nav-item w-100 w-lg-auto">
                           <a class="nav-link" href="{{route('About_Us', [$region])}}">{{ __('translation.About_Us') }}</a>
                        </li>

                        <li class="nav-item w-100 w-lg-auto">
                           <a class="nav-link" href="{{route('Sell_With_DCM', [$region])}}">{{ __('translation.Sell_With_DCM') }}</a>
                        </li>

                        @if(Auth::check())
                           <li class="nav-item w-100 w-lg-auto dropdown">
                              <a class="nav-link" href="{{route('user.logout', [$region])}}">{{ __('translation.Logout') }}</a>
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