<?php

   //require('db_config.php');
//echo ("HI THIRU");
$servername = "localhost";
$username = "root";
$password = "s@group9";
$dbname = "ost";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
  echo "Connected";
}
$text1 = $_REQUEST['branchId'];
$mtype = $_REQUEST['mtype'];

//echo($text1);

   /*$sql = "SELECT `issue_id`,`issue_name` FROM ost_dept_issues as osad inner join ost_help_topic as osu on osad.topic_id= osu.topic_id";*/

   $sql = "SELECT * FROM meetingrooms where  branchId=$text1 AND meetingtypeId=$mtype";

   //$result = $mysqli->query($sql);

   $result = $conn->query($sql);
   //print_r("$result");
//echo ("Hello");
   $json = [];

while($row = $result->fetch_assoc()) {
/*$options .= "<option value='".$row['issue_id']."'>".$row['issue_name']."</option>";*/


$options .= "<option value='".$row['mrName']."'>".$row['mrName']."</option>";
//$options .= "<option value='".$row['mrName']."'>""</option>";

}
echo $options;

//echo "Thiru";

   /*while($row = $result->fetch_assoc()){
        $json[$row['issue_id']] = $row['issue_name'];
   }

   echo json_encode($json);*/
?>