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
                        <li class="breadcrumb-item"><a href="{{route('user.profile')}}" style="color: #000;"><strong>{{ __('translation.Profile') }}</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.settings_menu') }}</a></strong></li>
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

                <div class="row" style="background-color: #F2F2F2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A);">
                    <h4 class="mb-5 mt-5"> <b style="color: #fff;">{{ __('translation.user_settings_txt') }} </b></h4>
                </div>

                <form action="{{route('user.settings.update')}}" id="settings_update_form">
                    @csrf
                    <div class="row mt-5" style="background-color: #F2F2F2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A);">

                        <div class="col-lg-6" style="color: #fff !important;">
                            <h4 class="mb-2 mt-5" style="color: #fff;">{{ __('translation.user_personal_details_txt') }}</h4>

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="text" name="name" placeholder="{{ __('translation.user_form_txt_01') }}" value="{{Auth::user()->name}}" required="required" />
                                <label class="errors user_errors name_error"></label>

                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded" type="text" name="phone" placeholder="{{ __('translation.user_form_txt_02') }}" value="{{Auth::user()->phone}}" required="required" />
                                <label class="errors user_errors phone_error"></label>

                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded" type="email" value="{{Auth::user()->email}}" disabled />
                            </div>

                            <div class="py-2">
                                <input type="checkbox" id="other" name="newsletter" value="1" {{Auth::user()->newsletter == '1' ? 'checked' : ''}}><label for="other" {!! app()->getLocale() == 'ar' ? 'style="padding-right: 10px;"' : 'style="padding-left: 5px;"' !!}> {{ __('translation.user_form_txt_05') }}</label><br>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <h4 class="mb-2 mt-5" style="color: #fff;">{{ __('translation.user_change_pass_txt') }}</h4>

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="password" name="current_password" placeholder="{{ __('translation.user_form_txt_06') }}" />
                                <label class="errors user_errors current_password_error"></label>

                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded" type="password" name="password" placeholder="{{ __('translation.user_form_txt_07') }}" />
                                <label class="errors user_errors password_error"></label>

                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded" type="password" name="password_confirmation" placeholder="{{ __('translation.user_form_txt_08') }}" />
                                <label class="errors user_errors password_confirmation_error"></label>
                            </div>

                            <div class="py-2">
                                <input type="submit" name="sing-up" class="btn btn-primary shadow-gray" style="font-weight: lighter; {!! app()->getLocale() == 'ar' ? 'float: left;' : 'float: right;' !!}" value="{{ __('translation.save_changes_btn_txt') }}">
                            </div>
                        </div>
                        <p></p>
                    </div>
                </form>

                <!-- <form action="{{route('user.settings.bank_details')}}" method="POST">
                  
                    @csrf -->
                    <div class="row mt-5" style="background-color: #F2F2F2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A);">
                        <div class="col-lg-6"  style="color: #fff !important;">
                            <h4 class="mb-2 mt-5"  style="color: #fff;">{{ __('translation.bnk_account_details') }}</h4>
                            <div class="input-group py-2">
                                <select class="form-control rounded" name="bank_id" style="border-radius:10px;" required>
                                    <option value="">{{ __('translation.bnk_form_bnk_name') }}</option>
                                    <option value="1">Bank 1</option>
                                    <option value="2">Bank 2</option>
                                    <option value="3">Bank 3</option>
                                    <option value="4">Bank 4</option>
                                    <option value="5">Bank 5</option>
                                </select>
                               
                            </div>
                            <div class="input-group py-2">
                                <input class="form-control rounded " type="text" name="bnk_account_name" placeholder="{{ __('translation.bnk_form_account_holder_name') }}" value="" required="required" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="divider mt-1"></div>

                            <div class="input-group py-2 mt-0">
                                <input class="form-control rounded " type="text" name="bnk_iban" placeholder="{{ __('translation.bnk_form_bnk_iban') }}" value="" required="required" />
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="text" name="bnk_account_number" placeholder="{{ __('translation.bnk_form_bnk_account_number') }}" value="" required="required" />
                            </div>

                            <div class="py-2">
                                <input type="submit" name="sing-up" class="btn btn-primary shadow-gray" style="font-weight: lighter; {!! app()->getLocale() == 'ar' ? 'float: left;' : 'float: right;' !!}" value="{{ __('translation.save_changes_btn_txt') }}">
                            </div>
                            <div class="divider"></div>
                        </div>

                    </div>
                <!-- </form> -->
            </div>

        </div>
    </div>
</div>
<!-- section end-->


@endsection
@section('addScript')
<script type="text/javascript" src="{{URL::to('/public/web_assets/js/profile.js')}}"></script>
@endsection