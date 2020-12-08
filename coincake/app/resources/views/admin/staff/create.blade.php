@extends('include.admindashboard')

@section('body')
  <div class="page-header"><div class="container"><div class="row justify-content-center"><div class="col-lg-8 col-xl-7 text-center"><h2 class="page-title">Create Staff</h2></div></div></div><!-- .container --></div><div class="page-content"><div class="container"><div class="row">

<div class="col-lg-12"><div class="content-area card"><div class="card-innr card-innr-fix"><div class="card-head"><h6 class="card-title">Add New Administrative Staff</h6></div><div class="gaps-1x"></div><!-- .gaps -->

<form role="form" method="POST" enctype="multipart/form-data" action="{{route('createnewadmin')}}">
                        {{ csrf_field() }}

<div class="row"><div class="col-md-6"><div class="input-item input-with-label"><label class="input-item-label text-exlight">Staff Full Name</label><input class="input-bordered" type="text"             name="name"><span class="input-note">Please enter staff name</span></div></div><div class="col-md-6"><div class="input-item input-with-label"><label class="input-item-label text-exlight">Staff Username</label><input name="username" class="input-bordered" type="text"><span class="input-note">Staff Login Username</span></div></div></div>


<div class="row"><div class="col-md-6"><div class="input-item input-with-label"><label class="input-item-label text-exlight">Staff Login Email</label><div class="relative"> </span><input  name="email" class="input-bordered" type="text"></div><span class="input-note"><small><code> The default staff login password is: admin</code></small></span></div></div><div class="col-md-6"><div class="input-item input-with-label"><label class="input-item-label text-exlight">Staff Mobile Phone</label><input  name="mobile" class="input-bordered" type="text"><span class="input-note">Staff Mobile Phone Number. </span></div></div>



<input  name="password" hidden class="input-bordered" value="$2y$10$Bh3NKF7E9IF1MbNdHonlY.56Nb38JWFRaPR8SUmii/MDVz.UL.Fje">
</div>




<div class="row"><div class="col-md-6"><label class="input-item-label ucap text-exlight">USERS MANGEMENT PERMISSION</label><ul class="d-flex flex-wrap checkbox-list"><li><div class="input-item text-left"><input class="input-checkbox input-checkbox-sm"
                                       type="checkbox" id="cma-email"
                                       name="createuser"  ><label for="cma-email">Create Users</label></div></li><li><div class="input-item text-left">


<li><div class="input-item text-left"><input name="viewuser" class="input-checkbox input-checkbox-sm" id="cm-log"  type="checkbox"><label for="cm-log">View Users</label></div></li>

<li><div class="input-item text-left"><input   class="input-checkbox input-checkbox-sm"
                                         type="checkbox" id="cma-main"
                                       name="manageuser"  ><label for="cma-main">Manage Users</label></div></li></ul></div><div class="col-md-6"><label class="input-item-label ucap text-exlight">System Features Permissions</label><ul class="d-flex flex-wrap checkbox-list"><li><div class="input-item text-left"><input  class="input-checkbox input-checkbox-sm" type="checkbox"
                               id="cma-enot1"        name="blockchain"  ><label for="cma-enot1">Blockchain Wallets</label></div></li><li><div class="input-item text-left"><input
                       id="cma-enot"     class="input-checkbox input-checkbox-sm"             type="checkbox"
                                       name="purchase"  ><label for="cma-enot">Purchase</label></div></li><li><div class="input-item text-left"><input   class="input-checkbox input-checkbox-sm"     id="pma-cash"          data-width="100%" type="checkbox"
                                       name="sales"  ><label for="pma-cash">Sales</label></div></li>


<li><div class="input-item text-left"><input
       id="pma-cash1"                   class="input-checkbox input-checkbox-sm"                 type="checkbox"
                                       name="withdrawal"  ><label for="pma-cash1">Withdrawals</label></div></li>

                                       <li><div class="input-item text-left"><input
       id="pma-casheg"                   class="input-checkbox input-checkbox-sm"                 type="checkbox"
                                       name="deposit"  ><label for="pma-casheg">Deposits</label></div></li>


                                       <li><div class="input-item text-left"><input
       id="pma-cashfe"                   class="input-checkbox input-checkbox-sm"                 type="checkbox"
                                       name="transfer"  ><label for="pma-cashfe">Fund Transfer</label></div></li>


                                       <li><div class="input-item text-left"><input
       id="pma-cashe"                   class="input-checkbox input-checkbox-sm"                 type="checkbox"
                                       name="deposit"  ><label for="pma-cashe">Deposits</label></div></li>


                                       <li><div class="input-item text-left"><input
       id="pma-cashee"                   class="input-checkbox input-checkbox-sm"                 type="checkbox"
                                       name="settings"  ><label for="pma-cashee">System Settings</label></div></li>


                                       <li><div class="input-item text-left"><input
       id="pma-cashef"                   class="input-checkbox input-checkbox-sm"                 type="checkbox"
                                       name="message"  ><label for="pma-cashef">Message Center</label></div></li>

 <li><div class="input-item text-left"><input
       id="pma-cashegf"                   class="input-checkbox input-checkbox-sm"                 type="checkbox"
                                       name="frontend"  ><label for="pma-cashegf">Frontend Management</label></div></li>
 <li><div class="input-item text-left"><input
       id="pma-cashedf"                   class="input-checkbox input-checkbox-sm"                 type="checkbox"
                                       name="kyc"  ><label for="pma-cashedf">KYC Verification</label></div></li>

</ul></div></div><div class="gaps-1x"></div><button class="btn btn-primary" type="submit">Create Staff</button></form></div><!-- .card-innr --></div><!-- .card --></div> <!-- .card --></div></div></div><!-- .container --></div><!-- .page-content -->
@endsection

@section('script')

@stop
