@extends('include.dashboard')

@section('content')

<div class="nk-content p-0"><div class="nk-content-inner"><div class="nk-content-body col-12"><div class="nk-ibxs">



<div class="nk-ibx-reply nk-reply" data-simplebar><div class="nk-ibx-reply-head"><div><h4 class="title">Ticket # {{$ticket->code}}</h4><ul class="nk-ibx-tags g-1"><li class="btn-group is-tags"><a class="btn btn-xs btn-primary btn-dim" href="#">{{$ticket->desk}}</a><a class="btn btn-xs btn-icon btn-primary btn-dim" href="#"><em class="icon ni ni-help"></em></a></li> </ul></div>


<ul class="d-flex g-1"><li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Print"><em class="icon ni ni-printer"></em></a></li>

<li class="mr-n1"><div class="asterisk"><a class="btn btn-trigger btn-icon btn-tooltip" href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div></li></ul></div><div class="nk-ibx-reply-group">



@foreach($tickets as $k=>$data)

@if($data->type == 1)
<div class="nk-ibx-reply-item nk-reply-item"><div class="nk-reply-header nk-ibx-reply-header is-collapsed"><div class="nk-reply-desc"><div class="nk-reply-avatar user-avatar bg-blue">


@if( file_exists(Auth::User()->image))
                        <img src="{{asset(Auth::user()->image)}} "
                             alt="Profile Pic">
                    @else

                        <img src=" {{url('assets/user/images/user-default.png')}} "
                             alt="Profile Pic">
                    @endif


</div><div class="nk-reply-info"><div class="nk-reply-author lead-text">{{Auth::User()->username}} <span class="date d-sm-none">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</span></div><div class="dropdown nk-reply-msg-info"><a href="#" class="dropdown-toggle sub-text dropdown-indicator" data-toggle="dropdown">to Admin</a><div class="dropdown-menu dropdown-menu-md"></div></div><div class="nk-reply-msg-excerpt">{{$data->details}}</div></div></div><ul class="nk-reply-tools g-1"><li class="attach-msg"><em class="icon ni ni-alarm"></em></li><li class="date-msg"><span class="date">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</span></li><li class="replyto-msg"><a href="#" class="btn btn-trigger btn-icon btn-tooltip" title="Reply"><em class="icon ni ni-curve-up-left"></em></a></li><li class="more-actions"><div class="dropdown"><a href="#" class="dropdown-toggle btn btn-trigger btn-icon" data-toggle="dropdown"><em class="icon ni ni-more-v"></em></a><div class="dropdown-menu dropdown-menu-right"><ul class="link-list-opt no-bdr"><li><a class="dropdown-item" href="#"><em class="icon ni ni-reply-fill"></em><span>Reply to</span></a></li><li><a class="dropdown-item" href="#"><em class="icon ni ni-forward-arrow-fill"></em><span>Forward</span></a></li><li><a class="dropdown-item" href="#"><em class="icon ni ni-trash-fill"></em><span>Delete this</span></a></li><li><a class="dropdown-item" href="#"><em class="icon ni ni-report-fill"></em><span>Report Spam</span></a></li></ul></div></div></li></ul></div>  </div>

@elseif($data->type == 2)
<div class="nk-ibx-reply-item nk-reply-item"><div class="nk-reply-header nk-ibx-reply-header"><div class="nk-reply-desc"><div class="nk-reply-avatar user-avatar bg-blue"><img src="{{asset('assets/images/logo/logo.png')}}" alt=""></div><div class="nk-reply-info"><div class="nk-reply-author lead-text">Admin <span class="date d-sm-none">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</span></div><div class="dropdown nk-reply-msg-info"><a href="#" class="dropdown-toggle sub-text dropdown-indicator" data-toggle="dropdown">to Me</a><div class="dropdown-menu dropdown-menu-md"><ul class="nk-reply-msg-meta"><li><span class="label">from:</span> <span class="info"><a href="#">{{$basic->email}}</a></span></li><li><span class="label">to:</span> <span class="info"><a href="#">{{Auth::User()->username}} </a></span></li> </ul></div></div> </div></div><ul class="nk-reply-tools g-1"><li class="date-msg"><span class="date">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</span></li><li class="replyto-msg"><a href="#" class="btn btn-trigger btn-icon btn-tooltip" title="Reply"><em class="icon ni ni-curve-up-left"></em></a></li> </ul></div><div class="nk-reply-body nk-ibx-reply-body"><div class="nk-reply-entry entry"><p>Hello {{Auth::User()->username}} ,</p><p>{{$data->details}}</p><p>Thank you <br> {{$basic->sitename}}</p></div></div></div>
@endif
@endforeach


</div><div class="nk-ibx-reply-form nk-reply-form"><div class="nk-reply-form-header"><div class="nk-reply-form-group"><div class="nk-reply-form-dropdown"><div class="dropdown"><a class="btn btn-sm btn-trigger btn-icon" data-toggle="dropdown" href="#"><em class="icon ni ni-curve-up-left"></em></a> </div></div><div class="nk-reply-form-title d-sm-none">Reply</div>

<form action="{{route('post.ticket2')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="nk-reply-form-input-group"><div class="nk-reply-form-input nk-reply-form-input-to"><label class="label">To</label><input name="code" type="text" value="{{$data->code}}" readonly class="input-mail tagify" placeholder="" data-whitelist="{{$basic->email}}, {{$basic->email}}, {{$basic->email}}"></div> </div> </div></div>



<div class="nk-reply-form-editor"><div class="nk-reply-form-field"><textarea class="form-control form-control-simple no-resize" name="body" id="temp" placeholder="Enter Reply"></textarea></div></div><div class="nk-reply-form-tools"><ul class="nk-reply-form-actions g-1"><li class="mr-2"><button class="btn btn-primary" type="submit">Send</button></li><li><div class="dropdown"><a class="btn btn-icon btn-sm btn-tooltip" data-toggle="dropdown" title="Templates" href="#"><em class="icon ni ni-hash"></em></a><div class="dropdown-menu"><ul class="link-list-opt no-bdr link-list-template"><li class="opt-head"><span>Quick Insert</span></li><script type="text/javascript">

function goDoSomething2(identifier){

                                     document.getElementById("temp").value = $(identifier).data('temp');

                                              }

                                        </script>

  <li><a href="#" onclick="goDoSomething2(this);"  data-temp="Hello admin, please i need assistance from you"><span>Assistance</span></a></li><li><a href="#" onclick="goDoSomething2(this);"  data-temp="Thank you for the response"><span>Thank you message</span></a></li></ul></div></div></li><li><a class="btn btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="Upload Attachment" href="#"><em class="icon ni ni-clip-v"></em></a></li> </ul> <div class="dropdown"><div class="dropdown-menu dropdown-menu-right"> </div>


</div></div></div></div></div>
@endsection
