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
?>

<?php

  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $stmt= $connect->prepare("SELECT upcomingGrade FROM studentApp WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['acceptStudent']);
  $stmt->execute();
  $stmt -> bind_result($upcomingGrade);
  $stmt -> fetch();

  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $stmt= $connect->prepare("SELECT session,level,className,timeSlot,room,instructor,year,cost,capacity,remainingSpots FROM class WHERE className IN (SELECT className FROM takes WHERE studentID = ?)");
  $stmt->bind_param("s",$_COOKIE['id']);
  $stmt->execute();
  $stmt -> bind_result($session,$level,$className,$timeSlot,$room,$instructor,$year,$cost,$capacity,$remainingSpots);
  

      echo '<div class="table-responsive" >  
           <table class="table table-bordered"  >  
                <tr style="width: 100%; background-color: #C0C0C0;">  
                     <th width="5%">Session</th>  
                     <th width="10%">Level</th> 
                     <th width="20%">Class Name</th>  
                     <th width="15%">Time Slot</th> 
                     <th width="10%">Room</th>
                     <th width="15%">Instructor</th>
                     <th width="10%">Year</th>
                     <th width="10%">Cost</th>
                </tr>';

      while($stmt -> fetch())  
      {  
      	if($level == 1){
      		$level = "4th-5th grade";
      	}
      	else if($level == 2){
      		$level = "6th-8th grade";
      	}
      	else if($level == 3){
      		$level = "9th-12th grade";
      	}

      	if($timeSlot == 1){
      		$timeSlot = "9:45 – 11:15am";
      	}
      	else if($timeSlot == 2){
      		$timeSlot = "1:15-2:45 pm";
      	}
           echo '  
                <tr>  
                     <td>'.$session.'</td> 
                     <td>'.$level.'</td> 
                     <td>'.$className.'</td>
                     <td>'.$timeSlot.'</td>  
                     <td>'.$room.'</td> 
                     <td>'.$instructor.'</td>
                     <td>'.$year.'</td>
                     <td>$'.$cost.'</td>
                </tr>';  
      	}
 


 	echo '</table></div>';
 $connect = null;


?>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>