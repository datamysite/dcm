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
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>Referal & Earn</a></strong></li>
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

                <div class="row mt-1" style="border-radius: 10px ; background-color:#F2F2F2;">

                    <h3 class="mb-2 mt-5">Your Unique Referal Link</h3>
                    <h5 class="mb-2 mt-5">How to use link ?</h5>
                    <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p></p>
                    <!-- col -->
                    <div class="col-6">
                        <div class="input-group ">
                            <input type="text" class="form-control rounded" name="referal_link" placeholder="https://dealsandcouponsmena.com/join.php?referal=58" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="submit" name="upload-file" class="btn btn-primary shadow-gray" value="Copy Link">
                    </div>
                    <p></p>
                </div>

                <div class="row mt-5" style="border-radius: 10px ; background-color:#F2F2F2;">

                    <h3 class="mb-2 mt-5">Invite By Email</h3>
                    <h5 class="mb-2 mt-5">How to use link ?</h5>
                    <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p></p>
                    <!-- col -->
                    <div class="col-6">
                        <div class="input-group ">
                            <input type="text" class="form-control rounded" name="email_link" placeholder="Enter Your Email ID" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="submit" name="upload-file" class="btn btn-primary shadow-gray" value="Send Invitation">
                    </div>
                    <p></p>
                </div>

                <div class="row mt-5" style="border-radius: 10px ; background-color:#F2F2F2;">

                    <h3 class="mb-2 mt-5">Invite By Social Media</h3>
                    <h5 class="mb-2 mt-5">How to use link ?</h5>
                    <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p></p>
                    <!-- col -->
                    <div class="col-12 text-center align-items-center">

                        <div class="">
                            <a href="#">
                                <img src="./public/web_assets/images/social-media/facebook.png" class="circle-image" style="display: inline-block; width:50px ; height:50px; margin-right: 20px;" alt="Facebook">
                            </a>
                            <a href="#">
                                <img src="./public/web_assets/images/social-media/whatsapp.png" class="circle-image" style="display: inline-block; width:50px ; height:50px; margin-right: 20px;" alt="Whatsapp">
                            </a>

                            <input type="submit" name="upload-file" class="btn btn-primary shadow-gray" value="Copy Link" style="display: inline-block; margin-right: 20px;">

                        </div>

                    </div>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- section end-->


@endsection