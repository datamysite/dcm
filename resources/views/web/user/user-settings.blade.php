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
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>Home</strong></a></li>
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

                <form action="{{route('user.settings.update')}}" id="settings_update_form">
                    @csrf
                    <div class="row mt-5" style="background-color: #F2F2F2;border-radius: 10px">

                            <div class="col-lg-6">
                                <h4 class="mb-2 mt-5">Personal Details</h4>

                                    <div class="input-group py-2">
                                        <input class="form-control rounded " type="text" name="name" placeholder="Your Name" value="{{Auth::user()->name}}" required="required" />
                                        <label class="errors user_errors name_error"></label>

                                    </div>

                                    <div class="input-group py-2">
                                        <input class="form-control rounded" type="text" name="phone" placeholder="Your Phone Number" value="{{Auth::user()->phone}}" required="required" />
                                        <label class="errors user_errors phone_error"></label>

                                    </div>

                                    <div class="input-group py-2">
                                        <input class="form-control rounded" type="email" value="{{Auth::user()->email}}" disabled />
                                    </div>

                                    <div class="py-2">
                                        <input type="checkbox" id="other" name="newsletter" value="1" {{Auth::user()->newsletter == '1' ? 'checked' : ''}}><label for="other" style="padding-left: 5px;"> Receive email when I get referral earnings.</label><br>

                                    </div>
                            </div>

                            <div class="col-lg-6">
                                <h4 class="mb-2 mt-5">Change Password</h4>

                                <div class="input-group py-2">
                                    <input class="form-control rounded " type="password" name="current_password" placeholder="Current Password" />
                                    <label class="errors user_errors current_password_error"></label>

                                </div>

                                <div class="input-group py-2">
                                    <input class="form-control rounded" type="password" name="password" placeholder="New Password" />
                                    <label class="errors user_errors password_error"></label>

                                </div>

                                <div class="input-group py-2">
                                    <input class="form-control rounded" type="password" name="password_confirmation" placeholder="Confirm New Password" />
                                    <label class="errors user_errors password_confirmation_error"></label>
                                </div>

                                <div class="py-2">
                                    <input type="submit" name="sing-up" class="btn btn-primary shadow-gray" style="font-weight: lighter; float:right;" value="Save Changes">
                                </div>
                            </div>
                        <p></p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- section end-->


@endsection