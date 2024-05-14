<!DOCTYPE html>
<html>
<head>
    <title>DCM</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <span id="url-test"></span>
        <header class="text-center">
            <div class="menu">
            <img class="logo" width="70.287px" height="20px" src="https://dealsandcouponsmena.com/public/web_assets/images/logo/m-logo.png">
            <button id="close">X</button>
            </div>

            <div class="form-group d-flex flex-column align-items-end">
                <input type="text" name="search" placeholder="Search" id="mainSearch" class="form-control form-control-sm">
                <img class="icon" src="assets/search.png">
            </div>
            <hr>

              <ul class="nav justify-content-between nav-pills" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#" id="couponTab">Coupons</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#" id="brandTab">Brands</a>
                </li>
              </ul>
        </header>

        <!-- Nav pills -->
          <!-- Tab panes -->
          <div class="tab-content">
            <div id="brands" class="container tab-pane fade">
                <section id="homeSection">
                    <img class="loader" src="assets/loader.gif">
                </section>
            </div>
            <div id="coupons" class="container tab-pane active">
                <section id="couponSection">
                    <img class="loader" src="assets/loader.gif">
                </section>
            </div>
          </div>

        <footer>
            Go to <a href="https://dealsandcouponsmena.com/en/dubai" target="_blank">DCM Website
            </a>
        </footer>
    </div>
    <script src="assets/script.js"></script>
</body>

</html>