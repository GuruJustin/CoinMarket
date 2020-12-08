@extends('include.dashboard')
@section('content')
    <div class="nk-content">
                        <div class="container-fluid">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <div class="nk-block-head nk-block-head-sm">
                                        <div class="nk-block-between g-3">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title page-title">Purchase Log</h4>
                                                @php
                                                 $count = \App\Coinmarketpay::where('status','=' , '2')->whereBuyer(Auth::user()->id)->count();
                                                 @endphp
                                                <div class="nk-block-des text-soft"><p>You have a total of {{$count}} Successful Purchase(s)</p></div>
                                            </div>
                                            <div class="nk-block-head-content">
                                                <div class="toggle-wrap nk-block-tools-toggle">
                                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                    <div class="toggle-expand-content" data-content="pageMenu">
                                                        <ul class="nk-block-tools g-3">
                                                            <li>
                                                                <a href="#" class="btn btn-white btn-dim btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <div class="card card-bordered card-stretch">
                                            <div class="card-inner-group">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title"><h5 class="title">All Purchase</h5></div>
                                                        <div class="card-tools mr-n1">
                                                            <ul class="btn-toolbar gx-1">
                                                                <li>
                                                                    <a href="#" class="search-toggle toggle-search btn btn-icon" data-target="search"><em class="icon ni ni-search"></em></a>
                                                                </li>
                                                                <li class="btn-toolbar-sep"></li>

                                                            </ul>
                                                        </div>
                                                        <div class="card-search search-wrap" data-search="search">
                                                            <div class="search-content">
                                                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Quick search by transaction" />
                                                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-inner p-0">
                                                    <div class="nk-tb-list nk-tb-tnx">
                                                        <div class="nk-tb-item nk-tb-head">
                                                            <div class="nk-tb-col"><span>Details</span></div>
                                                            <div class="nk-tb-col tb-col-xxl"><span>Source</span></div>
                                                            <div class="nk-tb-col"><span>Order ID</span></div>
                                                            <div class="nk-tb-col text-right"><span>Amount</span></div>
                                                            <div class="nk-tb-col text-right tb-col-sm"><span>Date</span></div>
                                                            <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Type</span></div>
                                                            <div class="nk-tb-col nk-tb-col-tools"></div>
                                                        </div>
                                                        @if(count($trx) >0)
                                                         @foreach($trx as $k=>$data)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <div class="nk-tnx-type">
                                                                    @if($data->buyer_reply == 1)
                                                                   <div class="nk-tnx-type-icon bg-success-dim text-success">
                                                                    <em class="icon ni ni-wallet"></em>
                                                                    @elseif($data->buyer_reply < 1)
                                                                    <div class="nk-tnx-type-icon bg-warning-dim text-warning">
                                                                    <em class="icon ni ni-alert"></em>
                                                                    @elseif($data->status == 2)


                                                                    <div class="nk-tnx-type-icon bg-danger-dim text-danger">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    @endif

                                                                    </div>
                                                                    <div class="nk-tnx-type-text"><span class="tb-lead">{{isset(App\Currency::whereId($data->coin)->first()->name) ? App\Currency::whereId($data->coin)->first()->name : 'N/A'}}</span><span class="tb-date">{{ Carbon\Carbon::parse($data->updated_at)->diffForHumans() }}</span></div>
                                                                </div>
                                                            </div>
                                                             <div class="nk-tb-col tb-col-dlg"><span class="tb-lead">{{isset($data->trx ) ? $data->trx  : 'N/A'}}</span>



                                                                     @if($data->buyer_reply == 1)
                                                                   <span class="badge badge-dot badge-success">Successful</span></div>
                                                                    @elseif($data->buyer_reply < 1)
                                                                    <span class="badge badge-dot badge-warning">Pending</span></div>
                                                                    @elseif($data->buyer_reply == 2)


                                                                    <span class="badge badge-dot badge-danger">Disputed</span></div>
                                                                    @endif

                                                            <div class="nk-tb-col text-right">
                                                                <span class="tb-amount">{{$basic->currency_sym}}{{number_format($data->amount, $basic->decimal)}}</span><span class="tb-amount-sm">${{number_format($data->amount/$basic->rate, $basic->decimal)}}</span>
                                                            </div>
                                                            <div class="nk-tb-col text-right tb-col-sm">
                                                                <span class="tb-amount">{!! date(' d/M/Y', strtotime($data->created_at)) !!}<span></span></span><span class="tb-amount-sm">{{$data->updated_at}}</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-status">
                                                                <div class="dot dot-success d-md-none"></div>

                                                                   <span class="badge badge-sm badge-dim badge-outline-info d-none d-md-inline-flex">Purchase</span>





                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-2">

                                                                     @if($data->buyer_reply == 2)
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#approve{{$data->id}}" data-toggle="modal" class="bg-white btn btn-sm btn-success btn-dim btn-icon btn-tooltip" title="Approve"><em class="icon ni ni-check"></em></a>
                                                                    </li>
                                                                     @elseif($data->buyer_reply < 1)
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#approve{{$data->id}}" data-toggle="modal" class="bg-white btn btn-sm btn-success btn-dim btn-icon btn-tooltip" title="Approve"><em class="icon ni ni-check"></em></a>
                                                                    </li>

                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#reject{{$data->id}}" data-toggle="modal" class="bg-white btn btn-sm btn-danger btn-dim btn-icon btn-tooltip" title="Reject"><em class="icon ni ni-trash"></em></a>
                                                                    </li>
                                                                    @endif

                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#tranxDetails{{$data->id}}" data-toggle="modal" class="bg-white btn btn-sm btn-info btn-dim btn-icon btn-tooltip" title="Details"><em class="icon ni ni-eye"></em></a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>





                                                        <div class="modal fade" tabindex="-1" id="approve{{$data->id}}">

             <form method="post"  class="buysell-form" action="{{ route('approvemarketsale2', $data->trx) }}">
             @csrf
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-md">
                            <h4 class="nk-modal-title title">Approve  Receipt</h4>
                            <p><strong>Are you sure you want to approve {{isset(App\User::whereId($data->seller)->first()->username) ? App\User::whereId($data->seller)->first()->username  : 'N/A'}}'s transaction ?</strong></p>
                            <p>If you approve, that means you have received {{isset(App\Currency::whereId($data->coin)->first()->name) ? App\Currency::whereId($data->coin)->first()->name : 'N/A'}} from seller ({{isset(App\User::whereId($data->seller)->first()->username) ? App\User::whereId($data->seller)->first()->username  : 'N/A'}}) .</p>
                            <div class="form">
                                <div class="form-group">
                                    <label class="form-label">Enter your password to confirm Approval</label>
                                    <div class="form-control-wrap"><input type="password" name="password" class="form-control" placeholder="*********" /></div>
                                    <div class="form-note"><span>Seller will receive email once you approved order</span></div>
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

        <div class="modal fade" tabindex="-1" id="reject{{$data->id}}">

             <form method="post"  class="buysell-form" action="{{ route('rejectmarketsale2', $data->trx) }}">
             @csrf
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-md">
                            <h4 class="nk-modal-title title">Dispute Seller's Transaction</h4>
                           <p><strong>Are you sure you want to reject {{isset(App\User::whereId($data->seller)->first()->username) ? App\User::whereId($data->seller)->first()->username  : 'N/A'}}'s transaction ?</strong></p>
                            <p>If you reject, that means you didn't receive any {{isset(App\Currency::whereId($data->coin)->first()->name) ? App\Currency::whereId($data->coin)->first()->name : 'N/A'}}  from the seller .</p>
                            <div class="form">
                                <div class="form-group">
                                    <label class="form-label">Enter your password to confirm rejection</label>
                                    <div class="form-control-wrap"><input type="password" name="password" class="form-control" placeholder="*********" /></div>
                                    <div class="form-note"><span>Seller will receive email once you reject order.</span></div>
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







                                                        <div class="modal fade" tabindex="-1" id="tranxDetails{{$data->id}}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-md">
                        <div class="nk-modal-head mb-3 mb-sm-5">
                            <h4 class="nk-modal-title title">Transaction <small class="text-primary">#{{$data->trx}}</small></h4>
                        </div>
                        <div class="nk-tnx-details">
                            <div class="nk-block-between flex-wrap g-3">
                                <div class="nk-tnx-type">
                                  @if($data->buyer_reply == 1)
                                                                   <div class="nk-tnx-type-icon bg-success-dim text-success">
                                                                    <em class="icon ni ni-wallet"></em>
                                                                    @elseif($data->buyer_reply < 1)
                                                                    <div class="nk-tnx-type-icon bg-warning-dim text-warning">
                                                                    <em class="icon ni ni-alert"></em>
                                                                    @elseif($data->status == 2)


                                                                    <div class="nk-tnx-type-icon bg-danger-dim text-danger">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    @endif
                                </div>
                                    <div class="nk-tnx-type-text">
                                        <h5 class="title">${{number_format($data->amount, $basic->decimal)}}</h5>
                                        <span class="sub-text mt-n1">{!! date('D, d/M, Y: h:m A', strtotime($data->created_at)) !!}</span>
                                    </div>
                                </div>
                                <ul class="align-center flex-wrap gx-3">
                                    <li>

                                     @if($data->buyer_reply == 1)
                                                                   <span class="badge badge-sm badge-success">Completed</span>
                                                                    @elseif($data->buyer_reply < 1)
                                                                    <span class="badge badge-sm badge-warning">Pending</span>
                                                                    @elseif($data->status == 2)


                                                                    <span class="badge badge-sm badge-danger">Disputed</span>
                                                                    @endif
                                    </li>
                                </ul>
                            </div>


                            <br>

                             @if($data->status == 2 && $data->buyer_reply < 1)
                                                        <div class="example-alert">
                                                            <div class="alert alert-primary alert-icon">
                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <strong>Order has been approved by seller</strong>. please approve or reject the receipt of your {{isset(App\Currency::whereId($data->coin)->first()->name) ? App\Currency::whereId($data->coin)->first()->name  : 'N/A'}}. </div>
                                                        </div>

                                                          @elseif($data->status == 2 && $data->buyer_reply == 1)
                                                        <div class="example-alert">
                                                            <div class="alert alert-success alert-icon">
                                                           <em class="icon ni ni-alert-circle"></em> <strong>You have approved this deal</strong>. We hope you love trading with the seller?. </div>
                                                        </div>


                                                    @elseif($data->status == 3)
                                                     <div class="example-alert">
                                                            <div class="alert alert-warning alert-icon">
                                                                <em class="icon ni ni-alert-circle"></em> <strong>The seller have declined this order</strong>. Please contact the admin for complaint or clarifications. </div>
                                                        </div>

                                                    @elseif($data->buyer_reply == 2)
                                                     <div class="example-alert">
                                                            <div class="alert alert-danger alert-icon">
                                                                <em class="icon ni ni-alert-circle"></em> <strong>Deal Disputed</strong>.You have disputed this deal. Please contact the admin for complaint or clarifications. </div>
                                                        </div>
                                                    @endif





                            <div class="nk-modal-head mt-sm-5 mt-4 mb-4"><h5 class="title">Transaction Info</h5></div>
                            <div class="row gy-3">
                                <div class="col-lg-6"><span class="sub-text">Currency</span><span class="caption-text">{{isset(App\Currency::whereId($data->coin)->first()->name) ? App\Currency::whereId($data->coin)->first()->name : 'N/A'}}</span></div>
                                <div class="col-lg-6"><span class="sub-text">Transaction ID</span><span class="caption-text text-break">{{$data->trx}}</span></div>
                                <div class="col-lg-6"><span class="sub-text">{{$basic->currency}} Value</span><span class="caption-text">{{$basic->currency_sym}}{{number_format($data->amount*$basic->rate, $basic->decimal)}}</span></div>
                                @if($data->method)
                                <div class="col-lg-6"><span class="sub-text">Payment Method</span><span class="caption-text">{{isset(App\PaymentMethod::whereId($data->method)->first()->name) ? App\PaymentMethod::whereId($data->method)->first()->name : 'N/A'}} </span></div>
                                @else
                                 <div class="col-lg-6"><span class="sub-text">Payment Method</span><span class="caption-text">{{isset(App\Gateway::whereId($data->gateway)->first()->name) ? App\Gateway::whereId($data->gateway)->first()->name : 'N/A'}} </span></div>
                                @endif
                            </div>
                            <div class="nk-modal-head mt-sm-5 mt-4 mb-4"><h5 class="title">Seller Details</h5></div>
                            <div class="row gy-3">
                                <div class="col-lg-6"><span class="sub-text">Username</span><span class="caption-text">{{isset(App\User::whereId($data->seller)->first()->username ) ? App\User::whereId($data->seller)->first()->username  : 'N/A'}}</span></div>
                                <div class="col-lg-6">
                                    <span class="sub-text">Full Name</span><span class="caption-text align-center">{{isset(App\User::whereId($data->seller)->first()->fname ) ? App\User::whereId($data->seller)->first()->fname  : 'N/A'}} {{isset(App\User::whereId($data->seller)->first()->lname ) ? App\User::whereId($data->seller)->first()->lname  : 'N/A'}}</span>
                                </div>

                                <div class="col-lg-6"><span class="sub-text">Country</span><span class="caption-text">{{isset(App\User::whereId($data->seller)->first()->country ) ? App\User::whereId($data->seller)->first()->country  : 'N/A'}}</span></div>
                                <div class="col-lg-6">
                                    <span class="sub-text">Seller Code</span><span class="caption-text align-center">{{isset($data->marketcode) ? $data->marketcode  : 'N/A'}}</span>
                                </div>


                            </div>

                             <div class="nk-modal-head mt-sm-5 mt-4 mb-4"><h5 class="title">Transfer Details</h5></div>
                            <div class="row gy-3">
                                <div class="col-lg-12"><span class="sub-text">Transaction Hash</span><span class="caption-text">{{isset($data->hashtrx) ? $data->hashtrx  : 'N/A'}}</span></div>
                                 @if($data->image)
                                 <div class="col-lg-12">
                                    <span class="sub-text">Payment Screenshot</span><span class="caption-text align-center"><img src="{{asset('market/'.$data->image)}}" wdith="70" alt="passport"></span>
                                </div>
                                @endif
                            </div>


                            <div class="nk-modal-head mt-sm-5 mt-4 mb-4"><h5 class="title">Payment Details</h5></div>
                            <div class="row gy-3">
                                <div class="col-lg-12"><span class="sub-text">{{isset(App\Currency::whereId($data->coin)->first()->name) ? App\Currency::whereId($data->coin)->first()->name : 'N/A'}} Payment Address</span><span class="caption-text">{{isset($data->wallet) ? $data->wallet  : 'N/A'}}</span></div>
                                <div class="col-lg-12">
                                    <span class="sub-text">Expected Units</span><span class="caption-text align-center">{{isset(App\Currency::whereId($data->coin)->first()->name) ? $data->amount/App\Currency::whereId($data->coin)->first()->price : 'N/A'}}{{isset(App\Currency::whereId($data->coin)->first()->name) ? App\Currency::whereId($data->coin)->first()->symbol : 'N/A'}}</span>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" id="savedFilter">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal Title</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                    </div>
                    <div class="modal-body">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem similique earum necessitatibus nesciunt! Quia id expedita asperiores voluptatem odit quis fugit sapiente assumenda sunt voluptatibus atque
                            facere autem, omnis explicabo.
                        </p>
                    </div>
                    <div class="modal-footer bg-light"><span class="sub-text">Modal Footer Text</span></div>
                </div>
            </div>
        </div>




                                                         @endforeach
                                                         @else
                                                         No Purchase Yet
                                                         @endif


                                                    </div>
                                                </div>
                                                <div class="card-inner">
                                                    <ul class="pagination justify-content-center justify-content-md-start">
                                                       {{ $trx->links() }}
                                                    </ul>
                                                </div>







                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>@stop
