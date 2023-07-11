<?php 
include ('../database/db.php');

$errors = [];

session_start();

if (isset($_POST['submit'])) {

    
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $plog = mysqli_real_escape_string($conn, $_POST['password']);
    
    $compare = "SELECT * FROM `users` WHERE (`email`='$login' OR `username`='$login')";
    $r = mysqli_query($conn, $compare);
    
    if (!$r) {
        // handle query error
        $errors[] = "Database query error: " . mysqli_error($conn);
    } else {
        $row = mysqli_fetch_assoc($r);
        
        if (!$row) {
            // handle no rows returned error
            $errors[] = "Wrong Email or Username";
        } else {
            if (!password_verify($plog, $row['password'])) {
                $errors[] = "Wrong Password";
            } else {
                // check user status
                if ($row['status'] == 'accepted') {
                    if ($row['type'] == 'Customer') {
                        $_SESSION['customer'] = true;
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['f_name'] = $row['f_name'];
                        $_SESSION['l_name'] = $row['l_name'];
                        header("Location: ../customers/customer.php");
                    } elseif ($row['type'] == 'Seller') {
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['seller'] = true;
                        header("Location: ../home.php");
                    }
                } elseif ($row['status'] == 'pending') {
                    $errors[] = "Your account is pending approval";
                } elseif ($row['status'] == 'blocked') {
                    $errors[] = "Your account is blocked, please contact the administrator";
                } elseif ($row['status'] == 'rejected') {
                    $errors[] = "Your account is rejected, please contact the administrator";
                }
            }
        }
        
    
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: ../login.php");
    }
}
}
?>