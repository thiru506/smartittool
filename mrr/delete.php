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

// connect to the database

include('config.php');


if(isset($_GET['mrsId'])){

$mrsId=$_GET['mrsId'];

$sql="DELETE FROM meetingrooms WHERE mrsId={$mrsId}";

$result = $conn->query($sql);

header("Location: admin.php");

exit();
}

?>