@extends('include.admindashboard')

@section('body')
 <div class="page-content">
    <div class="container">
        <div class="card content-area">
            <div class="card-innr card-innr-fix">
                <div class="card-head d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">TRX ID <em class="ti ti-angle-right fs-14"></em> <small class="tnx-id">{{$data->trx}}</small></h4>
                    <div class="d-flex align-items-center guttar-20px">


                        <div class="relative d-inline-block">
                            <a href="#" class="btn btn-dark btn-sm btn-icon toggle-tigger"><em class="ti ti-more-alt"></em></a>
                            <div class="toggle-class dropdown-content dropdown-content-top-left">
                                <ul class="dropdown-list more-menu-5">
                                    <li><a  href="{{route('dealapp',$data->id)}}" ><em class="fas fa-shield-alt"></em>Approve & Pay Seller</a></li>
                                    <li><a href="{{route('dealrej',$data->id)}}" class="user-action"><em class="fas fa-ban"></em>Reject Deal</a></li>

                                                                                                        </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gaps-1-5x"></div>
                <div class="data-details d-md-flex">
                    <div class="fake-class">
                        <span class="data-details-title">Amount Paid</span>
                        <span class="data-details-info large">{{$basic->currency_sym}}{{number_format($data->amount*$basic->rate, $basic->decimal)}} </span>
                    </div>
                    <div class="fake-class">
                        <span class="data-details-title">Amount Disburse</span>
                        @php
                        $perc = $data->amount*$basic->escrow/100;
                        $comm = $perc*$basic->rate;
                        @endphp
                        <span class="data-details-info large">{{$basic->currency_sym}}{{number_format($data->amount*$basic->rate-$comm, $basic->decimal)}} <small>(Total - {{$basic->escrow}}%)</small></span>
                    </div>
                    <div class="status_user fake-class">
                        <span class="data-details-title">Admin Payment</span>
                        @if($data->paid < 1)
                        <span class="badge badge-warning ucap">Uncleared</span>

                        @elseif($data->paid == 2)
                        <span class="badge badge-danger ucap">Rejected</span>
                        @else
                        <span class="badge badge-success ucap">Cleared & Paid</span>
                        @endif
                    </div>
                    <ul class="data-vr-list">
                         @if($data->buyer_reply < 1)
                        <li><div class="data-state data-state-sm data-state-approved"></div> Buyer Verify</li>
                         @elseif($data->buyer_reply == 1)
                        <li><div class="data-state data-state-sm data-state-pending"></div> Buyer Verify</li>
                         @elseif($data->buyer_reply == 2)
                        <li><div class="data-state data-state-sm data-state-canceled"></div> Buyer Verify</li>
                        @endif

                         @if($data->status == 1)
                        <li><div class="data-state data-state-sm data-state-pending"></div> Seller Verify</li>
                         @elseif($data->status == 2)
                        <li><div class="data-state data-state-sm data-state-approved"></div> Seller Verify</li>
                         @elseif($data->status == 3)
                        <li><div class="data-state data-state-sm data-state-canceled"></div> Seller Verify</li>
                        @endif
                                            </ul>
                </div>
                <div class="gaps-3x"></div>
                <h6 class="card-sub-title">Buyer Information</h6>
                <ul class="data-details-list">
                    <li>
                        <div class="data-details-head">Full Name</div>
                        <div class="data-details-des">{{isset(App\User::whereId($data->buyer)->first()->username) ? App\User::whereId($data->buyer)->first()->fname  : 'N/A'}} {{isset(App\User::whereId($data->buyer)->first()->username) ? App\User::whereId($data->buyer)->first()->lname  : 'N/A'}}</div>
                    </li>
                    <li>
                        <div class="data-details-head">Email Address</div>
                        <div class="data-details-des">{{isset(App\User::whereId($data->buyer)->first()->username) ? App\User::whereId($data->buyer)->first()->email  : 'N/A'}}</div>
                    </li>
                    <li>
                        <div class="data-details-head">Mobile Number</div>
                        <div class="data-details-des">{{isset(App\User::whereId($data->buyer)->first()->username) ? App\User::whereId($data->buyer)->first()->phone  : 'N/A'}}</div>
                    </li>
                    <li>
                        <div class="data-details-head">Date of Birth</div>
                        <div class="data-details-des">{{isset(App\User::whereId($data->buyer)->first()->username) ? App\User::whereId($data->buyer)->first()->dob  : 'N/A'}}</div>
                    </li>
                    <li>
                        <div class="data-details-head">Nationality</div>
                        <div class="data-details-des">{{isset(App\User::whereId($data->buyer)->first()->username) ? App\User::whereId($data->buyer)->first()->country  : 'N/A'}}</div>
                    </li>
                    <li>
                        <div class="data-details-head">Deposit Balance</div>
                        <div class="data-details-des">
                            <span>
                                <small class="text-light">{{$basic->currency_sym}}{{isset(App\User::whereId($data->buyer)->first()->username) ? App\User::whereId($data->buyer)->first()->balance  : 'N/A'}} </small>

                            </span>
                        </div>
                    </li>
                </ul>
                <div class="gaps-3x"></div>
                <h6 class="card-sub-title">Seller's Information</h6>
                <ul class="data-details-list">
                    <li>
                        <div class="data-details-head">Full Name</div>
                        <div class="data-details-des">{{isset(App\User::whereId($data->seller)->first()->username) ? App\User::whereId($data->seller)->first()->fname  : 'N/A'}} {{isset(App\User::whereId($data->seller)->first()->username) ? App\User::whereId($data->seller)->first()->lname  : 'N/A'}}</div>
                    </li>
                    <li>
                        <div class="data-details-head">Email Address</div>
                        <div class="data-details-des">{{isset(App\User::whereId($data->seller)->first()->username) ? App\User::whereId($data->seller)->first()->email  : 'N/A'}}</div>
                    </li>
                    <li>
                        <div class="data-details-head">Bank Name</div>
                        <div class="data-details-des">{{isset(App\User::whereId($data->seller)->first()->username) ? App\User::whereId($data->seller)->first()->bank  : 'N/A'}}</div>
                    </li>
                     <li>
                        <div class="data-details-head">Account Name</div>
                        <div class="data-details-des">{{isset(App\User::whereId($data->seller)->first()->username) ? App\User::whereId($data->seller)->first()->accountno  : 'N/A'}}</div>
                    </li>
                    <li>
                        <div class="data-details-head">Account Number</div>
                        <div class="data-details-des">{{isset(App\User::whereId($data->seller)->first()->username) ? App\User::whereId($data->seller)->first()->accountname  : 'N/A'}}</div>
                    </li>
                    <li>
                        <div class="data-details-head">Deposit Balance</div>
                        <div class="data-details-des">
                            <span>
                                <small class="text-light">{{$basic->currency_sym}}{{isset(App\User::whereId($data->seller)->first()->username) ? App\User::whereId($data->seller)->first()->balance  : 'N/A'}} </small>

                            </span>
                        </div>
                    </li>
                </ul>


                 <div class="gaps-3x"></div>
                <h6 class="card-sub-title">Transaction Detail</h6>
                <ul class="data-details-list">
                    <li>
                        <div class="data-details-head">Amount Paid</div>
                        <div class="data-details-des">{{$basic->currency_sym}}{{number_format($data->amount*$basic->rate, $basic->decimal)}}</div>
                    </li>
                    <li>
                        <div class="data-details-head">Amount in USD</div>
                        <div class="data-details-des">${{number_format($data->amount, $basic->decimal)}}</div>
                    </li>
                    <li>
                        <div class="data-details-head">Payment Gateway</div>
                        <div class="data-details-des">{{isset(App\Gateway::whereId($data->gateway)->first()->name) ? App\Gateway::whereId($data->gateway)->first()->name : 'N/A'}}</div>
                    </li>
                     <li>
                        <div class="data-details-head">Payment ID</div>
                        <div class="data-details-des">{{isset($data->payment_id) ? $data->payment_id  : 'N/A'}}</div>
                    </li>

                </ul>




                 <div class="gaps-3x"></div>
                <h6 class="card-sub-title">Seller's Transfer Details</h6>
                <ul class="data-details-list">
                    <li>
                        <div class="data-details-head">Transfer Hash</div>
                        <div class="data-details-des">{{isset($data->hashtrx) ? $data->hashtrx  : 'N/A'}}</div>
                    </li>
                    <li>
                         @if($data->image)
                                 <div class="data-details-head">
                                    <span class="sub-text">Payment Screenshot</span><span class="caption-text align-center"><img src="{{asset('market/'.$data->image)}}" wdith="70" alt="passport"></span>
                                </div>
                                @endif
                    </li>


                </ul>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="EmailUser" tabindex="-1">
    <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
        <div class="modal-content">
            <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body popup-body-lg">
                <h3 class="popup-title">Send Email to User </h3>
                <div class="msg-box"></div>
                <form id="emailToUser" action="http://localhost/tokenlite/admin/ajax/users/email/send" method="POST" autocomplete="off">
                    <input type="hidden" name="_token" value="YOReEHSQmbXGcc0tuFsW6fdew70iGqU6JKH233ew">                    <input type="hidden" name="user_id" id="user_id">
                    <div class="input-item input-with-label">
                        <label class="clear input-item-label">Subject</label>
                        <input type="text" name="subject" class="input-bordered cls " placeholder="Email Subject">
                        <span class="input-note">If blank It's will replace with default from EMail Template</span>
                    </div>
                    <div class="input-item input-with-label">
                        <label class="clear input-item-label">Greeting</label>
                        <input type="text" name="greeting" class="input-bordered cls " placeholder="Email Greeting">
                        <span class="input-note">If blank It's will replace with default from EMail Template</span>
                    </div>
                    <div class="input-item input-with-label">
                        <label class="clear input-item-label">Message</label>
                        <textarea required="required" name="message" class="input-bordered cls input-textarea input-textarea-sm" type="text" placeholder="Write something..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
