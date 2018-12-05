<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>UYP</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php

 session_start(); 
 $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
 $required = array('fname', 'lname', 'nickname', 'studentAddress', 'city', 'state', 'zip',
 'birthday', 'gender', 'schoolName', 'upcomingGrade', 'parent1name', 'parent1email', 'parent1address',
 'parent1city', 'parent1zip', 'parent1state');

 $required2 = array('parent1Cell', 'parent1Work', 'parent1Home');

$error = false;
$missingFieldsError = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $missingFieldsError = true;
  }
}
var_dump($missingFieldsError);

$noPhone = true;
foreach($required2 as $field) {
  if (!empty($_POST[$field])) {
    var_dump($_POST[$field]);
    $noPhone = false;
  }
}
var_dump($noPhone);

if($noPhone == true){
  $missingFieldsError = true;
}

if($missingFieldsError == true){
  setcookie("emptyFields", 1, time() + 86400, "/");
  $error = true;
}
else{
  setcookie("emptyFields", 0, time() + 86400, "/");
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$nickname = $_POST['nickname'];
$studentAddress = $_POST['studentAddress'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$schoolName = $_POST['schoolName'];
$parent1name = $_POST['parent1name'];
$parent1email = $_POST['parent1email'];
$parent1address = $_POST['parent1address'];
$MI = $_POST['MI'];
$suffix = $_POST['suffix'];
$race = $_POST['race'];
$schoolType = $_POST['schoolType'];
$schoolDistrict = $_POST['schoolDistrict'];
$upcomingGrade = $_POST['upcomingGrade'];
$expectedGradYear = $_POST['expectedGradYear'];
$expectedHighSchool = $_POST['expectedHighSchool'];
$studentEmail = $_POST['studentEmail'];
$studentPhone = $_POST['studentPhone'];
$sibling = $_POST['sibling'];
$sibling1 = $_POST['sibling1'];
$sibling2 = $_POST['sibling2'];
$sibling3 = $_POST['sibling3'];
$sibling4 = $_POST['sibling4'];
$GT = $_POST['GT'];
$parent1name = $_POST['parent1name'];
$parent1address = $_POST['parent1address'];
$parent1city = $_POST['parent1city'];
$parent1zip = $_POST['parent1zip'];
$parent1state = $_POST['parent1state'];
$parent1email = $_POST['parent1email'];
$parent1Cell = $_POST['parent1Cell'];
$parent1Work = $_POST['parent1Work'];
$parent1Home = $_POST['parent1Home'];
////////////////////////////////////////////////////////////////////////////////////////
$accepted = false;
$parent2name = $_POST['parent2name'];
$parent2address = $_POST['parent2address'];
$parent2city = $_POST['parent2city'];
$parent2zip = $_POST['parent2zip'];
$parent2state = $_POST['parent2state'];
$parent2email = $_POST['parent2email'];
$parent2Cell = $_POST['parent2Cell'];
$parent2Work = $_POST['parent2Work'];
$parent2Home = $_POST['parent2Home'];

$dateChecker = "/[0-9]{4}-[0-9]{2}-[0-9]{2}/";
$emailChecker = "/[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+/";

if(!preg_match($dateChecker, $birthday)){
    setcookie("invalidBirthday", 1, time() + 86400, "/");
    $error = true;
}
else{
    setcookie("invalidBirthday", 0, time() + 86400, "/");
}

if(!preg_match($emailChecker, $parent1email)){
    setcookie("invalidEmail", 1, time() + 86400, "/");
    $error = true;
}
else{
    setcookie("invalidEmail", 0, time() + 86400, "/");
}

if($error == true){
    header('Location: studentApp.php');
}


$id = substr(md5(microtime()),rand(0,26),6);
var_dump($id);


 $stmt = $connect->prepare("INSERT INTO studentApp(studentID, fName,lName,middleInitial,suffix,nickname
 ,address,state,city,zip,birthday,gender,race,typeOfSchool,schoolName,schoolDistrict
 ,upcomingGrade,expectedGradYear,expectedHighSchool,studentEmail,hasSibling,accepted,GTProgramStatus,
 sibling1Name, sibling2Name, sibling3Name, sibling4Name) 
 VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if($stmt == false){
  setcookie("incorrectInput", 1, time() + 86400, "/");
  // header('Location: studentApp.php');
}

 $stmt->bind_param("ssssssssssssssssiissiisssss",$id,$fname, $lname, $MI, $suffix, $nickname, $studentAddress,
 $state, $city, $zip, $birthday, $gender, $race, $schoolType, $schoolName, $schoolDistrict, $upcomingGrade,
 $expectedGradYear, $expectedHighSchool, $studentEmail, $sibling, $accepted, $GT, $sibling1, $sibling2, 
 $sibling3, $sibling4);
 $stmt->execute();

 $stmt = $connect->prepare("INSERT INTO parent(parentName, studentId, address, city, state, zip, email, 
  cellPhone, homePhone, workPhone) VALUES(?,?,?,?,?,?,?,?,?,?)");

  // $stmt = $connect->prepare("INSERT INTO parent(parentName, studentId, address, city, state, zip, email, 
  // cellPhone, homePhone, workPhone) VALUES(?,?,?,?,?,?,?,?,?,?)");

 $stmt->bind_param("ssssssssss",$parent1name,$id, $parent1address, $parent1city, $parent1state, $parent1zip,
 $parent1email, $parent1Cell, $parent1Work, $parent1Home);

 //  $stmt->bind_param("s",$parent1name,$id, $parent1address, $parent1city, $parent1state, $parent1zip,
 // $parent1email, $parent1Cell, $parent1Work, $parent1Home);
 $stmt->execute();

 $stmt = $connect->prepare("INSERT INTO parent(parentName, studentId, address, city, state, zip, email, 
 cellPhone, homePhone, workPhone) VALUES(?,?,?,?,?,?,?,?,?,?)");

 $stmt->bind_param("ssssssssss",$parent2name,$id, $parent2address, $parent2city, $parent2state, $parent2zip,
 $parent2email, $parent2Cell, $parent2Work, $parent2Home);
 $stmt->execute();


//Verify that other information is correct

 echo "<p>heythere</p>";

 // $stmt = $connect->prepare("INSERT INTO TEST(username, password) VALUES(?, ?)");
 // $stmt->bind_param("ss",$name, $password);
 // $stmt->execute();

 $connect = null;
 // header('Location: createaccount.php');

?>

</body>
</html>
