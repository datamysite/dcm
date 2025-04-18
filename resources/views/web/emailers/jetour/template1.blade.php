<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        body {
            font-family: poppins, Arial;
            font-size: 18px;
            margin-top: 0;
        }

        .container {
            width: 60%;
            margin: auto;
            margin-left: auto;
            margin-right: auto;
        }

        .header {
            display: flex;
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
            width: 80%;
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
            text-align: center;
            width: 100%;
        }

        .social-icons a {
            margin-left: 10px;
            width: 25px;
            height: 25px;
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
            width:100%
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
        }

        .right {
            float: right;
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
        .res-col{
            flex-basis:50%;
        }
        .p10{
            padding: 10px;
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

            .container{
                width: 100%;
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

         @media only screen and (max-width:992px) {
            .container, .header {
                width: 100%;
            }

        }

        @media (max-width: 767px) {
            /*  767px */
            .res-img{
                display: none;
            }
            .res-col{
                flex-basis: 100%;
            }
            .p10{
                padding: 5px;
            }
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

            
        }

        .w-15 {
            width: 15% !important;
        }

        .w-50 {
            width: 50% !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .dcm_banner_mobile {
            display: none;
        }

    </style>
</head>

<body>

    <div class="container">

        <div class="content">


                <div style="justify-content: center; width: 100%;">
                        <img src="https://dealsandcouponsmena.ae/public/emailers/jetour/new/1.png" alt="DCM" style="width: 100%;">
                        <br>
                        <div class="row">
                            <div class="column left res-col">
                                <h4 style="text-align:left; font-size: 24px;">We’re Excited to Announce Our Latest Campaign for Jetour!</h4>
                                <p style="font-size: 16px; text-align: left;">
                                    We are proud to unveil our newest campaign launched for our esteemed client, Jetour. This marks a significant milestone, as Dubai Airport has permitted automobile brand advertising on its premises for the first time in four years!
                                </p>
                            </div>
                            <div class="column right res-col res-img" style="text-align: right;">
                                <br><br>
                                <img src="https://dealsandcouponsmena.ae/public/emailers/jetour/new/2.png" alt="DCM" style="width: 65%;">
                            </div>
                        </div>
                        <div class="divider"></div>
                        <hr style="height: 1px;background-color: black;border: none;margin: 10px 0;width: 100%; margin-top: 40px;"/>
                        <div class="row">
                            <h4 style="text-align:center;font-size:24px;color:#777;letter-spacing: 5px;width: 100%;margin-top: 10px;">DRIVE YOUR FUTURE</h4>
                        </div>

                        <img src="https://dealsandcouponsmena.ae/public/emailers/jetour/new/3.png" alt="DCM" style="width: 100%;">

                        <div class="row">
                            <h2 style="text-align:center; width:100%;margin-top: 30px;margin-bottom: 5px;">Location:</h2>
                        </div>
                        <div class="row">
                            <p style="font-size: 16px; text-align: center; width: 100%;">
                                Dubai Airport, Terminal 3 (Arrivals)
                            </p>
                        </div>
                        <br><br>
                        <img src="https://dealsandcouponsmena.ae/public/emailers/jetour/new/4.png" alt="DCM" style="width: 100%;">
                        <br>
                        <div class="row">
                            <div class="column right p10" style="    flex-basis:48%; text-align: right; ">
                                <img src="https://dealsandcouponsmena.ae/public/emailers/jetour/new/5.png" alt="DCM" style="width: 100%;">
                            </div>
                            <div class="column right p10" style="    flex-basis:48%; text-align: right;">
                                <img src="https://dealsandcouponsmena.ae/public/emailers/jetour/new/6.png" alt="DCM" style="width: 100%;">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <p style="font-size: 16px;text-align: center;padding: 15px 0px 5px;line-height: 24px;">
                                This achievement highlights our commitment to delivering unparalleled visibility for our clients in premium locations.
                            </p>
                        </div>
                        <div class="divider" style="width:60%;"></div>
                        <div class="row">
                            <h2 style="text-align:center; width:100%;margin-top: 30px;margin-bottom: 5px;">Let’s Connect</h2>
                        </div>
                        <div class="row">
                            <p style="font-size: 16px; text-align: center; width: 100%;">
                                Contact us to learn more about this campaign and discover how our services can add value to your business.
                            </p>
                        </div>
                </div>



                <!-- Footer -->

            <div style="padding-top:20px; width:auto; text-align: left; width: 100%;">
                <div class="row" style="margin-top:30px">

                    <div class="column left" style="width: 50%;">
                        <img src="https://dealsandcouponsmena.ae/public/emailers/jetour/new/icon.png" style="width:60px;margin-bottom: -50px;" alt="Instagram">
                        <div class="left-side-icons" style="">
                            Help Center<br><a href="mailto:info@datamysite.com" target="_blank"
                                style="color: #00c5ff; margin-left: 0;width: 100%; font-size:13px">info@datamysite.com</a>
                        </div>
                    </div>

                    <div class="column right" style="flex-basis: 100%; width: 50%; text-align: right;">
                        <div class="social-icons" style="margin-top: 50px;">
                            <a href="https://www.instagram.com/datamysite/" target="_blank">
                                <img src="https://dealsandcouponsmena.ae/public/web_assets/images/emails/instagram.png" alt="Instagram" height="25px" width="25px">
                            </a>
                            <a href="https://www.linkedin.com/company/datamysite/" target="_blank">
                                <img src="https://dealsandcouponsmena.ae/public/web_assets/images/emails/linkedin.png" alt="linkedin" height="25px" width="25px">
                            </a>
                        </div>
                    </div>

                </div>

                <div class="divider"></div>

                <hr style="height: 1px;background-color: black;border: none;margin: 10px 0;width: 100%; margin-top: 40px;"/>

                <div class="footer" style="padding-top: 10px; text-align: center;">

                    <p>
                        You are receiving this email because you are registered with us. if you no longer wish to receive updates, <br>Please 
                        <a href="https://datamysite.com/email/unsubscribe" target="_blank"
                            style="color: #00c5ff;text-decoration: none;">[click here to unsubscribe]</a>
                    </p>
                    <p> <a href="https://datamysite.com/privacy-policy/" target="_blank"
                            style="color: #000; text-decoration: none;">Privacy Policy</a> | <a
                            href="https://datamysite.com/services/" target="_blank" style="color: #000; text-decoration: none;">
                            Services</a> | <a href="https://datamysite.com/faq/" target="_blank"
                            style="color: #000; text-decoration: none;">FAQ</a> </p>
                    <p style=" margin-top: -17px;">

                        <a href="https://datamysite.com/" target="_blank"
                            style="color: #000; text-decoration: none;">©
                            DataMySite</a>
                    </p>

                </div>
            </div>
    </div>
</body>

</html>