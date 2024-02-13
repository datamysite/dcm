<div class="">
   <div class="container">
      <div class="mobile-navbar">

<<<<<<< HEAD
=======
         <div class="col-xxl-2 col-lg-3 col-md-6 col-5">

            <div class="d-flex justify-content-between w-100 d-lg-none">
               <a class="navbar-brand" href="Home">
                  <img src="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" alt="dealsandcouponsmena" style="height: 50px; width: 50px;" />
               </a>
            </div>
         </div>

         <div class="col-lg-2 col-xxl-2 text-end col-md-6 col-7">
>>>>>>> 35c50490037fc6395cb9695ed93d55dd75a887c5
            <div class="list-inline">

               <div class="list-inline-item d-inline-block d-lg-none">
                  <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-label="Toggle navigation">
                     <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#1DACE3" class="bi bi-text-indent-left text-primary" viewBox="0 0 16 16">
                        <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                     </svg>
                  </button>
               </div>

               <div class="d-flex justify-content-center w-100 d-lg-none">
                  <a class="navbar-brand" href="{{route('home')}}">
                     <img src="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" alt="dealsandcouponsmena" style="height: 135px; width: auto;" />
                  </a>
               </div>
            </div>
      </div>
   </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light navbar-default py-0" aria-label="Offcanvas navbar large">
   <div class="container">

      <div class="offcanvas offcanvas-start" tabindex="-1" id="navbar-default" aria-labelledby="navbar-defaultLabel">
         <div class="offcanvas-header pb-1">
            <a href="Home"><img src="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" width="50px" height="50px" alt="DCM" /></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>

         <div class="offcanvas-body">

            <!-- Desktop Menu Start Here -->
            <div class="d-flex align-items-center">
               <a class="desktop-navbar-brand" href="Home">
                  <img src="{{URL::to('/public')}}/web_assets/images/logo/logo-DCM.png" alt="Logo" width="90px" height="50px">
               </a>
            </div>

            <div class="desktop-nav">

               <div class="d-flex align-items-center text-center">
                  <ul class="navbar-nav">

                     <li class="nav-item dropdown" style="padding: 10px;">

                        <a class="nav-link dropdown-toggle" href="Home#all-stores" role="button" data-bs-toggle="dropdown" aria-expanded="false">All Stores</a>

                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="Categoires?category=AllStores">Online</a></li>
                           <li><a class="dropdown-item" href="Categoires?category=AllStores">Retail</a></li>
                        </ul>

                     </li>



                     <li class="nav-item dropdown w-100 w-lg-auto" style="padding: 10px;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>

                        <ul class="dropdown-menu">

                           <li class="dropdown-submenu dropend">
                              <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mart</a>
                              <ul class="dropdown-menu">

                                 <li><a class="dropdown-item" href="Categoires?category=Online">Online</a></li>
                                 <li><a class="dropdown-item" href="Categoires?category=Offline">Retail</a></li>

                              </ul>
                           </li>

                           <li class="dropdown-submenu dropend">
                              <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fashions</a>
                              <ul class="dropdown-menu">

                                 <li><a class="dropdown-item" href="Categoires?category=Online">Online</a></li>
                                 <li><a class="dropdown-item" href="Categoires?category=Offline">Retail</a></li>

                              </ul>
                           </li>

                           <li class="dropdown-submenu dropend">
                              <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Beauty & Wellness</a>
                              <ul class="dropdown-menu">

                                 <li><a class="dropdown-item" href="Categoires?category=Online">Online</a></li>
                                 <li><a class="dropdown-item" href="Categoires?category=Offline">Retail</a></li>

                              </ul>
                           </li>

                           <li class="dropdown-submenu dropend">
                              <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Decor</a>
                              <ul class="dropdown-menu">

                                 <li><a class="dropdown-item" href="Categoires?category=Online">Online</a></li>
                                 <li><a class="dropdown-item" href="Categoires?category=Offline">Retail</a></li>

                              </ul>
                           </li>


                           <li class="dropdown-submenu dropend">
                              <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kids</a>
                              <ul class="dropdown-menu">

                                 <li><a class="dropdown-item" href="Categoires?category=Online">Online</a></li>
                                 <li><a class="dropdown-item" href="Categoires?category=Offline">Retail</a></li>

                              </ul>
                           </li>

                           <li class="dropdown-submenu dropend">
                              <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sports</a>
                              <ul class="dropdown-menu">

                                 <li><a class="dropdown-item" href="Categoires?category=Online">Online</a></li>
                                 <li><a class="dropdown-item" href="Categoires?category=Offline">Retail</a></li>

                              </ul>
                           </li>

                           <li><a class="dropdown-item" href="Categoires?category=Home-Services">Home Services</a></li>
                           <li><a class="dropdown-item" href="Categoires?category=Maintenance">Maintenance & Repairs</a></li>
                           <li><a class="dropdown-item" href="Categoires?category=Entertainment">Entertainment</a></li>
                           <li><a class="dropdown-item" href="Categoires?category=Business">Business</a></li>
                           <li><a class="dropdown-item" href="Categoires?category=Food">Food & Dine In</a></li>
                        </ul>
                     </li>

                     <li class="nav-item dropdown" style="padding: 10px;">
                        <a class="nav-link" href="About-Us" role="button" aria-expanded="false">About Us</a>
                     </li>
                  </ul>
                  <form class="ms-auto d-flex align-items-center" style="padding: 10px;">
                     <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search..." style="width: 420px;">
                        <span class="input-group-append">
                           <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="button">
                              <i class="fa fa-search"></i>
                           </button>
                        </span>
                     </div>
                  </form>

                  <ul class="navbar-nav">
                     <li class="nav-item dropdown" style="padding: 10px;">
                        <a class="nav-link" href="Sell-With-DCM" role="button" aria-expanded="false"><b>SELL WITH DCM</b></a>
                     </li>
                     <ul class="navbar-nav">
                        <li class="nav-item dropdown" style="padding: 10px;">
                           <a class="nav-link" href="#" role="button" data-bs-toggle="modal" data-bs-target="#userModal"><b>SIGN UP</b></a>
                        </li>


                        <li class="nav-item dropdown" style="padding: 10px;">
                           <a class="nav-link" href="User-Profile" role="button" aria-expanded="false"><b>Profile</b></a>
                        </li>

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
                  <div class="d-block d-lg-none mb-4">
                     <form action="#">
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
                     </form>

                  </div>
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
                        All Emirates
                     </a>
                     <div class="collapse mt-2" id="collapseExample">
                        <div class="card card-body">
                           <ul class="mb-0 list-unstyled">
                              <li><a class="dropdown-item" href="#">DUBAI</a></li>
                              <li><a class="dropdown-item" href="#">ABU DAHBI</a></li>
                              <li><a class="dropdown-item" href="#">SHARJAH</a></li>
                              <li><a class="dropdown-item" href="#">AJMAN</a></li>
                              <li><a class="dropdown-item" href="#">UMM ALQUWAIN</a></li>
                              <li><a class="dropdown-item" href="#">RAS AL KHAIMAH</a></li>
                              <li><a class="dropdown-item" href="#">FUJAIRA</a></li>

                           </ul>
                        </div>
                     </div>
                  </div>

                  <div>
                     <ul class="navbar-nav align-items-center">

                        <li class="nav-item dropdown w-100 w-lg-auto">
                           <a class="nav-link dropdown-toggle" href="Home#all-stores" role="button" data-bs-toggle="dropdown" aria-expanded="false">All Stores</a>
                           <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="Categoires.php?category=AllStores">Online</a></li>
                              <li><a class="dropdown-item" href="Categoires.php?category=AllStores">Retail</a></li>
                           </ul>
                        </li>

                        <li class="nav-item dropdown w-100 w-lg-auto">
                           <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                           <ul class="dropdown-menu">

                              <li><a class="dropdown-item" href="Categoires?category=Online">Mart</a></li>
                              <li><a class="dropdown-item" href="Categoires?category=Online">Fashion & Accessories</a></li>
                              <li><a class="dropdown-item" href="Categoires?category=Online">Beauty & Wellness</a></li>
                              <li><a class="dropdown-item" href="Categoires?category=Online">Decor</a></li>
                              <li><a class="dropdown-item" href="Categoires?category=Online">Kids</a></li>
                              <li><a class="dropdown-item" href="Categoires?category=Online">Sports</a></li>
                              <li><a class="dropdown-item" href="Categoires?category=Online">Home Services</a></li>
                              <li><a class="dropdown-item" href="Categoires?category=Online">Maintains & Repairs</a></li>
                              <li><a class="dropdown-item" href="Categoires?category=Online">Entertainment</a></li>
                              <li><a class="dropdown-item" href="Categoires?category=Online">Business</a></li>
                              <li><a class="dropdown-item" href="Categoires?category=Online">Food & Dine In</a></li>

                           </ul>
                        </li>

                        <li class="nav-item w-100 w-lg-auto">
                           <a class="nav-link" href="About-Us">About Us</a>
                        </li>

                        <li class="nav-item w-100 w-lg-auto">
                           <a class="nav-link" href="Sell-With-DCM">SELL WITH DCM</a>
                        </li>

                        <li class="nav-item w-100 w-lg-auto">
                           <a class="nav-link" href="#" id="userModalLabel">SIGN UP</a>
                        </li>


                        <li class="nav-item w-100 w-lg-auto dropdown">
                           <a class="nav-link" href="User-Profile">Profile</a>
                        </li>

                        <div class="nav-item w-100 w-lg-auto">
                           <span class="me-2">ENG</span>
                           <i class="bi bi-globe"></i>
                        </div>

                     </ul>
                  </div>

               </div>

            </div>
            <!-- Mobile Menu End Here -->

         </div>
      </div>
   </div>
</nav>