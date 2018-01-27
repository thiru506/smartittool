<?php

include('config.php');

$query = "SELECT DISTINCT branch FROM 'meetingrooms'";
$result=mysqli_query($conn, $query);
//$result = $conn->query($query) 
$options="";
while($row = mysqli_fetch_array($result))
{
$options =$options."<options>$row[1]</options>";
}
?>
<html>
<!--<select>
<?php while($row1 = mysqli_fetch_array($result1)):;?>
<option value="<?php echo $row[0];?>"<?php echo $row[1];?></option>
<?php endwhile;?>
</select>-->
<select>
	<?php echo $options;?>
	</select>
</body>
<html>