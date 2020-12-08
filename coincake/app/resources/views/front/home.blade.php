@extends('include.frontend')
@section('content')
  <!-- =========== Start of Hero ============ -->
        <section class="hero hero--full hero--v12 d-flex align-items-center">
            <div class="background-holder background--cover z-index1">
                <img src="img/hero-12.png" alt="image" class="background-image-holder">
            </div>
            <!-- end of backgound image -->
            <div class="background-holder bg-color--primary"></div>
            <!-- end of overlay backgound color-->
            <div class="svg-shape w-100 z-index2">
                <img src="{{asset('frontend/img/layout/wave-14.svg')}}" alt="wave" class="svg">
            </div>
            <!-- end of bottom svg shape -->

            <div class="container mb-10">
                <div class="row flex-column-reverse flex-lg-row align-items-center mb-10 mb-lg-5">
                    <div class="col-12 col-md-10 col-lg-6 mx-auto mx-lg-0 text-center text-lg-left z-index3">
                        <div class="hero-content reveal">
                            <h1 class="hero__title color--white h2-font font-w--700 mb-2">{{$basic->htitle}}
                            </h1>
                            <p class="hero__description color--white opacity--80 font-size--18 mb-4 mb-lg-5 pr-xl-5">{{$basic->hstitle}}</p>
                            <!-- end of text content -->
                        </div>
                        <!-- end of content -->
                        <div class="form--v4 reveal">
                            <form action="#" class="form bg-color--white-opacity--10 rounded--05">
                                <div class="input-group d-flex">
                                    <input type="email" class="form-control" placeholder="Enter your email" required="">
                                    <button class="btn btn-size--md btn-hover--splash btn-bg--cta--5" type="submit"><span
                                            class="btn__text">Subscribe</span></button>
                                </div>
                            </form>
                        </div>
                        <!-- end of from -->
                    </div>
                    <!-- end of col -->
                    <div class="col-12 col-lg-6 mt-6 mt-lg-0 mb-3 mb-lg-0 pl-lg-4  hero__image z-index3 reveal">
                        <picture><img src="{{asset('assets/images/headerimg.jpg')}}" alt="hero-image" class="img-fluid"></picture>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
        </section>
        <!-- =========== End of Hero ============ -->

        <!-- =========== Start of Core Feautes ============ -->
        <section class="pt-5 pt-xl-0 z-index3 jsElement" data-pull="-200">
            <div class="container">
                <div class="bg-white box-shadow--5 rounded--10 text-center pt-6 pb-2 px-3 px-sm-5 px-md-3 pt-lg-8 pb-lg-3 px-lg-10">
                    <div class="row justify-content-between border--bottom mb-5 pb-lg-1 text-lg-left">
                        <div class="col-12 col-md-6 col-xl-5 pb-5 reveal">
                            <span class="mb-2">
                                <img src="{{asset('frontend/img/exchange-01.svg')}}" alt="exchange-icon">
                            </span>
                            <h3 class="h5-font font-w--500 mb-1">Strong security</h3>
                            <p>Protection against DDoS attacks, full data encryption, compliant with PCI DSS standards
                            </p>
                        </div>
                        <!-- end of single item col -->
                        <div class="col-12 col-md-6 col-xl-5 pb-5 reveal">
                            <span class="mb-2">
                                <img src="{{asset('frontend/img/exchange-02.svg')}}" alt="exchange-icon">
                            </span>
                            <h3 class="h5-font font-w--500 mb-1">High liquidity</h3>
                            <p>Fast order execution, low spread, access to high liquidity orderbook for top currency pairs
                            </p>
                        </div>
                        <!-- end of single item col -->
                        <div class="col-12 col-md-6 col-xl-5 pb-5 reveal">
                            <span class="mb-2">
                                <img src="{{asset('frontend/img/exchange-03.svg')}}" alt="exchange-icon">
                            </span>
                            <h3 class="h5-font font-w--500 mb-1">High treding volume</h3>
                            <p>Fast order execution, low spread, access to high liquidity orderbook for top currency pairs
                            </p>
                        </div>
                        <!-- end of single item col -->
                        <div class="col-12 col-md-6 col-xl-5 pb-5 reveal">
                            <span class="mb-2">
                                <img src="{{asset('frontend/img/exchange-04.svg')}}" alt="exchange-icon">
                            </span>
                            <h3 class="h5-font font-w--500 mb-1">Competitive commisions</h3>
                            <p>Reasonable trading fees for takers and makers, special conditions for high volume traders.
                            </p>
                        </div>
                        <!-- end of single item col -->
                    </div>
                    <!-- end of features row -->
                    <div class="row justify-content-between reveal">
                        <div class="col-12 col-md-4 text-center mb-4">
                            <span class="font-size--48 color--primary">$70B+</span>
                            <p>Digital currency exchanged</p>
                        </div>
                        <!-- end of single item col -->
                        <div class="col-12 col-md-4 text-center mb-4">
                            <span class="font-size--48 color--primary">197</span>
                            <p>Countries supported</p>
                        </div>
                        <!-- end of single item col -->
                        <div class="col-12 col-md-4 text-center mb-4">
                            <span class="font-size--48 color--primary">10M+ </span>
                            <p>Customers served</p>
                        </div>
                        <!-- end of single item col -->
                    </div>
                    <!-- end of facts row -->
                </div>
            </div>
        </section>
        <!-- =========== End of Core Feautes ============ -->

        <!-- =========== Start of Video ============ -->
        <section class="space--top z-index1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-9 col-lg-6 mb-4 mb-lg-6 mx-auto text-center reveal">
                        <h2 class="mb-2 h3-font font-w--700">The world's most advanced cryptocurrency trading platform
                        </h2>
                        <p class="mb-4">{{$basic->sitename}} operates in the context of a legal Australian company and in compliance with Australian rules and regulations. All operations, hosting and data storage is done within Australia.</p>
                        <a href="{{route('register')}}" class="btn btn-size--md btn-bg--cta--5 btn-hover--3d"><span class="btn__text">Create Account</span></a>
                    </div>
                </div>
                <!-- end of section title row -->
                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto">
                        <div class="position-relative bg-color--white-opacity--05 p-2 p-md-4 rounded--10 box-shadow--1">
                            <picture><img src="{{asset('frontend/img/media-thumb-4.jpg')}}" alt="media-thumb" class="img-fluid rounded--10">
                            </picture>
                            <!-- end of thumb -->
                            <a class="lightbox pos-abs-bottom-right m-6 m-md-7" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=aRh_eUQSmIg">
                                <span class="pos-abs-center opacity--50">
                                    <img src="{{asset('frontend/img/layout/play-btn-border.svg')}}" alt="play-btn-border" class="svg">
                                </span>
                                <span class="btn btn-media btn-media-size--md btn-bg--cta--5 rounded--full"><i class="icon icon-triangle-right"></i></span>
                            </a>
                            <!-- end of play btn -->
                        </div>
                        <!-- end of video area -->
                    </div>
                    <!-- end of video area col -->
                </div>
                <!-- end of video area row -->
            </div>
        </section>
        <!-- =========== End of Video ============ -->

        <!-- =========== Start of Steps ============ -->
        <section class="space--bottom steps--v1 pt-10 bg-color--primary jsElement" data-pull="-100">
            <div class="container">
                <div class="row space--top">
                    <div class="col-12 col-md-6 col-xl-5 offset-xl-1 mb-5 mb-lg-0 reveal">
                        <div>
                            <h2 class="h3-font font-w--700 mb-2">3 very simple steps to get started with {{$basic->sitename}}</h2>
                            <p class="opacity--60">With over 13 million users, {{$basic->sitename}} is the best platform to get started buying and selling your cryptocurrency. It is the easiest platform for beginners to easily get into cryptocurrency.</p>
                        </div>
                        <div class="ml-lg-10 d-none d-md-inline-block">
                            <img src="{{asset('frontend/img/layout/steps-arrow.svg')}}" alt="arrow" class="svg svg-shape--default opacity--10">
                        </div>
                    </div>
                    <!-- end of section title -->
                    <div class="col-12 col-md-6 col-xl-5 offset-xl-1 pr-sm-6 pr-md-0 remove-space--bottom steps-wrapper">
                        <div class="step position-relative d-flex align-items-start pb-6 reveal">
                            <div class="mr-3 mr-md-4">
                                <span class="icon--lg step__icon bg-color--white-opacity--05 box-shadow--1 rounded-circle">
                                    <img src="{{asset('frontend/img/exchange-05.svg')}}" alt="icon">
                                </span>
                            </div>
                            <!-- end of icon -->
                            <div class="position-relative">
                                <h3 class="h4-font font-w--600 mb-1 step__title">Create a wallet</h3>
                                <p class="opacity--80">Have a wallet already? Skip this step <a href="{{route('login')}}" class="text-color--cta--5">Login To Wallet</a>.</p>
                            </div>
                            <!-- end of content -->
                        </div>
                        <!-- end of single step -->
                        <div class="step position-relative d-flex align-items-start pb-6 reveal">
                            <div class="mr-3 mr-md-4">
                                <span class="icon--lg step__icon bg-color--white-opacity--05 box-shadow--1 rounded-circle">
                                    <img src="{{asset('frontend/img/exchange-06.svg')}}" alt="icon">
                                </span>
                            </div>
                            <!-- end of icon -->
                            <div class="position-relative">
                                <h3 class="h4-font font-w--600 mb-1 step__title">Open account</h3>
                                <p class="opacity--80">Simply <a href="{route('register')}}" class="text-color--cta--5">open a new account</a>to start buying and selling crypto assets.</p>
                            </div>
                            <!-- end of content -->
                        </div>
                        <!-- end of single step -->
                        <div class="step position-relative d-flex align-items-start pb-6 reveal">
                            <div class="mr-3 mr-md-4">
                                <span class="icon--lg step__icon bg-color--white-opacity--05 box-shadow--1 rounded-circle">
                                    <img src="{{asset('frontend/img/exchange-07.svg')}}" alt="icon">
                                </span>
                            </div>
                            <!-- end of icon -->
                            <div class="position-relative">
                                <h3 class="h4-font font-w--600 mb-1 step__title">Start trading</h3>
                                <p class="opacity--80"><a href="{route('login')}}" class="text-color--cta--5">Buy</a> or <a href="{route('login')}}" class="text-color--cta--5">Sell</a> crypto assets through our secure platform.</p>
                            </div>
                            <!-- end of content -->
                        </div>
                        <!-- end of single step -->
                    </div>

                </div>
            </div>
        </section>
        <!-- =========== End of Steps ============ -->

        <!-- =========== Start of More Features ============ -->
        <section class="space--top pb-lg-10 ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-6 mb-5 mb-xl-0 pl-xl-4 mx-auto pos-abs-xl-vertical-center pos-left text-xl-right">
                        <picture>
                            <img src="{{asset('frontend/img/illustration-21.png')}}" alt="illustration" class="img-fluid reveal">
                        </picture>
                    </div>
                    <!-- end of image -->
                    <div class="col-12 col-xl-5 ml-auto">
                        <div class="row">
                            <div class="col-12 mb-5 mb-sm-7 mb-xl-5 text-center text-xl-left mx-auto reveal">
                                <h2 class="mb-1 h3-font font-w--700">Create your digital <br> currency portfolio today
                                </h2>
                                <p>{{$basic->sitename}} has great features that make it the best place.</p>
                            </div>
                        </div>
                        <!-- end of section title row -->
                        <div class="row">
                            <div class="col-12 col-sm-6 col-xl-11 mb-3 reveal">
                                <div class="d-flex flex-column flex-xl-row align-items-center align-items-xl-start text-center text-xl-left max-w--320 mx-auto mx-xl-0">
                                    <span class="mb-2 mr-lg-3"><img src="{{asset('frontend/img/exchange-08.svg')}}" alt="icon"></span>
                                    <div>
                                        <h3 class="font-size--20 font-w--600 mb-1">Manage your portfolio</h3>
                                        <p class="font-size--16">Buy and sell popular digital currencies, keep track of them in the one place.</p>
                                    </div>
                                </div>
                                <!-- end of section item -->
                            </div>
                            <!-- end of single item col -->
                            <div class="col-12 col-sm-6 col-xl-11 mb-3 reveal">
                                <div class="d-flex flex-column flex-xl-row align-items-center align-items-xl-start text-center text-xl-left max-w--320 mx-auto mx-xl-0">
                                    <span class="mb-2 mr-lg-3"><img src="{{asset('frontend/img/exchange-09.svg')}}" alt="icon"></span>
                                    <div>
                                        <h3 class="font-size--20 font-w--600 mb-1">Recurring buys</h3>
                                        <p class="font-size--16">Invest in digital currency slowly over time by scheduling buys daily, weekly, or monthly.</p>
                                    </div>
                                </div>
                                <!-- end of section item -->
                            </div>
                            <!-- end of single item col -->
                            <div class="col-12 col-sm-6 col-xl-11 mb-3 reveal">
                                <div class="d-flex flex-column flex-xl-row align-items-center align-items-xl-start text-center text-xl-left max-w--320 mx-auto mx-xl-0">
                                    <span class="mb-2 mr-lg-3"><img src="{{asset('frontend/img/exchange-10.svg')}}" alt="icon"></span>
                                    <div>
                                        <h3 class="font-size--20 font-w--600 mb-1">Vault protection</h3>
                                        <p class="font-size--16">For added security, store your funds in a vault with time delayed withdrawals.</p>
                                    </div>
                                </div>
                                <!-- end of section item -->
                            </div>
                            <!-- end of single item col -->
                            <div class="col-12 col-sm-6 col-xl-11 mb-3 reveal">
                                <div class="d-flex flex-column flex-xl-row align-items-center align-items-xl-start text-center text-xl-left max-w--320 mx-auto mx-xl-0">
                                    <span class="mb-2 mr-lg-3"><img src="{{asset('frontend/img/exchange-11.svg')}}" alt="icon"></span>
                                    <div>
                                        <h3 class="font-size--20 font-w--600 mb-1">Mobile apps</h3>
                                        <p class="font-size--16">Stay on top of the markets with the Coinbase app for Android or iOS.</p>
                                    </div>
                                </div>
                                <!-- end of section item -->
                            </div>
                            <!-- end of single item col -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========== End of More Features ============ -->



      <!-- =========== Start of Newsletter & Footer ============ -->
        <section class="space--top bg-color--primary">

            <div class=" position-relative pb-7 pb-md-4 pb-lg-1 pb-xl-0 z-index1">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-9 col-lg-6 mb-4 mb-lg-7 mx-auto text-center reveal">
                            <h2 class="mb-2 font-size--40 font-w--700">Sign up for the latest updates.</h2>
                            <p>{{$basic->sitename}} is designed to pioneer the plasma architecture, the leading scalability solution for Ethereum is a stakeholder and infinitely scalable..</p>
                        </div>
                    </div>
                    <!-- end of section title row -->

                    <div class="row mb-8">
                        <div class="col-12 col-md-10 col-lg-6 mx-md-auto">
                            <div class="form--v4 reveal">
                                <form action="#" class="form bg-color--primary rounded--05">
                                    <div class="input-group d-flex">
                                        <input type="email" class="form-control" placeholder="Enter your email" required>
                                        <button class="btn btn-hover--splash btn-bg--primary" type="submit"><span class="btn__text"><i class="icon icon-arrow-right"></i></span></button>
                                    </div>
                                </form>
                                <!-- end of from -->
                            </div>
                        </div>
                    </div>
                    <!-- end of row -->
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-9 col-xl-8 text-center mx-auto mb-3 mb-sm-1">
                            <picture>
                                <img src="{{asset('frontend/img/newsletter-illustrator-2.png')}}" alt="illustration" class="img-fluid">
                            </picture>
                        </div>
                    </div>
                    <!-- end of image row -->
                </div>
                <!-- end of newsletter container -->
            </div>
            <!-- end of newsletter area -->
@endsection


