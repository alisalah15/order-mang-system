

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

<nav class="navbar navbar-expand-lg  bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['seller'])) { ?>
                    <li class="nav-item">
                        <a class="navbar-brand" href="home.php">Seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="categories.php">Add Categories</a></li>
                            <li><a class="dropdown-item" href="view.php">View Categories</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="products.php">Add Products</a></li>
                            <li><a class="dropdown-item" href="viewproducts.php">View Products</a></li>
                        </ul>
                    </li>

                                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Orders
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="accetped.php">View Accepted Orders</a></li>
                            <li><a class="dropdown-item" href="pednorder.php">View Pending Orders</a></li>
                            <li><a class="dropdown-item" href="canclled.php">View Canclled Orders</a></li>
                            <li><a class="dropdown-item" href="rejected.php">View Rejected Orders</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="s_profile.php">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="handlers/logout.php">Logout</a>
                    </li>
                <?php } elseif(isset($_SESSION['customer'])) { ?>
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">Customer</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Orders
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="accetped.php">View Accepted Orders</a></li>
                            <li><a class="dropdown-item" href="pendingorders.php">View Pending Orders</a></li>
                            <li><a class="dropdown-item" href="canclled.php">View Canclled Orders</a></li>
                            <li><a class="dropdown-item" href="rejected.php">View Rejected Orders</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="makeorder.php">Make Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="c_profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../handlers/logout.php">Logout</a>
                    </li>
                <?php  } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="option.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>