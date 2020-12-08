<!DOCTYPE html><html lang="zxx" class="js"><head><meta charset="utf-8"><meta name="author" content="Softnio"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="@@page-discription"><link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}"><title>{{isset($page_title) ? $page_title : ''}} | {{$basic->sitename}} </title><link rel="stylesheet" href="{{asset('backend/css/dashlite-63021.css')}}"><link id="skin-purple" rel="stylesheet" href="{{asset('backend/css/theme-63021.css')}}">
<link href="{{asset('frontend/css/jquery.growl.css')}}" rel="stylesheet" />
 <script src="{{asset('process/countries.js')}}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script><script>window.dataLayer = window.dataLayer || [];function gtag() {dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-91615293-4');</script> </head><body class="nk-body toastr-info npc-crypto has-sidebar has-sidebar-fat ui-clean " ><div class="nk-app-root"><div class="nk-main "><div class="nk-sidebar nk-sidebar-fat nk-sidebar-fixed" data-content="sidebarMenu"><div class="nk-sidebar-element nk-sidebar-head"><div class="nk-sidebar-brand"><a href="{{route('home')}}" class="logo-link nk-sidebar-logo"><img class="logo-light logo-img" src=".{{asset('assets/images/logo/logo.png')}}" srcset="{{asset('assets/images/logo/logo.png')}}" alt="logo"><img class="logo-dark logo-img" src="{{asset('assets/images/logo/logo.png')}}" srcset="{{asset('assets/images/logo/logo.png')}}" alt="logo-dark"> </a></div><div class="nk-menu-trigger mr-n2"><a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a></div></div><div class="nk-sidebar-element"><div class="nk-sidebar-body" data-simplebar><div class="nk-sidebar-content"><div class="nk-sidebar-widget d-none d-xl-block"><div class="user-account-info between-center"><div class="user-account-main"><h6 class="overline-title-alt">Fiat Balance</h6><div class="user-balance">{{number_format(Auth::user()->balance, $basic->decimal)}}  <small class="currency currency-btc">{{$basic->currency}}</small></div><div class="user-balance-alt">{{number_format(Auth::user()->bonus, $basic->decimal)}} <span class="currency currency-btc">{{$basic->currency}}</span><small> (bonus)</small></div></div><a href="#" class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a></div>  </div><div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0"><a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#"><div class="user-card-wrap"><div class="user-card"><div class="user-avatar"><span>{{substr(Auth::user()->fname, 0, 1)}}{{substr(Auth::user()->lname, 0, 1)}}</span></div><div class="user-info"><span class="lead-text">{{Auth::user()->username}}</span><span class="sub-text">{{Auth::user()->email}}</span></div><div class="user-action"><em class="icon ni ni-chevron-down"></em></div></div></div></a><div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile"><div class="user-account-info between-center"><div class="user-account-main"><h6 class="overline-title-alt">Fiat Balance</h6><div class="user-balance">{{number_format(Auth::user()->balance, $basic->decimal)}} <small class="currency currency-btc">{{$basic->currency}}</small></div><div class="user-balance-alt">{{number_format(Auth::user()->bonus, $basic->decimal)}}  <span class="currency currency-btc">{{$basic->currency}}</span> <sma;;>(Bonus)</small></div></div><a href="#" class="btn btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a></div>  <ul class="link-list"><li><a href="{{route('profile')}}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li> <li><a href="{{route('activities')}}"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li></ul><ul class="link-list"><li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

<em class="icon ni ni-signout"></em><span>Sign out</span></a></li></ul></div></div><div class="nk-sidebar-menu"><ul class="nk-menu"><li class="nk-menu-heading"><h6 class="overline-title">Menu</h6></li><li class="nk-menu-item"><a href="{{route('home')}}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span><span class="nk-menu-text">Dashboard</span></a></li>


<li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-icon"><em class="icon ni ni-wallet"></em></span><span class="nk-menu-text">Deposit</span></a><ul class="nk-menu-sub"><li class="nk-menu-item"><a href="{{ route('depositfiat') }}" class="nk-menu-link"><span class="nk-menu-text">Deposit Fiat</span></a></li><li class="nk-menu-item"><a href="{{ route('depositcrypto') }}"  class="nk-menu-link"><span class="nk-menu-text">Deposit Crypto</span></a></li><li class="nk-menu-item"><a href="{{route('user.depositLog')}}" class="nk-menu-link"><span class="nk-menu-text">Deposit Log</span></a></li> </ul></li>


<li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-icon"><em class="icon ni ni-money"></em></span><span class="nk-menu-text">Withdraw</span></a><ul class="nk-menu-sub"><li class="nk-menu-item"><a href="{{route('withdraw.money')}}" class="nk-menu-link"><span class="nk-menu-text">New Request</span></a></li><li class="nk-menu-item"><a href="{{route('user.withdrawLog')}}" class="nk-menu-link"><span class="nk-menu-text">Withdrawal Log</span></a></li>
<li class="nk-menu-item"><a href="{{route('convertbonus')}}" class="nk-menu-link"><span class="nk-menu-text">Convert Bonus</span></a></li> </ul></li>

<li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span><span class="nk-menu-text">Fund Transfer</span></a><ul class="nk-menu-sub"><li class="nk-menu-item"><a href="{{route('transfer')}}" class="nk-menu-link"><span class="nk-menu-text">Transfer Fund</span></a></li>
<li class="nk-menu-item"><a href="{{route('transferlog')}}" class="nk-menu-link"><span class="nk-menu-text">Transfer Log</span></a></li>
 </ul></li>


<li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-icon"><em class="icon ni ni-cart"></em></span><span class="nk-menu-text">Buy E-currency</span></a><ul class="nk-menu-sub"><li class="nk-menu-item"><a href="{{route('buy')}}" class="nk-menu-link"><span class="nk-menu-text">Buy From System</span></a></li><li class="nk-menu-item"><a href="{{route('buyonmarket')}}" class="nk-menu-link"><span class="nk-menu-text">Buy From User</span></a></li><li class="nk-menu-item"><a href="{{route('buylog')}}" class="nk-menu-link"><span class="nk-menu-text">Purchase Log</span></a></li>

<li class="nk-menu-item"><a href="{{route('buymartlog')}}" class="nk-menu-link"><span class="nk-menu-text">Market Trade Log</span></a></li>
</ul></li>


<li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span><span class="nk-menu-text">Sell E-currency</span></a><ul class="nk-menu-sub"><li class="nk-menu-item"><a href="{{route('sell')}}" class="nk-menu-link"><span class="nk-menu-text">Sell To System</span></a></li><li class="nk-menu-item"><a href="{{route('sellog')}}" class="nk-menu-link"><span class="nk-menu-text">Sales Log</span></a></li></ul></li>


<li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-icon"><em class="icon ni ni-chart-up"></em></span><span class="nk-menu-text">My Market Offer</span></a><ul class="nk-menu-sub"><li class="nk-menu-item"><a href="{{route('sellonmarket')}}" class="nk-menu-link"><span class="nk-menu-text">Create Offer</span></a></li><li class="nk-menu-item"><a href="{{route('mystore')}}" class="nk-menu-link"><span class="nk-menu-text">My Store</span></a></li>
<li class="nk-menu-item"><a href="{{route('closeddeal')}}" class="nk-menu-link"><span class="nk-menu-text">Closed Deal</span></a></li>
<li class="nk-menu-item"><a href="{{route('activedeal')}}" class="nk-menu-link"><span class="nk-menu-text">Active Deal</span></a></li>
</ul></li>


<li class="nk-menu-item"><a href="{{route('profile')}}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-user-c"></em></span><span class="nk-menu-text">My Account</span></a></li>
<li class="nk-menu-item"><a href="{{ route('user.authorization')}}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-shield"></em></span><span class="nk-menu-text">Account Verification</span></a></li><li class="nk-menu-item"><a href="{{route('referral')}}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-network"></em></span><span class="nk-menu-text">Referral System</span></a></li><li class="nk-menu-item"><a href="{{route('activities')}}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-calendar"></em></span><span class="nk-menu-text">Activities Log</span></a></li> <li class="nk-menu-heading"><h6 class="overline-title">Message Center</h6></li><li class="nk-menu-item has-sub"><a href="{{route('inbox')}}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-emails"></em></span><span class="nk-menu-text">Message Inbox</span></a></li>
<li class="nk-menu-item has-sub"><a href="{{route('ticket')}}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-headphone-fill"></em></span><span class="nk-menu-text">Support Ticket</span></a></li>

<li class="nk-menu-item"><a href="{{route('user.testimonial')}}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-happy"></em></span><span class="nk-menu-text">Testimonials</span></a></li>
<li class="nk-menu-item"><a href="{{route('user.faq')}}"" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-help"></em></span><span class="nk-menu-text">FAQ</span></a></li></ul></div>
@if ($basic->blockallow == 1) 
<div class="nk-sidebar-widget"><div class="widget-title"><h6 class="overline-title">Blockchain Wallets <span>(3)</span></h6> </div>

<ul class="wallet-list">

<? $coins = DB::table('coins')->get(); ?>
@foreach($coins as $data)
<li class="wallet-item"><a href="{{route('blockchainwallet', $data->id)}}"><div class="wallet-icon"><em class="icon ni ni-{{$data->symbol}}"></em></div><div class="wallet-text"><h6 class="wallet-name">{{$data->name}}</h6></div></a></li>
@endforeach

 </ul>
 
 
</div>
@endif

<div class="nk-sidebar-footer"><ul class="nk-menu nk-menu-footer"><li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span><span class="nk-menu-text">Support</span></a></li><li class="nk-menu-item ml-auto"><div class="dropup"><a href="#" class="nk-menu-link dropdown-indicator has-indicator" data-toggle="dropdown" data-offset="0,10"><span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span><span class="nk-menu-text">English</span></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="language-list"><li><a href="#" class="language-item"><img src="../images/flags/english.png" alt="" class="language-flag"><span class="language-name">English</span></a></li><li><a href="#" class="language-item"><img src="../images/flags/spanish.png" alt="" class="language-flag"><span class="language-name">Español</span></a></li><li><a href="#" class="language-item"><img src="../images/flags/french.png" alt="" class="language-flag"><span class="language-name">Français</span></a></li><li><a href="#" class="language-item"><img src="../images/flags/turkey.png" alt="" class="language-flag"><span class="language-name">Türkçe</span></a></li></ul></div></div></li></ul></div></div></div></div></div><div class="nk-wrap "><div class="nk-header nk-header-fluid nk-header-fixed {{$basic->theme2}}"><div class="container-fluid"><div class="nk-header-wrap"><div class="nk-menu-trigger d-xl-none ml-n1"><a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a></div><div class="nk-header-brand d-xl-none"><a href="{{route('home')}}" class="logo-link"><img class="logo-light logo-img" src="{{asset('assets/images/logo/logo.png')}}" srcset="{{asset('assets/images/logo/logo.png')}}" alt="logo"><img class="logo-dark logo-img" src="{{asset('assets/images/logo/logo.png')}}" srcset="{{asset('assets/images/logo/logo.png')}}" alt="logo-dark"> </a></div><div class="nk-header-news d-none d-xl-block"><div class="nk-news-list"><a class="nk-news-item" href="#"><div class="nk-news-icon"><em class="icon ni ni-card-view"></em></div><div class="nk-news-text"><p>Do you know you can create you personal blockchain wallet? <span> You wallet is a step away!!</span></p><em class="icon ni ni-external"></em></div></a></div></div><div class="nk-header-tools"><ul class="nk-quick-nav"><li class="dropdown user-dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><div class="user-toggle"><div class="user-avatar sm"> @if( file_exists(Auth::User()->image))
                        <img src="{{asset(Auth::user()->image)}} " width="100"
                             alt="Profile Pic">
                    @else

                        <img src=" {{url('assets/user/images/user-default.png')}} " width="100"
                             alt="Profile Pic">
                    @endif</div><div class="user-info d-none d-md-block"><div class="user-status user-status-unverified"><?php
    /* This sets the $time variable to the current hour in the 24 hour clock format */
    $time = date("H");
    /* Set the $timezone variable to become the current timezone */
    $timezone = date("e");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        echo "Good morning";
    } else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "17") {
        echo "Good afternoon";
    } else
    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
    if ($time >= "17" && $time < "19") {
        echo "Good evening";
    } else
    /* Finally, show good night if the time is greater than or equal to 1900 hours */
    if ($time >= "19") {
        echo "Good night";
    }
    ?></div><div class="user-name dropdown-indicator">{{Auth::user()->username}}</div></div></div></a><div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1"><div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block"><div class="user-card">


 <div class="user-avatar"><span>{{substr(Auth::user()->fname, 0, 1)}}{{substr(Auth::user()->lname, 0, 1)}}</span></div><div class="user-info"><span class="lead-text">{{Auth::user()->username}}</span><span class="sub-text">{{Auth::user()->email}}</span></div></div></div><div class="dropdown-inner user-account-info"><h6 class="overline-title-alt">Fiat Account</h6><div class="user-balance">{{number_format(Auth::user()->balance, $basic->decimal)}}   <small class="currency currency-btc">{{$basic->currency}}</small></div><div class="user-balance-sub">Bonus <span>{{number_format(Auth::user()->bonus, $basic->decimal)}} <span class="currency currency-btc">{{$basic->currency}}</span></span></div> </div><div class="dropdown-inner"><ul class="link-list"> <li><a href="{{route('profile')}}"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li><li><a href="{{route('activities')}}"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li></ul></div><div class="dropdown-inner"><ul class="link-list"><li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li></ul></div></div></li><li class="dropdown notification-dropdown mr-n1"><a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
  <? $coins = DB::table('messages')->whereStatus(0)->whereUser_id(Auth::user()->id)->get(); ?>

  @if($coins)
 <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
 @else
 <em class="icon ni ni-bell"></em>
 @endif


 </a><div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1"><div class="dropdown-head"><span class="sub-title nk-dropdown-title">Notifications</span> </div><div class="dropdown-body"><div class="nk-notification">

 @if($coins)
 @foreach($coins as $data)

 <div class="nk-notification-item dropdown-inner"><div class="nk-notification-icon"><em class="icon icon-circle bg-primary-dim ni ni-chat-circle"></em></div>

 <div class="nk-notification-content">
 <a href="{{route('inbox-view',$data->id)}}">
 <div class="nk-notification-text">{{$data->title}}</div><div class="nk-notification-time">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</div></div></div>
</a>
 @endforeach
@endif
</div></div><div class="dropdown-foot center"><a href="{{route('inbox')}}">View All</a></div></div></li></ul></div></div></div></div>
@yield('content')



@if(Auth::user()->time < $time )
<div class="modal fade" tabindex="-1" id="modalbonus">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Congratulations!</h4>
                        <div class="nk-modal-text">
                            <div class="caption-text">Its a new day to earn your daily bonus. Please click the button below to earn your <strong>{{$basic->currency_sym}}{{$basic->bonus}}</strong> bonus for the day</div>

                        </div>
                        <div class="nk-modal-action">
                            <a href="{{ route('userDailyBonus') }}" class="btn btn-lg btn-mw btn-primary"  >Earn Bonus</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-lighter">
                    <div class="text-center w-100">
                        <p>Earn upto {{$basic->currency_sym}}{{$basic->ref}} for each friend your refer! <a href="#">Invite friends</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="modal fade" tabindex="-1" id="modalbonus">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                        <h4 class="nk-modal-title">Congratulations!</h4>
                        <div class="nk-modal-text">
                            <div class="caption-text">Sorry, You have already earned your bonus for the day. Please come back later for new earning</div>

                        </div>
                        <div class="nk-modal-action">
                            <a href="#" data-dismiss="modal" class="btn btn-lg btn-mw btn-primary"  >Close</a>
                        </div>
                    </div>
                </div>
                <style>
      .blink {
      animation: blinker 0.6s linear infinite;
      color: #FF0000;
      font-size: 10px;
      font-weight: bold;
      font-family: sans-serif;
      }
    </style>
                <div class="modal-footer bg-lighter">
                    <div class="text-center w-100">
                        <p> <a class='blink' href="#" id="demo">Please Wait</a></p>
                    </div>
                    <script>
// Set the date we're counting down to
var countDownDate = new Date("{{Auth::user()->time}}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);



  // Display the result in the element with id="demo"
   if(days > 0) {
  document.getElementById("demo").innerHTML = days + "Days " + hours + "Hrs "
  + minutes + "Mins " + seconds + "Secs ";
  }
 else {
  document.getElementById("demo").innerHTML = days + "Day " + hours + "Hrs "
  + minutes + "Mins " + seconds + "Secs ";
    }
  // If the count down is finished, write some text

}, 1000);
</script>
                </div>
            </div>
        </div>
    </div>
@endif

 <div class="nk-footer nk-footer-fluid"><div class="container-fluid"><div class="nk-footer-wrap"><div class="nk-footer-copyright"> &copy; {{date('Y')}} {{$basic->sitename}}  </div><div class="nk-footer-links"><ul class="nav nav-sm"><li class="nav-item"><a class="nav-link" href="#">Terms</a></li><li class="nav-item"><a class="nav-link" href="#">Privacy</a></li><li class="nav-item"><a class="nav-link" href="#">Help</a></li></ul></div></div></div></div></div></div></div>
 <script src="{{asset('backend/js/bundle.js?ver=1.6.1')}}"></script>
 <script src="{{asset('backend/js/scripts.js?ver=1.6.1')}}"></script>
 <script src="{{asset('backend/js/demo-settings.js?ver=1.6.1')}}"></script>
 <script src="{{asset('backend/js/charts/chart-crypto.js?ver=1.6.1')}}"></script>



 @yield('scripts')

    <script src="{{asset('frontend/js/rainbow.js')}}"></script>
	<script src="{{asset('frontend/js/sample.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.growl.js')}}"></script>




	@if(session('alert'))
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

	@if(session('message'))
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


@if(session('error'))
	<script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ session('error') }}"
			});


		  });
		}).call(this);


	</script>
	@endif

@if(session('danger'))
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

 @if(session('success'))
	<script>
		 (function () {
		  $(function () {
		   return $.growl.notice({
				message: "{{ session('success') }}"
			});


		  });
		}).call(this);


	</script>
	@endif
	@if ($errors->any())
 @foreach ($errors->all() as $error)
 <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $error }}"
			});


		  });
		}).call(this);


	</script>
    @endforeach

@endif

 </body></html>

<!-- Localized -->
