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
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.profile')}}" style="color: #000;"><strong>{{ __('translation.Profile') }} </strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.referal_earn') }}</a></strong></li>
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

                    <h4 class="mb-2 mt-5" style="color: #fff;">{{ __('translation.referal_how_it_wors') }}</h4>

                    <li class="mb-0 lead">{{ __('translation.referal_how_it_wors_txt_1') }}</li>
                    <li class="mb-0 lead">{{ __('translation.referal_how_it_wors_txt_2') }}</li>
                    <li class="mb-0 lead">{{ __('translation.referal_how_it_wors_txt_3') }}</li>
                    <p></p>
                    <h4 class="mb-2 mt-0" style="color: #fff;">{{ __('translation.referal_terms_txt') }}</h4>
                    <p>
                        {{ __('translation.referal_terms_txt_1') }}
                        {{ __('translation.referal_terms_txt_2') }}
                        {{ __('translation.referal_terms_txt_3') }} <a href="{{route('Terms', [$region])}}" style="color: #fff;" target="_blank"><strong>{{ __('translation.referal_terms_txt_4') }}</strong></a> {{ __('translation.referal_terms_txt_5') }}
                    </p>

                </div>

                <div class="row mt-5" style="color:#fff;background-color: #f0f3f2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A); ">

                    <h4 class="mb-2 mt-5" style="color: #fff;">{{ __('translation.referal_link_txt') }}</h4>
                    <!-- <h5 class="mb-2 mt-5" style="color: #fff;">How to use link ?</h5> -->
                    <p class="mb-0 lead">{{ __('translation.referal_how_it_wors_txt_1') }}</p>
                    <p></p>
                    <!-- col -->
                    <div class="col-8">
                        <div class="input-group ">
                            <input type="text" class="form-control rounded" id="copyClipboard" name="referal_link" value="{{route('home', [$region])}}?ref=signup&referal_link={{base64_encode(Auth::user()->email)}}" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary shadow-gray copyLinkBtn" onclick="copy()"> {{ __('translation.referal_copy_link_txt') }}</button>
                    </div>
                    <p></p>
                </div>

                <div class="row mt-5" style="color:#fff;background-color: #f0f3f2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A); ">

                    <h4 class="mb-2 mt-5" style="color: #fff;">{{ __('translation.referal_invite_by_email_txt') }}</h4>

                    <p class="mb-0 lead">{{ __('translation.referal_invite_by_email_txt_1') }}</p>
                    <p></p>
                    <!-- col -->
                    <div class="col-8">
                        <div class="input-group ">
                            <input type="text" class="form-control rounded" name="email_link" placeholder="Enter Your Email ID" required="required">
                        </div>
                    </div>
                    <div class="col-4">
                        <input type="submit" name="upload-file" class="btn btn-primary shadow-gray" value="Invite">
                    </div>
                    <p></p>
                </div>

                <div class="row mt-5" style="color:#fff;background-color: #f0f3f2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A); ">

                    <h4 class="mb-2 mt-5" style="color: #fff">{{ __('translation.referal_invite_s_media_txt') }}</h4>
                    <p class="mb-0 lead">{{ __('translation.referal_invite_s_media_txt_2') }}</p>
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
                            <input type="submit" name="upload-file" class="btn btn-primary shadow-gray" value="{{ __('translation.referal_copy_link_txt') }}" onclick="copy()"  style="display: inline-block; margin-right: 20px;">

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