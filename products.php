<?php 
session_start();
if(!isset($_SESSION['seller'])){
    header('Location: login.php');
  }
include ('nav.php');
include ('database/db.php');

if(isset($_SESSION['user_id'])){

    $user_id= $_SESSION['user_id'];
    $sql="SELECT *  from  `categ` where `user_id`='$user_id'";
    $result=mysqli_query($conn,$sql);
}
?>

<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">


            <p class="fs-1">Add Products</p>

            <?php include ('validation/message.php'); ?>

            <form class="row g-3 border p-4" action="products/create.php" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                    <label class="form-label">Name</label>
                    <input type="text" name="prodctname" class="form-control">
                </div>

                <div class="input-group mb-3">
                    <label class="form-label">Price</label>
                    <span class="input-group-text">$</span>
                    <input type="text" name="prodctprice" class="form-control"
                        aria-label="Amount (to the nearest dollar)">
                </div>

                <div class="col-12">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control">
                </div>

                <div class="col-12">
                    <label class="form-label">Image</label>
                    <input type="file" name="IMG" class="form-control">

                </div>
                <div class="col-12">
                    <label class="form-label">Category</label>

                    <select class="form-select" aria-label="Default select example" name="category">

                        <?php if (isset($result)): foreach($result as $value):?>

                        <option value=" <?php echo $value['id'];?> "><?php echo $value['name'];?></option>

                        <?php endforeach; endif; ?>

                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">Add Products</button>
                </div>

                <hr>
                <a href="viewproducts.php" class="btn btn-warning mb-3" role="button" >View All
                    Products</a>

            </form>