<?php

if (isset($_POST["deleteuser"])) {
  require 'database.php';

  $id = $_POST['id'];

  $sql = "DELETE FROM loc_data WHERE id ='$id'";

  if (mysqli_query($conn, $sql)) {
    echo "<script>";
    echo " alert('Delete Success');
          window.location.href='../list.php'
          </script>";
 }

  else {
  echo "Error deleting record: " . mysqli_error($conn);
  }
}

?>
