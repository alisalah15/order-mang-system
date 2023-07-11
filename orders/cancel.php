<?php
session_start();
include('../database/db.php');


$order_id = $_GET['id'];
$query = "SELECT seller_id, status, product_id, quantity FROM orders WHERE id = $order_id AND customer_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($result);

// Check if the order belongs to the current seller
if (!$order) {
    $_SESSION['errors'] = ['Order not found or does not belong to you.'];
    header('Location: ../customers/pendingorders.php');
    exit();
}

// Update the order status to canceled
$query = "UPDATE orders SET status = 'canceled' WHERE id = $order_id";
if (!mysqli_query($conn, $query)) {
    $_SESSION['errors'] = ['Failed to cancel the order.'];
    header('Location: ../customers/pendingorders.php');
    exit();
}

// Get the canceled quantity from the order and add it back to the available quantity in the product table
$product_id = $order['product_id'];
$canceled_quantity = $order['quantity'];
$update_query = "UPDATE products SET quantity = quantity + $canceled_quantity WHERE id = $product_id";
if (!mysqli_query($conn, $update_query)) {
    $_SESSION['errors'] = ['Failed to update product quantity.'];
    header('Location: ../customers/pendingorders.php');
    exit();
}

$_SESSION['Done'] = 'Order canceled and product quantity updated.';
header('Location: ../customers/pendingorders.php');
exit();
?>
