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
                        <h1 class="h2-font color--white mb-4 mb-lg-6">How It Works</h1>
                        <div class="form--v7 box-shadow--1 mb-3">

                            <!-- end of form -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- =========== End of Search ============ -->



        <!-- =========== Start of Content Blocks ============ -->
        <section class="bg-color--primary-light--1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-6 mx-auto text-center">
                        <div class="section-title mb-5 mb-lg-7 reveal">
                            <span class="label label--sm label-bg--light--200 color--primary mb-2">Who we are</span>
                            <h2 class="h3-font">A revolutionary technology that <br>is secure and private.
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- end of section title row -->
                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-lg-6 d-md-flex d-lg-block text-md-left remove-space--bottom remove-space--x">
                        <div class="d-lg-flex mb-6 pr-md-3 reveal">
                            <span class="icon--lg color--white rounded-circle mb-3 mb-lg-0 mr-lg-4 jsElement" data-bg-color="#264EEE">
                                <i class="icon icon-key"></i>
                            </span>
                            <div>
                                <h3 class="h4-font font-w--600 mb-2">Step 1</h3>
                                <p>{{$basic->step1}}</p>
                            </div>
                        </div>
                        <!-- end of single features -->
                        <div class="d-lg-flex mb-6 pr-md-3 reveal">
                            <span class="icon--lg color--white rounded-circle mb-3 mb-lg-0 mr-lg-4 jsElement" data-bg-color="#92C75D">
                                <i class="icon icon-window-dev"></i>
                            </span>
                            <div>
                                <h3 class="h4-font font-w--600 mb-2">Step 2</h3>
                                <p>{{$basic->step2}}</p>
                            </div>
                        </div>
                        <!-- end of single features -->
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0 pr-lg-6">
                        <picture>
                            <img class="img-fluid" src="{{asset('frontend/img/illustration-12.png')}}" alt="illustration">
                        </picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!--== end of content block 2 row ==-->
                <div class="row flex-column-reverse flex-lg-row space align-items-center text-center">
                    <div class="col-12 col-lg-6 d-md-flex d-lg-block text-md-left remove-space--bottom remove-space--x">
                        <div class="d-lg-flex mb-6 pr-md-3 reveal">
                            <span class="icon--lg color--white rounded-circle mb-3 mb-lg-0 mr-lg-4 jsElement" data-bg-color="#DA5A63">
                                <i class="icon icon-card-update"></i>
                            </span>
                            <div>
                                <h3 class="h4-font font-w--600 mb-2">Step 3</h3>
                                <p>{{$basic->step3}}</p>
                            </div>
                        </div>
                        <!-- end of single features -->
                        <div class="d-lg-flex mb-6 pr-md-3 reveal">
                            <span class="icon--lg color--white rounded-circle mb-3 mb-lg-0 mr-lg-4 jsElement" data-bg-color="#278AF0">
                                <i class="icon icon-money-bag"></i>
                            </span>
                            <div>
                                <h3 class="h4-font font-w--600 mb-2">Step 4</h3>
                                <p>{{$basic->step4}}</p>
                            </div>
                        </div>
                        <!-- end of single features -->
                         <!-- end of single features -->
                        <div class="d-lg-flex mb-6 pr-md-3 reveal">
                            <span class="icon--lg color--white rounded-circle mb-3 mb-lg-0 mr-lg-4 jsElement" data-bg-color="#278AF0">
                                <i class="icon icon-money-bag"></i>
                            </span>
                            <div>
                                <h3 class="h4-font font-w--600 mb-2">Step 5</h3>
                                <p>{{$basic->step5}}</p>
                            </div>
                        </div>
                        <!-- end of single features -->
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0 pl-lg-6">
                        <picture>
                            <img class="img-fluid" src="{{asset('frontend/img/illustration-17.png')}}" alt="illustration">
                        </picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!--== end of content block 2 row ==-->
            </div>
        </section>
        <!-- =========== End of Content Blocks ============ -->




@endsection


