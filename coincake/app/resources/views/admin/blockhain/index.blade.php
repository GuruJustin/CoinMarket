@extends('include.admindashboard')
@section('body')


<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">{{$coin->name}} Wallet</h3>
            @if(count($wallet) == 0)
            <div class="nk-block-des text-soft">
                <p>There is no {{$coin->name}} Wallet to show</p>
            </div>
            @endif
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->

@if(count($wallet) > 0)
<div class="nk-block">
    <div class="row g-gs">
        @foreach($wallet as $data)
        <div class="col-lg-4">
            <div class="card card-bordered card-full">
                <div class="card-inner d-flex flex-column h-100">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <img src="{{asset('dash-assets/images')}}/{{$coin->logo}}" style="width:150px;height:50px;" alt="{{$coin->logo}}">
                        </div>
                        <div class="card-tools mt-n4 mr-n1">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" ><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="{{route('admin.viewwallet',$data->address)}}">Open Wallet</a></li>
                                        @if($data->status == 1)
                                        <li><a class="quick-action" href="{{route('admin.blockwallet',$data->address)}}" data-name="bank">Block Wallet</a></li>
                                        @elseif($data->status == 0)
                                        <li><a class="quick-action" href="{{route('admin.unblockwallet',$data->address)}}" data-name="bank">Unblock Wallet</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress-list gy-3">
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <h4 class="progress-label">Wallet Adress:</h4>
                            </div>
                                <p class="payment-text">{{$data->address}}</p>
                        </div>
                        
                        @if($data->status == 1)
                        <h4><em class="icon ni ni-coins"></em> &nbsp;&nbsp;{{$data->balance}} {{$coin->currency}}</h4>
                        @else
                        <div class="payment-status payment-status-disabled">
                            <span class="payment-status-icon"><em class="ti ti-na"></em></span>
                            <div class="payment-status-text">Currently Blocked</div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

@stop
