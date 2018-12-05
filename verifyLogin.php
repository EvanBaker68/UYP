<?php
 session_start(); 

 //Connecting to mysql
$connect = mysqli_connect("localhost", "root", "", "DB3335"); 
//Getting the "Username" and "password" from the form that was sent to this file. So in this case, 
//index.php
$username = $_POST['Username'];
$password = $_POST['password'];


//Prepares the sql statement which will return the number of rows, as well as the id associated with the given username and password
$stmt = $connect->prepare("Select COUNT(*), id FROM TEST WHERE username = ? AND password = ?");
$stmt->bind_param("ss",$username, $password);
//Executes the query
$stmt->execute();
//Binds the count(*) to $nRows, and the id to $id
$stmt->bind_result($nRows,$id);
$stmt->fetch();
$count=$nRows;

//Checks for hardcoded admin username and password
if($username == "admin" && $password == "password"){
	//This is how you set a cookie. Cookies can be used from anywhere in the project,
	//so if you need a value to be set then accessed from another file, cookies are a good option
	setcookie("menubar", 2, time() + 86400, "/");
	setcookie("loginerror", 0, time() + 86400, "/");
	header('Location: adminDash.php');
}

//Otherwise, if the $count is 1, that means that the given username and password is in the database
else if($count == 1 ){
	setcookie("id", $id, time() + 86400, "/");
	setcookie("loginerror", 0, time() + 86400, "/");
	setcookie("menubar", 1, time() + 86400, "/");
	// header() denotes a link
	header('Location: studentDash.php');
}
else{
	setcookie("loginerror", 1, time() + 86400, "/");
	header('Location: index.php');
}

?>