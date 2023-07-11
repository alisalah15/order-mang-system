<?php
include ('../database/db.php');
include ('../validation/validation.php');
session_start();
$errors=[];

if (isset($_POST["submit"])){
    $categname=mysqli_real_escape_string($conn,$_POST['categname']);

    if(empty($categname) ){
        $errors[]= "Enter Name";
    }
        else{
            if(!minLength($categname,3)) {
                $errors[]= "Enter Vaild Name";
            }
        }

    if(isset($_SESSION['user_id'])){
        $user_id= $_SESSION['user_id'];
    }

    $sql= "SELECT `name` from `categ` where `user_id`='$user_id' and `name`='$categname' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    if($row!=null){
        $errors[]="Name is already exist";
    }

    if(empty($errors)){
        $sql1="INSERT INTO `categ`(`name`,`user_id`) value ('$categname','$user_id')";
        if(mysqli_query($conn,$sql1)){
            $_SESSION['Done']= "Category Added";
            header("Location: ../categories.php");
        }
    }
    else{
        $_SESSION['errors'] = $errors;
        header("Location: ../categories.php");
    }
}

    ?>