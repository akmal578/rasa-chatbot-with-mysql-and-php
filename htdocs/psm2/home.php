<?php
session_start();
//check if logged in
if(!isset($_SESSION['userlogin'])) {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="home.css">
  </head>
  <body>

    <header>
    <!--Logo-->
    <div class="row">
        <div class="logo">
        <img src=""
        </div>
    <!--Nav Button-->
    <ul class="main-nav">
        <li class="active"><a href="home.php"> HOME </a></li>
        <li><a href="list.php"> RESTAURANT LIST </a></li>
        <li><a href="logout.php"> LOG OUT </a></li>
        </ul>
        </div>
    </header>

        <div class="formbox">

            <h1>Register Restaurant</h1>
            <!--For form container-->
            <form class="form-request" action="includes/userprocess.php" method="post">
                <!--Call Hidden Session -->
            <!--<input type="hidden" name="email" value="<//?php echo $_SESSION['email']; ?>" />-->
                <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>" />

                <label for="Restaurant name">Enter Restaurant Name</label>
                <input type="text" name="restname" placeholder="Enter Name">

                <label for="Street">Enter Street Address</label>
                <input type="text" name="street" placeholder="Street Address">

                <label for="Zip">Enter Zip Code</label>
                <input type="text" name="zipcode" placeholder="Ex: 81900">

                <label for="City">Enter City</label>
                <input type="text" name="city" placeholder="Ex: Bukit Beruang">

                <label for="State">Enter State</label>
                <input type="text" name="state" placeholder="Enter State">

                <label for="Food">Choose Food Type</label><br><br>
                <label><input type="checkbox" name="food[]" value="Malay food"> Malay food</label><br>
                <label><input type="checkbox" name="food[]" value="Chinese food"> Chinese food</label><br>
                <label><input type="checkbox" name="food[]" value="Indian food"> Indian food</label><br>
                <label><input type="checkbox" name="food[]" value="Thailand food"> Thailand food</label><br>
                <label><input type="checkbox" name="food[]" value="Japanese food"> Japanese food</label><br>
                <label><input type="checkbox" name="food[]" value="Western food"> Western food</label><br>
                <label><input type="checkbox" name="food[]" value="Seafood"> Seafood</label><br>

                <input type="submit" name="form-submit" value="Send Request">

            </form>
        </div>

  </body>
</html>
