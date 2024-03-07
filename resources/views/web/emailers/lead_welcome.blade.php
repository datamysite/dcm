<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<style>
    body {
        font-family: "arial" !important;
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        background-color: var(--fc-body-bg);
        color: var(--fc-body-color);
        font-family: var(--fc-body-font-family);
        font-size: var(--fc-body-font-size);
        font-weight: var(--fc-body-font-weight);
        line-height: var(--fc-body-line-height);
        margin: 0;
        text-align: var(--fc-body-text-align);
    }

    hr {
        border: 0;
        border-top: 1px solid #dfe2e1;
        color: #dfe2e1;
        margin: 1rem 0;
        opacity: 1;
    }
    main {
        width: 100%;
        overflow: hidden;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: var(--fc-heading-color);
        font-weight: 600;
        line-height: 1.2;
        margin-bottom: 0.5rem;
        margin-top: 0;
    }

    .h1,
    h1 {
        font-size: calc(1.34375rem + 1.125vw);
    }

    .container,
    .container-fluid,
    .container-lg,
    .container-md,
    .container-sm,
    .container-xl,
    .container-xxl {
        --fc-gutter-x: 2rem;
        --fc-gutter-y: 0;
        margin-left: auto;
        margin-right: auto;
        padding-left: calc(var(--fc-gutter-x) * 0.5);
        padding-right: calc(var(--fc-gutter-x) * 0.5);
        width: 100%;
    }

    @media (min-width: 576px) {

        .container,
        .container-sm {
            max-width: 540px;
        }
    }

    @media (min-width: 768px) {

        .container,
        .container-md,
        .container-sm {
            max-width: 720px;
        }
        .dcm_banner {
            width: 92%;
            height: 190px;
        }
    }

    @media (min-width: 992px) {

        .container,
        .container-lg,
        .container-md,
        .container-sm {
            max-width: 960px;
        }
    }

    @media (min-width: 1200px) {

        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl {
            max-width: 1140px;
        }
    }

    @media (min-width: 1400px) {

        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            max-width: 1320px;
        }
    }

    .row>* {
        flex-shrink: 0;
        margin-top: var(--fc-gutter-y);
        max-width: 100%;
        padding-left: calc(var(--fc-gutter-x) * 0.5);
        padding-right: calc(var(--fc-gutter-x) * 0.5);
        width: 100%;
    }

    .col {
        flex: 1 0 0%;
    }

    .row-cols-auto>* {
        flex: 0 0 auto;
        width: auto;
    }

    .row-cols-1>* {
        flex: 0 0 auto;
        width: 100%;
    }

    .row-cols-2>* {
        flex: 0 0 auto;
        width: 50%;
    }

    .row-cols-3>* {
        flex: 0 0 auto;
        width: 33.33333333%;
    }

    .row-cols-4>* {
        flex: 0 0 auto;
        width: 25%;
    }

    .row-cols-5>* {
        flex: 0 0 auto;
        width: 20%;
    }

    .row-cols-6>* {
        flex: 0 0 auto;
        width: 16.66666667%;
    }

    .col-auto {
        flex: 0 0 auto;
        width: auto;
    }

    .col-1 {
        flex: 0 0 auto;
        width: 8.33333333%;
    }

    .col-2 {
        flex: 0 0 auto;
        width: 16.66666667%;
    }

    .col-3 {
        flex: 0 0 auto;
        width: 25%;
    }

    .col-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }

    .col-5 {
        flex: 0 0 auto;
        width: 41.66666667%;
    }

    .col-6 {
        flex: 0 0 auto;
        width: 50%;
    }

    .col-7 {
        flex: 0 0 auto;
        width: 58.33333333%;
    }

    .col-8 {
        flex: 0 0 auto;
        width: 66.66666667%;
    }

    .col-9 {
        flex: 0 0 auto;
        width: 75%;
    }

    .col-10 {
        flex: 0 0 auto;
        width: 83.33333333%;
    }

    .col-11 {
        flex: 0 0 auto;
        width: 91.66666667%;
    }

    .col-12 {
        flex: 0 0 auto;
        width: 100%;
    }

    .offset-1 {
        margin-left: 8.33333333%;
    }

    .offset-2 {
        margin-left: 16.66666667%;
    }

    .offset-3 {
        margin-left: 25%;
    }

    .offset-4 {
        margin-left: 33.33333333%;
    }

    .offset-5 {
        margin-left: 41.66666667%;
    }

    .offset-6 {
        margin-left: 50%;
    }

    .offset-7 {
        margin-left: 58.33333333%;
    }

    .offset-8 {
        margin-left: 66.66666667%;
    }

    .offset-9 {
        margin-left: 75%;
    }

    .offset-10 {
        margin-left: 83.33333333%;
    }

    .offset-11 {
        margin-left: 91.66666667%;
    }


    .my-lg-5 {
        margin-bottom: 1.25rem !important;
        margin-top: 1.25rem !important;
    }

    .my-8 {
        margin-bottom: 2rem !important;
        margin-top: 2rem !important;
    }

    .dcm_banner {
        width: 100%;
        height: 450px;
        background-color: beige;
        border-radius: 20px;
        box-shadow: 5px 5px 5px whitesmoke;

        top: 50px;
        opacity: 0.9;
        /* Good browsers */

    }

    .dcm_banner_mobile {
        display: none;
    }


    .about-us-icon {
        width: 100px;
        height: 100px;
        border: 2px solid var(--fc-gray);
        border-radius: 50%;
    }

    .about-us-title {
        font-size: 20px;
        font-weight: bolder;
        margin: 20px 0;
    }

    .about-us-text {
        font-size: 16px;
    }

    .list-inline,
    .list-unstyled {
        list-style: none;
        padding-left: 0;
    }

    .list-inline-item {
        display: inline-block;
    }

    .list-inline-item:not(:last-child) {
        margin-right: 0.5rem;
    }

    .mt-10 {
        margin-top: 3rem !important;
    }

    .me-1 {
        margin-right: 0.25rem !important;
    }


    .text-end {
        text-align: right !important;
    }

    .text-center {
        text-align: center !important;
    }

    .mt-md-0 {
        margin-top: 0 !important;
    }

    .mt-3 {
        margin-top: 0.75rem !important;
    }

    .small,
    small {
        font-size: 0.875em;
    }

    .text-md-end {
        text-align: right !important;
    }

    .btn-icon.btn-xs {
        font-size: 0.75rem;
        height: 1.75rem;
        width: 1.75rem;
    }

    .btn-social {
        border: 1px solid var(--fc-gray-500);
        border-radius: 0.5rem;
        color: var(--fc-gray-500);
    }

    .btn-social:hover {
        border: 1px solid var(--fc-primary);
        color: var(--fc-primary);
    }

    .col-md-6 {
        flex: 0 0 auto;
        width: 50%;
    }

    .mb-0 {
        margin-bottom: 0 !important;
    }

    .list-inline,
    .list-unstyled {
        list-style: none;
        padding-left: 0;
    }

    .list-inline-item {
        display: inline-block;
    }

    .list-inline-item:not(:last-child) {
        margin-right: 0.5rem;
    }

    .btn-primary {
        --fc-btn-color: #fff;
        --fc-btn-bg: #1dace3;
        --fc-btn-hover-color: #fff;
        --fc-btn-hover-bg: #5487bb;
        --fc-btn-hover-border-color: #fff;
        --fc-btn-focus-shadow-rgb: 47, 185, 47;
        --fc-btn-active-color: #fff;
        --fc-btn-active-bg: #1dace3;
        --fc-btn-active-border-color: #1dace3;
        --fc-btn-active-shadow: var(--fc-accordion-btn-focus-border-color);
        --fc-btn-disabled-color: #fff;
        --fc-btn-disabled-bg: #1dace3;
        --fc-btn-disabled-border-color: #1dace3;
        --font-weight: lighter;
        text-transform: none;
    }
    .btn {
  --fc-btn-padding-x: 1rem;
  --fc-btn-padding-y: 0.55rem;
  --fc-btn-font-family: ;
  --fc-btn-font-size: 0.875rem;
  --fc-btn-font-weight: 600;
  --fc-btn-line-height: 1.6;
  --fc-btn-color: var(--fc-body-color);
  --fc-btn-bg: transparent;
  --fc-btn-border-width: 1px;
  --fc-btn-border-color: transparent;
  --fc-btn-border-radius: 0.5rem;
  --fc-btn-hover-border-color: transparent;
  --fc-btn-box-shadow: inset 0 1px 0 hsla(0, 0%, 100%, 0.15),
    0 1px 1px rgba(0, 0, 0, 0.075);
  --fc-btn-disabled-opacity: 0.65;
  --fc-btn-focus-box-shadow: 0 0 0 0.25rem
    rgba(var(--fc-btn-focus-shadow-rgb), 0.5);
  background-color: var(--fc-btn-bg);
  border: var(--fc-btn-border-width) solid var(--fc-btn-border-color);
  border-radius: var(--fc-btn-border-radius);
  color: var(--fc-btn-color);
  cursor: pointer;
  display: inline-block;
  font-family: var(--fc-btn-font-family);
  font-size: var(--fc-btn-font-size);
  font-weight: var(--fc-btn-font-weight);
  line-height: var(--fc-btn-line-height);
  padding: var(--fc-btn-padding-y) var(--fc-btn-padding-x);
  text-align: center;
  text-decoration: none;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
    border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
  vertical-align: middle;
}
.shadow-gray {
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

.col-md-12 {
    flex: 0 0 auto;
    width: 100%;
  }
  .col-lg-6 {
    flex: 0 0 auto;
    width: 50%;
  }
  .col-lg-7 {
    flex: 0 0 auto;
    width: 58.33333333%;
  }
  .col-lg-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
  }
  .col-lg-9 {
    flex: 0 0 auto;
    width: 75%;
  }
  .col-lg-10 {
    flex: 0 0 auto;
    width: 83.33333333%;
  }
  .col-lg-11 {
    flex: 0 0 auto;
    width: 91.66666667%;
  }
  .col-lg-12 {
    flex: 0 0 auto;
    width: 100%;
  }



@media (max-width: 996px) {
    .dcm_banner {
        width: 92%;
        height: 190px;
    }
    .dcm_banner .mt-5 img {
        height: 125px;
        width: auto !important;
    }
    .col-12 {
        padding: 0 !important;
        width: 92% !important;
    }
    .vision-div {
        padding: 0 !important;
    }
}

</style>


</head>


<body>

    <main>
        <section>
            <div class="container">

                <div class="dcm_banner" style="background: url('https://www.dealsandcouponsmena.com/public/web_assets/images/banner/dcm_banner.png') no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center; position: relative;">
                    <div class="row">
                        <img class="w-15" src="https://www.dealsandcouponsmena.com/public/web_assets/images/emails/logo_wt_txt.png" alt="DCM" style="padding-left: 30px; padding-top:30px; width: 100px;">
                    </div>
                    <div class="row mt-5" style="justify-content: center; text-align: center; position: absolute; bottom: 0; width: 100%;">
                        <img class="w-30" src="https://www.dealsandcouponsmena.com/public/web_assets/images/emails/pc.png" alt="DCM" style="width:300px; margin: 0 auto;">
                    </div>
                </div>

            </div>
        </section>
        <br><br><br><br>
        <!-- section -->
        <section class="my-lg-5 my-8">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row mt-10">
                    <div class="col-12">
                        <div class="mb-0">
                            <!-- heading -->
                            <h2 style="text-align: center; color:#00C5FF">Welcome</h2>
                        </div>
                        <p class="mb-0" style="font-size: larger;">
                        <h5 style="text-align: center; color:#00C5FF">To Deals and Coupons Mena</h5>
                        </p>
                        <p class="mb-0" style="font-size: larger;">
                        <h4 style="text-align: center; color:#00C5FF">Dear, <strong>{{$first_name.' '.$last_name}}</strong></h4>
                        </p>
                        <p class="text-center mt-5">Welcome to Deals and Coupons MENA!
                            We are thrilled to have you on board as a valued business partner, and we look forward to helping you unlock significant savings for your enterprise.</p>

                        <h5 class="text-center mt-5" style="color: #00c5ff;">Acknowledgment of Partnership</h5>

                        <div class="row mt-5 vision-div" style="padding-left: 100px;">

                            <li> <strong>Our Shared Vision: </strong></li>

                            <p>In joining forces, we embark on a journey towards shared success and prosperity. Your commitment to excellence aligns seamlessly with our mission at Deals and Coupons MENA. Together,
                                we are poised to redefine the landscape of savings and value for businesses across the MENA region.</p>

                            <li><strong>What This Partnership Means: </strong></li>
                            <p>
                                This partnership signifies not just a collaboration but a synergy of strengths. By leveraging our expertise in delivering exclusive B2B deals and your unique contributions, we are confident in creating unparalleled opportunities for savings and growth.

                            </p>

                            <li><strong>Dedicated Support: </strong></li>
                            <p>
                                Dedicated Support: As a valued partner, you have been assigned a dedicated account manager, [Account Manager’s Name], who will be your point of contact for any queries, requests, or assistance you may require throughout our journey together.
                            </p>

                        </div>

                        <div class="row mt-5" style="justify-content: center;">
                            <div class="my-button-container">
                                <div class="row justify-content-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 text-center">
                        <div class="col-lg-12  flex-wrap">
                            <button class="btn btn-primary px-5 py-1 mb-3 me-5 shadow-gray" style="font-weight: lighter; background-color:#00C5FF;color:#fff;">Learn More</button>
                        </div>
                    </div>
              
                    <div class="col-md-12 text-center">
                        <ul class="list-inline mb-0 small mt-3 mt-md-0" style="text-align:center; width: 85%;">

                            <li class="list-inline-item me-1">
                                <a href="#!" class="btn btn-xs btn-social btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                    </svg>
                                </a>
                            </li>

                            <li class="list-inline-item me-1">
                                <a href="#!" class="btn btn-xs btn-social btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                    </svg>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="#!" class="btn btn-xs btn-social btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 24 24">
                                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z" />
                                    </svg>
                                </a>
                            </li>

                        </ul>
                    </div>
         
                </div>

                <div class="row mt-5" style="padding-right: 40px;">
                    <hr style=" height: 1px; background-color: black;   border: none;margin: 10px 0; width: 93%;">

                    <p class="text-center">
                        You are receiving this email as you're registered on <a href="https://dealsandcouponsmena.com/" target="_blank" style="color: #00C5FF;">dealsandcouponsmena.com</a><br>

                    </p>
                    <p class="mt-0 text-center">
                        <a href="  https://dealsandcouponsmena.com/en/dubai/privacy-policy" style="color: #00C5FF;">Privacy Policy</a> | <a href="  https://dealsandcouponsmena.com/en/dubai/terms" style="color: #00C5FF;">Terms & Conditions</a> | <a href="  https://dealsandcouponsmena.com/en/dubai/faqs" style="color: #00C5FF;">FAQ</a>
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