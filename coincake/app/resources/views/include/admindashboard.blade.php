<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
	<meta charset="utf-8">
	<meta name="author" content="{{$basic->sitename}}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="{{$basic->sitename}} Crypto currency trading system."><!-- Fav Icon -->
	<link rel="shortcut icon" href="{{asset('app/public/assets/logo.png')}}">
	<!-- Site Title  -->
	<title>{{isset($page_title) ? $page_title : ''}} | {{$basic->sitename}} </title>
	<!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('app/public/assets/logo.png')}}">
    <!-- Page Title  -->
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('app/public/assets/css/dashlite.css')}}">
    <link id="skin-default" rel="stylesheet"  href="{{asset('app/public/assets/css/theme.css')}}">

	<!-- Original -->
    <!-- <script src="{{asset('process/countries.js')}}"></script>
	<link href="{{asset('front-assets/css/jquery.growl.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('dash-assets/css/vendor.bundle-62688.css')}}">
	<link rel="stylesheet" href="{{asset('dash-assets/css')}}/{{$basic->theme}}" id="layoutstyle"></head> -->
	
</head>

<body class="nk-body bg-white has-sidebar dark-mode">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{asset('app/public/images/logo.png')}}" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="{{asset('app/public/images/logo-dark.png')}}" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-body" data-simplebar>
                        <div class="nk-sidebar-content">
                            <div class="nk-sidebar-menu">
                                <ul class="nk-menu">
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title text-primary-alt">Use-Case Preview</h6>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/crypto/index.html" class="nk-menu-link" target="_blank">
                                            <span class="nk-menu-icon"><em class="icon ni ni-sign-btc-alt"></em></span>
                                            <span class="nk-menu-text">Crypto - Buy Sell Panel</span><span class="nk-menu-badge badge-danger">HOT</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title text-primary-alt">Dashboards</h6>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('admin.dashboard')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                            <span class="nk-menu-text">Dashboard</span>
                                        </a>
                                    </li>


									<!-- Blockchains Management -->
                                    <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                            <span class="nk-menu-text">Blockchain</span>
                                        </a>
                                        <ul class="nk-menu-sub">
											<? $coins = DB::table('coins')->get(); ?>
											@foreach($coins as $data)
											<li class="nk-menu-item">
												<a href="{{route('admin.blockchainwallet', $data->id)}}"  class="nk-menu-link"><span class="nk-menu-text">{{$data->name}}</span></a>
											</li>
											@endforeach
                                        </ul>
                                    </li>

									


									<!-- Trade Management -->
                                    <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                            <span class="nk-menu-text">Trade</span>
                                        </a>
                                        <ul class="nk-menu-sub">
											<li class="nk-menu-item">
												<div class="nk-menu-item has-sub">
													<a href="#" class="nk-menu-link nk-menu-toggle">
														<span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
														<span class="nk-menu-text">Purchase</span>
													</a>
													<ul class="nk-menu-sub">
														<li class="nk-menu-item">
															<a href="{{route('buy-currency')}}"  class="nk-menu-link"><span class="nk-menu-text">Processed Purchase</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('pendingbuy-currency')}}"  class="nk-menu-link"><span class="nk-menu-text">Pending Purchase</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('declinedbuy-currency')}}"  class="nk-menu-link"><span class="nk-menu-text">Declined Purchase</span></a>
														</li>
													</ul>
												</div>
											</li>

											
											<li class="nk-menu-item">
												<div class="nk-menu-item has-sub">
													<a href="#" class="nk-menu-link nk-menu-toggle">
														<span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
														<span class="nk-menu-text">Sales</span>
													</a>
													<ul class="nk-menu-sub">
														<li class="nk-menu-item">
															<a href="{{route('sell-currency')}}"  class="nk-menu-link"><span class="nk-menu-text">Processed Sales</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('pendingsell-currency')}}"  class="nk-menu-link"><span class="nk-menu-text">Pending Sales</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('declinedsell-currency')}}"  class="nk-menu-link"><span class="nk-menu-text">Declined Sales</span></a>
														</li>
													</ul>
												</div>
											</li>
                                        </ul>
                                    </li>




									<!-- Offers and Orders Management -->
                                    <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                            <span class="nk-menu-text">Offers & Orders</span>
                                        </a>
                                        <ul class="nk-menu-sub">
											<li class="nk-menu-item">
												<a href="{{route('activeoffer')}}"  class="nk-menu-link"><span class="nk-menu-text">Active Offers</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('inactiveoffer')}}"  class="nk-menu-link"><span class="nk-menu-text">Inactive Offers</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('orderpend')}}"  class="nk-menu-link"><span class="nk-menu-text">Pending Order</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('orderprocess')}}"  class="nk-menu-link"><span class="nk-menu-text">Processed Order</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('orderrej')}}"  class="nk-menu-link"><span class="nk-menu-text">Rejected Order</span></a>
											</li>
                                        </ul>
                                    </li>






									<!-- Finance Management -->
                                    <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                            <span class="nk-menu-text">Finance</span>
                                        </a>
                                        <ul class="nk-menu-sub">
											<li class="nk-menu-item">
												<div class="nk-menu-item has-sub">
													<a href="#" class="nk-menu-link nk-menu-toggle">
														<span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
														<span class="nk-menu-text">Withdrawls</span>
													</a>
													<ul class="nk-menu-sub">
														<li class="nk-menu-item">
															<a href="{{route('withdraw.requests')}}"  class="nk-menu-link"><span class="nk-menu-text">Pending Withdrawls</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('withdraw.approved')}}"  class="nk-menu-link"><span class="nk-menu-text">Processed Withdrawls</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('withdraw.refunded')}}"  class="nk-menu-link"><span class="nk-menu-text">Declined Withdrawls</span></a>
														</li>
													</ul>
												</div>
											</li>

											<li class="nk-menu-item">
												<div class="nk-menu-item has-sub">
													<a href="#" class="nk-menu-link nk-menu-toggle">
														<span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
														<span class="nk-menu-text">Deposits</span>
													</a>
													<ul class="nk-menu-sub">
														<li class="nk-menu-item">
															<a href="{{route('deposits')}}"  class="nk-menu-link"><span class="nk-menu-text">Processed Deposits</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('deposits.requests')}}"  class="nk-menu-link"><span class="nk-menu-text">Unprocessed Deposits</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('deposits.declined')}}"  class="nk-menu-link"><span class="nk-menu-text">Declined Deposits</span></a>
														</li>
													</ul>
												</div>
											</li>

											<li class="nk-menu-item">
												<a href="{{route('transfer.log')}}"  class="nk-menu-link"><span class="nk-menu-text">Fund Transfer</span></a>
											</li>
                                        </ul>
                                    </li>




									<!-- User Management Tag -->
                                    <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                            <span class="nk-menu-text">Users</span>
                                        </a>
                                        <ul class="nk-menu-sub">
											<li class="nk-menu-item">
												<a href="{{route('users')}}"  class="nk-menu-link"><span class="nk-menu-text">Active Customers</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('user.ban')}}"  class="nk-menu-link"><span class="nk-menu-text">Inactive Customers</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('createadmin')}}"  class="nk-menu-link"><span class="nk-menu-text">Create Admin</span></a>
											</li>
                                        </ul>
                                    </li>



									
									<!-- Settings Management Tag -->
                                    <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                            <span class="nk-menu-text">Settings</span>
                                        </a>
                                        <ul class="nk-menu-sub">
											<li class="nk-menu-item">
												<a href="{{route('admin.GenSetting')}}"  class="nk-menu-link"><span class="nk-menu-text">System Settings</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('admin.GenSetting')}}"  class="nk-menu-link"><span class="nk-menu-text">Blockchain Settings</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('admin.GenSetting')}}"  class="nk-menu-link"><span class="nk-menu-text">System Currencies</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('admin.GenSetting')}}"  class="nk-menu-link"><span class="nk-menu-text">Email & SMS Settings</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('admin.GenSetting')}}"  class="nk-menu-link"><span class="nk-menu-text">Payment Gateway</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('admin.GenSetting')}}"  class="nk-menu-link"><span class="nk-menu-text">Bank Account Settings</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('admin.GenSetting')}}"  class="nk-menu-link"><span class="nk-menu-text">Front Settings</span></a>
											</li>

											<!-- Settings -->
											<li class="nk-menu-item">
												<div class="nk-menu-item has-sub">
													<a href="#" class="nk-menu-link nk-menu-toggle">
														<span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
														<span class="nk-menu-text">Front Settings</span>
													</a>
													<ul class="nk-menu-sub">
														<li class="nk-menu-item">
															<a href="{{route('admin.about')}}"  class="nk-menu-link"><span class="nk-menu-text">About Us</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('faqs-all')}}"  class="nk-menu-link"><span class="nk-menu-text">FAQs</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('admin.header')}}"  class="nk-menu-link"><span class="nk-menu-text">Home Header</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('admin.hows')}}"  class="nk-menu-link"><span class="nk-menu-text">How it Works</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('admin.privacy')}}"  class="nk-menu-link"><span class="nk-menu-text">Privacy & Policies</span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('admin.vmg')}}"  class="nk-menu-link"><span class="nk-menu-text">Vision & Mission<span class="badge badge-warning">New</span></span></a>
														</li>
														<li class="nk-menu-item">
															<a href="{{route('currency.index')}}"  class="nk-menu-link"><span class="nk-menu-text">System Currencies</span></a>
														</li>
													</ul>
												</div>
											</li>
                                        </ul>
                                    </li>

									<!-- Message Management Tag -->
                                    <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                            <span class="nk-menu-text">Messages</span>
                                        </a>
                                        <ul class="nk-menu-sub">
											<li class="nk-menu-item">
												<a href="{{route('user.notification')}}"  class="nk-menu-link"><span class="nk-menu-text">Create News</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('user.tickets')}}"  class="nk-menu-link"><span class="nk-menu-text">Customers Request</span></a>
											</li>
											<li class="nk-menu-item">
												<a href="{{route('admin.testi')}}"  class="nk-menu-link"><span class="nk-menu-text">Customers' Testimonial</span></a>
											</li>
                                        </ul>
                                    </li>

                                </ul><!-- .nk-footer-menu -->
                            </div><!-- .nk-sidebar-footer -->
                        </div><!-- .nk-sidebar-content -->
                    </div><!-- .nk-sidebar-body -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>	
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="{{asset('app/public/images/logo.png')}}" srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="{{asset('app/public/images/logo-dark.png')}}" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">
									@php
										$count = \App\Verification::whereStatus(0)->count();
									@endphp
									@if($count > 0)
									<a href="{{route('admin.kyc')}}" class="btn btn-sm btn-outline btn-secondary">
										<em class="text-primary ti ti-id-badge"></em>
										<span>KYC ({{$count}} New)</span>
									</a>
									@endif
                                </div>
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">Administrator</div>
                                                    <div class="user-name dropdown-indicator">Abu Bin Ishityak</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">Abu Bin Ishtiyak</span>
                                                        <span class="sub-text">info@softnio.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                                    <li><a class="dark-switch dark-mode" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown notification-dropdown mr-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
							@yield('body')
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2020 DashLite. Template by <a href="https://softnio.com" target="_blank">Softnio</a>
                            </div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{asset('app/public/assets/js/bundle.js')}}"></script>
    <script src="{{asset('app/public/assets/js/scripts.js')}}"></script>
	<script src="{{asset('app/public/assets/js/charts/gd-default.js')}}"></script>

	<!-- Typicals -->
	<!-- <script src="{{asset('dash-assets/js/jquery.bundle.js?ver=104')}}"></script><script src="{{asset('dash-assets/js/script.js?ver=104')}}"></script>
	<script src="{{asset('front-assets/js/rainbow.js')}}"></script>
	<script src="{{asset('front-assets/js/sample.js')}}"></script>
	<script src="{{asset('front-assets/js/jquery.growl.js')}}"></script>
	<script src="{{asset('front-assets/js/script2.js')}}"></script>
 -->
	@yield('js')
</body>	


@if (session('alert'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ session('alert') }}')});
}(jQuery);
</script>
@endif
@if(Session::has('success'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.success('<em class="ti ti-check toast-message-icon"></em> {{ Session::get('success') }}')});
}(jQuery);
</script>

  @endif

@if (session('message'))
 	<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.success('<em class="ti ti-check toast-message-icon"></em> {{ session('message') }}')});
}(jQuery);
</script>
 @endif
@if(Session::has('danger'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ session('danger') }}')});
}(jQuery);
</script>
 @endif

@if ($errors->has('fname'))

 	<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('fname') }}')});
}(jQuery);
</script>
@endif

@if ($errors->has('lname'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('lname') }}')});
}(jQuery);
</script>
@endif
@if ($errors->has('username'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('username') }}')});
}(jQuery);
</script>
@endif
@if ($errors->has('phone'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('phone') }}')});
}(jQuery);
</script>
@endif
@if ($errors->has('email'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('email') }}')});
}(jQuery);
</script>
@endif
@if ($errors->has('password'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('password') }}')});
}(jQuery);
</script>
@endif
@if ($errors->has('currency'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('country') }}')});
}(jQuery);
</script>
@endif
@if ($errors->has('address'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('address') }}')});
}(jQuery);
</script>
@endif
@if ($errors->has('zip_code'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('zip_code') }}')});
}(jQuery);
</script>
@endif
@if ($errors->has('current_password'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('currenct_password') }}')});
}(jQuery);
</script>
@endif
@if ($errors->has('password_confirmation'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('password_confrimation') }}')});
}(jQuery);
</script>
@endif
@if ($errors->has('city'))
<script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $errors->first('city') }}')});
}(jQuery);
</script>
@endif
@if ($errors->any())
 @foreach ($errors->all() as $error)
 <script>
!function(t){"use strict";
var c=t(".toastr-info");c.length>0&&c.ready(function(){toastr.clear(),toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!1,positionClass:"toast-top-right",preventDuplicates:!0,showDuration:"1000",hideDuration:"10000",timeOut:"9000",extendedTimeOut:"1000"},toastr.error('<em class="ti ti-na toast-message-icon"></em> {{ $error }}')});
}(jQuery);
</script>

@endforeach

@endif

</body></html>