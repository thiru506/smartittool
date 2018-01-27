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

$servername = "localhost";
$username = "root";
$password = "s@group9";
$dbname = "ost";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
  echo "Connected";
}

  if(isset($_POST['submit'])){

$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$uploaded_file=$_POST['uploaded_file'];
//$rdoBranch=$_POST['rdoBranch'];
//$bldgroup=$_POST['bldgroup'];



echo 'name is '.$name;


/*$record="INSERT INTO ost_idcard(empname,empdesignation, empemail, empphnumber, rdoBranch, bldgroup) VALUES  
('$empname','$empdesignation','$empemail','$empphnumber','$rdoBranch','$bldgroup')";

mysqli_query($conn,$record);

$view="select *  from ost_idcard";
$result=mysqli_query($conn,$view);*/
require 'PHPMailer/PHPMailerAutoload.php';
$mailbody = "";
$mailbody .= 'Employee Name: '.$name ."<br/>";
//$mailbody .= 'Employee Designation: '.$empdesignation. "<br/>";
$mailbody .= 'Email-id: '.$email. "<br/>";
$mailbody .= 'message: '.$message. "<br/>";
//$mailbody .= 'Office: '.$rdoBranch. "<br/>";
$mailbody .= 'uploaded_file: '.$uploaded_file. "<br/>";


    $mail = new PHPMailer();
    $subject = 'ID Card Request';
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
   'ravi.kolli@shgroup.in' => 'Person Two',
   // ..
);
foreach($recipients as $email => $name)
{
   $mail->AddCC($email, $name);
}


    $mail->send();

mysqli_close($conn);
}
echo "Thank you for Requesting ID Cards ";

?>
