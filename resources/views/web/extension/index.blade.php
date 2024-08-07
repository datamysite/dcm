@php
    $eurl = url()->full();
    $pos = strpos($eurl, "/".app()->getLocale()."/");
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Home | DCM Extension</title>
    <meta charset="utf-8">
    <meta name="host_name" content="{{$host_name}}">
    <meta name="state_name" content="{{$state_name}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    
    @include('web.extension.includes.head')

</head>
<body>
    <input type="hidden" id="curr_url" value="{{$url}}">
    <style type="text/css">
        
        body{
            background-color: transparent;
        }
        .blur-container{
            position: absolute;
            top: 0;
            right: 0;
            height: 100vh;
            width: 100%;
            backdrop-filter: blur(5px);
        }

        ::-webkit-scrollbar {
          width: 2px;               /* width of the entire scrollbar */
        }

        ::-webkit-scrollbar-track {
          background: #e6e6e6;        /* color of the tracking area */
        }

        ::-webkit-scrollbar-thumb {
          background-color: #777;    /* color of the scroll thumb */
          border-radius: 10px;       /* roundness of the scroll thumb */
          border: none;  /* creates padding around scroll thumb */
        }

        .dcm-container {
                position: fixed;
                right: 80px;
                top: 145px;
                    box-shadow: inset 2px -2em 3em rgb(255 255 255 / 14%), 0px 0px 0 0px white, -5px 5px 17px 0px rgb(191 191 191 / 49%);
                border-radius: 10px;
                overflow: hidden;
        }
        .dcm-container-ar{
            direction: rtl;
        }
        .dcm-widget {
            position: fixed;
            right: 0;
            top: 100px;
        }
        .dcm-icon {
            background-color: #ffffff;
            padding: 6px 14px 12px;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            box-shadow: inset 0 -3em 3em rgb(255 255 255 / 14%), 0px 0px 0 0px white, -1px 4px 17px 0px rgb(191 191 191 / 49%);
                text-decoration: none;
            position: relative;
        }
        .dcm-icon img {
            width: 35px;
        }
        .dcm-icon .dcm-count {
            position: absolute;
            left: -3px;
            bottom: -3px;
            background-color: #02c302;
            color: #fff;
            border-radius: 50%;
            font-size: 11px;
            padding: 0px 3px 0px 3px;
            font-weight: 500;
        }


        .menu {
            display: flex;
            justify-content: space-between;
                align-items: center;
        }
        .menu button {
            border: none;
            background-color: transparent;
            height: 20px;
            line-height: 10px;
            font-family: cursive;
            color: #1baae3;
            font-weight: 500;

        }
        .menu button:hover {
            background-color: #d3d3d3;
            border-radius: 4px;
        }
        .container {
            max-width: 350px;
            width: 100%;
            background-color: #fff;
            padding: 0px;
        }
        header {
            background-color: #e6e6e6;
            width: 350px;
            padding: 0 12px;
        }
        header .logo {
            width: auto;
            height: 25px;
            margin: 8px 0px;
        }
        header .icon {
            padding: 0px 10px;
            margin-top: -22px;
            margin-bottom: 10px;
            filter: brightness(1.1) invert(0);
        }
        header .form-control{
            border-radius: 15px;
        }
        header hr {
            margin: 5px auto;
            width: 90%;
        }

        section {
            padding: 8px 10px 0px;
            height: 390px;
            width: 100%;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .section-heading {
            color: #ffffff;
            background-color: #1baae3;
            padding: 3px 11px;
            margin-left: -12px;
            width: 350px;
        }
        .brand-img {
            position: relative;
            padding-bottom: 10px;
        }
        .brand-img img{
            width: 100%;
            height: auto;
            border-radius: 10px;
            filter: drop-shadow(#e6e6e6 5px 4px 7px);
        }
        .brand-img p {
            font-size: 10px;
            background-color: #1baae3;
            position: absolute;
            bottom: 2px;
            z-index: 9;
            width: 100%;
            color: #fff;
            text-align: center;
        }
        .brand-img p span {
            font-weight: 700;
            font-size: 12px;
            color: gold;
        }

        .nav {
            margin-left: -12px;
            border: 2px solid #e6e6e6;
            padding: 2px;
            width: 350px;
            z-index: 9;
            background-color: #fff;
        }
        .nav-item {
            width: 50%;
        }
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color: #1baae3;
            background-color: #e6e6e6;
            font-weight: 600;
        }
        .nav-pills .nav-link {
            text-align: center;
            border-radius: 0;
        }
        .nav-link{
            color: #000;
        }
        .nav-link:focus, .nav-link:hover {
            color: #000000;
            background-color: #e6e6e661 !important;
        }
        .tab-content>.active {
            opacity: 1;
        }
        .loader {
            width: 100%;
            height: 372px;
            aspect-ratio: 2 / 1;
            object-fit: cover;
            filter: hue-rotate(71deg) saturate(1);
        }

        .couponSection .brand-img img {
            filter: none !important;
            width: 70px;
            height: 87px;
        }
        .couponSection .brand-img p {
            width: 70px;
            border-bottom-right-radius: 7px;
            border-bottom-left-radius: 7px;
            bottom: -16px;
        }
        .couponSection .brand-img {
            background-color: #fff;
                padding-bottom: 0;
                border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            filter: drop-shadow(#e6e6e6 5px 4px 7px);
            transition: all ease-in-out .1s;
        }
        .couponSection .col-12 {
            margin-bottom: 15px;
        }
        .couponSection .brand-img h4 {
            font-family: monospace;
            text-align: center;
            position: absolute;
            left: 75px;
            top: 10px;
            font-size: 13px;
            transition: all ease-in-out .3s;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .couponSection .brand-img .show-coupon-btn {
            position: absolute;
            bottom: 35px;
            right: 48px;
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            transition: all ease-in-out .3s;
        }

        .couponSection .brand-img:hover {
            background-color: #efefef;
        }

        .couponSection .brand-img:hover > p{
            height: 87px;
            width: 70px;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .couponSection .brand-img:hover > p span{
            font-size: 32px;
            line-height: 30px;
            margin-bottom: -4px;
        }
        .couponSection .brand-img:hover > p span font{
            font-size: 12px;
        }

         .login-block {
            background-color: #e6e6e65c;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            height: -webkit-fill-available;
            position: relative;
        }
        .login-block .coins {
            width: 130px;
            margin-top: 10px;
        }
        .login-block .title {
            text-align: center;
            font-size: 15px;
            line-height: 20px;
            margin-top: 9px;
        }
        .login-block h5 {
            margin-bottom: -5px;
            margin-top: 10px;
        }
        .login-block .google-login {
            border: 1px solid rgb(66, 133, 244);
            border-radius: 20px;
            padding: 5px 16px;
            margin-bottom: 5px;
            width: 75%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-decoration: auto;
            color: rgb(66, 133, 244);
            font-weight: 600;
        }
        .login-block .google-login:hover {
            background-color: rgb(66, 133, 244);
            color: #fff;
        }

        .login-block .google-login:hover img {
            filter: brightness(0) invert(1);
        }
        .google-login img {
            margin-top: -1px;
        }

        .login-block .email-login {
            border: 1px solid #1dace3;
            border-radius: 20px;
            padding: 5px 16px;
            margin-bottom: 5px;
            width: 75%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: auto;
            color: #1dace3;
            font-weight: 600;
            margin-top: 8px;
        }
        .login-block .email-login:hover {
            background-color: #1dace3;
            color: #fff;
        }
        .or {
            background-color: #f6f6f6;
            margin-top: -28px;
            z-index: 9;
            padding: 0 12px;
            font-weight: 600;
        }

        .sign-up-text {
            text-align: center;
            font-size: 13px;
            margin: 5px 0;
        }
        .sign-up-text a {
            text-decoration: auto;
            font-weight: 600;
            color: #f11e4b;
        }
        .guest-btn {
            position: absolute;
            bottom: 10px;
            text-decoration: auto;
            color: #f11e4b;
            font-weight: 600;
        }

        footer {
            background-color: #e6e6e6;
            width: 350px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            font-weight: 600;
        }
        footer a {
            color: #1baae3;
            text-decoration: none;
        }
        footer a:hover {
            color: #000;
        }
        .dcm-container header p {
            margin: 0;
            background-color: #feee00;
            font-size: 14px;
            padding: 3px 10px;
            border-radius: 0;
            font-weight: 600;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 350px;
            margin-left: -12px;
        }
        .dcm-container .menu .icons img{
            border-radius: 3px;
        }



        .button.has-code{
          position: relative;
          width: 170px;
          font-weight: 700;
        }

        .has-code .is-code {
            position: absolute;
            right: 0;
            top: 0;
            height: 30px;
            line-height: 30px;
            width: 100%;
            text-align: right;
            padding: 0 9px;
            background-color: #f2fbff;
            outline: 1px dashed #1baae3;
            letter-spacing: 2px;
            color: #000;
                border-radius: 12px;
        }
        .is-code-text {
            position: absolute;
            left: 0;
            top: 0;
            width: 80%;
            z-index: 5;
            height: 30px;
            line-height: 30px;
            background-color: #1baae3;
            transition: width .5s;
            outline: 1px solid #1baae3;
            color: white;
            text-align: center;
                border-radius: 12px 0 0 12px;
        }

        .is-code-text em{
          position: relative;
          width: 100%;
          display: block;
           font-style: normal;
        }

        .is-code-text em::after {
            content: " ";
            display: block;
            width: 56px;
            height: 100%;
            position: absolute;
            border-radius: 0 0 4px 4px;
            right: -38px;
            top: 11px;
            -webkit-transform: rotate(20deg) translateY(-10px) scaleX(.8);
            -ms-transform: rotate(20deg) translateY(-10px) scaleX(.8);
            transform: rotate(20deg) translateY(-10px) scaleX(.8);
            background: -webkit-linear-gradient(38deg, #0e98cf, #1baae3 49%, hsla(80, 71%, 73%, 0) 50%, hsla(0, 0%, 100%, 0));
            background: linear-gradient(38deg, #0e98cf, #1baae3 49%, hsla(80, 71%, 73%, 0) 50%, hsla(0, 0%, 100%, 0));
            background-position: 0 4px;
            background-repeat: no-repeat;
            z-index: 13;
        }

        .is-code-text em::before {
            display: block;
            content: " ";
            width: 23px;
            height: 10px;
            background-color: #0e7097;
            position: absolute;
            z-index: 12;
            right: -14px;
            bottom: -1px;
            -webkit-transform: skew(12deg);
            -ms-transform: skew(12deg);
            transform: skew(28deg);
        }

        .dcm-container .menu .icons a {
            color: #000;
            text-decoration: none;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
        }
        .dcm-container .menu .icons {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        
        /* Arabic Style */

        .dcm-container-ar .nav {
            margin-right: -12px;
        }
        .dcm-container-ar .couponSection .brand-img h4 {
            right: 75px;
            left: 0;
        }
        .dcm-container-ar .couponSection .brand-img .show-coupon-btn {
            position: absolute;
            bottom: 35px;
            right: 110px;
        }

        .dcm-container-ar  header p {
            margin-right: -12px !important;
        }
        .dcm-container .menu .icons img{
            border-radius: 3px;
        }

    </style>
    <div class="blur-container"></div>

    <div class="index-section"  {{Auth::check() ? 'style=display:block;' : 'style=display:none;'}}>
        <div class="container dcm-container dcm-container-en"  {{app()->getLocale() == 'ar' ? 'style=display:none;' : ''}}>
            <header class="text-center">
                <p><img width="20px" height="20px" src="https://dealsandcouponsmena.com/public/pointing.png">&nbsp;&nbsp;Exclusively for you</p>
                <div class="menu">
                <img class="logo" width="87.859px" height="25px" src="https://dealsandcouponsmena.com/public/web_assets/images/logo/m-logo.png">
                <div class="icons">
                    <a href="javascript:void(0)" class="changeLang" data-lang="ar">
                        <img width="10px" height="10px" src="https://dealsandcouponsmena.com/public/web_assets/images/icons/globe.svg"> AR
                    </a>
                    <a href="javascript:void(0)">
                        <img width="20px" height="14px" src="{{$host_name}}/public/web_assets/images/countries/{{$country_id}}.png">
                    </a>

                </div>
                </div>

                <div class="form-group d-flex flex-column align-items-end">
                    <input type="text" name="search" placeholder="Search" id="mainSearch" onfocus="return gtag_report_searchbar;" class="form-control form-control-sm">
                    <img class="icon" src="{{URL::to('public/search.png')}}">
                </div>
                <hr>

                  <ul class="nav justify-content-between nav-pills" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link coupon-tab-btn active" href="javascript:void(0)" onclick="return gtag_report_coupontab;" id="en-couponTab">Coupons</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link brand-tab-btn" href="javascript:void(0)" onclick="return gtag_report_brandtab;" id="en-brandTab">Brands</a>
                    </li>
                  </ul>
            </header>

            <!-- Nav pills -->
              <!-- Tab panes -->
              <div class="tab-content">
                <div id="en-brands" class="container tab-pane fade">
                    <section id="en-homeSection" class="homeSection">
                        <img class="loader" src="{{URL::to('public/ext-loader.gif')}}">
                    </section>
                </div>
                <div id="en-coupons" class="container tab-pane active">
                    <section id="en-couponSection" class="couponSection">
                        <img class="loader" src="{{URL::to('public/ext-loader.gif')}}">
                    </section>
                </div>
              </div>

            <footer>
                Go to <a href="https://dealsandcouponsmena.ae/en" target="_blank">dealsandcouponsmena
                </a>
            </footer>
        </div>

        <div class="container dcm-container dcm-container-ar" {{app()->getLocale() == 'en' ? 'style=display:none;' : ''}}>
            <header class="text-center">
                <p><img width="20px" height="20px" src="https://dealsandcouponsmena.com/public/pointing.png">&nbsp;&nbsp;حصريا لك</p>
                <div class="menu">
                <img class="logo" width="87.859px" height="25px" src="https://dealsandcouponsmena.com/public/web_assets/images/logo/m-logo.png">
                <div class="icons">
                    <a href="javascript:void(0)" class="changeLang" data-lang="en">
                        <img width="10px" height="10px" src="https://dealsandcouponsmena.com/public/web_assets/images/icons/globe.svg"> EN
                    </a>
                    <a href="javascript:void(0)">
                        <img width="20px" height="14px" src="{{$host_name}}/public/web_assets/images/countries/{{$country_id}}.png">
                    </a>
                </div>
                </div>

                <div class="form-group d-flex flex-column align-items-end">
                    <input type="text" name="search" placeholder="Search" id="mainSearch" class="form-control form-control-sm">
                    <img class="icon" src="{{URL::to('public/search.png')}}">
                </div>
                <hr>

                  <ul class="nav justify-content-between nav-pills" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link coupon-tab-btn active" href="javascript:void(0)" onclick="return gtag_report_coupontab;" id="ar-couponTab">كوبونات</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link brand-tab-btn" href="javascript:void(0)" onclick="return gtag_report_brandtab;" id="ar-brandTab">العلامات التجارية</a>
                    </li>
                  </ul>
            </header>

            <!-- Nav pills -->
              <!-- Tab panes -->
              <div class="tab-content">
                <div id="ar-brands" class="container tab-pane fade">
                    <section id="ar-homeSection" class="homeSection">
                        <img class="loader" src="{{URL::to('public/ext-loader.gif')}}">
                    </section>
                </div>
                <div id="ar-coupons" class="container tab-pane active">
                    <section id="ar-couponSection" class="couponSection">
                        <img class="loader" src="{{URL::to('public/ext-loader.gif')}}">
                    </section>
                </div>
              </div>

            <footer>
                اذهب إلى <a href="https://dealsandcouponsmena.ae/ar" target="_blank">dealsandcouponsmena
                </a>
            </footer>
        </div>
    </div>

    <div class="login-section" {{Auth::check() ? 'style=display:none;' : 'style=display:block;'}}>
         <div class="container dcm-container dcm-container-en"  {{app()->getLocale() == 'ar' ? 'style=display:none;' : ''}}>
            <header class="text-center">
                <div class="menu">
                    <img class="logo" width="87.859px" height="25px" src="https://dealsandcouponsmena.com/public/web_assets/images/logo/m-logo.png">
                    <div class="icons">
                        <a href="javascript:void(0)">
                            <img width="20px" height="14px" src="{{$host_name}}/public/web_assets/images/countries/{{$country_id}}.png">
                        </a>

                    </div>
                </div>
            </header>

            
            <section id="en-homeSection" class="homeSection">
                <div class="login-block">
                    <img class="coins" src="{{URL::to('/public/coins.png')}}">
                    <h5>Welcome!</h5>
                    <p class="title">Explore your preferred shops, apply discount codes, and earn cashback rewards.</p>

                    <a class="google-login" href="{{route('auth.google')}}" target="_blank"><img src="{{URL::to('/public/google-o.png')}}" height="25px"> Sign in with Google</a>
                    <hr style="width: 100%;">
                    <span class="or">OR</span>

                    <a class="email-login" href="{{$host_name}}en/dubai?ref=signin" target="_blank">Sign in with e-mail</a>
                    <p class="sign-up-text">Don`t have an account yet? <a href="{{$host_name}}en/dubai?ref=signup" target="_blank">Create</a></p>

                </div>
            </section>

            <footer>
                <a href="javascript:void(0)" class="login-guest" >Continue as a Guest
                </a>
            </footer>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{URL::to('public/ext/script.js')}}"></script>
    <script type="text/javascript">
        $(document).on('click', '.changeLang', function(){
            var lang = $(this).data('lang');
            console.log(lang);

            if(lang == "en"){
                $('.dcm-container-ar').css({display: "none"});
                $('.dcm-container-en').css({display: "block"});
            }else{
                $('.dcm-container-en').css({display: "none"});
                $('.dcm-container-ar').css({display: "block"});
            }
        });

        $(document).on('click', '.login-guest', function(){
           $('.login-section').css({display: 'none'});
           $('.index-section').css({display: 'block'});
        });
    </script>


    @include('web.extension.includes.body')

    <script type="text/javascript">
        function gtag_report_showcoupon(url) {
          var callback = function () {
            if (typeof(url) != 'undefined') {
              window.location = url;
            }
          };
          gtag('event', 'show_coupon', {
            'button_name': 'myBtn',
            'screen_name': 'Brand'
          });
          return false;
        }

        function gtag_report_brandtab(url) {
          var callback = function () {
            if (typeof(url) != 'undefined') {
              window.location = url;
            }
          };
          gtag('event', 'brand_tab', {
            'button_name': 'myBtn',
            'screen_name': 'Brand'
          });
          return false;
        }

        function gtag_report_coupontab(url) {
          var callback = function () {
            if (typeof(url) != 'undefined') {
              window.location = url;
            }
          };
          gtag('event', 'coupon_tab', {
            'button_name': 'myBtn',
            'screen_name': 'Brand'
          });
          return false;
        }

        function gtag_report_searchbar(url) {
          var callback = function () {
            if (typeof(url) != 'undefined') {
              window.location = url;
            }
          };
          gtag('event', 'coupon_tab', {
            'button_name': 'myBtn',
            'screen_name': 'Brand'
          });
          return false;
        }
    </script>
</body>

</html>