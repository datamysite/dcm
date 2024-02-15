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
                        <li class="breadcrumb-item"><a href="Home" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="Single-Blog" style="color:#1DACE3;"><strong>Single Blog Post</a></strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container">
        <div class="hero-slider">

            <div style="background: url(./public/web_assets/images/slider/single_post.jpg) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">

                    <div class="slider_div2">

                        <h3>Featured</h3>
                            <h6>Breaking Into Product Design: Advice from Untitled Founder, Frankie</h6>
                            <p>Let’s get one thing out of the way: you don’t need a fancy Bachelor’s Degree to get into Product Design. We sat down with Frankie Sullivan to talk about gatekeeping in</p>
                    </div>

                </div>
            </div>
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
                        <h2 style="text-align: left;">Where Can I Find Coupon and Deals ?</h2>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-lg-12 col-12">
                    <div class="row align-items-center mb-5">
                        <div class="col-lg-12">
                            <!-- text -->
                            <div class="text-center text-md-start">
                                <h1 class="mb-6">Maniging to linear 101</h1>
                                <h3 class="mb-0">What is Lorem Ipsum?</h3>
                                <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                    of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                    containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p>
                                <p class="mb-5 lead">standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mb-10">
                    <!-- col -->
                    <div class="col-lg-6">
                        <div class="me-6" style="border-radius: 10px;">
                            <!-- img -->
                            <img src="{{URL::to('/public')}}/web_assets/images/blog/tesla.png" alt="" class="img-fluid w-100 rounded" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- text -->
                        <div>
                            <h1 class="mb-5">About Us</h1>
                            <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <p class="mb-0 lead"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p class="mb-0 lead">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-lg-12 col-12">

                    <div class="row align-items-center mb-5">
                        <div class="col-lg-12">
                            <!-- text -->
                            <div class="text-center text-md-start">
                                <h3 class="mb-0">What is Lorem Ipsum?</h3>
                                <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                    of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                    containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p>
                                <p class="mb-0 lead">standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- col -->
                <div class="col-lg-12 col-12">

                    <div class="row align-items-center mb-5">
                        <div class="col-lg-12">
                            <!-- text -->
                            <div class="text-center text-md-start">
                                <h3 class="mb-0">Where can I get Some ?</h3>
                                <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                    of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                    containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p>
                                <p class="mb-0 lead">standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                    of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                    containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="row align-items-center mb-10">


                    <div class="col-lg-6">
                        <!-- text -->
                        <div>
                            <h1 class="mb-6">About Us</h1>
                            <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <p class="mb-0 lead"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p class="mb-0 lead">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                                very popular during the Renaissance.</p>
                        </div>
                    </div>

                    <!-- col -->
                    <div class="col-lg-6">
                        <div class="me-6" style="border-radius: 10px;">
                            <!-- img -->
                            <img src="{{URL::to('/public')}}/web_assets/images/blog/teslaII.png" alt="" class="img-fluid w-100 rounded" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <!-- text -->
                        <div class="text-center text-md-start mt-5">
                            <h3 class="mb-0">Where can I get Some ?</h3>
                            <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p>
                            <p class="mb-0 lead">standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-lg-12 col-12">

                    <div class="row align-items-center mb-5">
                        <div class="col-lg-12">
                            <!-- text -->
                            <div class="text-center text-md-start">
                                <h1 class="mb-6">Maniging to linear 101</h1>
                                <h3 class="mb-0">What is Lorem Ipsum?</h3>
                                <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                    of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                    containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p>
                                <p class="mb-5 lead">standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mb-10">
                    <!-- col -->
                    <div class="col-lg-6">
                        <div class="me-6" style="border-radius: 10px;">
                            <!-- img -->
                            <img src="{{URL::to('/public')}}/web_assets/images/blog/teslaIII.png" alt="" class="img-fluid w-100 rounded" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- text -->
                        <div>
                            <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <p class="mb-0 lead"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p class="mb-0 lead">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                                very popular during the Renaissance.</p>
                            <p class="mb-0 lead"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p class="mb-0 lead">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                                very popular during the Renaissance.</p>
                            <p class="mb-0 lead">Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- col -->
                <div class="col-lg-12 col-12">
                    <div class="row align-items-center mb-5">
                        <div class="col-lg-12">
                            <!-- text -->
                            <div class="text-center text-md-start">
                                <h1 class="mb-0">LEAVE A COMMENT</h1>
                                <p class="mb-0 lead">standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- col -->
                <div class="col-lg-12">

                    <div class="input-group feedback-comment py-5">
                        <input type="text" class="form-control rounded" name="user_msg" placeholder="Type here .. " required="required">
                        <img src="{{URL::to('/public')}}/web_assets/images/avatar/avatar-10.jpg" alt="" class="rounded">
                        <button type="submit" class="btn btn-primary shadow-gray" style="font-weight: lighter;" value="">SUBMIT</button>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- Single Blog section End Here -->


@endsection