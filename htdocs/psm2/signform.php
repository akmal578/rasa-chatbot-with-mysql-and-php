<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION['userlogin']) && $_SESSION['userlogin'] === true){
    header("location: #");
    exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create Account</title>
    <link rel="stylesheet" type="text/css" href="signform.css">
  </head>
  <body>
    <!--Logo-->
    <div class="row">
        <div class="logo">
        <img src=""
        </div>
    <!--Nav Button-->
    <ul class="main-nav">
        <li class="active"><a href="signform.php"> REGISTER </a></li>
        <li><a href="login.php"> LOGIN </a></li>

        </ul>
        </div>

    <div class="signbox">

        <h1>Create New User Account</h1>
        <!--For form container-->
        <form class="form-signup" action="includes/signprocess.php" method="post">
            <label for="username">Enter Username</label>  <!--username input box below-->
            <input type="text" name="uid" placeholder="Enter Username">

            <label for="email">Enter Email</label>  <!--Email input box below-->
            <input type="text" name="email" placeholder="Enter Email">

            <label for="password">Enter Password</label>
            <input type="password" name="pwd" placeholder="Enter Password">

            <label for="repassword">Re-Enter Password</label> <!--Password input box below-->
            <input type="password" name="pwd-repeat" placeholder="Re-Enter Password">

            <input type="hidden" name="type" value="Normal User">

            <input type="submit" name="signup-submit" value="Create Now">

            <a href="login.php">Go to Login page?</a>
            <!--Test
            <p>whatever</p>
            <input type="text" name="" placeholder="testing"> -->

            <!--Reset Acc
            <a href="#">Lost your password?</a><br>
            <a href="#">Don't have an account?</a> -->
        </form>
      </div>

  </body>
</html>
