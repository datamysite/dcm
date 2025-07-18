<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
   <meta name="home_url" content="{{@URL::to('/'.app()->getLocale())}}">
   <meta name="country" content="{{config('app.country_short')}}">
   <title>{{@$metaTags->title}}@yield('default_title')</title>
   <meta name="keywords" content="{{@$metaTags->keywords}}" />
   <meta name="description" content="{{@$metaTags->description}}@yield('default_description')" />
   @yield('metaAddition')
   <meta name="google-adsense-account" content="ca-pub-2683356797993144">
   <!-- OG Tags -->
   <meta property="og:title" content="{{@$metaTags->title}}@yield('default_title')" />
   <meta property="og:description" content="{{@$metaTags->description}}@yield('default_description')" />
   <meta property="og:url" content="{{$actual_link}}" />
   <meta property="og:type" content="website" />
   <meta property="og:site_name" content="Deals and Coupons Mena" />
   <meta property="og:image"content="{{URL::To('/')}}/public/Icon-Black.png"/>

   <!-- Twitter Card Tags -->
   <meta name="twitter:card" content="summary" />
   <meta name="twitter:title" content="{{@$metaTags->title}}@yield('default_title')"/>
   <meta name="twitter:description" content="{{@$metaTags->description}}@yield('default_description')"/>
   
   <!-- canonical -->
   @if(!empty($type_remove) && config('app.retail') == false)
      @php
         $new_actual_link = '';
         if(strpos($actual_link, '/online')){
            $new_actual_link = str_replace('/online', '', $actual_link);
         }elseif(strpos($actual_link, '/retail')){
            $new_actual_link = str_replace('/retail', '', $actual_link);
         }

      @endphp
      <link rel="canonical" href="{{$new_actual_link}}" />
   @else
      <link rel="canonical" href="{{$actual_link}}" />
   @endif
   @if(empty($data['is_blog']))
      <link rel="alternate" href="{{$en_link}}" hreflang="en" />
      <link rel="alternate" href="{{$ar_link}}" hreflang="ar" />
      <link rel="alternate" href="{{$en_link}}" hreflang="x-default" />
   @endif

   @if(!empty($data['is_blog']))
      @yield('amphtml')
   @endif
   @yield('addImagesrc')
   @include('web.includes.style')
   @yield('addStyle')


   @foreach($headSnippet as $val)

      <!-- {{$val->name}} // Start -->
         {!! $val->snippet_code !!}
      <!-- {{$val->name}} // End -->

   @endforeach
</head>


<body>
   <div id="loading">
     <img id="loading-image" src="{{URL::to('/public/web_assets/images/logo/loader.png')}}" alt="Loading..." />
   </div>

   <!-- Whatsapp Channel -->
   <a href="https://whatsapp.com/channel/0029VagMPcIJkK7DkRIf8F1j" class="whatsapp-channel-btn" target="_blank">
      <span>{{ __('translation.whatsapp-channel') }}</span>
      <img src="{{URL::to('/public/whatsapp.png')}}">
   </a>
   <!-- navbar -->

      @include('web.includes.navbar')

      @yield('content')

<!-- footer -->


<!-- SignIn-Modal Desktop-->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
   <div class="signin-mobile-nav">
         <p>Let`s get you signed in!</p>
         <div class="nav-btn">
            <button class="btn bg-white signIn act">{{ __('translation.sign_in_btn') }}</button>
            <button class="btn bg-white signUp">{{ __('translation.sign_up_btn') }}</button>
         </div>
   </div>
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body">
            <div class="modal_container" id="modal_container">
               <div class="form-modal_container sign-up-modal_container">
                  <form action="{{route('user.create')}}" id="create_user_form"  onsubmit="return gtag_report_signup;" class="form_modal">
                     @csrf
                     @if(!empty($_GET['referal_link']))
                        <input type="hidden" name="referral" value="{{$_GET['referal_link']}}">
                     @endif
                     <b style="color:#1dace3;font-size:1.75rem;">{{ __('translation.dcm_create_account') }}</b>
                     <div class="social-modal_container">
                        <!-- <a href="{{route('auth.facebook', [$region])}}" class="social"><i class="fab fa-facebook-f"></i></a> -->
                        <a href="{{route('auth.google')}}" class="social"><i class="fab fa-google-plus-g"></i></a>

                     </div>
                     <span>{{ __('translation.dcm_reg_text') }}</span>
                     <input type="text" placeholder="{{ __('translation.dcm_name_txt') }}" name="name" class="form_input" required/>
                     <label class="errors name_error"></label>
                     <input type="email" placeholder="{{ __('translation.email_dcm_form') }}" name="email" class="form_input" required/>
                     <label class="errors email_error"></label>
                     <input type="password" placeholder="{{ __('translation.password_dcm_form') }}" name="password" class="form_input" required/>
                     <label class="errors password_error"></label>
                     <br>
                     <button type="submit" class="btn btn-primary shadow-gray">{{ __('translation.sign_up_btn') }}</button>
                     <div class="signup-loader"><img src="{{URL::to('/public/loader.gif')}}"></div>
                  </form>
               </div>
               <div class="form-modal_container sign-in-modal_container">
                  <form action="{{route('user.login')}}" id="login_user_form"  onsubmit="return gtag_report_signin;" class="form_modal">
                     @csrf
                     <b style="color:#1dace3;font-size:1.75rem;">{{ __('translation.sign_in_to_dcm') }}</b>
                     <div class="social-modal_container">
                        <!-- <a href="{{route('auth.facebook', [$region])}}" class="social"><i class="fab fa-facebook-f"></i></a> -->
                        <a href="{{route('auth.google')}}" class="social"><i class="fab fa-google-plus-g"></i></a>

                     </div>
                     <span>{{ __('translation.or_use_your_account') }}</span>
                     <input type="email" placeholder="{{ __('translation.email_dcm_form') }}" name="email" class="form_input" required/>
                     <label class="errors email_error_l"></label>
                     <input type="password" placeholder="{{ __('translation.password_dcm_form') }}" name="password" class="form_input" required />
                     <label class="errors password_error_l"></label>
                     <p><a href="javascript:void(0)" style="color:#1dace3"  role="button" data-bs-toggle="modal" data-bs-target="#forgetPassModal">{{ __('translation.forget_password_txt') }}</a></p>
                     <button type="submit" class="btn btn-primary shadow-gray">{{ __('translation.sign_in_btn') }}</button>
                     <div class="signin-loader"><img src="{{URL::to('/public/loader.gif')}}"></div>
                  </form>
               </div>
               <div class="overlay_modal-modal_container">
                  <div class="overlay_modal">
                     <div class="overlay_modal-panel overlay_modal-left" style="background-color: #1dace3;">
                        <b style="color:#fff;font-size:1.75rem;">{{ __('translation.dcm_wlc_back') }}</b>
                        <p>{{ __('translation.dcm_wlc_back_txt') }}</p>
                        <button class="btn btn-primary shadow-gray signIn" style="background-color: #fff;color:#1dace3">{{ __('translation.sign_in_btn') }}</button>
                     </div>
                     <div class="overlay_modal-panel overlay_modal-right" style="background-color: #1dace3;color:#fff">
                        <b style="color:#fff;font-size:1.75rem;">DCM</b>
                        <b style="color:#fff;font-size:1.75rem;">{{ __('translation.dmc_modal_text01') }}</b>
                        <p>{{ __('translation.dmc_modal_text02') }}</p>
                        <button class="btn btn-primary shadow-gray signUp" id="open-signup" style="background-color: #fff;color:#1dace3">{{ __('translation.sign_up_btn') }}</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Forget Password Modal Start-->
<div class="modal fade" id="forgetPassModal" tabindex="-1" aria-labelledby="forgetPassModal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-4" style="background-color: #fff;">
         <div class="modal-header border-0">
            <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">{{ __('translation.forget_pass_txt_01') }}</h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
       
         <div class="modal-body" style="text-align: center;">
         
            <form id="forgotPasswordForm" action="{{route('user.forgotPassword', [app()->getLocale()])}}">
               @csrf
               <div class="mb-3">
                  <label for="email" class="form-label">{{ __('translation.forget_pass_txt_02') }}</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('translation.forget_pass_txt_03') }}" required="" />
                  <label class="errors email_error_f"></label>
               </div>

               <div class="mb-5">

               </div>
               <label class="btn-content" style="display:none;"></label>
               <button type="submit" class="btn btn-primary sub-btn" name="send_link">{{ __('translation.forget_pass_btn') }}</button>
            </form>
         </div>
         <div class="modal-footer border-0 justify-content-center">
         {{ __('translation.forget_pass_txt_04') }}
            <a href="javascript:void(0)"  role="button" data-bs-toggle="modal" data-bs-target="#userModal">  {{ __('translation.forget_pass_txt_05') }}</a>
         </div>
      </div>
   </div>
</div>
   <!-- Forget Password Modal End-->

<div class="cookie-wrapper">
   <header>
     <i class="fa fa-cookie-bite"></i>
     <h2>{{ __('translation.cookies_policy') }}</h2>
   </header>

   <div class="data">
     <p>{{ __('translation.cookie_para') }}<a href="https://dealsandcouponsmena.com/{{app()->getLocale()}}/dubai/privacy-policy" target="_blank"> {{ __('translation.read_more') }}...</a></p>
   </div>

   <div class="buttons">
     <button class="button" id="acceptBtn">{{ __('translation.accept') }}</button>
     <button class="button" id="declineBtn">{{ __('translation.decline') }}</button>
   </div>
</div>


<script>
const cookieBox = document.querySelector(".cookie-wrapper"),
  buttons = document.querySelectorAll(".cookie-wrapper .button");

const executeCodes = () => {
  //if cookie contains codinglab it will be returned and below of this code will not run
  if (document.cookie.includes("DCM")) return;
  setTimeout(function(){
   cookieBox.classList.add("show");
  }, 5000);

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      cookieBox.classList.remove("show");

      //if button has acceptBtn id
      if (button.id == "acceptBtn") {
        //set cookies for 1 month. 60 = 1 min, 60 = 1 hours, 24 = 1 day, 30 = 30 days
        document.cookie = "cookieBy= DCM; max-age=" + 60 * 60 * 24 * 30;
      }
    });
  });
};

//executeCodes function will be called on webpage load
window.addEventListener("load", executeCodes);
</script>
<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body p-6">
            
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modal-subscribe" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" style="background-color: azure;">
         <div class="modal-body p-0">
            <div class="d-flex align-items-center">
               <div class="d-none d-lg-block">
                  <img src="{{URL::to('/public')}}/web_assets/images/icons/lang.png" alt="" class="img-fluid rounded-start" />
               </div>
               <div class="px-8 py-8 py-lg-0">
                  <div class="position-absolute end-0 top-0 m-6">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <h5 class="text-center mb-5">Dear customer , Use the language you prefer</h5>
                  <h5 class="text-center mb-5">عزيزي العميل , إحتار اللغة التي تناسبك</h5>



                  <div class="d-grid">
                     <a href="#" class="btn btn-primary mb-5" data-bs-dismiss="modal">English</a>
                     <a href="#" class="btn btn-primary mb-5" data-bs-dismiss="modal">عربي</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@include('web.includes.footer')

<!-- Javascript-->

@include('web.includes.script')

@foreach($bodySnippet as $val)

   <!-- {{$val->name}} // Start -->
      {!! $val->snippet_code !!}
   <!-- {{$val->name}} // End -->

@endforeach
@include('web.includes.analyticsScript')

@yield('addScript')
</body>

</html>