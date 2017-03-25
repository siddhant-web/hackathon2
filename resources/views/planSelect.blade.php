
  @extends('app')

@section('content')
   <div class="payment" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
    <div class="container">
     <div class="row">
	 <div class="col-md-12">
	   <div class="col-md-4">
	    <div class="payy">
	     <div class="pay">
		  <h1>Free</h1>
		  <p>Get your question answered by your peers..</p>
		  <h5>Free</h5>
		 </div>
		 <div class="row center">
          <a href="#" id="pay-button" class="btn-large waves-effect waves-light teal lighten-1" ng-click="planassign('free')">Procced with Free</a>
        </div>
		</div>
	   </div>
	   <div class="col-md-4">
	    <div class="payy">
	     <div class="pay">
		  <h1>24X7</h1>
		  <p>Get your questions answered by our experts with in 24X7 Pay:$8</p>
		  <h5>Pay:$8</h5>
		 </div>
		 <div class="row center">
          <a href="#" id="pay-button" class="btn-large waves-effect waves-light teal lighten-1" ng-click="planassign('instant')">Pay Now</a>
        </div>
	   </div>
	   </div>
	   <div class="col-md-4">
	   <div class="payy">
	     <div class="pay">
		  <h1>Express (2Hrs)</h1>
		  <p>Get your questions answered instantly by our experts.</p>
		  <h5>Pay:$8</h5>
		 </div>
		  <div class="row center">
          <a href="#" id="pay-button" class="btn-large waves-effect waves-light teal lighten-1" ng-click="planassign('audit')">Pay Now</a>
         </div>
		 </div>
	   </div>
	   </div>
	   </div>
	 </div>
   </div>
 
<script>
       var __appurl = "http://192.168.10.171/mxnetwork/public"
    var app =  angular.module('myApp', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
  });
  app.controller('myCtrl', function($scope, $http) {
      $scope.login = {};
      $scope.plan = {};
      $scope.planassign = function(plantype)
      {
          Lobibox.confirm({
            msg: "Are you sure you want to go ahead with this plan?",
            callback: function ($this, type, ev) {
                //Your code goes here
                console.log(type);
                console.log(typeof(type));
                if(type === 'yes')
                {
                    $scope.plan.type = plantype;
                    $http({
                        method: "POST", 
                        url: __appurl + "/assignplan",
                      data:$scope.plan
                    }).then(function (success) {
                        console.log(success);
                        console.log(success.data.status );
                        if(success.data.status === true)
                        {
                            window.location.href = "{{url('/tags')}}";
                            console.log('here');
                        }
                        else //if(success.data.error)
                        {
                            Lobibox.notify('error', {
                                    msg: success.data.message,
                                    sound:false,
                                    position: 'center top',
                                    icon:false
                                  });
                        }
                    }, function (error) {
                        console.log("err" + error);
                });
                }
            }
            });
      }
  });
    </script>
@endsection
