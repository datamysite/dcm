<style>
  body { background-color: #1caae2; padding: 1in; }

  /* Grap a Deal Modal Start Here*/
  .grap_deal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }

  .grap_deal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 400px;
    text-align: center;
  }

  .grap_deal_container {
    width: 350px;
    height: 550px;
    margin: 0 auto;
    font-family: Arial, sans-serif;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
  }

  .grap_deal_container img {
    width: 350px;
    height: auto;
    position: absolute;
    top: 0;
    z-index: -1;
  

  }

  .grap_deal_main {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 90%;
  }

  .grap_deal_confirmation {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px;
  }

  .grap_deal_centered {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin: 20px;
  }

  .grap_deal_row {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 100px;
  }
  .grap_deal_message p:nth-child(1) {
    font-size: 30px;
    font-weight: 600;
    font-family: 'arial';
  }
  .grap_deal_message p:nth-child(2) {
    font-size: 20px;
    margin-top: 0px;
  }
  .grap_deal_icon {
    padding: 10px;
    border-radius: 50%;
    background-color: #1dace3;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .grap_deal_icon span {
    color: white;
    font-size: 48px;
  }

  .grap_deal_message {
    margin-top: 30px;
    text-align: center;
  }

  .grap_deal_message p {
    font-size: 24px;
    margin: 0;
  }

  .grap_deal_coupon {
    /* border: 2px dashed #fff; */
    margin: 20px 0 0 0;
    padding: 10px;
    position: relative;
    border-radius: 10px;
  }

  .grap_deal_code {
    text-align: center;
    align-items: center;

    justify-content: center;
  }

  .grap_deal_code p {
    font-size: 18px;
    margin: 0;
    align-items: center;
    text-align: center;
    justify-content: center;
  }

  .grap_deal_code h2 {
    font-size: 36px;
    margin: 0;
  }

  .grap_deal_button {
    width: 200px;
    height: 50px;
    background-color: #1dace3;
    border: none;
    border-radius: 25px;
    color: white;
    font-size: 24px;
    text-align: center;
    line-height: 50px;
    position: absolute;
    top: 99px;
    left: 50%;
    transform: translateX(-50%);
  }

  .grap_deal_button a {
    color: white;
    text-decoration: none;
  }

  .grap_deal_social {
    width: 100%;
    display: flex;
    margin-top: 70px;
    margin-bottom: 20px;
    text-align: center;
    flex-direction: column;
    align-items: center;
  }
  .grap_deal_social div {
    display: flex;
  }
  .grap_deal_social p {
    font-size: 18px;
    margin-bottom: 0 !important;
    align-items: center;
  }

  .grap_deal_social .grap_deal_icon {
    display: flex;
    justify-content: space-between;
  }

  .grap_deal_social .grap_deal_icon {
    margin-left: 10px;
    color: #fff !important;
  }

  .grap_deal_social .grap_deal_icon img {
    width: 40px;
    height: 40px;
  }

  .grap_deal_disclaimer {
    margin: 0px;
    text-align: center;
  }

  .grap_deal_disclaimer p {
    margin: 5px;
    font-size: 14px;
  }
  .grap_deal_row .grap_deal_icon {
    height: 61px;
    margin-top: -7px;
  }

  .center-image {
    display: flex;
    justify-content: center;
  }

  .center-image img {
    display: block;
    align-items: center;
    align-self: center;
    align-self: center;
  }
  .center-image img {
    width: 130px;
    margin-top: 45px;
    margin-bottom: -20px;
    margin-left: 95px;
}
</style>

<html>
    
  <body class="body">
    <div class="grap_deal_container">
      <div class="grap_deal_main">
        <img src="{{URL::to('/')}}/public/ticket.png" />
        <div class="grap_deal_row">
          <div class="grap_deal_message">
            <p>THANK YOU!</p>
            <p>Your redemption was successful</p>
          </div>
        </div>
        <div class="grap_deal_coupon">
          <div class="grap_deal_code">
            <p style="padding-bottom: 40px">Your Coupon Code Is</p>
          </div>
          <div class="center-image">
            
            <img src="data:image/svg+xml;base64,{{base64_encode( QrCode::size(80)->generate(route('offers.qrcode', [$region, $offer->retailer->slug, base64_encode($qrid)])))}}"  width="50" height="50" />
          </div>
        </div>
        <div class="grap_deal_social" style="padding-top: 35px">
          <p></p>
          <p></p>

          <div class="center-image img">
            <img
              src="{{URL::to('/public/qr-logo.png')}}"
              alt=""
              style="height: 180px; width: 180px; padding-top: 270px; margin-left: 80px;"
              class="center-image img"
            />
          </div>
        </div>

        <div class="grap_deal_disclaimer">
          <p style="padding-top: 15px"><strong>Congratulations!</strong></p>
          <p>
            Your copoun code redemption was successful. <br />
            Simply present this QR code file at your preferred brand's store,
            scan it and enjoy the exclusive discount on your purchase.
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
