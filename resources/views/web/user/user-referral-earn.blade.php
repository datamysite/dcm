@extends('web.includes.master')

@section('content')

<div class="breadcrumbMENU mt-110">
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

                <div class="row mt-1" style="color:#fff;background-color: #f0f3f2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A); ">

                    <h3 class="mb-2 mt-5" style="color: #fff;">Your Unique Referal Link</h3>
                    <h5 class="mb-2 mt-5" style="color: #fff;">How to use link ?</h5>
                    <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p></p>
                    <!-- col -->
                    <div class="col-8">
                        <div class="input-group ">
                            <input type="text" class="form-control rounded" id="copyClipboard" name="referal_link" value="{{route('user.referral.link', [base64_encode(Auth::id()), base64_encode(Auth::user()->email)])}}" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary shadow-gray copyLinkBtn" onclick="copy()"> Copy Link </button>
                    </div>
                    <p></p>
                </div>

                <div class="row mt-5" style="color:#fff;background-color: #f0f3f2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A); ">

                    <h3 class="mb-2 mt-5" style="color: #fff;">Invite By Email</h3>
                    <h5 class="mb-2 mt-5" style="color: #fff;">How to use link ?</h5>
                    <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p></p>
                    <!-- col -->
                    <div class="col-8">
                        <div class="input-group ">
                            <input type="text" class="form-control rounded" name="email_link" placeholder="Enter Your Email ID" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-4">
                        <input type="submit" name="upload-file" class="btn btn-primary shadow-gray" value="Send Invitation">
                    </div>
                    <p></p>
                </div>

                <div class="row mt-5" style="color:#fff;background-color: #f0f3f2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A); ">

                    <h3 class="mb-2 mt-5"  style="color: #fff">Invite By Social Media</h3>
                    <h5 class="mb-2 mt-5" style="color: #fff;">How to use link ?</h5>
                    <p class="mb-0 lead" >Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p></p>
                    <!-- col -->
                    <div class="col-12 text-center align-items-center">

                        <div class="">
                            <a href="#">
                                <img src="{{URL::to('/public/web_assets/images/emails')}}/facebook.png" class="circle-image" style="display: inline-block; width:30px ; height:30px; margin-right: 20px;mix-blend-mode:hard-light !important;filter:brightness(0.5) invert(1);" alt="Facebook">
                            </a>
                            <a href="#">
                                <img src="{{URL::to('/public/web_assets/images/emails')}}/whatsapp.png" class="circle-image" style="display: inline-block; width:30px ; height:30px; margin-right: 20px;mix-blend-mode:hard-light !important;filter:brightness(0.5) invert(1);" alt="Whatsapp">
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
@section('addScript')
    <script type="text/javascript" src="{{URL::to('/public/web_assets/js/profile.js')}}"></script>
    <script type="text/javascript">
        function copy() {
            let copyText = document.getElementById("copyClipboard");
            copyText.select();
            copyText.setSelectionRange(0, 99999); 
            navigator.clipboard.writeText(copyText.value);
          
            Toast.fire({
                icon: 'success',
                title: 'Link Copied!'
            });
        }
    </script>
@endsection