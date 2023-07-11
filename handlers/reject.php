<?php

if (isset($_GET['id'])) {
    include('../database/db.php');
    session_start();
    $errors=[];
    $seller_id = $_GET['id'];

    $sql = "UPDATE users SET status = 'rejected' WHERE id = $seller_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['Done']= "Seller Rejected successfully!";
        header('Location: ../admin/pending_seller.php');
    } else {
        $_SESSION['errors'] = "Seller Cannot Rejected";
        header('Location: ../admin/pending_seller.php');
    }
}
?>
