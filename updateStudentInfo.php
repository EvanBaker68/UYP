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
  $stmt->bind_param("s",$_COOKIE['id']);
  $stmt->execute();
  $stmt -> bind_result($studentID,$fName,$lName,$MI,$suffix,$nickname,$address,$state,$city,$zip,$birthday,
  	$gender,$race,$typeOfSchool,$schoolName,$schoolDistrict,$upcomingGrade,$expectedGradYear,$expectedHighSchool,
  	$studentEmail,$studentPhone,$hasSibling,$accepted,$GTProgramStatus,$sibling1Name,$sibling2Name,$sibling3Name,$sibling4Name,
    $approvalAdminName,$acceptedYear,$parent1ID,$parent2ID);
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

<form action="verifyUpdateStudentInfo.php" method="post">
<div class="container my-3 text-center">
      <div class="row justify-content-around">
        <div class="col-10">
            <div class="row">
              <div class="col-4">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" value=<?php echo $fName;?> name="fname" >
                  </div>
              </div>
              <div class="col-4">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" value=<?php echo $lName;?> name="lname" >
                  </div>
              </div>
              <div class="form-group col-2 pb-10">
                <select class="form-control" id="MI" name="MI">
                  <option value="" selected hidden>MI</option>
                  <?php
                    $letter = "A";
                    for($x = 0; $x < 26; $x++){

                      echo '<option value="'.$letter.'">'.$letter.'</option>';
                      $letter++;
                    }

                  ?>
                </select>
              </div>
              <div class="col-2">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" value=<?php echo $suffix;?> name="suffix" >
                  </div>
              </div>
            </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" value=<?php echo $nickname;?> name="nickname" >
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" value=<?php echo '"'.$address.'"';?> name="studentAddress" >
              </div>
          <div class="row">
              <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" value=<?php echo $city;?> name="city" >
              </div>
              <div class="form-group col-2 pb-10">
                <select class="form-control" id="state" name="state" readonly>
                  <option value="" selected hidden>State*</option>
                  <option value="AK" <?php if ($state=="AK") echo 'selected="selected"';?>>Alaska</option>
                  <option value="AL" <?php if ($state=="AL") echo 'selected="selected"';?>>Alabama</option>
                  <option value="AR" <?php if ($state=="AR") echo 'selected="selected"';?>>Arkansas</option>
                  <option value="AZ" <?php if ($state=="AZ") echo 'selected="selected"';?>>Arizona</option>
                  <option value="CA" <?php if ($state=="CA") echo 'selected="selected"';?>>California</option>
                  <option value="CO" <?php if ($state=="CO") echo 'selected="selected"';?>>Colorado</option>
                  <option value="CT" <?php if ($state=="CT") echo 'selected="selected"';?>>Connecticut</option>
                  <option value="DC" <?php if ($state=="DC") echo 'selected="selected"';?>>District of Columbia</option>
                  <option value="DE" <?php if ($state=="DE") echo 'selected="selected"';?>>Delaware</option>
                  <option value="FL" <?php if ($state=="FL") echo 'selected="selected"';?>>Florida</option>
                  <option value="GA" <?php if ($state=="GA") echo 'selected="selected"';?>>Georgia</option>
                  <option value="HI" <?php if ($state=="HI") echo 'selected="selected"';?>>Hawaii</option>
                  <option value="IA" <?php if ($state=="IA") echo 'selected="selected"';?>>Iowa</option>
                  <option value="ID" <?php if ($state=="ID") echo 'selected="selected"';?>>Idaho</option>
                  <option value="IL" <?php if ($state=="IL") echo 'selected="selected"';?>>Illinois</option>
                  <option value="IN" <?php if ($state=="IN") echo 'selected="selected"';?>>Indiana</option>
                  <option value="KS" <?php if ($state=="KS") echo 'selected="selected"';?>>Kansas</option>
                  <option value="KY" <?php if ($state=="KY") echo 'selected="selected"';?>>Kentucky</option>
                  <option value="LA" <?php if ($state=="LA") echo 'selected="selected"';?>>Louisiana</option>
                  <option value="MA" <?php if ($state=="MA") echo 'selected="selected"';?>>Massachusetts</option>
                  <option value="MD" <?php if ($state=="MD") echo 'selected="selected"';?>>Maryland</option>
                  <option value="ME" <?php if ($state=="ME") echo 'selected="selected"';?>>Maine</option>
                  <option value="MI" <?php if ($state=="MI") echo 'selected="selected"';?>>Michigan</option>
                  <option value="MN" <?php if ($state=="MN") echo 'selected="selected"';?>>Minnesota</option>
                  <option value="MO" <?php if ($state=="MO") echo 'selected="selected"';?>>Missouri</option>
                  <option value="MS" <?php if ($state=="MS") echo 'selected="selected"';?>>Mississippi</option>
                  <option value="MT" <?php if ($state=="MT") echo 'selected="selected"';?>>Montana</option>
                  <option value="NC" <?php if ($state=="NC") echo 'selected="selected"';?>>North Carolina</option>
                  <option value="ND" <?php if ($state=="ND") echo 'selected="selected"';?>>North Dakota</option>
                  <option value="NE" <?php if ($state=="NE") echo 'selected="selected"';?>>Nebraska</option>
                  <option value="NH" <?php if ($state=="NH") echo 'selected="selected"';?>>New Hampshire</option>
                  <option value="NJ" <?php if ($state=="NJ") echo 'selected="selected"';?>>New Jersey</option>
                  <option value="NM" <?php if ($state=="NM") echo 'selected="selected"';?>>New Mexico</option>
                  <option value="NV" <?php if ($state=="NV") echo 'selected="selected"';?>>Nevada</option>
                  <option value="NY" <?php if ($state=="NY") echo 'selected="selected"';?>>New York</option>
                  <option value="OH" <?php if ($state=="OH") echo 'selected="selected"';?>>Ohio</option>
                  <option value="OK" <?php if ($state=="OK") echo 'selected="selected"';?>>Oklahoma</option>
                  <option value="OR" <?php if ($state=="OR") echo 'selected="selected"';?>>Oregon</option>
                  <option value="PA" <?php if ($state=="PA") echo 'selected="selected"';?>>Pennsylvania</option>
                  <option value="PR" <?php if ($state=="PR") echo 'selected="selected"';?>>Puerto Rico</option>
                  <option value="RI" <?php if ($state=="RI") echo 'selected="selected"';?>>Rhode Island</option>
                  <option value="SC" <?php if ($state=="SC") echo 'selected="selected"';?>>South Carolina</option>
                  <option value="SD" <?php if ($state=="SD") echo 'selected="selected"';?>>South Dakota</option>
                  <option value="TN" <?php if ($state=="TN") echo 'selected="selected"';?>>Tennessee</option>
                  <option value="TX" <?php if ($state=="TX") echo 'selected="selected"';?>>Texas</option>
                  <option value="UT" <?php if ($state=="UT") echo 'selected="selected"';?>>Utah</option>
                  <option value="VA" <?php if ($state=="VA") echo 'selected="selected"';?>>Virginia</option>
                  <option value="VT" <?php if ($state=="VT") echo 'selected="selected"';?>>Vermont</option>
                  <option value="WA" <?php if ($state=="WA") echo 'selected="selected"';?>>Washington</option>
                  <option value="WI" <?php if ($state=="WI") echo 'selected="selected"';?>>Wisconsin</option>
                  <option value="WV" <?php if ($state=="WV") echo 'selected="selected"';?>>West Virginia</option>
                  <option value="WY" <?php if ($state=="WY") echo 'selected="selected"';?>>Wyoming</option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" value=<?php echo $zip;?> name="zip" >
              </div>
          </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" value=<?php echo $birthday;?> name="birthday" >
            </div>
          <div class="row">
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$race.'"';?> name="race" >
              </div>
               <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$gender.'"';?> name="gender" >
              </div>
        </div>
        <div>
          <h3>School Information</h3>
               <center>
               <div class="form-group col-8">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$typeOfSchool.'"';?> name="schoolType" >
              </div></center>
        </div>
        <div class="row">
          <div class="col-4">
              <div class="form-group">
                <input type="text" name="schoolName" class="form-control form-control-lg" value=<?php echo $schoolName;?> >
                </div>
          </div>
          <div class="col-4">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="schoolDistrict" value=<?php echo $schoolDistrict;?> >
                  </div>
              </div>
              <div class="form-group col-4 pb-10">
                    <input type="text" class="form-control form-control-lg" name="upcomingGrade" value=<?php echo'"'.$upcomingGrade.'"';?> >
              </div>
        </div>
        <div class="row">
          <div class="form-group col-6 pb-10">
                    <input type="text" class="form-control form-control-lg" name="expectedGradYear" value=<?php echo'"'.$expectedGradYear.'"';?> >
            </div>
          <div class="col-4">
            <form class="mb-4">
              <div class="form-group">
                <input type="text" name="expectedHighSchool" class="form-control form-control-lg" value=<?php echo $expectedHighSchool;?> >
              </div>
            </form>
          </div>
        </div>
          <!-- <div class="input-append date form_datetime">
    <input size="16" type="text" value="" >
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
              <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$studentEmail.'"';?> name="studentEmail" >
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$studentPhone.'"';?> name="studentPhone" >
            </div>
           <div class="form-group col-6 pb-10">
                    <input type="text" class="form-control form-control-lg" name="sibling" value=<?php echo'"'.$hasSibling.'"';?> >
            </div>
          <div>
            <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="sibling1" value=<?php echo'"'.$sibling1Name.'"';?> >
            </div>
            <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="sibling2" value=<?php echo'"'.$sibling1Name.'"';?> >
            </div>
            <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="sibling3" value=<?php echo'"'.$sibling1Name.'"';?> >
            </div>
            <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="sibling4" value=<?php echo'"'.$sibling1Name.'"';?> >
            </div>
          </div>
          <div class="form-group col-6 pb-10">
                    <input type="text" class="form-control form-control-lg" name="GT" value=<?php echo'"'.$GTProgramStatus.'"';?> >
            </div>
        <div>
          <h3>Information for parent/guardian #1</h3>
          <?php 
			  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
			  $stmt= $connect->prepare("SELECT * FROM parent WHERE parentID = ?");
			  $stmt->bind_param("s",$parent1ID);
			  $stmt->execute();
			  $stmt -> bind_result($parentName,$studentID,$address,$city,$state,$zip,$email,$cellPhone,$workPhone,$homePhone,$parentID);
			  $stmt -> fetch();

			    if(empty($parentName))
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
              <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$parentName.'"';?> name="parent1name" >
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$address.'"';?> name="parent1address" >
            </div>
        <div class="row">
              <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$city.'"';?> name="parent1city" >
              </div>
              <div class="form-group col-2 pb-10">
                <select class="form-control" id="state" name="state" readonly>
                  <option value="" selected hidden>State*</option>
                  <option value="AK" <?php if ($state=="AK") echo 'selected="selected"';?>>Alaska</option>
                  <option value="AL" <?php if ($state=="AL") echo 'selected="selected"';?>>Alabama</option>
                  <option value="AR" <?php if ($state=="AR") echo 'selected="selected"';?>>Arkansas</option>
                  <option value="AZ" <?php if ($state=="AZ") echo 'selected="selected"';?>>Arizona</option>
                  <option value="CA" <?php if ($state=="CA") echo 'selected="selected"';?>>California</option>
                  <option value="CO" <?php if ($state=="CO") echo 'selected="selected"';?>>Colorado</option>
                  <option value="CT" <?php if ($state=="CT") echo 'selected="selected"';?>>Connecticut</option>
                  <option value="DC" <?php if ($state=="DC") echo 'selected="selected"';?>>District of Columbia</option>
                  <option value="DE" <?php if ($state=="DE") echo 'selected="selected"';?>>Delaware</option>
                  <option value="FL" <?php if ($state=="FL") echo 'selected="selected"';?>>Florida</option>
                  <option value="GA" <?php if ($state=="GA") echo 'selected="selected"';?>>Georgia</option>
                  <option value="HI" <?php if ($state=="HI") echo 'selected="selected"';?>>Hawaii</option>
                  <option value="IA" <?php if ($state=="IA") echo 'selected="selected"';?>>Iowa</option>
                  <option value="ID" <?php if ($state=="ID") echo 'selected="selected"';?>>Idaho</option>
                  <option value="IL" <?php if ($state=="IL") echo 'selected="selected"';?>>Illinois</option>
                  <option value="IN" <?php if ($state=="IN") echo 'selected="selected"';?>>Indiana</option>
                  <option value="KS" <?php if ($state=="KS") echo 'selected="selected"';?>>Kansas</option>
                  <option value="KY" <?php if ($state=="KY") echo 'selected="selected"';?>>Kentucky</option>
                  <option value="LA" <?php if ($state=="LA") echo 'selected="selected"';?>>Louisiana</option>
                  <option value="MA" <?php if ($state=="MA") echo 'selected="selected"';?>>Massachusetts</option>
                  <option value="MD" <?php if ($state=="MD") echo 'selected="selected"';?>>Maryland</option>
                  <option value="ME" <?php if ($state=="ME") echo 'selected="selected"';?>>Maine</option>
                  <option value="MI" <?php if ($state=="MI") echo 'selected="selected"';?>>Michigan</option>
                  <option value="MN" <?php if ($state=="MN") echo 'selected="selected"';?>>Minnesota</option>
                  <option value="MO" <?php if ($state=="MO") echo 'selected="selected"';?>>Missouri</option>
                  <option value="MS" <?php if ($state=="MS") echo 'selected="selected"';?>>Mississippi</option>
                  <option value="MT" <?php if ($state=="MT") echo 'selected="selected"';?>>Montana</option>
                  <option value="NC" <?php if ($state=="NC") echo 'selected="selected"';?>>North Carolina</option>
                  <option value="ND" <?php if ($state=="ND") echo 'selected="selected"';?>>North Dakota</option>
                  <option value="NE" <?php if ($state=="NE") echo 'selected="selected"';?>>Nebraska</option>
                  <option value="NH" <?php if ($state=="NH") echo 'selected="selected"';?>>New Hampshire</option>
                  <option value="NJ" <?php if ($state=="NJ") echo 'selected="selected"';?>>New Jersey</option>
                  <option value="NM" <?php if ($state=="NM") echo 'selected="selected"';?>>New Mexico</option>
                  <option value="NV" <?php if ($state=="NV") echo 'selected="selected"';?>>Nevada</option>
                  <option value="NY" <?php if ($state=="NY") echo 'selected="selected"';?>>New York</option>
                  <option value="OH" <?php if ($state=="OH") echo 'selected="selected"';?>>Ohio</option>
                  <option value="OK" <?php if ($state=="OK") echo 'selected="selected"';?>>Oklahoma</option>
                  <option value="OR" <?php if ($state=="OR") echo 'selected="selected"';?>>Oregon</option>
                  <option value="PA" <?php if ($state=="PA") echo 'selected="selected"';?>>Pennsylvania</option>
                  <option value="PR" <?php if ($state=="PR") echo 'selected="selected"';?>>Puerto Rico</option>
                  <option value="RI" <?php if ($state=="RI") echo 'selected="selected"';?>>Rhode Island</option>
                  <option value="SC" <?php if ($state=="SC") echo 'selected="selected"';?>>South Carolina</option>
                  <option value="SD" <?php if ($state=="SD") echo 'selected="selected"';?>>South Dakota</option>
                  <option value="TN" <?php if ($state=="TN") echo 'selected="selected"';?>>Tennessee</option>
                  <option value="TX" <?php if ($state=="TX") echo 'selected="selected"';?>>Texas</option>
                  <option value="UT" <?php if ($state=="UT") echo 'selected="selected"';?>>Utah</option>
                  <option value="VA" <?php if ($state=="VA") echo 'selected="selected"';?>>Virginia</option>
                  <option value="VT" <?php if ($state=="VT") echo 'selected="selected"';?>>Vermont</option>
                  <option value="WA" <?php if ($state=="WA") echo 'selected="selected"';?>>Washington</option>
                  <option value="WI" <?php if ($state=="WI") echo 'selected="selected"';?>>Wisconsin</option>
                  <option value="WV" <?php if ($state=="WV") echo 'selected="selected"';?>>West Virginia</option>
                  <option value="WY" <?php if ($state=="WY") echo 'selected="selected"';?>>Wyoming</option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$zip.'"';?> name="parent1zip" >
              </div>
          </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$email.'"';?> name="parent1email" >
            </div>
            <div>
            </div>
            <div class="row">
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$cellPhone.'"';?> name="parent1Cell" >
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$workPhone.'"';?> name="parent1Work" >
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$homePhone.'"';?> name="parent1Home" >
              </div>
            </div>
        </div>
        <div>
          <h3>Information for parent/guardian #2</h3>
          <?php 
          	

        $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
        $stmt= $connect->prepare("SELECT * FROM parent WHERE parentID = ?");
        $stmt->bind_param("s",$parent2ID);
        $stmt->execute();
        $stmt -> bind_result($parentName,$studentID,$address,$city,$state,$zip,$email,$cellPhone,$workPhone,$homePhone,$parentID);
        $stmt -> fetch();

          if(empty($parentName))
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
              <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$parentName.'"';?> name="parent2name" >
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$address.'"';?> name="parent2address" >
            </div>
        <div class="row">
              <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$city.'"';?> name="parent2city" >
              </div>
               <div class="form-group col-2 pb-10">
                <select class="form-control" id="state" name="state" readonly>
                  <option value="" selected hidden>State*</option>
                  <option value="AK" <?php if ($state=="AK") echo 'selected="selected"';?>>Alaska</option>
                  <option value="AL" <?php if ($state=="AL") echo 'selected="selected"';?>>Alabama</option>
                  <option value="AR" <?php if ($state=="AR") echo 'selected="selected"';?>>Arkansas</option>
                  <option value="AZ" <?php if ($state=="AZ") echo 'selected="selected"';?>>Arizona</option>
                  <option value="CA" <?php if ($state=="CA") echo 'selected="selected"';?>>California</option>
                  <option value="CO" <?php if ($state=="CO") echo 'selected="selected"';?>>Colorado</option>
                  <option value="CT" <?php if ($state=="CT") echo 'selected="selected"';?>>Connecticut</option>
                  <option value="DC" <?php if ($state=="DC") echo 'selected="selected"';?>>District of Columbia</option>
                  <option value="DE" <?php if ($state=="DE") echo 'selected="selected"';?>>Delaware</option>
                  <option value="FL" <?php if ($state=="FL") echo 'selected="selected"';?>>Florida</option>
                  <option value="GA" <?php if ($state=="GA") echo 'selected="selected"';?>>Georgia</option>
                  <option value="HI" <?php if ($state=="HI") echo 'selected="selected"';?>>Hawaii</option>
                  <option value="IA" <?php if ($state=="IA") echo 'selected="selected"';?>>Iowa</option>
                  <option value="ID" <?php if ($state=="ID") echo 'selected="selected"';?>>Idaho</option>
                  <option value="IL" <?php if ($state=="IL") echo 'selected="selected"';?>>Illinois</option>
                  <option value="IN" <?php if ($state=="IN") echo 'selected="selected"';?>>Indiana</option>
                  <option value="KS" <?php if ($state=="KS") echo 'selected="selected"';?>>Kansas</option>
                  <option value="KY" <?php if ($state=="KY") echo 'selected="selected"';?>>Kentucky</option>
                  <option value="LA" <?php if ($state=="LA") echo 'selected="selected"';?>>Louisiana</option>
                  <option value="MA" <?php if ($state=="MA") echo 'selected="selected"';?>>Massachusetts</option>
                  <option value="MD" <?php if ($state=="MD") echo 'selected="selected"';?>>Maryland</option>
                  <option value="ME" <?php if ($state=="ME") echo 'selected="selected"';?>>Maine</option>
                  <option value="MI" <?php if ($state=="MI") echo 'selected="selected"';?>>Michigan</option>
                  <option value="MN" <?php if ($state=="MN") echo 'selected="selected"';?>>Minnesota</option>
                  <option value="MO" <?php if ($state=="MO") echo 'selected="selected"';?>>Missouri</option>
                  <option value="MS" <?php if ($state=="MS") echo 'selected="selected"';?>>Mississippi</option>
                  <option value="MT" <?php if ($state=="MT") echo 'selected="selected"';?>>Montana</option>
                  <option value="NC" <?php if ($state=="NC") echo 'selected="selected"';?>>North Carolina</option>
                  <option value="ND" <?php if ($state=="ND") echo 'selected="selected"';?>>North Dakota</option>
                  <option value="NE" <?php if ($state=="NE") echo 'selected="selected"';?>>Nebraska</option>
                  <option value="NH" <?php if ($state=="NH") echo 'selected="selected"';?>>New Hampshire</option>
                  <option value="NJ" <?php if ($state=="NJ") echo 'selected="selected"';?>>New Jersey</option>
                  <option value="NM" <?php if ($state=="NM") echo 'selected="selected"';?>>New Mexico</option>
                  <option value="NV" <?php if ($state=="NV") echo 'selected="selected"';?>>Nevada</option>
                  <option value="NY" <?php if ($state=="NY") echo 'selected="selected"';?>>New York</option>
                  <option value="OH" <?php if ($state=="OH") echo 'selected="selected"';?>>Ohio</option>
                  <option value="OK" <?php if ($state=="OK") echo 'selected="selected"';?>>Oklahoma</option>
                  <option value="OR" <?php if ($state=="OR") echo 'selected="selected"';?>>Oregon</option>
                  <option value="PA" <?php if ($state=="PA") echo 'selected="selected"';?>>Pennsylvania</option>
                  <option value="PR" <?php if ($state=="PR") echo 'selected="selected"';?>>Puerto Rico</option>
                  <option value="RI" <?php if ($state=="RI") echo 'selected="selected"';?>>Rhode Island</option>
                  <option value="SC" <?php if ($state=="SC") echo 'selected="selected"';?>>South Carolina</option>
                  <option value="SD" <?php if ($state=="SD") echo 'selected="selected"';?>>South Dakota</option>
                  <option value="TN" <?php if ($state=="TN") echo 'selected="selected"';?>>Tennessee</option>
                  <option value="TX" <?php if ($state=="TX") echo 'selected="selected"';?>>Texas</option>
                  <option value="UT" <?php if ($state=="UT") echo 'selected="selected"';?>>Utah</option>
                  <option value="VA" <?php if ($state=="VA") echo 'selected="selected"';?>>Virginia</option>
                  <option value="VT" <?php if ($state=="VT") echo 'selected="selected"';?>>Vermont</option>
                  <option value="WA" <?php if ($state=="WA") echo 'selected="selected"';?>>Washington</option>
                  <option value="WI" <?php if ($state=="WI") echo 'selected="selected"';?>>Wisconsin</option>
                  <option value="WV" <?php if ($state=="WV") echo 'selected="selected"';?>>West Virginia</option>
                  <option value="WY" <?php if ($state=="WY") echo 'selected="selected"';?>>Wyoming</option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$zip.'"';?> name="parent2zip" >
              </div>
          </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$email.'"';?> name="parent2email">
            </div>
            <div class="row">
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$cellPhone.'"';?> name="parent2Cell" >
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$workPhone.'"';?> name="parent2Work" >
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" value=<?php echo'"'.$homePhone.'"';?> name="parent2Home" >
              </div>
            </div>

			<button name="submit" class="btn btn-success btn-block" type="submit">Update Information</button>
        <br><br>
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