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
?>

  <form class="form-studentapp" action="verifyEnteredInfo.php" method="post">
    <div class="container my-3 text-center">
      <div class="row justify-content-around">
        <div class="col-10">
          <h1>Student Information</h1>
          <p>* indicates a required field.</p>
          <div class="row">
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder="Student ID*" name="stuID">
            </div>
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder="Student Username*" name="stuUser">
            </div>

            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder="Year Accepted*" name="yearAccepted">
            </div>
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder="Grade Accepted*" name="gradeAccepted">
            </div>
            <div class="form-group col-4">
               <input type="text" class="form-control form-control-lg" placeholder="Status*" name="stat">
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
              <input type="text" class="form-control form-control-lg" name="mentorName" placeholder="Mentor Name">
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
            <input type="text" class="form-control form-control-lg" name="grant" placeholder="Grant Name">
            </div>
          </div>
          <p>If student has sibling(s) in the program please enter sibling ID's:</p>
          <div class="row">
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder="Sibling 1" name="sib1">
            </div>
            <div class="form-group col-4">
              <input type="text" class="form-control form-control-lg" placeholder="Sibling 1 ID" name="sib1id">
            </div>
          </div class="row">
              <div class="row">
                <div class="form-group col-4">
                  <input type="text" class="form-control form-control-lg" placeholder="Sibling 2" name="sib2">
                </div>
                <div class="form-group col-4">
                  <input type="text" class="form-control form-control-lg" placeholder="Sibling 2 ID" name="sib2id">
                </div>
              </div class="row"> 
              <div class="row">
                <div class="form-group col-4">
                  <input type="text" class="form-control form-control-lg" placeholder="Sibling 3" name="sib3">
                </div>
                <div class="form-group col-4">
                  <input type="text" class="form-control form-control-lg" placeholder="Sibling 3 ID" name="sib3id">
                </div>
              </div class="row">
          <div>
             <p>Does student have any health information to be entered?</p>
            <label class="radio-inline"><input type="radio" name="Hnotes" value="0">Yes</label>
            <label class="radio-inline"><input type="radio" name="Hnotes" value="1" checked>No</label>
          </div>
          <div>
             <p>Does student have any disabilities?</p>
            <label class="radio-inline"><input type="radio" name="disability" value="0">Yes</label>
            <label class="radio-inline"><input type="radio" name="disability" value="1" checked>No</label>
          </div>
          <div>
            <div class="form-group">
              <p>If so, please enter 504 notes:</p>
              <input type="text" class="form-control form-control-lg" name="notes504" placeholder="Notes">
            </div>
          </div>
          <div>
             <p>Does student have any health concerns?</p>
            <label class="radio-inline"><input type="radio" name="health" value="0">Yes</label>
            <label class="radio-inline"><input type="radio" name="health" value="1" checked>No</label>
          </div>
          <div>
            <div class="form-group">
              <p>If so, please enter any relevant notes:</p>
              <input type="text" class="form-control form-control-lg" name="notesHealth" placeholder="Notes">
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
              <input type="text" class="form-control form-control-lg" name="clearinghouse" placeholder="Notes">
            </div>
          </div>
          <div>
            <div class="form-group">
              <p>Enter any other notes:</p>
              <input type="text" class="form-control form-control-lg" name="otherNotes" placeholder="Notes">
            </div>
          </div>
          <div>
          <button name="submit" class="btn btn-success btn-block" type="submit">Submit Information</button>
          <?php if (isset($_COOKIE["emptyFields"]) && $_COOKIE["emptyFields"] == 1) 
          echo '<div class="container"><div class="alert alert-danger">Either the entered username or password is incorrect. Please try again.</div></div>';
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