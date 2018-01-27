<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
	<div class="bd-pageheader" style="padding-top: 3rem;padding-bottom: 2rem;text-align: left;background-color: #5bc0de">
		<center><h2> SFPL Visiting Card Request</h2></center>
	</div>
	<div class=" ">
      <div class="container-fluid" >
         <div class="row">
        	<div class="col-md-4 col-md-offset-4 centered">
            <div>
				<form id="visitingcards" name="visitingcards" method="post" action="send_visiting_form.php">
					<br><br>
						<div class="form-group">
							<label for=" ">Name as You Want :(*)</label>
							<input type="text" class="form-control" name='empname' id="empname" required>
						</div>
						<div class="form-group">
							<label for=" ">Designation:</label>
							<!-- <input type="text" class="form-control" name='empdesignation' id="empdesignation" required> -->
							<select class="form-control form-control-lg" id="empdesignation" name="empdesignation">
								<option value="">Select</option>
								<option value="worker">Workers</option>
								<option value="executive">Executive</option>
								<option value="srexecutive">Sr.Executive</option>
								<option value="asstmngr">Assistant Manager</option>
								<option value="dymngr">Deputy Manager</option>
								<option value="PM">Project Manager</option>
								<option value="manager">Manager</option>
								<option value="srmngr">Sr.Manager</option>
								<option value="agm">AGM</option>
								<option value="dgm">DGM</option>
								<option value="gm">GM</option>
								<option value="asvp">Assistant Vice President</option>
								<option value="vp">Vice President</option>
								<option value="coo">COO</option>
								<option value="cpo">CPO</option>
								<option value="president">President</option>
							</select>
						</div>
						<div class="form-group">
							<label for=" ">Comapny Name:</label>
							<select class="form-control form-control-lg" id="comapanyname" name="comapanyname">
								<option value="">Select</option>
								<option value="sfpl">Srinivasa Farms Pvt Ltd</option>
								<option value="shpl">Srinivasa Hatcheries Pvt Ltd</option>
								<option value="shppl">SH Proteins Pvt Ltd</option>
								<option value="shfppl">SH Food Processing Pvt Ltd</option>
								
								
							</select>
						</div>

						<div class="form-group">
							<label for=" ">Email:</label>
							<input type="text" class="form-control email" name='empemail' id="empemail" required>
						</div>

						<div class="form-group">
							<label for=" ">Reporting Manager Email:</label>
							<input type="text" class="form-control email" name='mngremail' id="mngremail" required>
						</div>

						<div class="form-group">
							<label for=" ">Mobile Number :</label>
							<input type="text" class="form-control numstorage" name='empphnumber' id="empphnumber" maxlength=10>
						</div>
						<div>
							<label for=" ">Choose Office :</label><br>
							<input type="radio" name="rdoBranch" value="13office" checked> 13 OFFICE<br>
							<input type="radio" name="rdoBranch" value="kvhoffice" required> KVH OFFICE<br><br>
						</div>
						<div class="form-group">
							<label for=" ">No of Visiting Cards:</label>
							<input type="number" class="form-control numstorage" min="2" max="500"name='noofcards' id="noofcards" required>
							
						</div>
						<div class="form-group">
							<button type="submit" class="form-control btn  btn-info" name='submit' id='submit' value='submit'>Submit</button>
							<button type="reset" class="form-control btn  btn-info" name='submit' id='submit' value="Reset" >Reset</button>
						</div>
				</form>
            </div>
     		</div>
   		</div>
	</div>
	</div>
	<script>
		$("#visitingcards").validate();

        $(".numstorage").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        jQuery.validator.addMethod("email", function(value, element) {
            return this.optional(element) || /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(value)
        }, "Please enter a valid email");

	</script>
</html>