@extends('include.admindashboard')

@section('body')
  <div class="page-content">

        <div class="container">
            <div class="row">

                <div class="main-content col-lg-8">
                                        <div class="content-area card">
    <div class="card-innr">
                <div class="card-head">
            <h4 class="card-title">{{$user->username}} {{$coin->name}} Wallet</h4>
        </div>
        <div class="gaps-1x"></div>

        <div class="card-bordered nopd">
            <div class="card-innr">
                <div class="row guttar-vr-15px align-items-center">
                    <div class="col-md-8">
                        <div class="total-block">
                            <h6 class="total-title ucap">Wallet Balance</h6>
                            <span class="total-amount-lead">{{$bal}} {{$coin->currency}}</span>
                            <p class="total-note">Equivalent to <span>{{number_format($btcrate*$bal, 2)}}USD</span></p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="sap sap-light"></div>
            <div class="card-innr">
                <div class="total-block">
                    <h5 class="total-title-sm">Pending Wallet Balance</h5>
                    <span class="total-amount">{{$pend}} {{$coin->currency}}</span>
                </div>
                <div class="total-block">
                    <ul class="list total-wg">
                        <li>
                            <span class="total-title-xs">Sent BTC</span>
                            <? $total_sent = 0;
                                foreach($strx['data']['txs'] as $strx){
                                $total_sent += $strx['amounts_sent'][0]['amount'];
                                } ?>

                            <span class="total-amount-sm">{{number_format(floatval($total_sent) , 8, '.', '')}} {{$coin->currency}}</span>
                        </li>
                        <li>
                         <? $total_rec = 0;
                        foreach($trtrx['data']['txs'] as $trtrx){
                        $total_rec += $trtrx['amounts_received'][0]['amount'];
                        } ?>
                            <span class="total-title-xs">Received BTC</span>
                            <span class="total-amount-sm"> {{$total_rec}} {{$coin->currency}}</span>
                        </li>

                    </ul>
                                    </div>
            </div>
            <div class="sap sap-light"></div>
            <div class="card-innr">
                <div class="total-block">
                    <h5 class="total-title-sm">Transaction Summary</h5>
                     <a href="{{route('admin.walletsent' , $address)}}" class="btn btn-primary btn-outline">Sent {{$coin->currency}}</a> &nbsp;&nbsp;<a href="{{route('admin.walletreceived' , $address)}}" class="btn btn-primary btn-outline">Received {{$coin->currency}}</a>
                </div>
                            </div>
                    </div>
    </div>
</div>

                </div>

                                <div class="aside sidebar-right col-lg-4">
                                        <div class="account-info card">
                        <div class="card-innr">
                            <div class="user-account-status"><h6 class="card-title card-title-sm">Your Account Status</h6><div class="gaps-1-5x"></div><ul class="btn-grp"><li><a href="#" data-toggle="modal" data-target="#receive-coin" class="btn btn-xs btn-auto btn-success">Receive BTC</a></li><li><a href="#" data-toggle="modal" data-target="#send-coin" class="btn btn-xs btn-auto btn-info"><span>Send BTC</span></a></li></ul></div>
                                                        <div class="gaps-2-5x"></div>
                            <div class="user-receive-wallet"><h6 class="card-title card-title-sm">Wallet Address</h6><div class="gaps-1x"></div><div class="d-flex justify-content-between"><span>{{$address}} </div></div>
                                                    </div>
                    </div>

                    <div style="width: 100%; height:220px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; block-size:220px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px;"><div style="height:200px; padding:0px; margin:0px; width: 100%;">

@if($coin->id == 3)
<iframe src="https://widget.coinlib.io/widget?type=single_v2&theme=light&coin_id=859&pref_coin_id=1505" width="100%" height="196px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
@elseif($coin->id == 2)
<iframe src="https://widget.coinlib.io/widget?type=single_v2&theme=light&coin_id=359&pref_coin_id=1505" width="100%" height="196px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
@elseif($coin->id == 1)
<iframe src="https://widget.coinlib.io/widget?type=single_v2&theme=light&coin_id=280&pref_coin_id=1505" width="100%" height="196px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
@endif</div>
<div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="#"  style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size:11px">{{$coin->currency}} Exchange Rate</a></div></div>
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


<div class="form-label-group"><label class="form-label"></label><a href="#" class="link">&copy {{$coin->name}} Wallet Address</a></div><input type="hidden" value="btc" name="bs-currency" id="buysell-choose-currency-modal"><div class="dropdown buysell-cc-dropdown"><a href="#" class="buysell-cc-choosen" data-toggle="dropdown"><div class="coin-item coin-btc"><div class="coin-icon"><em class="icon ni ni-btc"></em></div><div class="coin-info">
<div class="copy-wrap mgb-0-5x"><span class="copy-feedback"></span><input type="text" class="copy-address" value="{{$address}}" disabled><button class="copy-trigger copy-clipboard" data-clipboard-text="{{$address}}"><em class="ti ti-files"></em></button></div>

</div></div></a></div></div><div class="buysell-field form-action text-center"><div>



</div><div class="pt-3"><a href="#" data-dismiss="modal" class="btn btn-outline btn-danger">Cancel</a></div></div></div></div></div></div></div>






<div class="modal fade" tabindex="-1" role="dialog" id="send-coin"><div class="modal-dialog modal-dialog-centered modal-md" role="document"><div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a><div class="modal-body modal-body-lg"><div class="nk-block-head nk-block-head-xs text-center"><h5><a href="#" class="link nk-block-title">Send {{$coin->currency}}</a></h5><div class="nk-block-text"><div class="caption-text" id="prompt"></div><span class="sub-text-sm"> </span></div></div><div class="nk-block"><div class="buysell-overview"></div>
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

<form method="POST" action="{{ route('admin.sendpreview') }}">
{{csrf_field()}}

<br>

<div class="form-row no-padding">
<label class="form-label">Enter Receiver's Address </label>
<input type="text" required name="toid" id="mySelect1" onkeyup="myFunction1()" class="input-bordered" placeholder="Enter Receiver's Address">
</div>
<br>
<input value="{{$coin->id}}" name="coin" hidden >
<div class="form-row no-padding">
<label class="form-label">Enter Amount (USD) </label>
<input required type="text" id="mySelect3" onkeyup="myFunction()" class="input-bordered" autocomplete="off" placeholder="USD 0.00">
</div>
<div class="sub-text-sm"> <a href="#" id="units" class="link"></a></div>
<br><textarea name="amount" hidden id="units2"></textarea>

<input value="{{$address}}" name="sender" hidden>
 </div><div class="buysell-field form-action text-center"><div><button type="sumbit" class="btn btn-outline btn-primary btn-hover">Confirm</button></form><br>
 <a href="#" class="link">* Blockchain transaction fee are included</a>
 </div><div class="pt-3"><a href="#" data-dismiss="modal" class="link link-danger">Cancel Process</a></div></div></div></div></div></div></div>

@endsection
