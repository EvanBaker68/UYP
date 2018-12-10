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

$studentID = $_POST['stuID'];

$stmt = $connect->prepare("Select COUNT(*) FROM studentApp WHERE studentID = ?");
$stmt->bind_param("s", $studentID);
$stmt->execute();
$stmt->bind_result($nRows);
$stmt->fetch();
$count=$nRows;

if($count == 1 ){
	setcookie("IDerror", 0, time() + 86400, "/");
	setcookie("menubar", 2, time() + 86400, "/");
  setcookie("IDstudent", $studentID, time() + 86400, "/");
	// header() denotes a link
	header('Location: adminSInfo.php');
}
else{
	setcookie("IDerror", 1, time() + 86400, "/");
	header('Location: EnterID.php');
}

?>