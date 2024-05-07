@extends('web.includes.master')

@section('content')


<section class="mt-110">
        <div class="container np-container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <!-- breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.Sell_With_DCM') }}</a></strong></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</section>

    <div class="sell_whatsapp">
        <a href="https://api.whatsapp.com/send/?phone=97142957001" onclick="return gtag_report_conversion('https://api.whatsapp.com/send/?phone=97142957001');"><img src="{{URL::to('/public/wt.png')}}">&nbsp;&nbsp;{{ __('translation.Contact Us') }}</a>
    </div>
    <!-- registration section Start Here -->
    <section class="my-lg-5 my-8">
        <!-- container -->
        <div class="container np-container">


            <div class="row mb-10">

                <div class="col-lg-6">
                    <!-- text -->
                    <div class="text-center text-md-start">
                        <h1 class="mb-6">{{ __('translation.dcm_page_title_text01') }}</h1>
                        <p class="mb-0 lead">{{ __('translation.dcm_page_title_text02') }}</p>
                     
                    </div>

                    <div class="mb-5" style="border-radius: 10px;">
                        <!-- img -->
                        <p></p>
                        <img src="{{URL::to('/public/web_assets/images/Adv/sell1.png')}}" alt="" class="img-fluid w-90 rounded" />
                    </div>

                </div>

                <div class="col-lg-6">
                    <!-- text -->
                    <div class="" style="border-radius: 10px;">

                        <form class="form-control p-10" id="lead_form" action="{{route('lead.generation', [$region])}}">
                            @csrf
                            <div class="input-group py-2">
                                <input class="form-control rounded " type="text" name="business_name" placeholder="{{ __('translation.business_name') }}" />
                                <label class="errors lead-errors business_name_error"></label>
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded" type="text" name="business_address" placeholder="{{ __('translation.business_address') }}"  />
                                <label class="errors lead-errors business_address_error"></label>
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="text" name="first_name" placeholder="{{ __('translation.first_name') }}"  />
                                <label class="errors lead-errors first_name_error"></label>
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="text" name="last_name" placeholder="{{ __('translation.last_name') }}"  />
                                <label class="errors lead-errors last_name_error"></label>
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="eamil" name="email" placeholder="{{ __('translation.user_email') }}" />
                                <label class="errors lead-errors email_error"></label>
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded phoneMask" type="text" name="phone_number" value="" placeholder="{{ __('translation.phone_number') }}" />
                                <label class="errors lead-errors phone_number_error"></label>
                            </div>

                            <div class="input-group py-2">
                                <select class="form-control rounded " name="category">
                                    <option value="">{{ __('translation.business_category') }}</option>
                                    @foreach($navbarCategories as $val)
                                        @if(empty($val->parent_id))
                                            <option value="{{$val->name}}">{{app()->getLocale() == 'ar'  ? $val->name_ar : $val->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label class="errors lead-errors category_error"></label>
                            </div>

                            <div class="py-2">
                                <input type="radio" id="other" name="other" value="other"><label for="other" style="padding-left: 5px;"> &nbsp;&nbsp; {{ __('translation.form_text01') }}</label>

                            </div>

                            <input type="submit" name="sing-up" class="btn btn-signup px-5 " style="font-weight: lighter;" value="{{ __('translation.form_submit_btn') }}">
                            <div class="lead-loader">
                                <img src="{{URL::to('/public/loader.gif')}}">
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- registration section End Here -->



    <!-- Why chooce us section start-->
    <section class="my-lg-5 my-8">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">


                <!-- col -->
                <div class="col-lg-12 col-12">

                    <div class="row">


                        <div class="row align-items-center sell-with-us-div mb-10">
                        <!-- col -->
                        <div class="col-lg-6" style="background-color: #f0f3f2; border-radius: 20px ">
                            <div style="padding-top: 20px;">
                                <h2 class="mb-5" style="font-weight: bolder" ;>{{ __('translation.dcm_page_title_text03') }} </h2>

                                <h4>
                                    <li>{{ __('translation.dcm_page_title_textn') }}</li>
                                </h4>
                                <p class="mb-0 lead">{{ __('translation.dcm_page_title_textnp') }}</p>
                                <h4>
                                    <li>{{ __('translation.dcm_page_title_text04') }}</li>
                                </h4>
                                <p class="mb-0 lead">{{ __('translation.dcm_page_title_text05') }}</p>
                                <h4>
                                    <li>{{ __('translation.dcm_page_title_text06') }}</li>
                                </h4>
                                <p class="mb-0 lead">{{ __('translation.dcm_page_title_text07') }}</p>
                                <h4>
                                    <li>{{ __('translation.dcm_page_title_text08') }}</li>
                                </h4>
                                <p class="mb-0 lead">{{ __('translation.dcm_page_title_text09') }}</p>
                                <h4>
                                    <li>{{ __('translation.dcm_page_title_text10') }}</li>
                                </h4>
                                <p class="mb-0 lead">{{ __('translation.dcm_page_title_text11') }}</p>
                                <h4>
                                    <li>{{ __('translation.dcm_page_title_text12') }}</li>
                                </h4>
                                <p class="mb-0 lead">{{ __('translation.dcm_page_title_text13') }}</p>



                            </div>
                        </div>

                            <div class="col-lg-6">
                                <!-- text -->
                                <div>
                                <img src="{{URL::to('/public/web_assets/images/Adv/sell2.png')}}" alt="" class="img-fluid w-90 rounded" />
                                </div>
                            </div>

                            <p></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why chooce us section end-->

@endsection
@section('addScript')
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script type="text/javascript" src="{{URL::to('/public/web_assets/js/sell.js')}}"></script>
@endsection