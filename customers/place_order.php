<?php 
session_start();
if(!isset($_SESSION['customer'])){
    header('Location: ../login.php');
  }
include ('../database/db.php');

if(isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $message = $_POST['message'];
    
    
    // Query the database for the selected product and its seller
    $query = "SELECT p.id AS product_id, p.name AS product_name, p.price AS product_price, p.IMG AS product_img, p.quantity AS product_quantity, u.id AS seller_id, u.f_name AS seller_first_name, u.l_name AS seller_last_name
              FROM products p
              JOIN users u ON p.user_id = u.id
              WHERE p.id = $product_id";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 1) {
        $product = mysqli_fetch_assoc($result);
        $seller_id = $product['seller_id'];
        
        
        // Calculate the total price of the order

        $total_price = $product['product_price'] * $quantity;

        // Update the quantity of the product in the products table
        $new_quantity = $product['product_quantity'] - $quantity;
        $update_query = "UPDATE products SET quantity = $new_quantity WHERE id = $product_id";
        mysqli_query($conn, $update_query);


        
        // Add the order to the orders table
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO orders (customer_id, seller_id, product_id, quantity, price, status, cust_msg)
        VALUES ($user_id, $seller_id, $product_id, $quantity, $total_price, 'Pending', '$message')";
        mysqli_query($conn, $query);

        header("Location: pendingorders.php");

        exit();
    } else {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>