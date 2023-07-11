<?php 
session_start();
if(!isset($_SESSION['customer'])){
    header('Location: ../login.php');
  }
include ('../nav.php');

?>

<h1><?php  echo "Hello ". $_SESSION['f_name']. " ".$_SESSION['l_name'] ; ?></h1>
