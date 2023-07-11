<?php
include ('../database/db.php');

$errors = [];

session_start();

if(isset($_POST['submit'])) {
    $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);


  // Update information

  if(isset($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
  }

  $update_query = "UPDATE users SET f_name='$f_name', l_name='$l_name', username='$username', email='$email' WHERE id='$user_id'";

  mysqli_query($conn, $update_query);
  $_SESSION['Done']= "Updated Sucessfully";
  // Redirect to profile page
  if(isset($_SESSION['customer'])) {

      header("Location: ../customers/c_profile.php");
  }

  if(isset($_SESSION['seller'])){

    header("Location: ../s_profile.php");
}
}
?>
