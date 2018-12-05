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
 'birthday', 'gender', 'schoolName', 'parent1name', 'parent1email', 'parent1address');

 $required2 = array('parent1Cell', 'parent1Work', 'parent1Home');

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
  header('Location: studentApp.php');
}

$dateChecker = "/[0-9]{4}-[0-9]{2}-[0-9]{2}/";
$emailChecker = "/[a-z][A-Z][0-9]+@[a-z][A-Z]+\.[a-z][A-Z]+/";

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
