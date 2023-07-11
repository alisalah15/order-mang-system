<?php 
session_start();
if(!isset($_SESSION['seller'])){
    header('Location: login.php');
  }
include ('nav.php');

?>

<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">


        <p class="fs-1">Add Categories</p>

        <?php include ('validation/message.php'); ?>

            <form class="row g-3 border p-4" action="categories/create.php" method="POST">
                <div class="col-12">
                    <label class="form-label">Name</label>
                    <input type="text" name="categname" class="form-control">
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                </div>
                
                <hr>
                    <a href="view.php" class="btn btn-warning mb-3" role="button" >View All Categories</a>

            </form>