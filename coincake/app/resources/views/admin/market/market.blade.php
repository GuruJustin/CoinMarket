@extends('include.admindashboard')

@section('body')

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">{{$page_title}}</h3>
            @if(count($market) == 0)
            <div class="nk-block-des text-soft">
                <p>There is no market to show</p>
            </div>
            @endif
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->


@if(count($market) > 0)
<div class="nk-block">
    <div class="row g-gs">

    @foreach($market as $data)
    
    <div class="col-lg-4">
        <div class="card card-bordered card-full">
            <div class="card-inner d-flex flex-column h-100">
                <div class="card-title-group mb-3">
                    <div class="card-title">
                        <h6>Currency&nbsp;<span class="badge badge-primary">{{App\Currency::whereId($data->coin)->first()->name}}</span>
                        <h6>Code: {{$data->code}}</h6>
                    </div>
                    <div class="card-tools mt-n4 mr-n1">
                        <div class="drodown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" ><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="link-list-opt no-bdr">
                                    <li><a href="{{route('deldeal',$data->id)}}">Delete Deal</a></li>
                                    @if($data->status == 0)
                                    <li><a class="quick-action" href="{{route('actdeal',$data->id)}}" data-name="bank">Activate Deal</a></li>
                                    @else
                                    <li><a class="quick-action" href="{{route('deactdeal',$data->id)}}" data-name="bank">Deactivate Deal</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class = "col-md-6">
                        <div class="nk-knob">
                            <input type="text" class="knob" value="{{number_format($data->sold/$data->value*100)}}" data-fgColor="#816bff" data-bgColor="#d9e5f7" data-thickness=".07" data-width="115" data-height="115">
                        </div>
                    </div>
                    <div class = "col-md-6">
                        <div class="progress-text">
                            <div class="progress-label">Seller</div>
                            <div class="progress-amount">{{isset(App\User::whereId($data->user_id)->first()->username) ? App\User::whereId($data->user_id)->first()->username  : 'N/A'}}</div>
                        </div>
                        <div class="progress-text">
                            <div class="progress-label">Country</div>
                            <div class="progress-amount">{{isset(App\User::whereId($data->user_id)->first()->country) ? App\User::whereId($data->user_id)->first()->country  : 'N/A'}}</div>
                        </div>
                        <div class="progress-text">
                            <div class="progress-label">View Seller</div>
                            <div class="progress-amount"><a  class="btn btn-primary btn-dim btn-xs btn-icon"  href="{{route('user.single', $data->user_id)}}"><em class="icon ni ni-eye-fill"></em></a></div>
                        </div>
                    </div>
                </div>

                <div class="progress-text" style = "margin-top : 10px">
                    <div class="progress-label">Creation Date</div>
                    <div class="progress-amount">{!! date('d M, Y', strtotime($data->created_at)) !!} <small>{!! date('h:m A', strtotime($data->created_at)) !!}</small></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endif


@stop


