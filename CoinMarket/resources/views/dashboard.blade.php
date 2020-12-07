<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="userInfo row">
       
            <div class="information">
                <h3>Your mobile number ******{{ $users['mobile'] }} is
                    <span id="isVerified">
                        @if ( $users['verified'] === 0) not Verified. @else Verified. @endif
                    </span>
                </h3>
            </div>

            <div id="otpSection" class="otpSection">

                <input type="hidden" name="_token" id="_token" ng-model="_token" value="{{ csrf_token() }}">

                <div id="sendOtpSection" class="sendOtpSection"
                    style="display:@if ( $users['verified'] === 0) block @else none @endif" >
                    <button class="btn btn-primary sendOtp" id="sendOtp" ng-click="sendOTP({{$users['id']}})">Send OTP</button>
                </div>

                <div id="verifyOtpSection" class="verifyOtpSection" style="display:none">
                    <input type="number" class="form-control" id="otp" placeholder="Enter OTP" ng-model="enteredOtp">
                    <br/>
                    <button class="btn btn-primary verifyOtp" id="verifyOtp" ng-click="verifyOTP()">Verify OTP</button>
                </div>
            </div>


        </div>
        <script type="text/javascript">
            'use strict';
            const BASE_URL = '{{url('/')}}';
        </script>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>


    <script src = "{{ asset('/js/home.js') }}"></script>
</x-app-layout>
