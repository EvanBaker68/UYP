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
  $stuID = $_COOKIE['acceptStudent'];
  $yearAccepted = $_POST['yearAccepted'];
  $gradeAccepted = $_POST['gradeAccepted'];
  $stat = $_POST['stat'];
  $gfund = $_POST['gfund'];
  $grant = $_POST['grant'];
  $ment = $_POST['ment'];
  $mentorName = $_POST['mentorName'];
  $sibling1Name = $_POST['sibling1Name'];
  $sibling1ID = $_POST['sibling1ID'];
  $sibling2Name = $_POST['sibling2Name'];
  $sibling2ID = $_POST['sibling2ID'];
  $sibling3Name = $_POST['sibling3ID'];
  $sibling3ID = $_POST['sibling3ID'];
  $sibling4Name = $_POST['sibling4ID'];
  $sibling4ID = $_POST['sibling4ID'];
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

  var_dump($yearAccepted);

  if(!empty($notes504)){
    $Hnotes = 2;
    $disability = 2;
  }else{
    $disability = 1;
  }

  if(!empty($notesHealth)){
    $Hnotes = 2;
    $health = 2;
  }else{
    $health = 1;
  }

  if($disability == 2 || $health == 2){
    $Hnotes = 2;
  }

  if(!empty($clearinghouse)){
    $nch = 2;
  }


  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $stmt = $connect->prepare("SELECT COUNT(*) FROM studentApp WHERE studentID = ?");
  $stmt->bind_param("s",$stuID);

  $stmt->execute();

  $stmt->bind_result($nRows);
  $stmt->fetch();
  $count=$nRows;
  $stmt->free_result();

  if($count != 1){
    setcookie("InfoError", 1, time() + 86400, "/");
    header("Location: adminSInfo.php");
  }

  if(!empty($studentAccepted)){
    $stmt = $connect->prepare("UPDATE studentAccepted SET yearAccepted=? WHERE studentID =?");
    $stmt->bind_param("is",$yearAccepted,$stuID);
    $stmt->execute();
  }

  var_dump($yearAccepted,$stuID);

  if(!empty($startGrade)){
    $stmt = $connect->prepare("UPDATE studentAccepted SET startGrade =? WHERE studentID =?");
    $stmt->bind_param("is",$gradeAccepted,$stuID);
    $stmt->execute();
  }

  if(!empty($stat)){
    $stmt = $connect->prepare("UPDATE studentAccepted SET status=? WHERE studentID =?");
    $stmt->bind_param("is",$stat,$stuID);
    $stmt->execute();
  }


  if(!empty($ment)){
    $stmt = $connect->prepare("UPDATE studentAccepted SET mentor=? WHERE studentID =?");
    $stmt->bind_param("is",$ment,$stuID);
    $stmt->execute();
  }

  if(!empty($mentorName)){
    $ment=2;
    $stmt = $connect->prepare("SELECT COUNT(*), studentID FROM mentor WHERE studentID = ?");
    $stmt->bind_param("s",$stuID);
    $stmt->execute();
    $stmt->bind_result($nRows,$id);
    $stmt->fetch();
    $count=$nRows;
    $stmt->free_result();

    if($count==1){
      $stmt = $connect->prepare("UPDATE mentor SET mentorName = ? WHERE studentID = ?");
      $stmt->bind_param("ss",$mentorName,$stuID);
      $stmt->execute();
    }else{
      $stmt->prepare("INSERT INTO mentor (studentID, mentorName) VALUES (?,?)");
      $stmt->bind_param("ss",$mentorName,$stuID);
      $stmt->execute();
    }

  }

  if(!empty($Hnotes)){
    $stmt = $connect->prepare("UPDATE studentAccepted SET healthNotes=? WHERE studentID =?");
    $stmt->bind_param("is",$Hnotes,$stuID);
    $stmt->execute();
  }

  if(!empty($gift)){
    $stmt = $connect->prepare("UPDATE studentAccepted SET GTProgram=? WHERE studentID =?");
    $stmt->bind_param("is",$gift,$stuID);
    $stmt->execute();
  }

  if(!empty($english)){
    $stmt = $connect->prepare("UPDATE studentAccepted SET English=? WHERE studentID =?");
    $stmt->bind_param("is",$english,$stuID);
    $stmt->execute();
  }

  if(!empty($clearinghouse)){
    $stmt = $connect->prepare("UPDATE studentAccepted SET NatlClearHouse=? WHERE studentID =?");
    $stmt->bind_param("ss",$clearinghouse,$stuID);
    $stmt->execute();
  }

  if(!empty($otherNotes)){
    $stmt = $connect->prepare("UPDATE studentAccepted SET otherNotes=? WHERE studentID =?");
    $stmt->bind_param("ss",$otherNotes,$stuID);
    $stmt->execute();
  }

  if(!empty($grant)){
    $stmt = $connect->prepare("UPDATE studentAccepted SET grantStatus=? WHERE studentID =?");
    $stmt->bind_param("ss",$grant,$stuID);
    $stmt->execute();
  }

    $stmt = $connect->prepare("SELECT COUNT(*), studentID FROM health WHERE studentID = ?");
    $stmt->bind_param("s",$stuID);

    $stmt->execute();
    $stmt->bind_result($nRows,$id);
    $stmt->fetch();
    $count=$nRows;
    $stmt->free_result();

    if($count == 1 && $Hnotes == 2 && !empty($notes504)){
      $stmt = $connect->prepare("UPDATE health SET disability = ?, 504Notes = ? WHERE studentID = ?");
      $stmt->bind_param("iss", $disability, $notes504, $stuID);

      $stmt->execute();
    }

    if($count == 1 && $Hnotes == 2 && !empty($notesHealth)){
      $stmt = $connect->prepare("UPDATE health SET healthConcern = ?, healthNotes = ? WHERE studentID = ?");
      $stmt->bind_param("iss", $health, $notesHealth, $stuID);

      $stmt->execute();
    }

    if($Hnotes == 2 && $count == 0){
      $stmt = $connect->prepare("INSERT INTO health(studentID, disability, healthConcern, 504Notes, healthNotes) VALUES(?,?,?,?,?)");
      $stmt->bind_param("siiss", $stuID, $disability, $health, $notes504, $notesHealth);
      $stmt->execute();
    }

    if(!empty($sibling1Name)&&!empty($sibling1ID)){
      $stmt = $connect->prepare("SELECT COUNT(*), studentID FROM sibling WHERE studentID = ? AND siblingID = ?");
      $stmt->bind_param("ss",$stuID,$sibling1ID);

      $stmt->execute();
      $stmt->execute();
      $stmt->bind_result($nRows,$id);
      $stmt->fetch();
      $count=$nRows;
      $stmt->free_result();

      if($count == 1){
        $stmt = $connect->prepare("UPDATE sibling SET siblingID = ?, siblingName = ? WHERE studentID = ?");
        $stmt->bind_param("sss", $sibling1ID, $sibling1Name, $stuID);
        $stmt->execute();
      }else{
        $stmt = $connect->prepare("INSERT INTO sibling(studentID, siblingID, siblingName) VALUES(?,?,?)");
        $stmt->bind_param("sss", $stuID, $sibling1ID, $sibling1Name);
        $stmt->execute();
      }
    }

    if(!empty($sibling2Name)&&!empty($sibling2ID)){
      $stmt = $connect->prepare("SELECT COUNT(*), studentID FROM sibling WHERE studentID = ? AND siblingID = ?");
      $stmt->bind_param("ss",$stuID,$sibling2ID);

      $stmt->execute();
      $stmt->execute();
      $stmt->bind_result($nRows,$id);
      $stmt->fetch();
      $count=$nRows;
      $stmt->free_result();

      if($count == 1){
        $stmt = $connect->prepare("UPDATE sibling SET siblingID = ?, siblingName = ? WHERE studentID = ?");
        $stmt->bind_param("sss", $sibling2ID, $sibling2Name, $stuID);
        $stmt->execute();
      }else{
        $stmt = $connect->prepare("INSERT INTO sibling(studentID, siblingID, siblingName) VALUES(?,?,?)");
        $stmt->bind_param("sss", $stuID, $sibling2ID, $sibling2Name);
        $stmt->execute();
      }
    }

    if(!empty($sibling3Name)&&!empty($sibling3ID)){
      $stmt = $connect->prepare("SELECT COUNT(*), studentID FROM sibling WHERE studentID = ? AND siblingID = ?");
      $stmt->bind_param("ss",$stuID,$sibling3ID);

      $stmt->execute();
      $stmt->execute();
      $stmt->bind_result($nRows,$id);
      $stmt->fetch();
      $count=$nRows;
      $stmt->free_result();

      if($count == 1){
        $stmt = $connect->prepare("UPDATE sibling SET siblingID = ?, siblingName = ? WHERE studentID = ?");
        $stmt->bind_param("sss", $sibling3ID, $sibling3Name, $stuID);
        $stmt->execute();
      }else{
        $stmt = $connect->prepare("INSERT INTO sibling(studentID, siblingID, siblingName) VALUES(?,?,?)");
        $stmt->bind_param("sss", $stuID, $sibling3ID, $sibling3Name);
        $stmt->execute();
      }
    }

    if(!empty($sibling4Name)&&!empty($sibling4ID)){
      $stmt = $connect->prepare("SELECT COUNT(*), studentID FROM sibling WHERE studentID = ? AND siblingID = ?");
      $stmt->bind_param("ss",$stuID,$sibling4ID);

      $stmt->execute();
      $stmt->execute();
      $stmt->bind_result($nRows,$id);
      $stmt->fetch();
      $count=$nRows;
      $stmt->free_result();

      if($count == 1){
        $stmt = $connect->prepare("UPDATE sibling SET siblingID = ?, siblingName = ? WHERE studentID = ?");
        $stmt->bind_param("sss", $sibling4ID, $sibling4Name, $stuID);
        $stmt->execute();
      }else{
        $stmt = $connect->prepare("INSERT INTO sibling(studentID, siblingID, siblingName) VALUES(?,?,?)");
        $stmt->bind_param("sss", $sibling4ID, $sibling4Name);
        $stmt->execute();
      }
    }


 // $stmt = $connect->prepare("INSERT INTO TEST(username, password) VALUES(?, ?)");
 // $stmt->bind_param("ss",$name, $password);
 // $stmt->execute();
  //header('Location: successfulAdminUpdate.php');

 $connect = null;
 //header('Location: successfulAdminUpdate.php');


?>
</body>
</html>