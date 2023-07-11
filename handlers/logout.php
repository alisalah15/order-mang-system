<?php
session_start();

if(isset($_SESSION['customer'])){
    unset($_SESSION['customer']);
    session_destroy();
    session_unset();
    header("location: ../login.php");
}

if(isset($_SESSION['seller'])){
    unset($_SESSION['seller']);
    session_destroy();
    session_unset();
    header("location: ../login.php");
}
if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
    session_destroy();
    session_unset();
    header("location: ../admin/adminlogin.php");
}

?>