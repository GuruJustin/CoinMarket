@extends('include.dashboard')

@section('content')
   <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">

                                        <h4 class="nk-block-title fw-normal">Account Security</h4>
                                        <div class="nk-block-des">
                                            <p>
                                                You have full control to manage over your account security.
                                                <span class="text-primary"><em class="icon ni ni-info" data-toggle="tooltip" data-placement="right" title="Account Security Settings"></em></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nk-nav nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link" href="{{route('profile')}}">Personal</a></li>
                                    <li class="nav-item"><a class="nav-link  active" href="#">Security</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('bank')}}">Payment Account</a></li>
                                    
                                </ul>
                                <div class="nk-block">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Security Settings</h5>
                                            <div class="nk-block-des"><p>These settings are helps you keep your account secure.</p></div>
                                        </div>
                                    </div>
                                    <div class="card card-bordered">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Save my Activity Logs</h6>
                                                        <p>You can save your all activity logs including unusual activity detected.</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <ul class="align-center gx-3">
                                                              <form method="post" class="form-validate" action="{{route('logtoggle') }}">
                                        @csrf
                                                            <li class="order-md-last d-inline-flex">
                                                                <div class="custom-control custom-switch mr-n2">
                                                                    <input type="checkbox" name="log"  {{ $user->log == "1" ? 'checked' : '' }} class="custom-control-input" id="activity-log" /><label class="custom-control-label" for="activity-log"></label>
                                                                    <button type="submit" class="btn btn-sm link-primary">Save</button> 
                                        </form>
                                                                </div>
                                                                
                                                            </li>
                                                            
                                        
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Security Pin Code</h6>
                                                        <p>You can set your pin code, we will ask you on your withdraw and transfer funds.</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <form method="post" class="form-validate" action="{{route('pintoggle') }}">
                                        @csrf
                                                        <div class="custom-control custom-switch mr-n2">
                                        
                                                            <input type="checkbox" {{ $user->setpin == "1" ? 'checked' : '' }} class="custom-control-input" name="setpin" id="security-pin" /><label class="custom-control-label" for="security-pin"></label>
                                                              <button type="submit" class="btn btn-sm link-primary">Save</button> 
                                        </form>
                                                        </div>
                                         
                                        
                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Change Password</h6>
                                                        <p>Set a unique password to protect your account.</p>
                                                    </div>
                                                    <div class="nk-block-actions flex-shrink-sm-0">
                                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                            <li class="order-md-last"><a href="#" data-toggle="modal" data-target="#modalForm" class="btn btn-primary">Change Password</a></li>
                                                            <li>
                                                                <em class="text-soft text-date fs-12px">Last changed: <span>{!! date('D, d/M, Y: h:m A', strtotime($user->passchange)) !!}</span></em>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Change Pin</h6>
                                                        <p>Set a unique transaction pin to protect fund transfer.</p>
                                                    </div>
                                                    <div class="nk-block-actions flex-shrink-sm-0">
                                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                            <li class="order-md-last"><a href="#" data-toggle="modal" data-target="#modalForm2" class="btn btn-primary">Change Pin</a></li>
                                                            <li>
                                                                <em class="text-soft text-date fs-12px">Last changed: <span>@if($user->pinchange > 0 ){!! date('D, d/M, Y: h:m A', strtotime($user->pinchange)) !!} @else None @endif</span></em>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>2FA Authentication @if($user->gfa == 1)<span class="badge badge-success">Enabled</span> @else <span class="badge badge-danger">Disabled</span>@endif</h6>
                                                        <p>
                                                            Secure your account with 2FA security. When it is activated you will need to enter not only your password, but also a special code using app. You can receive this code by emaiil or SMS on mobile
                                                            app.
                                                        </p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                        @if($user->gfa == 1)
                                        <form method="post" class="form-validate" action="{{route('stopgfa') }}">
                                            @csrf
                                        <button  type="submit" class="btn btn-danger">Disable</button>
                                        </form>
                                        @else
                                         <form method="post" class="form-validate" action="{{route('startgfa') }}">
                                            @csrf
                                        <button type="submit" class="btn btn-primary">Enable</button>
                                        </form>
                                        @endif
                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                     <div class="modal fade" tabindex="-1" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Password</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>

                        <br>
                        <center>
                        <em class="nk-modal-icon icon icon-circle icon-circle-xl ni ni-lock bg-primary"></em>
                        </center>


                <div class="modal-body">
                <form method="post" class="form-validate" action="{{route('user.change-password') }}">
@csrf

                        <div class="form-group">
                            <label class="form-label" for="full-name">Old Password</label>
                            <div class="form-control-wrap">
                                <input class="form-control" type="password" id="old-pass" name="current_password" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">New Password</label>
                            <div class="form-control-wrap">
                                <input class="form-control" type="password" id="new-pass"  name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Confirm Password</label>
                            <div class="form-control-wrap">
                                <input class="form-control" type="password" id="confirm-pass" name="password_confirmation"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">@if($user->passchange > 0 ) Pin Was Changed  {{ Carbon\Carbon::parse($user->passchange)->diffForHumans() }}  @else Pin Not Set @endif </span>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
                     <div class="modal fade" tabindex="-1" id="modalForm2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Transaction Pin</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>

                        <br>
                        <center>
                        <em class="nk-modal-icon icon icon-circle icon-circle-xl ni ni-shield bg-primary"></em>
                        </center>


                <div class="modal-body">
                <form method="post" class="form-validate" action="{{route('user.change-pin') }}">
@csrf

                        <div class="form-group">
                            <label class="form-label" for="full-name">Enter Account Login Password</label>
                            <div class="form-control-wrap">
                                <input class="form-control" type="password" id="old-pass" name="current_password" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Set New Pin</label>
                            <div class="form-control-wrap">
                                <input class="form-control" type="password" id="new-pass"  name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Confirm New Pin</label>
                            <div class="form-control-wrap">
                                <input class="form-control" type="password" id="confirm-pass" name="password_confirmation"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Pin</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">@if($user->pinchange > 0 ) Pin Was Changed  {{ Carbon\Carbon::parse($user->pinchange)->diffForHumans() }}  @else Pin Not Set @endif </span>
                </div>
            </div>
        </div>
    </div>
@endsection
