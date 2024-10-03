<!doctype html>
<html ⚡ lang="{{app()->getLocale()}}">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
   <meta name="home_url" content="{{route('home', [$region])}}">
   <title>{{@$metaTags->title}}</title>
   <meta name="keywords" content="{{@$metaTags->keywords}}" />
   <meta name="description" content="{{@$metaTags->description}}" />
   <link rel="canonical" href="{{$actual_link}}" />
   @yield('addImagesrc')
   @include('ampn-web.includes.style')
   @yield('addStyle')



 
</head>


<body style="overflow: hidden; background-image: url('{{URL::to('/public/web_assets/images/bg.jpg')}}');">
   <div class="main_div">
      <amp-script layout="container" height="100vh" script="navbarScript" sandbox="allow-forms">
         <input type="hidden" name="host" id="home_url" value="{{URL::to('/amp/'.app()->getLocale().'/'.$region)}}">
         <!-- <div id="loading">
           <amp-img id="loading-image" src="{{URL::to('/public/web_assets/images/logo/loader.png')}}" width="100px" height="100px" layout="fixed" alt="Loading..."></amp-img>
         </div> -->
         <!-- navbar -->

         @include('ampn-web.includes.navbar')
         <div class="nav-spacing"></div>

         @yield('content')

         <!-- footer -->


         <!-- SignIn-Modal Desktop-->
            <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
               <div class="signin-mobile-nav">
                     <p>Let`s get you signed in!</p>
                     <div class="nav-btn">
                        <button class="btn active" id="signIn">{{ __('translation.sign_in_btn') }}</button>
                        <button class="btn" id="signUp">{{ __('translation.sign_up_btn') }}</button>
                     </div>
               </div>
               <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                     <div class="modal-body">
                        <div class="modal_container" id="modal_container">
                           <div class="form-modal_container sign-in-modal_container">
                              <form action-xhr="{{route('user.login')}}" method="post" id="login_user_form" class="form_modal" custom-validation-reporting="show-first-on-submit">
                                 @csrf
                                 <h1 style="color:#1dace3">{{ __('translation.sign_in_to_dcm') }}</h1>
                                 <div class="social-modal_container">
                                    <!-- <a href="{{route('auth.facebook', [$region])}}" class="social"><i class="fab fa-facebook-f"></i></a> -->
                                    <a href="{{route('auth.google', [$region])}}" class="social"><img src="{{URL::to('/public/web_assets/images/icons/google.svg')}}" alt="google" width="26px" height="26px"></img></a>

                                 </div>
                                 <span>{{ __('translation.or_use_your_account') }}</span>
                                 <input type="email" placeholder="{{ __('translation.email_dcm_form') }}" id="l-email" name="email" class="form_input" required/>
                                 <span visible-when-invalid="valueMissing" validation-for="l-email"></span>
                                 <span visible-when-invalid="typeMismatch" validation-for="l-email"></span>
                                 <input type="password" placeholder="{{ __('translation.password_dcm_form') }}" id="l-password" name="password" class="form_input" required />
                                 <span visible-when-invalid="valueMissing" validation-for="l-password"></span>
                                 <div submitting>
                                    <template type="amp-mustache">
                                       <amp-img src="{{URL::to('/public/loader-gif.gif')}}" layout='fixed' width='100px' height='25px'></amp-img>
                                    </template>
                                 </div>
                                 <div submit-success>
                                     <template type="amp-mustache">
                                       Success! You are successfully Logged-In. For Profile Please <a href="{{route('user.dashboard')}}">click here</a>
                                     </template>
                                   </div>
                                   <div submit-error>
                                     <template type="amp-mustache">
                                       Error! Incorrect Email or Password.
                                     </template>
                                   </div>
                                 <p><a href="#" style="color:#1dace3"  role="button" data-bs-toggle="modal" data-bs-target="#forgetPassModal">{{ __('translation.forget_password_txt') }}</a></p>

                                 <button type="submit" class="btn btn-primary shadow-gray">{{ __('translation.sign_in_btn') }}</button>
                              </form>
                           </div>
                           <div class="form-modal_container sign-up-modal_container">
                              <form action-xhr="{{route('user.create')}}" method="post" id="create_user_form" class="form_modal" custom-validation-reporting="show-first-on-submit">
                                 @csrf
                                 <h1 style="color:#1dace3">{{ __('translation.dcm_create_account') }}</h1>
                                 <div class="social-modal_container">
                                    <!-- <a href="{{route('auth.facebook', [$region])}}" class="social"><i class="fab fa-facebook-f"></i></a> -->
                                    <a href="{{route('auth.google', [$region])}}" class="social"><img src="{{URL::to('/public/web_assets/images/icons/google.svg')}}" alt="google" width="26px" height="26px"></img></a>

                                 </div>
                                 <span>{{ __('translation.dcm_reg_text') }}</span>
                                 <input type="text" placeholder="{{ __('translation.dcm_name_txt') }}" id="r-name" name="name" class="form_input" required pattern="\p{L}+\s\p{L}+"/>
                                 <span visible-when-invalid="valueMissing" validation-for="r-name"></span>
                                 <span visible-when-invalid="patternMismatch" validation-for="r-name">
                                    Please enter your first and last name separated by a space (e.g. John Doe)
                                 </span>
                                 <input type="email" placeholder="{{ __('translation.email_dcm_form') }}" id="r-email" name="email" class="form_input" required/>
                                 <span visible-when-invalid="valueMissing" validation-for="r-email"></span>
                                 <span visible-when-invalid="typeMismatch" validation-for="r-email"></span>
                                 <input type="password" placeholder="{{ __('translation.password_dcm_form') }}" id="r-password" name="password" class="form_input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/>
                                 <span visible-when-invalid="valueMissing" validation-for="r-password"></span>
                                 <span visible-when-invalid="patternMismatch" validation-for="r-password">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>
                                 <div submitting>
                                    <template type="amp-mustache">
                                       <amp-img src="{{URL::to('/public/loader-gif.gif')}}" layout='fixed' width='100px' height='25px'></amp-img>
                                    </template>
                                 </div>
                                 <div submit-success>
                                     <template type="amp-mustache">
                                       Success! You are successfully Signed-Up. For Profile Please <a href="{{route('user.dashboard')}}">click here</a>
                                     </template>
                                   </div>
                                   <div submit-error>
                                     <template type="amp-mustache">
                                       Error! This email is already registered.
                                     </template>
                                   </div>
                                 <br>
                                 <button type="submit" class="btn btn-primary shadow-gray">{{ __('translation.sign_up_btn') }}</button>
                              </form>
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
                     
                        <form id="forgotPasswordForm" method="post" action-xhr="{{route('user.forgotPassword')}}">
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
                        <a href="#"  role="button" data-bs-toggle="modal" data-bs-target="#userModal">  {{ __('translation.forget_pass_txt_05') }}</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Forget Password Modal End-->



         @include('ampn-web.includes.footer')

         <!-- Javascript-->

         @include('ampn-web.includes.script')

        

         @yield('addScript')

      </amp-script>
      <script id="navbarScript" type="text/plain" target="amp-script">@yield('custom-script')</script>
   </div>
</body>

</html>