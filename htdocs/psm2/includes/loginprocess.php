<?php

if (isset($_POST["login-submit"])) {

  require "database.php";

  $mailuid = $_POST['muid'];
  $password = $_POST['pwd'];
  //Error if emptyfields
  if (empty($mailuid) || empty($password)) {
    header("Location: ../login.php?error=emptyfields");
    exit();
  }
  else {  //take from database
    $sql = "SELECT * FROM userdata WHERE username=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: ../signform.php?error=sqlerror");
      exit();
    }
    else {  //Convert raw data from database
      mysqli_stmt_bind_param($stmt, ss, $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        $pwdcheck = password_verify($password, $row['password']);

        if ($pwdcheck == false) {
            header("Location: ../login.php?error=wrongpassword");
            exit();
        }
        else if ($pwdcheck == true) {
          session_start();
          $_SESSION['userlogin'] = true; //tambah ni
          $_SESSION['userid'] = $row['id'];
          $_SESSION['useruid'] = $row['username'];
          $_SESSION['email'] = $row['email']; //test

          header("Location: ../home.php?login=success");
          exit();
        }
      }

      else {
        header("Location: ../login.php?error=noUser");
        exit();
      }
    }
  }

}
else {
  header("Location: ../login.php");
  exit();
}
