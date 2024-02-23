
   <div class="">
      <div class="mobile-navbar">
         <div class="list-inline d-flex ">

            <div class="justify-content-center w-100 d-lg-none">
               <a class="navbar-brand" href="{{route('home')}}">
                  <img src="{{URL::to('/public')}}/web_assets/images/logo/m-logo.png" alt="dealsandcouponsmena" style="width: 140px;" />
               </a>
            </div>

            <div class="d-flex align-items-center" style="padding: 10px;">
               <i class="bi bi-globe"></i>&nbsp;&nbsp;
               <span><b>ENG</b></span>
            </div>

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
               <div class="input-group">
                  <input class="form-control rounded" type="search" placeholder="Search..." />
                  <span class="input-group-append">
                     <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                           <circle cx="11" cy="11" r="8"></circle>
                           <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                     </button>
                  </span>
               </div>
            </div>

            
            <div class="tray-item tray-emirates">
               <div class="header_card">
                  <img src="{{URL::to('/public')}}/web_assets/images/emirates/abu-dhabi.png" alt="Abu Dhabi" />
                  AUH
               </div>

               <div class="header_card">
                  <img src="{{URL::to('/public')}}/web_assets/images/emirates/dubai.png" alt="DUBAI" />
                  DXB
               </div>

               <div class="header_card">
                  <img src="{{URL::to('/public')}}/web_assets/images/emirates/sharjah.png" alt="SHARJAH" />
                  SHJ
               </div>

               <div class="header_card">
                  <img src="{{URL::to('/public')}}/web_assets/images/emirates/fujairah.png" alt="FUJAIRAH" />
                  FUJ
               </div>

               <div class="header_card">
                  <img src="{{URL::to('/public')}}/web_assets/images/emirates/ajman.png" alt="AJMAN" />
                  AJM
               </div>

               <div class="header_card">
                  <img src="{{URL::to('/public')}}/web_assets/images/emirates/umm_alquwain.png" alt="UMM AL QUWAIN" />
                  UAQ
               </div>

               <div class="header_card">
                  <img src="{{URL::to('/public')}}/web_assets/images/emirates/ras_alkaimah.png" alt="RAS AL KHAIMAH" />
                  RAK
               </div>
            </div>
         </div>
      </div>

      <div class="mobile-footbar">
         <div class="list-inline d-flex ">
               <a href="{{route('home')}}" class="" data-option="home">
                  <i class="fa fa-home"></i>
                  Home
               </a>

               <a href="javascript:void(0)" class="mobile-nav-button" data-option="search">
                  <i class="fa fa-search"></i>
                  Search
               </a>

               <a href="{{route('Sell_With_DCM')}}" class="" data-option="home">
                  <i class="fa fa-bullseye"></i>
                  Sell with Us
               </a>

               <a href="javascript:void(0)" class="mobile-nav-button" data-option="emirates">
                  <i class="fa fa-crosshairs"></i>
                  All Emirates
               </a>

               @if(Auth::check())
                  <a href="{{route('user.profile')}}">
                     <i class="fa fa-user-o"></i>
                     Profile
                  </a>
               @else
                  <a href="javascript:void(0)" class="" data-option="login"  data-bs-toggle="modal" data-bs-target="#userModal">
                     <i class="fa fa-user-circle-o"></i>
                     Sign In
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

                     <li class="nav-item dropdown" style="padding: 10px;">

                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">All Stores</a>

                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="{{route('stores', 'online')}}">Online</a></li>
                           <li><a class="dropdown-item" href="{{route('stores', 'retail')}}">Retail</a></li>
                        </ul>

                     </li>



                     <li class="nav-item dropdown w-100 w-lg-auto" style="padding: 10px;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>

                        <ul class="dropdown-menu">

                           @foreach($navbarCategories as $val)
                              @php
                                 $string = strtolower(trim($val->name));
                                  $string = str_replace('&', 'and', $string);
                                  $string = str_replace(' ', '-', $string);
                                  $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                              @endphp
                              @if($val->type == 3)
                                 <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$val->name}}</a>
                                    <ul class="dropdown-menu">

                                       <li><a class="dropdown-item" href="{{route('category.sub', [$slug, 'online'])}}">Online</a></li>
                                       <li><a class="dropdown-item" href="{{route('category.sub', [$slug, 'retail'])}}">Retail</a></li>

                                    </ul>
                                 </li>
                              @else
                                 <li><a class="dropdown-item" href="{{route('category', $slug)}}">{{$val->name}}</a></li>
                              @endif
                           @endforeach

                           
                        </ul>
                     </li>

                     <li class="nav-item dropdown" style="padding: 10px;">
                        <a class="nav-link" href="{{route('About_Us')}}" role="button" aria-expanded="false">About Us</a>
                     </li>
                  </ul>
                  <form class="ms-auto d-flex align-items-center" style="padding: 10px;">
                     <div class="input-group main-search-div">
                        <input class="form-control main-search" type="text" placeholder="Search..." style="width: 420px;">
                        <span class="input-group-append">
                           <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="button">
                              <i class="fa fa-search"></i>
                           </button>
                        </span>

                        <div class="main-search-result">
                        </div>
                     </div>
                  </form>

                  <ul class="navbar-nav">
                     <li class="nav-item dropdown" style="padding: 10px;">
                        <a class="nav-link" href="{{route('Sell_With_DCM')}}" role="button" aria-expanded="false"><b>SELL WITH DCM</b></a>
                     </li>
                     <ul class="navbar-nav">

                        @if(Auth::check())
                           <li class="nav-item dropdown" style="padding: 10px;">
                              <a class="nav-link" href="{{route('user.profile')}}" role="button" aria-expanded="false"><b>Profile</b></a>
                           </li>
                        @else
                           <li class="nav-item dropdown" style="padding: 10px;">
                              <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="modal" data-bs-target="#userModal"><b>SIGN IN</b></a>
                           </li>
                        @endif

                        <div class="nav-link ms-3 d-flex align-items-center" style="padding: 10px;">
                           <i class="bi bi-globe"></i>&nbsp;&nbsp;
                           <span><b>ENG</b></span>
                        </div>

                     </ul>
               </div>

            </div>
            <!-- Desktop Menu End Here -->

            <!-- Mobile Menu Start Here -->
            <div class="mobile-nav">

               <div class="offcanvas-body">

                  <div>
                     <ul class="navbar-nav align-items-center">

                        <li class="nav-item dropdown w-100 w-lg-auto">
                           <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">All Stores</a>
                           <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('stores', 'online')}}">Online</a></li>
                              <li><a class="dropdown-item" href="{{route('stores', 'retail')}}">Retail</a></li>
                           </ul>
                        </li>

                        <li class="nav-item dropdown w-100 w-lg-auto">
                           <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                           <ul class="dropdown-menu">
                              @foreach($navbarCategories as $val)
                                 @php
                                    $string = strtolower(trim($val->name));
                                     $string = str_replace('&', 'and', $string);
                                     $string = str_replace(' ', '-', $string);
                                     $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                                 @endphp
                                 @if($val->type == 3)
                                    <li class="dropdown-submenu dropend mob-nav">
                                       <a class="dropdown-item dropdown-toggle nested-link" href="javascript:void(0)" data-link="{{$val->id}}" role="button" data-bs-toggle="dropdown">{{$val->name}}</a>
                                       <ul class="dropdown-menu cat_{{$val->id}}">

                                          <li><a class="dropdown-item" href="{{route('category.sub', [$slug, 'online'])}}">Online</a></li>
                                          <li><a class="dropdown-item" href="{{route('category.sub', [$slug, 'retail'])}}">Retail</a></li>

                                       </ul>
                                    </li>
                                 @else
                                    <li><a class="dropdown-item" href="{{route('category', $slug)}}">{{$val->name}}</a></li>
                                 @endif
                              @endforeach
                           </ul>
                        </li>

                        <li class="nav-item w-100 w-lg-auto">
                           <a class="nav-link" href="{{route('About_Us')}}">About Us</a>
                        </li>

                        <li class="nav-item w-100 w-lg-auto">
                           <a class="nav-link" href="{{route('Sell_With_DCM')}}">SELL WITH DCM</a>
                        </li>

                        @if(Auth::check())
                           <li class="nav-item w-100 w-lg-auto dropdown">
                              <a class="nav-link" href="{{route('user.logout')}}">Logout</a>
                           </li>
                        @else

                           <li class="nav-item w-100 w-lg-auto">
                              <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="modal" data-bs-target="#userModal">SIGN IN</a>
                           </li>
                        @endif

                        <li>
                           <button type="button" class="btn btn-primary menu-close" data-bs-dismiss="offcanvas">Close</button>
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