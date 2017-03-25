
  @extends('app')

@section('content')
   <div class="listss" ng-app="myApp" ng-controller="myCtrl" ng-init="loadTags()" ng-cloak>
 <div class="row">
     <div class="container">
    <div class="row row-lang">	 
	  <div class="col-md-12">
	    <div class="col-md-2" ng-repeat="item in tags">
		<a href="#" class="btn-large waves-effect waves-light teal lighten-1">{[{ item.label }]}</a>
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
      $scope.tags = {};
      $scope.plan = {};
      $scope.loadTags = function()
      {
          $http({
                        method: "GET", 
                        url: __appurl + "/api/gettaglist"
                    }).then(function (success) {
                        console.log(success);
                        $scope.tags = success.data;
                    }, function (error) {
                        console.log("err" + error);
                });
      }
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
                            window.location.href = "{{url('/home')}}";
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
