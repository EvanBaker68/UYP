<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>UYP</title>
</head>
<body>

<?php
  
  include 'menubar.php'; 

  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $stmt= $connect->prepare("SELECT * FROM studentApp WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['acceptStudent']);
  $stmt->execute();
  $stmt -> bind_result($studentID,$fName,$lName,$MI,$suffix,$nickname,$address,$state,$city,$zip,$birthday,
  	$gender,$race,$typeOfSchool,$schoolName,$schoolDistrict,$upcomingGrade,$expectedGradYear,$expectedHighSchool,
  	$studentEmail,$studentPhone,$hasSibling,$accepted,$GTProgramStatus,$sibling1Name,$sibling2Name,$sibling3Name,$sibling4Name);
  $stmt -> fetch();


  if($hasSibling == 1){$hasSibling = "Yes";}
  else {$hasSibling = "No";}
  if(empty($MI)){}
  	$MI = "N/A";
    if(empty($suffix))
  	$suffix = "N/A";
    if(empty($race))
  	$race = "N/A";
    if(empty($schoolDistrict))
  	$schoolDistrict = "N/A";
    if(empty($expectedGradYear))
  	$expectedGradYear = "N/A";
    if(empty($expectedHighSchool))
  	$expectedHighSchool = "N/A";
    if(empty($studentEmail))
  	$studentEmail = "N/A";
    if(empty($studentPhone))
  	$studentPhone = "N/A";
    if(empty($sibling1Name))
  	$sibling1Name = "N/A";
    if(empty($sibling2Name))
  	$sibling2Name = "N/A";
    if(empty($sibling3Name))
  	$sibling3Name = "N/A";
    if(empty($sibling4Name))
  	$sibling4Name = "N/A";
  // var_dump($student);
?>

<div class="container my-3 text-center">
      <div class="row justify-content-around">
        <div class="col-10">
            <div class="row">
              <div class="col-4">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"First Name: '.$fName.'"';?> name="fname" readonly>
                  </div>
              </div>
              <div class="col-4">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Last Name: '.$lName.'"';?> name="lname" readonly>
                  </div>
              </div>
              <div class="form-group col-2 pb-10">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"MI: '.$MI.'"';?> name="MI" readonly>
                  </div>
              </div>
              <div class="col-2">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Suffix: '.$suffix.'"';?> name="suffix" readonly>
                  </div>
              </div>
            </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Preferred Name: '.$nickname.'"';?> name="nickname" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Address '.$address.'"';?> name="studentAddress" readonly>
              </div>
          <div class="row">
              <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"City: '.$city.'"';?> name="city" readonly>
              </div>
              <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"State: '.$state.'"';?> name="state" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Zip: '.$zip.'"';?> name="zip" readonly>
              </div>
          </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Birthday: '.$birthday.'"';?> name="birthday" readonly>
            </div>
          <div class="row">
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Race: '.$race.'"';?> name="race" readonly>
              </div>
               <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Gender: '.$gender.'"';?> name="gender" readonly>
              </div>
        </div>
        <div>
          <h3>School Information</h3>
               <center>
               <div class="form-group col-8">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Type of School: '.$typeOfSchool.'"';?> name="typeOfSchool" readonly>
              </div></center>
        </div>
        <div class="row">
          <div class="col-4">
              <div class="form-group">
                <input type="text" name="schoolName" class="form-control form-control-lg" placeholder=<?php echo'"School: '.$schoolName.'"';?> readonly>
                </div>
          </div>
          <div class="col-4">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="schoolDistrict" placeholder=<?php echo'"School District: '.$schoolDistrict.'"';?> readonly>
                  </div>
              </div>
              <div class="form-group col-4 pb-10">
                    <input type="text" class="form-control form-control-lg" name="schoolDistrict" placeholder=<?php echo'"Grade in Upcoming Fall: '.$upcomingGrade.'"';?> readonly>
              </div>
        </div>
        <div class="row">
          <div class="form-group col-6 pb-10">
                    <input type="text" class="form-control form-control-lg" name="schoolDistrict" placeholder=<?php echo'"Expected High School Graduation Year: '.$expectedGradYear.'"';?> readonly>
            </div>
          <div class="col-4">
            <form class="mb-4">
              <div class="form-group">
                <input type="text" name="expectedHighSchool" class="form-control form-control-lg" placeholder=<?php echo'"Expected High School: '.$expectedHighSchool.'"';?> readonly>
              </div>
            </form>
          </div>
        </div>
          <!-- <div class="input-append date form_datetime">
    <input size="16" type="text" value="" readonly>
    <span class="add-on"><i class="icon-th"></i></span>
</div>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii"
    });
</script> -->


<!--  STILL NEED TO PULL PARENTS FROM DATABASE, INSERT NECESSARY VALUES INTO FIELDS. CHANGE THE DROPDOWS LAST, SO THAT
YOU CAN USE IT FOR THE UPDATE FIELD FOR BOTH THE STUDENT AND ADMINS-->
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Student Email Address: '.$studentEmail.'"';?> name="studentEmail" readonly>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Student Phone Number: '.$studentPhone.'"';?> name="studentPhone" readonly>
            </div>
           <div class="form-group col-6 pb-10">
                    <input type="text" class="form-control form-control-lg" name="schoolDistrict" placeholder=<?php echo'"Has siblings in the program: '.$hasSibling.'"';?> readonly>
            </div>
          <div>
            <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="sibling1" placeholder=<?php echo'"Sibling 1 Full Name: '.$sibling1Name.'"';?> readonly>
            </div>
            <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="sibling2" placeholder=<?php echo'"Sibling 2 Full Name: '.$sibling1Name.'"';?> readonly>
            </div>
            <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="sibling3" placeholder=<?php echo'"Sibling 3 Full Name: '.$sibling1Name.'"';?> readonly>
            </div>
            <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="sibling4" placeholder=<?php echo'"Sibling 4 Full Name: '.$sibling1Name.'"';?> readonly>
            </div>
          </div>
          <div class="form-group col-6 pb-10">
                    <input type="text" class="form-control form-control-lg" name="schoolDistrict" placeholder=<?php echo'"Has been accepted to GT program: '.$GTProgramStatus.'"';?> readonly>
            </div>
        <div>
          <h3>Information for parent/guardian #1</h3>
          <?php 
			  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
			  $stmt= $connect->prepare("SELECT * FROM parent WHERE studentID = ?");
			  $stmt->bind_param("s",$_COOKIE['acceptStudent']);
			  $stmt->execute();
			  $stmt -> bind_result($parentName,$studentID,$address,$city,$state,$zip,$email,$cellPhone,$workPhone,$homePhone);
			  $stmt -> fetch();

			    if(empty($parentName)){}
			  	$parentName = "N/A";
			    if(empty($address))
			  	$address = "N/A";
			    if(empty($city))
			  	$city = "N/A";
			    if(empty($state))
			  	$state = "N/A";
			    if(empty($zip))
			  	$zip = "N/A";
			    if(empty($email))
			  	$email = "N/A";
			    if(empty($cellPhone))
			  	$cellPhone = "N/A";
			    if(empty($workPhone))
			  	$workPhone = "N/A";
			    if(empty($homePhone))
			  	$homePhone = "N/A";
          ?>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Name: '.$parentName.'"';?> name="parent1name" readonly>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Address: '.$address.'"';?> name="parent1address" readonly>
            </div>
        <div class="row">
              <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"City: '.$city.'"';?> name="parent1city" readonly>
              </div>
              <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"State: '.$state.'"';?> name="state" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Zip Code: '.$zip.'"';?> name="parent1zip" readonly>
              </div>
          </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Email Address: '.$email.'"';?> name="parent1email" readonly>
            </div>
            <div>
            </div>
            <div class="row">
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Cell Phone Number: '.$cellPhone.'"';?> name="parent1Cell" readonly>
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Work Phone Number: '.$workPhone.'"';?> name="parent1Work" readonly>
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Home Phone Number: '.$homePhone.'"';?> name="parent1Home" readonly>
              </div>
            </div>
        </div>
        <div>
          <h3>Information for parent/guardian #2</h3>
          <?php 
          	$stmt -> fetch();
          		if(empty($parentName)){}
			  	$parentName = "N/A";
			    if(empty($address))
			  	$address = "N/A";
			    if(empty($city))
			  	$city = "N/A";
			    if(empty($state))
			  	$state = "N/A";
			    if(empty($zip))
			  	$zip = "N/A";
			    if(empty($email))
			  	$email = "N/A";
			    if(empty($cellPhone))
			  	$cellPhone = "N/A";
			    if(empty($workPhone))
			  	$workPhone = "N/A";
			    if(empty($homePhone))
			  	$homePhone = "N/A";
          ?>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Name: '.$parentName.'"';?> name="parent2name" readonly>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Address: '.$address.'"';?> name="parent2address" readonly>
            </div>
        <div class="row">
              <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"City: '.$city.'"';?> name="parent2city" readonly>
              </div>
               <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"State: '.$state.'"';?> name="state" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Zip Code: '.$zip.'"';?> name="parent2zip" readonly>
              </div>
          </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Email Address: '.$email.'"';?> name="parent2email"readonly>
            </div>
            <div class="row">
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Cell Phone: '.$cellPhone.'"';?> name="parent2Cell" readonly>
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Work Phone: '.$workPhone.'"';?> name="parent2Work" readonly>
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Home Phone: '.$homePhone.'"';?> name="parent2Home" readonly>
              </div>
            </div>
            <form action="processAcceptance.php" method="post">
			<input class="btn btn-outline-secondary btn-block" type="submit" name="acceptButton" value="Accept" />
			<input class="btn btn-outline-secondary btn-block" type="submit" name="denyButton" value="Deny" /> 
			</form>         
			<!-- <input type="submit" value="Submit Application" class="btn btn-outline-secondary btn-block"> -->
        </div>
      </div>
    </div>


   <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>