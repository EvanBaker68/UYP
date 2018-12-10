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
  $required = array('yearAccepted', 'gradeAccepted', 'stat');

  $missingFieldsError = false;
  foreach($required as $field) {
    if (empty($_POST[$field])) {
      $missingFieldsError = true;
    }
  }
  var_dump($missingFieldsError);

  if($missingFieldsError == true){
    setcookie("emptyAdminFields", 1, time() + 86400, "/");
    header('Location: adminSInfo.php');
  }

  $stuID = $POST_['stuID'];
  $stuUser = $POST_['stuUser'];
  $yearAccepted = $_POST['yearAccepted'];
  $gradeAccepted = $_POST['gradeAccepted'];
  $stat = $_POST['stat'];
  $gfund = $_POST['gfund'];
  $grant = $_POST['grant'];
  $ment = $_POST['ment'];
  $mentorName = $_POST['mentorName'];
  $sib1 = $_POST['sib1'];
  $sib1id = $_POST['sib1id'];
  $sib2 = $_POST['sib2'];
  $sib2id = $_POST['sib2id'];
  $sib3 = $_POST['sib3'];
  $sib3id = $_POST['sib3id'];
  $Hnotes = $_POST['Hnotes'];
  $disability = $_POST['disability'];
  $notes504 = $_POST['notes504'];
  $health = $_POST['health'];
  $notesHealth = $_POST['notesHealth'];
  $english = $_POST['english'];
  $gift = $_POST['gift'];
  $nch = $_POST['nch'];
  $clearinghouse = $_POST['clearinghouse'];
  $otherNotes = $_POST['otherNotes'];



  $stmt = $connect->prepare("Select COUNT(*), studentID FROM studentApp WHERE studentID = stuID");
  $stmt->bind_param("s",$stuID);

  $stmt->execute();

  $stmt->bind_result($nRows,$id);
  $stmt->fetch();
  $count=$nRows;

  if($count != 1){
    setcookie("InfoError", 1, time() + 86400, "/");
    header("Location: adminSInfo.php");
  }

  $stmt = $connect->prepare("Update studentAccepted, Set yearAccepted = $yearAccepted, Set startGrade = $gradeAccepted, Set studentstatus = $stat, Set fundingStatus = $gfund, Set mentor = $ment, Set healthNotes = $Hnotes, Set GTProgram = $gift, Set English = $english, Set NatlClearHouse = $clearinghouse, Set grantStatus = $grant, Where studentID = $stuID");

    $stmt->execute();

    $stmt = $connect->prepare("Select COUNT(*), studentID FROM mentor WHERE studentID = ?");
    $stmt->bind_param("s",$stuID);

    $stmt->execute();
    $stmt->bind_result($nRows,$id);
    $stmt->fetch();
    $count=$nRows;

    if($count == 1 && $ment == 0){
      $stmt = $connect->prepare("Update mentor, Set mentorName = ?, Where studentID = ");
      $stmt->bind_param($mentorName, $stuID);
      $stmt->execute();
    }else if($ment == 0){
      $stmt = $connect->prepare("INSERT INTO mentor(studentID, mentorName) VALUES(?,?)");
      $stmt->bind_param("ss", $stuID, $mentorName);
      $stmt->execute();
    }

    $stmt = $connect->prepare("Select COUNT(*), studentID FROM health WHERE studentID = ?");
    $stmt->bind_param("s",$stuID);

    $stmt->execute();
    $stmt->bind_result($nRows,$id);
    $stmt->fetch();
    $count=$nRows;

    if($count == 1 && $healthNotes == 0){
      $stmt = $connect->prepare("Update health, Set disability = ?, Set healthConcern = ?, Set 504notes = ?, Set healthNotes = ?, Where studentID = ?");
      $stmt->bind_param("iisss", $disability, $health, $notes504, $notesHealth, $stuID);

      $stmt->execute();
    }else if($healthNotes == 0){
      $stmt = $connect->prepare("INSERT INTO health(studentID, disability, healthConcern, 504notes, healthNotes) VALUES(?,?,?,?,?)");
      $stmt->bind_param("siiss", $stuID, $disability, $health, $notes504, $notesHealth);

      $stmt->execute();
    }


 // $stmt = $connect->prepare("INSERT INTO TEST(username, password) VALUES(?, ?)");
 // $stmt->bind_param("ss",$name, $password);
 // $stmt->execute();
  header('Location: successfulAdminUpdate.php');

 $connect = null;
 // header('Location: createaccount.php');


?>
</body>
</html>