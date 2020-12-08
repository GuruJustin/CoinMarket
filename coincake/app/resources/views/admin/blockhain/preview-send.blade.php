@extends('include.admindashboard')

@section('body')
<div class="page-content"><div class="container"><div class="row"><div class="main-content col-lg-12"><div class="content-area card"><div class="card-innr"><div class="card-head"><h4 class="card-title">Preview Transaction</h4></div><div class="card-text"><p>Hello Admin, you are trying to transfer {{$coin->currency}} from a user's wallet. Proceed with caution, Please take time to review your transaction details below and click on the confirm button when through</p></div><div class="gaps-3x"></div><div class="card-head"><h5 class="card-title card-title-md">Summary</h5></div><div class="schedule-item"><div class="row"><div class="col-xl-5 col-md-5 col-lg-6"><div class="pdb-1x"><h5 class="schedule-title"><span>Amount</span> </h5><span>{{number_format(floatval($amount) , 8, '.', '')}} {{$coin->currency}}</span></div></div><div class="col-xl-4 col-md col-lg-6"><div class="pdb-1x"><h5 class="schedule-title"><span>Network Fee</span></h5><span>{{number_format(floatval($fee) , 8, '.', '')}} {{$coin->currency}}</span></div></div><div class="col-xl-3 col-md-3 align-self-center text-xl-right"><div class="pdb-1x"></div></div></div></div><div class="schedule-item"><div class="row"><div class="col-xl-5 col-md-5 col-lg-6"><div class="pdb-1x"><h5 class="schedule-title"><span>Total Amount</span> </h5><span>{{number_format(floatval($fee+$amount) , 8, '.', '')}} {{$coin->currency}}</span></div></div><div class="col-xl-4 col-md col-lg-6"><div class="pdb-1x"><h5 class="schedule-title"><span>Wallet</span></h5><span>{{$receiver}}</span></div></div></div></div>

<form method="POST" action="{{ route('admin.sendcoin') }}">
          				       {{csrf_field()}}

								<input type="text" hidden name="amount" value="{{$amount}}">
								<input type="text"  hidden name="toid" value="{{$receiver}}">
								<input type="text"  hidden name="sender" value="{{$sender}}">

<input type="text"  hidden name="coin" value="{{$coin->id}}">


<div class="buysell-field form-action"><button type="submit"  class="btn btn-lg btn-outline btn-primary" >Confirm & Send</button></form>

</div></div></div><!-- .container --></div><!-- .container --></div>
@endsection
