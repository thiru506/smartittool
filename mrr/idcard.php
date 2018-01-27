<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
	<div class="bd-pageheader" style="padding-top: 3rem;padding-bottom: 2rem;text-align: left;background-color: #5bc0de">
		<center><h2> SFPL ID Card Request</h2></center>
	</div>
	<div class=" ">
      <div class="container-fluid" >
         <div class="row">
        	<div class="col-md-4 col-md-offset-4 centered">
            <div>
				<form id="idcard" name="idcard" method="post" action="idcard_db.php">
					<br><br>
						<div class="form-group">
							<label for=" ">Name as You Want :</label>
							<input type="text" class="form-control" name='empname' id="empname" required>
						</div>
						<div class="form-group">
							<label for=" ">Designation:</label>
							<select class="form-control form-control-lg" id="empdesignation" name="empdesignation">
								<option value="">Select</option>
								<option value="srexecutive">Sr.Executive</option>
								<option value="executive">Executive</option>
								<option value="CPO">CPO</option>
								<option value="CFO">CFO</option>
								<option value="MD">MD</option>
								<option value="PM">Project Manager</option>
							</select>
						</div>
						<div class="form-group">
							<label for=" ">Email:</label>
							<input type="text" class="form-control email" name='empemail' id="empemail" required>
						</div>
						<div class="form-group">
							<label for=" ">Phone Number :</label>
							<input type="text" class="form-control numstorage" name='empphnumber' id="empphnumber" maxlength=10 required>
						</div>
						<div>
							<label for=" ">Choose Office :</label><br>
							<input type="radio" name="rdoBranch" value="13 Office" checked> 13 Office<br>
							<input type="radio" name="rdoBranch" value="Madhapur" required> Madhapur<br><br>
						</div>
						<div class="form-group">
							<label for=" ">Blood Group:</label>
							<input type="text" class="form-control numstorage" name='bldgroup' id="bldgroup" required>
						</div>
						<div class="form-group">
							<button type="submit" class="form-control btn  btn-info" name='submit' id='submit' value='submit'>Submit</button>
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