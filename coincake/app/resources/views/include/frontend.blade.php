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

<body class="theme-gradient-7" data-spy="scroll" data-target="#navbar-nav" data-animation="false" data-appearance="light">



    <!-- =========== Start of Loader ============ -->
    <div class="preloader">
        <div class="wrapper">
            <div class="blobs">
                <div class="blob-center"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
            </div>
            <div>
                <div class="loader-canvas canvas-left"></div>
                <div class="loader-canvas canvas-right"></div>
            </div>
        </div>
    </div>
    <!-- =========== End of Loader ============ -->

    <main class="main hidden">
        <!-- =========== Start of Navigation (main menu) ============ -->
        <header class="navbar navbar-sticky sticky-bg-color--primary navbar-expand-lg navbar-dark">
            <div class="container position-relative">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img class="navbar-brand__regular" src="{{asset('assets/images/logo/logo.png')}}" width="70" alt="brand-logo">
                    <img class="navbar-brand__sticky" src="{{asset('assets/images/logo/logo.png')}}"  width="70"  alt="brand-logo">
                </a>
                <!--  End of brand logo -->
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- end of Nav toggler -->

                <div class="navbar-inner mr-lg-auto pl-lg-2 pl-xl-6">
                    <!--  Nav close button inside off-canvas/ mobile menu -->
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- end of Nav Toggoler -->
                    <nav>
                        <ul class="navbar-nav" id="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/about')}}">About Us</a>
                            </li>
                           <li class="nav-item">
                                <a class="nav-link" href="{{url('/how-it-works')}}">How It Works</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{url('/faq')}}">FAQ</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{url('/rates')}}">Pricing</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/blog')}}">Blog</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/privacy')}}">Privacy & Policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
                            </li>
                            @if(Auth::user())
                            @else
                             @if($basic->registration > 0)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}">Create Account</a>
                            </li>
                            @endif
                            @endif



                        </ul>
                        <!-- end of nav menu items -->
                    </nav>
                </div>
                <div class="d-flex align-items-center ml-lg-1 ml-xl-2 mr-5 mr-sm-6 m-lg-0">            @if(Auth::user())
                    <a href="{{route('home')}}" class="btn btn-size--md btn-border color--white btn-hover--splash opacity--80  d-sm-inline-flex">Dashboard</a>
                    @else

                    <a href="{{route('login')}}" class="btn btn-size--md btn-border color--white btn-hover--splash opacity--80  d-sm-inline-flex">
                        <span class="btn__text font-w--500">Login</span>
                    </a>
                    @endif
                </div>
                <!-- end of nav CTA button -->
            </div>
            <!-- end of container -->
        </header>
        <!-- =========== End of Navigation (main menu)  ============ -->

@yield('content')

   <!-- =========== Start of Footer ============ -->
        <footer class="footer section--light bg-color--primary-light--1  position-relative hidden">
            <div class="pt-3 pt-lg-10 pb-6 pb-lg-10 border--bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-9 col-lg-4 mb-4 mb-xl-0">
                            <div class="pr-xl-3">
                                <span class="mb-3">
                                    <img src="{{asset('assets/images/logo/logo.png')}}" width="60" alt="brand-logo">
                                </span>
                                <p>The main objectives of the project are to meet the needs of cryptocurrency projects and users, and to provide access to investment product.</p>
                            </div>
                        </div>
                        <!-- end of col -->
                        <div class="col-6 col-md-4 col-lg-4 col-xl-2 mb-2 mb-xl-0">
                            <div class="widget widget-nav">
                                <span class="widget__title font-size--20 font-w--700 mb-1">Useful Link</span>
                                <ul>
                                    <li><a href="#">How it works</a></li>
                                    <li><a href="#">Token sale details</a></li>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Roadmap</a></li>
                                    <li><a href="#">Documents</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of widget col-->
                        <div class="col-6 col-md-4 col-lg-4 col-xl-2 offset-xl-1 mb-2 mb-xl-0">
                            <div class="widget widget-nav">
                                <span class="widget__title font-size--20 font-w--700 mb-1">Documents</span>
                                <ul>
                                    <li><a href="#">Whitepaper</a></li>
                                    <li><a href="#">Onepager</a></li>
                                    <li><a href="#">Privacy policy</a></li>
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="#">Agreement</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of widget col-->
                        <div class="col-8 col-sm-8 col-md-4 col-xl-3">
                            <span class="widget__title font-size--20 font-w--700 mb-1">Address</span>
                            <p class="font-size--15 mb-2">{$basic->sitename} PTE. LTD. 167 Jalan Bukit Merah #05-12 Connection One Singapore (150167)</p>
                            <a href="#" class="color--primary mb-1"><span class="__cf_email__" data-cfemail="16736e777b667a7356736e777b667a733875797b">[email&#160;protected]</span></a>
                            <ul class="icon-group mb-0">
                                <li><a href="#" class="color--primary"><i class="fab fa-medium-m"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-telegram-plane"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <!-- end of widget col-->
                    </div>
                </div>
                <!-- end of main footer container-->
            </div>
            <!-- end of main footer -->
            <div class="py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="font-size--15">© {{Date('Y')}} <a href="#" class="text-color--400"> {{$basic->sitename}}</a>. All Rights Reserved.
                            </p>
                        </div>
                    </div>
                    <!-- end of mini footer row -->
                </div>
                <!-- end of mini footer container -->
            </div>
            <!-- end of mini footer -->
        </footer>
        <!-- =========== End of Footer ============ -->
    </main>
    <script src="{{asset('frontend/js/plugins.min.js')}}"></script>
    <script src="{{asset('frontend/js/app.js')}}"></script>


@yield('script')
    <script src="{{asset('frontend/js/rainbow.js')}}"></script>
	<script src="{{asset('frontend/js/sample.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.growl.js')}}"></script>



@yield('js')
@if (session('alert'))
	<script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ session('alert') }}"
			});
  		  });
		}).call(this);
 	</script>
@endif


@if ($errors->has('fname'))
<script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('fname') }}"
			});
  		  });
		}).call(this);
 	</script>
@endif

@if ($errors->has('lname'))
<script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('lname') }}"
			});
  		  });
		}).call(this);
 	</script>
@endif
@if ($errors->has('username'))
<script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('username') }}"
			});
  		  });
		}).call(this);
 	</script>
@endif
@if ($errors->has('phone'))
<script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('phone') }}"
			});
  		  });
		}).call(this);
 	</script>
@endif
@if ($errors->has('email'))
<script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('email') }}"
			});
  		  });
		}).call(this);
 	</script>
@endif
@if ($errors->has('password'))
<script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('password') }}"
			});
  		  });
		}).call(this);
 	</script>
@endif


@if(Session::has('success'))
<script>
		 (function () {
		  $(function () {
		   return $.growl.notice({
				message: "{{ Session::get('success') }}"
			});
  		  });
		}).call(this);
 	</script>
 @endif

@if (session('message'))
<script>
		 (function () {
		  $(function () {
		   return $.growl.notice({
				message: "{{ session('message') }}"
			});
  		  });
		}).call(this);
 	</script>
 @endif
@if(Session::has('danger'))
<script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ session('danger') }}"
			});
  		  });
		}).call(this);
 	</script>
 @endif

 @if ($errors->has('sms_code'))
<script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('sms_code') }}"
			});
  		  });
		}).call(this);
 	</script>
@endif

 @if ($errors->has('email_code'))
<script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('email_code') }}"
			});
  		  });
		}).call(this);
 	</script>
@endif
@if(Session::has('ref'))
<script>
 swal("Hello", "{!! session()->get('ref')  !!}", "info");
</script>
@endif
@if(Session::has('referror'))
<script>
 swal("Hello", "{!! session()->get('referror')  !!}", "error");
</script>
@endif



</body></html>
<!-- Localized -->
