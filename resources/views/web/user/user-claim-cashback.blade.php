@extends('web.includes.master')

@section('content')



    <div class="mt-110">
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <!-- breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                            <li class="breadcrumb-item"><a href="{{route('user.profile')}}" style="color: #000;"><strong>{{ __('translation.Profile') }} </strong></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.total_earnings_txt_heading_03') }}</a></strong></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>



    <!-- Claim Cashback section start-->
    <div class="mt-8 mb-lg-14 mb-8">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row gx-10">

              
            @include('web.includes.user-nav')

                <!-- col -->
                <div class="col-lg-8 m-1">

                    <div class="row" style="background-color: #f0f3f2;border-radius: 10px">
                    <h4 class="mb-2 mt-5">{{ __('translation.total_earnings_txt_heading_03') }}</h4>

                    <p class="mb-0 lead">{{ __('translation.cash_back_txt') }} </p>



                    <div class="mt-5">
                        <h6>{{ __('translation.upload_invoice_txt') }} </h6>
                    </div>
                        <form id="cashback_form" action="{{route('user.claimCashback.request')}}">
                            @csrf
                            <!-- col -->
                            <div class="col-6">
                                <div class="input-group ">
                                    <input type="file" class="form-control rounded" name="user_invoice" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="submit" name="upload-file" class="btn btn-primary shadow-gray" {!! app()->getLocale() == 'ar' ? 'style="float: left;"' : 'style="float: right;"' !!} value="{{ __('translation.upload_btn') }}">
                            </div>
                        </form>
                    </div>

                    <div class="row mt-5" style="border-radius: 10px ; background-color:#f0f3f2;">

                        <div class="table-responsive-xxl" style="width:100%;">
                            <!-- Table -->
                            <table class="table mb-0 text-nowrap text-center">
                                <!-- Table Head -->
                                <thead class="bg-light">
                                    <tr>
                                        <th>{{ __('translation.id_txt') }}</th>
                                        <th>{{ __('translation.number_txt') }}</th>
                                        <th>{{ __('translation.invoice_txt') }}</th>
                                        <th>{{ __('translation.status_txt') }}</th>
                                        <th>{{ __('translation.date_txt') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($requests as $key => $val)
                                        <tr>

                                            <td class="align-middle border-top-0">{{++$key}}</td>
                                            <td class="align-middle border-top-0">
                                                #{{str_pad($val->id, 5, '0', STR_PAD_LEFT);}}
                                            </td>
                                            <td class="align-middle border-top-0">
                                                @switch($val->status)
                                                    @case('1')
                                                        <span class="badge bg-warning">Processing</span>
                                                        @break
                                                    @case('2')
                                                        <span class="badge bg-success">Completed</span>
                                                        @break
                                                    @case('3')
                                                        <span class="badge bg-danger">Rejected</span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td class="align-middle border-top-0">{{date('M d, Y', strtotime($val->date))}}</td>
                                        </tr>
                                    @endforeach
                                    @if(count($requests) == 0)
                                        <tr>
                                            <td colspan="4">{{ __('translation.no_data_found') }}</td>
                                        </tr>
                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Claim Cashback section end-->

@endsection