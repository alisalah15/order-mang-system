<?php 
session_start();
if(!isset($_SESSION['customer'])){
    header('Location: ../login.php');
  }
include ('../nav.php');
include ('../database/db.php');
?>

<div class="col-9 mx-auto m-4 ">

    <form class="d-flex border" role="search" method="POST">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_query">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>


    <div class="product-list" style="display: flex; flex-wrap: wrap;">
        <?php
        
        if (empty($_POST['search_query'])) {

            // Query the database for a random product and its seller
            $query = "SELECT p.id AS product_id, p.name AS product_name, p.price AS product_price, p.IMG AS product_img,p.quantity AS product_quantity, u.f_name AS seller_first_name, u.l_name AS seller_last_name
              FROM products p
              JOIN users u ON p.user_id = u.id
              ORDER BY RAND()
              LIMIT 3";
    $result = mysqli_query($conn, $query);
    
    
    // Display the product information
    while ($row = mysqli_fetch_assoc($result)) { ?>

        <div class="card m-2" style="width: 18rem; display: inline-block;">
            <img src="../uploads/<?php echo $row['product_img'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> <?php echo $row['product_name']?> </h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">$ <?php echo $row['product_price']?></li>
                <li class="list-group-item">Available Quantity: <?php echo $row['product_quantity']?></li>
                <li class="list-group-item">Seller:
                    <?php echo  $row['seller_first_name'] . " " . $row['seller_last_name'] ?></li>
            </ul>
            <div class="card-body">
                <a href="buy.php?id=<?php echo $row['product_id'] ;?>" class="btn btn-primary" role="button" >Buy</a>
            </div>
        </div>
        <?php
    }
     
}else {

    // Get the search query from the form submission
    $search_query = mysqli_real_escape_string($conn, $_POST['search_query']);

    
    // Query the database for products and sellers that match the search query
    $query = "SELECT p.id AS product_id, p.name AS product_name, p.price AS product_price, p.IMG AS product_img, p.quantity AS product_quantity, u.f_name AS seller_first_name, u.l_name AS seller_last_name
          FROM products p
          JOIN users u ON p.user_id = u.id
          WHERE p.name LIKE '%$search_query%'
          OR u.f_name LIKE '%$search_query%'
          OR u.l_name LIKE '%$search_query%'";
$result = mysqli_query($conn, $query);

// If there are no results, display a message
if (mysqli_num_rows($result) == 0) {
    echo "<h2>No results found.</h2>";
} else {
    // Loop through the results and display the product information
    echo '<div class="product-list" style="display: flex; flex-wrap: wrap;">';
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card m-2" style="width: 18rem; display: inline-block;">
            <img src="../uploads/<?php echo $row['product_img'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> <?php echo $row['product_name']?> </h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">$ <?php echo $row['product_price']?></li>
                <li class="list-group-item">Available Quantity: <?php echo $row['product_quantity']?></li>
                <li class="list-group-item">Seller:
                    <?php echo  $row['seller_first_name'] . " " . $row['seller_last_name'] ?></li>
            </ul>
            <div class="card-body">
            <a href="buy.php?id=<?php echo $row['product_id'] ;?>" class="btn btn-primary" role="button" >Buy</a>
            </div>
        </div>
        <?php
    }
    echo '</div>';
}
}

?>

    </div>


</div>