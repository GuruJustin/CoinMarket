@extends('include.dashboard')

@section('content')

  <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                                    <div class="nk-content-wrap">
                                        <div class="nk-block-head nk-block-head-lg">

                                            <div class="nk-block-between-md g-4">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title fw-normal">Purchase E-Currency</h4>
                                                    <div class="nk-block-des"><p>Purchase E-currency from users on the {{$basic->sitename}} market place</p></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-block">
                                            <ul class="sp-pdl-list">
                                            <script type="text/javascript">

        function goDoSomething(identifier){

 document.getElementById("curname").innerHTML = $(identifier).data('option');
 document.getElementById("curid").value = $(identifier).data('id');
        }

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
       data-option="{{$data->name}}"  data-target="#sellmart" class="btn btn-primary">Buy</a></div>
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
                    <h5 class="modal-title">Buy <a id="curname"></a> on the market place<a id="name"> </h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>

                <div class="modal-body">





                    <form method="POST" class="form-validate is-alter" action="{{ route('buyonmarketpost') }}">
                    @csrf
                    <br>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Enter Amount</label>
                            <div class="form-control-wrap">
                               <input id="usd" onkeyup="myFunction()" name="amount" placeholder="$0.00" class="form-control form-control-lg form-control-number" type="number">
                               <small id="local"></small>
                                <input type="hidden" name="coin" id="curid"/>
                            </div>
                        </div>




                        <div class="form-group">
                            <label class="form-label">Note</label><br><small><span class="card-sub-titsle text-info font-mid">You will be required to make payment for your intended purchase before delivery. This is done to ensure safety of our sellers and proper monitoring of transactions to prevent fraud or loss of integrity on {{$basic->sitename}}. You are covered as there is refund policy for every unsuccessful trade on {{$basic->sitename}}. </span></small>

                            </ul>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Proceed</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">&copy; {{$basic->sitename}} Coin Market </span>
                </div>
            </div>
        </div>
    </div>
@endsection
