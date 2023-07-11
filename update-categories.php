<?php 
session_start();
if(!isset($_SESSION['seller'])){
    header('Location: login.php');
  }
include ('nav.php');
include ('database/db.php');

if(isset($_GET['id'])){

    $id= $_GET['id'];
    $user_id= $_SESSION['user_id'];
    $sql="SELECT  `name` from  `categ` where `id`='$id' and `user_id`='$user_id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
}

?>

<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">


        <p class="fs-1">Update Categories</p>

        <?php include ('validation/message.php'); ?>

            <form class="row g-3 border p-4" action="categories/update.php?id=<?php echo $id; ?>" method="POST">
                <div class="col-12">
                    <label class="form-label">Name</label>
                    <input type="text" name="categname" class="form-control" value= "<?php if(isset($row['name'])): echo $row['name']; endif; ?> ">
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
                </div>
                
                <hr>
                    <a href="view.php" class="btn btn-primary mb-3" role="button" data-bs-toggle="button">View All Categories</a>

            </form>