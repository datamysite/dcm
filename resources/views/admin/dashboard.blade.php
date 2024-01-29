@extends('layout.main')
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{sprintf("%'.04d\n", $today_inquiries)}}</h3>

                <p>Today`s Inquiries</p>
              </div>
              <div class="icon">
                <i class="fas fa-copy"></i>
              </div>
              <a href="{{route('inquiries')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{sprintf("%'.04d\n", $today_orders)}}</h3>

                <p>Today`s Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="{{route('orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{sprintf("%'.04d\n", $total_inquiries)}}</h3>

                <p>Total Inquiries</p>
              </div>
              <div class="icon">
                <i class="fas fa-copy"></i>
              </div>
              <a href="{{route('inquiries')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{sprintf("%'.04d\n", $total_orders)}}</h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="{{route('orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Daily Analytics</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Top Selling Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach($top_products as $val)
                    <li class="item">
                      <div class="product-img">
                        <img src="{{URL::to('/public/storage/products/'.$val->image)}}" alt="Product Image" class="img-size-50">
                      </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">{{$val->name}}
                          <span class="badge badge-warning float-right">{{env('APP_CURRENCY').' '.number_format($val->price, 2)}}</span></a>
                        <span class="product-description">
                          {{$val->category->name.' | '.$val->brand->name}}
                        </span>
                      </div>
                    </li>
                  @endforeach
                  @if(count($top_products) == 0)
                    <li class="item">
                      <span> No Products Available.</span>
                    </li>
                  @endif
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{route('products')}}" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
@section('addScript')
<script>
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */
    
       var areaChartData = {
      labels  : [
        @foreach($salesmen as $val)
        '{{$val->name}}',
        @endforeach
        ],
      datasets: [
        {
          label               : 'Orders',
          backgroundColor     : '#28a745',
          borderColor         : '#28a745',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#28a745',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#28a745',
          data                : [
                                  @foreach($salesmen as $val)
                                  {{$val->todays_orders_count}},
                                  @endforeach
                                ]
        },
        {
          label               : 'Inquiries',
          backgroundColor     : '#17a2b8',
          borderColor         : '#17a2b8',
          pointRadius         : false,
          pointColor          : '#17a2b8',
          pointStrokeColor    : '#17a2b8',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#17a2b8',
          data                : [
                                  @foreach($salesmen as $val)
                                  {{$val->todays_inquiries_count}},
                                  @endforeach
                                ]
        },
      ]
    }

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0
  
      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }
  
      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
  
    })
  </script>
@endsection