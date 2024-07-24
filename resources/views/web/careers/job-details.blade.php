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
                     <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                     <li class="breadcrumb-item" aria-current="page"><a href="{{route('careers')}}" style="color:#1DACE3;"><strong>{{ __('translation.careers') }}</a></strong></li>
                     <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ $data['vacancies']->title }}</a></strong></li>

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container">

        <div class="dcm_banner" style="background: url('{{ URL::to('/public') }}/web_assets/images/banner/dcm_banner.png') no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
            <h2 class="text-center" style="padding-top: 200px;color:#fff ;font-size:35px">{{ __('translation.careers_details') }}</2>
        </div>

        <div class="dcm_banner_mobile">
            <h2 class="text-center" style="padding-top:40px;color:#fff">{{ __('translation.careers_details') }}</2>
        </div>

    </div>
</section>
<!-- Slider Section End-->

<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-6 text-center">
            </div>
        </div>
    </div>
</section>

<!-- section -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">

        @if(session('success'))
        <div class="row text-center" style="justify-content: center;">
            <div class="col-lg-6" style="padding: 20px;border-radius:20px;background-color:#50C878;">
                <span style="font-size: 17px;color:#fff;">{{ __('translation.success_msg') }}</span>
            </div>
        </div>
        @endif
        @if(session('failure'))
        <div class="row text-center" style="justify-content: center;">
            <div class="col-lg-6" style="padding: 20px;border-radius:20px;background-color:#FF7074;">
                <span style="font-size: 17px;color:#fff;">{{ __('translation.failure_msg') }}</span>
            </div>
        </div>
        @endif
        @if(session('exist'))
        <div class="row text-center" style="justify-content: center;">
            <div class="col-lg-6 bg-warning" style="padding: 20px;border-radius:20px;">
                <span style="font-size: 17px;color:#fff;">{{ __('translation.exist_msg') }}</span>
            </div>
        </div>
        @endif

        @if(session('extensions'))
        <div class="row text-center" style="justify-content: center;">
            <div class="col-lg-6" style="padding: 20px;border-radius:20px;background-color:#FF7074;">
                <span style="font-size: 17px;color:#fff;">{{ __('translation.extensions_msg') }}</span>
            </div>
        </div>
        @endif
        @if(session('filesize'))
        <div class="row text-center" style="justify-content: center;">
            <div class="col-lg-6" style="padding: 20px;border-radius:20px;background-color:#FF7074;">
                <span style="font-size: 17px;color:#fff;">{{ __('translation.filesize_msg') }}</span>
            </div>
        </div>
        @endif

        <p>
            <hr>
        </p>

        <!-- row -->
        <div class="row mt-8">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-us-feature">

                                <div class="job-details">

                                    <h3> {{ $data['vacancies']->title }}</h3>

                                    <p>
                                    <h6>{{ __('translation.location_01') }} {{ __('translation.location_02') }}, {{ __('translation.location_03') }}</h6>
                                    </p>
                                    <strong>{{ __('translation.description') }} </strong>

                                    <div {{app()->getLocale() == 'ar' ? 'id=job_desc' : ''}}>
                                        <p>
                                            {!! $data['vacancies']->desc !!}
                                        </p>
                                    </div>

                                    <p><b>{{ __('translation.salary') }} {{ number_format($data['vacancies']->salary_from).' - '.number_format($data['vacancies']->salary_to) }}.{{ __('translation.aed') }}</b></p>
                                    <h6>{{ __('translation.closing_date') }} {{ date('d-M-Y', strtotime($data['vacancies']->end_date)) }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="text-align: end;">
                            <div style="text-align: center;">
                                @if(Auth::check())
                                @if(Auth::user()->email_verified == 1)
                                
                                    @if($data['vacancies']->status == 1)
                                    <p><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal">{{ __('translation.apply_now') }}</a></p>
                                    @endif

                                @else
                                <p><strong>{{ __('translation.verification_txt') }}</strong></p>
                                @endif
                                @else
                                <p><a class="btn btn-primary" href="javascript:void(0)" role="button" data-bs-toggle="modal" data-bs-target="#userModal">{{ __('translation.Sign_in_to_apply') }}</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <p>
                        <hr>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section -->
<!-- Apply-Modal Start-->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4" style="background-color: #fff;">

            <div class="modal-header border-0">
                <h5 class="modal-title fs-3 fw-bold" id="applyModalLabel">{{ __('translation.job_apply') }}</h5>
            </div>

            <div class="modal-body">
                <form action="{{route('careers.apply')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="vac_id" value="{{ $data['vacancies']->id }}" />
                    @if(Auth::check())
                    <input type="hidden" name="user_id" value="{{Auth::user()->id }}" />
                    @endif

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('translation.upload_resume') }}</label>
                        <input type="file" class="form-control" name="resume_file" placeholder="Upload Your Resume" required="required" />
                    </div>

                    <div class="mb-5">
                        <small class="form-text">
                            <b style="color: red;">{{ __('translation.note') }}</b>

                            <ul>
                                <li><strong>{{ __('translation.note_01') }}</strong></li>
                                <li><strong>{{ __('translation.note_02') }}</strong></li>
                            </ul>

                        </small>
                    </div>

                    <div class="text-center" style="justify-content: center;">
                        <button type="submit" class="btn btn-primary">{{ __('translation.apply_now') }}</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- Apply-Modal End-->
@endsection
@section('addScript')
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{route('translate')}}",
            cache: false,
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                text: $('#job_desc').text(),
            },
            success: function(response) {
                $('#job_desc').html(response);

            }
        });
    });
</script>
@endsection