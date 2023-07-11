<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Admin login</title>
</head>
<body>
<div class="container pt-5">
        <div class="row">
            <div class="col-8 mx-auto">

            <?php session_start(); include ('../validation/message.php'); ?>

               
                <form class="row g-3 border p-4" action="../handlers/loginadmin.php" method="POST">
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email or Username</label>
                        <input type="text" name="username_email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4">
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