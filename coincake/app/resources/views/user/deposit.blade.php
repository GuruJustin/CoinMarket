@extends('include.dashboard')
@section('content')
  <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">
                                <div class="buysell  ">

                                    <div class="buysell-title text-center"><h4 class="title">Deposit Fiat</h4></div>
                                    <div class="buysell-block">
                                        <form method="post" class="buysell-form" action="{{route('deposit.data-insert')}}">
                                         @csrf
                                            </div>
                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label" for="buysell-amount">Amount to Deposit</label></div>
                                                <div class="form-control-group">
                                                    <input type="number" class="form-control form-control-lg form-control-number" id="buysell-amount" name="amount"  placeholder="0.00" />
                                                    <div class="form-dropdown">
                                                           <div class="dropdown">
                                                            <a href="#" class="dropdown-indicator-caret" data-toggle="dropdown" data-offset="0,2">{{$basic->currency}}</a>
                                                            <div class="dropdown-menu dropdown-menu-xxs dropdown-menu-right text-center">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    </div>
                                            <div class="buysell-field form-group">
                                                <div class="form-label-group"><label class="form-label">Payment Method</label></div>
                                                <div class="form-pm-group">
                                                    <ul class="buysell-pm-list">
                                                    <? $gates = DB::table('gateways')->whereCoin(0)->whereStatus(1)->where('id' ,'>' ,  99)->orderBy('name','asc')->get(); ?>
                                                    @foreach($gates as $data)
                                                        <li class="buysell-pm-item">
                                                            <input class="buysell-pm-control" type="radio" value="{{$data->id}}" name="gateway" id="pm-{{$data->name}}" />
                                                            <label class="buysell-pm-label" for="pm-{{$data->name}}">
                                                                <span class="pm-name">{{$data->name}}</span><span class="pm-icon"><em class="icon ni ni-{{$data->val7}}"></em></span>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                        <li class="buysell-pm-item">
                                                            <input class="buysell-pm-control" type="radio" ame="gateway" value="bank" id="pm-bank" />
                                                            <label class="buysell-pm-label" for="pm-bank">
                                                                <span class="pm-name">Bank Transfer</span><span class="pm-icon"><em class="icon ni ni-building-fill"></em></span>
                                                            </label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="buysell-field form-action"><button type="submit" class="btn btn-lg btn-block btn-primary">Proceed</button></div>
                                            <div class="form-note text-base text-center">* Payment gateway company may charge you a <a href="#">processing fee.</a>.</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>@stop
