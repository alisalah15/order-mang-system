<?php 
session_start();
if (isset($_SESSION['customer'])) {
    header("Location: customers/customer.php");


}

if (isset($_SESSION['seller'])) {

    header("Location: seller.php");

}

include ('nav.php');

?>



    <div class="container pt-5">
        <div class="row">
            <div class="col-8 mx-auto">


                <?php include ('validation/message.php'); ?>
                
                <form class="row g-3 border p-4" action="handlers/login.php" method="POST">
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email or Username</label>
                        <input type="text" name="login" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4">
                    </div>

                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>


    </div>


</body>

</html>