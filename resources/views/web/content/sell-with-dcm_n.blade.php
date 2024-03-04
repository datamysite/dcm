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
                            <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: #000;"><strong>Home</strong></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>Sell With DCM</a></strong></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</section>


    <!-- registration section Start Here -->
    <section class="my-lg-5 my-8">
        <!-- container -->
        <div class="container np-container">


            <div class="row mb-10">

                <div class="col-lg-6">
                    <!-- text -->
                    <div class="text-center text-md-start">
                        <h1 class="mb-6">Promote Your Business with DCM</h1>
                        <p class="mb-0 lead">Are you a B2B or SME business owner looking to expand your market reach and increase your sales? Partner with us and unlock a world of opportunities.</p>
                     
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

                        <form action="#" class="form-control p-10">

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="text" name="business_name" placeholder="Business  name" required="required" />
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded" type="text" name="business_address" placeholder="Business Address" required="required" />
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="text" name="first_name" placeholder="First Name" required="required" />
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="text" name="last_name" placeholder="Last Name" required="required" />
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="eamil" name="user_email" placeholder="Email" required="required" />
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded" type="number" name="phone_number" placeholder="Phone Number" required="required" />
                            </div>

                            <div class="input-group py-2">
                                <input class="form-control rounded " type="eamil" name="user_email" placeholder="Email" required="required" />
                            </div>

                            <div class="input-group py-2">
                                <select class="form-control rounded " type="eamil" name="user_email" required="required">
                                    <option value="">Select Business Category</option>
                                    @foreach($navbarCategories as $val)
                                        @if(empty($val->parent_id))
                                            <option value="{{$val->name}}">{{$val->name}}</option>
                                        @endif
                                    @endforeach
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
                                    <h1 class="mb-5" style="font-weight: bolder" ;>Why Parent With Us</h1>

                                    <h4>
                                        <li>Market Access</li>
                                    </h4>
                                    <p class="mb-0 lead">Gain access to our extensive network of buyers and reach new markets effortlessly.</p>
                                    <h4>
                                        <li>Brand Exposure</li>
                                    </h4>
                                    <p class="mb-0 lead">Increase your brand visibility and enhance your brand’s reputation among our engaged audience.</p>
                                    <h4>
                                        <li>Sales Growth</li>
                                    </h4>
                                    <p class="mb-0 lead">Boost your sales and expand your customer base with our targeted marketing strategies.</p>
                                    <h4>
                                        <li>Cost-Effective Solutions</li>
                                    </h4>
                                    <p class="mb-0 lead">Benefit from our cost-effective solutions to promote your products/services and maximize your ROI.</p>
                                    <h4>
                                        <li>B2C</li>
                                    </h4>
                                    <p class="mb-0 lead">We also facilitate direct communication between buyers and businesses, ensuring that business owners have access to valuable user data without any communication lag.</p>



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