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
 ?>

<?php 
//You can use include statements anywhere in a php file. They work differently from c++ include statements in that
//they simply paste in the code from the included file where the include statement is used. For example, in the
//statement below, the code from "menubar.php" is pasted right into index.php. menubar.php pastes in a different
//menu bar depending on if you are signed in as an admin, signed in as a student, or not signed in at all.
include 'menubar.php'; 
?>

    <div class="container">
 
      <form class="form-signin" action="verifyLogin.php" method="post">
      
        <h2 class="text-center">Please Login</h2>
        <div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <!-- the "name" field of an input field will determine how you access the field from the php file that processes the
        form. In this case, when the form is passed on to "verifyLogin.php", you can use $_POST['Username'] to access this input field
        because the name field is assigned to "Username", and the method of the form is defined as "post". -->
        <input type="text" id="inputEmail" name="Username" class="form-control" placeholder="Email address" required autofocus>
      </div>
        
        <div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      </div>
      <!-- "isset" will determine if there exists a value for whatever variable you are checking. This line checks if the "loginerror"
      cookie is set, and if it is set to 1. If so, an alert div is echoed to the screen. This cookie will be set in verifyApplication
      if an error occurs with the login (aka the username and password are not in the database) -->
        <span class="text-danger"><?php if (isset($_COOKIE["loginerror"]) && $_COOKIE["loginerror"] == 1) 
        echo '<div class="container"><div class="alert alert-danger">Either the entered username or password is incorrect. Please try again.</div></div>';
        ?></span>
         <button name="submit" class="btn btn-success btn-block" type="submit">Login</button>
      </form>

      <div class="forgot">
        <!-- "a href" denotes a link -->
        <a href="reset.php">Forgot password</a>
      </div>
      <div>
        <a href="studentsignup.php">Register</a>
      </div>
    </div>
        
</div>



  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script>
    //Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
  </script>
</body>
</html>
