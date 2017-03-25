  
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
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"><img src="{{url('/img/Logo.png')}}" class="logo"></a>
      <!--<ul class="right hide-on-med-and-down">
        <li><a href="#" data-toggle="modal" data-target="#login-modal" class="login-menu">Login</a></li>	
		<li><a href="#" class="login-menu" data-toggle="modal" data-target="#register-modal">Sign Up</a></li>
		<li><a href="#"></a></li>
      </ul>-->

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>



@yield('content')

<footer class="page-footer teal">
    <div class="footer-copyright">   
      <h5>Copyright © 2017 MX network </h5> 
        <div class="pull-right link"><a href="#"><img src="img/fb.png" class="fb"></a><a href="#"><img src="img/tw.png"></a><a href="#"><img src="img/ln.png"></a></div>
    </div>
  </footer>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="js/lobibox.min.js"></script>
  <script src="js/notifications.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
      </body>
</html>