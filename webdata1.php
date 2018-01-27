 <?php 


/*$servername = "localhost";
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

//print_r($result);

//echo "<table style='border: solid 1px black;'>";
 //echo "<tr><th>UserId</th><th>Assetname</th><th>Brandname</th><th>SerialNo</th></tr>";

if ($result->num_rows > 0) {
    // output data of each row



     while($row = $result->fetch_assoc()) {
        echo "userid: " . $row["user_id"]. " - Asset Name: " . $row["asset_name"]. " -- Brand Name:" . $row["asset_brand"]. " -- SerialNo :" .$row["asset_serial_number"]. "<br>"; 

       }
} else {
    echo "0 results";
}
$conn->close();
//echo "</table>";

*/

//echo (THIRU);

?>
<!-- 
<h1 style="color:red;"><center>WELCOME TO SRINIVASA FARMS</center><h1>
   <h1 style="color:red;"><center> MEETING ROOM REQUEST</center><h1>
   </br>
   <body>
		<form method="post" action="">
	
			<table bgcolor="#C4C4C4" align="center" width="580" border="0">
		       <tr>
					<td>Select Office </td>
					<td><select>
						<option value="13 office">13 office</option>
						<option value="KVH Office">KVH office</option>
					</td> 
				</tr>
	            <tr>
						<td>Select Your department </td>
					<td><select>
						<option value="Accounts">Accounts</option>
						<option value="Admin">Admin</option>
						<option value="HR">HR</option>
						<option value="IT System">IT System</option> 
					</td>
		       </tr> 
	          <tr>
		         <td>Select Your Meeting ROOM </td>
		         <td><select>
					  <option value="MR VC 13 Members">MR VC 13 Members</option>
					  <option value="MR VC 13 Members">MR VC 13 Members</option>
					  <option value="MR VC 13 Members">MR VC 13 Members</option>
					  <option value="MR VC 13 Members">MR VC 13 Members</option> 

					  <option value="MR VC 4 Members">MR VC 4 Members</option>
					  <option value="MR VC 4 Members">MR VC 4 Members</option>
					  <option value="MR VC 4 Members">MR VC 4 Members</option>
					  <option value="MR VC 4 Members">MR VC 4 Members</option> 

				  </td>
			  </tr>
			   <tr>
				<td>Enter Your Mobile Number </td>
				<td><input type="number" name="num" /></td>
			  </tr>
	           <tr>
					<td>No Of Attendies </td>
					<td><textarea name="address"></textarea></td>
				</tr>
				<td align="center" colspan="2"><input type="submit" value="save" name="submit" /></td>
	 
			</table>
 
		</form>
	
	</body> -->


	<head>
        <title>srinivasa.co</title>
        <style>
            body  {
                background-image: url("images/mr.jpg");
                background-color: #cccccc;
                background-size:cover;
                background-repeat:no-repeat !important;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-position: top center !important;
                background-attachment: fixed;
            }
        </style>
    </head>
    <body><br/><br/><br/><br/><br/><br/><br/>
   <h1><center>COMING SOON</center></h1>
    </body>






