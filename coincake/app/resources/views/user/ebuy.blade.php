@extends('include.dashboard')
@section('content')

                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-lg">
                    <br><br>
                        <div class="nk-block-head nk-block-head-xs text-center">
                            <h5 class="nk-block-title">Preview Order</h5>
                            <div class="nk-block-text">
                                <div class="caption-text">You are about to buy <strong>{{number_format($data->amount, $basic->decimal)}}USD worth of {{App\Currency::whereId($data->currency_id)->first()->name}}</strong></div>
                                <span class="sub-text-sm">Exchange rate: 1{{$data->currency->symbol}} = ${{number_format($data->currency->price, $basic->decimal)}}</span>
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
                                        {{number_format($data->amount, $basic->decimal)}} USD
                                        </span></span>
                                    </li>

                              <li class="buysell-overview-item"><span class="pm-title">Rate</span><span class="pm-currency">$1.00 = {{$basic->currency_sym}}{{number_format($data->currency->sell, $basic->decimal)}}</span></li>
                              <li class="buysell-overview-item"><span class="pm-title">Amount Payable</span><span class="pm-currency">{{$basic->currency_sym}}{{number_format($data->main_amo, $basic->decimal)}}</span></li>
                        @if($data->gateway)
               <li class="buysell-overview-item"><span class="pm-title">Payment Method</span><span class="pm-currency">

{{App\Gateway::whereId($data->gateway)->first()->name}}
</span></li>
@else
               <li class="buysell-overview-item"><span class="pm-title">Payment Method</span><span class="pm-currency">

{{App\PaymentMethod::whereId($data->method)->first()->name}}
</span></li>

@endif





                                </ul>
                                <div class="sub-text-sm">* Your {{$data->currency->name}} Wallet Address: <a href="#">{{$data->wallet}}</a></div>
                            </div>

                            <div class="buysell-field form-action text-center">


<div class="pay-buttons"><div class="pay-button">

 </div>
 <a href="{{ route('ebuypost',$data->trx) }}"><span class="btn btn-primary btn-outline">Proceed With Payment</span></a>
                                <div class="pt-3"><a href="{{ route('ebuydel',$data->trx) }}" data-dismiss="modal" class="link link-danger">Cancel Order</a></div>
                            </div>
                        </div>
                    </div>
                </div>


@endsection
