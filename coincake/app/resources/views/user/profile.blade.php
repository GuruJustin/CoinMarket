@extends('include.dashboard')

@section('content')
   <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <div class="nk-block-head-sub"><span>Account Setting</span></div>
                                        <h4 class="nk-block-title fw-normal">My Account</h4>
                                        <div class="nk-block-des">
                                            <p>
                                                You have full control to manage your own account setting.
                                                <span class="text-primary"><em class="icon ni ni-info" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></em></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nk-nav nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" href="#" active>Personal</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('security')}}">Security</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('bank')}}">Payment Account</a></li> 
                                </ul>
                                <div class="nk-block">
                                @if(Auth::user()->verified == 0)
                                    <div class="alert alert-warning">
                                        <div class="alert-cta flex-wrap flex-md-nowrap">
                                            <div class="alert-text"><p>Verify your account to unlock full feature and increase your limit of transaction amount.</p></div>
                                            <ul class="alert-actions gx-3 mt-3 mb-1 my-md-0">
                                                <li class="order-md-last"><a href="{{ route('user.authorization')}}" class="btn btn-sm btn-warning">Verify</a></li>
                                                <li><a href="{{ route('user.authorization')}}" class="link link-primary">Learn More</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Personal Information</h5>
                                            <div class="nk-block-des"><p>Basic info, like your name and address, that you use on {{$basic->sitename}} Platform.</p></div>
                                        </div>
                                    </div>
                                    <div class="nk-data data-list">
                                        <div class="data-head"><h6 class="overline-title">Basics</h6></div>
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col"><span class="data-label">Full Name</span><span class="data-value">{{$user->fname}} {{$user->lname}}</span></div>
                                            <div class="data-col data-col-end">
                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col"><span class="data-label">Username</span><span class="data-value">{{$user->username}}</span></div>
                                            <div class="data-col data-col-end">
                                                <span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col"><span class="data-label">Email</span><span class="data-value">{{$user->email}}</span></div>
                                            <div class="data-col data-col-end">
                                                <span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span>
                                            </div>
                                        </div>
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col"><span class="data-label">Phone Number</span><span class="data-value text-soft">{{$user->phone}}</span></div>
                                            <div class="data-col data-col-end">
                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col"><span class="data-label">Date of Birth</span><span class="data-value">{!! date('D, d-M, Y', strtotime($user->dob)) !!}</span></div>
                                            <div class="data-col data-col-end">
                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                            <div class="data-col">
                                                <span class="data-label">Address</span>
                                                <span class="data-value">
                                                    {{$user->address}}, {{$user->city}}<br />
                                                    {{$user->state}}, {{$user->country}}. {{$user->zip_code}}
                                                </span>
                                            </div>
                                            <div class="data-col data-col-end">
                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-data data-list">
                                        <div class="data-head"><h6 class="overline-title">Preferences</h6></div>
                                        <div class="data-item">
                                            <div class="data-col"><span class="data-label">Language</span><span class="data-value">English (United State)</span></div>
                                            <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">System Language</a></div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col"><span class="data-label">Date Joined</span><span class="data-value">{!! date(' d/M/Y', strtotime($user->created_at)) !!}</span></div>
                                            <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</a></div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





        <div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-lg">
                        <h5 class="title">Update Profile</h5>
                        <ul class="nk-nav nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal">Personal</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#address">Address</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal">
                            {!! Form::open(['method'=>'post','role'=>'form','name' =>'editForm', 'files'=>true]) !!}
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Full Name</label><input type="text" class="form-control form-control-lg" name="fname"  id="full-name" value="{{$user->fname}}" placeholder="Enter First name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Last Name</label><input type="text" name="lname"  class="form-control form-control-lg" id="display-name" value="{{$user->lname}}" placeholder="Enter Last name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Phone Number</label><input type="text" class="form-control form-control-lg" id="phone-no" value="{{$user->phone}}" name="phone" placeholder="Phone Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="birth-day">Date of Birth</label><input type="date" value="{{$user->dob}}" name="dob" class="form-control form-control-lg date-picker" id="birth-day" placeholder="Enter your BirthDay" />
                                        </div>
                                    </div>

                                    <div class="col-md-12"> <div class="form-label-group"><label class="form-label" for="buysell-amount">Upload Profile Image</label></div><div class="custom-file">
                                                                        <input type="file" multiple class="custom-file-input" name="image" accept="image/*" id="customFile">
                                                                        <label class="custom-file-label" for="customFile">Select Photo</label>
                                    </div>

                                        </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                            <input name="updateprof" hidden>
                                            <input type="submit" name="Update Profile" value="Update Profile" class="btn btn-lg btn-primary"></input></li>
                                            <li><a href="#" data-dismiss="modal" class="link link-light">Cancel</a></li>
                                        </ul>
                                    </div>

                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane" id="address">
                             {!! Form::open(['method'=>'post','role'=>'form','name' =>'editForm', 'files'=>true]) !!}
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="address-l1">Address</label><input type="text" class="form-control form-control-lg" id="address-l1" name="address" value="{{$user->address}}" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="address-l2">City</label><input type="text" class="form-control form-control-lg" id="address-l2" name="city" value="{{$user->city}}" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="address-st">State</label><input type="text" class="form-control form-control-lg" id="address-st" name="state" value="{{$user->state}}" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="address-county">Country</label>
                                            <select onchange="print_state('state', this.selectedIndex);" id="country"    name="country"  class="form-control form-control-lg"/></select>
                                            <script language="javascript">print_country("country");</script>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li><input name="updateadd" hidden>
                                            <input type="submit" value="Update Address" class="btn btn-lg btn-primary"></input></li>
                                            <li><a href="#" data-dismiss="modal" class="link link-light">Cancel</a></li>
                                        </ul>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
