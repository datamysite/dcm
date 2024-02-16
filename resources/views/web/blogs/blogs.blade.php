@extends('web.includes.master')

@section('content')

<!-- Slider Section Start-->
<section class="mt-110">
    <div class="container np-container">
        <div class="hero-slider">

            <div style="background: url({{URL::to('/public')}}/web_assets/images/slider/img_03.png) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">

                    <div class="slider_div2">

                        <h3>Featured</h3>
                        <h6>Breaking Into Product Design: Advice from Untitled Founder, Frankie</h6>
                        <p>Let’s get one thing out of the way: you don’t need a fancy Bachelor’s Degree to get into Product Design. We sat down with Frankie Sullivan to talk about gatekeeping in...</p>
                        <a href="single-blog.php" target="_blank">Read More</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider Section End-->


<div class="mt-0">
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="Home" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="Blogs" style="color:#1DACE3;"><strong>Blogs</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<!-- Blogs section Start Here -->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container np-container">

        <div class="row" style="align-items: center;justify-content: center;">
            <div class="col-lg-4 blogItem mt-5">
                <div class="post-feather" style="background-image: url('{{URL::to('/public')}}/web_assets/images/slider/img_03.png');">
                    <div class="feather-image" style=" background-image: url('./public/web_assets/images/avatar/avatar-4.jpg');">
                    </div>
                    <a href="Single-Blog" target="blank" class="readMorebutton">Read More</a>
                </div>
                <h5>Maniging to linear 101</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's,
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's,
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                </p>
            </div>
            <div class="col-lg-4 blogItem mt-5">
                <div class="post-feather" style="background-image: url('{{URL::to('/public')}}/web_assets/images/slider/img_03.png');">
                    <div class="feather-image" style=" background-image: url('./public/web_assets/images/avatar/avatar-4.jpg');">
                    </div>
                    <a href="Single-Blog" target="blank" class="readMorebutton">Read More</a>
                </div>
                <h5>Maniging to linear 101</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's,
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                </p>
            </div>
            <div class="col-lg-4 blogItem mt-5">
                <div class="post-feather" style="background-image: url('{{URL::to('/public')}}/web_assets/images/slider/img_03.png');">
                    <div class="feather-image" style=" background-image: url('./public/web_assets/images/avatar/avatar-4.jpg');">
                    </div>
                    <a href="Single-Blog" target="blank" class="readMorebutton">Read More</a>
                </div>
                <h5>Maniging to linear 101</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's,
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                </p>
            </div>
            <div class="col-lg-4 blogItem mt-5">
                <div class="post-feather" style="background-image: url('{{URL::to('/public')}}/web_assets/images/slider/img_03.png');">
                    <div class="feather-image" style=" background-image: url('./public/web_assets/images/avatar/avatar-4.jpg');">
                    </div>
                    <a href="Single-Blog" target="blank" class="readMorebutton">Read More</a>
                </div>
                <h5>Maniging to linear 101</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's,
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                </p>
            </div>
            <div class="col-lg-4 blogItem mt-5">
                <div class="post-feather" style="background-image: url('{{URL::to('/public')}}/web_assets/images/slider/img_03.png');">
                    <div class="feather-image" style=" background-image: url('./public/web_assets/images/avatar/avatar-4.jpg');">
                    </div>
                    <a href="Single-Blog" target="blank" class="readMorebutton">Read More</a>
                </div>
                <h5>Maniging to linear 101</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's,
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                </p>
            </div>
            <div class="col-lg-4 blogItem mt-5">
                <div class="post-feather" style="background-image: url('{{URL::to('/public')}}/web_assets/images/slider/img_03.png');">
                    <div class="feather-image" style=" background-image: url('./public/web_assets/images/avatar/avatar-4.jpg');">
                    </div>
                    <a href="Single-Blog" target="blank" class="readMorebutton">Read More</a>
                </div>
                <h5>Maniging to linear 101</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's,
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                </p>
            </div>

        </div>

    </div>
</section>
<!-- Blogs section End Here -->


@endsection