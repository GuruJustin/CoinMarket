@extends('include.dashboard')
@section('content')
<div class="nk-content">
                        <div class="container-fluid">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <div class="nk-block-head nk-block-head-sm">
                                        <div class="nk-block-between g-3">
                                            <div class="nk-block-head-content">
                                                <h3 class="nk-block-title page-title">Sent {{$coin->name}}</h3>
                                                <div class="nk-block-des text-soft"><p>You have total {{(count($trx['data']['txs']) )}} transaction(s).</p></div>
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
                                                            <div class="nk-tb-col"><span>TRX Hash</span></div>
                                                            <div class="nk-tb-col text-right"><span>Amount</span></div>
                                                            <div class="nk-tb-col text-right tb-col-sm"><span>Time Code</span></div>
                                                            <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Status</span></div>
                                                            <div class="nk-tb-col nk-tb-col-tools"></div>
                                                        </div>
                                                        @if(count($trx['data']['txs']) > 0)
                                                        @foreach($trx['data']['txs'] as $trx)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <div class="nk-tnx-type">
                                                                    <div class="nk-tnx-type-icon bg-success-dim text-success"><em class="icon ni ni-{{$coin->symbol}}"></em></div>
                                                                    <div class="nk-tnx-type-text"><span class="tb-lead">{{$coin->name}}</span><span class="tb-date"><? echo date("D,d-M.Y", $trx['time']) ?></span></div>
                                                                </div>
                                                            </div>
                                                             <div class="nk-tb-col"><span class="tb-lead-sub">{{substr($trx['txid'], 0, 8)}}...</span><span class="badge badge-dot badge-success">Sent</span></div>
                                                            <div class="nk-tb-col text-right">
                                                                <span class="tb-amount"><? echo $trx['amounts_sent'][0]['amount'];?> <span>{{$coin->currency}}</span></span><span class="tb-amount-sm">{{number_format($coin->price*$trx['amounts_sent'][0]['amount'], 2)}} USD</span>
                                                            </div>
                                                            <div class="nk-tb-col text-right tb-col-sm">
                                                                <span class="tb-amount">{{$trx['time']}} </span><span class="tb-amount-sm"> <? echo date("h:i:s A", $trx['time'])?></span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-status">
                                                                <div class="dot dot-success d-md-none"></div>
                                                                <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">Completed</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-2">

                                                                    <li>
                                                                        <div class="dropdown">
                                                                            <a href="#" class="bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="modal" data-target="#transaction{{$trx['time']}}details"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">

                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>




                                                        <!-- Modal Large --><div class="modal fade" id="transaction{{$trx['time']}}details" tabindex="-1">
                                                         <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-md">
                        <div class="nk-modal-head mb-3 mb-sm-5">
                            <h6 class="nk-modal-title title"><small class="text-primary">{{date("D, d-M, Y h:i:s A", $trx['time'])}}</small></h6>
                        </div>
                        <div class="nk-tnx-details">
                            <div class="nk-block-between flex-wrap g-3">
                                <div class="nk-tnx-type">
                                    <div class="nk-tnx-type-icon bg-warning text-white"><em class="icon ni ni-{{$coin->symbol}}"></em></div>
                                    <div class="nk-tnx-type-text">
                                        <h5 class="title">{{$trx['amounts_sent'][0]['amount']}} {{$coin->name}}</h5>
                                        <span class="sub-text mt-n1">{{number_format($coin->price*$trx['amounts_sent'][0]['amount'], 2)}} USD</span>
                                    </div>
                                </div>
                                <ul class="align-center flex-wrap gx-3">
                                    <li><span class="badge badge-sm badge-success">Completed</span></li>
                                </ul>
                            </div>
                            <div class="nk-modal-head mt-sm-5 mt-4 mb-4"><h5 class="title">Transaction Info</h5></div>
                            <div class="row gy-3">
                                <div class="col-lg-6"><span class="sub-text">TRX Hash</span><span class="caption-text">{{$trx['txid']}}</span></div>
                                <div class="col-lg-6"><span class="sub-text">Receiver</span><span class="caption-text text-break">{{$trx['amounts_sent'][0]['recipient']}}</span></div>
                                <div class="col-lg-6"><span class="sub-text">Transaction Fee</span><span class="caption-text">{{number_format(floatval($trx['total_amount_sent'] - $trx['amounts_sent'][0]['amount']) , 6, '.', '')}} {{$coin->currency}}</span></div>
                                <div class="col-lg-6"><span class="sub-text">Amount Sent</span><span class="caption-text">{{$trx['amounts_sent'][0]['amount']}} {{$coin->currency}}</span></div>
                            </div>


                        </div>
                    </div>
                </div>
                </div>

                                                        </div><!-- Modal End -->
                                                         @endforeach
                                                        @else
                                                       <center> No Sent Transaction </center>
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
@endsection
