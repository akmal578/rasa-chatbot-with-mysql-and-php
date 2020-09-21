<?php

if (isset($_POST['form-submit'])) {

  require 'database.php';

  $userid = $_POST['userid'];
  $restname = $_POST['restname'];
  $street = $_POST["street"];
  $zipcode = $_POST["zipcode"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $food = $_POST["food"];
  $checkBox = implode(',', $food);
    //Error Handlers
    if (empty($restname) || empty($street) || empty($zipcode) || empty($city) || empty($state) || empty($food)) {
      //header("Location: ../home.php?error=emptyfields&restaurantname=".$restname."&zip=".$zipcode);
      echo "<script>";
      echo " alert('Please enter all field');
            window.location.href='../home.php';
            </script>";
      exit();
    }

    //Check Dupe
    else {
      $check_duplicate_id = "SELECT userid FROM loc_data WHERE userid='$userid' ";
      $result = mysqli_query($conn, $check_duplicate_id);

      $count = mysqli_num_rows($result);

      //Insert into database
      if ($count >= 0) {
        $query = "INSERT INTO loc_data (userid, restaurant, street, zipcode, city, state, foodtype) VALUES
        ('$userid','$restname','$street','$zipcode','$city', '$state', '$checkBox')";
        if (mysqli_query($conn, $query)) {

          echo "<script>";
          echo " alert('Successfully registered!');
                window.location.href='../home.php';
                </script>";
        }
        else {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

      }
      mysqli_close($conn);
    }
}
