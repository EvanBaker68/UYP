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
                <input type="text" class="form-control form-control-lg" placeholder="Address">
              </div>
          </form>
          <div class="row">
          <form class="my-10 col-6">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="City">
              </div>
          </form>
          <div class="form-group col-2 pb-10">
                <select class="form-control" id="state">
                  <option value="">State</option>
                  <option value="AK">Alaska</option>
                  <option value="AL">Alabama</option>
                  <option value="AR">Arkansas</option>
                  <option value="AZ">Arizona</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DC">District of Columbia</option>
                  <option value="DE">Delaware</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="IA">Iowa</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MD">Maryland</option>
                  <option value="ME">Maine</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MO">Missouri</option>
                  <option value="MS">Mississippi</option>
                  <option value="MT">Montana</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="NE">Nebraska</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NV">Nevada</option>
                  <option value="NY">New York</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VA">Virginia</option>
                  <option value="VT">Vermont</option>
                  <option value="WA">Washington</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WV">West Virginia</option>
                  <option value="WY">Wyoming</option>
                </select>
            </div>
            <form class="mb-4 col-2">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="Zip Code">
              </div>
            </form>
          </div>
          <form class="mb-4">
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Birthdate (Will replace with a date picker)">
            </div>
          </form>
          <div class="row">
            <div class="form-group col-2 pb-10">
                  <select class="form-control" id="race">
                    <option value="">Race</option>
                    <option value="White">White</option>
                    <option value="White">Black or African American</option>
                    <option value="White">Hispanic/Latino</option>
                    <option value="White">American Indian or Alaska Native</option>
                    <option value="White">Asian</option>
                    <option value="White">Native Hawaiian or other Pacific Islander</option>
                  </select>
              </div>
          <div class="form-group col-2 pb-10">
                <select class="form-control" id="gender">
                  <option value="">Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
            </div>
        </div>
          <!-- <div class="input-append date form_datetime">
    <input size="16" type="text" value="" readonly>
    <span class="add-on"><i class="icon-th"></i></span>
</div>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii"
    });
</script> -->
          <form class="mb-4">
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Email">
            </div>
          </form>
          <form class="mb-4">
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Phone Number">
            </div>
          </form class="mb-4">
          <form action="studentsignup.php" method="get">
          <input type="submit" value="Next" class="btn btn-outline-secondary btn-block">
        </form>
        </div>
      </div>
    </div>

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
