@extends('include.dashboard')

@section('content')

  <div class="nk-content">
                        <div class="container-fluid">
                                        <div class="nk-block-head nk-block-head-lg">

                                            <div class="nk-block-between-md g-4">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title fw-normal">{{$page_title}}</h4>
                                                    <div class="nk-block-des">
                                                        <p>
                                                            Here is list of active offers on the {{$page_title}}. <span class="text-primary"><em class="icon ni ni-info"></em></span>
                                                        </p>
                                                    </div>

                                                </div>
                                                </div>
                                                 <div class="nk-search-box">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                         <form method="post"  class="buysell-form" action="{{ route('searchmarketplace') }}">
                                                         @csrf
                                                            <input type="text" name="code" class="form-control form-control-lg" placeholder="Search By Marker Code..." /><button class="form-icon form-icon-right"><em class="icon ni ni-search"></em></button>
                                                        </form>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="nk-block">
                                        @if(count($deal) > 0)
                                         @foreach($deal as $data)
                                               <div class="card card-bordered sp-plan">
                                                <div class="row no-gutters">
                                                    <div class="col-md-8">
                                                        <div class="sp-plan-info card-inner">
                                                            <div class="row gx-0 gy-3">
                                                                <div class="col-xl-9 col-sm-8">
                                                                    <div class="sp-plan-name">
                                                                        <h6 class="title">
                                                                            <a href="#">Seller: {{$data->user->username}} </a>
                                                                        </h6>
                                                                        <p>Country: <span class="text-base">{{$data->user->country}}</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3 col-sm-4">
                                                                    <div class="sp-plan-opt">
                                                                    <div class="nk-activity-media user-avatar bg-success">  @if( file_exists($data->user->image))
                        <img src="{{asset($data->user->image)}} "
                             alt="Profile Pic">
                    @else

                        <img src=" {{url('assets/user/images/user-default.png')}} "
                             alt="Profile Pic">
                    @endif</div>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sp-plan-desc card-inner">
                                                            <ul class="row gx-1">
                                                                <li class="col-6 col-lg-3">
                                                                    <p><span class="text-soft">Created: </span> {{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</p>
                                                                </li>
                                                                <li class="col-6 col-lg-3">
                                                                    <p><span class="text-soft">Available: </span>  $ {{number_format($data->balance, $basic->decimal)}}</p>
                                                                </li>
                                                                <li class="col-6 col-lg-3">
                                                                    <p><span class="text-soft">Rate</span> $599.00</p>
                                                                </li>
                                                                <li class="col-6 col-lg-3">
                                                                    <p><span class="text-soft">Access Code</span> {{$data->code}}</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="sp-plan-action card-inner">
                                                            <div class="sp-plan-btn">
                                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#buy-{{$data->id}}"><span>Buy From Seller</span></a>
                                                            </div>
                                                            <div class="sp-plan-note text-md-center">
                                                                <p class="text-success">Last Seen: <span>{{ Carbon\Carbon::parse($data->user->lastseen)->diffForHumans() }}</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                      <div class="modal fade" tabindex="-1" id="buy-{{$data->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buy Fron {{$data->user->username}} </h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>

                <div class="modal-body">


                    <div class="note note-plane note-info"><em class="fas fa-info-circle"></em><code><p>Please note that {{$basic->sitename}} will not be liable to any loss incurred from trading outside the {{$basic->sitename}} market place.</p></code></div>

                    <form method="POST" class="form-validate is-alter" action="{{route('paymarket')}}">
                    @csrf
                    <br>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Enter Amount <small>(In USD)</small></label>
                            <div class="form-control-wrap">
                               <input name="amount" placeholder="$0.00" readonly value="{{number_format($amount, $basic->decimal)}}" class="form-control" type="number">

                                <input name="market" hidden value="{{$data->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Select Payment Method</label>
                            <div class="form-control-wrap">
                               <select class="form-control" required name="gateway">
<? $gates = DB::table('gateways')->whereCoin(0)->whereStatus(1)->where('id' ,'>' ,  99)->orderBy('name','asc')->get(); ?>

                          <option>Choose...</option>

                          @foreach($gates as $gate)
                          <option data-charge="{{$gate->percent_charge}}" value="{{$gate->id}}">{{$gate->name}}</option>
                          @endforeach
                        </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="full-name">Payment Address</label>
                            <div class="form-control-wrap">
                               <textarea name="wallet" row="3" placeholder="Enter {{App\Currency::whereId($data->coin)->first()->name}}  address" class="form-control" type="text"></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Notification</label><br><small>Seller currently have <span>$ {{number_format($data->balance, $basic->decimal)}}</span> worth of {{App\Currency::whereId($data->coin)->first()->name}} in the {{$page_title}}.</p><p>Select a payment gateway and enter your {{App\Currency::whereId($data->coin)->first()->name}}  address to proceed with your purchase. Your fund will held on am Escrow safe account for your safety.</small>

                            </ul>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Proceed</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">&copy; {{$basic->sitename}} Coin Market</span>
                </div>
            </div>
        </div>
    </div>
                                            @endforeach
                                            @endif

                                        </div>
                                        <br>
                                        {{$deal->links()}}
                                        @if(count($deal) < 1)
                                        <div class="nk-block">
                                            <div class="card card-bordered">
                                                <div class="card-inner card-inner-lg">
                                                    <div class="nk-help">
                                                        <div class="nk-help-img">
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
                                                                <path
                                                                    d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                                                                    transform="translate(0 -1)"
                                                                    fill="#6576ff"
                                                                />
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
                                                        <div class="nk-help-text">
                                                            <h5>No Offer At The Moment!</h5>
                                                            <p class="text-soft">We dont have any deal in the {{$page_title}} at the momen. Please check back later.</p>
                                                        </div>
                                                        <div class="nk-help-action"><a href="{{route('buy')}}" class="btn btn-lg btn-outline-primary">Buy From System</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    </div>
@endsection
