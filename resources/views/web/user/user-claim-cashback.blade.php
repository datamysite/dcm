@extends('web.includes.master')

@section('content')



<div class="breadcrumbMENU mt-110">
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}" style="color: #000;"><strong>{{ __('translation.dashboard') }} </strong></a></li>
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

                <div class="row" style="background-color: #F2F2F2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A);">
                    <h4 class="mb-5 mt-5"> <b style="color: #fff;">{{ __('translation.total_earnings_txt_heading_03') }} </b></h4>
                </div>

                <div class="row mt-5" style="background-color: #f0f3f2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A); ">

                    <p class="mb-0 lead" style="color: #fff;">{{ __('translation.profile_para_1') }} </p>

                    <div class="row text-center mt-5" style="justify-content: center;">
                        <div class="col-lg-6" style="padding: 20px;border-radius:10px;background-color:#50C878;display:none;" id="div_1">
                            <span class="text-center" style="font-size: 17px;color:#fff;" id="success_message"></b>
                        </div>

                        <div class="col-lg-6" style="padding: 20px;border-radius:10px;background-color:#FF7074;display:none;" id="div_2">
                            <span class="text-center" style="font-size: 17px;color:#fff;" id="error_message"></b>
                        </div>
                    </div>


                    <div class="mt-0">
                        <h6 style="color: #fff;">{{ __('translation.upload_invoice_txt') }} </h6>
                    </div>
                    <form id="cashback_form" action="{{route('user.claimCashback.request')}}" class="mt-1" style="color: #fff;">
                        @csrf
                        <!-- col -->
                        <div class="col-3">
                            <div class="input-group ">
                                <select class="form-control" name="retailer_id" style="border-radius:10px;" required>
                                    <option value="">{{ __('translation.select_brand') }} </option>
                                    @foreach ($data['brands'] as $brands)
                                    <option value="{{ $brands->retailer_id }}">{{ app()->getLocale() == 'en' ? $brands->name : $brands->name_ar  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="input-group ">
                                <input type="file" id="file-input" class="form-control rounded" accept=".pdf, .png, .jpg, .jpeg" name="user_invoice" required onchange="verifyFileType()">
                            </div>
                        </div>
                        <div class="col-4">
                            <input type="submit" name="upload-file" class="btn btn-primary shadow-gray" {!! app()->getLocale() == 'ar' ? 'style="float: left;"' : 'style="float: right;"' !!} value="{{ __('translation.upload_btn') }}">
                        </div>
                    </form>
                </div>
      


                <div class="row mt-5" style="border-radius: 10px ; background-color:#f0f3f2;">

                    <div class="table-responsive-xxl mt-2" style="width:100%;">
                        <!-- Table -->
                        <table id="myTable" class="table mb-0 text-nowrap text-center">
                            <!-- Table Head -->
                            <thead class="bg-light">
                                <tr>
                                    <th>{{ __('translation.id_txt') }}</th>
                                    <th>{{ __('translation.number_txt') }}</th>
                                    <th>{{ __('translation.brand_txt') }}</th>
                                    <th>{{ __('translation.invoice_txt') }}</th>
                                    <th>{{ __('translation.status_txt') }}</th>
                                    <th>{{ __('translation.date_txt') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['requests'] as $key => $val)
                                <tr style="background-color: #f0f3f2;">

                                    <td class="align-middle border-top-0">{{++$key}}</td>
                                    <td class="align-middle border-top-0">
                                        #{{str_pad($val->id, 5, '0', STR_PAD_LEFT);}}
                                    </td>
                                    <td class="align-middle border-top-0">
                                        {{$val->retailerName ? $val->retailerName->name : ""}}
                                    </td>
                                    <td><a href="{{URL::to('/public/storage/users/invoices/'.$val->invoice_file)}}" target="_blank">{{ $val->invoice_file }}</a></td>
                                    <td class="align-middle border-top-0">
                                        @switch($val->status)
                                        @case('1')
                                        <span class="badge bg-warning">{{ __('translation.status_processing') }}</span>
                                        @break
                                        @case('2')
                                        <span class="badge bg-success">{{ __('translation.status_accepted') }}</span>
                                        @break
                                        @case('3')
                                        <span class="badge bg-danger">{{ __('translation.status_rejected') }}</span>
                                        @break
                                        @endswitch
                                    </td>
                                    <td class="align-middle border-top-0">{{date('M d, Y', strtotime($val->date))}}</td>
                                </tr>
                                @endforeach
                                @if(count($data['requests']) == 0)
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
@section('addScript')
<script type="text/javascript" src="{{URL::to('/public/web_assets/js/profile.js')}}"></script>
@endsection