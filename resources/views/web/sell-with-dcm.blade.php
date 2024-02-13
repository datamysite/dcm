@extends('web.includes.master')

@section('content')


<section class="mt-15">

    <div class="mt-16">
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <!-- breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="Home" style="color: #000;"><strong>Home</strong></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="Sell-With-DCM" style="color:#1DACE3;"><strong>Sell With DCM</a></strong></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- registration section Start Here -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="mb-5">
                    <!-- heading -->
                    <h2 style="text-align: left;">Promot you bussines with DCM </h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row mb-10">
            <!-- col -->
            <div class="col-lg-12 col-12">
                <div class="row align-items-center mb-0">
                    <div class="col-lg-12">
                        <!-- text -->
                        <div class="text-center text-md-start">
                            <p class="mb-5 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                of type and scrambled it to make a type specimen book. It has survived not only five centuries...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-10">

            <div class="col-lg-6">
                <!-- text -->
                <div class="text-center text-md-start">
                    <h1 class="mb-6">Sell With DCM</h1>
                    <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p class="mb-0 lead"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                        Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>

                <div class="mb-5" style="border-radius: 10px;">
                    <!-- img -->
                    <p></p>
                    <img src="{{URL::to('/public')}}/web_assets/images/blog/teslaII.png" alt="" class="img-fluid w-100 rounded" />
                </div>

            </div>

            <div class="col-lg-6">
                <!-- text -->
                <div class="me-6" style="border-radius: 10px;">

                    <form action="#" class="form-control p-10">

                        <div class="input-group py-5">
                            <input class="form-control rounded " type="text" name="business_name" placeholder="Business  name" required="required" />
                        </div>

                        <div class="input-group py-5">
                            <input class="form-control rounded" type="text" name="business_address" placeholder="Business Address" required="required" />
                        </div>

                        <div class="input-group py-5">
                            <input class="form-control rounded " type="text" name="first_name" placeholder="First Name" required="required" />
                        </div>

                        <div class="input-group py-5">
                            <input class="form-control rounded " type="text" name="last_name" placeholder="Last Name" required="required" />
                        </div>

                        <div class="input-group py-5">
                            <input class="form-control rounded " type="eamil" name="user_email" placeholder="Email" required="required" />
                        </div>

                        <div class="input-group py-5">
                            <input class="form-control rounded" type="number" name="phone_number" placeholder="Phone Number" required="required" />
                        </div>

                        <div class="input-group py-5">
                            <input class="form-control rounded " type="eamil" name="user_email" placeholder="Email" required="required" />
                        </div>

                        <div class="input-group py-5">
                            <select class="form-control rounded " type="eamil" name="user_email" required="required">
                                <option value="">Select Business Category</option>
                                <option value="test">test</option>
                                <option value="test">test</option>
                                <option value="test">test</option>
                                <option value="test">test</option>
                            </select>
                        </div>

                        <div class="py-2">
                            <input type="radio" id="other" name="other" value="other"><label for="other" style="padding-left: 5px;"> Receive email when I get referral earnings.</label>

                        </div>

                        <input type="submit" name="sing-up" class="btn btn-signup px-5 " style="font-weight: lighter;" value="Sign Up">
                    </form>

                </div>
            </div>
        </div>

    </div>
</section>
<!-- registration section End Here -->

<!--Ads Section 1 Start Here-->
<section class="my-lg-14 my-8">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-4 bg-light d-lg-flex justify-content-between align-items-center rounded">
                    <div class="p-10">
                        <h2 class="mb-1 fw-bold">One Stop Grocery Shop</h2>
                        <p class="mb-0 lead">
                            dummy text dummy text dummy text dummy text
                            <br />
                            dummy text , dummy text. dummy text , dummy text.
                        </p>
                        <a href="#" class="btn btn-dark mt-5">Get Discount on Share</a>
                    </div>
                    <div class="p-6 d-lg-block d-none"><img src="{{URL::to('/public')}}/web_assets/images/svg-graphics/store-graphics.svg" alt="" class="img-fluid" /></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Ads Section 1 End Here-->


<!-- Our Popular Brans Section Start -->
<section class="my-lg-14 my-8">
    <div class="container">
        <!-- row -->
        <div class="row align-items-center mb-6">
            <div class="col-lg-12 col-12">
                <!-- heading -->
                <h3 class="text-center">
                    <a href="categories.php?category=Offline"><span class="ms-3"><b style="color: #000;">Our Popular Brands</b></span></a>
                </h3>
            </div>
            <div class="col-lg-2 col-2">
                <div class="slider-arrow" id="slider-second-arrows"></div>
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
                                <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/aldo_store.png" alt="Aldo Store" style="border-radius: 20px;" />
                                <a href="#" class="img-pop-up" target="_blank">
                                    <div class="custom_arrow-button2">
                                        <i class="bi bi-arrow-right-circle"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="back">
                                <a href="Store-Products" class="img-pop-up">
                                    <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/aldo_store.png" alt="Aldo Store" style="border-radius: 20px;" />
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
                                <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/sivvi_store.png" alt="Sivvi Store" style="border-radius: 20px;" />
                                <a href="#" class="img-pop-up" target="_blank">
                                    <div class="custom_arrow-button2">
                                        <i class="bi bi-arrow-right-circle"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="back">
                                <a href="Store-Products" class="img-pop-up">
                                    <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/sivvi_store.png" alt="Sivvi Store" style="border-radius: 20px;" />
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
                                <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/namshi_store.png" alt="Namshi Store" style="border-radius: 20px;" />
                                <a href="#" class="img-pop-up" target="_blank">
                                    <div class="custom_arrow-button2">
                                        <i class="bi bi-arrow-right-circle"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="back">
                                <a href="Store-Products" class="img-pop-up">
                                    <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/namshi_store.png" alt="Namshi Store" style="border-radius: 20px;" />
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
                                <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/homzmart-store.png" alt="Homzmart Store" style="border-radius: 20px;" />
                                <a href="#" class="img-pop-up" target="_blank">
                                    <div class="custom_arrow-button2">
                                        <i class="bi bi-arrow-right-circle"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="back">
                                <a href="Store-Products" class="img-pop-up">
                                    <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/homzmart-store.png" alt="Homzmart Store" style="border-radius: 20px;" />
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
                                <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/yalla_toys_store.png" alt="Yalla Toys Store" style="border-radius: 20px;" />
                                <a href="#" class="img-pop-up" target="_blank">
                                    <div class="custom_arrow-button2">
                                        <i class="bi bi-arrow-right-circle"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="back">
                                <a href="Store-Products" class="img-pop-up">
                                    <img class="img-fluid w-100" src="{{URL::to('/public')}}/web_assets/images/stores-logo/yalla_toys_store.png" alt="Yalla Toys Store" style="border-radius: 20px;" />
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
<!-- Our Popular Brans Section  Section End-->


<!-- Why chooce us section start-->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="row">
                <div class="col-12">
                    <div class="mb-5">
                        <!-- heading -->
                        <h2 style="text-align: center;">WHY CHOOSE US</h2>
                    </div>

                </div>
            </div>

            <!-- col -->
            <div class="col-lg-12 col-12">

                <div class="row">
                    <!-- col -->
                    <div class="col-lg-12 col-12">
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-12">
                                <!-- text -->
                                <div class="text-center text-md-start">
                                    <h1 class="mb-6">Maniging to linear 101</h1>
                                    <h3 class="mb-0">What is Lorem Ipsum?</h3>
                                    <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                        of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p>
                                    <p class="mb-5 lead">standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center mb-10">
                        <!-- col -->
                        <div class="col-lg-6">
                            <div class="me-6" style="border-radius: 10px;">
                                <!-- img -->
                                <img src="{{URL::to('/public')}}/web_assets/images/Adv/namshi_store.png" alt="" class="img-fluid w-100 rounded" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- text -->
                            <div>
                                <h1 class="mb-5">About Us</h1>
                                <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                <p class="mb-0 lead"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    It was popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <p class="mb-0 lead">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why chooce us section end-->

@endsection