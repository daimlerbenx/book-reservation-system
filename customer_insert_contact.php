<?php
include "database_connect.php";
require_once 'customer_auth.php';
require 'customer_value.php';

if(ISSET($_POST['btn_payment'])){
    $status = "in process";
    $customer_address = $_POST['customer_address'];
    $customer_contact = $_POST['customer_contact'];

    mysqli_query($conn, "UPDATE `reservation` SET `status` = '$status', `customer_address` = '$customer_address', `customer_contact` = '$customer_contact' WHERE `reservation_id` = '$_REQUEST[reservation_id]'") or die(mysqli_error());
    echo '<script type="text/javascript"> alert("Your reservation will be process"); location="customer_dashboard.php"; </script>';
  }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Book Reservation System</title>
    </head>
    <body>
        <div class="div_header">
            <ul>
                <li><a href="customer_homepage.php">Home</a></li>
                <li><a href="logout_customer.php">Logout</a></li>
            </ul>
            <h2>Welcome, <?php echo $fetch['customer_name']; ?></h2>
        </div>

        <div class="form_payment">
            <?php 
          require_once 'database_connect.php';
          $query = $conn->query("SELECT * FROM `reservation` WHERE `reservation_id` = '$_REQUEST[reservation_id]'") or die(mysql_error()); $fetch = $query->fetch_array(); ?>
            <h2><?php echo $fetch['book_name'];?></h2>
            <h2>
                RM
                <?php echo $fetch['book_price'];?>
            </h2>

            <form method="post" id="payment">
                <input type="text" name="status" hidden>

                <label>Address</label>
                <input type="text" name="customer_address" required>

                <label>Contact</label>
                <input type="number" name="customer_contact" required>

                <button type="submit" name="btn_payment" form="payment" value="Submit">Confirm</button>
            </form>
        </div>
    </body>
</html>
