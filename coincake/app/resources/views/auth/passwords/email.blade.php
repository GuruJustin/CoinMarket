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
        <header class="navbar navbar-expand-lg navbar-dark">
            <div class="container position-relative">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img class="navbar-brand__regular" src="{{asset('assets/images/logo/logo.png')}}" width="50" alt="brand-logo">
                </a>

            </div>
            <!-- end of container -->
        </header>
        <!-- =========== End of Navigation (main menu)  ============ -->

        <!-- =========== Start of Body ============ -->
        <section class="space bg-color--primary h-min-100vh d-flex align-items-center">
            <div class="svg-shape--top w-100 opacity--05">
                <img src="{{asset('frontend/img/layout/wave-8.svg')}}" alt="wave" class="svg fill--white">
            </div>
            <!-- end of whole area svg bg -->
            <div class="svg-shape--top opacity--10">
                <img src="{{asset('frontend/img/layout/wave-9.svg')}}" alt="wave" class="svg fill--white">
            </div>
            <!-- end of top right mini svg shape -->

            <div class="container">
                <div class="row ">
                    <div class="col-12 mx-auto color--white text-center mb-4 mb-lg-5">
                        <h1 class="h2-font mb-1">Forgot your password?</h1>
                        <p class="opacity--60 font-size--20">Enter your email address below and we'll get you back on track.</p>
                    </div>
                    <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
                        <div class="form--v5 bg-color--primary-light--1 px-3 py-4 px-md-5 py-md-6 rounded--10">
                            <form method="POST" action="{{ route('user.password.email') }}" class="form">
                             @csrf
                                <div class="form-group">
                                    <label class="form__label text-uppercase font-size--15 font-w--500">Email Address:</label>
                                    <input id="email" type="email"name="email" value="{{ old('email') }}"  class="form-control" placeholder="Enter your email address" required/>
                                </div>
                                <div class="d-flex justify-content-between flex-column flex-sm-row align-items-sm-center">
                                    <button class="btn btn-bg--primary btn-size--md btn-hover--3d" type="submit"><span class="btn__text">Request Reset Link</span></button>
                                    <p class="text-color--400 font-size--15 mt-2 mt-sm-0">Back to <a href="{{route('login')}}" class="color--primary">sign in</a></p>
                                </div>
                            </form>
                            <!-- end of form -->
                        </div>
                        <!-- end of from area -->
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Body ============ -->
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
