<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"/>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css" />
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
  </head>

  <body>   </body>

</html>

<?php
  //include "config.php";
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

//  $conn=dbconnection();
  if(isset($_POST['submit'])){

$name=$_POST['name'];
$email=$_POST['email'];
$website=$_POST['website'];
$gender=$_POST['gender'];
$comment=$_POST['comment'];

echo 'name is '.$name;
//echo '<br> time is '.$mrtime;
//exit;

$record="INSERT INTO recruitment(name,email, website, comment, gender) VALUES  
('$name','$email','$website','$comment','$gender')";

mysqli_query($conn,$record);

$view="select name from recruitment";
$result=mysqli_query($conn,$view);
require 'PHPMailer/PHPMailerAutoload.php';
$mailbody = "";
$mailbody .= 'Name: '.$name;
$mailbody .= 'Email: '.$email;
$mailbody .= 'Website: '.$website;
$mailbody .= 'Comment: '.$comment;
$mailbody .= 'Gender: '.$gender;


    $mail = new PHPMailer();
    $subject = 'ManPower Requisition Form';
    $body = $mailbody;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "ssl://smtp.gmail.com";
    $mail->AllowEmpty = true;
    $mail->Username = "smartadmin.sfpl@shgroup.in";//$this->config->item('amazon_ses_access_key');
    $mail->Password = "s@group9"; //$this->config->item('amazon_ses_secret_key');
    $mail->Port = 465;
    $mail->SMTPDebug = 0;
    $mail->SetFrom('smartadmin.sfpl@shgroup.in'); //from (verified email address)
    $mail->IsHTML(true);
    $mail->Subject = $subject; //subject
//message
    if (trim($body) != "") {
        $mail->MsgHTML($body);
    }
//recipient
    $mail->AddAddress('admin.sfpl@shgroup.in');
    $mail->send();

/*echo "<br>";
echo "<center>";
echo "<table border='1'>
      <tr>
         <th>Mr Date</th>
         <th>Requirement</th>
      </tr>";

   while($row = mysqli_fetch_array($result)) {
      /*echo "<tr>";
      echo "<td> Select Office  </td>";
      echo "<td>" . $row['mr_office'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td> Meeting Room  </td>";
      echo "<td>" . $row['mrsId'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td> Select Date </td>";
      echo "<td>" . $row['mr_date'] . "</td>";
      echo "</tr>";
      /*echo "<tr>";
      echo "<td> Start Time </td>";
      echo "<td>" . $row['mr_time'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td> Duration </td>";
      echo "<td>" . $row['mr_duration'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Topic  </td>";
      echo "<td>" . $row['mr_topic'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td> Purpose  </td>";
      echo "<td>" . $row['mr_purpose'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td> Meeting Type  </td>";
      echo "<td>" . $row['mr_type'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td> No.of Attendence  </td>";
      echo "<td>" . $row['mr_attendence'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td> Email </td>";
      echo "<td>" . $row['mr_email'] . "</td>";
      echo "</tr>";
   }
   echo "</table>";
echo "</center>";

*/



mysqli_close($conn);
}
//echo "Thank you for Request your Meeting Room ";

?>
