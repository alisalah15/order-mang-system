<?php 
session_start();
if(!isset($_SESSION['seller'])){
    header('Location: login.php');
  }
include ('nav.php');
include ('database/db.php');

// Query the database for the orders table data
$query = "SELECT o.id,  o.seller_id AS seller_id, u.f_name AS customer_first_name, u.l_name AS customer_last_name, p.name AS product_name, p.price AS product_price, o.quantity, o.price AS total_price, o.status, us.f_name AS seller_first_name, us.l_name AS seller_last_name
          FROM orders o
          JOIN products p ON o.product_id = p.id
          JOIN users u ON o.customer_id = u.id
          JOIN users us ON o.seller_id = us.id
          WHERE o.status = 'rejected' AND seller_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query);
?>

<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <p class="fs-1">Pending Orders</p>

            <?php include ('validation/message.php'); ?>

            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $c=1; if(mysqli_num_rows($result) > 0): while($order = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <th scope="row"><?php echo $c++; ?></th>
                        <td><?php echo $order['customer_first_name'] . " " . $order['customer_last_name']; ?></td>
                        <td><?php echo $order['product_name']; ?></td>
                        <td><?php echo $order['product_price']; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo $order['total_price']; ?></td>
                        <td><?php echo $order['status']; ?></td>


                    </tr>
                    <?php endwhile; else: ?>
                    <tr>
                        <td colspan="9" class="text-center">No pending orders found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
