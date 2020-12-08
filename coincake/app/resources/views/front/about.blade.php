@extends('include.frontend')
@section('content')
    <!-- =========== Start of Hero ============ -->
        <section class="hero hero--full hero--v9 bg-color--primary d-flex align-items-center hidden">
            <div class="canvas-lines opacity--10">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- end of canvas lines -->
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-12 col-md-10 col-lg-7 mx-auto mx-lg-0 text-center text-lg-left z-index2">
                        <div class="hero-content reveal">
                            <h1 class="hero__title mb-2 mb-lg-3">Access the
                                <br> power of blockchain</h1>
                            <h1 class="hero__title h2-font font-w--700 mb-2 cd-headline letters scale">
                                     More
                                    <span class="cd-words-wrapper color--light">
                                        <b class="is-visible">Transparently</b>
                                        <b>Efficiently</b>
                                        <b>Securely</b>
                                    </span>
                                </h1>
                            <!-- end of text content -->
                            <a href="#" class="btn btn-bg--cta--4 btn-hover--3d">
                                <span class="btn__text"> <i class="fab fa-android pr-1"></i><i class="fab fa-apple pr-1"></i> Download App</span>
                            </a>
                            <!-- end of button -->
                        </div>
                        <!-- end of content -->
                        <div class="features features--v2 color--white d-flex justify-content-center justify-content-lg-start flex-wrap remove-space--x mt-4 mt-lg-8 reveal">
                            <div class="single-item m-1 m-sm-4">
                                <span class="h2-font">
                                    <i class="icon icon-key"></i>
                                </span>
                                <p class="h4-font">Access</p>
                            </div>
                            <!-- end of single item -->

                            <div class="single-item m-1 m-sm-4">
                                <span class="h2-font">
                                    <i class="icon icon-metrics"></i>
                                </span>
                                <p class="h4-font">Speed</p>
                            </div>
                            <!-- end of single item -->

                            <div class="single-item m-1 m-sm-4">
                                <span class="h2-font">
                                    <i class="icon icon-handshake"></i>
                                </span>
                                <p class="h4-font">Certainty</p>
                            </div>
                            <!-- end of single item -->

                            <div class="single-item m-1 m-sm-4">
                                <span class="h2-font">
                                    <i class="icon icon-money-bag"></i>
                                </span>
                                <p class="h4-font">Cost</p>
                            </div>
                            <!-- end of single item -->

                        </div>
                    </div>
                    <!-- end of col -->
                    <div class="col-12 col-lg-6 mt-6 mt-lg-0 mb-2 mb-lg-0 pl-lg-4 pos-abs-lg-vertical-center pos-right hero__image">
                        <picture><img src="{{asset('assets/images/about-video-image.jpg')}}" alt="media-thumb" class="img-fluid"></picture>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
        </section>
        <!-- =========== End of Hero ============ -->

        <!-- =========== Start of Core Feautes ============ -->
        <section class="py-4 pb-lg-10">
            <div class="section-overlap bg-color--primary-light--1 pos-abs-top jsElement" data-height="360"></div>
            <!-- end of section overlap bg -->

            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-9 col-lg-6 mb-4 mb-lg-7 mx-auto text-center reveal">
                        <h2 class="mb-2 font-size--40 font-w--700">The future <br> of <span class="color--primary">cryptocurrency</span> is here</h2>
                        <p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours. </p>
                    </div>
                </div>
                <!-- end of section title row -->
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto mb-3">
                        <div class="text-center">
                            <span class="icon--xl bg-color--primary rounded--full color--white mb-2">
                                <i class="icon icon-remittances"></i>
                            </span>
                            <h3 class="font-size--26 font-w--700">Vision</h3>
                            <hr class="bg-color--primary border--none mx-auto mb-3 jsElement" data-height="3" data-width="80">
                            <p>{{$basic->vision}}</p>
                        </div>
                        <!-- end of single feature -->
                    </div>
                    <!-- end of row -->
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto mb-3">
                        <div class="text-center">
                            <span class="icon--xl bg-color--primary rounded--full color--white mb-2">
                                <i class="icon icon-mobile-money"></i>
                            </span>
                            <h3 class="font-size--26 font-w--700">Mission</h3>
                            <hr class="bg-color--primary border--none mx-auto mb-3 jsElement" data-height="3" data-width="80">
                            <p>{{$basic->mission}}</p>
                        </div>
                        <!-- end of single feature -->
                    </div>
                    <!-- end of row -->
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto mb-3">
                        <div class="text-center">
                            <span class="icon--xl bg-color--primary rounded--full color--white mb-2">
                                <i class="icon icon-micro-payments"></i>
                            </span>
                            <h3 class="font-size--26 font-w--700">Goal</h3>
                            <hr class="bg-color--primary border--none mx-auto mb-3 jsElement" data-height="3" data-width="80">
                            <p>{{$basic->goal}}</p>
                        </div>
                        <!-- end of single feature -->
                    </div>
                    <!-- end of row -->
                </div>
            </div>
        </section>
        <!-- =========== End of Core Feautes ============ -->

        <!-- =========== Start of Content Blocks ============ -->
        <section class="space bg-color--primary mx-xl-5">
            <div class="svg-shape--top w-100 z-index1">
                <img src="{{asset('frontend/img/layout/braces.svg')}}" alt="wave" class="svg w-100 fill--white">
            </div>
            <!-- end of top braces svg shape -->
            <div class="svg-shape--top opacity--05">
                <img src="{{asset('frontend/img/layout/wave-11.svg')}}" alt="wave" class="svg fill--white">
            </div>
            <!-- end of top right mini svg shape -->
            <div class="svg-shape opacity--05">
                <img src="{{asset('frontend/img/layout/wave-10.svg')}}" alt="wave" class="svg fill--white">
            </div>
            <!-- end of top right mini svg shape -->

            <div class="position-relative mb-xl-10">
                <div class="container">
                    <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                        <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                            <div class="mb-3 mb-md-5">
                                <h2 class="mb-2 h3-font mb-md-3 font-w--700">{{$basic->about_title}} </h2>
                                <p>{{ $basic->about }}</p>
                            </div>
                            <!-- end of content -->


                        </div>
                        <!-- end of content col -->
                        <div class="col-12 col-lg-6 mb-3 mb-lg-0 pos-abs-lg-vertical-center pos-left text-lg-right pr-lg-10">
                            <picture><img src="{{asset('frontend/img/illustration-16.png')}}" alt="hero-image" class="img-fluid reveal"></picture>
                        </div>
                        <!-- enf of image col -->
                    </div>
                    <!-- end of content block-1 row -->
                </div>
                <!-- end of content block 1 container -->
            </div>
            <!--== end of content block 1 ==-->

            <div class="position-relative pb-7 py-xl-10">
                <div class="container">
                    <div class="row flex-column-reverse flex-lg-row align-items-center text-center">
                        <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                           <div class="row text-md-left justify-content-center">
                                <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                    <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-turtle"></i></span>
                                    <div>
                                        <h3 class="h5-font font-w--700 mb-sm-1">VERY SLOW</h3>
                                        <p>3-5 days to settle</p>
                                    </div>
                                </div>
                                <!-- end of single iteam -->
                                <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                    <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-cut"></i></span>
                                    <div>
                                        <h3 class="h5-font font-w--700 mb-sm-1">UNRELIABLE</h3>
                                        <p>High rates of failure</p>
                                    </div>
                                </div>
                                <!-- end of single iteam -->
                                <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                    <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-card-update"></i></span>
                                    <div>
                                        <h3 class="h5-font font-w--700 mb-sm-1">EXPENSIVE</h3>
                                        <p>$1.6 trillion in yearly costs*</p>
                                    </div>
                                </div>
                                <!-- end of single iteam -->
                                <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                    <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-link-broken"></i></span>
                                    <div>
                                        <h3 class="h5-font font-w--700 mb-sm-1">UNACCEPTABLE</h3>
                                        <p>User demand smooth experience</p>
                                    </div>
                                </div>
                                <!-- end of single iteam -->
                            </div>
                            <!-- end of points row -->
                        </div>
                        <div class="col-12 col-lg-6 mt-5 mt-lg-0 mb-3 mb-lg-0 pl-lg-10 pos-abs-lg-vertical-center pos-right text-lg-left">
                            <picture><img src="{{asset('frontend/img/illustration-17.png')}}" alt="hero-image" class="img-fluid reveal"></picture>
                        </div>
                        <!-- enf of image col -->
                    </div>
                    <!-- end of content block 2 row -->
                </div>
                <!-- end of content block 2 container -->
            </div>
            <!--== end of content block 2 ==-->
        </section>
        <!-- =========== Start of Content Blocks ============ -->

        <!-- =========== Start of Features ============ -->
        <section class="space--bottom jsElement" data-pull="-60">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                        <div class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                            <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"> <i class="icon icon-key"></i> </span>
                            <h3 class="h5-font font-w--700 mb-1">Access</h3>
                            <p class="font-size--16">If you are looking at blank cassettes on the web, you may be very confused at the price.</p>
                        </div>
                        <!-- end of card -->
                    </div>
                    <!-- end if single iteam col -->
                    <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                        <div class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                            <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"> <i class="icon icon-metrics"></i></span>
                            <h3 class="h5-font font-w--700 mb-1">Speed</h3>
                            <p class="font-size--16">If you are looking at blank cassettes on the web, you may be very confused at the price.</p>
                        </div>
                        <!-- end of card -->
                    </div>
                    <!-- end if single iteam col -->
                    <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                        <div class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                            <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"><i class="icon icon-touch-id"></i></span>
                            <h3 class="h5-font font-w--700 mb-1">Security</h3>
                            <p class="font-size--16">If you are looking at blank cassettes on the web, you may be very confused at the price.</p>
                        </div>
                        <!-- end of card -->
                    </div>
                    <!-- end if single iteam col -->
                    <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                        <div class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                            <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"><i class="icon icon-3d-29"></i></span>
                            <h3 class="h5-font font-w--700 mb-1">Decentralized</h3>
                            <p class="font-size--16">If you are looking at blank cassettes on the web, you may be very confused at the price.</p>
                        </div>
                        <!-- end of card -->
                    </div>
                    <!-- end if single iteam col -->
                </div>
            </div>
        </section>
        <!-- =========== End of Features ============ -->

        <!-- =========== Start of Content Block Big ============ -->
        <section>
            <div class="svg-shape--top w-100 z-index1">
                <img src="{{asset('frontend/img/layout/braces.svg')}}" alt="wave" class="svg w-100 fill--white">
            </div>
            <!-- end of top braces svg shape -->
            <div class=" bg-color--primary-light--1 space--top position-relative z-index2">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-10 mx-auto text-center reveal">
                            <h2 class="mb-3 font-size--40 font-w--700"><span class="color--primary">Next generation</span> financial network <br> and decentralized economy.</h2>
                            <p class="mb-4 mb-lg-7 px-lg-6">{{$basic->sitename}} is designed to pioneer the plasma architecture, the leading scalability solution for Ethereum Layer 2. The {{$basic->sitename}} network is a stakeholder and infinitely scalable blockchain for plasma with a decentralized exchange
                                built into its core consensus layer. We worked with different strategic investors worldwide. Our partners include financial and technology ecosystem leaders who are unique in their position to contribute to global adoption.</p>
                            <a class="btn btn-bg--primary lightbox reveal" data-autoplay="true" data-vbtype="video" href="#https://www.youtube.com/watch?v=aRh_eUQSmIg">
                                <span class="btn__text"><i class="icon icon-play-outline mr-1 font-size--30"></i>How {{$basic->sitename}} works</span>
                            </a>
                        </div>
                    </div>
                    <!-- end of section title row -->
                </div>
            </div>
            <!-- end of text content -->

            <div class="text-center position-relative space--bottom space--top--2 jsElement" data-pull="-40">
                <div class="svg-shape--top w-100 z-index1">
                    <img src="{{asset('frontend/img/layout/wave-12.svg')}}" alt="wave" class="svg fill-primary-light--1 w-100">
                </div>

            </div>
            <!-- end of image -->
        </section>
        <!-- =========== End of Content Block Big ============ -->

        <!-- =========== Start of Partner and customer ============ -->
        <section class="space--top bg-color--primary">
            <div class="background-holder background--top--left">
                <img src="{{asset('frontend/img/layout/oval.png')}}" alt="wave" class="background-image-holder">
            </div>
            <!-- end of top left oval -->
            <div class="svg-shape w-100 jsElement" data-push="250">
                <img src="{{asset('frontend/img/layout/wave-13.svg')}}" alt="wave" class="svg w-100">
            </div>
            <!-- end of bottom line wave shape -->
            <div class="section-overlap bg-color--primary-light--1 d-lg-none d-xl-block pos-abs-bottom jsElement" data-height="170"></div>
            <!-- end of section overlap bg -->

            <div class="container">
                <div class="row text-center text-md-left justify-content-between align-items-lg-center align-items-xl-end mb-6">
                    <div class="col-12 col-sm-10 col-md-7 mb-5 mb-md-0 mx-auto mx-md-0 reveal">
                        <h2 class="mb-2 h3-font font-w--700">Partnered with <br> Innovative Leaders Globally</h2>
                        <p class="opacity--80">{{$basic->sitename}} is designed to pioneer the plasma architecture, the leading scalability solution for Ethereum Layer 2. The {{$basic->sitename}} network is a stakeholder and infinitely scalable blockchain for plasma.</p>
                    </div>
                    <!-- end of section title col -->
                    <div class="col-12 col-sm-8 col-md-5 col-xl-4 d-inline-flex d-lg-block align-items-center justify-content-center mx-auto mx-md-0">
                        <div class="card box-shadow--5 border--none p-5 p-md-4 pt-lg-3 pb-lg-5 px-lg-8 text-center">
                            <span class="font-size--72 color--green">400+</span>
                            <span class="h4-font text-color--400">Customers</span>
                        </div>
                    </div>
                    <!-- end of customers count col -->
                </div>
                <!-- end of top row content-->

                <div class="row justify-content-between align-items-lg-start">
                    <div class="col-12 col-lg-7 col-xl-7 d-flex flex-wrap flex-column flex-sm-row align-items-center justify-content-center align-items-lg-start justify-content-lg-start justify-content-xl-between mb-4 mb-lg-0 reveal">
                        <div class="card d-inline-flex border--none bg-color--transparent card-hover--bg--alt-shadow mb-1 mx-sm-2 mx-sm-1 mx-xl-0 mb-md-4 p-3 jsElementFocus">
                            <span><img src="{{asset('front-assets/images/pay-c.png')}}"  width="60"  alt="partner"></span>
                        </div>
                        <!-- end of single item -->
                        <div class="card d-inline-flex border--none bg-color--transparent card-hover--bg--alt-shadow mb-1 mx-sm-2 mx-xl-0 mb-md-4 p-3 jsElementFocus">
                            <span><img src="{{asset('front-assets/images/pay-b.png')}}"  width="60"  alt="partner"></span>
                        </div>
                        <!-- end of single item -->
                        <div class="card d-inline-flex border--none bg-color--transparent card-hover--bg--alt-shadow mb-1 mx-sm-2 mx-xl-0 mb-md-4 p-3 jsElementFocus">
                            <span><img src="{{asset('front-assets/images/stripe.png')}}"  width="60"  alt="partner"></span>
                        </div>
                        <!-- end of single item -->
                        <div class="card d-inline-flex border--none bg-color--transparent card-hover--bg--alt-shadow mb-1 mx-sm-2 mx-xl-0 mb-md-4 p-3 jsElementFocus focused">
                            <span><img src="{{asset('front-assets/images/pay-a.png')}}"  width="60"  alt="partner"></span>
                        </div>
                        <!-- end of single item -->
                        <div class="card d-inline-flex border--none bg-color--transparent card-hover--bg--alt-shadow mb-1 mx-sm-2 mx-xl-0 mb-md-4 p-3 jsElementFocus">
                            <span><img src="{{asset('front-assets/images/flutter.png')}}"  width="60"  alt="partner"></span>
                        </div>
                        <!-- end of single item -->
                        <div class="card d-inline-flex border--none bg-color--transparent card-hover--bg--alt-shadow mb-1 mx-sm-2 mx-xl-0 mb-md-4 p-3 jsElementFocus">
                            <span><img src="{{asset('front-assets/images/pay-c.png')}}" width="60" alt="partner"></span>
                        </div>
                        <!-- end of single item -->
                    </div>
                    <!-- end of partner brand logo col -->
                    <div class="col-12 col-md-10 col-lg-5 col-xl-4 mx-auto mx-lg-0">
                        <div class="testimonials testimonials--v2 position-relative pb-7">
                            <div class="carosuel-slider--v5 card box-shadow--5 p-3 pb-10">
                                @foreach($testimonial as $data)
                                <div class="slide">
                                    <span class="testimonial__quote color--green"><i class="icon icon-quote"></i></span>

                                    <blockquote class="body-font blockquote mb-2">{{$data->details}}</blockquote>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">@if($data->user_id > 1)
@if( file_exists($data->user->image))
<img src="{{asset($data->user->image)}} " width="100" alt="Profile Pic">
@else
<img src=" {{url('assets/user/images/user-default.png')}} " width="100" alt="Profile Pic">
 @endif
 @else
 <img src=" {{url('assets/user/images/user-default.png')}} " width="100" alt="Profile Pic">

 @endif</span>
                                        <div class="d-flex flex-column">

                                            <span>@if($data->user_id < 2)
Administrator
@else
{{$data->user->fname}} {{$data->user->lname}}
@endif
</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of single slide -->
@endforeach

                            </div>
                        </div>
                    </div>
                    <!-- end of testimonial area -->
                </div>
                <!-- end of bottom row content -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Partner and customer ============ -->




@endsection


