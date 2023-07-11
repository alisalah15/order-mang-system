<?php 
session_start();
if(!isset($_SESSION['customer'])){
    header('Location: login.php');
  }
include ('../nav.php');
include ('../database/db.php');

if(isset($_SESSION['user_id'])){

    $user_id= $_SESSION['user_id'];
    $sql="SELECT *  from  `users` where `id`='$user_id'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">


            <p class="fs-1">Update Profile</p>

            <?php include ('../validation/message.php'); ?>

            <form class="row g-3 border p-4" action="../handlers/updateprofile.php" method="POST">
                <div class="col-12">
                    <label class="form-label">Frist Name</label>
                    <input type="text" name="f_name" class="form-control" value="<?php echo $row['f_name'];  ?>" >
                </div>
                <div class="col-12">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="l_name" class="form-control" value="<?php echo $row['l_name'];  ?>" >
                </div>
                <div class="col-12">
                    <label class="form-label">User Name</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $row['username'];  ?>" >
                </div>
                <div class="col-12">
                    <label class="form-label">Email</label>
                    <input type="Email" name="email" class="form-control" value="<?php echo $row['email'];  ?>">
                </div>


                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
                </div>

            </form>