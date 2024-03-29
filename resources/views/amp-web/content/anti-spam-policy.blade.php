@extends('web.includes.master')

@section('content')

<div class="mt-110">
    <div class="container np-container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        @if ( app()->getLocale() == 'en' )
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>Anti-Spam Policy</a></strong></li>
                        @endif
                        @if ( app()->getLocale() == 'ar' )
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong> الرئيسية </strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong> سياسية الخصوصية </a></strong></li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container np-container">
        <div class="dcm_banner" style="background:url('{{URL::to('/public/web_assets/images/banner/dcm_banner.png')}}') no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
            <h2 class="text-center" style="padding-top: 200px;color:#fff ;font-size:35px">{{ __('translation.anti_spam_policy') }}</2>
        </div>

        <div class="dcm_banner_mobile">
            <h2 class="text-center" style="padding-top:40px;color:#fff">{{ __('translation.anti_spam_policy') }}</2>
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

<!-- Anti Spam Policy section Start -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-lg-12 col-12">

                @if ( app()->getLocale() == 'en' )
                <div class="text-center text-md-start">
                    <p class="mb-5">
                        We promise not to send you any emails or other messages that aren't in line with our terms and conditions and privacy statement. Your information won't be distributed, sold, or rented to any other businesses or outside parties. Using your 'Profile Details' page, you can subscribe to or unsubscribe from our monthly emails.
                    </p>
                    <p class="mb-5">
                        All of our members are expected to conduct their accounts in a way that doesn't spam the public or our partner merchants. If any of our partner merchants contact us with complaints about one of our members spamming them in any way, we will promptly cancel that member's account.
                    </p>
                    <p class="mb-5">
                        If it comes to our attention that one of our members is sending unsolicited emails or spamming in any other way, we will take this seriously and look into it. If necessary, the member's account may be suspended or they may be completely barred from our network of websites.
                    </p>
                </div>
                @endif

                @if ( app()->getLocale() == 'ar' )
                <div class="text" style="text-align: right;">
                    <p class="mb-5">
                    نعدك بعدم إرسال أي رسائل بريد إلكتروني أو رسائل أخرى لا تتوافق مع الشروط والأحكام وبيان الخصوصية الخاص بنا. لن يتم توزيع معلوماتك أو بيعها أو تأجيرها إلى أي شركات أخرى أو أطراف خارجية. باستخدام صفحة "تفاصيل الملف الشخصي"، يمكنك الاشتراك في رسائل البريد الإلكتروني الشهرية أو إلغاء الاشتراك فيها.
                    </p>
                    <p class="mb-5">
                    من المتوقع من جميع أعضائنا أن يديروا حساباتهم بطريقة لا تؤدي إلى إرسال بريد عشوائي إلى الجمهور أو التجار الشركاء. إذا اتصل بنا أي من التجار الشريكين لدينا لتقديم شكاوى بشأن قيام أحد أعضائنا بإرسال بريد عشوائي إليهم بأي شكل من الأشكال، فسنقوم على الفور بإلغاء حساب هذا العضو.
                    </p>
                    <p class="mb-5">
                    إذا نما إلى علمنا أن أحد أعضائنا يرسل رسائل بريد إلكتروني غير مرغوب فيها أو يرسل بريدًا عشوائيًا بأي طريقة أخرى، فسنأخذ هذا على محمل الجد وننظر فيه. إذا لزم الأمر، قد يتم تعليق حساب العضو أو قد يتم حظره تمامًا من شبكة مواقعنا الإلكترونية.
                    </p>
                </div>
                @endif


            </div>
        </div>


    </div>
</section>

<!-- Anti Spam Policy section End -->


@endsection