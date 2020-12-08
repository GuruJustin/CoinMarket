@extends('include.dashboard')
@section('content')

                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-lg">
                    <br><br>
                        <div class="nk-block-head nk-block-head-xs text-center">
                            <h5 class="nk-block-title">Complete Sales Process</h5>
                            <div class="nk-block-text">
                                <div class="caption-text">Your sale of {{number_format($data->amount, $basic->decimal)}}USD worth of {{App\Currency::whereId($data->currency_id)->first()->name}} <br> with transaction number <a href="#">{{$data->trx}}</a> has been placed <strong></strong></div>
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="buysell-overview">
                                <ul class="buysell-overview-list">
                                    <li class="buysell-overview-item">
                                        <span class="pm-title">Currency</span><span class="pm-currency"><em class="icon ni ni-{{App\Currency::whereId($data->currency_id)->first()->icon}}"></em> <span>
                                        {{App\Currency::whereId($data->currency_id)->first()->name}}
                                        </span></span>
                                    </li>
                                     <li class="buysell-overview-item">
                                        <span class="pm-title">Amount</span>
                                        USD{{number_format($data->amount, $basic->decimal)}}
                                        </span></span>
                                    </li>

                              <li class="buysell-overview-item"><span class="pm-title">Unit</span><span class="pm-currency">{{round($data->amount / $data->currency->price,8)}} {{$data->currency->symbol}}</span></li>





                                </ul>
                               </div>

                            <div class="buysell-field form-action text-center">

<br>
@if($data->currency->id != 11)
<div class="card-text"><p>Please send <strong>{{round($data->amount / $data->currency->price,8)}} {{$data->currency->symbol}} (${{number_format($data->amount, $basic->decimal)}} )</strong> to the wallet address below or scan the wallet QR Code below to initiate payment from your wallet app. <br><code>Please note; do not send below ${{number_format($data->amount, $basic->decimal)}}. We only credit what you send</code></p></div>
@else

<div class="card-text"><p>Please send <strong>{{round($data->amount / $data->currency->price,8)}} {{$data->currency->symbol}} (${{number_format($data->amount, $basic->decimal)}} )</strong> to the Perfect Money account below. Please note; do not send below ${{number_format($data->amount, $basic->decimal)}}. We only credit what you send</p></div>
@endif


@if($data->currency->id != 11)<img src='https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl={{$data->currency->payment_id}}&choe=UTF-8\" style='width:100px;' />
@else
Perfect Money Account: {{$data->currency->payment_id}}

@endif
<br>

<button class="btn btn-primary" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  <span> Waiting... </span>
</button>
</center>


<br>
<br>
<div class="pay-buttons">
 <a href="#" data-toggle="modal" data-target="#pay-confirm""><span class="schedule-bonus">Clcik here to complete process</span></a>

                            </div>
                        </div>
                    </div>
                </div>



<!-- Modal End --><div class="modal fade" id="pay-confirm" tabindex="-1"><div class="modal-dialog modal-dialog-centered modal-md" role="document">
<div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
<div class="modal-body modal-body-lg"><div class="nk-block-head nk-block-head-xs text-center"><p class="lead text-primary">Confirm Your Payment </p><p>Do not proceed with this process if you have not sent your  {{$data->currency->name}}</p><p>In case you sent below USD{{number_format($data->amount, $basic->decimal)}}, send us a message, {{$basic->sitename}} will credit accordingly</p>


<form role="form" method="POST" action="{{ route('esellupload') }}" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="row">

<br>

<input name="trx" value="{{$data->trx}}" hidden>
<div class="col-md-12"> <div class="form-label-group"><label class="form-label" for="buysell-amount">Transaction Number</label></div><input name="trxx" placeholder="Enter Payment Trasaction Hash Number " class="form-control" type="text"></div>

<div class="col-md-12"> <br><div class="form-label-group"><label class="form-label" for="buysell-amount">Upload Payment Screenshot</label></div><div class="custom-file">
                                                                        <input type="file" multiple class="custom-file-input"  name="photo" id="customFile">
                                                                        <label class="custom-file-label" for="customFile">Select file</label>
                                                                    </div></div>




<br>


 <!-- .input-item -->
<div class="col-md-12">
 <ul class="d-flex flex-wrap align-items-center guttar-30px"><li><br><button type="submit" class="btn btn-primary">Confirm Payment</button></form></li></ul> <!-- .modal-content --></div><!-- .modal-dialog --></div></div></div></div></div></div ><!-- Modal End -->


@endsection
