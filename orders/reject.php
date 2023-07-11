<?php
session_start();
include('../database/db.php');

// Check if the order ID is provided
if (!isset($_GET['id'])) {
    $_SESSION['errors'] = ['Order ID is missing.'];
    header('Location: ../pednorder.php');
    exit();
}

$order_id = $_GET['id'];
$query = "SELECT seller_id, status FROM orders WHERE id = $order_id AND seller_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($result);

// Update the order status to rejected
$query = "UPDATE orders SET status = 'rejected' WHERE id = $order_id";
if (!mysqli_query($conn, $query)) {
    $_SESSION['errors'] = ['Failed to reject the order.'];
    header('Location: ../pednorder.php');
    exit();
}

// Get the rejected quantity from the order and add it back to the available quantity in the product table



$update_query = "UPDATE products SET quantity = quantity + {$_GET['quantity']} WHERE id = {$_GET['product_id']}";
if (!mysqli_query($conn, $update_query)) {
    $_SESSION['errors'] = ['Failed to update product quantity.'];
    header('Location: ../pednorder.php');
    exit();
}

$_SESSION['Done'] = 'Order rejected and product quantity updated.';
header('Location: ../pednorder.php');
exit();
?>
