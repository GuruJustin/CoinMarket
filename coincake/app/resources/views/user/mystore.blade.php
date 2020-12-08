@extends('include.dashboard')

@section('content')
 <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                                        <div class="nk-block-head wide-md nk-block-head-lg">

                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title fw-normal">{{$page_title}}</h4>
                                                <p>Here is a list of your {{$page_title}}s on the {{$basic->sitename}} market place</p>
                                                <div class="nk-search-box">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                         <form method="post"  class="buysell-form" action="{{ route('searchmarket') }}">
                                                         @csrf
                                                            <input type="text" name="code" class="form-control form-control-lg" placeholder="Search By Marker Code..." /><button class="form-icon form-icon-right"><em class="icon ni ni-search"></em></button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-block">
                                        @if(count($deal) > 0)
                                        @foreach($deal as $data)
                                            <div class="support-topic-item card card-bordered">
                                                <a class="support-topic-block card-inner" href="{{ route('viewstore', $data->code) }}">
                                                    <div class="support-topic-media">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                            <path d="M29,74H11a7,7,0,0,1-7-7V17a7,7,0,0,1,7-7H61a7,7,0,0,1,7,7V30" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <path d="M11,11H61a6,6,0,0,1,6,6v4a0,0,0,0,1,0,0H5a0,0,0,0,1,0,0V17A6,6,0,0,1,11,11Z" fill="#e3e7fe" />
                                                            <circle cx="11" cy="16" r="2" fill="#6576ff" />
                                                            <circle cx="17" cy="16" r="2" fill="#6576ff" />
                                                            <circle cx="23" cy="16" r="2" fill="#6576ff" />
                                                            <rect x="11" y="27" width="19" height="19" rx="1" ry="1" fill="#c4cefe" />
                                                            <path d="M33.8,53.79c.33-.43.16-.79-.39-.79H12a1,1,0,0,0-1,1V64a1,1,0,0,0,1,1H31a1,1,0,0,0,1-1V59.19a10.81,10.81,0,0,1,.23-2Z" fill="#c4cefe" />
                                                            <line x1="36" y1="29" x2="60" y2="29" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="36" y1="34" x2="55" y2="34" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="36" y1="39" x2="50" y2="39" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="36" y1="44" x2="46" y2="44" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <rect x="4" y="21" width="64" height="2" fill="#6576ff" />
                                                            <rect x="36" y="56" width="38" height="24" rx="5" ry="5" fill="#fff" stroke="#e3e7fe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <rect x="41" y="60" width="12" height="9" rx="1" ry="1" fill="#c4cefe" />
                                                            <path
                                                                d="M84.74,53.51,66.48,35.25a4.31,4.31,0,0,0-6.09,0l-9.13,9.13a4.31,4.31,0,0,0,0,6.09L69.52,68.73a4.31,4.31,0,0,0,6.09,0l9.13-9.13A4.31,4.31,0,0,0,84.74,53.51Zm-15-5.89L67,50.3a2.15,2.15,0,0,1-3,0l-4.76-4.76a2.16,2.16,0,0,1,0-3l2.67-2.67a2.16,2.16,0,0,1,3,0l4.76,4.76A2.15,2.15,0,0,1,69.72,47.62Z"
                                                                fill="#6576ff"
                                                            />
                                                        </svg>
                                                    </div>
                                                    <div class="support-topic-context">
                                                        <h5 class="support-topic-title title">{{App\Currency::whereId($data->coin)->first()->name}} Market
                                                      <small> <span> (Code: {{$data->code}})</span></small></h5>
                                                        <div class="support-topic-info">Created: {{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</div>
                                                         @php
                                                         $count = \App\Coinmarketpay::whereSeller(Auth::user()->id)->whereMarketcode($data->code)->whereStatus(1)->count();
                                                         @endphp
                                                        <div class="support-topic-count">You have {{$count}} pending orders/deals.</div>
                                                    </div>
                                                    <div class="support-topic-action"><em class="icon ni ni-chevron-right"></em></div>
                                                </a>
                                            </div>
                                            @endforeach
                                            @else


                                            <div class="support-topic-item card card-bordered">
                                                <a class="support-topic-block card-inner" href="{{route('sellonmarket')}}">
                                                    <div class="support-topic-media">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                            <path
                                                                d="M63.42,87H10.58A4.08,4.08,0,0,1,6.5,82.92V7.08A4.08,4.08,0,0,1,10.58,3H48.32L67.5,21.23V82.92A4.08,4.08,0,0,1,63.42,87ZM47.5,3V16.92A4,4,0,0,0,51.38,21H66.5"
                                                                fill="#fff"
                                                                stroke="#6576ff"
                                                                stroke-linecap="round"
                                                                stroke-miterlimit="10"
                                                                stroke-width="2"
                                                            />
                                                            <circle cx="63.5" cy="67" r="20" fill="#6576ff" />
                                                            <path
                                                                d="M61.87,71a6.83,6.83,0,0,1,.39-2.55,6.71,6.71,0,0,1,1.51-2.09,11.82,11.82,0,0,0,1.44-1.61,2.92,2.92,0,0,0,.47-1.59,2.47,2.47,0,0,0-.55-1.72,2,2,0,0,0-1.58-.6,2.22,2.22,0,0,0-1.61.59A2,2,0,0,0,61.33,63H58.5a4.39,4.39,0,0,1,1.4-3.37,5.27,5.27,0,0,1,3.65-1.24,5.09,5.09,0,0,1,3.64,1.23,4.48,4.48,0,0,1,1.31,3.43,5.69,5.69,0,0,1-1.77,3.86L65.3,68.37A4.08,4.08,0,0,0,64.51,71Zm-.3,3.17A1.6,1.6,0,0,1,62,73,1.69,1.69,0,0,1,65,74.17a1.65,1.65,0,0,1-.44,1.17,1.67,1.67,0,0,1-1.26.46A1.62,1.62,0,0,1,62,75.34,1.65,1.65,0,0,1,61.57,74.17Z"
                                                                fill="#fff"
                                                            />
                                                            <circle cx="17" cy="21.5" r="4.5" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <line x1="28.5" y1="20" x2="36.5" y2="20" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <line x1="28.5" y1="24" x2="43.5" y2="24" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <circle cx="17" cy="39.5" r="4.5" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <line x1="28.5" y1="37" x2="36.5" y2="37" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <line x1="28.5" y1="42" x2="43.5" y2="42" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <circle cx="17" cy="56.5" r="4.5" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <line x1="28.5" y1="54" x2="36.5" y2="54" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <line x1="28.5" y1="59" x2="43.5" y2="59" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                        </svg>
                                                    </div>
                                                  <div class="support-topic-context">
                                                        <h5 class="support-topic-title title">No {{$page_title}}</h5>
                                                        <div class="support-topic-info">You dont have any deal in the market at the moment.</div>
                                                        <div class="support-topic-count">Please proceed to create a new order</div>
                                                    </div>
                                                    <div class="support-topic-action"><em class="icon ni ni-chevron-right"></em></div>
                                                </a>
                                            </div>
                                            @endif
                                        <br>
                                        {{$deal->links()}}
                                        </div>

                                        <div class="nk-block nk-block-lg">
                                            <div class="card card-bordered border-primary">
                                                <div class="card-inner">
                                                    <div class="nk-cta">
                                                        <div class="nk-cta-block">
                                                            <div class="nk-cta-img"><em class="icon icon-circle ni ni-msg"></em></div>
                                                            <div class="nk-cta-text"><p>If you have any complaint relating to the market place, please contact our support team.</p></div>
                                                        </div>
                                                        <div class="nk-cta-action"><a href="{{route('ticket')}}" class="btn btn-primary">Contact Us</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

@endsection
