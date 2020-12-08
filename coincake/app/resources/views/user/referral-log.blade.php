@extends('include.dashboard')
@section('content')
   <div class="nk-content">
                        <div class="container-fluid">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <div class="nk-block-head nk-block-head-sm">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title page-title">Referral System</h4>
                                                <div class="nk-block-des text-soft"><p>
                                                     @php
                                                 $count = \App\User::whereRefer(Auth::user()->id)->count();
                                                 @endphp
                                                    You have a total of {{$count}} referred user(s).</p></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <div class="card card-bordered card-stretch">
                                            <div class="card-inner-group">
                                                <div class="card-inner position-relative card-tools-toggle">
                                                     <div class="card-head"><h5 class="card-title card-title-md">Invite your friends and family to {{$gnl->sitename}} and receive free cryptos and fund</h5></div><div class="card-text"><p>Each member have a unique {{$basic->sitename}} referral link to share with friends and family and receive a <strong>bonus of {{$basic->currency_sym}}{{number_format($basic->ref, $basic->decimal)}}</strong> when they verify their account. If any one sign-up with your link, he or she will be added to your referral program. Your referral link may be used to invite more users.</p></div
                                                     <div class="nk-refwg-invite card-inner">
                                                <div class="nk-refwg-head g-3">
                                                    <div class="nk-refwg-title">
                                                        <br>
                                                        <div class="title-sub">Copy the below link to invite your friends.</div>
                                                    </div>
                                                    <div class="nk-refwg-action"><a href="http://www.facebook.com/share.php?u={{ route('refer.register',auth::user()->username) }}&amp;title={{$gnl->title}} Referral Link" class="btn btn-primary"><em class="icon ni ni-facebook-f"></em>Share </a></div>

                                                     <div class="nk-refwg-action"><a href="whatsapp://send?text={{ route('refer.register',auth::user()->username) }}" class="btn btn-success"><em class="icon ni ni-whatsapp"></em> Invite</a></div>
                                                </div>
                                                <div class="nk-refwg-url">
                                                    <div class="form-control-wrap">
                                                        <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link">
                                                            <em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span>
                                                        </div>
                                                        <div class="form-icon"><em class="icon ni ni-link-alt"></em></div>
                                                        <input type="text" class="form-control copy-text" id="refUrl" value="{{ route('refer.register',auth::user()->username) }}" />
                                                    </div>
                                                </div><br><h6 class="card-title card-title-md">Your Referred Users</h6>
                                            </div>
                                                </div>


                                                <div class="card-inner p-0">

                                                    <div class="nk-tb-list nk-tb-ulist table-responsive">


                                                        <div class="nk-tb-item nk-tb-head">
                                                            <div class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid" /><label class="custom-control-label" for="uid"></label>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col"><span class="sub-text">Users</span></div>
                                                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Username</span></div>
                                                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Phone</span></div>

                                                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Last Login</span></div>
                                                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Status</span></div>
                                                            <div class="nk-tb-col nk-tb-col-tools text-right">
                                                                <div class="dropdown">

                                                                </div>
                                                            </div>
                                                        </div>


                                                            @if(count($referral) > 0)
                                                         @foreach($referral as $k=>$data)

                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid1" /><label class="custom-control-label" for="uid1"></label>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <a href="#">
                                                                    <div class="user-card">
                                                                        <div class="user-avatar bg-primary"><span>AB</span></div>
                                                                        <div class="user-info">
                                                                            <span class="tb-lead">{{isset(App\User::whereId($data->id)->first()->fname) ? App\User::whereId($data->id)->first()->fname  : 'N/A'}} {{isset(App\User::whereId($data->id)->first()->lname) ? App\User::whereId($data->id)->first()->lname  : 'N/A'}}<span class="dot dot-success d-md-none ml-1"></span></span><span>{{isset(App\User::whereId($data->id)->first()->email) ? App\User::whereId($data->id)->first()->email  : 'N/A'}}</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-mb">
                                                                <span class="tb-lead">{{isset(App\User::whereId($data->id)->first()->username) ? App\User::whereId($data->id)->first()->username  : 'N/A'}} </span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-mb"><span>{{isset(App\User::whereId($data->id)->first()->phone) ? App\User::whereId($data->id)->first()->phone  : 'N/A'}}</span></div>

                                                            <div class="nk-tb-col tb-col-mb"><span>{{isset(App\User::whereId($data->id)->first()->lastseen) ? App\User::whereId($data->id)->first()->lastseen  : 'N/A'}}</span></div>
                                                            <div class="nk-tb-col tb-col-mb">@if($data->status == 1)
<span class="tb-status text-success">Active</span>
@else
<span class="tb-status text-danger">Inactive</span>
@endif</div>
                                                            <div class="nk-tb-col nk-tb-col-tools">

                                                            </div>
                                                        </div>

@endforeach
@else
<div class="example-alert">
                                                            <div class="alert alert-warning alert-icon">
                                                                <em class="icon ni ni-alert-circle"></em> <strong>No Referral!!</strong>You dont have any referred user yet</div>
                                                        </div>
@endif


                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@stop
