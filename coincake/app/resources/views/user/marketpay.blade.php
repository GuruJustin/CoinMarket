@extends('include.dashboard')
@section('content')

                <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                    <div class="modal-body modal-body-lg">
                    <br><br>
                        <div class="nk-block-head nk-block-head-xs text-center">
                            <h5 class="nk-block-title">Confirm Order</h5>
                            <div class="nk-block-text">
                                <div class="caption-text">You have opted to pay using
{{App\Gateway::whereId($data->gateway)->first()->name}}.

 Please find your pre-payment summary below</div>

                        </div>
                        <div class="nk-block">
                            <div class="buysell-overview">
                                <ul class="buysell-overview-list">
                                    <li class="buysell-overview-item">
                                        <span class="pm-title">Pay with</span><span class="pm-currency"><em class="icon ni ni-{{App\Gateway::whereId($data->gateway)->first()->val7}}"></em> <span>
                                        {{App\Gateway::whereId($data->gateway)->first()->name}}.
                                        </span></span>
                                    </li>
                                    <li class="buysell-overview-item"><span class="pm-title">Total</span><span class="pm-currency">{{$basic->currency_sym}}{{number_format($data->amount*$basic->rate, $basic->decimal)}}</span></li>
                              <li class="buysell-overview-item"><span class="pm-title">USD</span><span class="pm-currency">${{number_format($data->amount, $basic->decimal)}}</span></li>
                                </ul>
                                <div class="sub-text-sm">* Payment gateway may charge you . <a href="#">transaction fee</a></div>
                            </div>

                            <div class="buysell-field form-action text-center">
                                <div>
<div class="pay-buttons"><div class="pay-button">

@if($data->gateway == 100)
<script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>

    <script>
			const API_publicKey = "{{ App\Gateway::whereId($data->gateway)->first()->val1 }}";
			function payWithRave() {
			var x = getpaidSetup({
			PBFPubKey: API_publicKey,
			customer_email: "{{ Auth::user()->email }}",
			amount: "{{ round($data->amount*$basic->rate, 2)}}",
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
			window.location='javascript: submitform2()';
			} else {
			// redirect to a failure page.
			}

			x.close(); // use this to close the modal immediately after payment.
			}
			});
			}
			</script>


<badge  onClick="payWithRave()" class="btn btn-primary btn-lg">Pay Flutterwave<em class="ti ti-wallet"></em></badge>
@elseif($data->gateway == 107)

 <script>
						function payWithPaystack(){
						var handler = PaystackPop.setup({
						key: "{{ App\Gateway::whereId($data->gateway)->first()->val1 }}",
						email: "{{ Auth::user()->email }}",
						amount: "{{ round($data->amount*$basic->rate, 2)*100 }}",
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
						document.getElementById("trx").value = response.reference;

						window.location='javascript: submitform()';
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
@elseif($data->gateway == 109)
<script src="http://www.remitademo.net/payment/v1/remita-pay-inline.bundle.js"></script>
<badge onclick="makePayment()"  class="btn btn-primary btn-lg">Pay Remitta <em class="ti ti-wallet"></em></badge>
@else
<button  type="submit" id="btn-confirm" class="btn btn-primary btn-lg">Proceed To Pay <em class="ti ti-wallet"></em></button>
</form>@endif</div>
                                <div class="pt-3"> </div>
                            </div>
                        </div>
                    </div>
                </div></div></div>


						  <script type="text/javascript">
			function submitform()
			{
			document.forms["myform"].submit();
			}
			</script>

			<form id="myform"  action="{{route('marketpaystack')}}" method="post">
			{{csrf_field()}}
			<input type="text" name="payid" id="trx" hidden />
			<input type="hidden" name="trx" value="{{ $data->trx }}" />

			</form>

            <script type="text/javascript">
			function submitform2()
			{
			document.forms["myform2"].submit();
			}
			</script>

			<form id="myform2"  action="{{route('marketrave')}}" method="post">
			{{csrf_field()}}
			<input type="text" name="payid" id="trx" hidden />
			<input type="hidden" name="trx" value="{{ $data->trx }}" />

			</form>

 </div> </div>
@endsection
