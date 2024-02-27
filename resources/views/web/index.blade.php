@extends('web.includes.master')

@section('content')
   <div class="nav-spacing"></div>
   
   <div class="container emirates-container">
      <div class="emirates-section-nav">
         <div class="header_card">
            <img src="{{URL::to('/public')}}/web_assets/images/emirates/abu-dhabi.png" alt="Abu Dhabi" />
            ABU DHABI
         </div>

         <div class="header_card">
            <img src="{{URL::to('/public')}}/web_assets/images/emirates/dubai.png" alt="DUBAI" />
            DUBAI
         </div>

         <div class="header_card">
            <img src="{{URL::to('/public')}}/web_assets/images/emirates/sharjah.png" alt="SHARJAH" />
            SHARJAH
         </div>

         <div class="header_card">
            <img src="{{URL::to('/public')}}/web_assets/images/emirates/fujairah.png" alt="FUJAIRAH" />
            FUJAIRAH
         </div>

         <div class="header_card">
            <img src="{{URL::to('/public')}}/web_assets/images/emirates/ajman.png" alt="AJMAN" />
            AJMAN
         </div>

         <div class="header_card">
            <img src="{{URL::to('/public')}}/web_assets/images/emirates/umm_alquwain.png" alt="UMM AL QUWAIN" />
            UMM ALQUWAIN
         </div>

         <div class="header_card">
            <img src="{{URL::to('/public')}}/web_assets/images/emirates/ras_alkaimah.png" alt="RAS AL KHAIMAH" />
            RAS ALKHAIMAH
         </div>
      </div>
   </div>


   <!-- Slider Section Start-->
   <section class="mb-lg-10 my-8">
      <div class="container">
         <div class="hero-slider">

            <a href="https://wa.me/971585882973" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/slider/b1.png">
            </a>

            <a href="https://homzmart.com/en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/slider/b2.png">
            </a>

            <a href="https://www.namshi.com/uae-en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/slider/b3.png">
            </a>

            <a href="https://www.sivvi.com" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/slider/b4.png">
            </a>

            <a href="https://yallatoys.com/qa_en?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/slider/B5.png">
            </a>

            <a href="https://www.firstcry.ae?utm_source=dealsandcouponsmena&utm_campaign=cps" target="_blank">
               <img src="{{URL::to('/public')}}/web_assets/images/slider/B6.png">
            </a>
         </div>
      </div>
   </section>
   <!-- Slider Section End-->

   <!-- Category Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container">
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <h3 class="mb-0 page-title">Categories</h3>
            </div>
         </div>
         <div class="category-slider">
            @foreach($categories as $val)
            @php 
               $string = strtolower(trim($val->name));
               $string = str_replace('&', 'and', $string);
               $string = str_replace(' ', '-', $string);
               $slug = preg_replace('/[^a-z0-9-]/', '', $string);
            @endphp
            <div class="item">
               <a href="{{route('category', $slug)}}/?type={{$val->type == '3' ? '1' : '2'}}" class="text-decoration-none text-inherit">
                  <img src="{{URL::to('/public/storage/categories/'.$val->image)}}" alt="{{$val->name}}" class="img-fluid" />
                  <div class="text-truncate">{{$val->name}}</div>
               </a>
            </div>
            @endforeach

         </div>

      </div>
   </section>
   <!-- Category Section End-->


   <!-- How To Eearn Coupon Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container np-container">
         <div class="animated-banner">
            <img src="{{URL::to('public/web_assets/images/animated/background.png')}}" style="width:100%; height: 100%;">
            <div class="content">
               <h1>How to Earn with <br>Deals & Coupon Mena?</h1>
               <ol>
                  <li>Select your Perferd Brand & Click Show Coupons</li>
                  <li>Apply The Code and Redeem the Discount</li>
                  <li>Upload your Reciept and Get your Cashback</li>
               </ol>
               <a href="javascript:void(0)" class="btn btn-white btn-sm">EARN NOW</a>
            </div>
            <div class="object-section">
               <img class="light" src="{{URL::to('public/web_assets/images/animated/lights-1.png')}}" style="width:100%; height: auto;">
               <img class="box-1" src="{{URL::to('public/web_assets/images/animated/box-3.png')}}">
               <img class="money-1" src="{{URL::to('public/web_assets/images/animated/money1.png')}}">
               <img class="cover-1" src="{{URL::to('public/web_assets/images/animated/cover-1.png')}}">
               <img class="box-2" src="{{URL::to('public/web_assets/images/animated/box-2-small.png')}}">
               <img class="box-3" src="{{URL::to('public/web_assets/images/animated/box-1.png')}}">
            </div>
         </div>
      </div>
   </section>
   <!-- How To Eearn Coupon Section End-->

   <!-- Online Stores Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container np-container">
         <!-- row -->
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="javascript:void(0)">
                  <h3 class="mb-0 page-title">Online Stores</h3>
               </a>
            </div>
         </div>
         <!-- slider -->
         <div class="product-slider-second" id="slider-second">
            <!-- item -->
            <div class="item">
               <!-- <div class="card card-product mb-lg-4">
                     <div class="card-body"> -->
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/yalla_toys_store.png" alt="Yalla Toys Store" style="border-radius: 20px;" />
                           <a href="javascript:void(0)" class="img-pop-up">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="{{route('brand', 'yalla-toys')}}" class="img-pop-up">
                              <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/yalla-toys-backside.png" alt="Yalla Toys Store" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- </div>
                  </div> -->
            </div>
            <!-- item -->
            <div class="item">
               <!-- <div class="card card-product mb-lg-4">
                     <div class="card-body"> -->
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/homzmart-store.png" alt="Homzmart Store" style="border-radius: 20px;" />
                           <a href="javascript:void(0)" class="img-pop-up">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="{{route('brand', 'homzmart')}}" class="img-pop-up">
                              <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/homzmart-store-backside.png" alt="Homzmart Store" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- </div>
                  </div> -->
            </div>
            <!-- item -->
            <!-- item -->
            <div class="item">
               <!-- <div class="card card-product mb-lg-4">
                     <div class="card-body"> -->
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/namshi_store.png" alt="Namshi Store" style="border-radius: 20px;" />
                           <a href="#" class="img-pop-up">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="{{route('brand', 'namshi')}}" class="img-pop-up">
                              <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/namshi-store-backside.png" alt="Namshi Store" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- </div>
                  </div> -->
            </div>
            <!-- item -->

            <!-- item -->
            <div class="item">
               <!-- <div class="card card-product mb-lg-4">
                     <div class="card-body"> -->
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/sivvi_store.png" alt="Sivvi Store" style="border-radius: 20px;" />
                           <a href="#" class="img-pop-up">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="{{route('brand', 'sivvi')}}" class="img-pop-up">
                              <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/sivvi-store-backside.png" alt="Sivvi Store" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- </div>
                  </div> -->
            </div>

            <!-- item -->
            <div class="item">
               <!-- <div class="card card-product mb-lg-4">
                     <div class="card-body"> -->
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/noon.png" alt="Aldo Store" style="border-radius: 20px;" />
                           <a href="#" class="img-pop-up">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="{{route('brand', 'noon')}}" class="img-pop-up">
                              <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/noon-backside.png" alt="" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- </div>
                  </div> -->
            </div>

         </div>
         <div class="row" style="justify-content: flex-end;">
            <div class="col-lg-2 col-2">
               <div class="slider-arrow" id="slider-second-arrows"></div>
            </div>
         </div>
      </div>
   </section>
   <!-- Online Stores Section End-->

   <!--Ads Section 1 Start Here-->
   <section class="my-lg-12 my-8">
      <div class="container ad-container np-container">
         <div class="row">
            <div class="col-12">
               <img src="{{URL::to('/public/web_assets/images/banner/noon.avif')}}">
            </div>
         </div>
      </div>
   </section>
   <!--Ads Section 1 End Here-->

   <!-- Retailers Stories Section Start -->
   <section class="my-lg-12 my-8">
      <div class="container np-container">
         <!-- row -->
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="javascript:void(0)">
                  <h3 class="mb-0 page-title">Retail Stores</h3>
               </a>
            </div>
         </div>
         <!-- slider -->
         <div class="product-slider-second" id="slider-third">

            <!-- item -->
            <div class="item">
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{URL::to('/public')}}/coming-soon.png" alt="Aldo Store" style="border-radius: 20px;" />
                           <a href="Store-Products" class="img-pop-up" target="_blank">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="javascript:void(0)" class="img-pop-up">
                              <img class="img-fluid w-100" src="{{URL::to('/public')}}/coming-soon.png" alt="Aldo Store" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- item -->

            <!-- item -->
            <div class="item">
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{URL::to('/public')}}/coming-soon.png" alt="Aldo Store" style="border-radius: 20px;" />
                           <a href="Store-Products" class="img-pop-up" target="_blank">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="javascript:void(0)" class="img-pop-up">
                              <img class="img-fluid w-100" src="{{URL::to('/public')}}/coming-soon.png" alt="Aldo Store" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- item -->
            <!-- item -->
            <div class="item">
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{URL::to('/public')}}/coming-soon.png" alt="Aldo Store" style="border-radius: 20px;" />
                           <a href="Store-Products" class="img-pop-up" target="_blank">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="javascript:void(0)" class="img-pop-up">
                              <img class="img-fluid w-100" src="{{URL::to('/public')}}/coming-soon.png" alt="Aldo Store" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- item -->
            <!-- item -->
            <div class="item">
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{URL::to('/public')}}/coming-soon.png" alt="Aldo Store" style="border-radius: 20px;" />
                           <a href="Store-Products" class="img-pop-up" target="_blank">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="javascript:void(0)" class="img-pop-up">
                              <img class="img-fluid w-100" src="{{URL::to('/public')}}/coming-soon.png" alt="Aldo Store" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- item -->
            <!-- item -->
            <div class="item">
               <div class="custom_col">
                  <div class="flip-container">
                     <div class="flipper">
                        <div class="front">
                           <img class="img-fluid w-100" src="{{URL::to('/public')}}/coming-soon.png" alt="Aldo Store" style="border-radius: 20px;" />
                           <a href="Store-Products" class="img-pop-up" target="_blank">
                              <div class="custom_arrow-button2">
                                 <i class="bi bi-arrow-right-circle"></i>
                              </div>
                           </a>
                        </div>
                        <div class="back">
                           <a href="javascript:void(0)" class="img-pop-up">
                              <img class="img-fluid w-100" src="{{URL::to('/public')}}/coming-soon.png" alt="Aldo Store" style="border-radius: 20px;" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- item -->

         </div>
      </div>
   </section>
   <!-- Retailers Stoires Section End-->

   <!-- <div class="divider"></div> -->

   <!-- All Stores Section Start-->
   <section class="my-lg-12 my-8">
      <div class="container np-container" id="all-stores">
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <a href="javascript:void(0)">
                  <h3 class="mb-0 page-title">All Stores</h3>
               </a>
            </div>
         </div>

         <div class="row">


            <div class="col-md-6 col-xs-12 mb-3">
               <div class="single-deal v-tile">
                  <div class="overlay"></div>
                  <a href="javascript:void(0)"><img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/'.$allstores[0]->logo)}}" alt="" style="border-radius: 20px;" /></a>
                  <a href="{{route('brand', $allstores[0]->slug)}}" class="img-pop-up">
                     <div class="deal-details">
                        <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                        <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                     </div>
                  </a>
               </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-3">
               <div class="single-deal">
                  <div class="overlay"></div>
                  <a href="javascript:void(0)"><img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/'.$allstores[1]->logo)}}" alt="Brand For Less" style="border-radius: 20px;" /></a>
                  <a href="{{route('brand', $allstores[1]->slug)}}" class="img-pop-up">
                     <div class="deal-details">
                        <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                        <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                     </div>
                  </a>
               </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-3">
               <div class="single-deal">
                  <div class="overlay"></div>
                  <a href="javascript:void(0)"><img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/'.$allstores[2]->logo)}}" alt="Brand For Less" style="border-radius: 20px;" /></a>
                  <a href="{{route('brand', $allstores[2]->slug)}}" class="img-pop-up">
                     <div class="deal-details">
                        <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                        <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                     </div>
                  </a>
               </div>
            </div>

         </div>

         <!-- <div class="divider"></div> -->

         <div class="row">

            <div class="col-6 col-xs-6 col-sm-6 col-md-3">
               <div class="single-deal">
                  <div class="overlay"></div>
                  <a href="javascript:void(0)"><img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/'.$allstores[3]->logo)}}" alt="Brand For Less" style="border-radius: 20px;" /></a>
                  <a href="{{route('brand', $allstores[3]->slug)}}" class="img-pop-up">
                     <div class="deal-details">
                        <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                        <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                     </div>
                  </a>
               </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-3">
               <div class="single-deal">
                  <div class="overlay"></div>
                  <a href="javascript:void(0)"><img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/'.$allstores[4]->logo)}}" alt="Brand For Less" style="border-radius: 20px;" /></a>
                  <a href="{{route('brand', $allstores[4]->slug)}}" class="img-pop-up">
                     <div class="deal-details">
                        <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                        <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                     </div>
                  </a>
               </div>
            </div>

            <div class="col-md-6 col-xs-12 mb-3">
               <div class="single-deal v-tile">
                  <div class="overlay"></div>
                  <a href="javascript:void(0)"><img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/'.$allstores[5]->logo)}}" alt="" style="border-radius: 20px;" /></a>
                  <a href="{{route('brand', $allstores[5]->slug)}}" class="img-pop-up">
                     <div class="deal-details">
                        <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                        <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
                     </div>
                  </a>
               </div>
            </div>
         </div>

      </div>
   </section>
   <!-- All Stores Section End-->

   <!-- <div class="divider"></div> -->

   <!--Ads Section 2 Start Here-->
   <section class="my-lg-12 my-8">
      <div class="container ad-container np-container">
         <div class="row">
            <div class="col-12">
               <img src="{{URL::to('/public/web_assets/images/banner/ads.avif')}}">
         </div>
      </div>
   </section>
   <!--Ads Section 2 End Here-->

   <div class="divider"></div>

</main>

<!-- Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body p-8">
            <div class="position-absolute top-0 end-0 me-3 mt-3">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
               <div class="col-lg-6">
                  <!-- img slide -->
                  <div class="product productModal" id="productModal">
                     <div class="zoom" onmousemove="zoom(event)" style="background-image: url(assets/images/products/product-single-img-1.jpg)">
                        <!-- img -->
                        <img src="{{URL::to('/public')}}/web_assets/images/products/product-single-img-1.jpg" alt="" />
                     </div>
                     <div>
                        <div class="zoom" onmousemove="zoom(event)" style="background-image: url(assets/images/products/product-single-img-2.jpg)">
                           <!-- img -->
                           <img src="{{URL::to('/public')}}/web_assets/images/products/product-single-img-2.jpg" alt="" />
                        </div>
                     </div>
                     <div>
                        <div class="zoom" onmousemove="zoom(event)" style="background-image: url(assets/images/products/product-single-img-3.jpg)">
                           <!-- img -->
                           <img src="{{URL::to('/public')}}/web_assets/images/products/product-single-img-3.jpg" alt="" />
                        </div>
                     </div>
                     <div>
                        <div class="zoom" onmousemove="zoom(event)" style="background-image: url(assets/images/products/product-single-img-4.jpg)">
                           <!-- img -->
                           <img src="{{URL::to('/public')}}/web_assets/images/products/product-single-img-4.jpg" alt="" />
                        </div>
                     </div>
                  </div>
                  <!-- product tools -->
                  <div class="product-tools">
                     <div class="thumbnails row g-3" id="productModalThumbnails">
                        <div class="col-3" class="tns-nav-active">
                           <div class="thumbnails-img">
                              <!-- img -->
                              <img src="{{URL::to('/public')}}/web_assets/images/products/product-single-img-1.jpg" alt="" />
                           </div>
                        </div>
                        <div class="col-3">
                           <div class="thumbnails-img">
                              <!-- img -->
                              <img src="{{URL::to('/public')}}/web_assets/images/products/product-single-img-2.jpg" alt="" />
                           </div>
                        </div>
                        <div class="col-3">
                           <div class="thumbnails-img">
                              <!-- img -->
                              <img src="{{URL::to('/public')}}/web_assets/images/products/product-single-img-3.jpg" alt="" />
                           </div>
                        </div>
                        <div class="col-3">
                           <div class="thumbnails-img">
                              <!-- img -->
                              <img src="{{URL::to('/public')}}/web_assets/images/products/product-single-img-4.jpg" alt="" />
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="ps-lg-8 mt-6 mt-lg-0">
                     <a href="#!" class="mb-4 d-block">Bakery Biscuits</a>
                     <h2 class="mb-1 h1">Napolitanke Ljesnjak</h2>
                     <div class="mb-4">
                        <small class="text-warning">
                           <i class="bi bi-star-fill"></i>
                           <i class="bi bi-star-fill"></i>
                           <i class="bi bi-star-fill"></i>
                           <i class="bi bi-star-fill"></i>
                           <i class="bi bi-star-half"></i>
                        </small>
                        <a href="#" class="ms-2">(30 reviews)</a>
                     </div>
                     <div class="fs-4">
                        <span class="fw-bold text-dark">$32</span>
                        <span class="text-decoration-line-through text-muted">$35</span>
                        <span><small class="fs-6 ms-2 text-danger">26% Off</small></span>
                     </div>
                     <hr class="my-6" />
                     <div class="mb-4">
                        <button type="button" class="btn btn-outline-secondary">250g</button>
                        <button type="button" class="btn btn-outline-secondary">500g</button>
                        <button type="button" class="btn btn-outline-secondary">1kg</button>
                     </div>
                     <div>
                        <!-- input -->
                        <!-- input -->
                        <div class="input-group input-spinner">
                           <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                           <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                           <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                        </div>
                     </div>
                     <div class="mt-3 row justify-content-start g-2 align-items-center">
                        <div class="col-lg-4 col-md-5 col-6 d-grid">
                           <!-- button -->
                           <!-- btn -->
                           <button type="button" class="btn btn-primary">
                              <i class="feather-icon icon-shopping-bag me-2"></i>
                              Add to cart
                           </button>
                        </div>
                        <div class="col-md-4 col-5">
                           <!-- btn -->
                           <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                           <a class="btn btn-light" href="#!" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Wishlist"><i class="feather-icon icon-heart"></i></a>
                        </div>
                     </div>
                     <hr class="my-6" />
                     <div>
                        <table class="table table-borderless">
                           <tbody>
                              <tr>
                                 <td>Product Code:</td>
                                 <td>FBB00255</td>
                              </tr>
                              <tr>
                                 <td>Availability:</td>
                                 <td>In Stock</td>
                              </tr>
                              <tr>
                                 <td>Type:</td>
                                 <td>Fruits</td>
                              </tr>
                              <tr>
                                 <td>Shipping:</td>
                                 <td>
                                    <small>
                                       01 day shipping.
                                       <span class="text-muted">( Free pickup today)</span>
                                    </small>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection