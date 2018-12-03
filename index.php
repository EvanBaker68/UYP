<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>UYP</title>
</head>
<body>



<?php 
setcookie("menubar", 0, time() + 86400, "/");
include 'menubar.php'; 
?>

<div class="container">
<div class="login-form">
<div class="main-div">
<div class="panel">
   <h2>Login</h2>
   <p>Please enter your email and password</p>

   </div>
    <form id="Login" action="verifyLogin.php" method="post">

        <div class="form-group">
            <input type="email" name="Username" class="form-control" id="inputEmail" placeholder="Email Address">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        <span class="text-danger"><?php if (isset($_COOKIE("loginerror"))) 
        echo "<div class="container"><div class="alert alert-danger">Sorry there were errors loging into your account.Please try again later.</div></div>";

        ?></span>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    
    <div class="forgot">
        <a href="reset.php">Forgot password</a>
        </div>
        <div>
        <a href="studentsignup.php">Register</a>
        </div>
    </div>

</div></div></div>



  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script>
    //Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
  </script>
</body>
</html>
