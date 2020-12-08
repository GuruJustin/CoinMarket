      <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{isset($page_title) ? $page_title : ''}} | {{$basic->sitename}}</title>
    <!-- favicon CSS -->
    <link rel="icon" type="{{asset('assets/images/logo/logo.png')}}" sizes="32x32" href="{{asset('assets/images/logo/logo.png')}}">
    <!-- fonts -->
    <link href="{{asset('frontend/fonts/sfuidisplay.css')}}" rel="stylesheet">
    <!-- Icon fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/plugins.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/app.css')}}">
    <!-- Your CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
     <link href="{{asset('frontend/css/jquery.growl.css')}}" rel="stylesheet" />

</head>
        <!-- =========== Start of Body ============ -->
        <section class="space h-min-100vh d-flex align-items-center">
            <div class="svg-shape--top w-100">
                <img src="{{asset('frontend/img/layout/wave-8.svg')}}" alt="wave" class="svg fill-primary-light--1">
            </div>
            <!-- end of whole area svg bg -->
            <div class="svg-shape--top">
                <img src="{{asset('frontend/img/layout/wave-9.svg')}}" alt="wave" class="svg fill--white">
            </div>
            <!-- end of top right mini svg shape -->

            <div class="container">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-12 col-sm-10 col-md-9 col-lg-7 mx-auto mx-lg-0 pr-lg-8">
                        <div class="content">
                            <div class="mb-4">
                                <h1 class="mb-2">Currently undergoing maintenance.</h1>
                                <p>We apologise for any inconvenience while we're undergoing service maintenance.</p>
                            </div>
                            <!-- end of text content -->
                            <div class="progress rounded--full mb-3 mr-md-5 mr-xl-10">
                                <div class="progress-bar stripped animated rounded--full bg-color--green jsElement" data-progress-horizon="85"></div>
                            </div>
                            <!-- end of progress -->
                            <p>Estimated return to service: <span class="color--primary font-w--600">11:00AM GMT</span></p>
                        </div>
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-6 mt-6 mt-lg-0 mb-4 mb-lg-0 pl-lg-10 pos-abs-lg-vertical-center pos-right">
                        <picture><img src="{{asset('frontend/img/illustration-23.png')}}" alt="hero-image" class="img-fluid"></picture>
                    </div>
                    <!-- end of image col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
    <script src="{{asset('frontend/js/plugins.min.js')}}"></script>
    <script src="{{asset('frontend/js/app.js')}}"></script>
