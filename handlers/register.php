<?php 
include ('../database/db.php');
include ('../validation/validation.php');

session_start();
$errors=[];

if (isset($_POST["submit"])){

    $f_name=mysqli_real_escape_string($conn,$_POST['f_name']);
    $l_name=mysqli_real_escape_string($conn,$_POST['l_name']);
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);
    $type=$_SESSION['user_type'];
    $city=mysqli_real_escape_string($conn,$_POST['city']);

    // validation

    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is not valid';
    }

    if(empty($f_name AND $l_name) ){
        $errors[]= "Enter Your Name";
    }

    if(empty($username) ){
        $errors[]= "Enter Your User Name";
    }else{
        if (!ctype_alnum($username)) {
            $errors[] = "Username must contain only letters and numbers";
        }
        if (strlen($username) < 3 || strlen($username) > 20) {
            $errors[] = "Username must be between 3 and 20 characters long";
        }
    }


    if(empty($city) ){
        $errors[]= "Enter Your City";
    }
    

    // password

    if(empty($password AND $cpassword) ){
        $errors[]= "Enter Password";
    }
        else{
            if ($password!=$cpassword){
                $errors[]= "Password doesn't match";
            }
            elseif(!minLength($password,6)) {
                $errors[]= "Enter More than 6 value";
            }
            elseif (!maxLength($password,20)){
                $errors[]= "Enter Less than 20 value";
            }
        }


        $sql= "SELECT * from users";
        $result= mysqli_query($conn,$sql);
        foreach($result as $row){
            if($row['email']==$email){
                $errors[]="Your Email Already Registered";
                break;
            }
            if($row['username']==$username){
                $errors[]="Your User name Already Registered";
                break;
            }
        }
    if(empty($errors)){

    $hashedpass= password_hash($password,PASSWORD_DEFAULT);
    
    if ($type == 'Seller') {
        $status = 'pending';
    } else {
        $status = 'accepted';
    }

    $sql1 = "INSERT INTO `users`(`f_name`, `l_name`, `username`, `email`, `password`, `city`, `type`, `status`)
    VALUES ('$f_name', '$l_name', '$username', '$email', '$hashedpass', '$city', '$type', '$status')";
        $result1= mysqli_query($conn,$sql1);

        if($result1){
            $_SESSION['Done']= "Registration is Done";
        }
        else{
            $_SESSION['errors']= "Registration is Fail";
        }
        header ("location: ../register.php");
    }else{
        $_SESSION['errors']=$errors;
        header ("location: ../register.php");
    }
}
?>