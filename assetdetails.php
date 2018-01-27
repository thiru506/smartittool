<?php

  $user=$thisclient->getName();
echo __($user);


 $servername = "localhost";
$username = "root";
$password = "s@group9";
$dbname = "ost";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM ost_asset_details";
$result = $conn->query($sql);

    ?>
<table border="2">
  <thead>
    <tr>
      <th>Asset Name</th>
      <th>Asset Brand</th>
      <th>Asset Serial Number</th>
     
    </tr>
  </thead>
  <tbody>
    <?php
      if( $result->num_rows > 0 ){
        {
        while( $row = $result->fetch_assoc() ){
          echo "<tr><td>".$row["asset_name"]."</td><td>".$row["asset_brand"]."</td><td>".$row["asset_serial_number"]."</td></tr>";
        }
      }
    ?>
  </tbody>
</table>
    <?php
  }

?>