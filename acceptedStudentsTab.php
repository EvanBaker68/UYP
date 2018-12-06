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


    if(isset($_POST['button'])){
     setcookie("acceptStudent", $_POST['button'], time() + 86400, "/");
     header('Location: acceptStudent.php');
    }


 include 'menubar.php'; 
 session_start(); 
 $connect = mysqli_connect("localhost", "root", "", "DB3335"); 


 echo "<br><br>";

 $result = $connect->query("Select * FROM studentApp WHERE accepted = 1");

      echo '<div class="table-responsive" >  
           <table class="table table-bordered"  >  
                <tr style="width: 100%; background-color: #C0C0C0;">  
                     <th width="10%">User ID</th>  
                     <th width="25%">Name</th>  
                     <th width="15%">Grade in Fall</th> 
                     <th width="25%">Current school</th>  
                     <th width="25%">Update Student Info</th>  
                </tr>';



 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           echo '  
                <tr>  
                     <td>'.$row["studentID"].'</td>  
                     <td class="Type" data-id14="'.$row["studentID"].'" contenteditable>'.$row["fName"].' '.$row["lName"].'</td> 
                     <td class="FirstName" data-id1="'.$row["studentID"].'" contenteditable>'.$row["upcomingGrade"].'</td>  
                     <td class="LastName" data-id2="'.$row["studentID"].'" contenteditable>'.$row["schoolName"].'</td> 
                     <td><form method="post" action="pendingStudents.php"><button class=" btn-success btn-block" type="submit" value="'.$row["studentID"].'" name="button" >Update Student Info</input></form> </td>
                </tr>';  
      }  
 }

 	echo '</table></div>';
 $connect = null;
 // header('Location: createaccount.php');
 ?>


   <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
