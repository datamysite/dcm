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
                     <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                     <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.About_Us') }}</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

   <!-- Slider Section Start-->
   <section class="mt-2">
    <div class="container">

         <div class="dcm_banner" style="background: url('{{URL::to('/public/web_assets/images/banner/dcm_banner.png')}}') no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
            <h2 class="text-center" style="padding-top: 200px;color:#fff ;font-size:35px">{{ __('translation.About_Us') }}</2>
         </div>

         <div class="dcm_banner_mobile">
            <h2 class="text-center" style="padding-top:40px;color:#fff">{{ __('translation.About_Us') }}</2>
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

<!-- about us main section start here-->
   <section class="my-lg-5 my-8">
      <!-- container -->
      <div class="container">
         <!-- row -->
         <div class="row">
            <!-- col -->
            <div class="col-lg-12 col-12">
               <div class="row align-items-center mb-1">
                  <div class="col-lg-6">
                     <!-- text -->
                     <div class="text-center text-md-start">

                        <p class="mb-5">
                           {{ __('translation.about_page_text_sec_01') }}
                        </p>
                        <p class="mb-5">
                           {{ __('translation.about_page_text_sec_02') }}
                        </p>
                        <p class="mb-5">
                           {{ __('translation.about_page_text_sec_03') }}
                        </p>
                        <p class="mb-5">
                           {{ __('translation.about_page_text_sec_04') }}
                        </p>
                        <p class="mb-5">
                           {{ __('translation.about_page_text_sec_05') }}
                        </p>

                     </div>
                  </div>
                  <!-- col -->
                  <div class="col-lg-6">
                     <div class="me-6" style="border-radius: 10px;">
                        <!-- img -->
                        <img src="{{URL::to('/public/web_assets/images/Adv/about_test.png')}}" alt="" class="img-fluid rounded" />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
<!-- about us main section end here-->

   <!-- section 2 start here-->
   <section class="my-lg-5 my-8">
      <!-- container -->
      <div class="container">

         <div class="row">

            <div class="col-12 mb-6 text-center">
               <h3 class="mb-0 page-title">{{ __('translation.about_sec_02_title') }}</h3>
            </div>
         </div>

         <!-- row -->
         <div class="row">
            <!-- col -->
            <div class="col-lg-12 col-12">
               <p class="mb-0">
                  <b>{{ __('translation.about_page_text_sec02_01') }}</b>
               </p>

               <p class="mb-5">
                  {{ __('translation.about_page_text_sec02_02') }}
               </p>

               <p class="mb-5">
                  <b>{{ __('translation.about_page_text_sec02_03') }}
                  </b>
               </p>

               <p class="mb-5">
                  <li style="font-weight: bold;">{{ __('translation.about_page_text_sec02_04_list01') }}</li>
                  <li style="font-weight: bold;">{{ __('translation.about_page_text_sec02_04_list02') }}</li>
                  <li style="font-weight: bold;">{{ __('translation.about_page_text_sec02_04_list03') }}</li>
                  <li style="font-weight: bold;">{{ __('translation.about_page_text_sec02_04_list04') }}</li>
                  <li style="font-weight: bold;">{{ __('translation.about_page_text_sec02_04_list05') }}</li>
                  <li style="font-weight: bold;">{{ __('translation.about_page_text_sec02_04_list06') }}</li>
               </p>

               <p class="mb-5">
                  <b>
                  {{ __('translation.about_page_text_sec02_06') }}
                  </b>
               </p>

               <!-- <p class="mb-5">
               {{ __('translation.about_page_text_sec02_07') }}
               </p> -->

               <p class="mb-5">
                  <b>
                     {{ __('translation.about_page_text_sec02_07') }}

       
                  </b>
               </p>
               <p class="mb-5">
               {{ __('translation.about_page_text_sec02_08') }}
               </p>
               <p class="mb-5">
                  <b>
                     {{ __('translation.about_page_text_sec02_09') }}
                  </b>
               </p>
               <p class="mb-5">
                  <li style="font-weight: bold;">{{ __('translation.about_page_text_sec02_04_list07') }}</li>
                  <li style="font-weight: bold;">{{ __('translation.about_page_text_sec02_04_list08') }}</li>
                  <li style="font-weight: bold;">{{ __('translation.about_page_text_sec02_04_list09') }}</li>
                  <li style="font-weight: bold;">{{ __('translation.about_page_text_sec02_04_list10') }}</li>
                  <li style="font-weight: bold;">{{ __('translation.about_page_text_sec02_04_list11') }}</li>
               </p>



            </div>
         </div>
      </div>
   </section>
   <!-- section 2 end here-->


      <!-- section 3 start here -->
      <section class="my-lg-14 my-8">
      <!-- container -->
      <div class="container">

         <div class="row">
            <div class="col-12">
               <div class="mb-8">
                  <h2 style="text-align: center;">{{ __('translation.about_us_join_us_head') }}</h2>
               </div>

            </div>
         </div>
         <!-- row -->
         <div class="row">
            <div class="col-lg-12 col-12">
               <form action="#" class="form-control p-10">
                  <div class="input-group py-2">
                     <input class="form-control rounded " type="eamil" name="user_email" placeholder="{{ __('translation.user_email') }}" required="required" />

                  </div>

                  <div class="input-group py-2">
                     <input class="form-control rounded" type="password" name="user_password" placeholder="{{ __('translation.form_password') }}" required="required" />

                  </div>

                  <input type="submit" name="sing-up" class="btn btn-signup btn-sm" style="font-weight: lighter;padding: 5px 20px;margin: auto;display: flex;" value="{{ __('translation.earn_coupons_btn_03') }}">
                  <br>
               </form>

            </div>
         </div>
      </div>
   </section>
   <!-- section 3 ends here -->

@endsection