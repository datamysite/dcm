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
                        <li class="breadcrumb-item"><a href="{{route('user.profile')}}" style="color: #000;"><strong>{{ __('translation.Profile') }}</strong></a></li>
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
                        DCM presents an excellent opportunity for individuals seeking to exchange their digital coins for immediate cash.
                        you can effortlessly convert your cryptocurrency holdings into tangible currency.
                    </p>

                    <div class="mt-5">
                        <h6 style="color: #fff;">{{ __('translation.total_earnings') }}</h6>
                    </div>
                    <!-- col -->
                    <div class="col-6">
                        <div class="input-group">
                            <h4 style="color: #fff;">0.00 {{ __('translation.coins') }}</h4>
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

                                <tr style="background-color: #f0f3f2;">
                                    <td class="align-middle border-top-0">9458</td>
                                    <td class="align-middle border-top-0">478650678345605</td>
                                    <td class="align-middle border-top-0">55.{{ __('translation.coins') }}</td>
                                    <td class="align-middle border-top-0">100.{{ __('translation.aed') }}</td>
                                    <td class="align-middle border-top-0"> <span class="badge bg-warning">status</span></td>
                                    <td class="align-middle border-top-0">Jun 12, 2024</td>
                                </tr>
                                <tr style="background-color: #f0f3f2;">
                                    <td class="align-middle border-top-0">9458</td>
                                    <td class="align-middle border-top-0">478650678345605</td>
                                    <td class="align-middle border-top-0">55.{{ __('translation.coins') }}</td>
                                    <td class="align-middle border-top-0">100.{{ __('translation.aed') }}</td>
                                    <td class="align-middle border-top-0"> <span class="badge bg-success">status</span></td>
                                    <td class="align-middle border-top-0">Jun 12, 2024</td>
                                </tr>
                                <tr style="background-color: #f0f3f2;">
                                    <td class="align-middle border-top-0">9458</td>
                                    <td class="align-middle border-top-0">478650678345605</td>
                                    <td class="align-middle border-top-0">55.{{ __('translation.coins') }}</td>
                                    <td class="align-middle border-top-0">100.{{ __('translation.aed') }}</td>
                                    <td class="align-middle border-top-0"> <span class="badge bg-danger">status</span></td>
                                    <td class="align-middle border-top-0">Jun 12, 2024</td>
                                </tr>
                                <tr style="background-color: #f0f3f2;">
                                    <td class="align-middle border-top-0">9458</td>
                                    <td class="align-middle border-top-0">478650678345605</td>
                                    <td class="align-middle border-top-0">55.{{ __('translation.coins') }}</td>
                                    <td class="align-middle border-top-0">100.{{ __('translation.aed') }}</td>
                                    <td class="align-middle border-top-0"> <span class="badge bg-warning">status</span></td>
                                    <td class="align-middle border-top-0">Jun 12, 2024</td>
                                </tr>

                            </tbody>
                        </table>
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
        <div class="modal-content p-4" style="background-color: #fff;">
            <div class="modal-header border-0">
                <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Cash Withdraw Request</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" style="text-align: center;">

                <div class="row">
                    <div class="col-lg-12">
                        You can effortlessly convert your cryptocurrency holdings into tangible currency, with the updated conversion rate.
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <form action="#" method="POST">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id }}">
                        @csrf
                        <h6>Coins to AED Rate</h6>
                        <div class="row text-center" style="justify-items: center;justify-content: center;">
                            <div class="col-3 mb-1">
                                <input type="text" class="form-control" readonly="readonly" placeholder="Coins" value="5 Coins" disabled />
                            </div> <span style="padding-top: 10px;width:auto">equals</span>
                            <div class="col-3 mb-1">
                                <input type="text" class="form-control" readonly="readonly" placeholder="Rate" value="1.5 AED" disabled />
                            </div>
                        </div>
                        <hr>
                        <h6>Withdraw Cash Request</h6>
                        <div class="row text-center mt-1" style="justify-items: center;justify-content: center;">
                            <div class="col-6 mb-3">
                                <input type="number" class="form-control" id="my_coins" oninput="calculateCoinsRate()" inputmode="numeric" pattern="[0-9\s]{1,5}" min="0" placeholder="Withdraw Coins {{5}}" required="required" />
                            </div>
                            <div class="col-6 mb-3">
                                <input type="text" class="form-control" id="coins_rate" placeholder="0.00 AED" value="" readonly="readonly" />
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary sub-btn" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cash WithDraw Modal End-->

@endsection
@section('addScript')
<script>
    function calculateCoinsRate() {
        const myCoinsInput = document.getElementById('my_coins');
        const coinsRateInput = document.getElementById('coins_rate');

        const myCoinsValue = myCoinsInput.value;
        const conversionRate = 1.5;

        if (myCoinsValue < 0 || isNaN(myCoinsValue) || /^0[0-9]+$/.test(myCoinsValue)) {
            coinsRateInput.value = "0.0 AED";
            return;
        } else {
            const coinsRateValue = Math.floor(myCoinsValue / 5) * conversionRate;
            coinsRateInput.value = Math.abs(coinsRateValue.toFixed(2)) + " AED";
        }


    }
</script>
<script type="text/javascript" src="{{URL::to('/public/web_assets/js/profile.js')}}"></script>
@endsection