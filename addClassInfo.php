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
setcookie("menubar", 0, time() + 86400, "/");
include 'menubar.php'; 
?>

  <form class="form-studentapp" action="verifyAddClass.php" method="post">
    <div class="container my-3 text-center">
      <div class="row justify-content-around">
        <div class="col-10">
          <h1>New Class</h1>
          <p>Fill out this form to add a class section</p>
          <p>All required fields are indicated with an *</p>
          <?php if (isset($_COOKIE["emptyFields"]) && $_COOKIE["emptyFields"] == 1) 
          echo '<div class="container"><div class="alert alert-danger">One or more required fields is missing.</div></div>';
                if (isset($_COOKIE["invalidCap"]) && $_COOKIE["invalidCap"] == 1) 
          echo '<div class="container"><div class="alert alert-danger">Please enter a valid capacity.</div></div>';
                if (isset($_COOKIE["invalidCost"]) && $_COOKIE["invalidCost"] == 1) 
          echo '<div class="container"><div class="alert alert-danger">Please enter a valid cost.</div></div>';
                if (isset($_COOKIE["invalidCRN"]) && $_COOKIE["invalidCRN"] == 1) 
          echo '<div class="container"><div class="alert alert-danger">Please enter a valid CRN.</div></div>';
          ?>
            <div class="row">
              <div class="col-sm">
                  <div class="form-group">
     
                    <input type="text" class="form-control form-control-lg" placeholder="Course Name*" name="courseName">
                  </div>
              </div>
           <div class="form-group">
                 <input type="text" class="form-control form-control-lg" placeholder="Class Capacity*" name="cap">
              </div>
         </div>
   <div class="row">
    <div class="form-group-2">    
                    <input type="text" class="form-control form-control-lg" placeholder="CRN*" name="CRN">
                </div>

   <div class="row">
    <div>
              <p>Time Slot*</p>
            <label class="radio-inline"><input type="radio" id="timeSlot1" name="timeSlot" value="9:45" checked>9:45</label>
            <label class="radio-inline"><input type="radio" id="timeSlot2" name="timeSlot" value="1:15">1:15</label>
          </div>
                     
         <div class="row">
              <div>
              <p>Session*</p>
            <label class="radio-inline"><input type="radio" id="session1" name="session" value="1" checked>S1</label>
            <label class="radio-inline"><input type="radio" id="session2" name="session" value="2">S2</label>
            <label class="radio-inline"><input type="radio" id="session3" name="session" value="3">S3</label>
            </div>
  <div class="row">
    <div class="form-group col-4 pb-10">
                <select class="form-control" id="year" name="year">
                  <option value="" selected hidden>Year*</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  </select>
               </div>
            <div class="col-4">
    <div class="form-group">
                
                 <input type="text" class="form-control form-control-lg" placeholder="Class room, eg MM101*" name="classRoom">
            </div>            
            <div class="row">
    <div class="form-group">
     
                    <input type="text" class="form-control form-control-lg" placeholder="Instructor Name*" name="instructorName">
                  </div>
              
            </div>
            </div>
              <div >
              <p>Course Level*</p>
            <label class="radio-inline"><input type="radio" id="level1" name="level" value="1" checked>Lvl 1</label>
            <label class="radio-inline"><input type="radio" id="level2" name="level" value="2">Lvl 2</label>
            <label class="radio-inline"><input type="radio" id="level3" name="level" value="3">Lvl 3</label>
              </div>    
         
            <div class="form-group col-2">
                 
                 <input type="text" class="form-control form-control-lg" placeholder="Price*" name="cost">
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
