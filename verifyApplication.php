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
 $required = array('fname', 'lname', 'MI', 'suffix', 'nickname', 'studentAddress', 'city', 'state', 'zip',
 'birthday', 'gender', 'schoolName', 'parent1name', 'parent1email', 'parent1address', 'parent1name', 'parent1email', 
 'parent1address');

 $required2 = array('parent1cell', 'parent1work', 'parent1home');

$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

$noPhone = true;
foreach($required2 as $field) {
  if (isset($_POST[$field])) {
    $noPhone = false;
  }
}

 echo "<p>heythere</p>";

 // $stmt = $connect->prepare("INSERT INTO TEST(username, password) VALUES(?, ?)");
 // $stmt->bind_param("ss",$name, $password);
 // $stmt->execute();

 $connect = null;
 // header('Location: createaccount.php');


?>
</body>
</html>
