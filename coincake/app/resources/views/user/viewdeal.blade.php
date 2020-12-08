@extends('include.dashboard')

@section('content')
  <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                    <script>
                                            function goBack() {
                                            window.history.back();
                                            }
                                            </script>
                                        <div class="nk-block-head-sub">
                                            <a href="#" onclick="goBack()" class="text-soft back-to"><em class="icon ni ni-arrow-left"> </em><span>Go Back</span></a>
                                        </div>
                                        <div class="nk-block-between-md g-4">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title fw-normal">Order ID - {{$deal->trx}}</h4>
                                                <div class="nk-block-des">
                                                    <p>Order Status @if($deal->status  == 1)<span class="badge badge-outline badge-warning">Pending</span>

                                                    @elseif($deal->status == 2)
                                                    <span class="badge badge-outline badge-success">Approved</span>
                                                    @elseif($deal->status == 3)
                                                    <span class="badge badge-outline badge-danger">Rejected</span>
                                                    @else
                                                    <span class="badge badge-outline badge-secondary">Unprocessed</span>
                                                    @endif</p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content">
                                                <ul class="nk-block-tools gx-3">
                                                 @if($deal->status == 1)
                                                    <li class="order-md-last">
                                                        <a href="#" class="btn btn-danger btn-dim"  data-toggle="modal" data-target="#reject-coin"  ><em class="icon ni ni-cross"></em> <span>Reject</span> </a>
                                                    </li>

                                                    <li class="order-md-last">
                                                        <a href="#" data-toggle="modal" data-target="#approve-coin"  class="btn btn-success btn-dim"><em class="icon ni ni-check"></em> <span>Approve</span> </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#receive-coin"  class="btn btn-icon btn-primary btn-dim"><em class="icon ni ni-qr"></em> Send {{isset(App\Currency::whereId($deal->coin)->first()->name) ? App\Currency::whereId($deal->coin)->first()->name  : 'N/A'}} &nbsp;</a>
                                                    </li>
                                                     @endif
                                                      @if($deal->status == 2)
                                                      <li>
                                                        <a href="#" data-toggle="modal" data-target="#sendmessage"  class="btn btn-icon btn-primary btn-dim"><em class="icon ni ni-mail"></em> Send Message To Buyer &nbsp;</a>
                                                    </li>
                                                    @endif


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                                    @if($deal->status == 2 && $deal->buyer_reply < 1)
                                                        <div class="example-alert">
                                                            <div class="alert alert-primary alert-icon">
                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <strong>Order has been approved by you</strong>. please wait while buyer approve the receipt of your sent {{isset(App\Currency::whereId($deal->coin)->first()->name) ? App\Currency::whereId($deal->coin)->first()->name  : 'N/A'}}. </div>
                                                        </div>

                                                          @elseif($deal->status == 2 && $deal->buyer_reply == 1)
                                                        <div class="example-alert">
                                                            <div class="alert alert-success alert-icon">
                                                           <em class="icon ni ni-alert-circle"></em> <strong>Deal has been approved by buyer</strong>. This deal has been approved by the buyer. </div>
                                                        </div>


                                                    @elseif($deal->status == 3)
                                                     <div class="example-alert">
                                                            <div class="alert alert-warning alert-icon">
                                                                <em class="icon ni ni-alert-circle"></em> <strong>You have declined this order</strong>. Please contact the admin for complaint or clarifications. </div>
                                                        </div>

                                                    @elseif($deal->buyer_reply == 2)
                                                     <div class="example-alert">
                                                            <div class="alert alert-danger alert-icon">
                                                                <em class="icon ni ni-alert-circle"></em> <strong>Deal Disputed</strong>.The buyer has disputed this deal. Please contact the admin for complaint or clarifications. </div>
                                                        </div>
                                                    @endif

                                                        <br>

                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="row gy-gs">
                                                <div class="col-md-6">
                                                    <div class="nk-iv-wg3">
                                                        <div class="nk-iv-wg3-group flex-lg-nowrap gx-4">
                                                            <div class="nk-iv-wg3-sub">
                                                                <div class="nk-iv-wg3-amount"><div class="number">${{number_format($deal->amount, $basic->decimal)}}</div></div>
                                                                <div class="nk-iv-wg3-subtitle">Amount Paid</div>
                                                            </div>
                                                            <div class="nk-iv-wg3-sub">
                                                                <span class="nk-iv-wg3-plus text-soft"> </span>
                                                                <div class="nk-iv-wg3-amount">
                                                                    <div class="number"><span class="number-down">{{$basic->escrow}} %</span> ${{number_format($commission, $basic->decimal)}} </div>
                                                                </div>
                                                                <div class="nk-iv-wg3-subtitle">Our Commission</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-4 offset-lg-2">
                                                    <div class="nk-iv-wg3 pl-md-3">
                                                        <div class="nk-iv-wg3-group flex-lg-nowrap gx-4">
                                                            <div class="nk-iv-wg3-sub">
                                                                <div class="nk-iv-wg3-amount">
                                                                    <div class="number">
                                                                        ${{number_format($deal->amount-$commission, $basic->decimal)}}  <em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="Total amount - commission"></em>
                                                                    </div>
                                                                </div>
                                                                <div class="nk-iv-wg3-subtitle">Total Return</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="schemeDetails" class="nk-iv-scheme-details">
                                            <ul class="nk-iv-wg3-list">
                                                <li>
                                                    <div class="sub-text">Buyer</div>
                                                    <div class="lead-text">{{isset(App\User::whereId($deal->buyer)->first()->username) ? App\User::whereId($deal->buyer)->first()->username  : 'N/A'}}</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Email</div>
                                                    <div class="lead-text">{{isset(App\User::whereId($deal->buyer)->first()->email) ? substr(App\User::whereId($deal->buyer)->first()->email, 0, 5)  : 'N/A'}}.....</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Phone Number</div>
                                                    <div class="lead-text">{{isset(App\User::whereId($deal->buyer)->first()->phone) ? substr(App\User::whereId($deal->buyer)->first()->phone, 0, 5)  : 'N/A'}}.....</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Country</div>
                                                    <div class="lead-text">{{isset(App\User::whereId($deal->buyer)->first()->email) ? App\User::whereId($deal->buyer)->first()->country  : 'N/A'}}</div>
                                                </li>
                                            </ul>
                                            <ul class="nk-iv-wg3-list">
                                                <li>
                                                    <div class="sub-text">Ordered date</div>
                                                    <div class="lead-text">{!! date('D, d/M, Y', strtotime($deal->created_at)) !!}</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Order Time</div>
                                                    <div class="lead-text">{!! date('h:m A', strtotime($deal->created_at)) !!}</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Order ID</div>
                                                    <div class="lead-text">{{$deal->trx}}</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Order Type</div>
                                                    <div class="lead-text">{{isset(App\Currency::whereId($deal->coin)->first()->name) ? App\Currency::whereId($deal->coin)->first()->name  : 'N/A'}}</div>
                                                </li>
                                            </ul>
                                            <ul class="nk-iv-wg3-list">
                                                <li>
                                                    <div class="sub-text">Amount Paid</div>
                                                    <div class="lead-text"><span class="currency currency-usd">$</span> {{number_format($deal->amount, $basic->decimal)}}</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Commission</div>
                                                    <div class="lead-text"><span class="currency currency-usd">{{$basic->escrow}}</span> %</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Deduction</div>
                                                    <div class="lead-text"><span class="currency currency-usd">$</span> {{number_format($commission, $basic->decimal)}}</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Total return</div>
                                                    <div class="lead-text"><span class="currency currency-usd">$</span> {{number_format($deal->amount-$commission, $basic->decimal)}}</div>
                                                </li>

                                            </ul>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>





<div class="modal fade" tabindex="-1" role="dialog" id="receive-coin"><div class="modal-dialog modal-dialog-centered modal-md" role="document"><div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a><div class="modal-body modal-body-lg"><div class="nk-block-head nk-block-head-xs text-center"><h5 class="nk-block-title">Transfer {{isset(App\Currency::whereId($deal->coin)->first()->name) ? App\Currency::whereId($deal->coin)->first()->name  : 'N/A'}}</h5></div><div class="nk-block"><div class="buysell-overview">

<div class="sub-text-sm">* Send USD{{number_format($deal->amount, $basic->decimal)}} worth of {{isset(App\Currency::whereId($deal->coin)->first()->symbol) ? App\Currency::whereId($deal->coin)->first()->symbol  : 'N/A'}} to the buyer's <a href="#">{{isset(App\Currency::whereId($deal->coin)->first()->name) ? App\Currency::whereId($deal->coin)->first()->name  : 'N/A'}}</a> wallet address below. You can click on copy button below to copy wallet address or scan QR code to get wallet address. <br><b>Please click on the approve button when you have successfully sent {{isset(App\Currency::whereId($deal->coin)->first()->name) ? App\Currency::whereId($deal->coin)->first()->name  : 'N/A'}}. Your fund will be remitted once buyer confirms the transaction from his/her end</b></div></div>

<center>
<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{$deal->wallet}}&choe=UTF-8\" title='QR Code' style='width:200px;' />
</center>
<div class="buysell-field form-group">


<div class="form-label-group"><label class="form-label"></label><a href="#" class="link">&copy {{isset(App\Currency::whereId($deal->coin)->first()->name) ? App\Currency::whereId($deal->coin)->first()->name  : 'N/A'}} Wallet Address</a></div>

<div class="nk-refwg-url"><div class="form-control-wrap"><div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span></div><div class="form-icon"><em class="icon ni ni-link-alt"></em></div><input type="text" class="form-control copy-text" id="refUrl" value="{{$deal->wallet}}"></div></div></div>





</div><div class="pt-3"><a href="#" data-dismiss="modal" class="btn btn-outline btn-danger">Cancel</a></div></div></div></div></div></div></div>




  <div class="modal fade" tabindex="-1" id="approve-coin">

             <form method="post"  class="buysell-form" action="{{ route('approvemarketsale', $deal->trx) }}"  enctype="multipart/form-data">
             @csrf
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-md">
                            <h4 class="nk-modal-title title">Approve Transaction</h4>
                            <p><strong>Are you sure you want to approve {{isset(App\User::whereId($deal->buyer)->first()->username) ? App\User::whereId($deal->buyer)->first()->username  : 'N/A'}}'s transaction ?</strong></p>
                            <p>If you approve, the buyer will be notified and will have to approve you truly sent the {{isset(App\Currency::whereId($deal->coin)->first()->name) ? App\Currency::whereId($deal->coin)->first()->name  : 'N/A'}} .</p>
                            <div class="form">


                                      <div class="form-label-group"><label class="form-label" for="buysell-amount">Transaction Screenshot</label></div><div class="custom-file">
                                                                        <input type="file" multiple class="custom-file-input" name="image" accept="image/*" id="customFile">
                                                                        <label class="custom-file-label" for="customFile">Select Photo</label>
                                    </div>
                                    <div class="form-note"><span>Upload a screenshot of your transaction</span></div>

                                     <div class="form-group">
                                     <br>
                                    <label class="form-label">Transaction Number </label>
                                    <div class="form-control-wrap"><input type="text" name="trx" class="form-control" placeholder="TRX ID" /></div>
                                    <div class="form-note"><span>Enter Transaction Hash If Any</span></div>
                                </div>


                                <div class="form-group">
                                    <label class="form-label">Enter your password to confirm approval</label>
                                    <div class="form-control-wrap"><input type="password" name="password" class="form-control" placeholder="*********" /></div>
                                    <div class="form-note"><span>Buyer will receive email once you approved order</span></div>
                                </div>
                                <ul class="align-center flex-wrap g-3">
                                    <li><button class="btn btn-primary" type="submit">Approve</button></li>
                                    <li><a href="#" class="btn btn-light" data-dismiss="modal">Never mind, don't approve</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
             </div>

        <div class="modal fade" tabindex="-1" id="reject-coin">

             <form method="post"  class="buysell-form" action="{{ route('rejectmarketsale', $deal->trx) }}">
             @csrf
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-md">
                            <h4 class="nk-modal-title title">Reject Buyer's Transaction</h4>
                           <p><strong>Are you sure you want to reject {{isset(App\User::whereId($deal->buyer)->first()->username) ? App\User::whereId($deal->buyer)->first()->username  : 'N/A'}}'s transaction ?</strong></p>
                            <p>If you reject, the buyer will be notified and will have to log a dispute if otherwise.</p>
                            <div class="form">
                                <div class="form-group">
                                    <label class="form-label">Enter your password to confirm rejection</label>
                                    <div class="form-control-wrap"><input type="password" name="password" class="form-control" placeholder="*********" /></div>
                                    <div class="form-note"><span>Buyer will receive email once you reject order.</span></div>
                                </div>
                                <ul class="align-center flex-wrap g-3">
                                    <li><button class="btn btn-primary" type="submit">Reject</button></li>
                                    <li><a href="#" class="btn btn-light" data-dismiss="modal">Never mind, don't reject</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
             </div>


               <div class="modal fade" tabindex="-1" id="sendmessage">

             <form method="post"  class="buysell-form" action="{{ route('messagebuyer', $deal->trx) }}">
             @csrf
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-md">
                            <h4 class="nk-modal-title title">Send Message</h4>
                           <p><strong>You seem to have approved {{isset(App\User::whereId($deal->buyer)->first()->username) ? App\User::whereId($deal->buyer)->first()->username  : 'N/A'}}'s transaction.</strong></p>
                            <p>Proceed to send a message to buyer to initiate swift approval of your transaction.</p>
                            <div class="form">
                            <div class="form-group">
                                    <label class="form-label">Subject</label>
                                    <div class="form-control-wrap"><input   type="text" name="subject" class="form-control" placeholder="Enter Subject" /></div>

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Message</label>
                                    <div class="form-control-wrap"><textarea row="5" type="text" name="details" class="form-control" placeholder="Enter Body Of Message" /></textarea></div>

                                </div>
                              <div class="form-group">
                                    <label class="form-label">Upload File</label>
                                    <div class="form-control-wrap"><div class="custom-file">
                                                                        <input type="file" multiple class="custom-file-input" name="image" accept="image/*" id="customFile">
                                                                        <label class="custom-file-label" for="customFile">Select Photo</label>
                                    </div></div>
                                    <div class="form-note"><span>You can upload an image or screenshot of your successful transaction</span></div>
                                </div>
                                <ul class="align-center flex-wrap g-3">
                                    <li><button class="btn btn-primary" type="submit">Send Message</button></li>
                                    <li><a href="#" class="btn btn-light" data-dismiss="modal">Never mind, don't reject</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
             </div>

@endsection
