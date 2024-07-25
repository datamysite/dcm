@extends('web.includes.master')
@section('amphtml')
<link rel="amphtml" href="{{$actual_link_m}}" />
@endsection

@section('content')



<div class="mt-110">
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->

            </div>
        </div>
    </div>
</div>


<!-- 404 Main Section Start Here -->
<section class="my-lg-5 my-8">


    <div class="mt-5 container ad-container np-container">
        <div class="row text-center" style="justify-content: center;">
            <div class="col-12 text-center">
                <img src="{{URL::to('/public/web_assets/images/404.png')}}" alt="Cashback Banner" style="border-radius:20px;height:auto;width:50%;padding:70px 0px;">
            </div>
        </div>
    </div>


</section>
<!-- 404 Main Section End Here -->

@endsection