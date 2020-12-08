@extends('include.admindashboard')

@section('body')
  <div class="page-header"><div class="container"><div class="row justify-content-center"><div class="col-lg-8 col-xl-7 text-center"><h2 class="page-title">Blockchain Settings</h2></div></div></div><!-- .container --></div><div class="page-content"><div class="container"><div class="row">

<div class="col-lg-12"><div class="content-area card"><div class="card-innr card-innr-fix"><div class="card-head"><h6 class="card-title">System Settings</h6></div><div class="gaps-1x"></div><!-- .gaps --><form role="form" method="POST" enctype="multipart/form-data" action="">
                        {{ csrf_field() }}

<div class="row"><div class="col-md-6"><div class="input-item input-with-label"><label class="input-item-label text-exlight">Bitcoin API</label><input class="input-bordered" type="text" value="{{$general->btcapi}}"
                                           name="btcapi"><span class="input-note">Block.io BTC API</span></div></div><div class="col-md-6"><div class="input-item input-with-label"><label class="input-item-label text-exlight">Litecoin API</label><input  value="{{$general->ltcapi}}" name="ltcapi" class="input-bordered" type="text"><span class="input-note">Block.io LTC API</span></div></div></div>


<div class="row"><div class="col-md-6"><div class="input-item input-with-label"><label class="input-item-label text-exlight">DOGE API</label><div class="relative"> </span><input  value="{{$general->dogapi}}"
                                           name="dogapi" class="input-bordered" type="text"></div><span class="input-note">Block.io Doge API

                                           </span></div></div><div class="col-md-6"><div class="input-item input-with-label"><label class="input-item-label text-exlight">API Pin</label><input value="{{$general->apikey}}"
                                           name="apikey" class="input-bordered" type="text"><span class="input-note">Block.io API Pin</span></div></div></div>


<div class="col-md-12"><label class="input-item-label ucap text-exlight">Blcokchain Features</label><ul class="d-flex flex-wrap checkbox-list"><li><div class="input-item text-left"><input  class="input-checkbox input-checkbox-sm" type="checkbox"
                               id="cma-enot1"        name="blockallow" {{ $general->blockallow == "1" ? 'checked' : '' }}><label for="cma-enot1">Allow Blcokchain System</label></div></li><li><div class="input-item text-left"><input
                       id="cma-enot"     class="input-checkbox input-checkbox-sm"             type="checkbox"
                                       name="blockcreate" {{$general->blockcreate == "1" ? 'checked' : ''}}><label for="cma-enot">Allow Wallet Creation</label></div></li><li><div class="input-item text-left"><input   class="input-checkbox input-checkbox-sm"     id="pma-cash"          data-width="100%" type="checkbox"
                                       name="blocksend" {{ $general->blocksend == "1" ? 'checked' : '' }}><label for="pma-cash">Allow Sending Cryptos</label></div></li>


 
</ul></div>



 <div class="gaps-1x"></div><button class="btn btn-primary" type="submit">Submit</button></form></div><!-- .card-innr --></div><!-- .card --></div> <!-- .card --></div></div></div><!-- .container --></div><!-- .page-content -->
@endsection

@section('script')

@stop
