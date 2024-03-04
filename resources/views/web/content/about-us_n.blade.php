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
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>About Us</a></strong></li>
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
            <h2 class="text-center" style="padding-top: 200px;color:#fff ;font-size:35px">About-Us</2>
         </div>

         <div class="dcm_banner_mobile">
            <h2 class="text-center" style="padding-top:40px;color:#fff">About-Us</2>
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
                           Dealsandcouponmena offers you the best discounts and coupons, regardless of what you're looking for “Electronics, furniture, clothing” or anything else. The fact that our staff at Dealsandcouponmena is constantly trying to uncover the finest discounts across shops to allow us to provide
                           our users with the best offers. A mix of retailer discounts, Dealsandcouponmena’s unique coupon codes, and extra cashback is the ideal deal.
                        </p>
                        <p class="mb-5">
                           Nowadays, people dont have time to move around the shopping complex or the mall to purchase their desired items because of the inconvenience that it creates and most people won't waste their time roaming around the shopping complex to buy just one item.
                        </p>
                        <p class="mb-5">
                           We collaborated with a variety of brands and merchants that provide various products and services for people of all genders and ages in an effort to increase the spending power of the country.
                        </p>
                        <p class="mb-5">
                           Furthermore, it's crucial to remember that the goal wasn't just to get consumers to buy more, it was also to Settle their problems with money management.
                           Users of Dealsandcouponmena.com's free discount coupons in GCC can purchase more items at a lower price and it is undoubtedly a treat.
                        </p>
                        <p class="mb-5">
                           To be honest, we have inspired a great number of people to realize their home-based shopping fantasies. We can safely say that we have converted nearly all the site visitors into loyal customers,
                           which is a great privilege for our entire crew.
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
               <h3 class="mb-0 page-title">Our Vision & Mission</h3>
            </div>
         </div>

         <!-- row -->
         <div class="row">
            <!-- col -->
            <div class="col-lg-12 col-12">
               <p class="mb-0">
                  <b>“Our mission is to provide genuine and significant services to all our GCC customers to purchase their desired products with amazing discounts. And of course, our vision is to become the most reputable and respectable coupon & discount service provider to all our loyal customers and also to be remembered as their courteous service provider.” Our Core Values</b>
               </p>

               <p class="mb-5">
                  it's Really Hard to sustain in this fast-growing business world without maintaining your business’s core values. Additionally, a sizable number of customers rely on us greatly and take advantage of the best discount offers in Dubai, Kuwait, Oman, Jordan, Egypt, and KSA. As a result, it is our responsibility to respect certain elements.
               </p>

               <p class="mb-5">
                  <b>We provide discount Codes, which can be used in a wide range of categories. Some of the categories we offer are listed below
                  </b>
               </p>

               <p class="mb-5">
                  <li style="font-weight: bold;">Clothing & Lifestyle</li>
                  <li style="font-weight: bold;">Health & Wellness</li>
                  <li style="font-weight: bold;">Beauty & Skincare</li>
                  <li style="font-weight: bold;">Footwear</li>
                  <li style="font-weight: bold;">Electronics</li>
                  <li style="font-weight: bold;">Gifts</li>
               </p>

               <p class="mb-5">
                  <b>Our State of Quality is our Strength</b>
               </p>
               <p class="mb-5">
                  Our objective is not just to offer as many GCC discount deals as possible. In order to provide our clients with excellent value for money, we always strive to improve and maintain quality. One of our important duties has always been maintaining quality.
               </p>

               <p class="mb-5">
                  <b>Our Loyal and Professional service team</b>
               </p>
               <p class="mb-5">
                  To ensure that the services we provide are as simple as possible, our team receives frequent training. Customers put their complete trust in us, as we already mentioned, so it is our top priority to improve their experience by providing top-notch, error-free services
               </p>
               <p class="mb-5">
                  <b>This is how our website / Service Work</b>
               </p>
               <p class="mb-5">
                  <li style="font-weight: bold;">Visit the Official Site of your favorite brand.</li>
                  <li style="font-weight: bold;">Apply the Promo / Discount code in the Discount Box to get the discounted price.</li>
                  <li style="font-weight: bold;">Include your preferred shipping address to get your item on time.</li>
                  <li style="font-weight: bold;">Place the order and then complete the payment by selecting one of the available options.</li>
                  <li style="font-weight: bold;">That’s All, You have just saved an immense sum of money.</li>
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
                  <!-- heading -->
                  <h2 style="text-align: center;">Join With US</h2>
               </div>

            </div>
         </div>
         <!-- row -->
         <div class="row">
            <div class="col-lg-12 col-12">
               <form action="#" class="form-control p-10">
                  <div class="input-group py-2">
                     <input class="form-control rounded " type="eamil" name="user_email" placeholder="Email" required="required" />

                  </div>

                  <div class="input-group py-2">
                     <input class="form-control rounded" type="password" name="user_password" placeholder="Password" required="required" />

                  </div>

                  <input type="submit" name="sing-up" class="btn btn-signup btn-sm" style="font-weight: lighter;padding: 5px 20px;margin: auto;display: flex;" value="Sign Up">
                  <br>
               </form>

            </div>
         </div>
      </div>
   </section>
   <!-- section 3 ends here -->

@endsection