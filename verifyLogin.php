<?php

$username = $_POST['Username'];
$password = $_POST['password'];


//Prepares the sql statement which will return the number of rows with the given username and password
$stmt= $connect->prepare("Select COUNT(*), id FROM TEST WHERE username = ? AND password = ");
$stmt-> bind_param("ss",$username, $password);
$stmt->execute();
$stmt->bind_result($nRows,$id);
$stmt->fetch();
$count=$nRows;

if($count == 1 ){
	setcookie("id", $id, time() + 86400, "/");
}
else{
	setcookie("loginerror", 1, time() + 86400, "/");
}

?>