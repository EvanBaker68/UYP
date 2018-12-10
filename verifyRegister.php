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

$CRN = $_COOKIE['registerCRN'];
$noError = 1;


//Recieves information about class
 $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
 $stmt= $connect->prepare("SELECT CRN,className,level,remainingSpots,timeSlot,session,year FROM class WHERE CRN = ?");
 $stmt->bind_param("s",$CRN);
 $stmt->execute();
 $stmt -> bind_result($CRN2,$className,$level,$remainingSpots,$timeSlot,$session,$year);
 $stmt -> fetch();


 if($remainingSpots < 1){
 	setcookie("noSpotsRemaining", 1, time() + 86400, "/");
  $noError = 0;
 }
 else{
  setcookie("noSpotsRemaining", 0, time() + 86400, "/");
 }


 // Checks to see if student is taking another class with the same time slot in that particular session
 $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
 $stmt= $connect->prepare("SELECT COUNT(*) FROM takes WHERE year = ? AND session = ? AND timeSlot = ? AND studentID = ?");
 $stmt->bind_param("iiis",$year,$session,$timeSlot,$_COOKIE['id']);
 $stmt->execute();
 $stmt -> bind_result($sameTimeSlot);
 $stmt -> fetch();


 if($sameTimeSlot > 0){
 	setcookie("sameTimeSlot", 1, time() + 86400, "/");
  $noError = 0;
 }
 else{
  setcookie("sameTimeSlot", 0, time() + 86400, "/");
 }


  // Checks to see if the student is taking the same class already that year
  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $stmt= $connect->prepare("SELECT COUNT(*) FROM takes WHERE className = ? AND year = ?");
  $stmt->bind_param("si",$className,$year);
  $stmt->execute();
  $stmt -> bind_result($sameClassSameYear);
  $stmt -> fetch();

 if($sameClassSameYear > 0){
  setcookie("sameClassSameYear", 1, time() + 86400, "/");
  $noError = 0;
 }
 else{
  setcookie("sameClassSameYear", 0, time() + 86400, "/");
 }


if($noError == 1){
 // Signs the student up for the class by inserting a tuple into the takes table
 $connect = mysqli_connect("localhost", "root", "", "DB3335");
 $stmt = $connect->prepare("INSERT INTO takes(studentID,session,className,level,timeSlot,year,CRN) 
 VALUES(?,?,?,?,?,?,?)");
 $stmt->bind_param("sisiiis",$_COOKIE['id'],$session,$className,$level,$timeSlot,$year,$CRN);
 $stmt->execute();

 // Decrements the remaining spots for the class the student signed up for
 $remainingSpots--;


 // Updates the class tuple with the new number of spots remaining
 $connect = mysqli_connect("localhost", "root", "", "DB3335");
 $stmt = $connect->prepare("UPDATE class SET remainingSpots=? WHERE CRN = ?");
 $stmt->bind_param("is",$remainingSpots,$CRN);
 $stmt->execute();

 
 setcookie("noSpotsRemaining", 0, time() + 86400, "/");
 setcookie("sameTimeSlot", 0, time() + 86400, "/");
 setcookie("sameClassSameYear", 0, time() + 86400, "/");
 setcookie("searchSession", 1, time() + 86400, "/");
 setcookie("fromVerify", 0, time() + 86400, "/");
 header('Location: registerConfirmation.php');
}
else{
  setcookie("fromVerify", 1, time() + 86400, "/");
  header('Location: classRegister.php');
}

?>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>