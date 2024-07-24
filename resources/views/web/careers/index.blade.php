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
                     <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>{{ __('translation.careers') }}</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container">

        <div class="dcm_banner" style="background: url({{URL::to('/public/web_assets/images/banner/dcm_banner.png')}}) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
            <h2 class="text-center" style="padding-top: 200px;color:#fff ;font-size:35px">{{ __('translation.careers') }}</2>
        </div>

        <div class="dcm_banner_mobile">
            <h2 class="text-center" style="padding-top:40px;color:#fff">{{ __('translation.careers') }}</2>
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
        <!-- row -->
        <div class="row">
            @if($data['vacancies']->isNotEmpty())
            <div class="col-lg-12 col-12" style=" padding: 0px 15px 150px 15px;">
                <div class="row">
                    @foreach ($data['vacancies'] as $vacancies)

                    <div class="job_details">
                        <div class="job-icon" style=" {{app()->getLocale() == 'en' ? 'float:left; margin-right:10px;' : 'float:right; margin-left:10px;'}}; margin-right: 10px;">
                            <img src="{{ URL::to('/public') }}/web_assets/images/icons/briefcase.png" alt="DCM Vacancies" width="20px" height="20px">
                        </div>

                        <div class="job-details" >
                            <div {{ app()->getLocale() == 'ar' ? 'id=job_title' : ''}}>
                                <h3>{{ $vacancies->title }}</h3>
                            </div>

                            <strong>{{ __('translation.description') }}</strong>

                            <div {{ app()->getLocale() == 'ar' ? 'id=job_desc' : ''}} >
                                <p>
                                    {!! Str::words($vacancies->desc, 30,'...') !!}
                                </p>
                            </div>

                            <strong>{{ __('translation.salary') }}</strong>
                            <p> {{ $vacancies->salary_from.' - '.$vacancies->salary_to }}.{{ __('translation.aed') }}</p>

                            <strong>{{ __('translation.closing_date') }} </strong>
                            <p> {{ date('d-M-Y', strtotime($vacancies->end_date)) }} </p>
                           
                            <a href="{{route('careers.job-details', base64_encode($vacancies->id) )}}" class="btn btn-secondary" target="_blank">{{ __('translation.read_more') }}</a>
                            <!-- <a href="#" class="btn btn-primary" id="apply-now-btn" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a> -->
                        </div>
                    </div>
                    <p>
                        <hr>
                    </p>
                    @endforeach
                </div>
            </div>

            <div class="row mt-8 text-center">
                <div class="col">
                    <!-- nav -->
                    {{ $data['vacancies']->links() }}
                </div>
            </div>
            @else

            <div class="row text-center" style="justify-content: center; padding: 50px 0 350px 0;">
                <div class="col-lg-6" style="padding: 20px;border-radius:20px;background-color:#f2f2f2;">
                    <span style="font-size: 17px;color:#000;">{{ __('translation.no_vacancies') }}</span>
                </div>
            </div>
            @endif
        </div>
        <!-- <div class="divider"></div> -->
</section>
<!-- section -->
@endsection
@section('addScript')
<script>
    // Multi-Transaction//
    $(document).ready(function() {
        $('.job_details').each(function() {
            var job_desc = $(this).find('#job_desc').text();

            $.ajax({
                url: "{{route('multi-translate')}}",
                cache: false,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    textArray: [job_desc],
                },
                success: function(response) {

                    $(this).find('#job_desc').html(response);

                }.bind(this)

            });
        });
    });
</script>
@endsection