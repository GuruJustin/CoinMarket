@extends('include.admindashboard')

@section('body')


<script>
function goBack() {
  window.history.back()
}
</script>

   <div class="page-content"><div class="container"><div class="card content-area"><div class="card-innr"><div class="card-head d-flex justify-content-between align-items-center"><h4 class="card-title mb-0">Transaction Details</h4><a href="#" onclick="goBack()" class="btn btn-sm btn-auto btn-primary d-sm-block d-none"><em class="fas fa-arrow-left mr-3"></em>Back</a><a href="#" onclick="goBack()" class="btn btn-icon btn-sm btn-primary d-sm-none"><em class="fas fa-arrow-left"></em></a></div><div class="gaps-1-5x"></div><div class="data-details d-md-flex"><div class="fake-class"><span class="data-details-title">Tranx Date</span><span class="data-details-info">{{date('d M Y',strtotime($exchange->created_at))}}</span></div><div class="fake-class"><span class="data-details-title">Tranx Status</span> @if( $exchange->status ==2 )
                                                <span class="badge badge-success">Success</span>
                                            @elseif( $exchange->status == -2 )
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-warning">Pending</span>
                                            @endif</div><div class="fake-class"><span class="data-details-title">Tranx Time</span><span class="data-details-info"> {{$exchange->created_at}}</span></div></div><div class="gaps-3x"></div><h6 class="card-sub-title">Transaction Info</h6><ul class="data-details-list"><li><div class="data-details-head">Transaction Type</div><div class="data-details-des"><strong>Sale</strong></div></li><!-- li --><li><div class="data-details-head">Amount</div><div class="data-details-des"><strong>{{number_format($exchange->amount, $basic->decimal)}} USD</strong></div></li><!-- li --><li><div class="data-details-head">Cryptocurrency</div><div class="data-details-des"><strong>{{$exchange->currency->name}}</strong></div></li><!-- li --><li><div class="data-details-head">Amount In {{$basic->currency}}</div><div class="data-details-des"><span>{{$basic->currency_sym}}{{number_format($exchange->main_amo, $basic->decimal)}}</span> <span></span></div></li><!-- li --><li><div class="data-details-head">Transaction ID</div><div class="data-details-des"><span>{{$exchange->trx}} </span> <span></span></div></li>
   @if($exchange->type == 1)
                                            <!-- li --><li><div class="data-details-head">Details</div><div class="data-details-des">{{$exchange->remark}}</div></li>@endif<!-- li --></ul><!-- .data-details --><div class="gaps-3x"></div><h6 class="card-sub-title">Transaction Details</h6><ul class="data-details-list">

@if($exchange->type == 1)
                                            <li><div class="data-details-head">Payment Method</div><div class="data-details-des"><strong> {{App\PaymentMethod::whereId($exchange->method)->first()->name}}</strong></div></li>@endif<!-- li --><li>





                                            <div class="data-details-head">Amount Paid</div><div class="data-details-des"><span><strong>{{number_format($exchange->amount , $basic->decimal)}} USD</strong>  </span>  </div></li><!-- li --><!-- li --><li><div class="data-details-head">Amount To Receive</div><div class="data-details-des"><span>{{$basic->currency_sym}}{{number_format($exchange->main_amo , $basic->decimal)}}</span></div></li><!-- li -->

<li><div class="data-details-head">Bank Name</div><div class="data-details-des"><span>{{$exchange->bankname}}</span></div></li>
<li><div class="data-details-head">Bank Account Name</div><div class="data-details-des"><span>{{$exchange->accountname}}</span></div></li>
<li><div class="data-details-head">Account Number</div><div class="data-details-des"><span>{{$exchange->accountnumber}}</span></div></li>

<li><div class="data-details-head">Payment Number</div><div class="data-details-des"><span><strong>{{$exchange->tnum}}</strong></span></div></li>

<li><br><div class="data-details-head">Payment Screenshot</div><div class="data-doc-item data-doc-item-lg"><div class="data-doc-image"><img src="{{asset('uploads/payments/'.$exchange->image)}}" alt="passport"></div><ul class="data-doc-actions"><li><a href="{{asset('uploads/payments/'.$exchange->image)}}" download><em class="ti ti-import"></em></a></li>


</ul></div></li>

<!-- li --></ul><!-- .data-details --></div></div><!-- .card --></div><!-- .container --></div>
@endsection
@section('script')
@endsection
