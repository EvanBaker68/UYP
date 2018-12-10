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
  
  $pushedSearchButton = 0;
  $searchSession = 1;
  if(isset($_POST['searchSession'])){
  	$searchSession = $_POST['searchSession'];
    $pushedSearchButton = 1;
    setcookie("searchSession", $searchSession, time() + 86400, "/");
    setcookie("noSpotsRemaining", 0, time() + 86400, "/");
    setcookie("sameTimeSlot", 0, time() + 86400, "/");
    setcookie("sameClassSameYear", 0, time() + 86400, "/");
  }
  if(isset($_POST['registerButton'])){
     setcookie("registerCRN", $_POST['registerButton'], time() + 86400, "/");
     header('Location: verifyRegister.php');
  }

    if(isset($_COOKIE['fromVerify']) && $_COOKIE['fromVerify'] == 1){
    setcookie("fromVerify", 0, time() + 86400, "/");
    $searchSession = $_COOKIE['searchSession'];
  }

  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $stmt= $connect->prepare("SELECT upcomingGrade FROM studentApp WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['id']);
  $stmt->execute();
  $stmt -> bind_result($upcomingGrade);
  $stmt -> fetch();

  $currentYear = date("Y");

  if($upcomingGrade > 3 && $upcomingGrade < 6){
  	$studentLevel = 1;
  }
  else if($upcomingGrade > 5 && $upcomingGrade < 9){
  	$studentLevel = 2;
  }
  else if($upcomingGrade > 8 && $upcomingGrade < 13){
  	$studentLevel = 3;
  }
  else{
  	$studentLevel = 4;
  }

  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $stmt= $connect->prepare("SELECT CRN,session,level,className,timeSlot,room,instructor,year,cost,capacity,remainingSpots FROM class WHERE level = ? AND session = ?
  AND year >= ?");
  $stmt->bind_param("iii",$studentLevel,$searchSession,$currentYear);
  $stmt->execute();
  $stmt -> bind_result($CRN,$session,$level,$className,$timeSlot,$room,$instructor,$year,$cost,$capacity,$remainingSpots);
  
  // if (isset($_COOKIE["sameTimeSlot"]) && $_COOKIE["noClassExists"] == 1) 
  //   echo '<div class="container"><div class="alert alert-danger">No class with a matching CRN was found.</div></div>';
  // if (isset($_COOKIE["noSpotsRemaining"]) && $_COOKIE["noSpotsRemaining"] == 1) 
  //   echo '<div class="container"><div class="alert alert-danger">No spots are open for the desired class.</div></div>';
  // if (isset($_COOKIE["takingClassAlready"]) && $_COOKIE["takingClassAlready"] == 1) 
  //   echo '<div class="container"><div class="alert alert-danger">You cannot take two classes with the same timeslot.</div></div>';

  	  echo'<form method="post" action="classRegister.php">
                <center>
                <label for="searchSession">Session Number</label>
                <div class="form-group col-3 pb-10 row">
                <select class="form-control" id="searchSession" name="searchSession">
                  <option value="" disabled hidden selected>'.$searchSession.'</option>
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value=3>3</option>
                </select>
                <button class=" btn-success btn-block" type="submit" name="button" >View Classes</button>
            	</div>
            	</center>
            	
      </form>';

    if($pushedSearchButton == 0){
      if (isset($_COOKIE["noSpotsRemaining"]) && $_COOKIE["noSpotsRemaining"] == 1) 
        echo '<div class="container"><div class="alert alert-danger">No spots remain for the entered class.</div></div>';
      if (isset($_COOKIE["sameTimeSlot"]) && $_COOKIE["sameTimeSlot"] == 1) 
        echo '<div class="container"><div class="alert alert-danger">You are already registered for a class in that time slot.</div></div>';
      if (isset($_COOKIE["sameClassSameYear"]) && $_COOKIE["sameClassSameYear"] == 1) 
        echo '<div class="container"><div class="alert alert-danger">You are already taking this class this year.</div></div>';
    }

      echo '<div class="table-responsive" >  
           <table class="table table-bordered"  >  
                <tr style="width: 100%; background-color: #C0C0C0;">   
                     <th width="10%">Level</th> 
                     <th width="15%">Class Name</th>  
                     <th width="10%">Time Slot</th> 
                     <th width="10%">Room</th>
                     <th width="10%">Instructor</th>
                     <th width="10%">Year</th>
                     <th width="10%">Cost</th>
                     <th width="5%">Capacity</th>
                     <th width="5%">Remaining Spots</th>
                     <th width="10%">Register</th>
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


        $connect1 = mysqli_connect("localhost", "root", "", "DB3335"); 
        $stmt1= $connect1->prepare("SELECT COUNT(*) FROM takes WHERE CRN = ? AND studentID = ?");
        $stmt1->bind_param("ss",$CRN,$_COOKIE['id']);
        $stmt1->execute();
        $stmt1-> bind_result($alreadyTaking);  
        $stmt1->fetch();


          if($alreadyTaking < 1){
           echo '  
                <tr>  
                     <td>'.$level.'</td> 
                     <td>'.$className.'</td> 
                     <td>'.$timeSlot.'</td>
                     <td>'.$room.'</td>  
                     <td>'.$instructor.'</td> 
                     <td>'.$year.'</td>
                     <td>$'.$cost.'</td>
                     <td>'.$capacity.'</td>
                     <td>'.$remainingSpots.'</td>
                     <td><form method="post" action="classRegister.php"><button class=" btn-success btn-block" type="submit" value="'.$CRN.'" name="registerButton">Register</input></form></td>
                </tr>';  
      	}
      }

 	echo '</table></div>';
 $connect = null;


?>

<!-- 
  	  <form method="post" action="verifyRegister.php">
                <center>
                <label for="searchSession">Enter CRN Here</label>
                <div class="form-group col-3 pb-10 row">
              <input type="text" class="form-control form-control-lg" placeholder="CRN" name="CRN">
                <button class=" btn-success btn-block" type="submit" name="button" >Register</button>
            	</div>
            	</center>
            	
      </form>' -->

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>