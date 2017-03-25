<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/lobibox.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
</head>
<body ng-app="myApp" ng-controller="myCtrl" ng-cloak>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"><img src="{{url('/img/Logo.png')}}" class="logo"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#" data-toggle="modal" data-target="#login-modal" class="login-menu">Login</a></li>	
		<li><a href="#" class="login-menu" data-toggle="modal" data-target="#register-modal">Sign Up</a></li>
		<li><a href="#"></a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Get your stack questions answered</h1>
        <div class="row center">		  
        </div>
        <div class="row center">
          <a href="#" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="img/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block text-center">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Free User</h5>
            <p class="light">Get your question answered by your peers..</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block text-center">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">24X7</h5>
            <p class="light">Get your questions answered by our experts with in 24X7</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block text-center">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>

            <h5 class="center">Express (2Hrs)</h5>
            <p class="light">Get your questions answered instantly by our experts.</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Are you an expert? Join Our community</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="img/background2.png" alt="Unsplashed background img 2"></div>
  </div>

 
  <footer class="page-footer teal">
    <div class="footer-copyright">   
      <h5>Copyright © 2017 MX network </h5> 
        <div class="pull-right link"><a href="#"><img src="img/fb.png" class="fb"></a><a href="#"><img src="img/tw.png"></a><a href="#"><img src="img/ln.png"></a></div>
    </div>
  </footer>
  
  

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow: hidden">
    	  <div class="modal-dialog">		  
				<div class="loginmodal-container">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h1>Login</h1><br>
				  <form>
					<input type="text" name="user" placeholder="Username" ng-model="login.email">
					<input type="password" name="pass" placeholder="Password" ng-model="login.password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login" ng-click="loginUser()">
				  </form>
					
				  <div class="login-help">
					<a href="#" class="register-login" data-toggle="modal" data-target="#register-modal" data-dismiss="modal">Register Now</a>
				  </div>
				</div>
			</div>
		  </div>
		  
		  
		  
		  <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow: hidden">
    	  <div class="modal-dialog">		  
				<div class="loginmodal-container">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h1>Register </h1><br>
				  <form>
					<input type="text" name="user" placeholder="Name" ng-model="signup.name">
					<input type="text" name="enail" placeholder="EmailAddress" ng-model="signup.email">
					<input type="password" name="pass" placeholder="Password" ng-model="signup.password">
					<input type="password" name="pass" placeholder="Confirm Password" ng-model="signup.confirm_password">
					<input type="submit" name="Register" class="login loginmodal-submit" value="Register" ng-click="signupUser()">
				  </form>
					
				  
				</div>
			</div>
		  </div>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/lobibox.min.js"></script>
  <script src="js/notifications.min.js"></script>
  <script src="js/init.js"></script>
<script>
    var __appurl = "http://192.168.10.171/mxnetwork/public"
    var app =  angular.module('myApp', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
  });
  app.controller('myCtrl', function($scope, $http) {
      $scope.login = {};
      $scope.signup = {};
      $scope.loginUser = function()
      {
          console.log($scope.login);
          $http({
                method: "POST", 
                url: __appurl + "/login",
              data:$scope.login
            }).then(function (success) {
                console.log(success);
                console.log(success.data.status );
                if(success.data.status === true)
                {
                    if(success.data.new_user)
                    {
                        window.location.href = "{{url('/plans')}}";
                    }
                    else
                    {
                        window.location.href = "{{url('/home')}}";
                    }
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
      
      $scope.signupUser = function()
      {
          console.log($scope.signup);
          $http({
                method: "POST", 
                url: __appurl + "/signup",
              data:$scope.signup
            }).then(function (success) {
                console.log(success);
                console.log(success.data.status );
                if(success.data.status === true)
                {
                    //window.location.href = "{{url('/home')}}";
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
  });
    </script>
  </body>
</html>
