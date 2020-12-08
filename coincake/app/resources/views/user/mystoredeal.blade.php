@extends('include.dashboard')

@section('content')
    <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                                        <div class="nk-block-head nk-block-head-lg">

                                            <div class="nk-block-between-md g-4">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title fw-normal">{{$page_title}}</h4>
                                                    <div class="nk-block-des">
                                                        <p>
                                                            This {{App\Currency::whereId($store->coin)->first()->name}} market offer was created {{ Carbon\Carbon::parse($store->created_at)->diffForHumans() }}  <span class="text-primary"><em class="icon ni ni-alarm"></em></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="nk-block">
                                            <div class="row">
                                                <div class="col-xl-8">
                                                    <div class="card card-bordered">
                                                        <div class="card-inner-group">
                                                            <div class="card-inner">
                                                                <div class="sp-plan-head"><h6 class="title">Offer Details</h6></div>
                                                                <div class="sp-plan-desc sp-plan-desc-mb">
                                                                    <ul class="row gx-1">
                                                                        <li class="col-sm-4">
                                                                            <p><span class="text-soft">Created On</span> {!! date('D. M d, Y', strtotime($store->created_at)) !!}</p>
                                                                        </li>
                                                                        <li class="col-sm-4">
                                                                            <p><span class="text-soft">Amount</span> {{$basic->currency_sym}} {{number_format($store->amount, $basic->decimal)}}</p>
                                                                        </li>
                                                                        <li class="col-sm-4">
                                                                            <p><span class="text-soft">Access Code</span> {{$store->code}}</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="card-inner">
                                                                <div class="sp-plan-head-group">
                                                                    <div class="sp-plan-head"><h6 class="title">Pending Order</h6></div>
                                                                 @php
                                                                     $pending = \App\Coinmarketpay::whereSeller(Auth::user()->id)->whereMarketcode($store->code)->whereStatus(1)->sum('amount');
                                                                     @endphp

                                                                    <div class="sp-plan-amount">  <span class="amount text-warning">{{$basic->currency_sym}} {{number_format($pending, $basic->decimal)}}</span></div>
                                                                </div>
                                                                <div class="sp-plan-payopt">
                                                                    <div class="cc-pay">
                                                                     @php
                                                                     $count = \App\Coinmarketpay::whereSeller(Auth::user()->id)->whereMarketcode($store->code)->whereStatus(1)->count();
                                                                     @endphp
                                                                        <h6 class="title">You have {{$count}} requests</h6>
                                                                        <ul class="cc-pay-method">
                                                                            <li class="cc-pay-dd dropdown">
                                                                                <a href="#" class="btn btn-white btn-outline-light dropdown-toggle dropdown-indicator" data-toggle="dropdown">
                                                                                    <em class="icon ni ni-{{App\Currency::whereId($store->coin)->first()->icon}}"></em><span><span id="trx" class="cc-pay-star">Select Order
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-auto">
                                                                                 <script type="text/javascript">

                                            function goDoSomething1(identifier){

                                                document.getElementById("order").value = $(identifier).data('id');
                                                 document.getElementById("trx").innerHTML = $(identifier).data('id');
                                                }

                                        </script>

                                                                                    <ul class="link-list-plain">
                                                                                     @if(count($pend) > 0)
                                                                                     @foreach($pend as $data)

                                                                                        <li>
                                                                                            <a href="#" onclick="goDoSomething1(this);"  data-id="{{$data->trx}}"  class="cc-pay-item">
                                                                                                <em class="cc-pay-item-icon icon ni ni-{{App\Currency::whereId($store->coin)->first()->icon}}"></em>
                                                                                                <span class="cc-pay-item-name">
                                                                                                    <span class="cc-pay-item-method">Code: <span class="cc-pay-star">{{$data->trx}}</span></span>
                                                                                                    <span class="cc-pay-item-meta">Date: {!! date('D, d M, Y: h:m A', strtotime($data->created_at)) !!}</span>
                                                                                                </span>
                                                                                            </a>
                                                                                        </li>
                                                                                        @endforeach
                                                                                        @else

                                                                                        <li>
                                                                                            <a href="#" class="cc-pay-item">
                                                                                                <span class="cc-pay-item-name"><span class="cc-pay-item-method-new">No pending order</span></span>
                                                                                            </a>
                                                                                        </li>
                                                                                        @endif

                                                                                    </ul>
                                                                                </div>
                                                                            </li>
                                                                             <form method="post"  class="buysell-form" action="{{ route('view-order') }}">
                                                                             @csrf
                                                                            <li class="cc-pay-btn">
                                                                               <input id="order" name="order" hidden>
                                                                                <button type="submit"  class="btn btn-primary btn-dim" @if($count < 1) Disabled @endif><span>Verify Order</span> <em class="icon ni ni-arrow-long-right"></em></button>
                                                                            </li>
                                                                            </form>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-inner">
                                                                <div class="sp-plan-head-group">
                                                                    <div class="sp-plan-head">
                                                                        <h6 class="title">Successful Trade</h6>
                                                                        <span class="ff-italic text-soft">Sold {{App\Currency::whereId($store->coin)->first()->name}}</span>
                                                                    </div>
                                                                    <div class="sp-plan-amount">  <span class="amount text-success">{{$basic->currency_sym}} {{number_format($store->sold, $basic->decimal)}}</span></div>
                                                                </div>
                                                            </div>
                                                             <div class="card-inner">
                                                                <div class="sp-plan-head-group">
                                                                    <div class="sp-plan-head">
                                                                        <h6 class="title">Remaining Stock</h6>
                                                                        <span class="ff-italic text-soft">Available {{App\Currency::whereId($store->coin)->first()->name}}</span>
                                                                    </div>
                                                                    <div class="sp-plan-amount">  <span class="amount text-info">{{$basic->currency_sym}} {{number_format($store->balance, $basic->decimal)}}</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="card card-bordered card-full d-none d-xl-block">
                                                        <div class="nk-help-plain card-inner text-center">
                                                            <div class="nk-help-img">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                            <rect x="3" y="12.5" width="64" height="63.37" rx="7" ry="7" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <path d="M10,13.49H60a6,6,0,0,1,6,6v3.9a0,0,0,0,1,0,0H4a0,0,0,0,1,0,0v-3.9A6,6,0,0,1,10,13.49Z" fill="#e3e7fe" />
                                                            <rect x="3" y="23.39" width="64" height="1.98" fill="#6576ff" />
                                                            <path d="M65.37,31.31H76.81A12.24,12.24,0,0,0,87,42S88.12,66.31,65.37,77.5C42.62,66.31,43.75,42,43.75,42A12.23,12.23,0,0,0,53.93,31.31Z" fill="#fff" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <path d="M66,72.62c19-9.05,18.1-28.71,18.1-28.71s-7.47-.94-8.52-8.64H66Z" fill="#e3e7fe" />
                                                            <polygon points="56 46.16 55 46.16 55 42.2 59 42.2 59 43.2 56 43.2 56 46.16" fill="#010863" />
                                                            <polygon points="59 65.97 55 65.97 55 62.01 56 62.01 56 64.98 59 64.98 59 65.97" fill="#010863" />
                                                            <polygon points="78 65.97 74 65.97 74 64.98 77 64.98 77 62.01 78 62.01 78 65.97" fill="#010863" />
                                                            <polygon points="78 46.16 77 46.16 77 43.2 74 43.2 74 42.2 78 42.2 78 46.16" fill="#010863" />
                                                            <path d="M70,51.12H62V48.86a3.74,3.74,0,0,1,3.17-3.57c2.56-.46,4.83,1.28,4.83,3.49Zm-7-1h6V48.56a2.78,2.78,0,0,0-2-2.63,3,3,0,0,0-4,2.64Z" fill="#6576ff" />
                                                            <path d="M58,57.28V50.13H74V57.5c0,4.62-4.65,8.26-9.86,7.17A7.63,7.63,0,0,1,58,57.28Z" fill="#e5effe" />
                                                            <path d="M59,51.12v6.7A7,7,0,0,0,73,58V51.12Z" fill="#6576ff" />
                                                            <ellipse cx="66" cy="55.08" rx="2" ry="1.98" fill="#fff" />
                                                            <polygon points="68.91 62.01 63.84 62.01 65.18 56.07 67.57 56.07 68.91 62.01" fill="#fff" />
                                                            <path d="M72,51.12H60V48.66a5.41,5.41,0,0,1,4.06-5.14c4.13-1.14,7.94,1.54,7.94,5Zm-11-1H71V48.49A4.69,4.69,0,0,0,67.08,44c-3.23-.6-6.08,1.58-6.08,4.33Z" fill="#6576ff" />
                                                            <rect x="13" y="32.3" width="22" height="5.94" rx="1" ry="1" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <rect x="12" y="45.17" width="22" height="5.94" rx="1" ry="1" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <rect x="12" y="57.06" width="12" height="5.94" rx="1" ry="1" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" /></svg>
                                                            </div>
                                                            <div class="nk-help-text">
                                                                <h5>Store Maintenance</h5>
                                                                <p class="text-soft">Your market offer is currently @if($store->status == 1) <a href="#">Active</a> @else <a href="#">Inactive</a> @endif you can @if($store->status == 1) deactivate @else activate @endif it by clicking on the button below. Please note that every successful transaction on the market place attracts a service charge of  <span class="ext-base">{{$basic->escrow}}%</span> per transaction.</p>
                                                            </div>
                                                             @if($store->status == 1)
                                                            <div class="nk-help-action"><a href="#" data-toggle="modal" data-target="#subscription-cancel" class="btn btn-lg btn-primary">Cancel Market Offer</a></div>
                                                            @endif
                                                             @if($store->status == 0)
                                                             <div class="nk-help-action"><a href="#" data-toggle="modal" data-target="#subscription-cancel" class="btn btn-lg btn-primary">Activate Market Offer</a></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card card-bordered d-xl-none">
                                                        <div class="card-inner">
                                                            <div class="nk-help">
                                                                <div class="nk-help-img">
                                                                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                            <rect x="3" y="12.5" width="64" height="63.37" rx="7" ry="7" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <path d="M10,13.49H60a6,6,0,0,1,6,6v3.9a0,0,0,0,1,0,0H4a0,0,0,0,1,0,0v-3.9A6,6,0,0,1,10,13.49Z" fill="#e3e7fe" />
                                                            <rect x="3" y="23.39" width="64" height="1.98" fill="#6576ff" />
                                                            <path d="M65.37,31.31H76.81A12.24,12.24,0,0,0,87,42S88.12,66.31,65.37,77.5C42.62,66.31,43.75,42,43.75,42A12.23,12.23,0,0,0,53.93,31.31Z" fill="#fff" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <path d="M66,72.62c19-9.05,18.1-28.71,18.1-28.71s-7.47-.94-8.52-8.64H66Z" fill="#e3e7fe" />
                                                            <polygon points="56 46.16 55 46.16 55 42.2 59 42.2 59 43.2 56 43.2 56 46.16" fill="#010863" />
                                                            <polygon points="59 65.97 55 65.97 55 62.01 56 62.01 56 64.98 59 64.98 59 65.97" fill="#010863" />
                                                            <polygon points="78 65.97 74 65.97 74 64.98 77 64.98 77 62.01 78 62.01 78 65.97" fill="#010863" />
                                                            <polygon points="78 46.16 77 46.16 77 43.2 74 43.2 74 42.2 78 42.2 78 46.16" fill="#010863" />
                                                            <path d="M70,51.12H62V48.86a3.74,3.74,0,0,1,3.17-3.57c2.56-.46,4.83,1.28,4.83,3.49Zm-7-1h6V48.56a2.78,2.78,0,0,0-2-2.63,3,3,0,0,0-4,2.64Z" fill="#6576ff" />
                                                            <path d="M58,57.28V50.13H74V57.5c0,4.62-4.65,8.26-9.86,7.17A7.63,7.63,0,0,1,58,57.28Z" fill="#e5effe" />
                                                            <path d="M59,51.12v6.7A7,7,0,0,0,73,58V51.12Z" fill="#6576ff" />
                                                            <ellipse cx="66" cy="55.08" rx="2" ry="1.98" fill="#fff" />
                                                            <polygon points="68.91 62.01 63.84 62.01 65.18 56.07 67.57 56.07 68.91 62.01" fill="#fff" />
                                                            <path d="M72,51.12H60V48.66a5.41,5.41,0,0,1,4.06-5.14c4.13-1.14,7.94,1.54,7.94,5Zm-11-1H71V48.49A4.69,4.69,0,0,0,67.08,44c-3.23-.6-6.08,1.58-6.08,4.33Z" fill="#6576ff" />
                                                            <rect x="13" y="32.3" width="22" height="5.94" rx="1" ry="1" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <rect x="12" y="45.17" width="22" height="5.94" rx="1" ry="1" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                            <rect x="12" y="57.06" width="12" height="5.94" rx="1" ry="1" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" /></svg>
                                                                </div>
                                                                <div class="nk-help-text">
                                                                    <h5>Store Maintenance</h5>
                                                                <p class="text-soft">Your market offer is currently @if($store->status == 1) <a href="#">Active</a> @else <a href="#">Inactive</a> @endif you can @if($store->status == 1) deactivate @else activate @endif it by clicking on the button below. Please note that every successful transaction on the market place attracts a service charge of  <span class="ext-base">{{$basic->escrow}}%</span> per transaction.</p>
                                                            </div>
                                                             @if($store->status == 1)
                                                            <div class="nk-help-action"><a href="#" data-toggle="modal" data-target="#subscription-cancel" class="btn btn-lg btn-primary">Cancel Market Offer</a></div>
                                                            @endif
                                                             @if($store->status == 0)
                                                             <div class="nk-help-action"><a href="#" data-toggle="modal" data-target="#subscription-cancel" class="btn btn-lg btn-primary">Activate Market Offer</a></div>
                                                            @endif   </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-block">
                                            <div class="card card-bordered">
                                                <div class="card-inner card-inner-md">
                                                    <div class="card-title-group">
                                                        <h6 class="card-title">Transactions Log</h6>
                                                        <div class="card-action"><a href="#" class="link link-sm">Download Statement</a></div>
                                                    </div>
                                                </div>
                                                <table class="table table-tranx">
                                                    <thead>
                                                        <tr class="tb-tnx-head">
                                                            <th class="tb-tnx-id"><span class="">#</span></th>
                                                            <th class="tb-tnx-info">
                                                                <span class="tb-tnx-desc d-none d-sm-inline-block"><span>Bill For</span></span>
                                                                <span class="tb-tnx-date d-md-inline-block d-none">
                                                                    <span class="d-md-none">Date</span><span class="d-none d-md-block"><span>Issue Date</span><span>Issue Time</span></span>
                                                                </span>
                                                            </th>
                                                            <th class="tb-tnx-amount"><span class="tb-tnx-total">Total</span><span class="tb-tnx-status d-none d-md-inline-block">Status</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(count($deal) > 0)
                                                    @foreach($deal as $data)
                                                        <tr class="tb-tnx-item">
                                                            <td class="tb-tnx-id">
                                                                <a href="{{ route('viewtrx', $data->trx) }}"><span>{{$data->trx}}</span></a>
                                                            </td>
                                                            <td class="tb-tnx-info">
                                                                <div class="tb-tnx-desc"><span class="title">{{isset(App\User::whereId($data->buyer)->first()->username) ? App\User::whereId($data->buyer)->first()->username  : 'N/A'}} <b>({{isset(App\Currency::whereId($data->coin)->first()->name) ? App\Currency::whereId($data->coin)->first()->name  : 'N/A'}})</b></span></div>
                                                                <div class="tb-tnx-date"><span class="date">{!! date('D, d/M, Y', strtotime($data->created_at)) !!}</span><span class="date">{!! date('h:m A', strtotime($data->created_at)) !!}</span></div>
                                                            </td>
                                                            <td class="tb-tnx-amount">
                                                                <div class="tb-tnx-total"><span class="amount">${{number_format($data->amount, $basic->decimal)}} </span></div>
                                                                @if($data->status == 1)
                                                                <div class="tb-tnx-status"><span class="badge badge-dot badge-warning">Pending</span></div>
                                                                @elseif($data->status == 2)
                                                                <div class="tb-tnx-status"><span class="badge badge-dot badge-success">Approved</span></div>
                                                                @elseif($data->status == 3)
                                                                <div class="tb-tnx-status"><span class="badge badge-dot badge-warning">Declined</span></div>
                                                                @else
                                                                <div class="tb-tnx-status"><span class="badge badge-dot badge-secondary">Unknown</span></div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <center><code>No Order Yet On This Store</code></center>
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                             {{$deal->links()}}
                                        </div>
                                    </div>












            <div class="modal fade" tabindex="-1" id="subscription-cancel">
            @if($store->status > 0)
             <form method="post"  class="buysell-form" action="{{ route('closemarket', $store->id) }}">
             @csrf
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-md">
                            <h4 class="nk-modal-title title">Deactivate Market Offer</h4>
                            <p><strong>Are you sure you want to cancel your market offer?</strong></p>
                            <p>If you cancel, you'll lose your all pending or unprocessed orders.</p>
                            <div class="form">
                                <div class="form-group">
                                    <label class="form-label">Enter your password to confirm cancellation</label>
                                    <div class="form-control-wrap"><input type="password" name="password" class="form-control" placeholder="*********" /></div>
                                    <div class="form-note"><span>You'll receieve confirmation email once successfully cancel your offer.</span></div>
                                </div>
                                <ul class="align-center flex-wrap g-3">
                                    <li><button class="btn btn-primary" type="submit">Deactivate Market</button></li>
                                    <li><a href="#" class="btn btn-light" data-dismiss="modal">Never mind, don't cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                 @elseif($store->status < 1)



                 <form method="post"  class="buysell-form" action="{{ route('openmarket', $store->id) }}">
                @csrf
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-md">
                            <h4 class="nk-modal-title title">Activate Market Offer</h4>
                            <p><strong>Are you sure you want to activate your market offer?</strong></p>
                            <p>If you activate, all pending or unprocessed orders will be re-activated.</p>
                            <div class="form">
                                <div class="form-group">
                                    <label class="form-label">Enter your password to confirm activation</label>
                                    <div class="form-control-wrap"><input type="password" name="password" class="form-control" placeholder="*********" /></div>
                                    <div class="form-note"><span>You'll receieve confirmation email once you successfully activate your offer.</span></div>
                                </div>
                                <ul class="align-center flex-wrap g-3">
                                    <li><button class="btn btn-primary" type="submit">Activate Market</button></li>
                                    <li><a href="#" class="btn btn-light" data-dismiss="modal">Never mind, don't activate</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                @endif

            </div>

        </div>
@endsection
