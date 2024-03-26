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

        .mt-5 {
            margin-top: 5rem !important;
        }

        .dcm_banner_mobile {
            display: none;
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

                <div class="row mt-5" style="justify-content: center;">
                    <img src="{{URL::to('/public/web_assets/images/emails')}}/pc.png" alt="DCM" style="width: 250px; margin-left: 30%;">
                </div>
            </div>



        </div>

        <div class="content">

            <div style="color: #00c5ff;">
                <h1>Welcome</h1>
                <h2>To Deals and Coupons Mena</h2>
                <p>
                <h3>Dear, {{$first_name.' '.$last_name}}</h3>
                </p>
            </div>

            <p>
                Thank You for Subscribing To Deals and Coupons MENA!
            </p>
            <p style="padding-top: 0px">
                <!-- We are thrilled to have you on board as a valued business
                partner, and we look forward to helping you unlock significant savings for your enterprise. -->
                We look forward to helping you unlock significant savings for your enterprise, 
                while we are verifying your registration information take a look on our shared vision, partnership...etc 
            </p>


            <p>
                <!-- <b>Acknowledgment of Partnership</b> -->

            </p>

            <div style="text-align: left; font-size: 16px;">

                <p>
                    <li> <b>Our Shared Vision:</b> </li>

                    In joining forces, we embark on a journey towards shared success and prosperity. Your commitment to
                    excellence aligns seamlessly with our mission at Deals and Coupons MENA. Together, we are poised to
                    redefine the landscape of savings and value for businesses across the MENA region.

                </p>

                <p>
                    <li><b>What This Partnership Means:</b> </li>

                    This partnership signifies not just a collaboration but a synergy of strengths. By leveraging our
                    expertise in delivering exclusive B2B deals and your unique contributions, we are confident in
                    creating unparalleled opportunities for savings and growth.
                </p>

                <p>
                    <li><b>What Will You Get from this Subscription:</b> </li>

                    Unlike any other company, we will charge you 0% commission on each sale you make, so your sales are
                    completely for you. We will share with you a full customer database, so that your customers are
                    aware
                    of you as their seller. We will provide you with free of cost marketing to improve your business and
                    leads in the market, this includes email marketing, social media posts, SMS marketing, and a chance
                    to
                    be part of an annual huge networking event with all brand leaders!
                </p>

                <p>
                    <li><b>Dedicated Support:</b> </li>

                    As a valued partner, you have been assigned a dedicated account manager, once we are partner you can get an account manager
                    who will be your point of contact for any queries, requests, or assistance you may require throughout our journey together.
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
                    <a href="https://dealsandcouponsmena.com/en/dubai/privacy-policy" target="_blank"
                        style="color: #00c5ff;text-decoration: none;">dealsandcouponsmena.com</a>
                </p>
                </p>
                <p> <a href="https://dealsandcouponsmena.com/en/dubai/privacy-policy" target="_blank"
                        style="color: #00c5ff">Privacy Policy</a> | <a
                        href="https://dealsandcouponsmena.com/en/dubai/terms" target="_blank" style="color: #00c5ff">
                        Terms & Conditions</a> | <a href="https://dealsandcouponsmena.com/en/dubai/faqs" target="_blank"
                        style="color: #00c5ff">FAQ</a> </p>
                <p>

                    <a href="https://dealsandcouponsmena.com/en/dubai/privacy-policy" target="_blank"
                        style="color: #00c5ff">©
                        Dealsandcouponsmena</a>
                </p>

            </div>
        </div>
</body>

</html>