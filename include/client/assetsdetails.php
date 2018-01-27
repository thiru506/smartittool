





<?php

//$user=$thisclient->getName();
// print_r('$user');
session_start();
 
//echo("THIRU");
//$user1 = $_GET['a'];
//$user = $_SESSION['totalcolumns'];
//$user = $_SESSION['varname'];
//echo($user);

//echo ('IT Asset Form Template');






$user=$_REQUEST['user'];

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
 
$sql = "SELECT * FROM ost_asset_details where user_name='$user'";
// SELECT * FROM ost_asset_details as osad inner join ost_user as osu on osad.user_id= osu.id;

$result = $conn->query($sql);

?>
<table border="2">
  <thead>
    <tr>
      <th>Asset Name</th>
      <th>Asset Brand</th>
      <th>Asset Serial Number</th>
      <th>Year of purchase</th> 
    </tr>
  </thead>
  <tbody>
    <?php
      if( $result->num_rows > 0 ){
        {
        while( $row = $result->fetch_assoc() ){
          echo "<tr><td>".$row["asset_name"]."</td><td>".$row["asset_brand"]."</td><td>".$row["asset_serial_number"]."</td><td>".$row["year_of_purchase"]."</td></tr>";
        }
      }
    ?>
  </tbody>
</table>
    <?php
  }

?>