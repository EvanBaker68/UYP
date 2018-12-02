<?php

if(!isset($_COOKIE["menubar"])){
	echo "<h>Your session has expired, please refresh the page<h>";
}
else{
	if($_COOKIE["menubar"] == 0){
		include 'signInMenuBar.php';
	}
	if($_COOKIE["menubar"] == 1){
		include 'studentMenuBar.php';
	}
	if($_COOKIE["menubar"] == 2){
		include 'adminMenuBar.php';
	}
}


?>