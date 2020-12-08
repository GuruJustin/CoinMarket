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
                <th class="nk-tb-col"><span class="sub-text">Username</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Amount</span></th>
                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Net Amount</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Method</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                <th class="nk-tb-col nk-tb-col-tools text-right">
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach($withdrawLog as $k=> $data)
            <tr class="nk-tb-item">
                <td class="nk-tb-col">
                    <div class="user-card">
                        @if($data->status==1)
                        <div class="user-avatar bg-dim-success d-none d-sm-flex">
                            <span>AP</span>
                        </div>
                        @elseif($data->status==0)
                        <div class="user-avatar bg-dim-danger d-none d-sm-flex">
                            <span>REJ</span>
                        </div>
                        @elseif($data->status==-2)
                        <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                            <span>PD</span>
                        </div>
                        @endif
                        <div class="user-info">
                            <span class="tb-lead">{{$data->user->username}}<span class="dot dot-success d-md-none ml-1"></span></span>
                            <span>{{$data->created_at}}</span>
                        </div>
                    </div>
                </td>
                <td class="nk-tb-col tb-col-mb">
                     <span class="tb-lead">{!! number_format($data->amount, $basic->decimal)  !!}<span class="dot dot-success d-md-none ml-1"></span></span>
                     <span>{{$basic->currency}}</span>
                </td>
                <td class="nk-tb-col tb-col-mb">
                     <span class="tb-lead">{!! number_format($data->net_amount, $basic->decimal)  !!}<span class="dot dot-success d-md-none ml-1"></span></span>
                     <span>{{$basic->currency}}</span>
                </td>
                <td class="nk-tb-col tb-col-mb">
                     <span class="tb-lead">{!! $data->method->name !!}</span>
                </td>
                <td class="nk-tb-col tb-col-md">
                    @if($data->status==2)
                        <span class="tb-status text-success">Approved</span>
                    @elseif($data->status==-2)
                        <span class="tb-status text-danger">Rejected</span>
                    @else
                        <span class="tb-status text-primary">Pending</span>
                    @endif
                </td>
                <td class="nk-tb-col nk-tb-col-tools">
                    <ul class="nk-tb-actions gx-1">
                        <li class="nk-tb-action-hidden">
                            <a href="{{route('withdraw.view',$data->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="View Details">
                                <em class="icon ni ni-eye"></em>
                            </a>
                        </li>
                        <li class="nk-tb-action-hidden">
                            <a href="{{route('withdraw.approve',$data->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Approve">
                                <em class="icon ni ni-activity-round"></em>
                            </a>
                        </li>
                        <li class="nk-tb-action-hidden">
                            <a href="{{route('withdraw.reject',$data->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Decline">
                                <em class="icon ni ni-na"></em>
                            </a>
                        </li>
                        <li>
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="{{route('withdraw.view',$data->id)}}"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                        <li><a href="{{route('withdraw.approve',$data->id)}}"><em class="icon ni ni-activity-round"></em><span>Approve</span></a></li>
                                        <li><a href="{{route('withdraw.reject',$data->id)}}"><em class="icon ni ni-na"></em><span>Decline</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
