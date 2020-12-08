@extends('include.dashboard')
@php
$count = App\Coinwallet::whereUser_id(Auth::user()->id)->count()
@endphp

@section('content')
  <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-between-md">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-head-sub">
                                            <script>
                                            function goBack() {
                                            window.history.back();
                                            }
                                            </script>
                                                <a class="back-to" href="#" onclick="goBack()"><em class="icon ni ni-arrow-left"></em><span>My Wallets</span></a>
                                            </div>
                                            <div class="nk-wgwh">
                                                <em class="icon-circle icon-circle-lg icon ni ni-{{$coin->symbol}}"></em>
                                                <div class="nk-wgwh-title h5">
                                                    {{$coin->name}} Wallet <small>/</small>
                                                    <div class="dropdown">
                                                        <a class=" " data-offset="0,4" href="#" data-toggle="dropdown"><small>USD</small></a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="nk-block-between-md g-4">
                                        <div class="nk-block-content">
                                            <div class="nk-wg1">
                                                <div class="nk-wg1-group g-2">
                                                    <div class="nk-wg1-item mr-xl-4">
                                                        <div class="nk-wg1-title text-soft">Available Balance</div>
                                                        <div class="nk-wg1-amount">
                                                            <div class="amount">{{$bal}} <small class="currency currency-usd">{{$coin->currency}}</small></div>
                                                            <div class="amount-sm">
                                                                Balance in USD: <span class="currency currency-usd">$</span><span>{{number_format($coin->price*$bal, 2)}} </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-block-content">
                                            <ul class="nk-block-tools gx-3">
                                                <li class="btn-wrap">
                                                    <a href="#"  data-toggle="modal" data-target="#send-coin" class="btn btn-icon btn-xl btn-dim btn-outline-primary"><em class="icon ni ni-scan"></em></a><span class="btn-extext">Send</span>
                                                </li>
                                                <li class="btn-wrap">
                                                    <a href="#" data-toggle="modal" data-target="#receive-coin"  class="btn btn-icon btn-xl btn-dim btn-outline-success"><em class="icon ni ni-arrow-down-left"></em></a><span class="btn-extext">Recive</span>
                                                </li>
                                                <li class="btn-wrap">
                                                    <a href="{{route('walletsent' , $address)}}" class="btn btn-icon btn-xl btn-dark"><em class="icon ni ni-upload-cloud"></em></a><span class="btn-extext">Sent</span>
                                                </li>
                                                <li class="btn-wrap">
                                                    <a href="{{route('walletreceived' , $address)}}" class="btn btn-icon btn-xl btn-primary"><em class="icon ni ni-download-cloud"></em></a><span class="btn-extext">Received</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block nk-block-lg -dim">
                                    <div class="row g-gs">
                                        <div class="col-md-4">
                                            <div class="card card-bordered bg-warning-dim">
                                                <div class="card-inner">
                                                    <div class="nk-wg5">
                                                        <div class="nk-wg5-title"><h6 class="title overline-title">Pending Balance</h6></div>
                                                        <div class="nk-wg5-text">
                                                            <div class="nk-wg5-amount">
                                                                <div class="amount">{{$pend}}  <span class="currency currency-btc">{{$coin->currency}}</span></div>
                                                                <div class="amount-sm">{{number_format($coin->price*$pend, 2)}} <span class="currency currency-usd">USD</span></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-bordered bg-success-dim">
                                                <div class="card-inner">
                                                    <div class="nk-wg5">
                                                        <div class="nk-wg5-title"><h6 class="title overline-title">Total Received</h6></div>
                                                        <div class="nk-wg5-text">
                                                            <div class="nk-wg5-amount">
                                                            <? $total_rec = 0;
                                                          foreach($trtrx['data']['txs'] as $trtrx){
                                                         $total_rec += $trtrx['amounts_received'][0]['amount'];
                                                             } ?>
                                                                <div class="amount">{{number_format(floatval($total_rec) , 8, '.', '')}} <span class="currency currency-btc">{{$coin->currency}}</span></div>
                                                                <div class="amount-sm">{{number_format($coin->price*$total_rec, 2)}} <span class="currency currency-usd">USD</span></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-bordered bg-primary-dim">
                                                <div class="card-inner">
                                                    <div class="nk-wg5">
                                                        <div class="nk-wg5-title"><h6 class="title overline-title">Total Sent</h6></div>
                                                        <div class="nk-wg5-text">
                                                            <div class="nk-wg5-amount">
                                                             <? $total_sent = 0;
                                foreach($strx['data']['txs'] as $strx){
                                $total_sent += $strx['amounts_sent'][0]['amount'];
                                } ?>
                                                                <div class="amount">{{number_format(floatval($total_sent) , 8, '.', '')}}  <span class="currency currency-btc">{{$coin->currency}}</span></div>
                                                                <div class="amount-sm">{{number_format($coin->price*$total_sent, 2)}} <span class="currency currency-usd">USD</span></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block nk-block-lg">
                                    <div class="row g-gs">
                                        <div class="col-12">
                                            <div class="nk-block-head-sm">
                                                <div class="nk-block-head-content"><h5 class="nk-block-title title">{{$coin->name}} Live MarketCap</h5></div>
                                            </div>
                                               <div style="width: 100%; height:220px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; block-size:220px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px;"><div style="height:200px; padding:0px; margin:0px; width: 100%;">

@if($coin->id == 3)
<iframe src="https://widget.coinlib.io/widget?type=single_v2&theme=light&coin_id=859&pref_coin_id=1505" width="100%" height="196px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
@elseif($coin->id == 2)
<iframe src="https://widget.coinlib.io/widget?type=single_v2&theme=light&coin_id=359&pref_coin_id=1505" width="100%" height="196px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
@elseif($coin->id == 1)
<iframe src="https://widget.coinlib.io/widget?type=single_v2&theme=light&coin_id=280&pref_coin_id=1505" width="100%" height="196px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
@endif


</div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="#"  style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size:11px">{{$coin->name}} Market</a></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>







<div class="modal fade" tabindex="-1" role="dialog" id="receive-coin"><div class="modal-dialog modal-dialog-centered modal-md" role="document"><div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a><div class="modal-body modal-body-lg"><div class="nk-block-head nk-block-head-xs text-center"><h5 class="nk-block-title">Receive {{$coin->currency}}</h5></div><div class="nk-block"><div class="buysell-overview">

<div class="sub-text-sm">* You can receive {{$coin->currency}} into your <a href="#">{{$coin->name}}</a> wallet. Please click on copy button below to copy your wallet address or scan QR code to get wallet address</div></div>

<center>
<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{$address}}&choe=UTF-8\" title='QR Code' style='width:200px;' />
</center>
<div class="buysell-field form-group">


<div class="form-label-group"><label class="form-label"></label><a href="#" class="link">&copy {{$coin->name}} Wallet Address</a></div>

<div class="nk-refwg-url"><div class="form-control-wrap"><div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span></div><div class="form-icon"><em class="icon ni ni-link-alt"></em></div><input type="text" class="form-control copy-text" id="refUrl" value="{{$address}}"></div></div></div>





</div><div class="pt-3"><a href="#" data-dismiss="modal" class="btn btn-outline btn-danger">Cancel</a></div></div></div></div></div></div></div>






<div class="modal fade" tabindex="-1" role="dialog" id="send-coin">
<div class="modal-dialog modal-dialog-centered modal-md" role="document">
<div class="modal-content">
<div class="modal-body modal-body-lg"><div class="nk-block-head nk-block-head-xs text-center"><h5><a href="#" class="link nk-block-title">Send {{$coin->currency}}</a></h5><div class="nk-block-text"> </div></div><div class="nk-block">
<script type="text/javascript">
						function myFunction() {
					var amount = $('#mySelect3').val();
                 	var convert = amount/{{$btcrate}};


					var units = convert;
					var con = parseFloat((units).toFixed(8))
		document.getElementById("units").innerHTML =con+"{{$network}}";
		document.getElementById("units2").innerHTML =con;

							};

							function myFunction1() {
					var prior = $("#mySelect option:selected").attr('data-prior');
				   document.getElementById("prior").innerHTML = prior;

							};


						</script>

<form method="POST" action="{{ route('sendpreview') }}">
{{csrf_field()}}

<center><em class="icon-circle icon-circle-lg icon ni ni-{{$coin->symbol}}"></em></center><br>
<div class="form-row no-padding">
<label class="form-label">Enter Receiver's Address </label>
<input type="text" required name="toid" id="mySelect1" onkeyup="myFunction1()" class="form-control" placeholder="Enter Receiver's Address">
</div>
<br>
<input value="{{$coin->id}}" name="coin" hidden >
<div class="form-row no-padding">
<label class="form-label">Enter Amount (USD) </label>
<input required type="text" id="mySelect3" onkeyup="myFunction()" class="form-control" autocomplete="off" placeholder="USD 0.00">
</div>
<div class="sub-text-sm"> <a href="#" id="units" class="link"></a></div>
<br><textarea name="amount" hidden id="units2"></textarea>

<input value="{{$address}}" name="sender" hidden>
 </div><div class="buysell-field form-action text-center"><div><button type="sumbit" class="btn btn-outline btn-primary btn-hover">Confirm</button></form><br>
 <a href="#" class="link">* Blockchain transaction fee are included</a>
 </div><div class="pt-3"><a href="#" data-dismiss="modal" class="link link-danger">Cancel Process</a></div></div></div></div></div></div></div>
@endsection
