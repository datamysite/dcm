@php
$url = url()->full();
$pos = strpos($url, "/".app()->getLocale()."/");
@endphp
   <div class="">
      <div class="mobile-navbar">
         <div class="list-inline d-flex ">

            <div class="justify-content-center w-100">
               <a class="navbar-brand" href="{{route('home', [$region])}}">
                  <amp-img src="{{URL::to('/public')}}/web_assets/images/logo/m-logo.png" alt="dealsandcouponsmena" width="140px" height="39.828px" layout="fixed"></amp-img>
               </a>
            </div>

            @if ( app()->getLocale() == 'en' )
               <div class="d-flex align-items-center" style="padding: 10px; height: 27.188px;">
                  <amp-img src="{{URL::to('/public/web_assets/images/icons/globe.svg')}}" layout="fixed" width="16px" height="16px" alt="languange"></amp-img>&nbsp;&nbsp;
                  <span> <a class="nav-link" href="{{ substr_replace($url,"/ar/",$pos,4) }}"><span><b>AR</b></span></a></span>
               </div>
         
            @else
               <div class="d-flex align-items-center" style="padding: 10px; height: 27.188px;">
                  <amp-img src="{{URL::to('/public/web_assets/images/icons/globe.svg')}}" layout="fixed" width="16px" height="16px" alt="languange"></amp-img>&nbsp;&nbsp;
                  <span> <a class="nav-link" href="{{ substr_replace($url,"/en/",$pos,4) }}"><span><b>EN</b></span></a></span>
               </div>
            @endif

            <div class="list-inline-item d-inline-block">
               <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-label="Toggle navigation">
                  <amp-img src="{{URL::to('/public/web_assets/images/icons/menu.svg')}}" layout="fixed" width="36px" height="36px" alt="Menu"></amp-img>
               </button>
            </div>
         </div>
         <div class="nav-tray">

            <div class="tray-item tray-search">
               <div class="input-group  main-search-div">
                  <input class="form-control rounded mob-main-search" type="search" placeholder="{{ __('translation.Search') }}" />
                  <span class="input-group-append">
                     <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="button">
                        <amp-img src="{{URL::to('/public/web_assets/images/icons/search.svg')}}" layout="fixed" width="36px" height="36px" alt="Search"></amp-img>
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
                  <amp-img src="{{URL::to('/public/web_assets/images/icons/home.svg')}}" layout="fixed" width="29px" height="29px" alt="Home Image"></amp-img>
                  {{ __('translation.Home') }}
               </a>

               <a href="#" class="mobile-nav-button" data-option="search">
                  <amp-img src="{{URL::to('/public/web_assets/images/icons/search.svg')}}" layout="fixed" width="29px" height="29px" alt="Search Image"></amp-img>
                  {{ __('translation.search_') }}
               </a>

               <a href="{{route('Sell_With_DCM', [$region])}}" class="center-nav-mob" data-option="home">
                   <amp-img src="{{URL::to('/public/web_assets/images/icons/sell.svg')}}" layout="fixed" width="46px" height="46px" style="margin-bottom: 6px;" alt="Sell_With_DCM Image"></amp-img>
                  {{ __('translation.Sell_With_us') }}
               </a>

               <a href="#" class="mobile-nav-button" data-option="emirates">
                   <amp-img src="{{URL::to('/public/web_assets/images/icons/emirates-a.svg')}}" layout="fixed" width="29px" height="29px" alt="Emirates Image"></amp-img>
                  {{ __('translation.all_emirates') }}
               </a>

               @if(Auth::check())
                  <a href="{{route('user.profile')}}">
                      <amp-img src="{{URL::to('/public/web_assets/images/icons/profile.svg')}}" layout="fixed" width="29px" height="29px" alt="Profile Image"></amp-img>
                     {{ __('translation.Profile') }}
                  </a>
               @else
                  <a href="#" class="" data-option="login"  data-bs-toggle="modal" data-bs-target="#userModal">
                      <amp-img src="{{URL::to('/public/web_assets/images/icons/profile.svg')}}" layout="fixed" width="29px" height="29px" alt="Sign In Image"></amp-img>
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
            <a href="{{route('home', [$region])}}"><amp-img src="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" width="50px" height="50px" layout="fixed" alt="DCM"></amp-img></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>

         <div class="offcanvas-body">

            <!-- Mobile Menu Start Here -->
            <div class="mobile-nav">

               <div class="offcanvas-body">

                  <div>
                     <ul class="navbar-nav align-items-center">

                        <li class="nav-item dropdown w-100 w-lg-auto">
                           <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('translation.All_Stores') }}</a>
                           <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('stores', [$region, 'online'])}}">{{ __('translation.Online') }}</a></li>
                              <li><a class="dropdown-item" href="{{route('stores', [$region, 'retail'])}}">{{ __('translation.Retail') }}</a></li>
                           </ul>
                        </li>

                        <li class="nav-item dropdown w-100 w-lg-auto">
                           <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('translation.Categories') }}</a>
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
                                       <a class="dropdown-item dropdown-toggle nested-link" href="#" data-link="{{$val->id}}" role="button" data-bs-toggle="dropdown">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a>
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
                              <a class="nav-link" href="#" role="button" data-bs-toggle="modal" data-bs-target="#userModal">{{ __('translation.Sign_IN') }}</a>
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