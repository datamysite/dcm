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
                        <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.profile')}}" style="color: #000;"><strong>Profile</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>Withdraw Payment</a></strong></li>
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

                <div class="row" style="background-color: #f0f3f2;border-radius: 10px">
                    <h4 class="mb-2 mt-5">WITHDRAW PAYMENT</h4>
                    <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p class="mb-0 lead"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release...</p>


                    <div class="mt-5">
                        <h6>Your Total Earnings</h6>
                    </div>
                    <!-- col -->
                    <div class="col-6">
                        <div class="input-group">
                            <h4>0.00$</h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="submit" name="user-withdraw" class="btn btn-primary shadow-gray" style="float: right;" value="WITHDRAW">
                    </div>
                    <p></p>
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

                                    <td class="align-middle border-top-0">1</td>
                                    <td class="align-middle border-top-0">
                                        #14899
                                    </td>
                                    <td class="align-middle border-top-0">1</td>
                                    <td class="align-middle border-top-0">
                                        #14899
                                    </td>
                                    <td class="align-middle border-top-0">
                                        <span class="badge bg-warning">Processing</span>
                                    </td>
                                    <td class="align-middle border-top-0">March 5, 2023</td>
                                </tr>

                                <tr>

                                    <td class="align-middle border-top-0">1</td>
                                    <td class="align-middle border-top-0">
                                        #14899
                                    </td>
                                    <td class="align-middle border-top-0">1</td>
                                    <td class="align-middle border-top-0">
                                        #14899
                                    </td>
                                    <td class="align-middle border-top-0">
                                        <span class="badge bg-warning">Processing</span>
                                    </td>
                                    <td class="align-middle border-top-0">March 5, 2023</td>

                                </tr>
                                <tr>

                                    <td class="align-middle border-top-0">1</td>
                                    <td class="align-middle border-top-0">
                                        #14899
                                    </td>
                                    <td class="align-middle border-top-0">1</td>
                                    <td class="align-middle border-top-0">
                                        #14899
                                    </td>
                                    <td class="align-middle border-top-0">
                                        <span class="badge bg-danger">Not Done</span>
                                    </td>
                                    <td class="align-middle border-top-0">March 5, 2023</td>
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

@endsection