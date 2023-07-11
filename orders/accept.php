<?php
session_start();
include('../database/db.php');

// Check if the order ID is provided
if (!isset($_GET['id'])) {
    $_SESSION['errors'] = ['Order ID is missing.' ];
    header('Location: ../pednorder.php');

}

$order_id = $_GET['id'];
$query = "SELECT seller_id, status FROM orders WHERE id = $order_id AND seller_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($result);



// Update the order status to accepted
$query = "UPDATE orders SET status = 'accepted' WHERE id = $order_id";
if (!mysqli_query($conn, $query)) {
    $_SESSION['error'] = ['Failed to accept the order.' ];
} else {
    $_SESSION['Done'] = 'Order accepted.';
}

header('Location: ../pednorder.php');

