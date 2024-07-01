@extends('web.includes.master')

@section('content')

<div class="mt-110">
    <div class="container np-container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.password_rest_txt_01') }}</a></strong></li>
                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container np-container">
        <div class="dcm_banner" style="background:url({{URL::to('/')}}/public/web_assets/images/banner/dcm_banner.png) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center;height:350px">
            <h2 class="text-center" style="padding-top: 150px;color:#fff ;font-size:35px">{{ __('translation.password_rest_txt_01') }}</2>
        </div>

        <div class="dcm_banner_mobile">
            <h2 class="text-center" style="padding-top:40px;color:#fff">{{ __('translation.password_rest_txt_01') }}</2>
        </div>

    </div>
</section>
<!-- Slider Section End-->


<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-6 text-center">
            </div>
        </div>
    </div>
</section>

<!-- Password Reset section Start -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">

      

        <!-- row -->
        <div class="row" style="justify-content:center;">
            <div class="col-lg-10 col-10">

       

                <form action="{{route('user.updatePassword')}}" id="resetPasswordForm" class="form-control p-10">
                    @csrf
                    <input type="hidden" name="unique_id" value="{{base64_encode($id)}}">
                    <div class="input-group py-2">
                        <input class="form-control rounded " type="password" name="password" placeholder="{{ __('translation.password_rest_form_txt_02') }}" required="required" />
                        <label class="errors password_error"></label>

                    </div>

                    <div class="input-group py-2">
                        <input class="form-control rounded" type="password" name="password_confirmation" placeholder="{{ __('translation.password_rest_form_txt_03') }}" required="required" />
                        <label class="errors password_confirmation_error"></label>

                    </div>

                    <input type="submit" name="sing-up" class="btn btn-primary btn-sm mt-5" style="font-weight: lighter;padding: 5px 20px;margin: auto;display: flex;" value="{{ __('translation.password_rest_btn') }}">
                   
                    <div class="mb-8 mt-5">
                        <p>
                            <Strong style="color: red;">{{ __('translation.password_rest_form_txt_04') }} </Strong>{{ __('translation.password_rest_form_txt_05') }}
                        </p>
                    </div>

                </form>

            </div>
        </div>


    </div>
</section>

<!-- Password Reset section End -->


@endsection