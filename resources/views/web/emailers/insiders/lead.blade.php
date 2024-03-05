<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta content="Codescandy" name="author" />
<title>DCM</title>

<link rel="shortcut icon" type="image/x-icon" href="https://www.dealsandcouponsmena.com/public/web_assets/images/logo/dcm-logo-r.png" />

<head>
    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- Theme CSS -->
    <link rel="stylesheet" href="https://www.dealsandcouponsmena.com/public/web_assets/css/theme.min.css" />
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>

    <main>


        <section class="mt-10">
            <div class="container">
                <div class="dcm_banner" style="background: url(https://www.dealsandcouponsmena.com/public/web_assets/images/banner/dcm_banner.png) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                    <div class="row">
                        <img class="w-15" src="{{URL::to('/public/web_assets/images/emails')}}/logo_wt_txt.png" alt="DCM" style="padding-left: 30px; padding-top:30px">
                    </div>
                    <div class="row mt-5" style="justify-content: center;">
                        <img class="w-50" src="{{URL::to('/public/web_assets/images/emails')}}/laptop.png" alt="DCM">
                    </div>
                </div>
            </div>
        </section>

        <!-- section -->
        <section class="my-lg-5 my-8">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-12 col-12">
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-0" style="font-size: larger;">
                                <h5 style="text-align: center; color:#00C5FF">You Received New Lead!</h5>
                                </p>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Business Name</th>
                                        <td>{{$business_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Business Address</th>
                                        <td>{{$business_address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$first_name.' '.$last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{$phone_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{$category}}</td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <hr style=" height: 1px; background-color: black;   border: none;margin: 10px 0;">

                    <p class="mt-0 text-center">
                        <a href="  https://dealsandcouponsmena.com/dubai/privacy-policy" style="color: #00C5FF;">Privacy Policy</a> | <a href="  https://dealsandcouponsmena.com/dubai/terms" style="color: #00C5FF;">Terms & Conditions</a> | <a href="  https://dealsandcouponsmena.com/dubai/faqs" style="color: #00C5FF;">FAQ</a>
                    </p>
                    <p class="text-center">
                        ©
                        <span id="copyright">
                        </span>
                        <a href="http://dealsandcouponsmena.com/" target="_blank" style="color: #00C5FF;">Dealsandcouponsmena</a>
                    </p>
                </div>
            </div>
        </section>
    </main>
</body>

</html>