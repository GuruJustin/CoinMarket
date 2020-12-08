@extends('include.dashboard')
@section('content')

                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-lg">
                    <br><br>
                        <div class="nk-block-head nk-block-head-xs text-center">
                            <h5 class="nk-block-title">Preview Transaction</h5>
                            <div class="nk-block-text">
                                <div class="caption-text">Dear {{$user->username}}, Please take time to review your transaction details below and click on the confirm button when through</div>
                                <span class="sub-text-sm">{{$basic->sitename}} will not be liable to any loss arising from you sending coin to an unintended wallet</span>
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="buysell-overview">
                                <ul class="buysell-overview-list">
                                    <li class="buysell-overview-item">
                                        <span class="pm-title">Currency</span><span class="pm-currency"><em class="icon ni ni-{{$coin->symbol}}"></em> <span>
                                        {{$coin->name}}
                                        </span></span>
                                    </li>
                                     <li class="buysell-overview-item">
                                        <span class="pm-title">Units</span>
                                        {{number_format(floatval($amount) , 8, '.', '')}} {{$coin->currency}}
                                        </span></span>
                                    </li>

                              <li class="buysell-overview-item"><span class="pm-title">Value</span><span class="pm-currency">{{number_format($coin->price*$amount, 2)}}USD</span></li>
                              <li class="buysell-overview-item"><span class="pm-title">Transaction Fee</span><span class="pm-currency">{{number_format(floatval($fee) , 8, '.', '')}} {{$coin->currency}}</span></li>






                                </ul>
                                <div class="sub-text-sm">* Receiver's {{$coin->name}} Wallet Address: <a href="#">{{$receiver}}</a></div>
                            </div>

                            <div class="buysell-field form-action text-center">


<div class="pay-buttons"><div class="pay-button">

 </div>
<form method="POST" action="{{ route('sendcoin') }}">
          				       {{csrf_field()}}

								<input type="text" hidden name="amount" value="{{$amount}}">
								<input type="text"  hidden name="toid" value="{{$receiver}}">
								<input type="text"  hidden name="sender" value="{{$sender}}">

<input type="text"  hidden name="coin" value="{{$coin->id}}">


<div class="buysell-field form-action"><button type="submit"  class="btn btn-lg btn-outline btn-primary" >Confirm & Send</button></form>

                            </div>
                        </div>
                    </div>
                </div>
                </div>


@endsection
