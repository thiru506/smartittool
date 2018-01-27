<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha256-yMjaV542P+q1RnH6XByCPDfUFhmOafWbeLPmqKh11zo=" crossorigin="anonymous" />
 
 <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });
</script>

     <table>        
	<tr>
<th></th>
<!-- <th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th> 
</tr></table>
-->
<div class="bd-pageheader" style="padding-top: 1rem;padding-bottom: 1rem;text-align: left;background-color: #5bc0de">

<div class="row">
    <div class="col-md-4">
 <div id="navbar" class="clearfix content-heading"> <img src="sh.png" class="img-thumbnail" alt="Responsive image">
<b><h7 class="">SFPL IT Asset Form</h7></b><br>

</div>
	</div>
	
</div><center>This request and approval form is to be completed by the concerned department and hand over to IT procurement of any IT asset.</center>
</div>
	<div class=" ">
      <div class="container-fluid" >
         <div class="row">
        <div class="col-md-4 col-md-offset-4 centered"> 
               
            <div>
			<br><br>
			
			<form>
			<div class="form-group">
			 <label for="reqname">Requester Name:</label>
            <input type="text" class="form-control" name='reqname'>		
			</div>

		<div class="form-group">
			 <label for="reqfor">Requesting For:</label>
            <input type="text" class="form-control" name='reqfor'>		
			</div>

		<div class="form-group">
			 <label for="dept">Department:</label>
            <input type="text" class="form-control" name='dept'>		
			</div>

		<div class="form-group">
			 <label for="location">Location:</label>
            <!--<input type="text" class="form-control" name='location'>-->	
			<select class="form-control form-control-lg" name="location">
				<option>Select Location</option>
				<option>Hyderabad</option>
				<option>Vijayawada</option>
				<option>Visakhapatnam</option>
				
			    </select>	

			</div>

			<div class="form-group">
			<label for="asset">Request for Asset:</label></div>
			<label class="radio-inline"><input type="radio" name="radio1" value="">Laptop</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label class="radio-inline"><input type="radio" name="radio1" value="">Desktop</label><br><br>
			<label class="checkbox-inline"><input type="checkbox" value="">MS-Office</label>
			<label class="checkbox-inline"><input type="checkbox" id="chkPassport" value="">Others</label>
				</div>

		<!-- <label for="chkPassport">
    <input type="checkbox" id="chkPassport" />
    Others
</label>--><br>

<div id="dvPassport" style="display: none">
    Others:
    <input type="text" id="txtPassportNumber" />
</div>


				<br>
			<div class="form-group">
			<label for="rfr">Reason for Request:</label></div>
				<div class="form-group">
  
  <textarea class="form-control" rows="5" id="rfr"></textarea>
</div>
		

			<div class="form-group">
		<!--<input type="submit"  class=" btn-info" name='submit' id='submit' value='Submit' ">	
		<input type="submit" class=" btn-info" name='cancel' id='cancel' value='Cancel' ">	-->
		<input type="Submit"  class=" btn btn-success" name='Submit' id='Submit' value='Submit' ">	
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;-->
		<input type="Submit" class=" btn btn-danger" name='Cancel' id='Cancel' value='Cancel' ">
			</div>
			<div id='rtable'>
			</div>



<?php 
if(isset($_POST['Submit'])){
?>
<?php

// multiple recipients
// $to  = 'aidan@example.com' . ', ';   
// $to .= 'wez@example.com';
$to="italerts.hyd@shgroup.in";
// subject
$subject = 'test01';

// message
$message = '
<html>
<head>
  <title>Your Request Has been Posted</title>
</head>
<body>
  <p>We are processing your Request</p>
</body>
</html>
';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";




    mail($to, $subject, $message, $headers);
}
?>





</html>
                 

       








<!-- <div class="form-group">
			 <label for="branch">Select Meeting Room:</label>
			    <select class="form-control form-control-lg" id="branch">
				<option>Select Room</option>
				<option>MR1-6S</option>
				<option>MR2-VC/P-5S</option>
				<option>Red Room-VC/P/WB-4S</option>
				<option>Yellow Room-WB-4S</option>
				<option>Brown Room-P/A-4S</option>
				<option>Conf.Room-VC/WB/P-40S</option>
				<option>Golden Room-P-6S</option>
				<option>Diamond Room-P-6S</option>
				<option>Ruby Room-P-6S</option>
				<option>Platinum Room-P-6S</option>
				<option>Conf.Room-VC/WB/P-30S</option>
			    </select>		
			</div>	

			<div class="form-group">
			    <label for="date">Book Date :</label>
			    <div class="input-group date" data-provide="datepicker">
			        <input type="text" class="form-control">
			         <div class="input-group-addon">
			            <span class="glyphicon glyphicon-th"></span>
			        </div>
			    </div>
		    </div>
			
				<div class="form-group">
			 <label for="emails">Attendence Emails:</label>
            <input type="text" class="form-control" name='emil'>		
			</div>

						
			
			
			<!--
				<table class="table">
				  <thead>
					<tr>
					  <th>Available Timings</th>	<th>9:00</th><th>9:30</th><th>10:00</th><th>10:30</th><th>11:00</th><th>11:30</th>
					  <th>12:00</th><th>12:30</th><th>1:00</th><th>1:30</th><th>2:00</th><th>2:30</th>
					  <th>3:00</th><th>4:00</th><th>5:00</th><th>5:30</th>
					  <th>6:00</th>
					  <th>6:30</th>
					</tr>
				  </thead>
				  <tbody>
					<tr><td>Red Room</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
					<tr><td>Yellow Room</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
					<tr><td>Green Room</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
					<tr><td>Brown Room</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
					</tbody>
					</table>
					
					
					<button type="submit" class="btn btn-default">Submit</button> -->
			</form>
             </div> 
	  
	  
      </div>
    </div>
	</div>
<!--<script>  
/*
$( document ).ready(function() {



$('.datepicker').datepicker({

    format: 'dd/mm/yyyy',
	"setDate": new Date(),
        "autoclose": true
 
});

$('#branchId').change(function(){

 branchName=$('#branch').val();
    $.ajax({
   url: 'ajax.php',
   data: 'list=list&branchName='+branchName,
    success: function(data) {
	  $('#secondropdownid').REPLACE(data);

   }})
   
   });
  });



  
</script>-->
