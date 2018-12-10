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
setcookie("menubar", 2, time() + 86400, "/");
include 'menubar.php'; 
  
  $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
  $stmt= $connect->prepare("SELECT * FROM studentAccepted WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['IDstudent']);
  $stmt->execute();
  $stmt -> bind_result($studentID,$stuUser,$gradeAccepted,$stat,$gfund,$ment,$Hnotes,$gift,$english,$clearinghouse,$otherNotes,$grant,$yearAccepted);
  $stmt -> fetch();

  $stmt= $connect->prepare("SELECT * FROM health WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['IDstudent']);
  $stmt->execute();
  $stmt -> bind_result($stuID,$disability,$health,$notes504,$notesHealth);
  $stmt -> fetch();

  $stmt= $connect->prepare("SELECT * FROM studentApp WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['IDstudent']);
  $stmt->execute();
  $stmt -> bind_result($temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$hasSibling,$temp,$temp,$sibling1Name,$sibling2Name,$sibling3Name,$sibling4Name);
  $stmt -> fetch();

  if(!empty($student1Name)){
    $stmt= $connect->prepare("SELECT * FROM sibling WHERE studentID = ? AND siblingName = ?");
    $stmt->bind_param("ss",$_COOKIE['IDstudent'],$sibling1Name);
    $stmt->execute();
    $stmt -> bind_result($temp,$sibling1Name,$sibling1ID);
    $stmt -> fetch();
  }

  if(!empty($student2Name)){
    $stmt= $connect->prepare("SELECT * FROM sibling WHERE studentID = ? AND siblingName = ?");
    $stmt->bind_param("ss",$_COOKIE['IDstudent'],$sibling2Name);
    $stmt->execute();
    $stmt -> bind_result($temp,$sibling3Name,$sibling2ID);
    $stmt -> fetch();
  }

  if(!empty($student3Name)){
    $stmt= $connect->prepare("SELECT * FROM sibling WHERE studentID = ? AND siblingName = ?");
    $stmt->bind_param("ss",$_COOKIE['IDstudent'],$sibling3Name);
    $stmt->execute();
    $stmt -> bind_result($temp,$sibling3Name,$sibling3ID);
    $stmt -> fetch();
  }

  if(!empty($student4Name)){
    $stmt= $connect->prepare("SELECT * FROM sibling WHERE studentID = ? AND siblingName = ?");
    $stmt->bind_param("ss",$_COOKIE['IDstudent'],$sibling4Name);
    $stmt->execute();
    $stmt -> bind_result($temp,$sibling4Name,$sibling4ID);
    $stmt -> fetch();
  }

  if($ment == 0){
    $stmt= $connect->prepare("SELECT * FROM mentor WHERE studentID = ?");
    $stmt->bind_param("s",$_COOKIE['IDstudent']);
    $stmt->execute();
    $stmt -> bind_result($temp,$mentorName);
    $stmt -> fetch();
  }

  if(empty($mentorName))
    $mentorName = "N/A";
    if(empty($grant))
    $grant = "N/A";
    if($disability == 1)
    $notes504 = "N/A";
    if($health == 1)
    $notesHealth = "N/A";
    if(empty($otherNotes))
    $otherNotes = "N/A";
    if(empty($siblingt1Name)){
      $sibling1Name = "N/A";
      $sibling1ID = "N/A";
    }
    if(empty($siblingt2Name)){
      $sibling2Name = "N/A";
      $sibling2ID = "N/A";
    }
    if(empty($siblingt3Name)){
      $sibling3Name = "N/A";
      $sibling3ID = "N/A";
    }
    if(empty($siblingt4Name)){
      $sibling4Name = "N/A";
      $sibling4ID = "N/A";
    }
    if(empty($notes504))
      $notes504 = "N/A";
    if(empty($notesHealth))
      $notesHealth = "N/A";
    if(empty($nch))
      $nch = "N/A";
    if(empty($otherNotes))
      $otherNotes = "N/A";
?>

  <form class="form-studentapp" action="verifyEnteredInfo.php" method="post">
    <div class="container my-3 text-center">
      <div class="row justify-content-around">
        <div class="col-10">
          <h1>Student Information</h1>
          <p>* indicates a required field.</p>
          <div class="row">
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Username*: '.$stuUser.'"';?> name="stuUser">
            </div>

            <div class="form-group col-4 pb-10">
                <select class="form-control" id="yearAccepted" name="yearAccepted">
                  <option value="" selected hidden>Year Accepted*</option>
                  <option value="2019">2019</option>
                  <option value="2018">2018</option>
                  <option value="2017">2017</option>
                  <option value="2016">2016</option>
                  <option value="2015">2015</option>
                  <option value="2014">2014</option>
                  <option value="2013">2013</option>
                  <option value="2012">2012</option>
                  <option value="2011">2011</option>
                  <option value="2010">2010</option>
                  <option value="2009">2009</option>
                  <option value="2008">2008</option>
                  <option value="2007">2007</option>
                </select>
            </div>
            <div class="form-group col-4 pb-10">
                <select class="form-control" id="gradeAccepted" name="yearAccepted">
                  <option value="" selected hidden>Grade Accepted*</option>
                  <option value="12">12</option>
                  <option value="11">11</option>
                  <option value="10">10</option>
                  <option value="9">9</option>
                  <option value="8">8</option>
                  <option value="7">7</option>
                  <option value="6">6</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                </select>
            </div>
            <div class="form-group col-4 pb-10">
                <select class="form-control" id="stat" name="stat">
                  <option value="" selected hidden>Status*</option>
                  <option value="Active">1</option>
                  <option value="Inactive">0</option>
                  <option value="Graduated">2</option>
                </select>
            </div>
          </div class="row">
          <div>
             <p>Does student have a mentor?</p>
            <label class="radio-inline"><input type="radio" name="ment" value="0">Yes</label>
            <label class="radio-inline"><input type="radio" name="ment" value="1" checked>No</label>
          </div>
          <div>
            <div class="form-group">
              <p>If so, please enter mentor name:</p>
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Mentor Name: '.$mentorName.'"';?> name="mentorName">
            </div>
          </div>
          <div>
            <p>Is the student grant funded?</p>
            <label class="radio-inline"><input type="radio" name="gfund" value="0">Yes</label>
            <label class="radio-inline"><input type="radio" name="gfund" value="1" checked>No</label>
          </div>
          <div>
            <div class="form-group">
            <p>If so, please enter the grant name:</p>
            <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Grant Name: '.$grant.'"';?> name="grant">
            </div>
          </div>
          <p>If student has sibling(s) in the program please enter sibling ID's:</p>
          <div class="row">
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Sibling 1: '.$sibling1Name.'"';?> name="sibling1Name">
            </div>
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Sibling 1 ID: '.$sibling1ID.'"';?> name="sibling1ID">
            </div>
          </div class="row">
          <div class="row">
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Sibling 2: '.$sibling2Name.'"';?> name="sibling2Name">
            </div>
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Sibling 2 ID: '.$sibling2ID.'"';?> name="sibling2ID">
            </div>
          </div class="row">
          <div class="row">
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Sibling 3: '.$sibling3Name.'"';?> name="sibling3Name">
            </div>
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Sibling 3 ID: '.$sibling3ID.'"';?> name="sibling3ID">
            </div>
          </div class="row">
          <div class="row">
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Sibling 4: '.$sibling4Name.'"';?> name="sibling4Name">
            </div>
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Sibling 4 ID: '.$sibling4ID.'"';?> name="sibling4ID">
            </div>
          </div class="row">
          <div>
             <p>Does student have any health information to be entered?</p>
            <label class="radio-inline"><input type="radio" name="Hnotes" value="0">Yes</label>
            <label class="radio-inline"><input type="radio" name="Hnotes" value="1" checked>No</label>
          </div>
          <div>
             <p>If so, does student have any disabilities?</p>
            <label class="radio-inline"><input type="radio" name="disability" value="0">Yes</label>
            <label class="radio-inline"><input type="radio" name="disability" value="1" checked>No</label>
          </div>
          <div>
            <div class="form-group">
              <p>If so, please enter 504 notes:</p>
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Notes: '.$notes504.'"';?> name="notes504">
            </div>
          </div>
          <div>
             <p>Does student have any other health concerns?</p>
            <label class="radio-inline"><input type="radio" name="health" value="0">Yes</label>
            <label class="radio-inline"><input type="radio" name="health" value="1" checked>No</label>
          </div>
          <div>
            <div class="form-group">
              <p>If so, please enter any relevant notes:</p>
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Notes: '.$notesHealth.'"';?> name="notesHealth">
            </div>
          </div>
          <div>
            <p>Is student an English learner?</p>
              <label class="radio-inline"><input type="radio" name="english" value="0">Yes</label>
              <label class="radio-inline"><input type="radio" name="english" value="1" checked>No</label>
          </div>
          <div>
            <p>Is student part of Gifted/Talented program?</p>
              <label class="radio-inline"><input type="radio" name="gift" value="0">Yes</label>
              <label class="radio-inline"><input type="radio" name="gift" value="1" checked>No</label>
          </div>
          <div>
             <p>Does student have National Clearing House Data?</p>
            <label class="radio-inline"><input type="radio" name="nch" value="0">Yes</label>
            <label class="radio-inline"><input type="radio" name="nch" value="1" checked>No</label>
          </div>
          <div>
            <div class="form-group">
              <p>If so, please enter information:</p>
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Notes: '.$nch.'"';?> name="nch">
            </div>
          </div>
          <div>
            <div class="form-group">
              <p>Enter any other notes:</p>
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Notes: '.$otherNotes.'"';?> name="otherNotes">
            </div>
          </div>
          <div>
          <button name="submit" class="btn btn-success btn-block" type="submit">Submit Information</button>
          <?php if (isset($_COOKIE["emptyAdminFields"]) && $_COOKIE["emptyAdminFields"] == 1) 
          echo '<div class="container"><div class="alert alert-danger">Some required fields are empty.</div></div>';
          ?></span>
          <!-- <input type="submit" value="Submit Application" class="btn btn-outline-secondary btn-block"> -->
        </div>
      </div>
    </div>
  </form>

    <!-- <footer id="main-footer" class="text-center p-2 fixed-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <p>Copyright 2018 &copy; University For Young People</p>
          </div>
        </div>
      </div>
    </footer> -->

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