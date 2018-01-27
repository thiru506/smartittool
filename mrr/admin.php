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

//$sql = "SELECT branch,meetingrooms.mrsId,mrName,branch.branchId FROM branch, meetingrooms WHERE branch.branchId = meetingrooms.branchId ";

// SELECT * FROM ost_asset_details as osad inner join ost_user as osu on osad.user_id= osu.id;
$sql = "SELECT branch.branchName,meetingrooms.mrsId,meetingrooms.mrName FROM meetingrooms LEFT JOIN branch on branch.branchId = meetingrooms.branchId ORDER BY meetingrooms.mrsId DESC";

$result = $conn->query($sql);

?>
<html>
<head>

<script>
function myFunction() {
    confirm("Press a button!");
}
</script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />

<style>
body {
  background: url(bg.jpg) no-repeat;
  background-size: 120%;
}

</style>

<style>
.myTable { 
  width: 60%;
  text-align: left;
  background-color: lemonchiffon;
  border-collapse: collapse; 
  }
.myTable th { 
  background-color: goldenrod;
  color: white; 
  }
.myTable td, 
.myTable th { 
  padding: 10px;
  border: 1px solid goldenrod; 
  }
</style>
<div class="bd-pageheader" style="padding-top: 2rem;padding-bottom: 2rem;text-align: left;background-color: #5bc0de">

<div class="row" style="width: 100%;">
    <div class="col-md-4">
 <div id="navbar" class="clearfix content-heading"> <a href="index.html"><img src="sh.png" class="img-thumbnail" alt="Responsive image"></a>
</div>
   </div>
  <b><h3 class="">Admin Panel</h3></b>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <h4><a href = "logout.php">Sign Out</a></h4>
</div>
</div>
</head>
<br>
<br>
<body>
<center>
  <p><a href="new.php" class="btn btn-md" role="button" style="background-color:lightgreen;color: black">Create New Room</a></p><br><br>
  <table class="myTable">
  <thead>
    <tr>
      <th>Meeting Room Name</th>
      <th>Location Name</th>
       <th>Delete</th>
        <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( $result->num_rows > 0 ){
        {
        while( $row = $result->fetch_assoc() ){
          echo "<tr><td>".$row['mrName']."</td><td>".$row['branchName']."</td>
          <td><a onclick='myFunction()' href='delete.php?mrsId=$row[mrsId]' onclick='myFunction()'>delete Row</a></td><td><a href='edit.php?mrsId=$row[mrsId]'>Edit Row</a></td></tr>";
          }
      }
    ?>
  </tbody>
</table>
<!--<p><a href="new.php">Create New Room</a></p>-->
</center>
<br>
<br><br><br><br></body></html>
    <?php
  }

?> 