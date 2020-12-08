@extends('include.dashboard')
@section('content')


@php
$ip = \App\UserLogin::whereUser_id(Auth::user()->id)->latest()->take(1)->first();
 $ncount = \App\Message::whereUser_id(Auth::user()->id)->whereAdmin(1)->whereStatus(0)->count();

 $ipcount = \App\UserLogin::whereUser_id(Auth::user()->id)->count();
  $depocount = \App\Deposit::whereUser_id(Auth::user()->id)->whereStatus(1)->count();
  $ref = \App\User::whereReference(Auth::user()->id)->count();
  $lastref = \App\User::whereReference(Auth::user()->id)->first();
  $depodate = \App\Deposit::whereUser_id(Auth::user()->id)->whereStatus(1)->first();
@endphp
@if($ncount > 0)

@endif
 <div class="nk-content nk-content-fluid">




                        <div class="container-xl wide-lg">






                        <div class="alert alert-warning">
                                        <div class="alert-cta flex-wrap flex-md-nowrap">
                                            <div class="alert-text"><p>Hello {{Auth::User()->username}}!, You have <a href="{{route('inbox')}}" class="link link-primary"> {{$ncount}}  unread message(s).</a></p> </div>
                                            <ul class="alert-actions gx-3 mt-3 mb-1 my-md-0">
                                                <li class="order-md-last"><a href="#" class="btn btn-sm btn-warning" type="button" class="close" data-dismiss="alert" aria-label="Close">Close</a></li>

                                            </ul>

                                        </div>
                                    </div>



  <div class="nk-block-head nk-block-head-sm">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h3 class="nk-block-title page-title">Dashboard</h3>
                                                <div class="nk-block-des text-soft"><p><?php
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
    ?>, {{Auth::User()->fname}} {{Auth::User()->lname}}</p></div>
                                            </div>
                                            <div class="nk-block-head-content">
                                                <div class="toggle-wrap nk-block-tools-toggle">
                                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                    <div class="toggle-expand-content" data-content="pageMenu">
                                                        <ul class="nk-block-tools g-3">
                                                            <li>
                                                                <a href="#"  data-toggle="modal" data-target="#modalbonus"  class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-gift"></em><span>Earn Bonus</span></a>
                                                            </li>

                                                            <li class="nk-block-tools-opt">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <div class="nk-content-body">
<br>
                                <div class="nk-block">
                                    <div class="row gy-gs">
                                        <div class="col-lg-5 col-xl-4">
                                            <div class="nk-block">
                                                <div class="nk-block-head-xs">
                                                    <div class="nk-block-head-content"><h5 class="nk-block-title title">Fiat Summary</h5></div>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="card card-bordered text-light is-dark h-100">
                                                        <div class="card-inner">
                                                            <div class="nk-wg7">
                                                                <div class="nk-wg7-stats">
                                                                    <div class="nk-wg7-title">Available balance in {{$basic->currency}}</div>
                                                                    <div class="number-lg amount">{{$basic->currency_sym}} {{number_format(Auth::user()->balance, $basic->decimal)}} </div>
                                                                </div>
                                                                <div class="nk-wg7-stats-group">
                                                                    <div class="nk-wg7-stats w-50">
                                                                        <div class="nk-wg7-title">Pending</div>
                                                                        <div class="number">{{$basic->currency_sym}} {{number_format($pending, $basic->decimal)}} </div>
                                                                    </div>
                                                                    <div class="nk-wg7-stats w-50">
                                                                        <div class="nk-wg7-title">Earnings</div>
                                                                        <div class="number">{{$basic->currency_sym}} {{number_format(Auth::user()->bonus, $basic->decimal)}} </div>
                                                                    </div>
                                                                </div>
                                                                <div class="nk-wg7-foot">
                                                                    <span class="nk-wg7-note">Last deposit at: <span>@if($depodate){{ Carbon\Carbon::parse($depodate->updated_at)->diffForHumans() }} @else None Deposit Yet @endif</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-xl-8">
                                            <div class="nk-block">
                                                <div class="nk-block-head-xs">
                                                    <div class="nk-block-between-md g-2">
                                                        <div class="nk-block-head-content"><h6 class="nk-block-title title">Sales Summary</h6></div>

                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-sm-4 col-6">
                                                        <div class="card bg-primary-dim">
                                                            <div class="nk-wgw sm">
                                                                <a class="nk-wgw-inner" href="#">
                                                                    <div class="nk-wgw-name">
                                                                        <div class="nk-wgw-icon"><em class="icon ni ni-coins"></em></div>
                                                                        <h5 class="nk-wgw-title title">Total Sales</h5>
                                                                    </div>
                                                                    <div class="nk-wgw-balance">
                                                                        <div class="amount"><span class="currency currency-nio">{{$basic->currency_sym}}</span> {{number_format($sell, $basic->decimal)}} </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="card bg-warning-dim">
                                                            <div class="nk-wgw sm">
                                                                <a class="nk-wgw-inner" href="#">
                                                                    <div class="nk-wgw-name">
                                                                        <div class="nk-wgw-icon"><em class="icon ni ni-alert-circle"></em></div>
                                                                        <h5 class="nk-wgw-title title">Pending Sales</h5>
                                                                    </div>
                                                                    <div class="nk-wgw-balance">
                                                                        <div class="amount"><span class="currency currency-nio">{{$basic->currency_sym}}</span> {{number_format($spend, $basic->decimal)}} </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-12">
                                                        <div class="card bg-danger-dim">
                                                            <div class="nk-wgw sm">
                                                                <a class="nk-wgw-inner" href="#/crypto/wallet-bitcoin.html">
                                                                    <div class="nk-wgw-name">
                                                                        <div class="nk-wgw-icon"><em class="icon ni ni-trash"></em></div>
                                                                        <h5 class="nk-wgw-title title">Declined Sales</h5>
                                                                    </div>
                                                                    <div class="nk-wgw-balance">
                                                                        <div class="amount"><span class="currency currency-nio">{{$basic->currency_sym}}</span> {{number_format($sdecline, $basic->decimal)}} </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-block nk-block-md">
                                                <div class="nk-block-head-xs">
                                                    <div class="nk-block-between-md g-2">
                                                        <div class="nk-block-head-content"><h6 class="nk-block-title title">Purchase Summary </h6></div>

                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-sm-4 col-6">
                                                        <div class="card bg-primary-dim">
                                                            <div class="nk-wgw sm">
                                                                <a class="nk-wgw-inner" href="#crypto/wallet-bitcoin.html">
                                                                    <div class="nk-wgw-name">
                                                                        <div class="nk-wgw-icon"><em class="icon ni ni-cart"></em></div>
                                                                        <h5 class="nk-wgw-title title">Total Purchase</h5>
                                                                    </div>
                                                                    <div class="nk-wgw-balance">
                                                                        <div class="amount"><span class="currency currency-nio">{{$basic->currency_sym}}</span> {{number_format($buy - $bacharge, $basic->decimal)}} </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="card bg-warning-dim">
                                                            <div class="nk-wgw sm">
                                                                <a class="nk-wgw-inner" href="#">
                                                                    <div class="nk-wgw-name">
                                                                        <div class="nk-wgw-icon"><em class="icon ni ni-alert-circle"></em></div>
                                                                        <h5 class="nk-wgw-title title">Pending Purchase</h5>
                                                                    </div>
                                                                    <div class="nk-wgw-balance">
                                                                        <div class="amount"><span class="currency currency-nio">{{$basic->currency_sym}}</span> {{number_format($bpend - $bcharge, $basic->decimal)}} </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-12">
                                                        <div class="card bg-danger-dim">
                                                            <div class="nk-wgw sm">
                                                                <a class="nk-wgw-inner" href="#/crypto/wallet-bitcoin.html">
                                                                    <div class="nk-wgw-name">
                                                                        <div class="nk-wgw-icon"><em class="icon ni ni-trash"></em></div>
                                                                        <h5 class="nk-wgw-title title">Declined Purchase</h5>
                                                                    </div>
                                                                    <div class="nk-wgw-balance">
                                                                        <div class="amount"><span class="currency currency-nio">{{$basic->currency_sym}}</span> {{number_format($bdecline - $bdeccharge, $basic->decimal)}} </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<br><br>
                                                        <div class="nk-block-head-content"><h6 class="nk-block-title title">Unprocessed Trade </h6></div><br>

                                 <div class="card-inner p-0 border-top">
                                                        <div class="nk-tb-list nk-tb-orders">
                                                            <div class="nk-tb-item nk-tb-head">
                                                                <div class="nk-tb-col"><span>Order No.</span></div>

                                                                <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                                                <div class="nk-tb-col tb-col-lg"><span>Currency</span></div>
                                                                <div class="nk-tb-col"><span>Amount/Crypto</span></div>
                                                                <div class="nk-tb-col"> Type </div>
                                                                <div class="nk-tb-col"><span>&nbsp;</span></div>
                                                            </div>

@if(count($trx) >0)
@foreach($trx as $k=>$data)
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class="tb-lead"><a href="#">#{{$data->trx}}</a></span>
                                                                </div>

                                                                <div class="nk-tb-col tb-col-md"><span class="tb-sub">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</span></div>
                                                                <div class="nk-tb-col tb-col-lg"><span class="tb-sub text-primary">

{{$data->currency->name}}</span></div>
                                                                <div class="nk-tb-col">
                                                                   <span>$</span  <span class="tb-sub tb-amount">{{number_format($data->amount, $basic->decimal)}}<br>
<span class="tb-sub text-primary">                                                  {{$data->currency->symbol}}
</span>
                                                                    </span>
                                                                </div>
                                                                <div class="nk-tb-col"><span class="badge badge-dot badge-dot-xs badge-warning">@if($data->type > 0)                                                                Purchase @else Sales @endif</span></div>
                                                                <div class="nk-tb-col nk-tb-col-action">
                                                                    <div class="dropdown">
                                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                            <ul class="link-list-plain">
                                                                            @if($data->type > 0)
                                                                                <li><a href="{{ route('ebuypost2',$data->trx) }}">Continue</a></li>
                                                                                <li><a href="{{ route('ebuydel',$data->trx) }}">Delete</a></li>
@else
                                                                                <li><a href="{{ route('esellpost22', $data->trx) }}">Continue</a></li>
                                                                                <li><a href="{{ route('eselldel', $data->trx) }}">Delete</a></li>
@endif
                                                                          </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
@endforeach
@else<center>
 <div class="card-inner-sm border-top text-center d-sm"><a href="#" class="btn btn-link btn-block">No Pending Trade</a></div></center>
@endif
<br><center>
{{ $trx->links() }}</center>



                                                        </div>
                                                    </div>

                                                </div>
<br><br>

                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="nk-refwg">
                                            <div class="nk-refwg-invite card-inner">
                                                <div class="nk-refwg-head g-3">
                                                    <div class="nk-refwg-title">
                                                        <h5 class="title">Refer Us & Earn</h5>
                                                        <div class="title-sub">Use the bellow link to invite your friends.</div>
                                                    </div>
                                                    <div class="nk-refwg-action"><a href="http://www.facebook.com/share.php?u={{ route('refer.register',auth::user()->username) }}&amp;title={{$gnl->title}} Referral Link" class="btn btn-primary">Invite</a></div>
                                                </div>
                                                <div class="nk-refwg-url">
                                                    <div class="form-control-wrap">
                                                        <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link">
                                                            <em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span>
                                                        </div>
                                                        <div class="form-icon"><em class="icon ni ni-link-alt"></em></div>
                                                        <input type="text" class="form-control copy-text" id="refUrl" value="{{ route('refer.register',auth::user()->username) }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-refwg-stats card-inner bg-lighter">
                                                <div class="nk-refwg-group g-3">
                                                    <div class="nk-refwg-name">
                                                         <div class="nk-refwg-ck">   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                            <rect x="3.5" y="14" width="36" height="62" rx="2" ry="2" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="3.5" y1="22" x2="39.5" y2="22" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="3.5" y1="64" x2="39.5" y2="64" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="20.5" y1="18" x2="25.5" y2="18" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="17.17" y1="18" x2="17.17" y2="18" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <circle cx="21.5" cy="70" r="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <rect x="7.5" y="25" width="28" height="35" fill="#eff1ff" />
                                                            <rect x="10.5" y="40" width="4" height="6" rx="2" ry="2" fill="#c4cefe" />
                                                            <rect x="16.5" y="40" width="4" height="6" rx="2" ry="2" fill="#c4cefe" />
                                                            <rect x="22.5" y="40" width="4" height="6" rx="2" ry="2" fill="#c4cefe" />
                                                            <rect x="28.5" y="40" width="4" height="6" rx="2" ry="2" fill="#c4cefe" />
                                                            <rect x="50.5" y="14" width="36" height="62" rx="2" ry="2" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="50.5" y1="22" x2="86.5" y2="22" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="50.5" y1="64" x2="86.5" y2="64" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="67.5" y1="18" x2="72.5" y2="18" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="64.45" y1="17.86" x2="64.45" y2="17.86" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <circle cx="68.5" cy="70" r="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <rect x="54.5" y="25" width="28" height="35" fill="#eff1ff" />
                                                            <rect x="57.5" y="39" width="4" height="6" rx="2" ry="2" fill="#c4cefe" />
                                                            <rect x="63.5" y="39" width="4" height="6" rx="2" ry="2" fill="#c4cefe" />
                                                            <rect x="69.5" y="39" width="4" height="6" rx="2" ry="2" fill="#c4cefe" />
                                                            <rect x="75.5" y="39" width="4" height="6" rx="2" ry="2" fill="#c4cefe" />
                                                            <ellipse cx="45.51" cy="44" rx="15.18" ry="15" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <ellipse cx="45.51" cy="44" rx="11.13" ry="11" fill="#e3e7fe" />
                                                            <path d="M46,50.92s5.5-2.77,5.5-6.92V39.16L46,37.08l-5.5,2.08V44C40.5,48.15,46,50.92,46,50.92Z" fill="#6576ff" />
                                                            <polyline points="48.04 42 44.56 46 42.98 44.18" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /></svg></div>
                                                    </div>
                                                    <div class="nk-refwg-info g-3">
                                                        <div class="nk-refwg-sub">
                                                            <div class="title">{{$ref}}</div>
                                                            <div class="sub-text">Total Referred</div>
                                                        </div>
                                                        <div class="nk-refwg-sub">
                                                            <div class="title">@if ($lastref) {{$lastref}} @else None @endif</div>
                                                            <div class="sub-text">Last Referred</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-refwg-more dropdown mt-n1 mr-n1">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner card-inner-lg">
                                            <div class="align-center flex-wrap flex-md-nowrap g-4">
                                                <div class="nk-block-image w-120px flex-shrink-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                                        <path
                                                            d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z"
                                                            transform="translate(0 -1)"
                                                            fill="#f6faff"
                                                        />
                                                        <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff" />
                                                        <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                        <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                        <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                        <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                        <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                        <path
                                                            d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z"
                                                            transform="translate(0 -1)"
                                                            fill="#798bff"
                                                        />
                                                        <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="#6576ff" />
                                                        <path
                                                            d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                                                            transform="translate(0 -1)"
                                                            fill="none"
                                                            stroke="#6576ff"
                                                            stroke-miterlimit="10"
                                                            stroke-width="2"
                                                        />
                                                        <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                        <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                        <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                        <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                        <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                        <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                        <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                        <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                                                        <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                                                    </svg>
                                                </div>
                                                <div class="nk-block-content">
                                                    <div class="nk-block-content-head px-lg-4">
                                                        <h5>We’re here to help you!</h5>
                                                        <p class="text-soft">Ask a question or file a support ticket, manage request, report an issues. Our team support team will get back to you by email.</p>
                                                    </div>
                                                </div>
                                                <div class="nk-block-content flex-shrink-0"><a href="{{route('createmessage')}}" class="btn btn-lg btn-outline-primary">Get Support Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection
