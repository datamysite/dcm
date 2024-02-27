<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <title>{{@$metaTags->title}}</title>
   <meta content="keywords" name="{{@$metaTags->keywords}}" />
   <meta content="description" name="{{@$metaTags->description}}" />

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
   <!-- navbar -->

      @include('web.includes.navbar')

      @yield('content')

<!-- footer -->


<!-- SignIn-Modal Desktop-->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
   <div class="signin-mobile-nav">
         <p>Let`s get you signed in!</p>
         <div class="nav-btn">
            <button class="btn bg-white signIn act">Sign In</button>
            <button class="btn bg-white signUp">Register</button>
         </div>
   </div>
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body">
            <div class="modal_container" id="modal_container">
               <div class="form-modal_container sign-up-modal_container">
                  <form action="{{route('user.create')}}" id="create_user_form" class="form_modal">
                     @csrf
                     <h1 style="color:#1dace3">Create Account</h1>
                     <div class="social-modal_container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>

                     </div>
                     <span>or use your email for registration</span>
                     <input type="text" placeholder="Name" name="name" class="form_input" required/>
                     <label class="errors name_error"></label>
                     <input type="email" placeholder="Email" name="email" class="form_input" required/>
                     <label class="errors email_error"></label>
                     <input type="password" placeholder="Password" name="password" class="form_input" required/>
                     <label class="errors password_error"></label>
                     <br>
                     <button type="submit" class="btn btn-primary shadow-gray">Sign Up</button>
                  </form>
               </div>
               <div class="form-modal_container sign-in-modal_container">
                  <form action="{{route('user.login')}}" id="login_user_form" class="form_modal">
                     @csrf
                     <h1 style="color:#1dace3">Sign in to DCM</h1>
                     <div class="social-modal_container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>

                     </div>
                     <span>or use your account</span>
                     <input type="email" placeholder="Email" name="email" class="form_input" required/>
                     <label class="errors email_error_l"></label>
                     <input type="password" placeholder="Password" name="password" class="form_input" required />
                     <label class="errors password_error_l"></label>
                     <p><a href="javascript:void(0)" style="color:#1dace3">Forgot your password?</a></p>
                     <button type="submit" class="btn btn-primary shadow-gray">Sign In</button>
                  </form>
               </div>
               <div class="overlay_modal-modal_container">
                  <div class="overlay_modal">
                     <div class="overlay_modal-panel overlay_modal-left" style="background-color: #1dace3;">
                        <h1 style="color:#fff">Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="btn btn-primary shadow-gray signIn" style="background-color: #fff;color:#1dace3">Sign In</button>
                     </div>
                     <div class="overlay_modal-panel overlay_modal-right" style="background-color: #1dace3;color:#fff">
                        <h1 style="color:#fff">DCM</h1>
                        <h1 style="color:#fff">Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us. or you can <b>Sign Up</b> if you don't have an account</p>
                        <button class="btn btn-primary shadow-gray signUp" style="background-color: #fff;color:#1dace3">Sign Up</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body p-6">
            <div class="d-flex justify-content-between align-items-start">
               <div>
                  <h5 class="mb-1" id="locationModalLabel">Choose your Delivery Location</h5>
                  <p class="mb-0 small">Enter your address and we will specify the offer you area.</p>
               </div>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="my-5">
               <input type="search" class="form-control" placeholder="Search your area" />
            </div>
            <div class="d-flex justify-content-between align-items-center mb-2">
               <h6 class="mb-0">Select Location</h6>
               <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">Clear All</a>
            </div>
            <div>
               <div data-simplebar style="height: 300px">
                  <div class="list-group list-group-flush">
                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action active">
                        <span>Alabama</span>
                        <span>Min:$20</span>
                     </a>
                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                        <span>Alaska</span>
                        <span>Min:$30</span>
                     </a>
                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                        <span>Arizona</span>
                        <span>Min:$50</span>
                     </a>
                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                        <span>California</span>
                        <span>Min:$29</span>
                     </a>
                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                        <span>Colorado</span>
                        <span>Min:$80</span>
                     </a>
                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                        <span>Florida</span>
                        <span>Min:$90</span>
                     </a>
                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                        <span>Arizona</span>
                        <span>Min:$50</span>
                     </a>
                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                        <span>California</span>
                        <span>Min:$29</span>
                     </a>
                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                        <span>Colorado</span>
                        <span>Min:$80</span>
                     </a>
                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                        <span>Florida</span>
                        <span>Min:$90</span>
                     </a>
                  </div>
               </div>
            </div>
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

@yield('addScript')
</body>

</html>