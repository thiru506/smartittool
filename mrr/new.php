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
function renderForm($mrName, $branch, $error)
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

<div class="bd-pageheader" style="padding-top: 2rem;padding-bottom: 2rem;text-align: left;background-color: #5bc0de">

<div class="row" style="width: 100%;">
    <div class="col-md-4">
 <div id="navbar" class="clearfix content-heading"> <a href="index.php"><img src="sh.png" class="img-thumbnail" alt="SFPL LOGO"></a>
</div>
   </div>
   <center><b><h3 class="">New Rooms Creation</h3></b></center>
</div>
</div>

<title>New Rooms Creation</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>

<br><br><br><br>

<form action="" method="post">
<center>
<div>
<h5><b style="color: orange"> Create new Room with Location<b></h5><br>
<strong>MeetingRoom Name*: </strong> <input type="text" name="mrName" value="<?php echo $mrName; ?>" /><br/><br>

<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Location*: </strong><?php echo $branches;?> <br/><br/>

<strong>MeetingRoom Type*: </strong> <input type="text" name="meetingtypeName" value="<?php echo $meetingtypeName; ?>" /><br/><br>

<strong>MeetingRoom Type ID*: </strong> <input type="text" name="meetingtypeId" value="<?php echo $meetingtypeId; ?>" /><br/><br>



<br><br>


<input type="Submit"  class=" btn btn-info" name='submit' id='submit' value='Submit' >	
</div>
</center>
</form>

</body>

</html>

<?php

}









// connect to the database

//include('config.php');



// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

{

// get form data, making sure it is valid

$mrName = htmlspecialchars($_POST['mrName']);

$branch = htmlspecialchars($_POST['branch']);

$meetingtypeId = htmlspecialchars($_POST['meetingtypeId']);

$meetingtypeName = htmlspecialchars($_POST['meetingtypeName']);



// check to make sure both fields are entered

if ($mrName == '' || $branch == '' || $meetingtypeId == '' || $meetingtypeName == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm($mrname, $branch, $meetingtypeName, $meetingtypeId, $error);

}

else

{

// save the data to the database

$sql="INSERT meetingrooms SET mrName='$mrName', meetingtypeId='$meetingtypeId', meetingtypeName='$meetingtypeName',  branchId='$branch'";

$result = $conn->query($sql);





// once saved, redirect back to the view page

header("Location: admin.php");

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','');

}

?>