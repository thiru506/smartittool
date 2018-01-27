<?php
if(isset($_POST["submit"])){

echo("HI");

$subject = $_POST['mrtopic'];
$message = $_POST['mrpurpose'];

$headers = array("From:" . $_POST['orgemail'] ."",
    "Reply-To: ". $_POST['orgemail'] ."",
    "X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode("\r\n", $headers);


//$headers = 'From:'. $_POST['orgemail'] . "\r\n"; // Sender's Email

echo "Inputs are in";
echo ('The Topic is'.$subject.'Here');
echo ('The Email is'.$headers.'Here');
//echo .$headers.;
$message = wordwrap($message, 70);

$to = 'smartadmin.sfpl@shgroup.in';
// Send Mail By PHP Mail Function

mail($to, $subject, $message, $headers); // $recipient should be $to

//mail("thirubangaram898@gmail.com", $subject, $message, $headers);
echo "Your mail has been sent successfuly ! Thank you for your feedback";
}

/*

// Checking For Blank Fields..
	if($_POST["orgemail"]==""||$_POST["mrpurpose"]==""||$_POST["mrtopic"]==""||$_POST["mrtype"]==""){
	echo "Fill All Fields..";
	}else{
	// Check if the "Sender's Email" input field is filled out
	$email=$_POST['orgemail'];
	// Sanitize E-mail Address
	$email =filter_var($email, FILTER_SANITIZE_EMAIL);
	// Validate E-mail Address
	//$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "Invalid Sender's Email";
}
else{
$subject = $_POST['mrtopic'];
$message = $_POST['mrpurpose'];
$headers = 'From:'. $email . "\r\n"; // Sender's Email
//$headers .= 'Cc:'. $email2 . "\r\n"; // Carbon copy to Sender
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
mail("thirupathi.anagurthi@shgroup.in", $subject, $message, $headers);
echo "Your mail has been sent successfuly ! Thank you for your feedback";
}
}
} */
?>
