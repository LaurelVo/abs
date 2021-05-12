<?php
//include the file session.php
include("./utils/session.php");

if($session_user!="") {
	header('location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
  <link rel="stylesheet" href="./styles/register.css" />
  <title>Register</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <span onclick="window.location='./index.php';" class="navbar-brand mb-0 h1">Home</span>
    </div>
  </nav>
  <div class="pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div id="message">
            <h3>Password must contain the following:</h3>
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">
              A <b>capital (uppercase)</b> letter
            </p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card">
            <h2 class="card-title text-center">Become a host</h2>
            <div class="card-body py-md-4">
              <form onsubmit="return false;">
                <div class="form-group">
                  <input type="text" required class="form-control" id="firstName" placeholder="First Name" />
                </div>
                <div class="form-group">
                  <input type="text" required class="form-control" id="lastName" placeholder="Last Name" />
                </div>
                <div class="form-group">
                  <input type="email" required class="form-control" id="email" placeholder="Email" />
                </div>
                <div class="form-group">
                  <input required type="text" class="form-control" id="mobile" placeholder="Mobile" />
                </div>
                <div class="form-group">
                  <input required type="text" class="form-control" id="address" placeholder="Address" />
                </div>
                <div class="form-group">
                  <input required type="text" class="form-control" id="abn" placeholder="ABN" />
                </div>
                <div class="form-group">
                  <input id="psw" name="psw" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                    type="password" class="form-control" id="password" placeholder="Password" />
                </div>
                <div class="form-group">
                  <input required type="password" class="form-control" id="confirm-password"
                    placeholder="Confirm password" />
                </div>
                <div class="
                      d-flex
                      flex-row
                      align-items-center
                      justify-content-between
                    ">
                  <a href="./signin.php">Login</a>
                  <button id="signup" class="btn btn-primary">Create Account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="./js/register-host.js"></script>
</body>

</html>