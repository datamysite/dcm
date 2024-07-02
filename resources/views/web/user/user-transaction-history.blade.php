@extends('web.includes.master')

@section('content')

<section class="breadcrumbMENU mt-110">
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.transaction_history') }}</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Transaction History section start-->

<div class="mt-8 mb-lg-14 mb-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row gx-10">


            @include('web.includes.user-nav')

            <!-- col -->
            <div class="col-lg-8 m-1">

                <div class="row" style="background-color: #F2F2F2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A);">
                    <h4 class="mb-5 mt-5"> <b style="color: #fff;">{{ __('translation.transaction_history') }}</b></h4>
                </div>

                <div class="row mt-5" style="border-radius: 10px ; background-color:#f0f3f2;">

                    <div class="table-responsive-xxl mt-2" style="width:100%;">
                        <!-- Table -->
                        <table id="myTable" class="table mb-0 text-nowrap text-center">
                            <!-- Table Head bg-light-->
                            <thead class="">
                                <tr>
                                    <th>{{ __('translation.id_txt') }}</th>
                                    <th>{{ __('translation.transaction_id') }}</th>
                                    <th>{{ __('translation.type') }}</th>
                                    <th>{{ __('translation.aed_coin') }}</th>
                                    <th>{{ __('translation.transaction_date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Auth::user()->TransactionHistory as $val)
                                    <tr style="background-color: #f0f3f2;">
                                        <td class="align-middle border-top-0">9458</td>
                                        <td class="align-middle border-top-0">478650678345605</td>
                                        <td class="align-middle border-top-0">Type</td>
                                        <td class="align-middle border-top-0">Jun 12, 2024</td>
                                    </tr>
                                @endforeach
                                @if(count(Auth::user()->TransactionHistory) == 0)
                                    <tr>
                                        <td colspan="5">No Record Found.</td>
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


<!-- Transaction History section end-->

@endsection
@section('addScript')
<script type="text/javascript" src="{{URL::to('/public/web_assets/js/profile.js')}}"></script>
@endsection