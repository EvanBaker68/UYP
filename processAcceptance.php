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

if (isset($_POST['acceptButton'])) {
    
  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $stmt= $connect->prepare("SELECT fName,lName,studentEmail FROM studentApp WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['acceptStudent']);
  $stmt->execute();
  $stmt -> bind_result($fName,$lName,$studentEmail);
  $stmt -> fetch();


  $endNum = 1;
  $username = $fName.'_'.$lName;
  $extendedUsername = $username;
  $adminName = $_POST['adminName'];
  $acceptanceYear = $_POST['acceptanceYear'];

  $connect = mysqli_connect("localhost", "root", "", "DB3335");
  $stmt = $connect->prepare("Select COUNT(*) FROM studentLogin WHERE username = ?");
  $stmt->bind_param("s",$username);
  //Executes the query
  $stmt->execute();
  //Binds the count(*) to $nRows, and the id to $id
  $stmt->bind_result($count);
  $stmt->fetch();

  while($count == 1){
  	$extendedUsername = $username.$endNum;

  	$connect = mysqli_connect("localhost", "root", "", "DB3335");
  	$stmt = $connect->prepare("Select COUNT(*) FROM studentLogin WHERE Username = ?");
    $stmt->bind_param("s",$extendedUsername);
    //Executes the query
    $stmt->execute();
    //Binds the count(*) to $nRows, and the id to $id
    $stmt->bind_result($count);
    $stmt->fetch();
    $endNum++;
  }

  $password = substr(md5(microtime()),rand(0,26),6);

  $connect = mysqli_connect("localhost", "root", "", "DB3335");
  $stmt = $connect->prepare("INSERT INTO studentLogin(Username, Password, id) VALUES(?, ?, ?)");
  $stmt->bind_param("sss",$extendedUsername, $password, $_COOKIE['acceptStudent']);
  $stmt->execute();

  $connect = mysqli_connect("localhost", "root", "", "DB3335");
  $stmt = $connect->prepare("UPDATE studentApp SET accepted=1, approvalAdminName=?, acceptedYear=? WHERE studentID = ?");
  $stmt->bind_param("sis",$adminName,$acceptanceYear,$_COOKIE['acceptStudent']);
  $stmt->execute();


  if(empty($studentEmail)){
  		$connect = mysqli_connect("localhost", "root", "", "DB3335"); 
		$stmt= $connect->prepare("SELECT email FROM parent WHERE studentID = ?");
		$stmt->bind_param("s",$_COOKIE['acceptStudent']);
		$stmt->execute();
		$stmt -> bind_result($email);
		$stmt -> fetch();

		if(empty($email)){
			$stmt->fetch();
			$studentEmail = $email;
		}
		else{
			$studentEmail = $email;
		}
  }

  $to = $studentEmail; // PUT YOUR EMAIL ADDRESS HERE
  $email_subject = "UYP Acceptance"; // EDIT THE EMAIL SUBJECT LINE HERE
  $email_body = "Hello ".$fName." ".$lName.", you have been accepted to UYP! Congratulations! Here is your username and password to log in to the system.\n
  Username: ".$extendedUsername."\nPassword: ".$password;
  $headers = "From: noreply@your-domain.com\n";
  mail($to,$email_subject,$email_body,$headers);


  echo'<br><br><br><br><br><br><br><br><br><br><br><br>
	<center><h3>The student has been accepted. An email has been sent to them informing them of the acceptance, along with 
	their login information.</h3></center>';

  setcookie("acceptStudent", 0, time() + 86400, "/");
} 


else if (isset($_POST['denyButton'])) {
  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $stmt= $connect->prepare("SELECT fName,lName,studentEmail FROM studentApp WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['acceptStudent']);
  $stmt->execute();
  $stmt -> bind_result($fName,$lName,$studentEmail);
  $stmt -> fetch();

    if(empty($studentEmail)){
  		$connect = mysqli_connect("localhost", "root", "", "DB3335"); 
		$stmt= $connect->prepare("SELECT email FROM parent WHERE studentID = ?");
		$stmt->bind_param("s",$_COOKIE['acceptStudent']);
		$stmt->execute();
		$stmt -> bind_result($email);
		$stmt -> fetch();

		if(empty($email)){
			$stmt->fetch();
			$studentEmail = $email;
		}
		else{
			$studentEmail = $email;
		}
  }

  $to = $studentEmail; // PUT YOUR EMAIL ADDRESS HERE
  $email_subject = "UYP Acceptance"; // EDIT THE EMAIL SUBJECT LINE HERE
  $email_body = "Hello ".$fName." ".$lName.", unfortunately you have been denied from UYP.";
  $headers = "From: noreply@your-domain.com\n";
  mail($to,$email_subject,$email_body,$headers);


  $connect = mysqli_connect("localhost", "root", "", "DB3335");
  $stmt = $connect->prepare("UPDATE studentApp SET accepted=2 WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['acceptStudent']);
  $stmt->execute();
  setcookie("acceptStudent", 0, time() + 86400, "/");

  echo'<br><br><br><br><br><br><br><br><br><br><br><br>
	<center><h3>The student has been denied. An email has been sent to them informing them of the denial.</h3></center>';
} 

else{
	echo 'blah';
}

?>


   <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>