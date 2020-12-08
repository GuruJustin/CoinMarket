@extends('include.dashboard')
@section('content')

               <div class="nk-content">
                        <div class="container-fluid">
                    
                    <div class="modal-body modal-body-lg">
                     
                        <div class="nk-block-head nk-block-head-xs text-center">
                            <h5 class="nk-block-title">Make Payment</h5>
                            <div class="nk-block-text">
                                <div class="caption-text">Your order of {{number_format($data->amount, $basic->decimal)}}USD worth of {{App\Currency::whereId($data->currency_id)->first()->name}} <br> with transaction number <a href="#">{{$data->trx}}</a> has been placed <strong></strong></div>
                                 @if($data->gateway) @else<span class="sub-text-sm">Please make payment into bank account below</span> @endif

                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="buysell-overview">
                                <ul class="buysell-overview-list">
                                    <li class="buysell-overview-item">
                                        <span class="pm-title">Currency</span><span class="pm-currency" id="icon" ><em class="icon ni ni-{{App\Currency::whereId($data->currency_id)->first()->icon}}"></em> <span>
                                        {{App\Currency::whereId($data->currency_id)->first()->name}}
                                        </span></span>
                                    </li>

                              <li class="buysell-overview-item"><span class="pm-title">Units</span><span class="pm-currency">@if($data->currency->symbol == "PM")
{{$data->currency->symbol}}{{number_format($data->getamo, 2)}}
@else
{{$data->currency->symbol}}{{number_format($data->getamo, 8)}}
@endif</span></li>
                              <li class="buysell-overview-item"><span class="pm-title">Amount Payable</span><span class="pm-currency">{{$basic->currency_sym}}{{number_format($data->main_amo, $basic->decimal)}}</span></li>

@if($data->gateway)
               <li class="buysell-overview-item"><span class="pm-title">Payment Method</span><span class="pm-currency">

@if($data->gateway == 99)
Self Serviced
@else
Credit/Debit Card
@endif
</span></li>
@else

               <li class="buysell-overview-item"><span class="pm-title">Payment Method</span><span class="pm-currency">

{{App\PaymentMethod::whereId($data->method)->first()->name}}
</span></li>

 <li class="buysell-overview-item"><span class="pm-title">Bank Name</span><span class="pm-currency">

{{App\Bank::whereId($data->bank)->first()->name}}
</span></li>

 <li class="buysell-overview-item"><span class="pm-title">Account Name</span><span class="pm-currency">

{{App\Bank::whereId($data->bank)->first()->accname}}
</span></li>

 <li class="buysell-overview-item"><span class="pm-title">Account Number</span><span class="pm-currency">

{{App\Bank::whereId($data->bank)->first()->account}}
</span></li>

@endif





                                </ul>

                            </div>

                            <div class="buysell-field form-action text-center">


<div class="pay-buttons"><div class="pay-button">

 </div>
 @if($data->gateway == 107)
<script src="https://js.paystack.co/v1/inline.js"></script>
<button  onclick="payWithPaystack()" class="btn btn-primary ">Pay With Paystack <em class="ti ti-credit-card"></em></button>


<script>
function payWithPaystack(){
var handler = PaystackPop.setup({
key: "{{App\Gateway::whereId($data->gateway)->first()->val1}}",
email: "{{ Auth::user()->email }}",
amount: "{{($data->main_amo)  * 100}}",
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
						value: "{{ Auth::user()->phone }}"
						}
						]
						},
						callback: function(response){
						alert('Deposit successful. transaction refference number is ' + response.reference);
						window.location='javascript: submitform()';
						},
						onClose: function(){
						alert('window closed');
						}
						});
						handler.openIframe();
						}
						</script>



			 <script type="text/javascript">
			function submitform()
			{
			document.forms["myform"].submit();
			}
			</script>
			<form id="myform"  action="{{route('buy.paystack')}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="trx" value="{{ $data->trx }}" />
			</form>


@elseif($data->gateway == 100)
 <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
<button  onclick="payWithRave()" class="btn btn-primary" >Pay With Flutterwave <em class="ti ti-credit-card"></em></button>



    <script>
			const API_publicKey = "{{App\Gateway::whereId($data->gateway)->first()->val1}}";
			function payWithRave() {
			var x = getpaidSetup({
			PBFPubKey: API_publicKey,
			customer_email: "{{ Auth::user()->email }}",
			amount: "{{ round($data->main_amo, 2)}}",
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
			window.location='javascript: submitform()';
			} else {
			// redirect to a failure page.
			}

			x.close(); // use this to close the modal immediately after payment.
			}
			});
			}
			</script>
			 <script type="text/javascript">
			function submitform()
			{
			document.forms["myform"].submit();
			}
			</script>
			<form id="myform"  action="{{route('buy.rave')}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="trx" value="{{ $data->trx }}" />
			</form>



@elseif($data->gateway == 103)
<button  data-toggle="modal" data-target="#get-pay-address" class="btn btn-primary ">Pay With Stripe<em class="ti ti-credit-card"></em></button>


  <div class="modal fade" tabindex="-1" id="get-pay-address">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buy With Stripe</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cc-stripe"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form role="form" id="payment-form" method="POST" action="{{ route('buy.stripe')}}">
@csrf
                        <div class="form-group">
                            <label class="form-label" for="full-name">Name On Card</label>
                            <div class="form-control-wrap">
                                <input type="text" name="name" placeholder="Card Name" class="form-control"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Card Number</label>
                            <div class="form-control-wrap">
                                <input type="tel" name="cardNumber" placeholder="Valid Card Number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Card Expiry Date</label>
                            <div class="form-control-wrap">
                                <input type="tel" name="cardExpiry" placeholder="MM / YYYY" autocomplete="off" required  class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Card CCV Code Date</label>
                            <div class="form-control-wrap">
                                <input type="numbert"  name="cardCVC"  placeholder="CVC"  class="form-control"> 
                            </div>
                        </div>
                          
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Pay USD{{number_format($data->main_amo/$basic->rate, $basic->decimal)}}<em class="ti ti-credit-card mgl-4-5x"></em></button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">Default Currency Is USD</span>
                </div>
            </div> 
            </div> 
            </div> 



@elseif($data->gateway == 99)
<form id="myform"  action="{{route('buy.wallet')}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="trx" value="{{ $data->trx }}" />
<button  type="submit" class="btn btn-primary ">Pay With Deposit Wallet  &nbsp;<em class="ti ti-wallet"></em></button>

			</form>


@else






 <a href="#" data-toggle="modal" data-target="#pay-confirm"><span class="btn btn-primary">Confirm Payment</span></a>
@endif
                                <div class="pt-3"><a href="{{ route('ebuydel',$data->trx) }}" data-dismiss="modal" class="link link-danger">Cancel Order</a></div>
                            </div>
                        </div>
                    </div>
                </div></div></div></div></div>

<!-- Modal End --><div class="modal fade" id="pay-confirm" tabindex="-1"><div class="modal-dialog modal-dialog-centered modal-md" role="document">
<div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
<div class="modal-body modal-body-lg"><div class="nk-block-head nk-block-head-xs text-center"><p class="lead text-primary">Confirm Your Payment </p><p>In case you sent below {{$basic->currency_sym}}{{number_format($data->main_amo, $basic->decimal)}}, send us a message, {{$basic->sitename}} will credit accordingly</p>


<form role="form" method="POST" action="{{ route('ebuyupload') }}" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="row">
<input name="trx" hidden value="{{$data->trx}}">
<div class="col-md-6"><div class="form-label-group"><label class="form-label" for="buysell-amount">Amount Paid</label></div><input name="amount" placeholder="Enter Amount Paid" class="form-control" type="text"></div>
<br>
<div class="col-md-6"> <div class="form-label-group"><label class="form-label" for="buysell-amount">Depositor's Name</label></div><input   placeholder="Enter Depositor's Name'" class="form-control" name="payer" type="text"></div></div>

<br>
<div class="row">
<div class="col-md-12"> <div class="form-label-group"><label class="form-label" for="buysell-amount">Transaction Number</label></div><input name="tnum" placeholder="Enter Payment Trasaction NUmber " class="form-control" type="text"></div>

<div class="col-md-12"> <br><div class="form-label-group"><label class="form-label" for="buysell-amount">Upload Payment Screenshot</label></div><div class="custom-file">
                                                                        <input type="file" multiple class="custom-file-input" name="photo" id="customFile">
                                                                        <label class="custom-file-label" for="customFile">Select file</label>
                                                                    </div></div>
</div></div></div>




<br>
<div class="form-label-group"><label class="form-label" for="buysell-amount">Select Payment Method</label></div>
<select required  class="form-control" name="method">
<option selected>Choose...</option>
@foreach($method as $data)
<option value="{{$data->id}}">{{$data->name}} </option>
@endforeach
</select>
<br>

 <!-- .input-item --><ul class="d-flex flex-wrap align-items-center guttar-30px"><li><button type="submit" class="btn btn-primary">Confirm Payment</button></form></li></ul> </div></div></div><!-- .modal-content --></div><!-- .modal-dialog --></div><!-- Modal End -->
@endsection
