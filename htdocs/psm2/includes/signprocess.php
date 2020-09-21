<?php
if (isset($_POST['signup-submit']))
{
  require 'database.php';

  $username = $_POST['uid'];
  $email = $_POST['email'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

  //ERROR HANDLERS
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signform.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signform.php?error=invalidmailuid");
    exit();
  }

  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signform.php?error=invalidmail&uid=".$username);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signform.php?error=invaliduid&mail=".$email);
    exit();
  }
  else if ($password !== $passwordRepeat) {
    header("Location: ../signform.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  }

  else {
    $sql = "SELECT username FROM userdata WHERE username=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signform.php?error=sqlerror");
      exit();
    }
    //Check Duplicate username
    else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck > 0) {
          header("Location: ../signform.php?error=usernametaken&mail=".$email);
          exit();
        }
        //Store to Database
        else {
          $sql = "INSERT INTO userdata (username, email, password) VALUES (?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);

          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../adminsign.php?error=sqlerror1");
            exit();
          }
          else {
            $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
            mysqli_stmt_execute($stmt);
            //header("Location: ../adminsign.php?signup=success");

            echo "<script>";
            echo " alert('Account successfully created.');
                  window.location.href='../signform.php';
                  </script>";
            exit();
          }
        }
      }
    }
  //close session
  mysqli_stmt_close($stmt);
  mysqli_stmt_close($conn);
}
else {
  header("Location: ../signform.php");
  exit();
}
