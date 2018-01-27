<html><head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
<style>
  h1 {color:red;}
  h2 {margin-left: 300;}
</style>
</head>

<div class="bd-pageheader" style="padding-top: 2rem;padding-bottom: 2rem;text-align: left;background-color: #5bc0de">

<div class="row" style="width: 100%;">
   <div class="col-md-4">
      <div id="navbar" class="clearfix content-heading"> <img src="sh.png" class="img-thumbnail" alt="Responsive image">
         <h2>Meeting Room Request</h2>
      </div>
   </div>
</div>
</div>
<center><h1>Thank You for Book Your Room <br/><br/>Please Check Your mail for confirmation</h1>
<h1><a href="index.php" class="btn btn-info" role="button">HOME</a></h1>
</center>
<body background="2.jpg">
</body>

</html>

<?php
//include "db.php";
//$conn=dbconnection();

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


if(isset($_POST['submit'])){

$mtype=$_POST['mtype'];
$branch=$_POST['branch'];
$mrtype=$_POST['mrtype'];
$mrstartdate=$_POST['mrstartdate'];
$mrstarttime=$_POST['mrstarttime'];
$mrenddate=$_POST['mrenddate'];
$mrendtime=$_POST['mrendtime'];
$mrduration=$_POST['mrduration'];
$mrtopic=$_POST['mrtopic'];
$mrpurpose=$_POST['mrpurpose'];
$noofattendence=$_POST['noofattendence'];
//$recurrenceType = $_POST['recurrence'];
$orgemail=$_POST['orgemail'];
//$dueDate = $_POST['mrudate'];
//echo 'mrdate is '.$mrdate;
//echo '<br> time is '.$mrtime;
//exit;

/*$record="INSERT INTO mrdate(mr_office, mrsId, start_date, start_time,end_date,end_time, mr_duration, mr_topic, mr_purpose, mr_type,recurrence_type_id,due_date, mr_attendence, mr_email) VALUES  
('$mroffice','$mrid','$mrstartdate','$mrstarttime','$mrenddate','$mrendtime','$mrduration','$mrtopic','$mrpurpose','$mtype','$recurrenceType','$dueDate','$mrattendence','$email')";*/

$record="INSERT INTO ost_meetingrequest(mtype, branch, mrtype, mrstartdate, mrstarttime, mrenddate, mrendtime, mrduration, mrtopic, mrpurpose, noofattendence, orgemail) VALUES  ('$mtype', '$branch', '$mrtype',              '$mrstartdate', '$mrstarttime', '$mrenddate', '$mrendtime', '$mrduration', '$mrtopic', '$mrpurpose', '$noofattendence', '$orgemail')";

mysqli_query($conn,$record);

$view="select branch from ost_meetingrequest";
$result=mysqli_query($conn,$view);

require 'PHPMailer/PHPMailerAutoload.php';
$mailbody = "";
$mailbody .= 'Meeting Type: '.$mtype ."<br/>";
$mailbody .= 'Office Name: '.$branch ."<br/>";
$mailbody .= 'Room Name: '.$mrtype ."<br/>";
$mailbody .= 'Start Date: '.$mrstartdate ."<br/>";
$mailbody .= 'Start Time: '.$mrstarttime ."<br/>";
$mailbody .= 'End Date: '.$mrenddate ."<br/>";
$mailbody .= 'End Time: '.$mrendtime ."<br/>";
$mailbody .= 'Meeting Duration: '.$mrduration ."<br/>";
$mailbody .= 'Topic: '.$mrtopic ."<br/>";
$mailbody .= 'Meeting Pupose: '.$mrpurpose ."<br/>";
$mailbody .= 'Total members: '.$noofattendence ."<br/>";
$mailbody .= 'Meeting Organiser: '.$orgemail ."<br/>";


    $mail = new PHPMailer();
    $subject = 'Meeting room request';
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

    $recipients = array(
   'thirupathi.anagurthi@shgroup.in' => 'Person One',
   $orgemail => 'Person Two',
   // ..
);
foreach($recipients as $email => $name)
{
   $mail->AddCC($email, $name);
}


    $mail->send();

    //$mail->send();


mysqli_close($conn);
}
//echo "Thank you for Request your Meeting Room ";

?>
