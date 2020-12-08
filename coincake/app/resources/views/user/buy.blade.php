@extends('include.dashboard')


@section('content')
     <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">
                                <div class="buysell  ">
                                    <div class="buysell-nav text-center">

                                    </div>
                                    <div class="buysell-title text-center"><h4 class="title">Buy E-Currency</h4></div>
                                    <div class="buysell-block">

                                        <form method="post" class="buysell-form" action="{{ route('buyecoin') }}">
                                        @csrf



                                        <script type="text/javascript">

                                            function goDoSomething(identifier){

                                     document.getElementById("gateway").innerHTML = $(identifier).data('id');
                                     document.getElementById("coins").innerHTML = $(identifier).data('id');
                                     document.getElementById("coins2").innerHTML = $(identifier).data('ids');
                                     var coin = $(identifier).data('coin');
                                     if(coin == 1){
                                     document.getElementById("gateway2").innerHTML = "Enter " + $(identifier).data('id') + " Wallet Address Below";
                                     }
                                     else {
                                     document.getElementById("gateway2").innerHTML = "Enter " + $(identifier).data('id') + " Payment Address Below";
                                     }

 if(coin == 1){
                                     document.getElementById("gateway3").innerHTML = "Confirm " + $(identifier).data('id') + " Wallet Address";
                                     }
                                     else {
                                     document.getElementById("gateway3").innerHTML = "Confirm " + $(identifier).data('id') + " Payment Address";
                                     }


                                     document.getElementById("gate").value = $(identifier).data('id4');
                                     document.getElementById("icon").innerHTML = "<em class='icon ni ni-"+$(identifier).data('id3')+"'></em>";
                                     document.getElementById("slogan").innerHTML = $(identifier).data('id2');
                                     document.getElementById("rate").innerHTML = "1"+$(identifier).data('id')+"="+$(identifier).data('rate')+"USD";
                                     document.getElementById("rate2").innerHTML = $(identifier).data('rate');

                                              }


                                        </script>
                                        <script>
                                    function myFunction() {
                                    var usd = $('#usd').val() ;
                                    var xch = "{{$basic->rate}}";
                                    document.getElementById("convert").innerHTML = "{{$basic->currency_sym}}"+usd*xch;
                                    document.getElementById("amount").innerHTML = usd;
                                    document.getElementById("amount2").innerHTML = usd;
                                    };
                                    </script>

                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label">Choose what you want to get</label></div>

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
                                                         <li class="buysell-cc-item"  onclick="goDoSomething(this);"  data-id="{{$gate->name}}"  data-coin="{{$gate->is_coin}}" data-id4="{{$gate->id}}"    data-ids="{{$gate->symbol}}" data-rate="{{$gate->price}}"  data-id3="{{$gate->icon}}" data-id2="{{$gate->symbol}}">
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
                                                    <input type="number" id="usd" onkeyup="myFunction()"   class="form-control form-control-lg form-control-number" name="amount" placeholder=" 0.00" id="mySelect3" onkeyup="myFunction1()" />
                                                    <div class="form-dropdown">

                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-indicator-caret" data-toggle="dropdown" data-offset="0,2">USD</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-note-group"><span class="buysell-min form-note-alt"><a id="convert"></a></span><span class="buysell-rate form-note-alt"><a id="rate"></a></span></div>


                                                <br>




                                          <div class="row"><div class="col-md-12">
                                          <div class="form-label-group"><label class="form-label">Select Payment Method</label></div>

<select required  id="cboOptions" onchange="showDiv('div',this)"  class="form-control form-control-lg form-control-number" name="payment"><div class="coin-icon" id="icon1"><em class="icon ni ni-sign-usdc-alt" ></em></div>
<option  value="1" selected> Select Option</option>
<option   value="2">Bank Transfer </option>
<option  value="3">Online Payment </option>

</select></div></div></div>


<div id="div1" style="display:block;">

</div>
<div id="div2" style="display:none;">
                                            <div class="row"><div class="col-12">
                                            <script type="text/javascript">

                                            function goDoSomething1(identifier){

                                     document.getElementById("pname").innerHTML = $(identifier).data('id');
                                     document.getElementById("pname2").innerHTML = $(identifier).data('id');
                                      document.getElementById("method").value = $(identifier).data('method');

                                      document.getElementById("icon1").innerHTML = "<em class='icon ni ni-"+$(identifier).data('id3')+"'></em>";
                                     document.getElementById("slogan1").innerHTML = $(identifier).data('id2');
                                              }

                                        </script>

                                            <div class="dropdown buysell-cc-dropdown">
                                                    <a href="#" class="buysell-cc-choosen dropdown-indicator" data-toggle="dropdown">
                                                        <div class="coin-item coin-btc">
                                                            <div class="coin-icon" id="icon1"><em class="icon ni ni-sign-usdc-alt" ></em></div>
                                                            <div class="coin-info"><span class="coin-name" id="pname">Payment Method</span><span class="coin-text" id="slogan1">Select Payment</span></div>
                                                        </div>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-auto dropdown-menu-mxh">
                                                        <ul class="buysell-cc-list">
                                                        <? $method = DB::table('payment_methods')->get(); ?>
	                                                    @foreach($method as $data)

                                                         <li class="buysell-cc-item"  onclick="goDoSomething1(this);"  data-id="{{$data->name}}"   data-method="{{$data->id}}"    data-id3="tranx" data-id2="Payment Method" >
                                                                <a href="#" class="buysell-cc-opt" data-currency="eth">
                                                                    <div class="coin-item coin-eth">
                                                                        <div class="coin-icon"><em class="icon ni ni-tranx"></em></div>
                                                                        <div class="coin-info"><span class="coin-name">{{$data->name}}</span><span class="coin-text">Payment Method</span></div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach
<input id="method" name="method" hidden>


                                                        </ul>
                                                    </div>
                                                </div></div>

                                                <div class="col-12">
                                                  <script type="text/javascript">

                                            function goDoSomething2(identifier){

                                     document.getElementById("bname").innerHTML = $(identifier).data('id');
                                      document.getElementById("icon2").innerHTML = "<em class='icon ni ni-"+$(identifier).data('id3')+"'></em>";
                                     document.getElementById("slogan2").innerHTML = $(identifier).data('id2');
                                      document.getElementById("bank").value = $(identifier).data('bank');
                                              }

                                        </script>
<br> 
                                                <div class="dropdown buysell-cc-dropdown">
                                                    <a href="#" class="buysell-cc-choosen dropdown-indicator" data-toggle="dropdown">
                                                        <div class="coin-item coin-btc">
                                                            <div class="coin-icon" id="icon2"><em class="icon ni ni-sign-usdc-alt" ></em></div>
                                                            <div class="coin-info"><span class="coin-name" id="bname">Bank Name</span><span class="coin-text" id="slogan2">Select Bank</span></div>
                                                        </div>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-auto dropdown-menu-mxh">
                                                        <ul class="buysell-cc-list">
                                                       @foreach($bank as $data)

                                                         <li class="buysell-cc-item"  onclick="goDoSomething2(this);"  data-bank="{{$data->id}}"  data-id="{{$data->name}}"    data-id3="building"  data-id2="Bank Name">
                                                                <a href="#" class="buysell-cc-opt" data-currency="eth">
                                                                    <div class="coin-item coin-eth">
                                                                        <div class="coin-icon"><em class="icon ni ni-building"></em></div>
                                                                        <div class="coin-info"><span class="coin-name">{{$data->name}}</span><span class="coin-text">(Bank Name)</span></div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach

<input id="bank" name="bank" hidden>

                                                        </ul>
                                                    </div>
                                                </div>





                                                </div></div>
</div>
<div id="div3" style="display:none;">
 <div class="row"><div class="col-md-12"><script type="text/javascript">

                                            function goDoSomething3(identifier){

                                     document.getElementById("gname").innerHTML = $(identifier).data('id');

                                       document.getElementById("gname2").innerHTML = $(identifier).data('id');
                                      document.getElementById("gatew").value = $(identifier).data('gate');
                                      document.getElementById("icon3").innerHTML = "<em class='icon ni ni-"+$(identifier).data('id3')+"'></em>";
                                     document.getElementById("slogan3").innerHTML = $(identifier).data('id2');
                                              }

                                        </script>

                                                <div class="dropdown buysell-cc-dropdown">
                                                    <a href="#" class="buysell-cc-choosen dropdown-indicator" data-toggle="dropdown">
                                                        <div class="coin-item coin-btc">
                                                            <div class="coin-icon" id="icon3"><em class="icon ni ni-cc-alt" ></em></div>
                                                            <div class="coin-info"><span class="coin-name" id="gname">Payment Gateway</span><span class="coin-text" id="slogan3">Select Payment Gateway</span></div>
                                                        </div>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-auto dropdown-menu-mxh">
                                                        <ul class="buysell-cc-list">
                                                      <? $method = DB::table('gateways')->whereStatus(1)->get(); ?>
                                                    @foreach($method as $data)

                                                         <li class="buysell-cc-item"  onclick="goDoSomething3(this);"  data-id="{{$data->name}}"  data-gate="{{$data->id}}"    data-id3="{{$data->val7}}"  data-id2="Payment Gateway">
                                                                <a href="#" class="buysell-cc-opt" data-currency="eth">
                                                                    <div class="coin-item coin-eth">
                                                                        <div class="coin-icon"><em class="icon ni ni-{{$data->val7}}"></em></div>
                                                                        <div class="coin-info"><span class="coin-name">{{$data->name}}</span><span class="coin-text">Payment Gateway</span></div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach


<input id="gatew" name="gateway" hidden>
                                                        </ul>
                                                    </div>
                                                </div>
</div></div>



</div>

<script>
    function showDiv(prefix,chooser)
    {
            for(var i=0;i<chooser.options.length;i++)
            {
                var div = document.getElementById(prefix+chooser.options[i].value);
                div.style.display = 'none';
            }

            var selectedOption = (chooser.options[chooser.selectedIndex].value);
             if(selectedOption == "1")
            {
                displayDiv(prefix,"1");
            }
            if(selectedOption == "2")
            {
                displayDiv(prefix,"2");
            }
            if(selectedOption == "3")
            {
                displayDiv(prefix,"3");
            }
    }

    function displayDiv(prefix,suffix)
    {
            var div = document.getElementById(prefix+suffix);
            div.style.display = 'block';
    }
</script>







<div class="buysell-field form-action"><button  type="button" data-toggle="modal" data-target="#buy-coin" class="btn btn-lg  btn-outline btn-primary" >Buy</button></div>
<div class="modal fade" tabindex="-1" role="dialog" id="buy-coin"><div class="modal-dialog modal-dialog-centered modal-md" role="document">
<div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
<div class="modal-body modal-body-lg"><div class="nk-block-head nk-block-head-xs text-center"><h5 class="nk-block-title">Confirm Order</h5><div class="nk-block-text"><div class="caption-text">You are about to purchase <strong><a id="amount"></a> USD</strong> worth of <strong><a id="coins"></a></strong>*</div>
<span class="sub-text-sm">Exchange rate: 1 <a id="coins2"></a> = <a id="rate2"></a> USD</span></div></div>
<div class="nk-block"><div class="buysell-overview"><ul class="buysell-overview-list"><li class="buysell-overview-item"><span class="pm-title">Pay with</span><span class="pm-currency"><em class="icon ni ni-toggle-on"></em> <span id="pname2"></span><span id="gname2"></span></span></li><li class="buysell-overview-item"><span class="pm-title">Total</span>
<span class="pm-currency"><a id="amount2">0.00</a> USD</span></li></ul><div class="sub-text-sm">* Payment gateway may charge you <a href="#">transaction fee</a></div></div><div class="buysell-field form-group">
<div class="form-label-group"><label class="form-label"><a id="gateway2"></a></label>
</div>
 <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount"><a id="gateway2"></a></label></div>
                                                <div class="form-control-group">
                                                    <input type="test"  class="form-control form-control-lg  r" name="wallet" />
                                                    <div class="form-dropdown">

                                                        <div class="coin-icon" id="icon1"><em class="icon ni ni-wallet" ></em></div>
                                                    </div>
                                                </div>
<br>
                                                 <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount"><a id="gateway3"></a></label></div>
                                                <div class="form-control-group">
                                                    <input type="test"  class="form-control form-control-lg"  name="rewallet" />
                                                    <div class="form-dropdown">

                                                        <div class="coin-icon" id="icon1"><em class="icon ni ni-wallet" ></em></div>
                                                    </div>
                                                </div>
<div class="buysell-field form-action text-center"><div>
<button type="submit" class="btn btn-primary btn-lg">Confirm the Order</a></div>
<div class="pt-3"><a href="#" data-dismiss="modal" class="link link-danger">Cancel Order</a></div></div></div></div></div></div></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



@stop
