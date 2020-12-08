@extends('include.dashboard')
@section('content')
<div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body"><div class="nk-block-head nk-block-head-lg wide-xs mx-auto"><div class="nk-block-head-content text-center"><h4 class="nk-block-title fw-normal">Hello, {{Auth::user()->username}}</h4><div class="nk-block-des"><p>Welcome to <strong>{{$basic->sitename}}</strong> identity verification module. You are few steps away to complete your profile. These are required to become a complete member on our platform! Let’s start!</p></div></div></div><div class="nk-block">
@if(Auth::user()->status == 0)

Account Is Blocked

@elseif(Auth::user()->email_verify == 0)


<div class="card card-custom-s1 card-bordered"><div class="row no-gutters"><div class="col-lg-4"><div class="card-inner-group h-100"><div class="card-inner"><h5>Let’s Finish Registration</h5><p>Only few minutes required to complete your registration and set up your account.</p></div><div class="card-inner"><ul class="list list-step"><li class="list-step-current">Verify email address</li><li class="list-step">Verify Phone Number</li><li>Verify your identity (KYC)</li> </ul></div><div class="card-inner"><div class="align-center gx-3"><div class="flex-item"><div class="progress progress-sm progress-pill w-80px"><div class="progress-bar" data-progress="25"></div></div></div><div class="flex-item"><span class="sub-text sub-text-sm text-soft">1/3 Completed</span></div></div></div></div></div><div class="col-lg-8"><div class="card-inner card-inner-lg h-100"><div class="align-center flex-wrap flex-md-nowrap g-3 h-100"><div class="nk-block-image w-200px flex-shrink-0 order-first order-md-last"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                            <path d="M64.77,26.89,34.1,48,4.5,26.89,32.84,7.4a2.26,2.26,0,0,1,2.53,0Z" fill="#fff" />
                                                            <path d="M4.42,26H64.56A1.45,1.45,0,0,1,66,27.44V60.58A1.43,1.43,0,0,1,64.58,62H4.44A1.45,1.45,0,0,1,3,60.56V27.42A1.43,1.43,0,0,1,4.42,26Z" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <path d="M18.51,36.11,28.66,16.77,45.6,25.49,37,41.91,35.1,40.79a1.39,1.39,0,0,0-1.55,0l-4.34,2.82Z" fill="#c4cefe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <path d="M26.52,41.7l3.33-14s18.24,4,18.7,4.35l-1.48,6.25-7.76,5.19-5.09-3.11-5,3.23Z" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="32.47" y1="32.04" x2="42.98" y2="34.5" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" />
                                                            <line x1="31.64" y1="35.5" x2="42.16" y2="37.96" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" />
                                                            <line x1="30.82" y1="38.96" x2="41.34" y2="41.41" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" />
                                                            <line x1="30.17" y1="41.73" x2="40.68" y2="44.18" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" />
                                                            <line x1="29.51" y1="44.5" x2="35.08" y2="45.8" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M64.64,26.43,34.1,47,4.64,26.43l28.21-19a2.29,2.29,0,0,1,2.52,0Z" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <path d="M65.72,61.48,35.71,41A2.31,2.31,0,0,0,33,40.92L3.71,61.36" fill="#eff1ff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <path d="M66.89,82.72,45.69,70.18A2,2,0,0,1,45,67.45L62.07,39.13a2,2,0,0,1,2.75-.69L86,51a2,2,0,0,1,.7,2.72L69.64,82A2,2,0,0,1,66.89,82.72Z" fill="#fff" />
                                                            <path d="M66.89,82.72,45.69,70.18A2,2,0,0,1,45,67.45L62.07,39.13a2,2,0,0,1,2.75-.69L86,51a2,2,0,0,1,.7,2.72L69.64,82A2,2,0,0,1,66.89,82.72Z" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <ellipse cx="72.6" cy="48.73" rx="1.44" ry="1.42" fill="#c4cefe" stroke="#c4cefe" stroke-miterlimit="10" stroke-width="2" />
                                                            <path d="M61.92,67.69l-8.41-5a1,1,0,0,1-.34-1.36l.31-.52a1,1,0,0,1,1.37-.34l8.41,5a1,1,0,0,1,.35,1.36l-.31.51A1,1,0,0,1,61.92,67.69Z" fill="#9cabff" />
                                                            <line x1="77.65" y1="61.3" x2="59.79" y2="50.73" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" />
                                                            <line x1="76.21" y1="63.69" x2="58.34" y2="53.13" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" />
                                                            <line x1="74.76" y1="66.09" x2="56.9" y2="55.52" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" />
                                                            <line x1="73.31" y1="68.49" x2="55.45" y2="57.92" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" />
                                                            <polyline points="68.01 52.34 61.48 48.47 61.48 48.47" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" />
                                                            <line x1="67.67" y1="77.86" x2="49.8" y2="67.29" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" />
                                                            <polyline points="57.43 68.5 51.51 64.99 51.51 64.99" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" /></svg></div><div class="nk-block-content"><div class="nk-block-content-head"><h4>Verify Your Email Address</h4><span class="sub-text sub-text-sm text-soft">2 minutes</span></div><p>We have sent u a mail containing a verification code, enter the code in the field below and click on verify button</p><ul class="list list-sm list-checked"><li>Check your inbox or spam box </li>
<form  action="{{route('user.send-emailVcode') }}" method="post">
@csrf
<li>No code? <span>


<button type="submit" class="badge btn-primary">Resend Code</button></form></span></li>
<br>
<form  action="{{ route('user.email-verify')}}" method="post">
@csrf
 <input type="hidden" name="id" value="{{Auth::user()->id}}">
<input type="text" class="form-control" name="email_code" placeholder="Enter Code"></ul>

<button type="submit" class="btn btn-lg btn-primary">Verify</button></form></div></div></div></div></div></div>









@elseif(Auth::user()->phone_verify == 0)

<div class="card card-custom-s1 card-bordered"><div class="row no-gutters"><div class="col-lg-4"><div class="card-inner-group h-100"><div class="card-inner"><h5>You are almost done</h5><p>Only few minutes required to complete your registration and set up your account.</p></div><div class="card-inner"><ul class="list list-step"><li class="list-step-done">Verify email address</li><li class="list-step-current">Verify Phone Number</li><li>Verify your identity (KYC)</li> </ul></div><div class="card-inner"><div class="align-center gx-3"><div class="flex-item"><div class="progress progress-sm progress-pill w-80px"><div class="progress-bar" data-progress="50"></div></div></div><div class="flex-item"><span class="sub-text sub-text-sm text-soft">2/3 Completed</span></div></div></div></div></div><div class="col-lg-8"><div class="card-inner card-inner-lg h-100"><div class="align-center flex-wrap flex-md-nowrap g-3 h-100"><div class="nk-block-image w-200px flex-shrink-0 order-first order-md-last"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                            <rect x="44" y="24" width="41" height="43" transform="translate(129 91) rotate(-180)" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <path d="M71,37V33.6A1.6,1.6,0,0,0,69.4,32H54.6A1.6,1.6,0,0,0,53,33.6V48.39A1.61,1.61,0,0,0,54.61,50H69.4A1.6,1.6,0,0,0,71,48.4V37Z" fill="#eff1ff" />
                                                            <line x1="60" y1="42" x2="60" y2="45" fill="none" stroke="#6576ff" stroke-width="1.5" />
                                                            <line x1="58" y1="46" x2="56" y2="46" fill="none" stroke="#6576ff" stroke-width="1.5" />
                                                            <rect x="64" y="35" width="4" height="4" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                                            <rect x="56" y="35" width="4" height="4" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                                            <rect x="64" y="42" width="4" height="4" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                                            <polyline points="58 42 56 42 56 44" fill="none" stroke="#6576ff" stroke-width="1.5" />
                                                            <path d="M48,53H78a0,0,0,0,1,0,0v9a0,0,0,0,1,0,0H48a2,2,0,0,1-2-2V55a2,2,0,0,1,2-2Z" transform="translate(124 115) rotate(-180)" fill="#e3e7fe" />
                                                            <circle cx="70" cy="28" r="0.5" fill="none" stroke="#33d895" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <circle cx="75" cy="28" r="0.5" fill="none" stroke="#f4bd0e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <circle cx="80" cy="28" r="0.5" fill="none" stroke="#eb6459" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <rect x="5" y="9" width="40" height="72" rx="3" ry="3" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <rect x="9" y="22" width="32" height="43" fill="#fff" />
                                                            <polyline points="31 34 35 34 35 38" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <polyline points="19 54 15 54 15 50" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <polyline points="15 38 15 34 19 34" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <polyline points="35 50 35 54 31 54" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="25" y1="41" x2="25" y2="47" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="22" y1="44" x2="28" y2="44" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <circle cx="25" cy="74" r="3" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                            <line x1="23" y1="15" x2="28" y2="15" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /></svg></div><div class="nk-block-content"><div class="nk-block-content-head"><h4>Verify Your Phone Number</h4><span class="sub-text sub-text-sm text-soft">1 minutes</span></div><p>We have sent an sms to your phone number, enter the code in the field below and click on verify button</p><ul class="list list-sm list-checked"><li>Check your phone inbox </li>
<form  action="{{route('user.send-vcode') }}" method="post">
@csrf
<li>No code? <span>


<button type="submit" class="badge btn-primary">Resend Code</button></form></span></li>
<br>
<form  action="{{ route('user.sms-verify')}}" method="post">
@csrf
 <input type="hidden" name="id" value="{{Auth::user()->id}}">
<input type="text" class="form-control" name="sms_code" placeholder="Enter Code"></ul>

<button type="submit" class="btn btn-lg btn-primary">Verify</button></form></div></div></div></div></div></div>




@elseif(Auth::user()->verified == 0)

<div class="card card-custom-s1 card-bordered"><div class="row no-gutters"><div class="col-lg-4"><div class="card-inner-group h-100"><div class="card-inner"><h5>You are almost there</h5><p>Only few moments required to complete your registration.</p></div><div class="card-inner"><ul class="list list-step"><li class="list-step-done">Verify email address</li>

@if(Auth::user()->verified < 2)
<li class="list-step-current">Verify your identity (KYC)</li>
@else
<li class="list-step-done">Identity Verified</li>
@endif

 </ul></div><div class="card-inner"><div class="align-center gx-3"><div class="flex-item"><div class="progress progress-sm progress-pill w-80px"><div class="progress-bar" data-progress="100"></div></div></div><div class="flex-item"><span class="sub-text sub-text-sm text-soft">3/3 Completed</span></div></div></div></div></div><div class="col-lg-8"><div class="card-inner card-inner-lg h-100"><div class="align-center flex-wrap flex-md-nowrap g-3 h-100"><div class="nk-block-image w-200px flex-shrink-0 order-first order-md-last"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
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
                                     </div><div class="nk-block-content"><div class="nk-block-content-head"><h4>Verify Your Identity</h4><span class="sub-text sub-text-sm text-soft">4 minutes</span></div><p>To comply with regulation each participant will have to go through indentity verification (KYC/AML) to prevent fraud causes.</p><ul class="list list-sm list-checked"><li>Full Details About You</li>

<li>Upload of mean of identification <span>
<li>Add Residential Address <span>


</ul>
<button type="submit" class="btn btn-lg btn-primary">Begin</button>
 </div></div></div></div></div></div>



<div class="nk-content nk-content-fluid  "><div class="container-xl  "><div class="nk-content-body"><div class="kyc-app col-md-12o"><div class="nk-block-head nk-block-head-lg wide-xs mx-auto"><div class="nk-block-head-content text-center"><h4 class="nk-block-title fw-normal">Begin your ID-Verification</h4> </div></div><div class="nk-block"><div class="card card-bordered"><div class="nk-kycfm"><div class="nk-kycfm-head"><div class="nk-kycfm-count">01</div><div class="nk-kycfm-title"><h5 class="title">Personal Details</h5><p class="sub-title">Your simple personal information required for identification</p></div></div><div class="nk-kycfm-content"><div class="nk-kycfm-note"><em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></em><p>Please type carefully and fill out the form with your personal details. Your can’t edit these details once you submitted the form.</p></div><div class="row g-4"><div class="col-md-6">


<form role="form" method="POST" action="{{ route('document.upload') }}" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="form-group"><div class="form-label-group"><label class="form-label">First Name <span class="text-danger">*</span></label></div><div class="form-control-group"><input type="text" name="fname" required class="form-control form-control-lg"></div></div></div><div class="col-md-6"><div class="form-group"><div class="form-label-group"><label class="form-label">Last Name <span class="text-danger">*</span></label></div><div class="form-control-group"><input name="lname" type="text" required  class="form-control form-control-lg"></div></div></div><div class="col-md-6"><div class="form-group"><div class="form-label-group"><label class="form-label">Date of Birth <span class="text-danger">*</span></label></div><div class="form-control-group">
<input type="date" name="dob" required  class="form-control form-control-lg"></div></div></div><div class="col-md-6"><div class="form-group"><div class="form-label-group"><label class="form-label">Gender <span class="text-danger">*</span></label></div><div class="form-control-group"><select class="form-control  required form-control-lg" required name="gender" >
 <option selected>Choose...</option>
 <option value="Male">Male</option>
 <option value="Female">Female</option>
 <option value="None">Rather Not Say</option>

</select></div></div></div> </div></div><div class="nk-kycfm-head"><div class="nk-kycfm-count">02</div><div class="nk-kycfm-title"><h5 class="title">Your Address</h5><p class="sub-title">Your simple personal information required for identification</p></div></div><div class="nk-kycfm-content"><div class="nk-kycfm-note"><em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></em><p>Your can’t edit these details once you submitted the form.</p></div><div class="row g-4"><div class="col-md-12"><div class="form-group"><div class="form-label-group"><label class="form-label">Address <span class="text-danger">*</span></label></div><div class="form-control-group"><input type="text" class="form-control form-control-lg" name="address"></div></div></div><div class="col-md-6"><div class="form-group"><div class="form-label-group"><label class="form-label">City <span class="text-danger">*</span></label></div><div class="form-control-group"><input type="text" name="city" class="form-control form-control-lg"></div></div></div><div class="col-md-6"><div class="form-group"><div class="form-label-group"><label class="form-label">Country <span class="text-danger">*</span></label></div><div class="form-control-group"><select onchange="print_state('state', this.selectedIndex);" id="country" required  name ="country"  class="form-control form-control-lg"/></select>

<script language="javascript">print_country("country");</script></div></div></div><div class="col-md-6"><div class="form-group"><div class="form-label-group"><label class="form-label">State <span class="text-danger">*</span></label></div><div class="form-control-group"><select  name ="state" required  id ="state"  class="form-control form-control-lg"><option value="">Select state</option></select>
</div></div></div><div class="col-md-6"><div class="form-group"><div class="form-label-group"><label class="form-label">Zip Code <span class="text-danger">*</span></label></div><div class="form-control-group"><input type="text" class="form-control form-control-lg"  name="zip"></div></div></div></div></div><div class="nk-kycfm-head"><div class="nk-kycfm-count">03</div><div class="nk-kycfm-title"><h5 class="title">Document Upload</h5><p class="sub-title">To verify your identity, please upload any of your document.</p></div></div><div class="nk-kycfm-content"><div class="nk-kycfm-note"><em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></em><p>In order to complete, please upload any of the following personal document.</p></div><ul class="nk-kycfm-control-list g-3"><li class="nk-kycfm-control-item">

<input class="nk-kycfm-control" name="type" type="radio" name="id-proof" id="passport" data-title="Passport" checked><label class="nk-kycfm-label" for="passport"><span class="nk-kycfm-label-icon"><div class="label-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 71.9904 75.9285"><path fill="currentColor" d="M27.14,23.73A15.55,15.55,0,1,0,42.57,39.4v-.12A15.5,15.5,0,0,0,27.14,23.73Zm11.42,9.72H33a25.55,25.55,0,0,0-2.21-6.53A12.89,12.89,0,0,1,38.56,33.45ZM31,39.28a26.9929,26.9929,0,0,1-.2,3.24H23.49a26.0021,26.0021,0,0,1,0-6.48H30.8A29.3354,29.3354,0,0,1,31,39.28ZM26.77,26.36h.75a21.7394,21.7394,0,0,1,2.85,7.09H23.91A21.7583,21.7583,0,0,1,26.77,26.36Zm-3.28.56a25.1381,25.1381,0,0,0-2.2,6.53H15.72a12.88,12.88,0,0,1,7.78-6.53ZM14.28,39.28A13.2013,13.2013,0,0,1,14.74,36H20.9a29.25,29.25,0,0,0,0,6.48H14.74A13.1271,13.1271,0,0,1,14.28,39.28Zm1.44,5.83h5.57a25.9082,25.9082,0,0,0,2.2,6.53A12.89,12.89,0,0,1,15.72,45.11ZM27.51,52.2h-.74a21.7372,21.7372,0,0,1-2.85-7.09h6.44A21.52,21.52,0,0,1,27.51,52.2Zm3.28-.56A25.1413,25.1413,0,0,0,33,45.11h5.57a12.84,12.84,0,0,1-7.77,6.53Zm2.59-9.12a28.4606,28.4606,0,0,0,0-6.48h6.15a11.7,11.7,0,0,1,0,6.48ZM14.29,62.6H40v2.6H14.28V62.61ZM56.57,49l1.33-5,2.48.67-1.33,5Zm-6,22.52L55.24,54l2.48.67L53.06,72.14Zm21.6-61.24-29.8-8a5.13,5.13,0,0,0-6.29,3.61h0L33.39,16H6.57A2.58,2.58,0,0,0,4,18.55V70.38A2.57,2.57,0,0,0,6.52,73L6.57,73h29.7l17.95,4.85a5.12,5.12,0,0,0,6.28-3.6v-.06L75.8,16.61a5.18,5.18,0,0,0-3.6066-6.3763L72.18,10.23ZM6.57,70.38V18.55H45.14a2.57,2.57,0,0,1,2.57,2.57V67.79a2.57,2.57,0,0,1-2.55,2.59H6.57ZM73.34,15.91,58,73.48a2.59,2.59,0,0,1-2.48,1.93,2.5192,2.5192,0,0,1-.67-.09l-9-2.42a5.15,5.15,0,0,0,4.37-5.11V47.24l1.32.36,1.33-5-2.49-.67-.16.62V21.94l2.62.71,3.05,10,2.13.57L57.88,24l3.76,1,1.65,3,1.42.39-.25-4.09,2.24-3.42-1.41-.39L62.4,22.15l-3.76-1,4.76-7.92-2.13-.57-7.6,7.14-4-1.08A5.1,5.1,0,0,0,45.14,16H36.05l2.51-9.45a2.57,2.57,0,0,1,3.12-1.84h0l29.81,8.05a2.56,2.56,0,0,1,1.56,1.21A2.65,2.65,0,0,1,73.34,15.91ZM56.57,39.59l.66-2.5,2.44.65L59,40.24Zm4.88,1.31.66-2.51,2.44.66-.65,2.5Zm-9.76-2.61.66-2.51,2.45.66-.66,2.5Z" transform="translate(-3.9995 -2.101)" fill="#6476ff" /></svg></div></span><span class="nk-kycfm-label-text">Passport</span></label></li><li class="nk-kycfm-control-item"><input name="type"  class="nk-kycfm-control" type="radio" name="id-proof" id="national-id" data-title="National ID"><label class="nk-kycfm-label" for="national-id"><span class="nk-kycfm-label-icon"><div class="label-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 76 63.0105"><path fill="currentColor" d="M76,18.79,56.53,9.56a6.19,6.19,0,0,0-5.19,0l-19.5,9.23a3.35,3.35,0,0,0-1.9,2.55H8.33A6.26,6.26,0,0,0,2,27.51v38.3A6.27,6.27,0,0,0,8.33,72H71.67A6.27,6.27,0,0,0,78,65.81v-44A3.37,3.37,0,0,0,76,18.79Zm-.56,47a3.77,3.77,0,0,1-3.8,3.71H8.33a3.77,3.77,0,0,1-3.8-3.71V27.51a3.75,3.75,0,0,1,3.7993-3.7H29.87v9.34A34.49,34.49,0,0,0,44,60.41l7.51,5.8a4.11,4.11,0,0,0,4.94,0l7.51-5.8A36.5307,36.5307,0,0,0,75.47,45.62V65.81Zm0-32.66a32.09,32.09,0,0,1-13.1,25.34l-7.51,5.8a1.5,1.5,0,0,1-1.8,0l-7.51-5.8A32.05,32.05,0,0,1,32.4,33.15V21.83A.91.91,0,0,1,33,21l19.5-9.23a3.51,3.51,0,0,1,3,0L74.92,21a.91.91,0,0,1,.55.82V33.15ZM53.87,21.43a12.47,12.47,0,0,0-12.6,12.31,12.62,12.62,0,0,0,25.23,0,12.46,12.46,0,0,0-12.6178-12.3l-.0122,0Zm0,22.14A9.83,9.83,0,1,1,64,33.78a10,10,0,0,1-10.1,9.79Zm3.31-13.22-5.32,5.19-1.18-1.15a1.29,1.29,0,0,0-1.79,0,1.2,1.2,0,0,0-.013,1.697l.013.013h0l2.08,2a1.27,1.27,0,0,0,1.79,0L59,32.09a1.22,1.22,0,0,0,0-1.72h0a1.29,1.29,0,0,0-1.8,0ZM29.87,57.16h-20a1.24,1.24,0,1,0,0,2.47h20a1.24,1.24,0,0,0,0-2.47ZM19.73,62.1H9.89a1.24,1.24,0,0,0,0,2.48h9.84a1.24,1.24,0,0,0,0-2.48Zm8.66-14.28h0L24,45.71a.36.36,0,0,1-.22-.34V44.16a1.878,1.878,0,0,1,.18-.24,10.9991,10.9991,0,0,0,1.35-2.48,2.53,2.53,0,0,0,1.23-2.16V37.51a2.61,2.61,0,0,0-.46-1.43V34a4.69,4.69,0,0,0-1.15-3.43,6.68,6.68,0,0,0-5.19-1.85,6.67,6.67,0,0,0-5.18,1.85A4.61,4.61,0,0,0,13.4,34v2a2.46,2.46,0,0,0-.46,1.43v1.78a2.49,2.49,0,0,0,.78,1.81,10.148,10.148,0,0,0,1.52,3v1.2a.36.36,0,0,1-.21.33l-4.1,2.15A4.79,4.79,0,0,0,8.33,52v1.43a1.26,1.26,0,0,0,.37.88,1.33,1.33,0,0,0,.9.36H29.87a1.31,1.31,0,0,0,.9-.36,1.26,1.26,0,0,0,.37-.88V52.11A4.76,4.76,0,0,0,28.39,47.82Zm.21,4.4H10.87V52a2.27,2.27,0,0,1,1.25-2l4.12-2.16a2.85,2.85,0,0,0,1.54-2.5V43.72a1.3,1.3,0,0,0-.3-.8,7.39,7.39,0,0,1-1.4-2.8,1.53,1.53,0,0,0-.6-.83V37.46a1.22,1.22,0,0,0,.43-.92v-2.7a2.17,2.17,0,0,1,.53-1.58,4.38,4.38,0,0,1,3.28-1,4.43,4.43,0,0,1,3.26,1,2.22,2.22,0,0,1,.55,1.6.8552.8552,0,0,0,0,.16v2.56a1.36,1.36,0,0,0,.46,1l-.08,1.86a1.23,1.23,0,0,0-.84.8,8.5819,8.5819,0,0,1-1.19,2.31c-.1.14-.22.28-.33.41a1.22,1.22,0,0,0-.33.82v1.66A2.86,2.86,0,0,0,22.86,48l4.41,2a2.28,2.28,0,0,1,1.33,2.07v.15Z" transform="translate(-2 -8.9898)" fill="#6476ff" /></svg></div></span><span class="nk-kycfm-label-text">National ID</span></label></li><li class="nk-kycfm-control-item"><input name="type"  class="nk-kycfm-control" type="radio" name="id-proof" id="driver-licence" data-title="Driving License"><label class="nk-kycfm-label" for="driver-licence"><span class="nk-kycfm-label-icon"><div class="label-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 76 76.1"><path fill="currentColor" d="M70.5,2H9.9A7.9167,7.9167,0,0,0,2,9.9V51.5A7.49,7.49,0,0,0,9.5,59H31.6a1.538,1.538,0,0,0,1.5-1.5A1.4727,1.4727,0,0,0,31.6,56H9.7A4.6946,4.6946,0,0,1,5,51.3V15H75V46.9a1.5,1.5,0,1,0,3,0V10.1C78,5.6,74.7,2,70.5,2ZM75,11H5V9.5A4.6115,4.6115,0,0,1,9.8,5H70.3a4.6115,4.6115,0,0,1,4.8,4.5V11ZM64.3,29.5a4.1408,4.1408,0,0,1-1.5,2.9.9593.9593,0,0,0-.3,1L63,35a.9879.9879,0,0,0,.7.7l3.9,1a2.0749,2.0749,0,0,1,1,.6.972.972,0,0,0,1.4-.1h0a.9663.9663,0,0,0-.1-1.4h0a5.7028,5.7028,0,0,0-2.2-1.1l-3-.8-.1-.5a7.08,7.08,0,0,0,1.6-3.1,1.8059,1.8059,0,0,0,1-1.4l.2-1.7a1.8411,1.8411,0,0,0-.8-1.8l.1-1.1.2-.2a2.5846,2.5846,0,0,0,.1-3.4,4.3847,4.3847,0,0,0-3.8-1.8,7.2965,7.2965,0,0,0-3.5.9c-4.1.1-4.6,2.4-4.6,4,0,.3.1.9.1,1.5-.1.1-.3.2-.4.3a1.9638,1.9638,0,0,0-.5,1.5l.2,1.7a2.0944,2.0944,0,0,0,1.1,1.5,6.1046,6.1046,0,0,0,1.5,3l-.1.6-3,.8A5.4636,5.4636,0,0,0,49.9,40a.9448.9448,0,0,0,1,1H65a1,1,0,0,0,0-2H52.1a3.1116,3.1116,0,0,1,2.5-2.3l3.6-.9a.9879.9879,0,0,0,.7-.7l.4-1.7a.8065.8065,0,0,0-.3-.9,4.6858,4.6858,0,0,1-1.4-2.9.8949.8949,0,0,0-1-.8l-.3-1.6a.9448.9448,0,0,0,1-1v-.1a19.0913,19.0913,0,0,1-.2-2c0-1,0-2,2.9-2a1.4213,1.4213,0,0,0,.6-.2,4.1045,4.1045,0,0,1,2.6-.7,2.1984,2.1984,0,0,1,2.1.9c.4.6.2.8.1.9l-.4.2a.9078.9078,0,0,0-.3.7L64.6,26a.7787.7787,0,0,0,.7.9h.2l-.1,1.6A1.0278,1.0278,0,0,0,64.3,29.5ZM34.1,27a1.538,1.538,0,0,0,1.5-1.5A1.4727,1.4727,0,0,0,34.1,24h-6a1.5,1.5,0,0,0,0,3ZM12.8,37h21a1.5,1.5,0,0,0,0-3h-21a1.538,1.538,0,0,0-1.5,1.5A1.4727,1.4727,0,0,0,12.8,37Zm-.4-10h9a1.5,1.5,0,0,0,0-3h-9a1.5,1.5,0,1,0,0,3ZM74.9,55a2.0059,2.0059,0,0,0-2-2h-.2a7.0756,7.0756,0,0,0-3.1,1c-1.4-3-3.8-5.6-5.4-6.4-1.1-.6-4.9-1.2-8.3-1.2s-7.1.6-8.2,1.2c-1.7.8-4,3.4-5.4,6.4a6.6831,6.6831,0,0,0-3.1-1,2.2959,2.2959,0,0,0-1.4.4A2.0876,2.0876,0,0,0,37,55a5.5585,5.5585,0,0,0,2,4c.2.1.3.2.5.3a16.4687,16.4687,0,0,0-1,5.8c0,2.1.2,5.8,1.5,7.7v2.4a2.9483,2.9483,0,0,0,2.8,2.9h3.4A2.8616,2.8616,0,0,0,49,75.3h0v-1a27.5212,27.5212,0,0,0,7,1,27.5212,27.5212,0,0,0,7-1v1a2.7754,2.7754,0,0,0,2.7,2.8H69a2.8183,2.8183,0,0,0,2.9-2.8h0V72.9c1.2-1.9,1.4-5.5,1.4-7.7a16.0869,16.0869,0,0,0-1-5.8.8643.8643,0,0,0,.6-.3A5.7634,5.7634,0,0,0,74.9,55ZM49.3,50.1a22.2387,22.2387,0,0,1,6.8-.8,30.84,30.84,0,0,1,6.8.8c1.1.5,3.6,3.4,4.6,6.5-2.7.4-9.1,1.2-11.5,1.2s-8.7-.9-11.4-1.2C45.7,53.5,48.2,50.7,49.3,50.1Zm-8.1,6.6c-.1-.2-.3-.3-.4-.5a2.1859,2.1859,0,0,1,.5.3c0,.1,0,.1-.1.2ZM46.1,75H43V74h3v1.1Zm23,0H66V74h3v1.1Zm.4-5H66.9a6.7381,6.7381,0,0,0-2.6.9h0a32.0084,32.0084,0,0,1-8.2,1.4,42.62,42.62,0,0,1-7.6-1.5,6.1538,6.1538,0,0,0-1.9-.2l-4,.4a19.5493,19.5493,0,0,1-.8-5.9,6.15,6.15,0,0,1,.1-1.4c1.9.1,4.2.7,4.2,1.4a1.52,1.52,0,0,0,1.4,1.5h0c.8,0,1.5-1.4,1.5-1.4v-.7c0-3.4-4.7-4-6.5-4.1.2-.5.4-1,.6-1.4h0c.4.1,9.8,1.4,13,1.4S68.7,59.1,69,59h0c.2.5.4.9.6,1.4-1.8.1-6.4.7-6.4,4.1a1.4036,1.4036,0,0,0,2.8,0v-.1c0-.7,2.2-1.3,4.2-1.4a6.602,6.602,0,0,1,.1,1.4A17.2549,17.2549,0,0,1,69.5,70Zm1.6-13.3c0-.1-.1-.1-.1-.2l.5-.3A2.1813,2.1813,0,0,1,71.1,56.7ZM59.2,64h-6a1.5,1.5,0,0,0,0,3h6a1.5,1.5,0,0,0,0-3Z" transform="translate(-2 -2)" fill="#6476ff" /></svg></div></span><span class="nk-kycfm-label-text">Driving License</span></label></li></ul><h6 class="title">To avoid delays when verifying account, Please make sure bellow:</h6><ul class="list list-sm list-checked"><li>Chosen credential must not be expaired.</li><li>Document should be good condition and clearly visible.</li><li>Make sure that there is no light glare on the card.</li></ul>



                                                            <div class="form-group">
                                                                <label class="form-label" for="default-06">Upload Front View </label>
                                                                <div class="form-control-wrap">
                                                                    <div class="custom-file">
                                                                        <input type="file" multiple class="custom-file-input" name="photo"  id="customFile1">
                                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="form-label" for="default-06">Upload Back View</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="custom-file">
                                                                        <input type="file" multiple class="custom-file-input" name="photo2"  id="customFile2">
                                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="form-label" for="default-06">Expiry Date</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="custom-file">
                                                                        <input type="date"   class="form-control form-control-lg" name="date" >

                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="form-label" for="default-06">ID Number</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="custom-file">
                                                                        <input type="text"  class="form-control form-control-lg" name="number" >

                                                                    </div>
                                                                </div>
                                                            </div>



</div></div><div class="nk-kycfm-footer"><div class="form-group"><div class="custom-control custom-control-xs custom-checkbox"><input type="checkbox" class="custom-control-input" required id="tc-agree"><label class="custom-control-label" for="tc-agree">I Have Read The <a href="#">Terms Of Condition</a> And <a href="#">Privacy Policy</a></label></div></div><div class="form-group"><div class="custom-control custom-control-xs custom-checkbox"><input required type="checkbox" class="custom-control-input" id="info-assure"><label class="custom-control-label" for="info-assure">All The Personal Information I Have Entered Is Correct.</label></div></div><div class="nk-kycfm-action pt-2"><button type="submit" class="btn btn-lg btn-primary">Process for Verify</button></form>



</div></div></div></div></div></div></div></div></div>


@elseif(Auth::user()->verified > 0)

<div class="card card-custom-s1 card-bordered"><div class="row no-gutters"><div class="col-lg-4"><div class="card-inner-group h-100">



@if(Auth::user()->verified < 2)
<div class="card-inner"><h5>You are almost there</h5><p>Only few moments required to complete your registration.</p></div>
@else
<div class="card-inner"><h5>Congratulations</h5><p>Your identity has been verified on the {{$basic->sitename}}.  You are welcome to {{$basic->sitename}}.</p></div>
@endif

<div class="card-inner"><ul class="list list-step"><li class="list-step-done">Verify email address</li><li class="list-step-done">Verify Phone Number</li>@if(Auth::user()->verified < 2)
<li class="list-step-current">Verify your identity (KYC)</li>
@else
<li class="list-step-done">Identity Verified</li>
@endif </ul></div><div class="card-inner"><div class="align-center gx-3"><div class="flex-item"><div class="progress progress-sm progress-pill w-80px"><div class="progress-bar" data-progress="100"></div></div></div><div class="flex-item"><span class="sub-text sub-text-sm text-soft">3/3 Completed</span></div></div></div></div></div><div class="col-lg-8"><div class="card-inner card-inner-lg h-100"><div class="align-center flex-wrap flex-md-nowrap g-3 h-100"><div class="nk-block-image w-200px flex-shrink-0 order-first order-md-last">
<img src="{{ asset('kyc') }}/{{$docs->image1}}" width="70" alt="pay-logo">
<img src="{{ asset('kyc') }}/{{$docs->image2}}"  width="70" alt="pay-logo">

                                     </div><div class="nk-block-content"><div class="nk-block-content-head"><h4>Verification @if(Auth::user()->verified == 1) Pending @elseif(Auth::user()->verified == 2) Approved @endif</h4> </div><p>We have received your submission. Please wait while we verify your submission. </p><ul class="list list-sm list-checked"><li>Type: {{$docs->type}}</li>

<li>ID Number: {{$docs->number}} <span>
<li>Expiry Date: {{$docs->date}} <span>
<li>Submission Date: {!! date(' d/M/Y', strtotime($docs->created_at)) !!} <span>


</ul>

 </div></div></div></div></div></div>





@else

    @php return redirect('user/home') @endphp

@endif






</div> </div></div></div>
@endsection
