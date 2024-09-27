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
               <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-label="Toggle navigation" style="height:36px; width: 36px;">
                  <amp-img src="{{URL::to('/public/web_assets/images/icons/menu.svg')}}" layout="fixed" width="36px" height="36px" alt="Menu"></amp-img>
               </button>
            </div>
         </div>
         <div class="nav-tray">

            <div class="tray-item tray-search">
               <div class="input-group  main-search-div">
                  <input class="form-control rounded mob-main-search" data-loader="{{URL::to('/public/loader-gif.gif')}}" id="navbar_tray_search_field" type="search" placeholder="{{ __('translation.Search') }}" />


                  <div class="mob-main-search-result" id="navbar_tray_search_result">
                  </div>
               </div>
            </div>

            
            <div class="tray-item tray-emirates">
               <div class="d-flex justify-content-between">
                  @foreach($allstates as $val)
                     <a href="{{route('setRegion', $val->slug)}}" class="selectEmirates {{$val->slug == $region ? 'active' : ''}}" data-id="{{base64_encode($val->id)}}">
                        <div class="header_card">
                           <img src="{{URL::to('/public/storage/states/'.$val->image)}}" alt="{{$val->name}}" />
                           {{$val->shortname}}
                        </div>
                     </a>
                  @endforeach
               </div>
            </div>
         </div>
      </div>

      <div class="mobile-footbar">
         <div class="list-inline d-flex ">
               <a href="{{route('home', [$region])}}" class="" data-option="home">
                  <amp-img src="{{URL::to('/public/web_assets/images/icons/home.svg')}}" layout="fixed" width="29px" height="29px" alt="Home Image"></amp-img>
                  {{ __('translation.Home') }}
               </a>

               <a href="#" class="mobile-nav-button" id="search_tray_btn">
                  <amp-img src="{{URL::to('/public/web_assets/images/icons/search.svg')}}" layout="fixed" width="29px" height="29px" alt="Search Image"></amp-img>
                  {{ __('translation.search_') }}
               </a>

               <a href="{{route('claim_cashback')}}" class="center-nav-mob" data-option="home">
                   <amp-img src="{{URL::to('/public/web_assets/images/icons/sell.svg')}}" layout="fixed" width="46px" height="46px" style="margin-bottom: 6px;" alt="Sell_With_DCM Image"></amp-img>
                  {{ __('translation.Earn_Cashback') }}
               </a>

               <a href="{{route('Sell_With_DCM', [$region])}}" class="mobile-nav-button">
                   <amp-img src="{{URL::to('/public/web_assets/images/icons/emirates-a.svg')}}" layout="fixed" width="29px" height="29px" alt="Emirates Image"></amp-img>
                  {{ __('translation.Sell_With_us') }}
               </a>

               @if(Auth::check())
                  <a href="{{route('user.profile')}}">
                      <amp-img src="{{URL::to('/public/web_assets/images/icons/profile.svg')}}" layout="fixed" width="29px" height="29px" alt="Profile Image"></amp-img>
                     {{ __('translation.Profile') }}
                  </a>
               @else
                  <a href="#" class="signInModal" data-option="login">
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
                <nav class="nav">
                    <ul class="label">
                        <li class="nav-item nav-dropdown">
                            <amp-accordion layout="container" disable-session-states class="dropdown">
                                <section>
                                    <header style="background-color: #f0f3f2;border:none;">{{ __('translation.All_Stores') }}</header>
                                    <ul class="dropdown-items">
                                        <li class="dropdown-item">
                                            <a href="{{route('stores', [$region, 'online'])}}">{{ __('translation.Online') }}</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="{{route('stores', [$region, 'retail'])}}">{{ __('translation.Retail') }}</a>
                                        </li>
                                    </ul>
                                </section>
                            </amp-accordion>
                        </li>
                        <li class="nav-item nav-dropdown">
                            <amp-accordion layout="container" disable-session-states class="dropdown">
                                <section>
                                    <header style="background-color: #f0f3f2;border:none;">{{ __('translation.Categories') }}</header>
                                    <ul class="dropdown-items">
                                       @foreach($navbarCategories as $val)
                                          <li class="dropdown-item">
                                             @php
                                                $string = strtolower(trim($val->name));
                                                 $string = str_replace('&', 'and', $string);
                                                 $string = str_replace(' ', '-', $string);
                                                 $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                                             @endphp
                                             @if($val->type == 3)
                                                <amp-accordion layout="container" disable-session-states class="dropdown">
                                                  <section>
                                                      <header style="background-color: #fff;border:none;">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</header>
                                                      <ul class="dropdown-items">
                                                          <li><a class="dropdown-item" href="{{URL::to('/'.app()->getLocale().'/'.$slug.'/online')}}">{{ __('translation.Online') }}</a></li>
                                                         <li><a class="dropdown-item" href="{{URL::to('/'.app()->getLocale().'/'.$slug.'/retail')}}">{{ __('translation.Retail') }}</a></li>
                                                      </ul>
                                                  </section>
                                                </amp-accordion>     
                                             @else
                                                <a href="{{route('category', [$region, $slug])}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a>

                                             @endif
                                          </li>
                                       @endforeach
                                    </ul>
                                </section>
                            </amp-accordion>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('About_Us', [$region])}}">{{ __('translation.About_Us') }}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('Sell_With_DCM', [$region])}}">{{ __('translation.Sell_With_DCM') }}</a>
                        </li>

                        @if(Auth::check())
                           <li class="nav-item">
                               <a href="{{route('user.logout', [$region])}}">{{ __('translation.Logout') }}</a>
                           </li>
                        @else
                           <li class="nav-item">
                               <a href="{{route('Sell_With_DCM', [$region])}}">{{ __('translation.Sign_IN') }}</a>
                           </li>
                        @endif

                     </ul>
                </nav>
            <div style="width: 100%; text-align: center;">
               <button type="button" class="menu-close">Close</button>
            </div>
         </div>
      </div>
   </nav>