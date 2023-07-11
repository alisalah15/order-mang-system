<?php 
session_start();
if(!isset($_SESSION['customer'])){
    header('Location: ../login.php');
  }
include ('../nav.php');
include ('../database/db.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query the database for the selected product and its seller
    $query = "SELECT p.id AS product_id, p.name AS product_name, p.price AS product_price, p.IMG AS product_img, p.quantity AS product_quantity, u.f_name AS seller_first_name, u.l_name AS seller_last_name
              FROM products p
              JOIN users u ON p.user_id = u.id
              WHERE p.id = $id";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<div class="col-9 mx-auto m-4">
    <div class="card" style="width: 18rem;">
        <img src="../uploads/<?php echo $row['product_img'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['product_name'] ?></h5>
            <p class="card-text">Seller: <?php echo $row['seller_first_name'] . " " . $row['seller_last_name'] ?></p>
            <p class="card-text">Price: $<?php echo $row['product_price'] ?></p>

            <?php if($row['product_quantity'] > 0): ?>

            <form action="place_order.php" method="POST">

                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1"
                        max="<?php echo $row['product_quantity'] ?>" value="1">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" name="message"></textarea>
                </div>
                <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
            <?php else: ?>
            <p>Sorry, this product is currently out of stock.</p>
            <?php endif; ?>

        </div>
    </div>
</div>