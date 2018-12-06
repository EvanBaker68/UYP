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
  
  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $stmt= $connect->prepare("SELECT * FROM studentApp WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['acceptStudent']);
  $stmt->execute();
  $stmt -> bind_result($studentID,$fName,$lName,$MI,$suffix,$nickname,$address,$state,$city,$zip,$birthday,
  	$gender,$race,$typeOfSchool,$schoolName,$schoolDistrict,$upcomingGrade,$expectedGradYear,$expectedHighSchool,
  	$studentEmail,$studentPhone,$hasSibling,$accepted,$GTProgramStatus,$sibling1Name,$sibling2Name,$sibling3Name,$sibling4Name);
  $stmt -> fetch();
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
          <div class="form-group col-2 pb-10">
                <select class="form-control" id="state" name="state" readonly>
                  <option value="" selected hidden>State*</option>
                  <option value="AK">Alaska</option>
                  <option value="AL">Alabama</option>
                  <option value="AR">Arkansas</option>
                  <option value="AZ">Arizona</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DC">District of Columbia</option>
                  <option value="DE">Delaware</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="IA">Iowa</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MD">Maryland</option>
                  <option value="ME">Maine</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MO">Missouri</option>
                  <option value="MS">Mississippi</option>
                  <option value="MT">Montana</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="NE">Nebraska</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NV">Nevada</option>
                  <option value="NY">New York</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VA">Virginia</option>
                  <option value="VT">Vermont</option>
                  <option value="WA">Washington</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WV">West Virginia</option>
                  <option value="WY">Wyoming</option>
                </select>
            </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Zip: '.$zip.'"';?> name="zip" readonly>
              </div>
          </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Birthday: '.$birthday.'"';?> name="birthday" readonly>
            </div>
          <div class="row">
            <div class="form-group col-4 pb-10">
                  <select class="form-control" id="race" name="race">
                    <option value="" selected hidden>Race</option>
                    <option value="N/A">Choose not to answer</option>
                    <option value="White">White</option>
                    <option value="White">Black or African American</option>
                    <option value="White">Hispanic/Latino</option>
                    <option value="White">American Indian or Alaska Native</option>
                    <option value="White">Asian</option>
                    <option value="White">Native Hawaiian or other Pacific Islander</option>
                  </select>
              </div>
          <div class="form-group col-2 pb-10">
                <select class="form-control" id="gender" name="gender">
                  <option value="" selected hidden>Gender*</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
            </div>
        </div>
        <div>
          <h3>School Information</h3>
        <label class="radio-inline"><input type="radio" id="schoolType1" name="schoolType" value="Public" checked>Public School</label>
        <label class="radio-inline"><input type="radio" id="schoolType2" name="schoolType" value="Private">Private School</label>
        <label class="radio-inline"><input type="radio" id="schoolType3" name="schoolType" value="Home">Home-Schooled</label>
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
                  <select class="form-control" id="upcomingGrade" name="upcomingGrade">
                    <option value="" selected hidden>Grade in upcoming fall*</option>
                    <?php
                    for ($x = 4; $x <= 12; $x++) {

                      echo '<option value="'.$x.'">'.$x.'</option>';
                      }

                    ?>
                  </select>
              </div>
        </div>
        <div class="row">
          <div class="form-group col-6 pb-10">
              <select class="form-control" id="expectedGradYear" name="expectedGradYear">
                    <option value="" selected hidden>Expected High School Graduation Year</option>
                    <option value="N/A">I Don't Know</option>
                <?php
                $year = date("Y");
                  for ($x = 0; $x < 30; $x++) {

                    echo '<option value="'.($year + $x).'">'.($year + $x).'</option>';
                    }

                ?>
              </select>
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
          <div>
            <p>Do you have any siblings in the program?</p>
            <label class="radio-inline"><input type="radio" name="sibling" value="0">Yes</label>
            <label class="radio-inline"><input type="radio" name="sibling" value="1" checked>No</label>
          </div>
          <div>
            <div class="form-group">
            <p>If so, please list their names</p>
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
        <div>
        <p>Have you been accepted to a GT program?</p>
        <label class="radio-inline"><input type="radio" id="GT1" name="GT" value="Yes">Yes</label>
        <label class="radio-inline"><input type="radio" id="GT2" name="GT" value="No" checked>No</label>
        <label class="radio-inline"><input type="radio" id="GT3" name="GT" value="I don't know">I don't know</label>
        </div>
        <div>
          <h3>Information for parent/guardian #1</h3>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Parent/Guardian 1 Name: '.$sibling1Name.'"';?> name="parent1name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Address*" name="parent1address">
            </div>
        <div class="row">
              <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" placeholder="City*" name="parent1city">
              </div>
          <div class="form-group col-2 pb-10">
                <select class="form-control" id="state" name="parent1state">
                  <option value="" selected hidden>State*</option>
                  <option value="AK">Alaska</option>
                  <option value="AL">Alabama</option>
                  <option value="AR">Arkansas</option>
                  <option value="AZ">Arizona</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DC">District of Columbia</option>
                  <option value="DE">Delaware</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="IA">Iowa</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MD">Maryland</option>
                  <option value="ME">Maine</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MO">Missouri</option>
                  <option value="MS">Mississippi</option>
                  <option value="MT">Montana</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="NE">Nebraska</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NV">Nevada</option>
                  <option value="NY">New York</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VA">Virginia</option>
                  <option value="VT">Vermont</option>
                  <option value="WA">Washington</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WV">West Virginia</option>
                  <option value="WY">Wyoming</option>
                </select>
            </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="Zip Code*" name="parent1zip">
              </div>
          </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Email Address*" name="parent1email">
            </div>
            <div>
              <p>At least one phone number is required.</p>
            </div>
            <div class="row">
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder="Cell Phone Number" name="parent1Cell">
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder="Work Phone Number" name="parent1Work">
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder="Home Phone Number" name="parent1Home">
              </div>
            </div>
        </div>
        <div>
          <h3>Information for parent/guardian #2</h3>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Name" name="parent2name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Address" name="parent2address">
            </div>
        <div class="row">
              <div class="form-group col-2">
                <input type="text" class="form-control form-control-lg" placeholder="City" name="parent2city">
              </div>
          <div class="form-group col-2 pb-10">
                <select class="form-control" id="state" name="parent2state">
                  <option value="" selected hidden>State</option>
                  <option value="AK">Alaska</option>
                  <option value="AL">Alabama</option>
                  <option value="AR">Arkansas</option>
                  <option value="AZ">Arizona</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DC">District of Columbia</option>
                  <option value="DE">Delaware</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="IA">Iowa</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MD">Maryland</option>
                  <option value="ME">Maine</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MO">Missouri</option>
                  <option value="MS">Mississippi</option>
                  <option value="MT">Montana</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="NE">Nebraska</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NV">Nevada</option>
                  <option value="NY">New York</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VA">Virginia</option>
                  <option value="VT">Vermont</option>
                  <option value="WA">Washington</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WV">West Virginia</option>
                  <option value="WY">Wyoming</option>
                </select>
            </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="Zip Code" name="parent2zip">
              </div>
          </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Email Address" name="parent2email">
            </div>
            <div class="row">
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder="Cell Phone Number" name="parent2Cell">
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder="Work Phone Number" name="parent2Work">
              </div>
              <div class="form-group col-4">
                <input type="text" class="form-control form-control-lg" placeholder="Home Phone Number" name="parent2Home">
              </div>
            </div>
          <button name="submit" class="btn btn-success btn-block" type="submit">Submit Application</button>
          <!-- <input type="submit" value="Submit Application" class="btn btn-outline-secondary btn-block"> -->
        </div>
      </div>
    </div>


   <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>