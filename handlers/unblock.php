<?php

if (isset($_GET['id'])) {
    include('../database/db.php');
    session_start();
    $errors=[];
    $seller_id = $_GET['id'];

    $sql = "UPDATE users SET status = 'accepted' WHERE id = $seller_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['Done']= "User unblocked successfully!";
        header('Location: ../admin/accept_seller.php');
    } else {
        $_SESSION['errors'] = "User Cannot unblocked";
        header('Location: ../admin/accept_seller.php');
    }
}
?>