<div class="row col-lg-3 m-1">
        <!-- col -->
        <div class="text-center" style="background-color: #f0f3f2;border-radius: 10px">
            <div class="mt-5">
                <!-- heading -->
                <h6>PROFILE</h6>
            </div>

            <div class="row">
                <div class="col">
                    <img src="{{URL::to('/public')}}/web_assets/images/reviews/male/1.png" alt="Circle Image" class="circle-image">
                </div>
                <div class="mt-2">
                    <h6>{{Auth::user()->name}}</h6>
                    <span>{{Auth::user()->email}}</span>
                    <br><br>
                </div>
            </div>
        </div>



        <div class="mt-5" style="background-color: #f0f3f2;border-radius: 10px">

            <div class="user-nav-mobile">

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
                        Menu 
                    </a>
                    <div class="collapse mt-2" id="collapseExample">
                        <div class="card card-body">
                            <ul class="mb-0 list-unstyled">
                                <li><a class="dropdown-item" href="{{route('user.claimCashback')}}">Claim Cashback</a></li>
                                <li><a class="dropdown-item" href="{{route('user.paymenyHistory')}}">Payment History</a></li>
                              <!--   <li><a class="dropdown-item" href="{{route('user.referralEarn')}}">Refer & Earn</a></li> -->
                                <li><a class="dropdown-item" href="{{route('user.withdrawPayment')}}">Withdraw Payment</a></li>
                                <li><a class="dropdown-item" href="{{route('user.settings')}}">Settings</a></li>
                                <li><a class="dropdown-item" href="{{route('user.logout')}}">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="user-nav-desktop">

                <div class="row">
                    <div class="nav nav-category" id="categoryCollapseMenu">
                        <ul>
                            <li class="nav-item border-bottom w-100"><a href="{{route('user.claimCashback')}}" class="nav-link collapsed">Claim Cashback</a></li>
                            <li class="nav-item border-bottom"><a href="{{route('user.paymenyHistory')}}" class="nav-link collapsed">Payment History</a></li>
                            <!-- <li class="nav-item border-bottom"><a href="{{route('user.referralEarn')}}" class="nav-link collapsed">Refer & Earn</a></li> -->
                            <li class="nav-item border-bottom"><a href="{{route('user.withdrawPayment')}}" class="nav-link collapsed">Withdraw Payment</a></li>
                            <li class="nav-item border-bottom"><a href="{{route('user.settings')}}" class="nav-link collapsed">Settings</a></li>
                            <li class="nav-item border-bottom"><a href="{{route('user.logout')}}" class="nav-link collapsed"><b>Log Out</b></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>