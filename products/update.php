<?php
include ('../database/db.php');
include ('../validation/validation.php');
include ('../upload-mang/upload.php');
session_start();
$errors=[];

if (isset($_POST["submit"])){
    $productname=mysqli_real_escape_string($conn,$_POST['prodctname']);
    $productprice=mysqli_real_escape_string($conn,$_POST['prodctprice']);
    $quantity=mysqli_real_escape_string($conn,$_POST['quantity']);
    $category=mysqli_real_escape_string($conn,$_POST['category']);

    if(empty($productname) ){
        $errors[]= "Enter Name";
    }
        else{
            if(!minLength($productname,3)) {
                $errors[]= "Enter Vaild Name";
            }
        }
    
    if(empty($productprice) ){
        $errors[]= "Enter Price";
    }
    if(empty($quantity) ){
        $errors[]= "Enter Price";
    }

    if(isset($_SESSION['user_id']) && isset($_GET['id'])){
        $user_id= $_SESSION['user_id'];
        $id=$_GET['id'];
    }

    $sql= "SELECT `name` from `products` where `user_id`='$user_id' and `name`='$productname' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    if($row!=null){
        $errors[]="Name is already exist";
    }
    
    if(empty($errors)){
        $sql1="UPDATE `products` SET `user_id`='$user_id',`categ_id`='$category',`name`='$productname',`price`='$productprice' WHERE `id`='$id'";

            if(mysqli_query($conn,$sql1)){
                $_SESSION['Done']= "Product Updated";
                header("location: ../viewproducts.php");
            }else{
                $_SESSION['errors'] = ['Product Not Updated'];
                header("location: ../viewproducts.php");
            }
        }
        

    }else{
        $_SESSION['errors']=$errors;
        header("location: ../viewproducts.php");
    }
    
    ?>