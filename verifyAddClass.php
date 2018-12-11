<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>UYP</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <title>UYP</title>
</head>
<body>

<?php 



 session_start(); 
 $required = array('courseName', 'cap', 'CRN', 'session', 'level', 'classRoom', 'year', 'instructorName',
 'cost', 'timeSlot',);


$error = false;
$missingFieldsError = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $missingFieldsError = true;
  }
}


if($missingFieldsError == true){
  setcookie("emptyFields", 1, time() + 86400, "/");
  $error = true;
}
else{
  setcookie("emptyFields", 0, time() + 86400, "/");
}

$courseName = $_POST['courseName'];
$cap = $_POST['cap'];
$CRN = $_POST['CRN'];
$cost = $_POST['cost'];
$level = $_POST['level'];
$timeSlot = $_POST['timeSlot'];
$session = $_POST['session'];
$classRoom = $_POST['classRoom'];
$year = $_POST['year'];
$instructorName = $_POST['instructorName'];
// var_dump($cost);
// var_dump($CRN);
// var_dump($cap);

$intChecker = "/[0-9]+/";
$CRNChecker = "/^[a-zA-Z0-9]{6}$/";

 $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
 $stmt = $connect->prepare("SELECT COUNT(*) FROM class WHERE session = ? AND level = ? AND className = ?");

 $stmt->bind_param("sss",$session,$level,$courseName);
 $stmt->execute();
 $stmt -> bind_result($numSameClasses);
 $stmt -> fetch();

if($numSameClasses > 0){
    setcookie("sameClass", 1, time() + 86400, "/");
    $error = true;
}else{
    setcookie("sameClass", 0, time() + 86400, "/");
}

if(!preg_match($intChecker, $cap)){
    setcookie("invalidCap", 1, time() + 86400, "/");
    $error = true;
}
else{
    setcookie("invalidCap", 0, time() + 86400, "/");
}

if(!preg_match($intChecker, $cost)){
    setcookie("invalidCost", 1, time() + 86400, "/");
    $error = true;
}
else{
    setcookie("invalidCost", 0, time() + 86400, "/");
}

if(!preg_match($CRNChecker, $CRN)){
    setcookie("invalidCRN", 1, time() + 86400, "/");
    $error = true;
    // echo '<p>incorrect</p>';
}
else{
	// var_dump($CRN);
	// echo '<p>correct</p>';
    setcookie("invalidCRN", 0, time() + 86400, "/");
}

if($error == true){
    header('Location: addClassInfo.php');
}
else{

// var_dump($CRN,$session,$level,$courseName,$timeSlot,$classRoom,$instructorName,$year,$cost,$cap);
 $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
 $stmt = $connect->prepare("INSERT INTO class(CRN, session, level, className, timeSlot, room, instructor,
 year,cost,capacity,remainingSpots) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

 $stmt->bind_param("ssisissiiii",$CRN,$session,$level,$courseName,$timeSlot,$classRoom,$instructorName,$year,$cost,$cap,$cap);
 $stmt->execute();


 header('Location: successfulClassAdd.php');
 setcookie("invalidCRN", 0, time() + 86400, "/");
     setcookie("invalidCap", 0, time() + 86400, "/");
    setcookie("sameClass", 0, time() + 86400, "/");
    setcookie("invalidCost", 0, time() + 86400, "/");
  setcookie("emptyFields", 0, time() + 86400, "/");




 $connect = null;
}





?>







    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>