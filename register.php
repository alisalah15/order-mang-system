<?php 
session_start();
if(!isset($_SESSION['user_type'])){
    header('Location: option.php');
  }
include ('nav.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>


    <div class="container pt-5">
        <div class="row">
            <div class="col-8 mx-auto">

            <?php include ('validation/message.php'); ?>


                <form class="row g-3 border p-4" action="handlers/register.php" method="POST">
                    <div class="col-md-6">
                        <label for="name" class="form-label">First Name</label>
                        <input type="text" name="f_name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Last Name</label>
                        <input type="text" name="l_name" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">User Name</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="inputPassword4">
                    </div>

                    <div class="col-md-4">
                        <label for="inputState" class="form-label">City</label>
                        <select id="inputState" class="form-select" name="city">
                            <option selected>Choose...</option>
                            <option> 6 October </option>
                            <option> Sheikh Zayed </option>
                            <option> Nasr City </option>
                            <option> Doki </option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>


    </div>


</body>

</html>