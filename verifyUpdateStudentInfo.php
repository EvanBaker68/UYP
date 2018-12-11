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
</head>
<body>

<?php

 session_start(); 
 $connect = mysqli_connect("localhost", "root", "", "DB3335");

$stuID=$_COOKIE['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$nickname = $_POST['nickname'];
$studentAddress = $_POST['studentAddress'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$schoolName = $_POST['schoolName'];
$parent1name = $_POST['parent1name'];
$parent1email = $_POST['parent1email'];
$parent1address = $_POST['parent1address'];
$MI = $_POST['MI'];
$suffix = $_POST['suffix'];
$race = $_POST['race'];
$schoolType = $_POST['schoolType'];
$schoolDistrict = $_POST['schoolDistrict'];
$upcomingGrade = $_POST['upcomingGrade'];
$expectedGradYear = $_POST['expectedGradYear'];
$expectedHighSchool = $_POST['expectedHighSchool'];
$studentEmail = $_POST['studentEmail'];
$studentPhone = $_POST['studentPhone'];
$sibling = $_POST['sibling'];
$sibling1 = $_POST['sibling1'];
$sibling2 = $_POST['sibling2'];
$sibling3 = $_POST['sibling3'];
$sibling4 = $_POST['sibling4'];
$GT = $_POST['GT'];
$parent1name = $_POST['parent1name'];
$parent1address = $_POST['parent1address'];
$parent1city = $_POST['parent1city'];
$parent1zip = $_POST['parent1zip'];
$parent1state = $_POST['p1state'];
$parent1email = $_POST['parent1email'];
$parent1Cell = $_POST['parent1Cell'];
$parent1Work = $_POST['parent1Work'];
$parent1Home = $_POST['parent1Home'];
////////////////////////////////////////////////////////////////////////////////////////
$accepted = 0;
$parent2name = $_POST['parent2name'];
$parent2address = $_POST['parent2address'];
$parent2city = $_POST['parent2city'];
$parent2zip = $_POST['parent2zip'];
$parent2state = $_POST['p2state'];
$parent2email = $_POST['parent2email'];
$parent2Cell = $_POST['parent2Cell'];
$parent2Work = $_POST['parent2Work'];
$parent2Home = $_POST['parent2Home'];
$parent1ID = $_COOKIE['parentID1'];
$parent2ID = $_COOKIE['parentID2'];

if(!empty($sibling1) || !empty($sibling2) || !empty($sibling3) || !empty($sibling4)){
  $hasSibling = 0;
}

$dateChecker = "/[0-9]{4}-[0-9]{2}-[0-9]{2}/";
$emailChecker = "/[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+/";

if(!preg_match($dateChecker, $birthday)){
    setcookie("invalidBirthday", 1, time() + 86400, "/");
    $error = true;
}
else{
    setcookie("invalidBirthday", 0, time() + 86400, "/");
}

if(!preg_match($emailChecker, $parent1email)){
    setcookie("invalidEmail", 1, time() + 86400, "/");
    $error = true;
}
else{
    setcookie("invalidEmail", 0, time() + 86400, "/");
}

if($error == true){
    // header('Location: studentApp.php');
}


$id = substr(md5(microtime()),rand(0,26),6);
var_dump($id);

if(!empty($fname)){
  $stmt = $connect->prepare("UPDATE studentApp SET fName = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$fname,$stuID);
  $stmt->execute();

}

if(!empty($lname)){
  $stmt = $connect->prepare("UPDATE studentApp SET lName = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$lname,$stuID);
  $stmt->execute();

}

if(!empty($MI)){
  $stmt = $connect->prepare("UPDATE studentApp SET middleInitial = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$MI,$stuID);
  $stmt->execute();

}

if(!empty($suffix)){
  $stmt = $connect->prepare("UPDATE studentApp SET suffix = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$suffix,$stuID);
  $stmt->execute();

}

if(!empty($nickname)){
  $stmt = $connect->prepare("UPDATE studentApp SET nickname = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$nickname,$stuID);
  $stmt->execute();

}

if(!empty($studentAddress)){
  $stmt = $connect->prepare("UPDATE studentApp SET address = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$studentAddress,$stuID);
  $stmt->execute();

}

if(!empty($state)){
  $stmt = $connect->prepare("UPDATE studentApp SET state = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$state,$stuID);
  $stmt->execute();
}

if(!empty($city)){
  $stmt = $connect->prepare("UPDATE studentApp SET city = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$city,$stuID);
  $stmt->execute();
}

if(!empty($zip)){
  $stmt = $connect->prepare("UPDATE studentApp SET zip = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$zip,$stuID);
  $stmt->execute();
}

if(!empty($birthday)){
  $stmt = $connect->prepare("UPDATE studentApp SET birthday = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$birthday,$stuID);
  $stmt->execute();
}

if(!empty($gender)){
  $stmt = $connect->prepare("UPDATE studentApp SET gender = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$gender,$stuID);
  $stmt->execute();

}

if(!empty($race)){
  $stmt = $connect->prepare("UPDATE studentApp SET race = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$race,$stuID);
  $stmt->execute();
}

if(!empty($schoolType)){
  $stmt = $connect->prepare("UPDATE studentApp SET typeOfSchool = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$schoolType,$stuID);
  $stmt->execute();

}

if(!empty($schoolName)){
  $stmt = $connect->prepare("UPDATE studentApp SET schoolName = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$schoolName,$stuID);
  $stmt->execute();

}

if(!empty($schoolDistrict)){
  $stmt = $connect->prepare("UPDATE studentApp SET schoolDistrict = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$schoolDistrict,$stuID);
  $stmt->execute();

}

if(!empty($upcomingGrade)){
  $stmt = $connect->prepare("UPDATE studentApp SET upcomingGrade = ? WHERE studentID = ?");
  $stmt->bind_param("is",$upcomingGrade,$stuID);
  $stmt->execute();

}

if(!empty($expectedGradYear)){
  $stmt = $connect->prepare("UPDATE studentApp SET expectedGradYear = ? WHERE studentID = ?");
  $stmt->bind_param("is",$expectedGradYear,$stuID);
  $stmt->execute();
}

if(!empty($expectedHighSchool)){
  $stmt = $connect->prepare("UPDATE studentApp SET expectedHighSchool = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$expectedHighSchool,$stuID);
  $stmt->execute();

}

if(!empty($studentEmail)){
  $stmt = $connect->prepare("UPDATE studentApp SET studentEmail = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$studentEmail,$stuID);
  $stmt->execute();

}

if(!empty($studentPhone)){
  $stmt = $connect->prepare("UPDATE studentApp SET studentPhone = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$studentPhone,$stuID);
  $stmt->execute();
}

if(!empty($sibling)){
  $stmt = $connect->prepare("UPDATE studentApp SET hasSibling = ? WHERE studentID = ?");
  $stmt->bind_param("is",$sibling,$stuID);
  $stmt->execute();

}

if(!empty($accepted)){
  $stmt = $connect->prepare("UPDATE studentApp SET accepted = ? WHERE studentID = ?");
  $stmt->bind_param("is",$accepted,$stuID);
  $stmt->execute();

}

if(!empty($GT)){
  $stmt = $connect->prepare("UPDATE studentApp SET GTProgramStatus = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$GT,$stuID);
  $stmt->execute();

}

if(!empty($sibling1)){
  $stmt = $connect->prepare("UPDATE studentApp SET sibling1Name = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$sibling1,$stuID);
  $stmt->execute();

}

if(!empty($sibling2)){
  $stmt = $connect->prepare("UPDATE studentApp SET sibling2Name = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$sibling2,$stuID);
  $stmt->execute();

}

if(!empty($sibling3)){
  $stmt = $connect->prepare("UPDATE studentApp SET sibling3Name = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$sibling3,$stuID);
  $stmt->execute();

}

if(!empty($sibling4)){
  $stmt = $connect->prepare("UPDATE studentApp SET sibling4Name = ? WHERE studentID = ?");
  $stmt->bind_param("ss",$sibling4,$stuID);
  $stmt->execute();

}


////Parent 1 info
 

if(!empty($parent1name)){
  $stmt = $connect->prepare("UPDATE parent SET parentName = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent1name,$stuID,$parent1ID);
  $stmt->execute();

}

if(!empty($parent1address)){
  $stmt = $connect->prepare("UPDATE parent SET address = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent1address,$stuID,$parent1ID);
  $stmt->execute();

}

if(!empty($parent1city)){
  $stmt = $connect->prepare("UPDATE parent SET city = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent1city,$stuID,$parent1ID);
  $stmt->execute();

}

if(!empty($parent1state)){
  $stmt = $connect->prepare("UPDATE parent SET state = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent1state,$stuID,$parent1ID);
  $stmt->execute();

}

if(!empty($parent1zip)){
  $stmt = $connect->prepare("UPDATE parent SET zip = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent1zip,$stuID,$parent1ID);
  $stmt->execute();

}

if(!empty($parent1email)){
  $stmt = $connect->prepare("UPDATE parent SET email = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent1email,$stuID,$parent1ID);
  $stmt->execute();

}

if(!empty($parentCell)){
  $stmt = $connect->prepare("UPDATE parent SET cellPhone = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent1Cell,$stuID,$parent1ID);
  $stmt->execute();

}

if(!empty($parent1Home)){
  $stmt = $connect->prepare("UPDATE parent SET homePhone = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent1Home,$stuID,$parent1ID);
  $stmt->execute();

}

if(!empty($parent1Work)){
  $stmt = $connect->prepare("UPDATE parent SET workPhone = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent1Work,$stuID,$parent1ID);
  $stmt->execute();

}


////Parent 2 info
if(!empty($parent2name)){
  $stmt = $connect->prepare("UPDATE parent SET parentName = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent2name,$stuID,$parent2ID);
  $stmt->execute();

}

if(!empty($parent2address)){
  $stmt = $connect->prepare("UPDATE parent SET address = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent2address,$stuID,$parent2ID);
  $stmt->execute();

}

if(!empty($parent2city)){
  $stmt = $connect->prepare("UPDATE parent SET city = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent2city,$stuID,$parent2ID);
  $stmt->execute();

}

if(!empty($parent2state)){
  $stmt = $connect->prepare("UPDATE parent SET state = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent2state,$stuID,$parent2ID);
  $stmt->execute();

}

if(!empty($parent2zip)){
  $stmt = $connect->prepare("UPDATE parent SET zip = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent2zip,$stuID,$parent2ID);
  $stmt->execute();

}

if(!empty($parent2email)){
  $stmt = $connect->prepare("UPDATE parent SET email = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent2email,$stuID,$parent2ID);
  $stmt->execute();

}

if(!empty($parentCell)){
  $stmt = $connect->prepare("UPDATE parent SET cellPhone = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent2Cell,$stuID,$parent2ID);
  $stmt->execute();

}

if(!empty($parent2Home)){
  $stmt = $connect->prepare("UPDATE parent SET homePhone = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent2Home,$stuID,$parent2ID);
  $stmt->execute();

}

if(!empty($parent2Work)){
  $stmt = $connect->prepare("UPDATE parent SET workPhone = ? WHERE studentID = ? AND parentID = ?");
  $stmt->bind_param("ss",$parent2Work,$stuID,$parent2ID);
  $stmt->execute();

}


//Verify that other information is correct

  header('Location: successfulUpdate.php');

 // $stmt = $connect->prepare("INSERT INTO TEST(username, password) VALUES(?, ?)");
 // $stmt->bind_param("ss",$name, $password);
 // $stmt->execute();

 $connect = null;
 // header('Location: createaccount.php');

?>

</body>
</html>
