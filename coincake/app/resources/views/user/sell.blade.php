@extends('include.dashboard')


@section('content')
     <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">
                                <div class="buysell  ">
                                    <div class="buysell-nav text-center">

                                    </div>
                                    <div class="buysell-title text-center"><h4 class="title">Sell E-Currency</h4></div>
                                    <div class="buysell-block">

                                        <form method="post"  class="buysell-form" action="{{ route('sellecoin') }}">
                                        @csrf



                                        <script type="text/javascript">

                                            function goDoSomething(identifier){

                                     document.getElementById("gateway").innerHTML = $(identifier).data('id');
                                     document.getElementById("coins").innerHTML = $(identifier).data('id');
                                     document.getElementById("coins2").innerHTML = $(identifier).data('ids');

document.getElementById("buyrate").innerHTML = $(identifier).data('buy');


                                     document.getElementById("gate").value = $(identifier).data('id4');
                                     document.getElementById("icon").innerHTML = "<em class='icon ni ni-"+$(identifier).data('id3')+"'></em>";
                                     document.getElementById("slogan").innerHTML = $(identifier).data('id2');
                                     document.getElementById("rate").innerHTML = "1"+$(identifier).data('id')+"="+$(identifier).data('rate')+"USD";
                                     document.getElementById("rate2").innerHTML = $(identifier).data('rate');
                                }
                              </script>
                                        <script>
                                    function myFunction2() {
                                    var usd = $('#usd').val() ;
                                    var xch = "{{$basic->rate}}";
                                    document.getElementById("convert").innerHTML = "{{$basic->currency_sym}}"+usd*xch;
                                    document.getElementById("amount").innerHTML = usd;
                                    document.getElementById("amount2").innerHTML = usd;
                                    };
                                    </script>

                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label">Select E-Currency</label></div>

                                                <div class="dropdown buysell-cc-dropdown">
                                                    <a href="#" class="buysell-cc-choosen dropdown-indicator" data-toggle="dropdown">
                                                        <div class="coin-item coin-btc">
                                                            <div class="coin-icon" id="icon"><em class="icon ni ni-coins" ></em></div>
                                                            <div class="coin-info"><span class="coin-name" id="gateway">Cryptocurrency</span><span class="coin-text" id="slogan">Select Cryptocurrency</span></div>
                                                        </div>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-auto dropdown-menu-mxh">
                                                        <ul class="buysell-cc-list">
                                                        @foreach($currency as $gate)
                                                         <li class="buysell-cc-item"  onclick="goDoSomething(this);"  data-id="{{$gate->name}}"  data-buy="{{$gate->buy}}"  data-coin="{{$gate->is_coin}}" data-id4="{{$gate->id}}"    data-ids="{{$gate->symbol}}" data-rate="{{$gate->price}}"  data-id3="{{$gate->icon}}" data-id2="{{$gate->symbol}}">
                                                                <a href="#" class="buysell-cc-opt" data-currency="eth">
                                                                    <div class="coin-item coin-eth">
                                                                        <div class="coin-icon"><em class="icon ni ni-{{$gate->icon}}"></em></div>
                                                                        <div class="coin-info"><span class="coin-name">{{$gate->name}}</span><span class="coin-text">{{$gate->slogan}}</span></div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach


                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <input id="gate" name="coin" hidden>
                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount">Amount to Buy</label></div>
                                                <div class="form-control-group">
                                                    <input type="number" id="usd" onkeyup="myFunction2()"   class="form-control form-control-lg form-control-number" name="usd"  placeholder=" 0.00" />
                                                    <div class="form-dropdown">

                                                        <div class="dropdown">
                                                            <a href="#"  data-toggle="dropdown" data-offset="0,2">USD</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-note-group"><span class="buysell-min form-note-alt"><a id="convert"></a></span><span class="buysell-rate form-note-alt"><a id="rate"></a></span></div>


                                                <br>

<script>
function myFunction() {
 var bank = $("#mybank option:selected").attr('data-bank');
  var bankname = $("#mybank option:selected").attr('data-bankname');

 if(bank ==  0){
  document.getElementById("bank").innerHTML = " ";
 }
 if(bank ==  1)
 {
 document.getElementById("bank").innerHTML = "<br><div class='input-item input-with-label'><label class='form-label'>" + bankname + " Account Number</label><input name='actnumber'  required  placeholder='Enter Bank Account Number' class='form-control form-control-lg' type='number'></div> ";}
 if(bank ==  2)
 {
 document.getElementById("bank").innerHTML = "<br><div class='input-item input-with-label'><label class='form-label'>Enter Bank Name</label><input required name='bankname' class='form-control form-control-lg' placeholder='Please enter bank name' type='text'></div><div class='input-item input-with-label'><label class='form-label'>Account Number</label><input  required  placeholder='Enter Account Name' name='acctname' class='form-control form-control-lg' type='text'></div><div class='input-item input-with-label'><label class='form-label'>Account Name</label><input name='actnumber'  required placeholder='Enter Account Number' class='form-control form-control-lg' type='text'></div>";}

 };
</script>



<div class="buysell-field form-action"><button  type="button" data-toggle="modal" data-target="#buy-coin" class="btn btn-lg  btn-outline btn-primary" >Sell</button></div>
<div class="modal fade" tabindex="-1" role="dialog" id="buy-coin"><div class="modal-dialog modal-dialog-centered modal-md" role="document">
<div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
<div class="modal-body modal-body-lg"><div class="nk-block-head nk-block-head-xs text-center"><h5 class="nk-block-title">Confirm Order</h5><div class="nk-block-text"><div class="caption-text">You are about to purchase <strong><a id="amount"></a> USD</strong> worth of <strong><a id="coins"></a></strong>*</div>
<span class="sub-text-sm">Exchange rate: 1 <a id="coins2"></a> = <a id="rate2"></a> USD</span></div></div>
<div class="nk-block"><div class="buysell-overview"><ul class="buysell-overview-list"><li class="buysell-overview-item"><span class="pm-title">We Buy At:</span><span class="pm-currency"><em class="icon ni ni-coins"></em>{{$basic->currency_sym}} <span id="buyrate">0.00</span>/USD<span id="gname2"></span></span></li><li class="buysell-overview-item"><span class="pm-title">Total</span>
<span class="pm-currency"><a id="amount2">0.00</a> USD</span></li></ul> </div><div class="buysell-field form-group">




                                          <div class="form-label-group"><label class="form-label">Select Your Bank</label></div>

<select required  name="bank" id="mybank" onchange="myFunction()" class="form-control form-control-lg  " name="payment"><div class="coin-icon" id="icon1"><em class="icon ni ni-sign-usdc-alt" ></em></div>
<option selected>Choose...</option>
<? $method = DB::table('localbanks')->get(); ?>
@foreach($method as $data)
<option data-bank="1" data-bankname="{{$data->bank}}" value="{{$data->code}}">{{$data->bank}} </option>
@endforeach

<option data-bank="2" value="other"><b>Other Banks</b></option>

</select>
<div id="bank"></div>




<br>
<button type="submit" class="btn btn-primary btn-lg">Confirm Sale</a></div>
 </div></div></div></div></div></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



@stop
