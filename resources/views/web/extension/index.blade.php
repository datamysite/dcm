<!DOCTYPE html>
<html>
<head>
    <title>DCM</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            height: 20px;
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

        #couponSection .brand-img img {
            filter: none !important;
            width: 70px;
            height: 87px;
        }
        #couponSection .brand-img p {
            width: 70px;
            border-bottom-right-radius: 7px;
            border-bottom-left-radius: 7px;
            bottom: -16px;
        }
        #couponSection .brand-img {
            background-color: #fff;
                padding-bottom: 0;
                border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            filter: drop-shadow(#e6e6e6 5px 4px 7px);
            transition: all ease-in-out .1s;
        }
        #couponSection .col-12 {
            margin-bottom: 15px;
        }
        #couponSection .brand-img h4 {
            position: absolute;
            left: 80px;
            top: 10px;
            font-size: 13px;
            padding-right: 15px;
            transition: all ease-in-out .3s;
        }
        #couponSection .brand-img .show-coupon-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            text-decoration: none;
            background-color: #1baae3;
            color: #fff;
            padding: 2px 15px;
            font-weight: 600;
            border:1px solid #1baae3;
            transition: all ease-in-out .3s;
        }

        #couponSection .brand-img:hover {
            background-color: #efefef;
        }

        #couponSection .brand-img:hover > p{
            height: 87px;
            width: 70px;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        #couponSection .brand-img:hover > p span{
            font-size: 32px;
            line-height: 30px;
            margin-bottom: -4px;
        }
        #couponSection .brand-img:hover > p span font{
            font-size: 12px;
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

    </style>
    <div class="blur-container"></div>
    <div class="container dcm-container">
        <header class="text-center">
            <div class="menu">
            <img class="logo" width="70.287px" height="20px" src="https://dealsandcouponsmena.com/public/web_assets/images/logo/m-logo.png">
            <p><img width="30px" height="30px" src="https://dealsandcouponsmena.com/public/pointing.png"> Exclusively for you</p>
            </div>

            <div class="form-group d-flex flex-column align-items-end">
                <input type="text" name="search" placeholder="Search" id="mainSearch" class="form-control form-control-sm">
                <img class="icon" src="{{URL::to('public/search.png')}}">
            </div>
            <hr>

              <ul class="nav justify-content-between nav-pills" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="javascript:void(0)" id="couponTab">Coupons</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="javascript:void(0)" id="brandTab">Brands</a>
                </li>
              </ul>
        </header>

        <!-- Nav pills -->
          <!-- Tab panes -->
          <div class="tab-content">
            <div id="brands" class="container tab-pane fade">
                <section id="homeSection">
                    <img class="loader" src="{{URL::to('public/ext-loader.gif')}}">
                </section>
            </div>
            <div id="coupons" class="container tab-pane active">
                <section id="couponSection">
                    <img class="loader" src="{{URL::to('public/ext-loader.gif')}}">
                </section>
            </div>
          </div>

        <footer>
            Go to <a href="https://dealsandcouponsmena.com/en/dubai" target="_blank">DCM Website
            </a>
        </footer>
    </div>
    <script src="{{URL::to('public/ext/script.js')}}"></script>
</body>

</html>