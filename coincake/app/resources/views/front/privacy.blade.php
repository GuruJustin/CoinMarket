@extends('include.frontend')
@section('content')
  <!-- =========== Start of Search ============ -->
        <section class="space d-flex align-items-center">
            <div class="background-holder background--cover">
                <img src="{{asset('frontend/img/image-1.jpg')}}" alt="image" class="background-image-holder">
            </div>
            <!-- end of backgound image -->
            <div class="background-holder bg-color--primary"></div>
            <!-- end of overlay backgound color-->
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto text-center pt-7 pt-lg-9">
                        <h1 class="h2-font color--white mb-4 mb-lg-6">Privacy & Policies</h1>
                        <div class="form--v7 box-shadow--1 mb-3">

                            <!-- end of form -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- =========== End of Search ============ -->



        <!-- =========== Start of Templates ============ -->
        <section class="space bg-color--primary-light--1 hidden">
            <div class="background-holder background--top--left">
                <img src="{{asset('frontend/img/layout/wave-17.png')}}" alt="wave" class="background-image-holder">
            </div>
            <!-- end of top bg overlay -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-10 col-lg-5 mx-auto text-center text-lg-left mb-5 reveal">
                        <h2 class="h3-font mb-2">Terms & Condition</h2>
                        <p class="mb-4">{{$basic->terms}}</p>
                        <a href="#" class="btn btn-size--md rounded--none btn-border btn-border--color--dark text-color--700 btn-hover--primary">
                            <span class="btn__text font-w--500">Browse All Templates</span>
                        </a>
                    </div>
                    <!-- end of content row-->
                    <div class="col-12 col-lg-7">
                        <div class="carosuel-slider--v1">
                            <a href="#" class="slide position-relative">
                                <img src="{{asset('assets/images/privacy.jpg')}}" alt="carosuel-slider-img">
                            </a>
                            <a href="#" class="slide">
                                <img src="{{asset('assets/images/privacy.jpg')}}" alt="carosuel-slider-img">
                            </a>
                            <a href="#" class="slide">
                                <img src="{{asset('assets/images/privacy.jpg')}}" alt="carosuel-slider-img">
                            </a>
                            <a href="#" class="slide">
                                <img src="{{asset('assets/images/privacy.jpg')}}" alt="carosuel-slider-img">
                            </a>
                        </div>
                    </div>
                    <!-- end of carosuel col -->
                </div>
            </div>
            <!-- end of switchable content -->
        </section>
        <!-- =========== End of Templates ============ -->



        <!-- =========== Start of Content Blocks ============ -->
        <section class="space">
            <div class="container">
                <div class="row pb-7 flex-column-reverse flex-lg-row-reverse align-items-center text-center justify-content-between">
                    <div class="col-12 col-md-10 col-lg-6 col-xl-5 d-lg-block text-lg-left mt-9 mt-lg-6 reveal">
                        <h2 class="h3-font mb-2">Privacy</h2>
                        <p class="mb-4">{{$basic->privacy}}</p>
                        <a href="{{route('register')}}" class="btn btn-size--md rounded--none btn-border btn-border--color--dark text-color--700 btn-hover--primary">
                            <span class="btn__text font-w--500">Get Started Now</span>
                        </a>
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-5 col-xl-6">
                        <picture class="overlap-image__main">
                            <img class="img-fluid" src="{{asset('assets/images/privacy.jpg')}}" alt="content-block-img">
                        </picture>

                    </div>
                    <!-- enf of image col -->
                </div>
                <!--== end of content block 1 row ==-->
                <div class="row mt-lg-10 flex-column-reverse flex-lg-row align-items-center text-center justify-content-between">
                    <div class="col-12 col-md-10 col-lg-6 col-xl-5 d-lg-block text-lg-left mt-6 mt-lg-6 reveal">
                        <h2 class="h3-font mb-2">Policy</h2>
                        <p class="mb-4">{{$basic->policy}}.
                            <br>
                            <br> We provide you with a comprehensive set of marketing tools to engage with your audience.</p>
                        <a href="{{route('register')}}" class="btn btn-size--md rounded--none btn-border btn-border--color--dark text-color--700 btn-hover--primary">
                            <span class="btn__text font-w--500">Get Started Now</span>
                        </a>
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-5 col-xl-6">
                        <picture class="overlap-image__main text-right">
                            <img class="img-fluid   w-85" src="{{asset('assets/images/policy.jpg')}}" alt="content-block-img">
                        </picture>

                    </div>
                    <!-- enf of image col -->
                </div>
                <!--== end of content block 2 row ==-->
            </div>
        </section>
        <!-- =========== End of Content Blocks ============ -->

@endsection


