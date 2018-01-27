<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<script type="text/javascript" src="recruitment.js">
</script>

</head>
<body>  

<?php
// define variables and set to empty values
$companynameErr = $budgetErr = $newpositionErr = $simcardErr = $reportingtoErr = $requestedbyErr= $systemtypeErr= $divisionErr= $travelErr= $certificatesErr= $bonusErr= $creditcardErr= $departmentErr= $vehicleErr= $hrdesignationErr= $roledesignationErr= $postlocationErr= $bandErr= $costcenterErr= $qualificationErr= $skillsErr= $experienceErr= $jobdesccriptionErr= $noofpositionsErr= $resourcetypeErr= "";


$companyname = $budget = $newposition = $simcard = $comment = $reportingto = $requestedby= $systemtype= $division= $travel= $certificates= $bonus= $creditcard = $vehicle= $department= $hrdesignation= $roledesignation= $postlocation= $band= $costcenter= $qualification= $skills= $experience= $jobdesccription= $noofpositions= $resourcetype= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["companyname"])) {
    $companynameErr = "Company Name is required";
  } else {
    $companyname = test_input($_POST["companyname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $companynameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["department"])) {
    $departmentErr = "Department is required";
  } else {
    $department = test_input($_POST["department"]);
  }

   if (empty($_POST["budget"])) {
    $budgetErr = "Budget is required";
  } else {
    $budget = test_input($_POST["budget"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Manpower Requisition Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="recruitmentform-db.php">  
  Company Name: <input type="text" name="companyname" value="<?php echo $companyname;?>">
  <span class="error">* <?php echo $companynameErr;?></span>
  <br><br>

  Budgeted Position:
  <input type="radio" name="budget" <?php if (isset($budget) && $budget=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="budget" <?php if (isset($budget) && $budget=="no") echo "checked";?> value="no">NO
  <span class="error">* <?php echo $budgetErr;?></span>
  <br><br>

  <!-- <div class="controls">
    <label class="radio inline">
        <input type="radio" name="travel" data-travelNumber="1" id="travel_yes_1" value="Yes" tabindex="25" >
        Yes </label>
    <label class="radio inline">
        <input name="travel" type="radio" data-travelNumber="1" id="travel_no_1" value="No" tabindex="26" checked >
        No </label>
  </div>

  <div class="controls">
    <textarea name="travelDetails" id="travelDetails_1" ></textarea>
  </div> -->

  New Position:
  <input type="radio" name="newposition" <?php if (isset($newposition) && $newposition=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="newposition" <?php if (isset($newposition) && $newposition=="no") echo "checked";?> value="no">NO
  <span class="error">* <?php echo $newpositionErr;?></span>
  <br><br>

  SIM Card:
  <input type="radio" name="simcard" <?php if (isset($simcard) && $simcard=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="simcard" <?php if (isset($simcard) && $simcard=="no") echo "checked";?> value="no">NO
  <span class="error">* <?php echo $simcardErr;?></span>
  <br><br>

  Position Reporting To: <input type="text" name="reportingto" value="<?php echo $reportingto;?>">
  <span class="error">* <?php echo $reportingtoErr;?></span>
  <br><br>

  Name/Requested By: <input type="text" name="requestedby" value="<?php echo $requestedby;?>">
  <span class="error">* <?php echo $requestedbyErr;?></span>
  <br><br>

  Required System :
  <input type="radio" name="systemtype" <?php if (isset($systemtype) && $systemtype=="laptop") echo "checked";?> value="laptop">Laptop
  <input type="radio" name="systemtype" <?php if (isset($systemtype) && $systemtype=="desktop") echo "checked";?> value="desktop">Desktop
  <span class="error">* <?php echo $systemtypeErr;?></span>
  <br><br>

  Resource Required By Date: <input type="date" name="requiredbydate" value="<?php echo $requiredbydate;?>">
  <!-- <span class="error">* <?php echo $requestedbyErr;?></span> -->
  <br><br>

  Business Unit/Division: <input type="text" name="division" value="<?php echo $division;?>">
  <span class="error">* <?php echo $divisionErr;?></span>
  <br><br>

  Travel Involved:
  <input type="radio" name="travel" <?php if (isset($travel) && $travel=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="travel" <?php if (isset($travel) && $travel=="no") echo "checked";?> value="no">NO
  <span class="error">* <?php echo $travelErr;?></span>
  <br><br>

  Deposition of Certificates:
  <input type="radio" name="certificates" <?php if (isset($certificates) && $certificates=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="certificates" <?php if (isset($certificates) && $certificates=="no") echo "checked";?> value="no">NO
  <span class="error">* <?php echo $certificatesErr;?></span>
  <br><br>

  Retention Bonus: <input type="text" name="bonus" value="<?php echo $bonus;?>">
  <!-- <span class="error">* <?php echo $bonusErr;?></span> -->
  <br><br>

  Corporate Credit Card:
  <input type="radio" name="creditcard" <?php if (isset($creditcard) && $creditcard=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="creditcard" <?php if (isset($creditcard) && $creditcard=="no") echo "checked";?> value="no">NO
  <!-- <span class="error">* <?php echo $creditcardErr;?></span> -->
  <br><br>

  Provision of Vehicle:
  <input type="radio" name="vehicle" <?php if (isset($vehicle) && $vehicle=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="vehicle" <?php if (isset($vehicle) && $vehicle=="no") echo "checked";?> value="no">NO
  <!-- <span class="error">* <?php echo $vehicleErr;?></span> -->
  <br><br>

  Department: <input type="text" name="department" value="<?php echo $department;?>">
  <!-- <span class="error">* <?php echo $departmentErr;?></span> -->
  <br><br>

  HR Designation: <input type="text" name="hrdesignation" value="<?php echo $hrdesignation;?>">
  <span class="error">* <?php echo $hrdesignationErr;?></span>
  <br><br>

  Role based Designation: <input type="text" name="roledesignation" value="<?php echo $roledesignation;?>">
  <!-- <span class="error">* <?php echo $roledesignationErr;?></span> -->
  <br><br>

  Posting Location: <input type="text" name="postlocation" value="<?php echo $postlocation;?>">
  <span class="error">* <?php echo $postlocationErr;?></span>
  <br><br>

  Band/Level:
  <input type="text" name="band" value="<?php echo $band;?>">
  <span class="error">* <?php echo $bandErr;?></span>
  <br><br>

  <div>Employment Type:
  <select name="emptype">
    <option value="">Select...</option>
    <option value="regular">Regular</option>
    <option value="nonregular">Non Regular</option>
    <option value="consultant">Consultant</option>
    <option value="retainer">Retainer</option>
  </select>
  </div>
  <br><br>

  Cost Center:
  <input type="text" name="costcenter" value="<?php echo $costcenter;?>">
  <span class="error">* <?php echo $costcenterErr;?></span>
  <br><br>

  Desired Qualification:
  <input type="text" name="qualification" value="<?php echo $qualification;?>">
  <span class="error">* <?php echo $qualificationErr;?></span>
  <br><br>

  Essential Competencies Skills:
  <input type="text" name="skills" value="<?php echo $skills;?>">
  <span class="error">* <?php echo $skillsErr;?></span>
  <br><br>

  Experience Required:
  <input type="text" name="experience" value="<?php echo $experience;?>">
  <span class="error">* <?php echo $experienceErr;?></span>
  <br><br>

  Job Description:
  <input type="text" name="jobdesccription" value="<?php echo $jobdesccription;?>">
  <span class="error">* <?php echo $jobdesccriptionErr;?></span>
  <br><br>

  Required No of Positions:
  <input type="text" name="noofpositions" value="<?php echo $noofpositions;?>">
  <span class="error">* <?php echo $noofpositionsErr;?></span>
  <br><br>

  Internal/ External Resource:
  <input type="text" name="resourcetype" value="<?php echo $resourcetype;?>">
  <span class="error">* <?php echo $resourcetypeErr;?></span>
  <br><br>

  BU Head Approval Date: <input type="date" name="buapproveddate" value="<?php echo $buapproveddate;?>">
  <!-- <span class="error">* <?php echo $buapproveddateErr;?></span> -->
  <br><br>

  CPO Approval Date: <input type="date" name="cpoapproveddate" value="<?php echo $cpoapproveddate;?>">
  <!-- <span class="error">* <?php echo $cpoapproveddateErr;?></span> -->
  <br><br>

  Finance/CFO Approval Date: <input type="date" name="cfoapproveddate" value="<?php echo $cfoapproveddate;?>">
  <!-- <span class="error">* <?php echo $cfoapproveddateErr;?></span> -->
  <br><br>

  Manpower Approval Date: <input type="date" name="panelapproveddate" value="<?php echo $panelapproveddate;?>">
  <!-- <span class="error">* <?php echo $panelapproveddateErr;?></span> -->
  <br><br>

  MD/Director Approval Date: <input type="date" name="mdapproveddate" value="<?php echo $mdapproveddate;?>">
  <!-- <span class="error">* <?php echo $mdapproveddateErr;?></span> -->
  <br><br>

  <input type="submit" name="submit" value="submit">  
</form>

</body>
</html>