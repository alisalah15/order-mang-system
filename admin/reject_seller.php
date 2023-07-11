
<?php 
session_start();
include ('nav.php');
include ('../database/db.php');

$sql1="SELECT *  from  `users` where `status` ='rejected' and type = 'Seller'";
$result1=mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_assoc($result1);

?>

        <div class="content w-full">
            <div class="container pt-5">
                <div class="row">
                    <div class="col-10 mx-auto">


                    <?php include ('../validation/message.php'); ?>
                        <table class="table table-bordered border-primary">
                            <thead>
                            <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">City</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php $c=1; if(isset($result1)): foreach($result1 as $value):?>
                                    <tr>
                                    <th scope="row"><?php echo $c++; ?></th>
                                    <td><?php echo $value['f_name']." ".$value['l_name'] ;?></td>
                                    <td><?php echo $value['email'] ?></td>
                                    <td><?php echo $value['username'] ?></td>
                                    <td><?php echo $value['city'] ?></td>

                                </tr>
                                <?php endforeach;endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>