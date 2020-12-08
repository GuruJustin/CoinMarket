@extends('include.dashboard')
@section('content')
  <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">
                                <div class="buysell  ">

                                    <div class="buysell-title text-center"><h4 class="title">Deposit With Stripe</h4></div>
                                    <div class="buysell-block">

                                         <form role="form" class="buysell-form"  id="payment-form" method="POST" action="{{ route('ipn.stripe')}}">
                                            @csrf
                                            </div>
                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount">Card Owner's Name</label></div>
                                                <div class="form-control-group">
                                                   <input type="text" class="form-control form-control-lg form-control-number" name="name" placeholder="Card Name" autocomplete="off" autofocus/>
                                                    <div class="form-dropdown">
                                                          <em class="icon ni ni-user"></em>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount">Card Number</label></div>
                                                <div class="form-control-group">
                                                    <input type="tel" class="form-control form-control-lg form-control-number"  name="cardNumber" placeholder="Valid Card Number" autocomplete="off"
                                               required autofocus/>
                                                     <div class="form-dropdown">
                                                          <em class="icon ni ni-lock"></em>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount">Expiry Date</label></div>
                                                <div class="form-control-group">
                                                   <input  type="tel" class="form-control form-control-lg form-control-number"  name="cardExpiry" placeholder="MM / YYYY" autocomplete="off" required  />
                                                    <div class="form-dropdown">
                                                          <em class="icon ni ni-calendar"></em>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount">CCV Code</label></div>
                                                <div class="form-control-group">
                                                    <input type="number" class="form-control form-control-lg form-control-number" name="cardCVC" placeholder="Valid Card Number" autocomplete="off"
                                               required autofocus/>
                                                     <div class="form-dropdown">
                                                          <em class="icon ni ni-menu"></em>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buysell-field form-action"><button type="submit" class="btn btn-lg btn-block btn-primary">Proceed</button></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>@stop
