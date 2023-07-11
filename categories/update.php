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

    if(isset($_SESSION['user_id']) && isset($_GET['id']) ){
        $user_id= $_SESSION['user_id'];
        $id=$_GET['id'];
    }

    $sql= "SELECT `name` from `categ` where `user_id`='$user_id' and `name`='$categname' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    if($row!=null){
        $errors[]="Name is already exist";
    }

    if(empty($errors)){
        $sql1="UPDATE  `categ` set `name`='$categname' where `id`=$id";
        if(mysqli_query($conn,$sql1)){
            $_SESSION['Done']= "Category Updated";
            header("Location: ../view.php");
        }
    }
    else{
        $_SESSION['errors'] = $errors;
        header("Location: ../update-categories.php");
    }
}

    ?>