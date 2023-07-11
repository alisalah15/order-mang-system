<?php

if (isset($_GET['id'])) {
    include('../database/db.php');
    session_start();
    $errors=[];
    $seller_id = $_GET['id'];

    $sql = "UPDATE users SET status = 'blocked' WHERE id = $seller_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['Done']= "User blocked successfully!";
        header('Location: ../admin/accept_seller.php');
    } else {
        $_SESSION['errors'] = "User Cannot blocked";
        header('Location: ../admin/accept_seller.php');
    }
}
?>