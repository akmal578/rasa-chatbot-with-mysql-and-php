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
    <title>Doctor List</title>
    <link href="list.css" rel="stylesheet" type="text/css">
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
            <li><a href="home.php"> HOME </a></li>
            <li class="active"><a href="list.php"> RESTAURANT LIST </a></li>
            <li><a href="logout.php"> LOG OUT </a></li>
        </ul>
      </div>
    </header>

    <form class="form" action="includes/delete.php" method="post" id='demo'>

    <label for="name">Restaurant name</label>
    <input type="text" name="name" id='a' placeholder="Restaurant" readonly>

    <label for="street">Street</label>
    <input type="text" name="icno" id='e' placeholder="Address" readonly>

    <label for="zipcode">Zip</label>
    <input type="text" name="contact" id='f' placeholder="Zip Code" readonly>

    <label for="City">City</label>
    <input type="text" name="address" id='b' placeholder="City" readonly>

    <label for="State">State</label>
    <input type="text" name="email" id='c' placeholder="State" readonly>

    <label for="Food">Foodtype</label>
    <input type="text" name="qualify" id='d' placeholder="Foodtype" readonly>

    <label for="Food">User Id</label>
    <input type="text" name="userid" id='g' placeholder="none" readonly>

    <label for="Food">Restaurant Id</label>
    <input type="text" name="id" id='h' placeholder="none" readonly>

    <input type="submit" name="deleteuser" onclick='myDelete()' value="Delete">

    </form>


    <?php
        require 'includes/database.php';

        $query = "SELECT * FROM loc_data";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {

          echo "<div class='tab' id='table-container'>";
          echo "<table id='meja'>";

          echo "<thead>";
          echo "<tr>
                <th class='A'>ID</th>
                <th class='B'>Restaurant</th>
                <th class='C'>City</th>
                <th class='D'>State</th>
                <th class='E'>Food type</th>
                <th class='hidden'>street</th>
                <th class='hidden'>zip</th>
                <th class='hidden'>userid</th>
                </tr>";
          echo "</thead>";
            // output data of each row
          echo "<tbody>";
            while($row = mysqli_fetch_assoc($result)) {
                 echo "<tr>
                       <td class='A'>".$row["id"]."</td>
                       <td class='B'>".$row["restaurant"]."</td>
                       <td class='C'>".$row["city"]."</td>
                       <td class='D'>".$row["state"]."</td>
                       <td class='E'>".$row["foodtype"]."</td>
                       <td class='hidden'>".$row["street"]."</td>
                       <td class='hidden'>".$row["zipcode"]."</td>
                       <td class='hidden'>".$row["userid"]."</td>
                       </tr>";
            }
          echo "</tbody>";
        }

        //If table empty
        else {
          echo "<div class='tab' id='table-container'>";
          echo "<table id='meja'>";

          echo "<thead>";
          echo "<tr>
                <th class='A'>ID</th>
                <th class='B'>Restaurant</th>
                <th class='C'>City</th>
                <th class='D'>State</th>
                <th class='E'>Food type</th>
                <th class='hidden'>street</th>
                <th class='hidden'>zip</th>
                <th class='hidden'>userid</th>
                </tr>";
          echo "</thead>";
            // output data of each row
            echo "<tbody>";
            echo "<tr>
                  <th>Empty</th>
                  <tr>";
            echo "</tbody>";
        }

          echo "</table>";

          echo "<div id='bottom_anchor'></div>";
          echo "</div>";

        mysqli_close($conn);
    ?>

    <!--Java script-->
    <script>

            var table = document.getElementById('meja');

            for(var i = 1; i < table.rows.length; i++)
            {
                table.rows[i].onclick = function()
                {
                     //rIndex = this.rowIndex;
                     document.getElementById("a").value = this.cells[1].innerHTML; //restaurant name
                     document.getElementById("b").value = this.cells[2].innerHTML; //city
                     document.getElementById("c").value = this.cells[3].innerHTML; //state
                     document.getElementById("d").value = this.cells[4].innerHTML; //foodtype
                     document.getElementById("e").value = this.cells[5].innerHTML; //street
                     document.getElementById("f").value = this.cells[6].innerHTML; //Zip
                     document.getElementById("g").value = this.cells[7].innerHTML; //userid
                     document.getElementById("h").value = this.cells[0].innerHTML; //rest id
                };
            }

    </script>

  </body>
</html>
