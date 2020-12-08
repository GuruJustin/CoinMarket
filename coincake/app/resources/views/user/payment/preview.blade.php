@extends('include.dashboard')
@section('content')

                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-lg">
                    <br><br>
                        <div class="nk-block-head nk-block-head-xs text-center">
                            <h5 class="nk-block-title">Confirm Order</h5>
                            <div class="nk-block-text">
                                <div class="caption-text">You are about to deposit <strong>{{$basic->currency_sym}}{{number_format($data->amount, $basic->decimal)}}</strong></div>
                                <span class="sub-text-sm">Exchange rate: 1 {{$basic->currency}} = {{number_format($basic->rate, $basic->decimal)}} USD</span>
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="buysell-overview">
                                <ul class="buysell-overview-list">
                                    <li class="buysell-overview-item">
                                        <span class="pm-title">Pay with</span><span class="pm-currency"><em class="icon ni ni-{{App\Gateway::whereId($data->gateway_id)->first()->val7}}"></em> <span>@if($data->gateway_id == 0)
                                        Bank Transfer
                                        @else
                                        {{App\Gateway::whereId($data->gateway_id)->first()->name}}.
                                        @endif</span></span>
                                    </li>
                                    <li class="buysell-overview-item"><span class="pm-title">Total</span><span class="pm-currency">{{$basic->currency_sym}}{{number_format($data->amount, $basic->decimal)}}</span></li>
                              <li class="buysell-overview-item"><span class="pm-title">USD</span><span class="pm-currency">${{number_format($data->usd, $basic->decimal)}}</span></li>
                                </ul>
                                <div class="sub-text-sm">* Payment gateway may charge you . <a href="#">transaction fee</a></div>
                            </div>

                            <div class="buysell-field form-action text-center">
                                <div>@if($data->gateway_id == 0)
<div class="card-text"><p>Make Payment To Any Of The Following Account Numbers. </p></div>
<? $bank = DB::table('banks')->orderBy('name','asc')->get(); ?>
<div class="gaps-3x"></div><div class="card-head"><h5 class="card-title card-title-md">Bank Account(s)</h5></div>
@foreach($bank as $gate)

<div class="schedule-item"><div class="row"><div class="col-xl-5 col-md-5 col-lg-6"><div class="pdb-1x"><h5 class="schedule-title"><span>Bank Name</span></h5><span>{{$gate->name}}</span></div></div><div class="col-xl-4 col-md col-lg-6"><div class="pdb-1x"><h5 class="schedule-title"><span>Account Details</span></h5><span>{{$gate->account}}</span></div></div>
</div></div>

@endforeach


@elseif($data->gateway_id == 513)
 <form method="POST" action="{{route('deposit.confirm')}}" enctype="multipart/form-data">
                            {{csrf_field()}}


To complete deposit, please select a cryptocurrency and proceed with your deposit. You will be redirected to Coin Payments page for your secure crypto payment process.
<select name="currency" required class="form-control form-lg" data-placeholder="Select A Cryptocurrency">
														<option>Select Currency</option>

															<option value="BTC">BTC (BitCoin) </option>
                                                            <option value="BCH">Bitcoin Cash (BCH) </option>
                                                            <option value="LTC">LiteCoin (LTC) </option>
                                                            <option value="ETH">Ethereum (ETH) </option>
                                                            <option value="ZEC">Zcash (ZEC) </option>
                                                            <option value="DASH">Dash (DASH) </option>
                                                            <option value="XRP">Ripple (XRP) </option>
                                                            <option value="XMR">Monero (XMR) </option>
                                                            <option value="NEO">NEO (NEO) </option>
                                                            <option value="ADA">Cardano (ADA) </option>
                                                            <option value="EOS">EOS (EOS) </option>
													</optgroup>
													</select><br>

@else

@endif

<div class="pay-buttons"><div class="pay-button">
 <form method="POST" action="{{route('deposit.confirm')}}" enctype="multipart/form-data">
                            {{csrf_field()}}

@if($data->gateway_id == 0)
  <div class="col-md-12"><div class="input-item input-with-label"><label class="input-item-label text-exlight">Transaction Number</label><input   name="code" class="input-bordered" required type="text"><label class="input-item-label text-exlight"><small> (Please enter your payment transaction number,)</small></label></div>

<input name="bank" value="bank" hidden >


<div class="input-item input-with-label"><label class="input-item-label text-exlight">Attachment Upload</label><div class="relative"><em class="input-file-icon fas fa-upload"></em><input type="file" name="image" class="input-file" id="file-01"><label for="file-01">Choose a file</label>
</div>
<small> (Please attach a screenshot of your bank transfer of payment slip)</small>
</div></div>
<button  type="submit" id="btn-confirm" class="btn btn-primary btn-lg">Proceed To Pay <em class="ti ti-wallet"></em></button>
</form>
@endif


@if($data->gateway_id == 100)
<script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>

    <script>
			const API_publicKey = "{{ $data->gateway->val1 }}";
			function payWithRave() {
			var x = getpaidSetup({
			PBFPubKey: API_publicKey,
			customer_email: "{{ Auth::user()->email }}",
			amount: "{{ round($data->amount, 2)}}",
			customer_phone: "{{ Auth::user()->mobile }}",
			currency: "NGN",
			txref: "rave-123456",
		    payment_options: "card",
			meta: [{
			metaname: "flightID",
			metavalue: "AP1234"
			}],
			onclose: function() {},
			callback: function(response) {
			var txref = response.tx.txRef; // collect txRef returned and pass to a 					server page to complete status check.
			console.log("This is the response returned after a charge", response);
			if (
			response.tx.chargeResponseCode == "00" ||
			response.tx.chargeResponseCode == "0"
			) {
			window.location.href = "{{route('cardpay', $data->trx)}}";
			} else {
			// redirect to a failure page.
			}

			x.close(); // use this to close the modal immediately after payment.
			}
			});
			}
			</script>


<badge  onClick="payWithRave()" class="btn btn-primary btn-lg">Pay Flutterwave<em class="ti ti-wallet"></em></badge>
@elseif($data->gateway_id == 107)

 <script>
						function payWithPaystack(){
						var handler = PaystackPop.setup({
						key: "{{ $data->gateway->val1 }}",
						email: "{{ Auth::user()->email }}",
						amount: "{{ round($data->amount+$data->charge, 2)*100 }}",
						currency: "NGN",
						ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
						firstname: '',
						lastname: '',
						// label: "Optional string that replaces customer email"
						metadata: {
						custom_fields: [
						{
						display_name: "Mobile Number",
						variable_name: "",
						value: "+2348012345678"
						}
						]
						},
						callback: function(response){
						alert('Deposit successful. transaction refference number is ' + response.reference);
						window.location.href = "{{route('cardpay', $data->trx)}}";
						},
						onClose: function(){
						alert('window closed');
						}
						});
						handler.openIframe();
						}
						</script>


<script src="https://js.paystack.co/v1/inline.js"></script>
<badge onclick="payWithPaystack()" class="btn btn-primary btn-lg">Pay Paystack <em class="ti ti-wallet"></em></badge>
@elseif($data->gateway_id == 109)
<script src="http://www.remitademo.net/payment/v1/remita-pay-inline.bundle.js"></script>
<badge onclick="makePayment()"  class="btn btn-primary btn-lg">Pay Remitta <em class="ti ti-wallet"></em></badge>
@else
<button  type="submit" id="btn-confirm" class="btn btn-primary btn-lg">Proceed To Pay <em class="ti ti-wallet"></em></button>
</form>@endif</div>
                                <div class="pt-3"><a href="#" data-dismiss="modal" class="link link-danger">Cancel Deposit</a></div>
                            </div>
                        </div>
                    </div>
                </div>


@endsection
