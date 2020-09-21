<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "my_db";

/* Attempt to connect to MySQL database */
$conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname);

// Check connection
if(!$conn) {
    die("ERROR: Could not connect. ".mysqli_connect_error());
}
?>
