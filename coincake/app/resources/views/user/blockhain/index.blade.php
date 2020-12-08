@extends('include.dashboard')
@section('content')
     <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-sub"><span>Blockchain Wallet</span></div>
                                    <div class="nk-block-between-md g-4">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title fw-normal">{{$coin->name}} Wallet</h4>
                                            <div class="nk-block-des"><p>Here is the list of your {{$coin->name}} assets / wallets!</p></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="nk-block-head-sm">
                                        <div class="nk-block-head-content"><h5 class="nk-block-title title">{{$coin->name}} Accounts</h5></div>
                                    </div>
                                    <div class="row g-gs">
                                    @if(count($wallet) > 0)
                                    @foreach($wallet as $data)

                                        <div class="col-sm-6 col-lg-4 col-xl-6 col-xxl-4">
                                            <div class="card card-bordered is-dark">
                                                <div class="nk-wgw">
                                                    <div class="nk-wgw-inner">
                                                        <a class="nk-wgw-name" href="{{route('viewwallet',$data->address)}}">
                                                            <div class="nk-wgw-icon is-default"><em class="icon ni ni-{{$coin->symbol}}"></em></div>
                                                            <h5 class="nk-wgw-title title">{{$coin->name}}</h5>
                                                        </a>
                                                        <div class="nk-wgw-balance">
                                                            <div class="amount">{{$data->balance}}<span class="currency currency-nio"> {{$coin->currency}}</span></div>
                                                            <div class="amount-sm">{{number_format($coin->price * $data->balance, $basic->decimal)}} <span class="currency currency-usd">USD</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-wgw-actions">
                                                        <ul>
                                                            <li>
                                                                <a href="#"><em class="icon ni ni-scan"></em> <span>{{$data->address}}</span></a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                    <div class="nk-wgw-more dropdown">
                                                        <a href="#" class="btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                            <ul class="link-list-plain sm">
                                                                <li><a href="{{route('viewwallet',$data->address)}}">Details</a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                          <div class="col-sm-6 col-lg-4 col-xl-6 col-xxl-4">
                                            <div class="card card-bordered is-dark">
                                                <div class="nk-wgw">
                                                    <div class="nk-wgw-inner">
                                                        <a class="nk-wgw-name" href="#">
                                                            <div class="nk-wgw-icon  "><em class="icon ni ni-wallet-alt"></em></div>
                                                            <h5 class="nk-wgw-title title">No Wallet Yet</h5>
                                                        </a>
                                                        <div class="nk-wgw-balance">
                                                            <div class="amount">0.00<span class="currency currency-nio"></span></div>
                                                            <div class="amount-sm">0.00<span class="currency currency-usd">USD</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-wgw-actions">
                                                        <ul>
                                                            <li>
                                                                <a href="#"><em class="icon ni ni-wallet"></em> <span>No Wallet Address</span></a>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                         <div class="col-md-6 col-lg-4">
                                            <div class="card card-bordered dashed h-100">
                                                <div class="nk-wgw-add">
                                                    <div class="nk-wgw-inner">
                                                        <a href="{{route('createwallet',$id)}}">
                                                            <div class="add-icon"><em class="icon ni ni-plus"></em></div>
                                                            <h6 class="title">Add New Wallet</h6>
                                                        </a>
                                                        <span class="sub-text">You can add your more wallet in your account to manage separetly.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
@stop


