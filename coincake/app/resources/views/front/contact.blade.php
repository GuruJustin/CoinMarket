@extends('include.frontend')
@section('content')
  <!-- =========== Start of Search ============ -->
        <section class="space d-flex align-items-center">
            <div class="background-holder background--cover">
                <img src="img/image-1.jpg" alt="image" class="background-image-holder">
            </div>
            <!-- end of backgound image -->
            <div class="background-holder bg-color--primary"></div>
            <!-- end of overlay backgound color-->
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto text-center pt-7 pt-lg-9">
                        <h1 class="h2-font color--white mb-4 mb-lg-6">How can we help?</h1>
                        <div class="form--v7 box-shadow--1 mb-3">
                            <!-- end of row -->
                <div class="row">
                    <div class="col-12">
                        <div class="hero__image jsElement" data-pull="-35">
                            <picture><img src="{{asset('frontend/img/illustration-25.png')}}" alt="hero-image" class="img-fluid"></picture>
                        </div>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
                            <!-- end of form -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- =========== End of Search ============ -->
        <!-- =========== Start of Core Customer ============ -->
        <section class="pb-6 pb-lg-10 bg-color--primary-light--1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-9 col-lg-6 mb-4 mb-lg-5 mx-auto text-center reveal">
                        <div class="section-title">
                            <h2 class="mb-2 h3-font">Trusted by the world's best</h2>
                            <p>SpaceMax powers millions of websites across hundreds of industries for people just like you.</p>
                        </div>
                    </div>
                </div>
                <!-- end of section title row -->
                <div class="row mb-1">
                    <div class="col-12 col-lg-9 mx-auto flex-wrap d-flex justify-content-center justify-content-lg-between align-items-center reveal">
                        <span class="m-2"><img src="img/customer-logo-1.png" alt="customer-logo"></span>
                        <span class="m-2"><img src="img/customer-logo-2.png" alt="customer-logo"></span>
                        <span class="m-2"><img src="img/customer-logo-3.png" alt="customer-logo"></span>
                        <span class="m-2"><img src="img/customer-logo-4.png" alt="customer-logo"></span>
                        <span class="m-2"><img src="img/customer-logo-5.png" alt="customer-logo"></span>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
                <div class="row">
                    <div class="col-12 col-lg-10 mx-auto flex-wrap d-flex justify-content-center justify-content-lg-between align-items-center reveal">
                        <span class="m-2"><img src="img/customer-logo-6.png" alt="customer-logo"></span>
                        <span class="m-2"><img src="img/customer-logo-7.png" alt="customer-logo"></span>
                        <span class="m-2"><img src="img/customer-logo-8.png" alt="customer-logo"></span>
                        <span class="m-2"><img src="img/customer-logo-9.png" alt="customer-logo"></span>
                        <span class="m-2"><img src="img/customer-logo-10.png" alt="customer-logo"></span>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Core Customer ============ -->

        <!-- =========== Start of Features ============ -->
        <section class="space reveal">
            <div class="container">
                <div class="row card--v1">
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="card card-hover--shadow p-3 p-md-2 p-lg-4 rounded--none h-100">
                            <span class="mb-3"><img src="img/icon-device.svg" alt="icon-device"></span>
                            <h3 class="font-size--20 mb-2">Optimized for Any Device</h3>
                            <p class="font-size--15">No matter what device it is. Each of our themes is natively responsive, resizing your content and images to fit any device or screen width. You can also adjust them in your way.</p>
                        </div>
                    </div>
                    <!-- end of col -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="card card-hover--shadow p-3 p-md-2 p-lg-4 rounded--none h-100">
                            <span class="mb-3"><img src="img/icon-assets.svg" alt="icon-assets"></span>
                            <h3 class="font-size--20 mb-2">Thousands of Fonts & Icons</h3>
                            <p class="font-size--15">We have thousands of font options included our custom fonts as well as all google fonts. We also have custom icon packs along with icon fonts like font awesome and icofont.</p>
                        </div>
                    </div>
                    <!-- end of col -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="card card-hover--shadow p-3 p-md-2 p-lg-4 rounded--none h-100">
                            <span class="mb-3"><img src="img/icon-secure.svg" alt="icon-secure"></span>
                            <h3 class="font-size--20 mb-2">Highly Secured Platform</h3>
                            <p class="font-size--15">Security on the web was never been easy. SpaceMax protects your data with one of the most advanced encryptions. You never need to worry about security. We will handle everything for you.</p>
                        </div>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
                <div class="row card--v1 flex-column-reverse flex-md-row">
                    <div class="col-12 col-md-8 mb-3 mb-md-0">
                        <div class="card p-3 p-md-2 p-lg-4 pr-lg-10 rounded--none h-100 align-items-start justify-content-center">
                            <span class="mb-1 text-color--400">No coding skill? No problem!</span>
                            <h3 class="font-size--26 mb-2">Our platform is fully automated and we have thousands of options for each industry.</h3>
                            <p class="font-size--15 mb-4">You will never be disappointed at SpaceMax. SpaceMax has a huge template library for each and every industry. Our every single template has everything that you will need for your business. Every template of SpaceMax is unique
                                with a great UX which will help you to grow up your business.</p>
                            <a href="#" class="btn btn-size--md btn-bg--dark btn-hover--primary rounded--none"><span class="btn__text font-w--500">See Our Templates</span></a>
                        </div>
                    </div>
                    <!-- end of col -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="card card-hover--shadow p-3 p-md-2 p-lg-4 rounded--none h-100">
                            <span class="mb-3"><img src="img/icon-ecommerce.svg" alt="icon-ecommerce"></span>
                            <h3 class="font-size--20 mb-2">e-Commerce Integration</h3>
                            <p class="font-size--15">Each of our themes is natively supported e-commerce features. The integration is super simple. There are also hundreds of plugins available on our platform for e-commerce.</p>
                        </div>
                    </div>
                    <!-- end of col -->
                </div>
            </div>
        </section>
        <!-- =========== End of Features ============ -->

        <!-- =========== Start of Templates ============ -->
        <section class="space bg-color--primary-light--1 hidden">
            <div class="background-holder background--top--left">
                <img src="img/layout/wave-17.png" alt="wave" class="background-image-holder">
            </div>
            <!-- end of top bg overlay -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-10 col-lg-5 mx-auto text-center text-lg-left mb-5 reveal">
                        <h2 class="h3-font mb-2">Pick the theme you love</h2>
                        <p class="mb-4">Represent your business or ideas in a most beautiful way with our themes. All of our themes are designed and developed by world top designer and developer and every piece of work is unique and made with care.</p>
                        <a href="#" class="btn btn-size--md rounded--none btn-border btn-border--color--dark text-color--700 btn-hover--primary">
                            <span class="btn__text font-w--500">Browse All Templates</span>
                        </a>
                    </div>
                    <!-- end of content row-->
                    <div class="col-12 col-lg-7">
                        <div class="carosuel-slider--v1">
                            <a href="#" class="slide position-relative">
                                <img src="img/carosuel-slider-img-6.1.png" alt="carosuel-slider-img">
                            </a>
                            <a href="#" class="slide">
                                <img src="img/carosuel-slider-img-6.1.png" alt="carosuel-slider-img">
                            </a>
                            <a href="#" class="slide">
                                <img src="img/carosuel-slider-img-6.1.png" alt="carosuel-slider-img">
                            </a>
                            <a href="#" class="slide">
                                <img src="img/carosuel-slider-img-6.1.png" alt="carosuel-slider-img">
                            </a>
                        </div>
                    </div>
                    <!-- end of carosuel col -->
                </div>
            </div>
            <!-- end of switchable content -->
        </section>
        <!-- =========== End of Templates ============ -->

        <!-- =========== Start of customer website ============ -->
        <section class="space--top pb-4 pb-lg-0">
            <div class="background-holder background--top mt-5">
                <img src="img/layout/bg-overlay-29.png" alt="wave" class="background-image-holder">
            </div>
            <!-- end of bg overlay -->

            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-9 col-lg-7 col-xl-6 mb-5 mb-lg-8 mx-auto text-center reveal">
                        <div class="section-title">
                            <h2 class="mb-2 h3-font">See what our customers have <br> made using our platform</h2>
                            <p class="mb-4">Over a million companies use SpaceMax to make their dream website concepts come visible. See some examples below.</p>
                            <a href="#" class="btn btn-size--md rounded--none btn-border btn-border--color--dark text-color--700 btn-hover--primary">
                                <span class="btn__text font-w--500">Be part of this Family</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end of section title row -->
                <div class="row">
                    <div class="col-12 col-lg-9 mx-auto">
                        <div class="customer-website z-index2" data-simplebar="init" data-simplebar-auto-hide="false">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3 px-1">
                                    <div class="customer-website-item position-relative text-center">
                                        <div class="item-description pos-abs-top-left bg-color--dark--1 w-100 h-100 d-flex align-items-center justify-content-center flex-column p-2">
                                            <h1 class="font-size--26 color--white mb-1">BuilderPro</h1>
                                            <p class="mb-3 color--white opacity--80">Finding the perfect learning tool for Flash is a daunting task to any novice web developer.</p>
                                            <a href="#" class="btn btn-size--sm rounded--none btn-border btn-border--color--light color--white btn-hover--primary">
                                                <span class="btn__text font-w--500">Preview</span>
                                            </a>
                                        </div>
                                        <span>
                                            <img src="img/customer-website-1.jpg" alt="customer-website" class="img-fluid">
                                        </span>
                                    </div>
                                    <!-- end of single item -->
                                </div>
                                <!-- end of single item col -->
                                <div class="col-12 col-md-6 mb-3 px-1">
                                    <div class="customer-website-item position-relative text-center">
                                        <div class="item-description pos-abs-top-left bg-color--dark--1 w-100 h-100 d-flex align-items-center justify-content-center flex-column p-2">
                                            <h1 class="font-size--26 color--white mb-1">Yoga Fresh</h1>
                                            <p class="mb-3 color--white opacity--80">Finding the perfect learning tool for Flash is a daunting task to any novice web developer.</p>
                                            <a href="#" class="btn btn-size--sm rounded--none btn-border btn-border--color--light color--white btn-hover--primary">
                                                <span class="btn__text font-w--500">Preview</span>
                                            </a>
                                        </div>
                                        <span>
                                            <img src="img/customer-website-2.jpg" alt="customer-website" class="img-fluid">
                                        </span>
                                    </div>
                                    <!-- end of single item -->
                                </div>
                                <!-- end of single item col -->
                                <div class="col-12 col-md-6 mb-3 px-1">
                                    <div class="customer-website-item position-relative text-center">
                                        <div class="item-description pos-abs-top-left bg-color--dark--1 w-100 h-100 d-flex align-items-center justify-content-center flex-column p-2">
                                            <h1 class="font-size--26 color--white mb-1">BuilderPro</h1>
                                            <p class="mb-3 color--white opacity--80">Finding the perfect learning tool for Flash is a daunting task to any novice web developer.</p>
                                            <a href="#" class="btn btn-size--sm rounded--none btn-border btn-border--color--light color--white btn-hover--primary">
                                                <span class="btn__text font-w--500">Preview</span>
                                            </a>
                                        </div>
                                        <span>
                                            <img src="img/customer-website-3.jpg" alt="customer-website" class="img-fluid">
                                        </span>
                                    </div>
                                    <!-- end of single item -->
                                </div>
                                <!-- end of single item col -->
                                <div class="col-12 col-md-6 mb-3 px-1">
                                    <div class="customer-website-item position-relative text-center">
                                        <div class="item-description pos-abs-top-left bg-color--dark--1 w-100 h-100 d-flex align-items-center justify-content-center flex-column p-2">
                                            <h1 class="font-size--26 color--white mb-1">Yoga Fresh</h1>
                                            <p class="mb-3 color--white opacity--80">Finding the perfect learning tool for Flash is a daunting task to any novice web developer.</p>
                                            <a href="#" class="btn btn-size--sm rounded--none btn-border btn-border--color--light color--white btn-hover--primary">
                                                <span class="btn__text font-w--500">Preview</span>
                                            </a>
                                        </div>
                                        <span>
                                            <img src="img/customer-website-4.jpg" alt="customer-website" class="img-fluid">
                                        </span>
                                    </div>
                                    <!-- end of single item -->
                                </div>
                                <!-- end of single item col -->
                            </div>
                            <!-- end of row -->
                        </div>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of customer website ============ -->

        <!-- =========== Start of Testimonial ============ -->
        <section class="space bg-color--primary-light--1 testimonials--v1 jsElement" data-pull="-130">
            <div class="svg-shape--top w-100 z-index1">
                <img src="img/layout/wave-18.svg" alt="wave" class="svg w-100 ">
            </div>
            <!-- end of svg shape bottom -->
            <div class="background-holder background--top--left">
                <img src="img/layout/wave-20.svg" alt="wave" class="background-image-holder h-100">
            </div>
            <!-- end of top bg shape -->

            <div class="container pt-10">
                <div class="row align-items-center">
                    <div class="col-12 col-md-10 col-lg-5 mb-5 mb-lg-0 mx-md-auto mx-lg-0 text-center text-lg-left reveal">
                        <h2 class="h3-font mb-2">Stories from our <br>valueable customers</h2>
                        <p class="mb-5">Over 44,306 people and businesses have come to us for their websites. Read their reviews of SpaceMax to learn how great website changed their world.</p>
                        <a href="#" class="btn btn-size--md rounded--none btn-bg--primary btn-hover--3d">
                            <span class="btn__text font-w--500">Read All Reviews</span>
                        </a>
                    </div>
                    <!-- end of col -->
                    <div class="col-12 col-md-10 col-lg-7 mb-6 mb-lg-0 mx-md-auto mx-lg-0">
                        <div class="carosuel-slider--v2 bg-white box-shadow--5 p-3 py-lg-5 pl-lg-4 pr-lg-10">
                            <div class="slide">
                                <div class="d-flex align-items-start mb-2">
                                    <span class="mr-2 rounded--full"><img src="img/avatar-1.png" class="rounded--full" alt="avatar"></span>
                                    <div class="d-flex flex-column">
                                        <span class="client-name font-size--10 font-w--600">Loretta Paul</span>
                                        <span class="font-size--15 text-color--400 mb-1">Co-Founder at Geekpixel</span>
                                        <div class="color--orange font-size--15">
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate-half"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative z-index1 pt-2">
                                    <span class="pos-abs-top-left testimonial__quote mr-3 font-size--30 opacity--10 z-index-1"><i class="icon icon-quote-2"></i></span>
                                    <blockquote class="blockquote font-size--17">This process was so easy and quick. I'm so glad we were referred to this program. If we had gone the traditional route we would have spent much more and would have been limited one design ideas/interpretation. Extremely
                                        pleased with how this turned out!</blockquote>
                                    <a href="#" class="color--primary"><u>See the website</u></a>
                                </div>
                            </div>
                            <!-- end of single item -->
                            <div class="slide">
                                <div class="d-flex align-items-start mb-2">
                                    <span class="mr-2 rounded--full"><img src="img/avatar-2.png" class="rounded--full" alt="avatar"></span>
                                    <div class="d-flex flex-column">
                                        <span class="client-name font-size--10 font-w--600">Jimmy Griffin</span>
                                        <span class="font-size--15 text-color--400 mb-1">Themeforest</span>
                                        <div class="color--orange font-size--15">
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate-half"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative z-index1 pt-2">
                                    <span class="pos-abs-top-left testimonial__quote mr-3 font-size--30 opacity--10 z-index-1"><i class="icon icon-quote-2"></i></span>
                                    <blockquote class="blockquote font-size--17">This process was so easy and quick. I'm so glad we were referred to this program. If we had gone the traditional route we would have spent much more and would have been limited one design ideas/interpretation. Extremely
                                        pleased with how this turned out!</blockquote>
                                    <a href="#" class="color--primary"><u>See the website</u></a>
                                </div>
                            </div>
                            <!-- end of single item -->
                            <div class="slide">
                                <div class="d-flex align-items-start mb-2">
                                    <span class="mr-2 rounded--full"><img src="img/avatar-3.png" class="rounded--full" alt="avatar"></span>
                                    <div class="d-flex flex-column">
                                        <span class="client-name font-size--10 font-w--600">Alan Rogers</span>
                                        <span class="font-size--15 text-color--400 mb-1">Themeforest</span>
                                        <div class="color--orange font-size--15">
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate"></i>
                                            <i class="icon icon-star-rate-half"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative z-index1 pt-2">
                                    <span class="pos-abs-top-left testimonial__quote mr-3 font-size--30 opacity--10 z-index-1"><i class="icon icon-quote-2"></i></span>
                                    <blockquote class="blockquote font-size--17">This process was so easy and quick. I'm so glad we were referred to this program. If we had gone the traditional route we would have spent much more and would have been limited one design ideas/interpretation. Extremely
                                        pleased with how this turned out!</blockquote>
                                    <a href="#" class="color--primary"><u>See the website</u></a>
                                </div>
                            </div>
                            <!-- end of single item -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========== End of Testimonial ============ -->

        <!-- =========== Start of Content Blocks ============ -->
        <section class="space">
            <div class="container">
                <div class="row pb-7 flex-column-reverse flex-lg-row-reverse align-items-center text-center justify-content-between">
                    <div class="col-12 col-md-10 col-lg-6 col-xl-5 d-lg-block text-lg-left mt-9 mt-lg-6 reveal">
                        <h2 class="h3-font mb-2">The features you need for your website</h2>
                        <p class="mb-4">Create a free website that looks exactly the way you want. With our website builder, you get beautiful galleries, professional image collections, secure hosting, personalized domains, the best SEO and so much more.</p>
                        <a href="#" class="btn btn-size--md rounded--none btn-border btn-border--color--dark text-color--700 btn-hover--primary">
                            <span class="btn__text font-w--500">Get Started Now</span>
                        </a>
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-5 col-xl-6">
                        <picture class="overlap-image__main">
                            <img class="img-fluid box-shadow--5" src="img/content-block-img-1.1.png" alt="content-block-img">
                        </picture>
                        <picture class="overlap-image__secondary pos-abs-bottom-right">
                            <img class="img-fluid box-shadow--5" src="img/content-block-img-1.2.png" alt="content-block-img">
                        </picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!--== end of content block 1 row ==-->
                <div class="row mt-lg-10 flex-column-reverse flex-lg-row align-items-center text-center justify-content-between">
                    <div class="col-12 col-md-10 col-lg-6 col-xl-5 d-lg-block text-lg-left mt-6 mt-lg-6 reveal">
                        <h2 class="h3-font mb-2">Reach and grow your audience</h2>
                        <p class="mb-4">Our all-in-one platform gives you everything you need to run your business. Whether you’re just getting started or are an established brand, our powerful platform helps your business grow.
                            <br>
                            <br> We provide you with a comprehensive set of marketing tools to engage with your audience.</p>
                        <a href="#" class="btn btn-size--md rounded--none btn-border btn-border--color--dark text-color--700 btn-hover--primary">
                            <span class="btn__text font-w--500">Get Started Now</span>
                        </a>
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-5 col-xl-6">
                        <picture class="overlap-image__main text-right">
                            <img class="img-fluid box-shadow--5 w-85" src="img/content-block-img-2.1.png" alt="content-block-img">
                        </picture>
                        <picture class="overlap-image__secondary pos-abs-vertical-center pos-abs-left">
                            <img class="img-fluid box-shadow--5" src="img/content-block-img-2.2.png" alt="content-block-img">
                        </picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!--== end of content block 2 row ==-->
            </div>
        </section>
        <!-- =========== End of Content Blocks ============ -->

        <!-- =========== Start of Help Center ============ -->
        <section class="space bg-color--primary-light--1">
            <div class="background-holder background--bottom opacity--08">
                <img src="img/layout/city.svg" alt="wave" class="background-image-holder">
            </div>
            <!-- end of top bg shape -->

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7 text-center mx-auto pb-8 reveal">
                        <div class="section-title">
                            <h2 class="h3-font mb-3">We’ve got you covered</h2>
                            <p class="mb-4">Think of SpaceMax as your very own IT department, with free, unlimited hosting, top-of-the-line security, an enterprise-grade infrastructure, and around-the-clock support. Get personalized support from our Customer Care Team via
                                email or live chat, or join a live webinar. Reach out any time — we’re here 24/7.</p>
                            <a href="#" class="btn btn-bg--primary btn-size--md rounded--none btn-hover--3d"><span class="btn__text font-w--500">Visit Help Center</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========== End of Help Center ============ -->

        <!-- =========== Start of Newsletter ============ -->
        <section class="space--bottom border--bottom jsElement" data-pull="-80">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-xl-9 mx-auto">
                        <div class="newsletter-form form--v8 bg-white py-6 py-lg-8 box-shadow--5 text-center">
                            <div class="mb-5 px-3 reveal">
                                <h2 class="h3-font mb-1">Start building your website now</h2>
                                <p>Just sign up and choose a theme from out library to get started</p>
                            </div>
                            <!-- end of title -->
                            <div class="col-12 col-md-10 col-lg-8 mx-md-auto reveal">
                                <form action="#" class="form bg-color--white-opacity--10 rounded--05 p-1">
                                    <div class="input-group d-flex">
                                        <input type="email" class="form-control rounded--none" placeholder="Enter your email" required>
                                        <button class="btn btn-hover--splash btn-bg--primary rounded--none" type="submit"><span class="btn__text font-w--500">Get Started</span></button>
                                    </div>
                                </form>
                                <!-- end of from -->
                            </div>
                        </div>
                    </div>
                    <!-- end of body col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Newsletter ============ -->
@endsection


