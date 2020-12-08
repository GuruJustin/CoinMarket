@extends('include.dashboard')

@section('content')

<div class="nk-content p-0"><div class="nk-content-inner"><div class="nk-content-body col-12"><div class="nk-ibxs">



<div class="nk-ibx-reply nk-reply" data-simplebar><div class="nk-ibx-reply-head"><div><h6 class="title">Subject: {{$inbox->title}}</h6><ul class="nk-ibx-tags g-1"><li class="btn-group is-tags"><a class="btn btn-xs btn-primary btn-dim" href="#">{{$basic->sitename}}</a><a class="btn btn-xs btn-icon btn-primary btn-dim" href="#"><em class="icon ni ni-help"></em></a></li> </ul></div>


<ul class="d-flex g-1"><li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Print"><em class="icon ni ni-printer"></em></a></li>

<li class="mr-n1"><div class="asterisk"><a class="btn btn-trigger btn-icon btn-tooltip" href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div></li></ul></div><div class="nk-ibx-reply-group">




<div class="nk-ibx-reply-item nk-reply-item"><div class="nk-reply-header nk-ibx-reply-header"><div class="nk-reply-desc"><div class="nk-reply-avatar user-avatar bg-blue"><img src="{{asset('assets/images/logo/logo.png')}}" alt=""></div><div class="nk-reply-info"><div class="nk-reply-author lead-text">Admin <span class="date d-sm-none">{{ Carbon\Carbon::parse($inbox->created_at)->diffForHumans() }}</span></div><div class="dropdown nk-reply-msg-info"><a href="#" class="dropdown-toggle sub-text dropdown-indicator" data-toggle="dropdown">to Me</a><div class="dropdown-menu dropdown-menu-md"><ul class="nk-reply-msg-meta"><li><span class="label">from:</span> <span class="info"><a href="#">{{$basic->email}}</a></span></li><li><span class="label">to:</span> <span class="info"><a href="#">{{Auth::User()->username}} </a></span></li> </ul></div></div> </div></div><ul class="nk-reply-tools g-1"><li class="date-msg"><span class="date">{{ Carbon\Carbon::parse($inbox->created_at)->diffForHumans() }}</span></li>  </ul></div><div class="nk-reply-body nk-ibx-reply-body"><div class="nk-reply-entry entry"><p>Hello {{Auth::User()->username}} ,</p><p>{{$inbox->details}}</p><p>Regards. <br> {{$basic->sitename}}</p></div></div></div>



</div>

</div></div></div></div></div>
@endsection
