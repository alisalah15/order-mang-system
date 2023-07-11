<?php 
session_start();
if(!isset($_SESSION['seller'])){
    header('Location: login.php');
  }
include ('nav.php');
include ('database/db.php');

if(isset($_SESSION['user_id'])){

    $user_id= $_SESSION['user_id'];
    $sql="SELECT `f_name`, `l_name`  from  `users` where `id`='$user_id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
}
?>

<h1><?php  echo "Hello, ". $row['f_name']. " ".$row['l_name'] ; ?></h1>

<?php 
// Get the logged in user ID

// Get the total orders for the logged in user
$sql = "SELECT COUNT(*) AS total_orders FROM orders WHERE seller_id = $user_id AND status = 'accepted' ";
$result=mysqli_query($conn,$sql);
$totalOrders=mysqli_fetch_assoc($result);


// Get the total customers for the logged in user
$sql1 = "SELECT COUNT(DISTINCT customer_id) AS total_customers FROM orders WHERE seller_id = $user_id";
$result1=mysqli_query($conn,$sql1);
$totalCustomers=mysqli_fetch_assoc($result1);

// Get the total sales for the logged in user
$sql2 = "SELECT SUM(price) AS total_sales FROM orders WHERE seller_id = $user_id AND status = 'accepted'";
$result2=mysqli_query($conn,$sql2);
$totalSales=mysqli_fetch_assoc($result2);
?>

<div class="container pt-5">
    <div class="row">
        <div class="col-12">

<div class="card-deck d-flex flex-wrap">
  <div class="card text-bg-primary mb-3 col-5 m-5" style="max-width: 18rem;">
    <div class="card-header">Total Sales</div>
    <div class="card-body">
      <h5 class="card-title"><?php echo $totalSales['total_sales']; ?></h5>
    </div>
  </div>

  <div class="card text-bg-success  mb-3 col-5 m-5" style="max-width: 18rem;">
    <div class="card-header">Total Orders</div>
    <div class="card-body">
      <h5 class="card-title"><?php echo $totalOrders['total_orders']; ?></h5>
    </div>
  </div>

  <div class="card text-bg-light  mb-3 col-5 m-5" style="max-width: 18rem;">
    <div class="card-header">Total Customers</div>
    <div class="card-body">
      <h5 class="card-title"><?php echo $totalCustomers['total_customers']; ?></h5>
    </div>
  </div>
</div>
    </div>
  </div>
</div>