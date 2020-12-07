"use strict";
const app = angular.module('home',[]);
/*---------------------------------------------------------------------------------
    Making service to run ajax
---------------------------------------------------------------------------------*/
app.service('runAjax', ['$http', function ($http) {
    

    this.ajaxFunction = function(request,callback){
        const url=request.url;
        const data=request.data;

        $http.post(url,data).success(function(data, status, headers, config) {
            callback(data);
        })
        .error(function(err){
            callback(err);
        });
    }
}]);

app.controller('index', function ($scope,$window,runAjax) {

   /*---------------------------------------------------------------------------------
    Call to sendOTP
    ---------------------------------------------------------------------------------*/
    $scope.sendOTP = function() {
        
        var urlData = {            
            url: BASE_URL+'sendOtp',
            _token : $scope._token
        };
        runAjax.ajaxFunction(urlData,function(result){
            
            if(result.error){
                
                if(result.loggedIn){
                    alert(result.message);
                }else{
                    $window.location.href =  BASE_URL ;
                }                
            }else{
                document.querySelector( '#sendOtpSection' ).style.display="none";
                document.querySelector( '#verifyOtpSection' ).style.display="block";
            }
        });
    };
    /*---------------------------------------------------------------------------------
        Call to verifyOTP
    ---------------------------------------------------------------------------------*/
    $scope.verifyOTP = function() {

        if(typeof $scope.enteredOtp  == "undefined"  || $scope.enteredOtp  == ""){

            alert(`Enter OTP`);
        }else{
            var urlData = {            
                url: BASE_URL+'verifyOtp',
                data:{
                    otp : $scope.enteredOtp,
                    _token : $scope._token
                }
            };
            runAjax.ajaxFunction(urlData,function(result){

                if(result.error){
                    if(result.loggedIn){
                        alert(result.message);
                    }else{
                        $window.location.href =  BASE_URL;
                    }                
                }else{
                    if(result.isVerified){
                        document.querySelector( '#sendOtpSection' ).style.display="none";
                        document.querySelector( '#verifyOtpSection' ).style.display="none";
                        document.querySelector( '#isVerified' ).innerHTML="Verified";                    
                    }else{
                        document.querySelector( '#verifyOtpSection' ).style.display="none";
                        document.querySelector( '#sendOtpSection' ).style.display="block";                    
                    }
                    alert(result.message);
                }
            });
        }
    };
});