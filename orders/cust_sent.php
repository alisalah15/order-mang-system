<?php
session_start();
include('../database/db.php');

if(isset($_POST['submit'])) {

  $message = $_POST['cust_msg'];
  $order_id = $_POST['order_id'];
  $query = "UPDATE orders SET cust_msg='$message' WHERE id=$order_id";
  $stmt = mysqli_prepare($conn, $query);
  $_SESSION['Done'] = 'Message Sent';
  header('Location: ../customers/pendingorders.php');
}
?>
