<?php 
session_start();
include ('nav.php');

if(isset($_POST['seller'])) {
    $_SESSION['user_type'] = 'Seller';
    
    header('Location: register.php');
}

if(isset($_POST['customer'])) {
    $_SESSION['user_type'] = 'Customer';
    header('Location: register.php');
}

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
    <center>
        <img src="home.jpg" class="img-fluid rounded mx-auto col-6"  alt="...">

            <form action="" method="POST" >

                <button type="submit"  name="customer" class="btn btn-outline-primary btn-block col-9 mb-3 mt-10">Join As Customer</button>

            </form>

            <form action="" method="POST" >

                <button type="submit" name="seller" class="btn btn-outline-danger btn-block col-9">Join as Seller </button>

            </form>

    </center>

    <?php 
?>

</div>




</body>

</html>