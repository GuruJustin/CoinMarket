@extends('include.admindashboard')

@section('body')

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">{{$page_title}}</h3>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->


<div class="nk-block">

    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
        <thead>
            <tr class="nk-tb-item nk-tb-head">
                <th class="nk-tb-col"><span class="sub-text">Tranx ID</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Currency</span></th>
                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Buyer</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Seller</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Amount</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Payment Gateway</span></th>
                <th class="nk-tb-col nk-tb-col-tools text-right"></th>
            </tr>
        </thead>

        <tbody>
            @foreach($market as $k=> $data)
            <tr class="nk-tb-item">
                <td class="nk-tb-col">
                    <div class="user-card">
                        @if($data->paid < 1 )
                        <div class="user-avatar bg-dim-success d-none d-sm-flex">
                            <span>AP</span>
                        </div>
                        @elseif($data->paid == 1)
                        <div class="user-avatar bg-dim-danger d-none d-sm-flex">
                            <span>REJ</span>
                        </div>
                        @elseif($data->paid == 2)
                        <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                            <span>PD</span>
                        </div>
                        @endif
                        <div class="user-info">
                            <span class="tb-lead">{{$data->trx}}<span class="dot dot-success d-md-none ml-1"></span></span>
                            <span>{!! date('D. M d, Y', strtotime($data->created_at)) !!}</span>
                        </div>
                    </div>
                </td>
                <td class="nk-tb-col tb-col-mb">
                    <span class="tb-lead">{{App\Currency::whereId($data->coin)->first()->name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                    <span>{{App\Currency::whereId($data->coin)->first()->symbol}}</span>
                </td>
                <td class="nk-tb-col tb-col-mb">
                    <span class="tb-lead">{{isset(App\User::whereId($data->buyer)->first()->username) ? App\User::whereId($data->buyer)->first()->username  : 'N/A'}}<span class="dot dot-success d-md-none ml-1"></span></span>
                    <span>{{isset(App\User::whereId($data->buyer)->first()->country) ? App\User::whereId($data->buyer)->first()->country  : 'N/A'}}</span>
                </td>

                <td class="nk-tb-col tb-col-mb">
                    <span class="tb-lead">{{isset(App\User::whereId($data->seller)->first()->username) ? App\User::whereId($data->seller)->first()->username  : 'N/A'}}<span class="dot dot-success d-md-none ml-1"></span></span>
                    <span>{{isset(App\User::whereId($data->seller)->first()->country) ? App\User::whereId($data->seller)->first()->country  : 'N/A'}}</span>
                </td>
                <td class="nk-tb-col tb-col-mb">
                    <span class="tb-lead">${{number_format($data->amount, $basic->decimal)}}<span class="dot dot-success d-md-none ml-1"></span></span>
                </td>
                <td class="nk-tb-col tb-col-mb">
                    <span class="tb-lead">{{isset(App\Gateway::whereId($data->gateway)->first()->name) ? App\Gateway::whereId($data->gateway)->first()->name : 'N/A'}}<span class="dot dot-success d-md-none ml-1"></span></span>
                    <span>Online</span>
                </td>
                <td class="nk-tb-col nk-tb-col-tools">
                    <a href="{{route('viewdeal',$data->id)}}" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
