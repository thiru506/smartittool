<?php
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
$sql = "SELECT mrstartdate as start,mrpurpose as title, mrenddate as end, mrstarttime, mrendtime FROM ost_meetingrequest";
$result = $conn->query($sql);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
$resultArray = array();
foreach($json as $row => $value){
    $resultArray[$row]['start'] = $value['start'].'T'.$value['mrstarttime'];
    $resultArray[$row]['end'] = $value['end'].'T'.$value['mrendtime'];
    $resultArray[$row]['title'] = $value['title'];
}
 exit(json_encode($resultArray));
 
?>