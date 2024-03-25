<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 18px;
    }

    .container {
      width: 600px;
      margin: auto;
      margin-top: 20px;

    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      justify-content: center;
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
      margin-top: 20px;
      text-align: center;
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
  </style>
</head>

<body>

  <div class="container">

    <div class="header" style="text-align:center;justify-content: center;">
      <img src="{{URL::to('/public/web_assets/images/emails')}}/m-logo.png" alt="DCM Logo" class="logo" style="width:150px; margin-left: 35%;" />
    </div>

    <div class="content">

      <h1>Reset Your Password</h1>
      <h2>Hi, {{$name}}</h2>

      <p style="padding-top: 5px">
        Trouble logging in? We can help!
      </p>
      <p>
        To change the password for your email account, please click the link below:
      </p>

      <p class="text-center mt-5">
        <a href="{{route('user.resetPassword', [base64_encode($id), base64_encode($email)])}}" target="_blank"
          style="font-size: larger; color: #00c5ff">
          <strong style="text-decoration: underline">Reset Your Password</strong>
        </a>
      </p>

      <p style="padding-top: 10px">
        If you haven’t recently tried logging in to your DCM account, please ignore this message. Your current
        password will remain unchanged.
        When resetting a password, make sure to use a strong and unique password that is difficult to guess.
        We also recommend changing your password regularly to enhance your account’s security.
        If you have any questions or need assistance, our team is ready to help. Please feel free to contact us,
        and we will give you the full support!
      </p>
      <p style="text-align: left;">
        <b>Your DCM team,</b>
      </p>


      <div class="row" style="padding-top: 10px;">

        <div class="column right">
          <div class="left-side-icons">
            <a href="mailto:info@dealsandcouponsmena.com" target="_blank" style="color: #00c5ff;">info@dealsandcouponsmena.com</a>
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
            style="color: #00c5ff">Privacy Policy</a> | <a href="https://dealsandcouponsmena.com/en/dubai/terms"
            target="_blank" style="color: #00c5ff"> Terms & Conditions</a> | <a
            href="https://dealsandcouponsmena.com/en/dubai/faqs" target="_blank" style="color: #00c5ff">FAQ</a> </p>
        <p>

          <a href="https://dealsandcouponsmena.com/en/dubai/privacy-policy" target="_blank" style="color: #00c5ff">©
            Dealsandcouponsmena</a>
        </p>

      </div>
    </div>
</body>

</html>