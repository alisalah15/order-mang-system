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
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql1="SELECT *  from  `products` where `user_id`='$user_id' and `id`='$id'";
    $result1=mysqli_query($conn,$sql1);
    $row=mysqli_fetch_assoc($result1);

}
?>

<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">


            <p class="fs-1">Update Products</p>

            <?php include ('validation/message.php'); ?>

            <form class="row g-3 border p-4" action="products/update.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                    <label class="form-label">Name</label>
                    <input type="text" name="prodctname" class="form-control" value="<?php if(isset($row['name'])): echo $row['name']; endif; ?>" >
                </div>
                <div class="col-12">
                    <label class="form-label">Price</label>
                    <input type="number" name="prodctprice" class="form-control" value="<?php if(isset($row['price'])): echo $row['price']; endif; ?>">
                </div>
                <div class="col-12">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="<?php if(isset($row['quantity'])): echo $row['quantity']; endif; ?>">
                </div>
                <div class="col-12">
                    <label class="form-label">Category</label>

                    <select class="form-select" aria-label="Default select example" name="category">

                        <?php if (isset($result)): foreach($result as $value):?>

                        <option value=" <?php echo $value['id'];?>" <?php if($value['id']==$row['categ_id']): ?> selected > <?php endif;echo $value['name'];?></option>

                        <?php endforeach; endif; ?>

                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">Update Products</button>
                </div>

                <hr>
                <a href="viewproducts.php" class="btn btn-primary mb-3" role="button" data-bs-toggle="button">View All
                    Products</a>

            </form>