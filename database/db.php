<?php 

$servername = "localhost";
$username   = "root";
$password   = "";
$db_name    = "product_mang";



$conn =  mysqli_connect($servername, $username, $password,$db_name);
mysqli_set_charset($conn,"utf8");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}