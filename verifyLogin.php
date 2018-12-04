<?php
 session_start(); 
 $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
$username = $_POST['Username'];
$password = $_POST['password'];


//Prepares the sql statement which will return the number of rows with the given username and password
$stmt = $connect->prepare("Select COUNT(*), id FROM TEST WHERE username = ? AND password = ?");
$stmt->bind_param("ss",$username, $password);
$stmt->execute();
$stmt->bind_result($nRows,$id);
$stmt->fetch();
$count=$nRows;

if($username == "admin" && $password == "password"){
	setcookie("menubar", 2, time() + 86400, "/");
	setcookie("loginerror", 0, time() + 86400, "/");
	header('Location: adminDash.php');
}

else if($count == 1 ){
	setcookie("id", $id, time() + 86400, "/");
	setcookie("loginerror", 0, time() + 86400, "/");
	setcookie("menubar", 1, time() + 86400, "/");
	header('Location: studentDash.php');
}
else{
	setcookie("loginerror", 1, time() + 86400, "/");
	header('Location: index.php');
}

?>