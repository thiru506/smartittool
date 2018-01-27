<?php
//include('config.php');
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

?>
<html xmlns="http://www.w3.org/1999/html">
<head><title>Srinivasa Farms Meeting Room Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="jquery.datetimepicker.css"/>
    <script src="jquery.datetimepicker.full.js"></script>


    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <style>
        body {

            background: url(bg.jpg) no-repeat;
            background-size: 120%;
        }

    </style>
    <style>
        .error{

            color:red;
        }

    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#branch').change(function(){
                var branchId=$('#branch').val();
                alert(branchId);
                var mtype=$('#mtype').val();
                alert(mtype);
                $.ajax({
                    url: 'ajax.php',
                    //data: 'list=list&mtype='+mtype,
                    data: {mtype: mtype, branchId:branchId},
                    success: function(data) {
                        $('#mrtype').html(data);

                   }})

            });




            $('#mrstartdate').datetimepicker({ timepicker:false,format:'Y-m-d',showTimepicker: false})
            $('#mrenddate').datetimepicker({ timepicker:false,format:'Y-m-d',showTimepicker: false})
            $('#rudate').datetimepicker({ timepicker:false,format:'Y-m-d',showTimepicker: false})
            $('#wrudate').datetimepicker({ timepicker:false,format:'Y-m-d',showTimepicker: false})
            $('#mrudate').datetimepicker({ timepicker:false,format:'Y-m-d',showTimepicker: false})
            $('#mrendtime').change(function(){
//ed=$(this).val().slice(0, -3);
//sd=$('#starttime').val().slice(0, -3);
                ed=$(this).val();
                sd=$('#mrstarttime').val();
//alert('ed is '+ed);
//alert('sd is '+sd);
                s = sd.split(':');
                e = ed.split(':');
                min = e[1]-s[1];
                hour_carry = 0;
                if(min < 0){
                    min += 60;
                    hour_carry += 1;
                }
                hour = e[0]-s[0]-hour_carry;
                min = (min).toString()
                diff = hour + ":" + min.substring(0,2);
                $('#mrduration').val(diff+' Hr');
            })

            $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg !== value;
            }, "Value must not equal arg.");


            $("form[name='mrr']").validate({
                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    branch : "required",
                    mrtype : "required",
                    mrdate : "required",
                    starttime : "required",
                    endtime : "required",
                    mrduration : "required",
                    mrtopic : "required",
                    mtype : "required",
                    attendence: "required",
                    email: {
                        required: true,
                        // Specify that email should be validated
                        // by the built-in "email" rule
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5

                    }
                },
                // Specify validation error messages
                messages: {
                    branch : "Please select the Branch",
                    mrtype : "Please select the Mr type",
                    mrdate : "Please select the Mr Date",
                    starttime : "Please select the Start Time",
                    endtime : "Please select the End Time",
                    mrduration : "Please select the Mr Duration",
                    mrtopic : "Please select the Mr Topic",
                    mtype : "Please select the Meeting Type",
                    attendence: "Please enter total members in meeting",
                    email: "Please enter a valid Email address",

                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    form.submit();
                }
            });


            $('#recurrence').change(function (){

                v=$(this).val();
                if(v=='1'){
                    $('#monthlydiv').hide();
                    $('#weeklydiv').hide();
                    $('#dailydiv').show();
                }

                if(v=='2'){
                    $('#dailydiv').hide();
                    $('#monthlydiv').hide();
                    $('#weeklydiv').show();
                }

                if(v=='3'){
                    $('#dailydiv').hide();
                    $('#weeklydiv').hide();
                    $('#monthlydiv').show();
                }
            })

        });


    </script>

</head>
<!--<body background="mrimg4.jpg">-->
<body>

<div class="bd-pageheader" style="padding-top: 2rem;padding-bottom: 2rem;text-align: left;background-color: #5bc0de">

    <div class="row" style="width: 100%;">
        <div class="col-md-4">
            <div id="navbar" class="clearfix content-heading"> <img src="sh.png" class="img-thumbnail" alt="Responsive image">
                <!--<b><h7 class="">Meeting Room Request</h7></b>--></div>
        </div>
        <center><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Creating Meeting Room Request</h3></center>

    </div>
</div>
<div class=" ">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-4 col-md-offset-4 centered">

                <div>

                    <br>
                    <form id="mrr" name="mrr"  action="mrdate.php" method="post">

                    	<table width="600" cellpadding="1" cellspacing="0" border="0">

                        	<tr>
                        		<td >
                        			<div class="form-group">
                             
			                            <select  class="form-control form-control-lg" id="mtype" name="mtype" >
			                                <option value=''>Meeting Type</option>
			                                <option value="1">Internal Team</option>
			                                <option value="2">External Vendor</option>
			                                <option value="3">Conference</option>
			                                
			                            </select>
			                        </div>
                        		</td>
                        		<td>&nbsp;&nbsp;</td>
                        		<td >
                        			<div class="form-group">
										 <select class="form-control form-control-lg" id="branch" name="branch" >
										 	
				                        	
				                        	<option value=''>Select Office</option>
				                                <option value="1">Hyderabad-13A</option>
				                                <option value="2">Hyderabad-KVH</option>
				                                <!-- <option value="Vijayawada">Vijayawada</option>
				                                <option value="Visakhapatnam">Visakhapatnam</option> -->
				                        </select>
											
										</div>
								</td>

                        	</tr>

                        <!-- <div class="form-group">
                            <?php $sql = "SELECT * FROM branch";
                            $result = $conn->query($sql);
                            echo '<select required  class="form-control form-control-lg drpBranch" name="branch" id="branch" >';
                            echo '<option value=\'\'>Select Office</option>';
                            while( $row = $result->fetch_assoc() ){
                                echo '<option value="'.$row['branchId'].'">'.$row['branchName'].'</option>';
                            }
                            echo '</select>';?>
                        </div> -->

                        
                        <tr>
                        	<td>
                        		<div class="form-group">
		                            <select  class="form-control form-control-lg" name="mrtype" id="mrtype" >
		                                <option value=''>Select Room</option>
		                            </select>
		                        </div>
                        	</td>
                        	<td></td>
                        	<td>
                        		<div class="form-group">
		                            <!--<label for="reqname">Topic:</label>-->
		                            <input type="text" class="form-control" name='mrtopic' id='mrtopic' placeholder="Topic" required>

		                        </div>

                        	</td>
                        </tr>
                               
                        <tr>
                        	<td>
                        		<div class="form-group">

		                            <input  class="form-control" name='mrstartdate' id="mrstartdate" placeholder="Start Date">
		                        </div>
                        	</td>
                        	<td></td>
                        	<td>
                        		<div class="form-group">
		                            <!--    <label for="date"> Start Time</label>-->
		                            <!--<input class="form-control" type="text" name='starttime' id="starttime" required>-->
		                            <select class="form-control form-control-lg" name="mrstarttime" id="mrstarttime">
		                                <option value=''>Start Time</option>
		                                <option value="09:00">09:00 AM</option>
		                                <option value="09:30">09:30 AM</option>
		                                <option value="10:00">10:00 AM</option>
		                                <option value="10:30">10:30 AM</option>
		                                <option value="11:00">11:00 AM</option>
		                                <option value="11:30">11:30 AM</option>
		                                <option value="12:00">12:00 PM</option>
		                                <option value="12:30">12:30 PM</option>
		                                <option value="13:00">01:00 PM</option>
		                                <option value="13:30">01:30 PM</option>
		                                <option value="14:00">02:00 PM</option>
		                                <option value="14:30">02:30 PM</option>
		                                <option value="15:00">03:00 PM</option>
		                                <option value="15:30">03:30 PM</option>
		                                <option value="16:00">04:00 PM</option>
		                                <option value="16:30">04:30 PM</option>
		                                <option value="17:00">05:00 PM</option>
		                                <option value="17:30">05:30 PM</option>
		                                <option value="18:00">06:00 PM</option>
		                                <option value="18:30">06:30 PM</option>
		                                <option value="19:00">07:00 PM</option>
		                                <option value="19:30">07:30 PM</option>
		                                <option value="20:00">08:00 PM</option>
		                                <option value="20:30">08:30 PM</option>
		                                <option value="21:00">09:00 PM</option>
		                            </select>
		                        </div>
                        	</td>
                        </tr>

						
                        <tr>
                        	<td>
                        		<div class="form-group">

		                            <input  class="form-control" name='mrenddate' id="mrenddate" placeholder="End Date">
		                        </div>
                        	</td>
                        	<td></td>
                        	<td>
                        		<div class="form-group">
		                            <!--  <label for="date"> Start Time</label>-->
		                            <!--<input class="form-control" type="text" name='starttime' id="starttime" required>-->
		                            <select class="form-control form-control-lg" name="mrendtime" id="mrendtime">

		                                <h6><option value=''>End Time</option></h6>
		                                <option value="09:00">09:00 AM</option>
		                                <option value="09:30">09:30 AM</option>
		                                <option value="10:00">10:00 AM</option>
		                                <option value="10:30">10:30 AM</option>
		                                <option value="11:00">11:00 AM</option>
		                                <option value="11:30">11:30 AM</option>
		                                <option value="12:00">12:00 PM</option>
		                                <option value="12:30">12:30 PM</option>
		                                <option value="13:00">01:00 PM</option>
		                                <option value="13:30">01:30 PM</option>
		                                <option value="14:00">02:00 PM</option>
		                                <option value="14:30">02:30 PM</option>
		                                <option value="15:00">03:00 PM</option>
		                                <option value="15:30">03:30 PM</option>
		                                <option value="16:00">04:00 PM</option>
		                                <option value="16:30">04:30 PM</option>
		                                <option value="17:00">05:00 PM</option>
		                                <option value="17:30">05:30 PM</option>
		                                <option value="18:00">06:00 PM</option>
		                                <option value="18:30">06:30 PM</option>
		                                <option value="19:00">07:00 PM</option>
		                                <option value="19:30">07:30 PM</option>
		                                <option value="20:00">08:00 PM</option>
		                                <option value="20:30">08:30 PM</option>
		                                <option value="21:00">09:00 PM</option>
		                            </select>
		                        </div>
                        	</td>
                        </tr>

                        
                        <tr>
                        	<td>
                        		<div class="form-group">
		                            <!--<label for="date">Duration </label>-->
		                            <input class="form-control" type="text"  name='mrduration' id="mrduration" placeholder="Duration" value=''>

		                        </div>
                        	</td>
                        	<td></td>
                        	<td>
                        		<div class="form-group">
		                            <input id="noofattendence" type="number" min="2" max="100" name="noofattendence" class="form-control" placeholder="No.of Attendence">
		                        </div>
                        	</td>
                        </tr>
                        
                        <tr>
                        	<td colspan="20">
                        		<div class="form-group">
                            	<!-- <label for="reqname">MR Request Purpose:</label>-->
                            	<textarea class="form-control" name="mrpurpose" rows="5" id="mrpurpose" placeholder="MR Request Purpose:"></textarea>
                            	<!--<input type="text" class="form-control" name='reqname' required>    -->
                        		</div>
                        	</td>
                        </tr>
                        
                        <tr>
                        	<td colspan="20">
                        		<div class="form-group">

		                            <input type="text" class="form-control" name='orgemail' id='orgemail' placeholder="Email Of Organiser" style>
		                        </div>
                        	</td>
                        </tr>
                        
                        
                        
                        


                        

                        <!-- <div class="form-group">
                             <label for="branch">Meeting Type:</label>
                            <select class="form-control form-control-lg" id="mtype" name="mtype" >
                                <option value=''>Meeting Type</option>
                                <option value="Internal Team">Internal Team</option>
                                <option value="External Vendor">External Vendor</option>
                                <option value="Conference">Conference</option>
                                <option value="Event">Event</option>
                            </select>
                        </div> -->

                        

                        
                     </table>
                        <div class="form-group">
                            <input type="Submit"  class=" btn btn-success" name='submit' id='submit' value='submit' >
                            <!--<input type="button" class=" btn btn-danger" name='Cancel' id='Cancel' value='Cancel' ">-->
                             <button type="reset" value="Reset" style="background-color:yelow">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>