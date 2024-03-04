@extends('seller.layout.main')
@section('title', 'Dashboard')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard <small><small>({{date('d-M-Y', strtotime($start_date))}} &nbsp;&nbsp;to&nbsp;&nbsp; {{date('d-M-Y', strtotime($end_date))}})</small></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}">Home</a></li>
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
          <div class="col-lg-8 seller-dashboad-widget">
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                  <div class="inner">
                    <h3>{{number_format($total_traffic)}}</h3>

                    <p> Total Traffic</p>
                  </div>
                  <div class="icon">
                    <i><img src="{{URL::to('/public/icons/traffic.png')}}"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              @if(Auth::guard('seller')->user()->retailer->type == '1')
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                  <div class="inner">
                    <h3>{{number_format($total_show_coupon)}}</h3>
                    <p>Total Show Coupons</p>
                  </div>
                  <div class="icon">
                    <i><img src="{{URL::to('/public/icons/downloaded-coupons.png')}}"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              @endif


              @if(Auth::guard('seller')->user()->retailer->type == '2')
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                  <div class="inner">
                    <h3>{{number_format($total_downloads)}}</h3>
                    <p>Total Downloads</p>
                  </div>
                  <div class="icon">
                    <i><img src="{{URL::to('/public/icons/downloaded-coupons.png')}}"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              @endif

              @if(Auth::guard('seller')->user()->retailer->type == '1')
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                  <div class="inner">
                    <h3>{{number_format($total_grab_deal)}}</h3>
                    <p>Total Grab Deals</p>
                  </div>
                  <div class="icon">
                    <i><img src="{{URL::to('/public/icons/grab-deal.png')}}"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              @endif
              @if(Auth::guard('seller')->user()->retailer->type == '2')
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                  <div class="inner">
                    <h3>{{number_format($total_whatsapp_visits)}}</h3>
                    <p>Total Whatsapp Visits</p>
                  </div>
                  <div class="icon">
                    <i><img src="{{URL::to('/public/icons/whatsapp-chat.png')}}"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              @endif


              @if(Auth::guard('seller')->user()->retailer->type == '1')
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                  <div class="inner">
                    <h3>{{number_format($active_coupons)}}</h3>
                    <p>Active Coupons</p>
                  </div>
                  <div class="icon">
                    <i><img src="{{URL::to('/public/icons/all-coupons.png')}}"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              @endif

              @if(Auth::guard('seller')->user()->retailer->type == '2')
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                  <div class="inner">
                    <h3>{{number_format($active_offers)}}</h3>
                    <p>Active Offers</p>
                  </div>
                  <div class="icon">
                    <i><img src="{{URL::to('/public/icons/all-coupons.png')}}"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              @endif
            </div>


            <div class="row">

              @if(Auth::guard('seller')->user()->retailer->type == '1')
              <div class="col-lg-4">
                <div class="card card-default">
                  <div class="card-body p-0">
                    <h3 class="card-chart-title">Show Coupon Analytics</h3>
                    <div class="chart">
                      <canvas class="chart" id="showCouponAnalytics" style="min-height: 240px; height: 240px; max-height: 240px; max-width: 100%;"></canvas>
                      <br>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <h3 class="card-chart-title">Grab Deal Analytics</h3>
                    <canvas id="grabDealAnalytics" style="min-height: 240px; height: 240px; max-height: 240px; max-width: 100%;"></canvas>
                    <br>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              @endif

              @if(Auth::guard('seller')->user()->retailer->type == '2')
              <div class="col-lg-4">
                <div class="card card-default">
                  <div class="card-body p-0">
                    <h3 class="card-chart-title">Offer Downloads Analytics</h3>
                    <div class="chart">
                      <canvas class="chart" id="offerDownloadsAnalytics" style="min-height: 240px; height: 240px; max-height: 240px; max-width: 100%;"></canvas>
                      <br>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <h3 class="card-chart-title">Whatsapp Reach Analytics</h3>
                    <canvas id="whatsappReachAnalytics" style="min-height: 240px; height: 240px; max-height: 240px; max-width: 100%;"></canvas>
                    <br>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              @endif
              <div class="col-lg-4">
                <div class="card card-default">
                  <div class="card-body p-0">
                    <h3 class="card-chart-title">Traffic Analytics</h3>
                    <div class="chart">
                      <canvas class="chart" id="totalTraficAnalytics" style="min-height: 240px; height: 240px; max-height: 240px; max-width: 100%;"></canvas>
                      <br>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>


              <div class="col-lg-12">
                <div class="card card-default">
                  <div class="card-body p-0">
                      <h3 class="card-chart-title">Daily Visiters Analytics</h3>
                    <br>
                    <div class="chart">
                      <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250; max-height: 250; max-width: 100%;"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">

            <div class="card card-default">
              <div class="card-body p-0">
                <h3 class="card-chart-title">Filter Dashboard</h3>
                <form method="post" action="{{route('seller.filter')}}">
                  @csrf
                  <div class="row  p-input">
                    <div class="col-12">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" name="date_range" value="{{date('d/M/Y', strtotime($start_date))}} - {{date('d/M/Y', strtotime($end_date))}}" id="filter_range" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <br>
                      <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-filter"></i>&nbsp;&nbsp;&nbsp;Filter</button>
                    </div>
                  </div>
                </form>
                <br>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card card-default">
              <div class="card-body p-0">
                <h3 class="card-chart-title">Export to Xlsx</h3>
                <form method="post" action="{{route('seller.export')}}">
                  @csrf
                  <div class="row  p-input">
                    <div class="col-12">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" name="date_range" value="{{date('d/M/Y', strtotime($start_date))}} - {{date('d/M/Y', strtotime($end_date))}}" id="export_range" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <br>
                      <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-file-excel"></i>&nbsp;&nbsp;&nbsp;Export</button>
                    </div>
                  </div>
                </form>
                <br>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card card-default">
              <div class="card-body p-0">
                <h3 class="card-chart-title">Visiter's Regional Analytics</h3>
                <div id="map-container"></div>
                <br>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>



        <div class="row">
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
@section('addScript')
  <script src="https://code.highcharts.com/maps/highmaps.js"></script>
  <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>

  <script type="text/javascript">
      (async () => {

        const topology = await fetch(
            "{{route('api.getMap')}}"
        ).then(response => response.json());

        // Prepare demo data. The data is joined to map using value of 'hc-key'
        // property by default. See API docs for 'joinBy' for more info on linking
        // data and map.
        const data = [
            ['ae-az', {{@$visiter_regional['Abu Dhabi']}}], //Abu dhabi
            ['ae-du', {{@$visiter_regional['Dubai']}}], // Dubai
            ['ae-sh', {{@$visiter_regional['Sharjah']}}], //Sharjah
            ['ae-rk', {{@$visiter_regional['Ras Al-Khaimah']}}], //Ras Al Khaimah
            ['ae-uq', {{@$visiter_regional['Umm Ul Quwein']}}], //Umm Ul Quwein
            ['ae-fu', {{@$visiter_regional['Fujairah']}}], //Fujairah
            ['ae-aj', {{@$visiter_regional['Ajman']}}], //Ajman
        ];

        // Create the chart
        Highcharts.mapChart('map-container', {
            chart: {
                map: topology
            },

            title: {
                text: ''
            },

            mapNavigation: {
                enabled: false,
                buttonOptions: {
                    verticalAlign: 'bottom'
                }
            },

            colorAxis: {
                min: 0,
                lineColor: '#fff'
            },

            series: [{
              color: '#000',
                data: data,
                name: 'Visiters',
                dataLabels: {
                    enabled: false,
                    format: '{point.name}'
                }
            }]
        });

    })();

  </script>


  <script type="text/javascript">
    $(document).ready(function(){
      'use strict'

      $('#filter_range').daterangepicker({
          locale: {
              format: 'DD/MMM/YYYY'
          }
      });

      $('#export_range').daterangepicker({
          locale: {
              format: 'DD/MMM/YYYY'
          }
      });
    });



    @if(Auth::guard('seller')->user()->retailer->type == '2')




      //-------------
      //- Offers Download CHART -
      //-------------
      var donutChartCanvas = $('#offerDownloadsAnalytics').get(0).getContext('2d')
      var donutData        = {
        labels: [
            @foreach($offer_analytics as $val)
            '{{@$val->offer->title}}',
            @endforeach
        ],
        datasets: [
          {
            data: [@foreach($offer_analytics as $val) {{$val->total}}, @endforeach],
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
      });



      //-------------
      //- Whatsapp CHART -
      //-------------
      var donutData        = {
        labels: [
            @foreach($whatsapp_analytics as $val)
            '{{@$val->offer->title}}',
            @endforeach
        ],
        datasets: [
          {
            data: [@foreach($whatsapp_analytics as $val) {{$val->total}}, @endforeach],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#whatsappReachAnalytics').get(0).getContext('2d')
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

    @endif
   
    @if(Auth::guard('seller')->user()->retailer->type == '1')




      //-------------
      //- Show Coupon CHART -
      //-------------
      var donutChartCanvas = $('#showCouponAnalytics').get(0).getContext('2d')
      var donutData        = {
        labels: [
            @foreach($coupon_analytics as $val)
            '{{@$val->coupon->code}}',
            @endforeach
        ],
        datasets: [
          {
            data: [@foreach($coupon_analytics as $val) {{$val->total}}, @endforeach],
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
      });



      //-------------
      //- Grab Deal CHART -
      //-------------
      var donutData        = {
        labels: [
            @foreach($grabDeal_analytics as $val)
            '{{@$val->coupon->code}}',
            @endforeach
        ],
        datasets: [
          {
            data: [@foreach($grabDeal_analytics as $val) {{$val->total}}, @endforeach],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#grabDealAnalytics').get(0).getContext('2d')
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

    @endif


    // Sales graph chart
    var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
    // $('#revenue-chart').get(0).getContext('2d');
    var salesGraphChartData = {
      labels: [@foreach($daily_analytics as $key => $val) '{{date("d-M", strtotime($key))}}', @endforeach],
      datasets: [
        {
          label: 'Page Visiters',
          fill: false,
          borderWidth: 1,
          lineTension: 1,
          spanGaps: true,
          borderColor: '#f56954',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#f56954',
          pointBackgroundColor: '#f56954',
          data: [@foreach($daily_analytics as $val) {{empty($val['1']) ? '0' : $val['1']}}, @endforeach]
        },
        @if(Auth::guard('seller')->user()->retailer->type == '1')
        {
          label: 'Grab Deals',
          fill: false,
          borderWidth: 1,
          lineTension: 1,
          spanGaps: true,
          borderColor: '#00a65a',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#00a65a',
          pointBackgroundColor: '#00a65a',
          data: [@foreach($daily_analytics as $val) {{empty($val['4']) ? '0' : $val['4']}}, @endforeach]
        },{
          label: 'Show Coupons',
          fill: false,
          borderWidth: 1,
          lineTension: 1,
          spanGaps: true,
          borderColor: '#f39c12',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#f39c12',
          pointBackgroundColor: '#f39c12',
          data: [@foreach($daily_analytics as $val) {{empty($val['2']) ? '0' : $val['2']}}, @endforeach]
        }
        @endif

        @if(Auth::guard('seller')->user()->retailer->type == '2')
        {
          label: 'Whatsapp Reach',
          fill: false,
          borderWidth: 1,
          lineTension: 1,
          spanGaps: true,
          borderColor: '#00a65a',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#00a65a',
          pointBackgroundColor: '#00a65a',
          data: [@foreach($daily_analytics as $val) {{empty($val['5']) ? '0' : $val['5']}}, @endforeach]
        },{
          label: 'Offer Downloads',
          fill: false,
          borderWidth: 1,
          lineTension: 1,
          spanGaps: true,
          borderColor: '#f39c12',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#f39c12',
          pointBackgroundColor: '#f39c12',
          data: [@foreach($daily_analytics as $val) {{empty($val['3']) ? '0' : $val['3']}}, @endforeach]
        }
        @endif
      ]
    }

    var salesGraphChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: true
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
    var donutChartCanvas = $('#totalTraficAnalytics').get(0).getContext('2d')
    var donutData        = {
      labels: [
          @foreach($visiter_regional as $key => $val)
          '{{$key == "" ? "Others" : $key}}',
          @endforeach
      ],
      datasets: [
        {
          data: [
            @foreach($visiter_regional as $key => $val) {{$val}}, @endforeach
            ],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
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



  </script>
@endsection