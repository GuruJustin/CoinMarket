@extends('include.dashboard')

@section('content')

  <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                                    <div class="nk-content-wrap">
                                        <div class="nk-block-head nk-block-head-lg">

                                            <div class="nk-block-between-md g-4">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title fw-normal">Create Offer</h4>
                                                    <div class="nk-block-des"><p>Create new offer for the {{$basic->sitename}} market place</p></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-block">
                                            <ul class="sp-pdl-list">
                                            <script type="text/javascript">

        function goDoSomething(identifier){

 document.getElementById("curname").innerHTML = $(identifier).data('option');
 document.getElementById("curname2").innerHTML = $(identifier).data('option');
 document.getElementById("curid").value = $(identifier).data('id');
 document.getElementById("cur").innerHTML = $(identifier).data('cur');
 var z = Math.floor($(identifier).data('price'));
 document.getElementById("price").innerHTML = z;
        }

    </script>
<script>
function myFunction() {
 var usd = $('#usd').val() ;
 var rate = usd*'{{$basic->rate}}';
 document.getElementById("local").value = "{{$basic->currency_sym}}"+rate;

 };
</script>
                                            @foreach($currency as $data)
                                                <li class="sp-pdl-item">
                                                    <div class="sp-pdl-desc">
                                                        <div class="sp-pdl-img"><div class="coin-icon" id="icon"><em class="icon ni ni-{{$data->icon}}" ></em></div></div>
                                                        <div class="sp-pdl-info">
                                                            <h6 class="sp-pdl-title"><span class="sp-pdl-name">{{$data->name}}</span> <span class="badge badge-dim badge-primary badge-pill">New</span></h6>
                                                            <div class="sp-pdl-meta">
                                                                <span class="version"><span class="text-soft">Rate: </span> <span>1{{$data->symbol}} = ${{$data->price}}</span></span>
                                                                <span class="release"><span class="text-soft">Our Commission: </span> <span>{{$basic->escrow}}%</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sp-pdl-btn"><a href="#" data-toggle="modal" onclick="goDoSomething(this);" id="option1"
       data-id="{{$data->id}}" data-price="{{$data->price}}"  data-cur="{{$data->symbol}}"
       data-option="{{$data->name}}"  data-target="#sellmart" class="btn btn-primary">Create</a></div>
                                                </li>


                                            @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                    </div>
                                    </div>




                                      <div class="modal fade" tabindex="-1" id="sellmart">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sell <a id="curname"></a> on the market place<a id="name"> </h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>

                <div class="modal-body">

                <p class="lead text-primary">Rate: 1<a id="cur"></a>  =  <a id="price"></a>$ </p>
                <div class="note note-plane note-light mgb-1x"><em class="fas fa-info-circle"></em><p>The sold <a id="curname2"></a> will be approved after your transaction has been confirmed by the buyer and fund will be credited to the seller .</p></div>
                <div class="note note-plane note-danger"><em class="fas fa-info-circle"></em><p>Ensure you have updated your <strong>payment account details</strong> and note that {{$basic->sitename}} will not be liable for any loss arising from your trading outside the platform.</p></div>
                    <div class="note note-plane note-info"><em class="fas fa-info-circle"></em><code><p>You will be charged {{$basic->escrow}}% of any successful sales made on the {{$basic->sitename}} cryptocurrency market place.</p></code></div>

                    <form method="POST" class="form-validate is-alter" action="{{route('sellonmarketpost')}}">
                    @csrf
                    <br>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Enter Amount</label>
                            <div class="form-control-wrap">
                               <input id="usd" onkeyup="myFunction()" name="amount" placeholder="$0.00" class="form-control" type="number">
                               <small id="local"></small>
                                <input type="hidden" name="coin" id="curid"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Select Buyer</label>
                            <div class="form-control-wrap">
                                <select required  class="form-control" name="buyer">

<option>Choose...</option>
<option  value="1"><b>Any User</b></option>
<option  value="2"><b>Verified Users Only</b></option>
</select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="full-name">Details</label>
                            <div class="form-control-wrap">
                               <textarea name="details" placeholder="Enter details to prospective buyers" class="form-control" type="text"></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Notification</label><br><small>Please note that SMS & Phone services are charged</small>
                            <ul class="custom-control-group g-3 align-center">
                                <li>
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                        <input type="checkbox" name="email" class="custom-control-input" id="com-email">
                                        <label class="custom-control-label" for="com-email">Email</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                        <input type="checkbox" name="sms" class="custom-control-input" id="com-sms">
                                        <label class="custom-control-label" for="com-sms">SMS</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                        <input type="checkbox" name="phone" class="custom-control-input" id="com-phone">
                                        <label class="custom-control-label" for="com-phone">Phone Call</label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Proceed</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">&copy; {{$basic->sitename}} Coin Market</span>
                </div>
            </div>
        </div>
    </div>
@endsection
