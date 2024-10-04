@extends('ampn-web.includes.master')
@section('custom-script')
<?php
   $script_links = [
      URL::to('/public/web_assets/js/amp/main.js')
   ];
   $main_script = '';
   foreach ($script_links as $key => $value) {
      $content = \App\Helpers\AmpHelper::minify($value);
      $main_script .= $content;
      echo $content;
   }
?>
@endsection
@section('ampscript-hash')
<?php
   $hash = \App\Helpers\AmpHelper::hash_ampscript($main_script); echo $hash;
?>
@endsection
@section('custom-css')
<?php
   $style_link = app()->getLocale() == 'ar' ? '/web_assets/css/amp/n_style-ar.css' : '/web_assets/css/amp/n_style.css'; 

   $content = \App\Helpers\AmpHelper::minify(URL::to('/public'.$style_link));
   echo $content;

?>
@endsection
@section('addImagesrc')
<link rel="image_src" href="{{URL::to('/public/storage/blogs/'.$data['blog']->banner)}}" />
@endsection
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
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item"><a href="{{route('Blogs', [$region])}}" style="color: #000;"><strong>Blogs</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#1DACE3;"><strong>{{$data['blog']->heading}}</strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container">
            <div class="feather-image-blog singleImg">
                <img src="{{ config('app.storage').'blogs/'.$data['blog']->banner }}" height="150px" alt="{{empty($data['blog']->banner_alt) ? $data['blog']->slug : $data['blog']->banner_alt}}">
            </div>
    </div>
</section>
<!-- Slider Section End-->


    <!-- Single Blog section Start Here -->
    <section class="my-lg-5 my-8">
        <!-- container -->
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="mb-8">
                        <!-- heading -->
                        <h1 style="text-align: left;">{{$data['blog']->heading}}</h1>
                    </div>
                </div>
            </div>
            

            {!! $data['blog']->description !!}

        </div>
    </section>
    <!-- Single Blog section End Here -->

   <!-- Google Tag Manager -->
    <amp-analytics type="googleanalytics"> 
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-EC6612Z03T>"></script> 
      <script> 
        window.dataLayer = window.dataLayer || []; 
        function gtag() { dataLayer.push(arguments); } 
        gtag('js', new Date()); 
        gtag('config', 'G-EC6612Z03T'); 
      </script> 
    </amp-analytics>
@endsection