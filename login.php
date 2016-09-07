<?php
require "config.php";
if(isset($_POST['action_login'])){
	$identification = $_POST['login'];
	$password = $_POST['password'];
	if($identification == "" || $password == ""){
		$msg = array("Error", "Username / Password Wrong !");
	}else{
		$login = \Fr\LS::login($identification, $password, isset($_POST['remember_me']));
		if($login === false){
			$msg = array("Error", "Username / Password Wrong !");
		}else if(is_array($login) && $login['status'] == "blocked"){
			$msg = array("Error", "Too many login attempts. You can attempt login after ". $login['minutes'] ." minutes (". $login['seconds'] ." seconds)");
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>MyFreeTeamSpeak</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="login.php" method="POST">
		        <h2 class="form-login-heading">sign in now</h2>
				      <?php
      if(isset($msg)){
        echo "<h2>{$msg[0]}</h2><p>{$msg[1]}</p>";
      }
      ?>
	   <?php
							  $ip = getenv('HTTP_CLIENT_IP')?:
	getenv('HTTP_X_FORWARDED_FOR')?:
	getenv('HTTP_X_FORWARDED')?:
	getenv('HTTP_FORWARDED_FOR')?:
	getenv('HTTP_FORWARDED')?:
	getenv('REMOTE_ADDR');
	
      if( isset($_POST['submit']) ){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $retyped_password = $_POST['retyped_password'];
        $name = $_POST['name'];
        if( $username == "" || $email == "" || $password == '' || $retyped_password == '' || $name == '' ){
            echo "<h2>Fields Left Blank</h2>", "<p>Some Fields were left blank. Please fill up all fields.</p>";
        }elseif( !\Fr\LS::validEmail($email) ){
            echo "<h2>E-Mail Is Not Valid</h2>", "<p>The E-Mail you gave is not valid</p>";
        }elseif( !ctype_alnum($username) ){
            echo "<h2>Invalid Username</h2>", "<p>The Username is not valid. Only ALPHANUMERIC characters are allowed and shouldn't exceed 10 characters.</p>";
        }elseif($password != $retyped_password){
            echo "<h2>Passwords Don't Match</h2>", "<p>The Passwords you entered didn't match</p>";
        }else{
          $createAccount = \Fr\LS::register($username, $password, $ip,
            array(
              "email" => $email,
              "name" => $name,
              "created" => date("Y-m-d H:i:s") // Just for testing
            )
          );
          if($createAccount === "exists"){
            echo "<label>User Exists.</label>";
          }elseif($createAccount === "ipexists")
		  {
		  echo "<label>Ip Exists, You may only create one account.</labe>";
		  }elseif($createAccount === true){
            echo "<label>Success. Created account. <a href='login.php'>Log In</a></label>";
          }
        }
      }
							  ?>
		        <div class="login-wrap">
		            <input name="login" type="text" class="form-control" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" name="action_login" href="login.php" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		            

		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a data-toggle="modal" href="login.html#register"> Create One!</a>
		            </div>
		
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <?php  \Fr\LS::forgotPassword(); ?>
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
				  
				  		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="register" role="dialog" tabindex="-1" id="register" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Register Account</h4>
		                      </div>
		                      <div class="modal-body">
							  <center>
							 
		                            <form action="login.php#register" method="POST">
        <label>
          <input name="username" placeholder="Username" />
        </label>
		<br/>
        <label>
          <input name="email" placeholder="E-Mail" /> 
        </label>
		<br/>
        <label>
          <input name="pass" type="password" placeholder="Password" />
        </label>
		<br/>
        <label>
          <input name="retyped_password" type="password" placeholder="Retype Password" />
        </label>
		<br/>
        <label>
          <input name="name" placeholder="Name" />
        </label>
		<br/>
        <label>
          <button name="submit">Register</button>
        </label>
      </form>
	  </center>
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>
		


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
