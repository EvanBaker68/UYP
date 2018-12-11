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
include 'menubar.php'; 
?>

  <form class="form-studentapp" action="verifyAddClass.php" method="post">
    <div class="container my-3 text-center">
      <div class="row justify-content-around">
        <div class="col-10">
          <h1>New Class</h1>
          <p>Fill out this form to add a class section</p>
          <p>An asterisk (*) indicates a required field.</p>
          <?php if (isset($_COOKIE["emptyFields"]) && $_COOKIE["emptyFields"] == 1) 
          echo '<div class="container"><div class="alert alert-danger">One or more required fields is missing.</div></div>';
                if (isset($_COOKIE["invalidCap"]) && $_COOKIE["invalidCap"] == 1) 
          echo '<div class="container"><div class="alert alert-danger">Please enter a valid capacity.</div></div>';
                if (isset($_COOKIE["invalidCost"]) && $_COOKIE["invalidCost"] == 1) 
          echo '<div class="container"><div class="alert alert-danger">Please enter a valid cost.</div></div>';
                if (isset($_COOKIE["invalidCRN"]) && $_COOKIE["invalidCRN"] == 1) 
          echo '<div class="container"><div class="alert alert-danger">Please enter a valid CRN.</div></div>';
                if (isset($_COOKIE["sameClass"]) && $_COOKIE["sameClass"] == 1) 
          echo '<div class="container"><div class="alert alert-danger">This class has already been created.</div></div>';
          ?>
            <div class="form-row">
              <div class="col-sm">
                  <div class="form-group col-sm">
                    <input type="text" class="form-control form-control-lg" placeholder="Course Name*" name="courseName">
                  </div>
                  <div class="form-group col-sm">
                    <input type="text" class="form-control form-control-lg" placeholder="CRN*" name="CRN">
                  </div>
                  <div class="form-group col-sm">
                
                  <input type="text" class="form-control form-control-lg" placeholder="Instructor Name*" name="instructorName">
                </div>
              </div>
          </div>
          
          <div class="row">
              <div class="col-8">
                
              <div class="form-group col-4">
              <div>
                <select class="form-control form-control-lg" id="session" name="session">
                  <option value="" selected hidden>Session*</option>
                  <option value="1">Session 1</option>
                  <option value="2">Session 2</option>
                  <option value="3">Session 3</option>
                </select>
              </div>
            </div>
              <div class="form-group col-4">
                 <input type="text" class="form-control form-control-lg" placeholder="Room*" name="classRoom">
              </div>
              <div class="form-group col-4">  
                    <input type="text" class="form-control form-control-lg" placeholder="Capacity*" name="cap">
                </div>
          </div>
        </div>
                     
    <div class="form-row">
              <div class="col-4 form-group">
                <select class="form-control form-control-lg" id="year" name="year">
                  <option value="" selected hidden>Year*</option>
                  <?php 
                  $year = date("Y");
                  for ($x = 0; $x < 30; $x++) {

                    echo '<option value="'.($year + $x).'">'.($year + $x).'</option>';
                    }
                  ?>
                  </select>
              </div>
              <div class="col-4 form-group">
                <select class="form-control form-control-lg" id="timeSlot" name="timeSlot">
                  <option value="" selected hidden>Time Slot*</option>
                  <option value="1">9:45</option>
                  <option value="2">1:15</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col-4 form-group">
                <select class="form-control form-control-lg" id="level" name="level">
                  <option value="" selected hidden>Level*</option>
                  <option value="1">4th-5th grade</option>
                  <option value="2">6th-8th grade</option>
                  <option value="3">9th-12th grade</option>
                </select>
              </div>
              <div>
                <input type="text" class="form-control form-control-lg" placeholder="Price*" name="cost">
              </div>
            </div>          
        
                                  
          <button name="submit" class="btn btn-success btn-block" type="submit">Enter Class</button>
          <!-- <input type="submit" value="Enter Class" class="btn btn-outline-secondary btn-block"> -->
        
        </div>
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
