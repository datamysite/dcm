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
            width: 49%;
            text-align: left;
        }

        .right {
            float: right;
            width: 49%;
            text-align: right;
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
            /* Good browsers */

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

        .mt-10 {
            margin-top: 5rem !important;
        }

        .dcm_banner_mobile {
            display: none;
        }

        .table tr:nth-child(even){background-color: #f2f2f2;}
        .table {
          border-collapse: collapse;
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
                    <img class="w-15" src="{{URL::to('/public/web_assets/images/emails')}}/logo_wt_txt.png" alt="DCM" style="padding-left: 30px; padding-top:30px; width: 100px; height: auto;">
                </div>

                <div class="row mt-10" style="justify-content: center !important; text-align: center;">
                    <img src="{{URL::to('/public/web_assets/images/emails')}}/laptop.png" alt="DCM"  style="width: 300px; height: auto; margin-left: 30%;">
                </div>
            </div>

            <div class="dcm_banner_mobile">
                <h2 class="text-center" style="padding-top:40px;color:#fff">Welcome</2>
            </div>

        </div>

        <div class="content">

            <div style="color: #00c5ff;">
                <h1>Welcome</h1>
                <h2>To Deals and Coupons Mena</h2>
                <p>
                <h3>Dear, {{$name}}</h3>
                </p>
            </div>

            <p style="padding-top: 0px">

                Explore handpicked deals, exclusive coupons, and daily updates to make your shopping experience unforgettable. Browse our
                website and navigate through your favorite brands to pick from a variety of products and services.
                Search for what you want, buy and block it!

            </p>
            <p>
                Start saving now with

                <a href="https://dealsandcouponsmena.ae" target="_blank"
                    style="font-size: large; color: #00c5ff">
                    <strong style="text-decoration: underline">DealsAndCouponsMENA</strong>
                </a>
            </p>

            <p style="padding-top: 10px">
                <a href="https://dealsandcouponsmena.com/en/dubai/" target="_blank"
                    style="font-size: larger; color: #00c5ff">
                    <strong style="text-decoration: underline">Happy Shopping!</strong>
                </a>
            </p>
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