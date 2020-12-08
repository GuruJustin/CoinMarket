@extends('include.dashboard')

@section('content')

<div class="nk-content p-0"><div class="nk-content-inner"><div class="nk-content-body col-12"><div class="nk-ibxs">





<div class="nk-ibx-sbody bg-white"><div class="nk-ibx-head"><div class="nk-ibx-head-actions"> <ul class="nk-ibx-head-tools g-1">

<a href="#" class="link link-text" data-toggle="modal" data-target="#compose-mail"><em class="icon-circle icon ni ni-plus"></em> <span>Create Ticket</span></a>

 <div class="dropdown">  </div></li></ul></div><div>

<ul class="nk-ibx-head-tools g-1"> <li><a href="#" class="btn btn-trigger btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a></li> </ul>


</div><div class="search-wrap" data-search="search"><div class="search-content"><a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a><input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by date or subject"><button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button></div></div></div> <div class="nk-ibx-item">
Support Tickets


<div class="nk-ibx-item-elem nk-ibx-item-star"> </div></div>

@foreach($inbox as $k=>$data)
<div class="nk-ibx-item is-unread"><a href="{{route('ticket-view',$data->code)}}" class="nk-ibx-link"></a> <div class="nk-ibx-item-elem nk-ibx-item-star"><div class="asterisk">
@if($data->status == 0)
<a class="active" href="#">
@else
<a class="actives" href="#">
@endif



<em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div></div><div class="nk-ibx-item-elem nk-ibx-item-user"><div class="user-card"><div class="user-avatar"><img src="{{asset('assets/images/logo/logo.png')}}" alt=""></div><div class="user-name"><div class="lead-text">{{$data->code}}</div></div></div></div><div class="nk-ibx-item-elem nk-ibx-item-fluid"><div class="nk-ibx-context-group"><div class="nk-ibx-context-badges">


</div><div class="nk-ibx-context"><span class="nk-ibx-context-text"><span class="heading">{{$data->title}}</span></div></div></div><div class="nk-ibx-item-elem nk-ibx-item-attach"><a class="link link-light"></a></div><div class="nk-ibx-item-elem nk-ibx-item-time"><div class="sub-text">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</div></div><div class="nk-ibx-item-elem nk-ibx-item-tools"><div class="ibx-actions"><ul class="ibx-actions-hidden gx-1"><li><a href="{{route('ticket-view',$data->code)}}" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="View"><em class="icon ni ni-eye"></em></a></li></ul><ul class="ibx-actions-visible gx-2"><li><div class="dropdown"><a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-right"><ul class="link-list-opt no-bdr"><li><a class="dropdown-item" href="{{route('ticket-view',$data->code)}}"><em class="icon ni ni-eye"></em><span>View</span></a></li> </ul></div></div></li></ul></div></div></div>
@endforeach
<br>
{{$inbox->links() }}
<br>


</div>





<div class="modal fade" tabindex="-1" role="dialog" id="compose-mail"><div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><h6 class="modal-title">Create New Ticket</h6><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a></div><div class="modal-body p-0"><div class="nk-reply-form-header">

<form action="{{route('post.ticket')}}" method="post" enctype="multipart/form-data">
@csrf

 </div><div class="nk-reply-form-editor">



 <div class="nk-reply-form-editor">
 <div class="nk-reply-form-field"><input type="text" name="subject" class="form-control form-control-simple" placeholder="Subject"></div><div class="nk-reply-form-field"><textarea name="body"  class="form-control form-control-simple no-resize ex-large" id="temp" placeholder="Hello"></textarea></div></div>


  <select required  class="form-control" placeholder="Hello" name="desk"><div class="coin-icon" id="icon1"><em class="icon ni ni-sign-usdc-alt" ></em></div>
<option> Select Desk</option>
<option   value="Abuse">Abuse </option>
<option  value="Complaint">Complaint </option>
<option  value="Request">Request </option>
<option  value="Sales">Sales </option>
<option  value="Support">Support </option>

</select>
</div>

 <div class="nk-reply-form-tools"><ul class="nk-reply-form-actions g-1"><li class="mr-2"><button class="btn btn-primary" type="submit">Create/Send</button></li><li><div class="dropdown"><a class="btn btn-icon btn-sm btn-tooltip" data-toggle="dropdown" title="Templates" href="#"><em class="icon ni ni-hash"></em></a><div class="dropdown-menu"><ul class="link-list-opt no-bdr link-list-template"><li class="opt-head"><span>Quick Insert</span></li>
  <script type="text/javascript">

function goDoSomething2(identifier){

                                     document.getElementById("temp").value = $(identifier).data('temp');

                                              }

                                        </script>

  <li><a href="#" onclick="goDoSomething2(this);"  data-temp="Hello admin, please i need assistance from you"><span>Assistance</span></a></li><li><a href="#" onclick="goDoSomething2(this);"  data-temp="Thank you for the response"><span>Thank you message</span></a></li></ul></div></div></li><li><a class="btn btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="Upload Attachment" href="#"><em class="icon ni ni-clip-v"></em></a></li> </ul> </div></div></div></div></div>
@endsection
