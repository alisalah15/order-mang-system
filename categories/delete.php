<?php
include ('../database/db.php');
session_start();

if(isset($_GET['id'])){

    $id= $_GET['id'];
    $user_id= $_SESSION['user_id'];
    $sql="DELETE from `categ` where `id`='$id' and `user_id`='$user_id'";

    if(mysqli_query($conn,$sql)){
        $_SESSION['Done']= "Category Deleted";

    }
    else{
        $_SESSION['errors'] = "Category Cannot Deleted";
    
    }
}

        header("location: ../view.php");


?>