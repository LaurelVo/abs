<?php
//include the file session.php
include("./utils/session.php");
if($session_user != "") {
	header('location: ./index.php');
}

//if there is any received error message 
if(isset($_GET['error']))
{
	$errormessage=$_GET['error'];
	//show error message using javascript alert
	echo "<script>alert('Do not have a record');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles/signin.css">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span onclick="window.location='./index.php';" class="navbar-brand mb-0 h1">Home</span>
        </div>
    </nav>
    <div class="pt-5">
        <h1 class="text-center">Login</h1>

        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card card-body">

                        <form onsubmit="return false;" id="submitForm">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control text-lowercase" id="email" required name="email"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label class="d-flex flex-row align-items-center" for="password">Password
                                    <a class="ml-auto border-link small-xl" href="#">Forget password?</a>
                                </label>
                                <input type="password" class="form-control" required id="password" name="password"
                                    value="">
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember-me"
                                        name="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember me?</label>
                                </div>
                            </div>
                            <div class="form-group pt-1">
                                <button class="btn btn-primary btn-block" id="signin">Log In</button>
                            </div>
                        </form>
                        <p class="small-xl pt-3 text-center">
                            <span class="text-muted">Not a member?</span>
                            <a href="./register.php">Sign up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#signin").click(function () {
                var email = $("#email").val();
                var password = $("#password").val();

                if (email === '') {
                    return alert('Email is required');
                }
                if (password === '') {
                    return alert('Password is required');
                }

                if (IsEmail(email) === false) {
                    return alert('Email is not valid');
                }

                $.post(
                    "./engine/signin_engine.php", {
                        email: email,
                        password: password,
                    }
                ).done(function (data) {
                    if (data == 1) {
                        window.location.href = './index.php';
                    } else if (data == 2) {
                        window.location.href = './host-dashboard.html';
                    } else if (data == 3) {
                        window.location.href = './manager-dashboard/manager-dashboard.php';
                    } else {
                        alert(data);
                    }
                });
            });

            function IsEmail(email) {
                var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }
        });
    </script>
</body>

</html>