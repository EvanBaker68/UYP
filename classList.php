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

  session_start(); 
  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $result = $connect->query("Select * FROM class ORDER BY year DESC");
  

  echo '<br><center><form method="post" action="addClassInfo.php"><button class=" col-3 btn-success btn-block" type="submit" name="addClassButton">Add New Class</button></form></center><br>';

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


 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  

           echo '  
                <tr>  
                     <td>'.$row['session'].'</td> 
                     <td>'.$row['level'].'</td> 
                     <td>'.$row['className'].'</td>
                     <td>'.$row['timeSlot'].'</td>  
                     <td>'.$row['room'].'</td> 
                     <td>'.$row['instructor'].'</td>
                     <td>'.$row['year'].'</td>
                     <td>$'.$row['cost'].'</td>
                </tr>';  
      	}
 }


 	echo '</table></div>';
 $connect = null;


?>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>