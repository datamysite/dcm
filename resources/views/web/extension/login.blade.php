@php
    $eurl = url()->full();
    $pos = strpos($eurl, "/".app()->getLocale()."/");
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Login | DCM Extension</title>
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
                top: 240px;
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
            padding: 8px 10px 8px;
            height: 390px;
            width: 100%;
            overflow-y: scroll;
            overflow-x: hidden;
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
            padding: 5px 0;
            font-size: 14px;
            font-weight: 600;
        }
        footer a {
            color: #f11e4b;
            text-decoration: none;
        }
        footer a:hover, .sign-up-text a:hover {
            color: #000;
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

      

    </style>
    <div class="blur-container"></div>

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

                <a class="google-login" href="{{route('auth.google')}}" target="_self"><img src="{{URL::to('/public/google-o.png')}}" height="25px"> Sign in with Google</a>
                <hr style="width: 100%;">
                <span class="or">OR</span>

                <a class="email-login" href="{{$host_name}}en/dubai?ref=signin" target="_blank">Sign in with e-mail</a>
                <p class="sign-up-text">Don`t have an account yet? <a href="{{$host_name}}en/dubai?ref=signup" target="_blank">Create</a></p>

            </div>
        </section>

        <footer>
            <a href="javascript:void(0)" class="login-guest" data-href="{{route('ext.open', [$url])}}?ref=guest" target="_self">Continue as a Guest
            </a>
        </footer>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            var src = $(this).data('href');

            window.location.href = src;
        });
    </script>

    @include('web.extension.includes.body')
    
</body>

</html>