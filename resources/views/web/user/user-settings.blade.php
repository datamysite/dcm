@extends('web.includes.master')

@section('content')

<div class="mt-110">
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.profile')}}" style="color: #000;"><strong>Profile</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>Settings</a></strong></li>
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

                <div class="row" style="background-color: #F2F2F2;border-radius: 10px">
                    <h4 class="mb-5 mt-5"> <b>SETTINGS</b></h4>
                </div>

                <div class="row mt-5" style="background-color: #F2F2F2;border-radius: 10px">

                    <div class="col-lg-6">
                        <h4 class="mb-2 mt-5">Personal Details</h4>
                        <form action="#">

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="text" name="user_name" placeholder="Your Name" required="required" />

                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded" type="text" name="user_phone" placeholder="Your Phone Number" required="required" />

                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded" type="email" name="user_email" placeholder="Your Email" required="required" />
                            </div>

                            <div class="py-2">
                                <input type="radio" id="other" name="other" value="other"><label for="other" style="padding-left: 5px;"> Receive email when I get referral earnings.</label><br>

                            </div>
                    </div>

                    <div class="col-lg-6">
                        <h4 class="mb-2 mt-5">Change Password</h4>

                        <div class="input-group py-2">
                            <input class="form-control rounded " type="password" name="current_password" placeholder="Current Password" required="required" />

                        </div>

                        <div class="input-group py-2">
                            <input class="form-control rounded" type="password" name="new_password" placeholder="New Password" required="required" />

                        </div>

                        <div class="input-group py-2">
                            <input class="form-control rounded" type="password" name="new_password" placeholder="Confirm New Password" required="required" />
                        </div>

                        <div class="py-2">
                            <input type="submit" name="sing-up" class="btn btn-primary shadow-gray" style="font-weight: lighter; float:right;" value="Save Changes">
                        </div>
                        </form>
                    </div>
                    <p></p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- section end-->


@endsection