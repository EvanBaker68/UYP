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
  $stmt -> free_result();

  $stmt= $connect->prepare("SELECT * FROM health WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['IDstudent']);
  $stmt->execute();
  $stmt -> bind_result($studentID,$disability,$health,$notes504,$notesHealth);
  $stmt -> fetch();
  $stmt -> free_result();


  $stmt= $connect->prepare("SELECT * FROM studentApp WHERE studentID = ?");
  $stmt->bind_param("s",$_COOKIE['IDstudent']);
  $stmt->execute();
  $stmt -> bind_result($temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$temp,$sibling1Name,$sibling2Name,$sibling3Name,$sibling4Name,$temp,$temp,$temp,$temp);
  $stmt -> fetch();
  $stmt -> free_result();

  if(!empty($student1Name)){
    $stmt= $connect->prepare("SELECT * FROM sibling WHERE studentID = ? AND siblingName = ?");
    $stmt->bind_param("ss",$_COOKIE['IDstudent'],$sibling1Name);
    $stmt->execute();
    $stmt -> bind_result($temp,$sibling1Name,$sibling1ID);
    $stmt -> fetch();
    $stmt -> free_result();
  }

  if(!empty($student2Name)){
    $stmt= $connect->prepare("SELECT * FROM sibling WHERE studentID = ? AND siblingName = ?");
    $stmt->bind_param("ss",$_COOKIE['IDstudent'],$sibling2Name);
    $stmt->execute();
    $stmt -> bind_result($temp,$sibling3Name,$sibling2ID);
    $stmt -> fetch();
    $stmt -> free_result();
  }

  if(!empty($student3Name)){
    $stmt= $connect->prepare("SELECT * FROM sibling WHERE studentID = ? AND siblingName = ?");
    $stmt->bind_param("ss",$_COOKIE['IDstudent'],$sibling3Name);
    $stmt->execute();
    $stmt -> bind_result($temp,$sibling3Name,$sibling3ID);
    $stmt -> fetch();
    $stmt -> free_result();
  }

  if(!empty($student4Name)){
    $stmt= $connect->prepare("SELECT * FROM sibling WHERE studentID = ? AND siblingName = ?");
    $stmt->bind_param("ss",$_COOKIE['IDstudent'],$sibling4Name);
    $stmt->execute();
    $stmt -> bind_result($temp,$sibling4Name,$sibling4ID);
    $stmt -> fetch();
    $stmt -> free_result();
  }

  if($ment == 2){
    $stmt= $connect->prepare("SELECT * FROM mentor WHERE studentID = ?");
    $stmt->bind_param("s",$_COOKIE['IDstudent']);
    $stmt->execute();
    $stmt -> bind_result($temp,$mentorN);
    $stmt -> fetch();
    $stmt -> free_result();
  }

  if($ment == 1)
    $mentorN = "N/A";
  if(empty($grant))
    $grant = "N/A";
  else
    $gfund=2;
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
  if(empty($clearinghouse)){
    $clearinghouse = "N/A";
    $nch = 1;
  }else{
    $nch = 2;
  }
  if(empty($otherNotes))
      $otherNotes = "N/A";
?>

  <form class="form-studentapp" action="verifyEnteredInfo.php" method="post">
    <div class="container my-3 text-center">
      <div class="row justify-content-around">
        <div class="col-10">
          <h1>Student Information</h1>
          <p><?php echo $stuUser ?></p>
          <div class="row">
            <div class="form-group col-4 pb-10">
                <select class="form-control" id="yearAccepted" name="yearAccepted">
                  <option value="" selected hidden>Year Accepted</option>
                  <option value="2019" <?php if ($yearAccepted==2019) echo 'selected="selected"';?>>2019</option>
                  <option value="2018" <?php if ($yearAccepted==2018) echo 'selected="selected"';?>>2018</option>
                  <option value="2017" <?php if ($yearAccepted==2017) echo 'selected="selected"';?>>2017</option>
                  <option value="2016" <?php if ($yearAccepted==2016) echo 'selected="selected"';?>>2016</option>
                  <option value="2015" <?php if ($yearAccepted==2015) echo 'selected="selected"';?>>2015</option>
                  <option value="2014" <?php if ($yearAccepted==2014) echo 'selected="selected"';?>>2014</option>
                  <option value="2013" <?php if ($yearAccepted==2013) echo 'selected="selected"';?>>2013</option>
                  <option value="2012" <?php if ($yearAccepted==2012) echo 'selected="selected"';?>>2012</option>
                  <option value="2011" <?php if ($yearAccepted==2011) echo 'selected="selected"';?>>2011</option>
                  <option value="2010" <?php if ($yearAccepted==2010) echo 'selected="selected"';?>>2010</option>
                  <option value="2009" <?php if ($yearAccepted==2009) echo 'selected="selected"';?>>2009</option>
                  <option value="2008" <?php if ($yearAccepted==2008) echo 'selected="selected"';?>>2008</option>
                  <option value="2007" <?php if ($yearAccepted==2007) echo 'selected="selected"';?>>2007</option>
                </select>
            </div>
            <div class="form-group col-4 pb-10">
                <select class="form-control" id="gradeAccepted" name="gradeAccepted">
                  <option value="" selected hidden>Grade Accepted</option>
                  <option value="12" <?php if ($gradeAccepted==12) echo 'selected="selected"';?>>12</option>
                  <option value="11" <?php if ($gradeAccepted==11) echo 'selected="selected"';?>>11</option>
                  <option value="10" <?php if ($gradeAccepted==10) echo 'selected="selected"';?>>10</option>
                  <option value="9" <?php if ($gradeAccepted==9) echo 'selected="selected"';?>>9</option>
                  <option value="8" <?php if ($gradeAccepted==8) echo 'selected="selected"';?>>8</option>
                  <option value="7" <?php if ($gradeAccepted==7) echo 'selected="selected"';?>>7</option>
                  <option value="6" <?php if ($gradeAccepted==6) echo 'selected="selected"';?>>6</option>
                  <option value="5" <?php if ($gradeAccepted==5) echo 'selected="selected"';?>>5</option>
                  <option value="4" <?php if ($gradeAccepted==4) echo 'selected="selected"';?>>4</option>
                </select>
            </div>
            <div class="form-group col-4 pb-10">
                <select class="form-control" id="stat" name="stat">
                  <option value="" selected hidden>Status</option>
                  <option value="1" <?php if ($stat==1) echo 'selected="selected"';?>>Active</option>
                  <option value="2" <?php if ($stat==2) echo 'selected="selected"';?>>Inactive</option>
                  <option value="3" <?php if ($stat==3) echo 'selected="selected"';?>>Graduated</option>
                </select>
            </div>
          </div class="row">
          <div>
             <p>Does student have a mentor?</p>
             <?php if ($ment == 2) 
               echo '<label class="radio-inline"><input type="radio" name="ment" value="2" checked>Yes</label><label class="radio-inline"><input type="radio" name="ment" value="1" >No</label>';
              else
                echo '<label class="radio-inline"><input type="radio" name="ment" value="2">Yes</label>
              <label class="radio-inline"><input type="radio" name="ment" value="1" checked>No</label>';
            ?></span>
          </div>
          <div>
            <div class="form-group">
              <p>If so, please enter mentor name:</p>
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Mentor Name: '.$mentorN.'"';?> name="mentorName">
            </div>
          </div>
          <div>
            <p>Is the student grant funded?</p>
            <?php if ($gfund == 2) 
               echo '<label class="radio-inline"><input type="radio" name="gfund" value="2" checked>Yes</label><label class="radio-inline"><input type="radio" name="gfund" value="1" >No</label>';
                else
                  echo '<label class="radio-inline"><input type="radio" name="gfund" value="2">Yes</label>
                  <label class="radio-inline"><input type="radio" name="gfund" value="1" checked>No</label>';
            ?></span>
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
            <p>Does student have any health information to enter?</p>
            <?php if ($Hnotes == 2) 
               echo '<label class="radio-inline"><input type="radio" name="Hnotes" value="2" checked>Yes</label><label class="radio-inline"><input type="radio" name="Hnotes" value="1" >No</label>';
                else
                  echo '<label class="radio-inline"><input type="radio" name="Hnotes" value="2">Yes</label>
                  <label class="radio-inline"><input type="radio" name="Hnotes" value="1" checked>No</label>';
            ?></span>
          <div>
             <p>Does student have any disabilities?</p>
            <?php if ($disability == 2) 
               echo '<label class="radio-inline"><input type="radio" name="disability" value="2" checked>Yes</label><label class="radio-inline"><input type="radio" name="disability" value="1" >No</label>';
                else
                  echo '<label class="radio-inline"><input type="radio" name="disability" value="2">Yes</label>
                  <label class="radio-inline"><input type="radio" name="disability" value="1" checked>No</label>';
            ?></span>
          </div>
          <div>
            <div class="form-group">
              <p>If so, please enter 504 notes:</p>
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Notes: '.$notes504.'"';?> name="notes504">
            </div>
          </div>
          <div>
             <p>Does student have any other health concerns?</p>
            <?php if ($health == 2) 
               echo '<label class="radio-inline"><input type="radio" name="health" value="2" checked>Yes</label><label class="radio-inline"><input type="radio" name="health" value="1" >No</label>';
                else
                  echo '<label class="radio-inline"><input type="radio" name="health" value="2">Yes</label>
                  <label class="radio-inline"><input type="radio" name="health" value="1" checked>No</label>';
            ?></span>
          </div>
          <div>
            <div class="form-group">
              <p>If so, please enter any relevant notes:</p>
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Notes: '.$notesHealth.'"';?> name="notesHealth">
            </div>
          </div>
          <div>
            <p>Is student an English learner?</p>
              <?php if ($english== 2) 
               echo '<label class="radio-inline"><input type="radio" name="english" value="2" checked>Yes</label><label class="radio-inline"><input type="radio" name="english" value="1" >No</label>';
                else
                  echo '<label class="radio-inline"><input type="radio" name="english" value="2">Yes</label>
                  <label class="radio-inline"><input type="radio" name="english" value="1" checked>No</label>';
            ?></span>
          </div>
          <div>
            <p>Is student part of Gifted/Talented program?</p>
              <?php if ($gift == 2) 
               echo '<label class="radio-inline"><input type="radio" name="gift" value="2" checked>Yes</label><label class="radio-inline"><input type="radio" name="gift" value="1" >No</label>';
                else
                  echo '<label class="radio-inline"><input type="radio" name="gift" value="2">Yes</label>
                  <label class="radio-inline"><input type="radio" name="gift" value="1" checked>No</label>';
            ?></span>
          </div>
          <div>
             <p>Does student have National Clearing House Data?</p>
            <?php if ($nch == 2) 
               echo '<label class="radio-inline"><input type="radio" name="nch" value="2" checked>Yes</label><label class="radio-inline"><input type="radio" name="nch" value="1" >No</label>';
                else
                  echo '<label class="radio-inline"><input type="radio" name="nch" value="2">Yes</label>
                  <label class="radio-inline"><input type="radio" name="nch" value="1" checked>No</label>';
            ?></span>
          </div>
          <div>
            <div class="form-group">
              <p>If so, please enter information:</p>
              <input type="text" class="form-control form-control-lg" placeholder=<?php echo'"Notes: '.$clearinghouse.'"';?> name="clearinghouse">
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