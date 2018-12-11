<?php

//Reset any cookies that were previously set
setcookie("menubar", 0, time() + 86400, "/");
setcookie("id", 0, time() + 86400, "/");
setcookie("acceptStudent", 0, time() + 86400, "/");
setcookie("invalidBirthday", 0, time() + 86400, "/");
setcookie("invalidEmail", 0, time() + 86400, "/");
setcookie("acceptStudent", 0, time() + 86400, "/");
setcookie("loginerror", 0, time() + 86400, "/");
setcookie("incorrectInput", 0, time() + 86400, "/");
setcookie("emptyFields", 0, time() + 86400, "/");
setcookie("noSpotsRemaining", 0, time() + 86400, "/");
setcookie("sameTimeSlot", 0, time() + 86400, "/");
setcookie("sameClassSameYear", 0, time() + 86400, "/");
 setcookie("invalidCRN", 0, time() + 86400, "/");
     setcookie("invalidCap", 0, time() + 86400, "/");
    setcookie("sameClass", 0, time() + 86400, "/");
    setcookie("invalidCost", 0, time() + 86400, "/");
  setcookie("emptyFields", 0, time() + 86400, "/");

	header('Location: index.php');
?>