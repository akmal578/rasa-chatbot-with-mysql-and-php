<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION['userlogin']) && $_SESSION['userlogin'] === true){
    header("location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
  <body>
    <!--Logo-->
    <div class="row">
        <div class="logo">
        <img src=""
        </div>
    <!--Nav Button-->
    <ul class="main-nav">
        <li class="active"><a href="login.php"> LOGIN </a></li>
        <li><a href="signform.php"> REGISTER </a></li>

        </ul>
        </div>

      <div class="loginbox">
      <img src="images/avatar.png" class="avatar"> <!--Pictures-->

          <h1>Login Here</h1>
          <!--For form container-->
          <form class="form-login" action="includes/loginprocess.php" method="post">
              <label for="username">Username or Email</label>  <!--Email input box below-->
              <input type="text" name="muid" placeholder="Enter Username or Email">

              <label for="password">Password</label> <!--Password input box below-->
              <input type="password" name="pwd" placeholder="Enter Password">

              <input type="submit" name="login-submit" value="Login">

              <!--Reset Acc-->
         <!-- <a href="#">Lost your password?</a><br> -->
              <a href="signform.php">Don't have an account?</a>
          </form>

      </div>
  </body>
</html>
