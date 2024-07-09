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
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}" style="color: #000;"><strong>{{ __('translation.dashboard') }}</strong></a></li>
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
            <div class="col-lg-8 m-1 pp-padding2">

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



                <form action="{{route('user.settings.bank_details')}}" method="POST">
                    @csrf
                    @if($data['bank_details'] !== null)
                    <input type="hidden" name="id" value="{{ $data['bank_details']->id }}" />
                    @endif
                    <div class="row mt-5" style="background-color: #F2F2F2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A);">

                        @if(session('success') || session('updated'))
                        <div class="row mt-2" style="justify-content:center;justify-items:center;">
                            <div class="col-lg-8 text-center" style="padding: 20px;border-radius:10px;background-color:#50C878;">
                                <span class="text-center" style="font-size: 17px;color:#fff;">{{ __('translation.success_bnk_msg') }}</b>
                            </div>
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="row mt-2" style="justify-content:center;justify-items:center;">
                            <div class="col-lg-8" style="padding: 20px;border-radius:10px;background-color:#FF7074;;">
                                <span class="text-center" style="font-size: 17px;color:#fff;">{{ __('translation.error_bnk_msg') }}</b>
                            </div>
                        </div>

                        @endif

                        <div class="col-lg-6" style="color: #fff !important;">
                            <h4 class="mb-2 mt-5" style="color: #fff;">{{ __('translation.bnk_account_details') }}</h4>
                            <div class="input-group py-2">
                                <select class="form-control rounded" name="bank_id" style="border-radius:10px;" required>
                                    <option value="">{{ __('translation.bnk_form_bnk_name') }}</option>
                                    @foreach ($data['bank_array'] as $bank)
                                        @if($data['bank_details'] !== null)
                                        <option value="{{ $bank['id'] }}" {{$data['bank_details']->bank_id == $bank['id'] ? 'selected' : ''}}>{!! app()->getLocale() == 'ar' ? $bank['bank_name_ar'] : $bank['bank_name'] !!}</option>
                                        @else
                                        <option value="{{ $bank['id'] }}">{!! app()->getLocale() == 'ar' ? $bank['bank_name_ar'] : $bank['bank_name'] !!}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group py-2">
                                <input class="form-control rounded " type="text" name="bnk_account_name" placeholder="{{ __('translation.bnk_form_account_holder_name') }}" value="{{ $data['bank_details'] !== null  ? $data['bank_details']->account_holder_name : '' }}" required="required" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="divider mt-1"></div>

                            <div class="input-group py-2 mt-0">
                                <input class="form-control rounded " type="text" name="bnk_iban" placeholder="{{ __('translation.bnk_form_bnk_iban') }}" value="{{ $data['bank_details'] !== null  ? $data['bank_details']->iban : '' }}" required="required" />
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="number" name="bnk_account_number" placeholder="{{ __('translation.bnk_form_bnk_account_number') }}" value="{{ $data['bank_details'] !== null  ? $data['bank_details']->account_number : '' }}" required="required" />
                            </div>

                            <div class="py-2">
                                <input type="submit" name="sing-up" class="btn btn-primary shadow-gray" style="font-weight: lighter; {!! app()->getLocale() == 'ar' ? 'float: left;' : 'float: right;' !!}" value="{{ $data['bank_details'] !== null ? __('translation.edit_information_btn') : __('translation.save_changes_btn_txt') }}">
                            </div>
                            <div class="divider"></div>
                            <br><br>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- section end-->


@endsection
@section('addScript')
<script type="text/javascript" src="{{URL::to('/public/web_assets/js/profile.js')}}"></script>
@endsection