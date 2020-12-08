@extends('include.dashboard')

@section('content')
   <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">

                                        <h4 class="nk-block-title fw-normal">Payment Settings</h4>
                                        <div class="nk-block-des">
                                            <p>
                                                You have full control to manage your own account payment setting.
                                                <span class="text-primary"><em class="icon ni ni-info" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></em></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nk-nav nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link" href="{{route('profile')}}">Personal</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('security')}}">Security</a></li>
                                    <li class="nav-item"><a class="nav-link  active" href="#">Payment Account</a></li>
                                   
                                </ul>
                                <div class="nk-block">
                                @if(Auth::user()->verified == 0)
                                    <div class="alert alert-warning">
                                        <div class="alert-cta flex-wrap flex-md-nowrap">
                                            <div class="alert-text"><p>Verify your account to unlock full feature and increase your limit of transaction amount.</p></div>
                                            <ul class="alert-actions gx-3 mt-3 mb-1 my-md-0">
                                                <li class="order-md-last"><a href="{{ route('user.authorization')}}" class="btn btn-sm btn-warning">Verify</a></li>
                                                <li><a href="{{ route('user.authorization')}}" class="link link-primary">Learn More</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Payment Details</h5>
                                            <div class="nk-block-des"><p>Basic payment details for fund withdrawal on {{$basic->sitename}}.</p></div>
                                        </div>
                                    </div>
                                    <div class="nk-data data-list">
                                        <div class="data-head"><h6 class="overline-title">Bank Details</h6></div>
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col"><span class="data-label">Bank Name</span><span class="data-value">{{isset(Auth::user()->bank) ? Auth::user()->bank : 'N/A'}}</span></div>
                                            <div class="data-col data-col-end">
                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>

                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col"><span class="data-label">Account Number</span><span class="data-value text-soft">{{isset(Auth::user()->accountno) ? Auth::user()->accountno : 'N/A'}}</span></div>
                                            <div class="data-col data-col-end">
                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col"><span class="data-label">Account Name</span><span class="data-value">{{isset(Auth::user()->accountname) ? Auth::user()->accountname : 'N/A'}}</span></div>
                                            <div class="data-col data-col-end">
                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                            <div class="data-col">
                                                <span class="data-label">Bitcoin Address</span>
                                                <span class="data-value">
                                                    {{isset(Auth::user()->btcwallet) ? Auth::user()->btcwallet : 'N/A'}}
                                                </span>
                                            </div>
                                            <div class="data-col data-col-end">
                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                            <div class="data-col">
                                                <span class="data-label">Paypal Address</span>
                                                <span class="data-value">
                                                    {{isset(Auth::user()->paypal) ? Auth::user()->paypal : 'N/A'}}
                                                </span>
                                            </div>
                                            <div class="data-col data-col-end">
                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>





        <div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-lg">
                        <h5 class="title">Update Profile</h5>
                        <ul class="nk-nav nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal">Bank Details</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#address">Wallet Address</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal">
                           <form method="post" action="{{route('post.banky') }}">
@csrf
                                <div class="row gy-4">
                                    <div class="col-md-12">
                                    <script>
function myFunction() {
  var bank = $("#mybank option:selected").attr('data-bank');
  var bankname = $("#mybank option:selected").attr('data-bankname');

 if(bank ==  0){
  document.getElementById("bank").innerHTML = " ";
 }
 if(bank ==  1)
 {
 document.getElementById("bank").innerHTML = "<div class='form-group'><label class='form-label'>Enter Your " + bankname + " Account Number</label><input name='actnumber'  required  class='form-control' type='text'></div> ";}
 if(bank ==  2)
 {
 document.getElementById("bank").innerHTML = " <div class='form-group'><label class='form-label'>Enter Bank Name</label><input required name='bankname' class='form-control' type='text'></div><div class='form-group'><label class='form-label'>Account Number</label><input  required  name='acctname' class='form-control' type='text'></div><div class='form-group'><label class='form-label'>Account Name</label><input name='actnumber'  required  class='form-control' type='text'></div>";}

 };
</script>
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Bank Name</label>
                                            <select required  class="form-control form-control-lg" name="bank" id="mybank" onchange="myFunction()">
<? $method = DB::table('localbanks')->get(); ?>
<option value="none">Choose...</option>

@foreach($method as $data)
<option data-bank="1" data-bankname="{{$data->bank}}" value="{{$data->code}}">{{$data->bank}} </option>
@endforeach

<option data-bank="2" value="other"><b>Other Banks</b></option>
</select>
                                        </div>
                                    </div>


<div class="col-12">
<div id="bank"></div></div>




                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                            <input name="updateprof" hidden>
                                            <input type="submit" name="Update Bank" value="Update Profile" class="btn btn-lg btn-primary"></input></li>
                                            <li><a href="#" data-dismiss="modal" class="link link-light">Cancel</a></li>
                                        </ul>
                                    </div>

                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="address">
                             <form method="post" action="{{route('post.banky') }}">
@csrf
                                <div class="row gy-4">
                                    <div class="col-md-12">
                                        <div class="form-group"><label class="form-label" for="address-l1">Paypal Address</label><input type="text" class="form-control form-control-lg" id="address-l1"  name="paypal"  value="{{isset(Auth::user()->paypal) ? Auth::user()->paypal : 'N/A'}}" /></div>
                                    </div>
   <div class="col-md-12">
                                        <div class="form-group"><label class="form-label" for="address-l1">Bitcoin Wallet Address</label><input type="text" class="form-control form-control-lg" id="address-l1" name="btc" value="{{isset(Auth::user()->btcwallet) ? Auth::user()->btcwallet : 'N/A'}}" /></div>
                                    </div>

                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li><input name="wallet" value="wallet" hidden>
                                            <button type="submit" value="" class="btn btn-lg btn-primary">Update Wallet</button></li>
                                            <li><a href="#" data-dismiss="modal" class="link link-light">Cancel</a></li>
                                        </ul>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
