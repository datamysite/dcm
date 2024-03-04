@extends('web.includes.master')

@section('content')

<section class="mt-110">
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <!-- breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.profile')}}" style="color: #000;"><strong>Profile</strong></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>Payment History</a></strong></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</section>

<!-- Payment History section start-->

<div class="mt-8 mb-lg-14 mb-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row gx-10">

          
        @include('web.includes.user-nav')

            <!-- col -->
            <div class="col-lg-8 m-1">

                <div class="row" style="background-color: #F2F2F2;border-radius: 10px">
                    <h4 class="mb-5 mt-5"> <b>PAYMENT HISTORY</b></h4>
                </div>

                <div class="row mt-5" style="border-radius: 10px ; background-color:#f0f3f2;">

                    <div class="table-responsive-xxl" style="width:100%;">
                        <!-- Table -->
                        <table class="table mb-0 text-nowrap text-center">
                            <!-- Table Head -->
                            <thead class="bg-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Account Details</th>
                                    <th>Contact Number</th>
                                    <th>Account Requested</th>
                                    <th>Status</th>
                                    <th>Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table body -->
                                <tr>

                                    <td colspan="6" class="align-middle border-top-0">No Data Found.</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<!-- Payment History section end-->

@endsection