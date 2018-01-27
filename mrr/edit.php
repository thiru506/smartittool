<?php
 include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select username from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($mrsId, $mrName, $branch, $error)

{
	$servername = "localhost";
    $username = "root";
    $password = "s@group9";
    $dbname = "ost";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM branch";
    $result = $conn->query($sql);
    $branches = '';
    $branches .= '<select required  class="drpBranch" name="branch" id="branch" style="color:black">';
    $branches .= '<option value=\'\'>Select Office</option>';
    while( $row = $result->fetch_assoc() ){
        $branches .= '<option value="'.$row['branchId'].'">'.$row['branchName'].'</option>';
    }
    $branches .= '</select>';

  
?>

<!DOCTYPE HTML>

<html>

<head>
	<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
<style>
body {
  background: url(bg.jpg) no-repeat;
  background-size: 100%;
}

</style>


<title>Edit Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<input type="hidden" name="mrsId" value="<?php echo $mrsId; ?>"/>
<br><br><br><br>
<center>
<div>

<!--<p><strong>ID:</strong> <?php echo $mrsId; ?></p>-->

<strong style="color: orange">MeetingRoom Name* : </strong> <input type="text" name="mrName"  value="<?php echo $mrName; ?>"/><br><br>

<strong style="color: orange"> &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    Branch Name* : </strong> <?php echo $branches; ?><br>
<br><br>

<input type="submit" name="submit" value="Submit">

</div>
</center>
</form>

</body>

</html>

<?php

}







// connect to the database

include('config.php');



// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['mrsId']))

{

// get form data, making sure it is valid

$mrsId = $_POST['mrsId'];

$mrName = htmlspecialchars($_POST['mrName']);

$branch = htmlspecialchars($_POST['branch']);



// check that firstname/lastname fields are both filled in

if ($mrName == '' || $branch == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($mrsId, $mrName, $branch, $error);

}

else

{


// save the data to the database

$sql="UPDATE meetingrooms SET mrName='$mrName', branchId='$branch' WHERE mrsId='$mrsId'";

$result = $conn->query($sql);



// once saved, redirect back to the view page

header("Location: admin.php");

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['mrsId']) && is_numeric($_GET['mrsId']) && $_GET['mrsId'] > 0)

{

// query db

$mrsId = $_GET['mrsId'];

//$result = mysql_query("SELECT * FROM meetingrooms WHERE mrsId=$mrsId")

//or die(mysql_error());

$sql="SELECT * FROM meetingrooms WHERE mrsId=$mrsId";

$result = $conn->query($sql);

//$row = mysql_fetch_array($result);

$row = $result->fetch_assoc();



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$mrName = $row['mrName'];

$branch = $row['branchId'];



// show form

renderForm($mrsId, $mrName, $branch, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>