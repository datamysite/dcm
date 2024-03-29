<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 18px;
        }

        .container {
            width: auto;
            margin: auto;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        .header {
            display: flex;
            width: 60%;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        .text-center {
            text-align: center !important;
        }

        .logo {
            text-align: center;
            align-items: center;
            height: 30%;
            width: 30%;
        }

        .content {
            width: 600px;
            margin-top: 20px;
            text-align: center;
            justify-content: center;
            justify-self: center;
            margin-left: auto;
            margin-right: auto;
        }

        p {
            margin-bottom: 1rem;
            margin-top: 0;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .social-icons a {
            margin-left: 10px;
            width: 30px;
            height: 30px;
            color: #fff;
            line-height: 30px;
            font-size: 18px;
            border-radius: 50%;
            transition: background-color 0.3s ease;
            float: right;
        }

        .social-icons a img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .left-side-icons a {
            margin-left: 10px;
            width: 30px;
            height: 30px;
            color: #fff;
            line-height: 30px;
            font-size: 18px;
            border-radius: 50%;
            transition: background-color 0.3s ease;
            float: left;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -10px;
            /* Adjust the margin value as needed */
        }

        .column {
            flex-basis: 50%;
            /* Adjust the flex-basis value as needed */
            padding: 0px;
            /* Adjust the padding value as needed */
        }

        .left {
            float: left;
            text-align: left;
            width: 49%;
        }

        .right {
            float: right;
            text-align: right;
            width: 49%;
        }

        .divider {
            width: 5px;
            height: 10px;
        }

        .dcm_banner {
            width: 100%;
            height: 450px;
            background-color: beige;
            border-radius: 20px;
            box-shadow: 5px 5px 5px whitesmoke;
            top: 100px;
            opacity: 0.9;
        }


        .btn {
            font-size: 14px;
            padding: 6px 12px;
            margin-bottom: 0;
            border-radius: 10px;
            display: inline-block;
            text-decoration: none;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
        }

        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        @media (max-width: 600px) {
            .header {
                flex-direction: column;
            }

            .container {
                max-width: 600px;
                margin: auto;
                margin-top: 20px;
            }
        }

        /* 2 columns (600px) */
        @media only screen and (min-width:600px) {
            .container .col {
                float: left;
                width: 50%;
            }
        }

        /* 3 columns (768px) */
        @media only screen and (min-width:768px) {
            .container .col {
                width: 33.333%;
            }
        }

        /* 4 columns (992px) */
        @media only screen and (min-width:992px) {
            .container .col {
                width: 25%;
            }
        }

        @media (max-width: 767px) {
            /*  767px */

            .dcm_banner_mobile {
                display: block;
                width: 100%;
                height: 100px;
                background-color: #37b7e5;
                border-radius: 20px;
                box-shadow: 5px 5px 5px whitesmoke;
                top: 100px;
                opacity: 0.9;

            }

            .dcm_banner {
                display: none;
            }

        }

        .w-15 {
            width: 15% !important;
        }

        .w-50 {
            width: 50% !important;
        }

        .mt-3 {
            margin-top: 3rem !important;
        }

        .dcm_banner_mobile {
            display: none;
        }

        .form-control {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-clip: padding-box;
            background-color: #fff;
            border: 1px solid #e0dfe2;
            border-radius: 0.5rem !important;
            color: #21313c;
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1.6;
            padding: 0.55rem 1rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">
            <div class="dcm_banner"
                style="background: url({{URL::to('/public/web_assets/images/emails')}}/dcm_banner.png) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center ; height: 350px;">

                <div class="row">
                    <img class="w-15" src="{{URL::to('/public/web_assets/images/emails')}}/logo_wt_txt.png" alt="DCM" style="padding-left: 30px; padding-top:30px; width:100px; height: auto;">
                </div>

                <div class="row mt-3" style="justify-content: center;">
                    <img src="{{URL::to('/public/web_assets/images/emails')}}/otp.png" alt="DCM" style="width: 220px; margin-left: 38%;">
                </div>
            </div>

           

        </div>

        <div class="content">

            <div style="text-align: left; padding-top: 5px;">

                <h2>HELLO</h2>
                <p>
                <h4>Your one time password (OTP) is.</h4>
                </p>
            </div>

            <div class=" text-center" style="justify-content:center; width: 100%; text-align: center;">

                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[0]}}"
                    style="width: 50px; background-color:#00C5FF; font-size:large;color:#fff">
                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[1]}}"
                    style="width: 50px;background-color:#00C5FF; font-size:large;color:#fff">
                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[2]}}"
                    style="width: 50px;background-color:#00C5FF; font-size:large;color:#fff">
                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[3]}}"
                    style="width: 50px;background-color:#00C5FF; font-size:large;color:#fff">
                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[4]}}"
                    style="width: 50px;background-color:#00C5FF; font-size:large;color:#fff">
                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[5]}}"
                    style="width: 50px;background-color:#00C5FF; font-size:large;color:#fff">

            </div>

            <div class="divider"></div>

            <div style="text-align: left; font-size: 16px; padding-top: 10px;">

                <p>
                    <b>Please note this is a temparary password and will expired in 5 minutes.if you are facing any issue
                        feel free to contact our DCM support team.</b>
                        
                </p>


            </div>

            <p style="text-align: left;">
                <b>Your DCM team,</b>
            </p>

            <div class="row" style="padding-top: 10px;">

                <div class="column right">
                    <div class="left-side-icons">
                        <a href="mailto:info@dealsandcouponsmena.com" target="_blank"
                            style="color: #00c5ff;">info@dealsandcouponsmena.com</a>
                    </div>
                </div>

                <div class="column left">
                    <div class="social-icons">
                        <a href="https://www.instagram.com/dealsandcouponsmena/" target="_blank"><img src="{{URL::to('/public/web_assets/images/emails')}}/instagram.png" alt="Instagram"></a>
                        <a href="https://www.facebook.com/people/Deals-And-Coupons-Mena/100091291623092/" target="_blank"><img src="{{URL::to('/public/web_assets/images/emails')}}/facebook.png" alt="Facebook"></a>
                        <a href="https://ae.linkedin.com/company/dealsandcouponsmena-com" target="_blank"><img src="{{URL::to('/public/web_assets/images/emails')}}/linkedin.png" alt="linkedin"></a>
                    </div>
                </div>

            </div>

            <div class="divider"></div>

            <hr style="
          height: 1px;
          background-color: black;
          border: none;
          margin: 10px 0;
        " />

            <div class="footer" style="padding-top: 10px;">

                <p>
                    You are receiving this email as you’re registered on
                    <a href="https://dealsandcouponsmena.com/en/dubai" target="_blank"
                        style="color: #00c5ff;text-decoration: none;">dealsandcouponsmena.com</a>
                </p>
                </p>
                <p> <a href="https://dealsandcouponsmena.com/en/dubai/privacy-policy" target="_blank"
                        style="color: #00c5ff">Privacy Policy</a> | <a
                        href="https://dealsandcouponsmena.com/en/dubai/terms" target="_blank" style="color: #00c5ff">
                        Terms & Conditions</a> | <a href="https://dealsandcouponsmena.com/en/dubai/faqs" target="_blank"
                        style="color: #00c5ff">FAQ</a> </p>
                <p>

                    <a href="https://dealsandcouponsmena.com/en/dubai" target="_blank"
                        style="color: #00c5ff">©
                        Dealsandcouponsmena</a>
                </p>

            </div>
        </div>
</body>

</html>