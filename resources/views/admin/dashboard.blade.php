@extends('admin.layout.main')
@section('title', 'Dashboard')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-9">
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                  <div class="inner">
                    <h3>7367</h3>

                    <p>Coupons Downloaded</p>
                  </div>
                  <div class="icon">
                    <i><img src="{{URL::to('/public/icons/downloaded-coupons.png')}}"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                  <div class="inner">
                    <h3>132</h3>

                    <p>Total Retailers</p>
                  </div>
                  <div class="icon">
                    <i><img src="{{URL::to('/public/icons/retailers.png')}}"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                  <div class="inner">
                    <h3>568</h3>

                    <p>Total Coupons</p>
                  </div>
                  <div class="icon">
                    <i><img src="{{URL::to('/public/icons/all-coupons.png')}}"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                  <div class="inner">
                    <h3>1590</h3>

                    <p>Happy Customers</p>
                  </div>
                  <div class="icon">
                    <i><img src="{{URL::to('/public/icons/happy-customers.png')}}"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="card card-default">
                  <div class="card-body p-0">
                    <h3 class="card-chart-title">Daily Coupons Downloads</h3>
                    <br>
                    <div class="chart">
                      <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
              </div>
              </div>
            </div>


            <div class="row">
              <div class="col-lg-4">
                <div class="card card-default">
                  <div class="card-body p-0">
                    <h3 class="card-chart-title">Top Rated Retailer</h3>
                    <div class="chart">
                      <canvas class="chart" id="topRatedRetailer" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                      <br>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-default">
                  <div class="card-body p-0">
                    <h3 class="card-chart-title">Top Rated Coupons</h3>
                    <div class="chart">
                      <canvas class="chart" id="topRatedCoupon" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                      <br>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-default">
                  <div class="card-body p-0">
                    <h3 class="card-chart-title">Recently Downloaded Coupons</h3>
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item active">
                        <a href="javascript:void(0)" class="nav-link">
                          DCM10 - Noon
                          <span class=" float-right"><small>12 minutes ago</small></span>
                        </a>
                      </li>
                      <li class="nav-item active">
                        <a href="javascript:void(0)" class="nav-link">
                          DCM40 - Namshi
                          <span class=" float-right"><small>25 minutes ago</small></span>
                        </a>
                      </li>
                      <li class="nav-item active">
                        <a href="javascript:void(0)" class="nav-link">
                          DCM30 - Sivvi
                          <span class=" float-right"><small>45 minutes ago</small></span>
                        </a>
                      </li>
                      <li class="nav-item active">
                        <a href="javascript:void(0)" class="nav-link">
                          DCM10 - Fordeal
                          <span class=" float-right"><small>1 hour ago</small></span>
                        </a>
                      </li>
                      <li class="nav-item active">
                        <a href="javascript:void(0)" class="nav-link">
                          DCM50 - Yalla Toys
                          <span class=" float-right"><small>1 day ago</small></span>
                        </a>
                      </li>
                    </ul>
                    <br>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <h3 class="card-chart-title">Brands Details</h3>
                <canvas id="brandsChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                <br>
                <div class="card-item-div">
                  <div class="card-item">
                    <img src="{{URL::to('/public/dist/img')}}/MART.png">
                    <p>Mart and Cleaning</p>
                    <span>Brands: 75 | Coupons: 568</span>
                  </div>

                  <div class="card-item">
                    <img src="{{URL::to('/public/dist/img')}}/Fashion.png">
                    <p>Fashion and Lifestyle</p>
                    <span>Brands: 75 | Coupons: 568</span>
                  </div>

                  <div class="card-item">
                    <img src="{{URL::to('/public/dist/img')}}/beauty.png">
                    <p>Beauty and Health</p>
                    <span>Brands: 75 | Coupons: 568</span>
                  </div>

                  <div class="card-item">
                    <img src="{{URL::to('/public/dist/img')}}/Decor.png">
                    <p>Home Decor and Electronicse</p>
                    <span>Brands: 75 | Coupons: 568</span>
                  </div>
                  
                  <div class="card-item">
                    <img src="{{URL::to('/public/dist/img')}}/Kids.png">
                    <p>Kids</p>
                    <span>Brands: 75 | Coupons: 568</span>
                  </div>
                  
                  <div class="card-item">
                    <img src="{{URL::to('/public/dist/img')}}/Sports.png">
                    <p>Sports</p>
                    <span>Brands: 75 | Coupons: 568</span>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
@section('addScript')
  <script type="text/javascript">
    //-------------
    //- PIE CHART -
    //-------------
    var donutData        = {
      labels: [
          'Mart and Cleaning',
          'Fashion and Lifestyle',
          'Beauty and Health',
          'Kids',
          'Sports',
      ],
      datasets: [
        {
          data: [53,20,90,72,10],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
        }
      ]
    }
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#brandsChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    });

   
    // Sales graph chart
    var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
    // $('#revenue-chart').get(0).getContext('2d');

    var salesGraphChartData = {
      labels: ['23-Jan', '24-Jan', '25-Jan', '26-Jan', '27-Jan', '28-Jan', '29-Jan', '30-Jan', '31-Jan', '1-Feb'],
      datasets: [
        {
          label: 'Mart and Cleaning',
          fill: false,
          borderWidth: 1,
          lineTension: 1,
          spanGaps: true,
          borderColor: '#f56954',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#f56954',
          pointBackgroundColor: '#f56954',
          data: [2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432]
        },{
          label: 'Fashion and Lifestyle',
          fill: false,
          borderWidth: 1,
          lineTension: 1,
          spanGaps: true,
          borderColor: '#00a65a',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#00a65a',
          pointBackgroundColor: '#00a65a',
          data: [1666, 3778, 2912, 1767, 4810, 4670, 5820, 10073, 9687, 10432]
        },{
          label: 'Beauty and Health',
          fill: false,
          borderWidth: 1,
          lineTension: 1,
          spanGaps: true,
          borderColor: '#f39c12',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#f39c12',
          pointBackgroundColor: '#f39c12',
          data: [3666, 10778, 3912, 9767, 5810, 1670, 1820, 6073, 3687, 4432]
        }
      ]
    }

    var salesGraphChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          ticks: {
            fontColor: '#777'
          },
          gridLines: {
            display: false,
            color: '#1DACE3',
            drawBorder: false
          }
        }],
        yAxes: [{
          ticks: {
            stepSize: 5000,
            fontColor: '#777'
          },
          gridLines: {
            display: true,
            color: '#efefef',
            drawBorder: false
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    // eslint-disable-next-line no-unused-vars
    var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
      type: 'line',
      data: salesGraphChartData,
      options: salesGraphChartOptions
    });


    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#topRatedRetailer').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Noon',
          'Sivvi',
          'Yalla Toys',
          'The Secret Skin',
          'Homzmart',
          'Shakespeare Fluer',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
      cutoutPercentage: 20,
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })


     // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#topRatedCoupon').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Noon',
          'Sivvi',
          'Yalla Toys',
          'The Secret Skin',
          'Homzmart',
          'Shakespeare Fluer',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
      cutoutPercentage: 50,
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

  </script>
@endsection