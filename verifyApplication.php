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

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">University For Young People</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="createaccount.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Student Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="studentsignup.php">Admin Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="help.php">Help</a>
            </li>
            </ul>
        </div>
      </div>
    </nav>

    <div class="container my-3 text-center">
      <div class="row justify-content-around">
        <div class="col-10">
          <h1>Sign Up Today</h1>
          <p>Please fill out this form to register</p>
            <div class="row">
              <div class="col-4">
                <form class="mb-4">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="First Name">
                  </div>
                </form>
              </div>
              <div class="col-4">
                <form>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Last Name">
                  </div>
                </form>
              </div>
              <div class="col-2">
                <form class="mb-4">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="MI">
                  </div>
                </form>
              </div>
              <div class="col-2">
                <form class="mb-4">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Suffix">
                  </div>
                </form>
              </div>
            </div>
          <form class="mb-10">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="Preferred Name">
              </div>
          </form>
          <form class="my-10">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="Preferred Name">
              </div>
          </form>
          <form class="mb-4">
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Username">
            </div>
          </form>
          <form class="mb-4">
            <div class="form-group">
              <input type="email" class="form-control form-control-lg" placeholder="Email">
            </div>
          </form>
          <form class="mb-4">
            <div class="form-group">
              <input type="password" class="form-control form-control-lg" placeholder="Password">
            </div>
          </form>
          <form class="mb-4">
            <div class="form-group">
              <input type="password" class="form-control form-control-lg" placeholder="Confirm Password">
            </div>
          </form class="mb-4">
          <form action="studentsignup.php" method="get">
          <input type="submit" value="Next" class="btn btn-outline-secondary btn-block">
        </form>
        </div>
      </div>
    </div>

    <footer id="main-footer" class="text-center p-2 fixed-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <p>Copyright 2018 &copy; University For Young People</p>
          </div>
        </div>
      </div>
    </footer>


  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>