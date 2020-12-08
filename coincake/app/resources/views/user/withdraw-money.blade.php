@extends('include.dashboard')


@section('content')
     <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">
                                <div class="buysell  ">
                                    <div class="buysell-nav text-center">

                                    </div>
                                    <div class="buysell-title text-center"><h4 class="title">Withdraw Fund!</h4></div>
                                    <div class="buysell-block">

                                        <form method="post"  class="buysell-form" action="{{route('withdraw.depo')}}">
                                        @csrf



                                        <script type="text/javascript">

                                            function goDoSomething(identifier){

                                     document.getElementById("gateway").innerHTML = $(identifier).data('id');
                                     document.getElementById("gate").value = $(identifier).data('id4');
                                     document.getElementById("icon").innerHTML = $(identifier).data('id3');
                                     document.getElementById("slogan").innerHTML = $(identifier).data('id2');
                                              }

                                        </script>
                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label">Choose what you want to get</label></div>

                                                <div class="dropdown buysell-cc-dropdown">
                                                    <a href="#" class="buysell-cc-choosen dropdown-indicator" data-toggle="dropdown">
                                                        <div class="coin-item coin-btc">
                                                            <div class="coin-icon" id="icon"><em class="icon ni ni-sign-paypal-alt" ></em></div>
                                                            <div class="coin-info"><span class="coin-name" id="gateway">Payment Method</span><span class="coin-text" id="slogan">Select Payment Method</span></div>
                                                        </div>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-auto dropdown-menu-mxh">
                                                        <ul class="buysell-cc-list">
                                                        @foreach($withdrawMethod as $gate)
                                                         <li class="buysell-cc-item"  onclick="goDoSomething(this);"  data-id="{{$gate->name}}" data-id4="{{$gate->id}}"  data-id3="{{$gate->icon}}" data-id2="{{$gate->slogan}}">
                                                                <a href="#" class="buysell-cc-opt" data-currency="eth">
                                                                    <div class="coin-item coin-eth">
                                                                        <div class="coin-icon"><em class="icon ni ni-{{$gate->symbol}}"></em></div>
                                                                        <div class="coin-info"><span class="coin-name">{{$gate->name}}</span><span class="coin-text">{{$gate->slogan}}</span></div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach


                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <input id="gate" name="method_id" hidden>
                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount">Amount to Buy</label></div>
                                                <div class="form-control-group">
                                                    <input type="number" class="form-control form-control-lg form-control-number" name="amount" placeholder=" 0.00" id="mySelect3" onkeyup="myFunction1()" />
                                                    <div class="form-dropdown">

                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-indicator-caret" data-toggle="dropdown" data-offset="0,2">{{$basic->currency}}</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                 </div>
                                                 
                                                 
                                                 
                                                 
                                                 
                                        @if(Auth::user()->setpin == 1)
                                                  <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount">Enter Transaction Pin</label></div>
                                                <div class="form-control-group">
                                                    <input type="password" class="form-control form-control-lg form-control-number" name="pin" placeholder=" Enter Transaction Pin"  />
                                                     
                                                </div>
                                                 </div>
                                        @endif
                                                 
                                                 

                                            <div class="buysell-field form-action"><button  type="submit" class="btn btn-lg btn-block btn-primary" >Withdraw</button></div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@stop
