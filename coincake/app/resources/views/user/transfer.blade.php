@extends('include.dashboard')


@section('content')
     <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">

                                    <div class="buysell-title text-center"><h4 class="title">Transfer Fund!</h4>
                                    <p class="lead text-primary">Your currently have  <strong>{{$basic->currency}} {{number_format(Auth::user()->balance, $basic->decimal)}} </strong> in your deposit wallet. </p><p>To transfer fund from your wallet to another user's wallet, enter the receiver's username and proceed to enter amount to transfer.</p><p>To <strong>ensure safe delivery</strong> of fund to user please enter <strong>a valid account username</strong> </p>

                                    </div>
                                    <div class="buysell-block">

                                        <form method="post"  class="buysell-form" action="{{route('update.transfer') }}">
                                        @csrf





                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount">Enter Username</label></div>
                                                <div class="form-control-group">
                                                    <input type="text" class="form-control form-control-lg" name="username"  placeholder="Enter Receiver's Username" id="mySelect3" onkeyup="myFunction1()" />

                                                </div>
                                                 </div>


                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount">Amount to Transfer</label></div>
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
                                                 
                                                 

                                            <div class="buysell-field form-action"><button  type="submit" class="btn btn-lg btn-block btn-primary" >Transfer Fund</button></div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
@stop
