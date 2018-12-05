<?php

//Reset any cookies that were previously set
setcookie("menubar", 0, time() + 86400, "/");

	header('Location: index.php');
?>