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
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}" style="color: #000;"><strong>{{ __('translation.dashboard') }}</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.with_draw_menu') }}</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- section start-->
<div class="mt-8 mb-lg-14 mb-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row gx-10">


            @include('web.includes.user-nav')

            <!-- col -->
            <div class="col-lg-8 m-1">

                <div class="row" style="background-color: #F2F2F2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A);">
                    <h4 class="mb-5 mt-5"> <b style="color: #fff;">{{ __('translation.total_earnings_txt_heading_02') }} </b></h4>
                </div>

                <div class="row mt-5" style="background-color: #f0f3f2;border-radius: 10px; background-image: linear-gradient(90deg, #2791CC, #1F428A);">

                    <p class="mb-0 lead" style="color: #fff;">
                        {{ __('translation.withdraw_payment_txt') }}
                    </p>

                    <div class="mt-5">
                        <h6 style="color: #fff;">{{ __('translation.total_earnings') }}</h6>
                    </div>
                    <!-- col -->
                    <div class="col-6">
                        <div class="input-group">
                            <h4 style="color: #fff;">{{number_format(Auth::user()->wallet)}} {{ __('translation.coins') }}</h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <a href="javascript:void(0)" role="button" data-bs-toggle="modal" data-bs-target="#WithDrawModal" class="btn btn-primary shadow-gray" {!! app()->getLocale() == 'ar' ? 'style="float: left;"' : 'style="float: right;"' !!} >{{ __('translation.withdraw_btn') }}</a>
                    </div>
                    <p></p>
                </div>

                <div class="row mt-5" style="border-radius: 10px ; background-color:#f0f3f2;">

                    <div class="table-responsive-xxl" style="width:100%;">
                        <!-- Table -->
                        <table id="myTable" class="table mb-0 text-nowrap text-center">
                            <!-- Table Head -->
                            <thead class="bg-light">
                                <tr>
                                    <th>{{ __('translation.id_txt') }}</th>
                                    <th>{{ __('translation.request_number') }}</th>
                                    <th>{{ __('translation.number_of_coins') }}</th>
                                    <th>{{ __('translation.amount') }}</th>
                                    <th>{{ __('translation.status') }}</th>
                                    <th>{{ __('translation.date_txt') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($requests as $key => $val)
                                <tr style="background-color: #f0f3f2;">
                                    <td class="align-middle border-top-0">{{++$key}}</td>
                                    <td class="align-middle border-top-0">{{sprintf("%05d", $val->id)}}</td>
                                    <td class="align-middle border-top-0">{{number_format($val->coins)}} {{ __('translation.coins') }}</td>
                                    <td class="align-middle border-top-0">{{number_format($val->coins)}} {{ __('translation.'.$val->curr) }}</td>
                                    <td class="align-middle border-top-0">
                                        @switch($val->status)
                                        @case('1')
                                        <span class="badge bg-warning">Pending</span>
                                        @break

                                        @case('2')
                                        <span class="badge bg-warning">Processing</span>
                                        @break

                                        @case('3')
                                        <span class="badge bg-success">Tansfered</span>
                                        @break

                                        @case('4')
                                        <span class="badge bg-danger">Rejected</span>
                                        @break
                                        @endswitch
                                    </td>
                                    <td class="align-middle border-top-0">{{date('d-M-Y | h:i a', strtotime($val->created_at))}}</td>
                                </tr>
                                @endforeach
                                @if(count($requests) == 0)
                                <tr>
                                    <td colspan="6">No Record Found.</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>

                        <div class="row mt-8 text-center">
                            <div class="col">
                                <!-- nav -->
                                {{ $requests->links() }}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- section end-->
<!-- Cash WithDraw Modal Start-->
<div class="modal fade" id="WithDrawModal" tabindex="-1" aria-labelledby="WithDrawModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4" style="background-color: #fff; position: relative;">
            <div class="withdraw-loader"><img src="{{URL::to('/public/loader.gif')}}"></div>
            <div class="modal-header border-0">
                <h5 class="modal-title fs-3 fw-bold" id="userModalLabel"> {{ __('translation.cash_withdraw_request') }}</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" style="text-align: center;">

                <div class="row">
                    <div class="col-lg-12">
                        {{ __('translation.withdraw_payment_txt') }}
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <form action="{{route('user.withdrawPayment.submit')}}" id="submitFormWithdraw">
                        @csrf
                        <h6> {{ __('translation.coins_to_aed_rate') }}</h6>
                        <div class="row text-center" style="justify-items: center;justify-content: center;">
                            <div class="col-3 mb-1" style="border:0;">
                                <input type="text" class="form-control" readonly="readonly" placeholder="Coins" value="{{$rate->coins}} Coins" disabled />
                            </div> <span style="padding-top: 10px;width:auto">{{ __('translation.equals_txt') }}</span>
                            <div class="col-3 mb-1">
                                <input type="text" class="form-control" readonly="readonly" placeholder="{{ __('translation.rate_txt') }}" value="{{$rate->value}} {{$country->curr}}" disabled />
                            </div>
                        </div>
                        <hr>
                        <h6>{{ __('translation.cash_withdraw_request') }}</h6>
                        <div class="row text-center mt-1" style="justify-items: center;justify-content: center;">
                            <div class="col-6 mb-3">
                                <input type="number" class="form-control" id="my_coins" name="coins" oninput="calculateCoinsRate()" inputmode="numeric" pattern="[0-9\s]{1,5}" min="1" max="{{Auth::user()->wallet }}" placeholder="Withdraw Coins {{5}}" required="required" />
                            </div>
                            <div class="col-6 mb-3">
                                <input type="text" class="form-control" id="coins_rate" placeholder="0.00 {{$country->curr}}" value="" disabled />
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary sub-btn" name="submit" value="{{ __('translation.submit_txt') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cash WithDraw Modal End-->

@endsection
@section('addScript')
<script type="text/javascript" src="{{URL::to('/public/web_assets/js/profile.js')}}"></script>
<script type="text/javascript">
    $(document).on("submit", "#submitFormWithdraw", function(s) {
        $('.withdraw-loader').css({
            display: 'flex'
        });
        var e = $(this),
            t = new FormData($("#submitFormWithdraw")[0]);
        $(".errors").css({
                display: "none"
            }),
            $.ajax({
                type: "POST",
                url: e.attr("action"),
                data: t,
                dataType: "json",
                encode: !0,
                processData: !1,
                contentType: !1
            })
            .done(function(s) {
                "success" == s.success ?
                    (Toast.fire({
                            icon: "success",
                            title: s.message
                        }),
                        setTimeout(function() {
                            location.reload();
                        }, 700)) :
                    Toast.fire({
                        icon: "error",
                        title: s.message
                    });
                $('.withdraw-loader').css({
                    display: 'none'
                });
            })
            .fail(function(s) {
                $('.withdraw-loader').css({
                    display: 'none'
                });
                Toast.fire({
                    icon: "error",
                    title: 'Something went wrong!'
                });

            }),
            s.preventDefault();
    });



    function calculateCoinsRate() {
        const myCoinsInput = document.getElementById('my_coins');
        const coinsRateInput = document.getElementById('coins_rate');

        const myCoinsValue = myCoinsInput.value;
        const conversionRate = {{$rate->value}};

        if (myCoinsValue < 0 || isNaN(myCoinsValue) || /^0[0-9]+$/.test(myCoinsValue)) {
            coinsRateInput.value = "0.0 {{$country->curr}}";
            return;
        } else {
            const coinsRateValue = parseFloat((myCoinsValue / 5) * conversionRate);
            coinsRateInput.value = coinsRateValue + " {{$country->curr}}";
        }


    }
</script>
@endsection