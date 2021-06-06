<?php
include "database_connect.php";
require_once 'customer_auth.php';
require 'customer_value.php';

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

        <div class="div_dashnoard">
            <table>
                <tr>
                    <th>Book name</th>
                    <th>Book price</th>
                    <th>Date borrow</th>
                    <th>Date return</th>
                    <th>Status</th>
                </tr>

                <?php
                include "database_connect.php";
                $query = $conn->query("SELECT * FROM `reservation` WHERE `customer_id` = '$fetch[customer_id]' AND `status` = 'pending' ") or die(mysqli_error()); while($fetch = $query->fetch_array()){ ?>
                <tr>
                    <td><?php echo $fetch['book_name']; ?></td>
                    <td>RM<?php echo $fetch['book_price']; ?></td>
                    <td><?php echo $fetch['date_borrow']; ?></td>
                    <td><?php echo $fetch['date_return']; ?></td>
                    <td><?php echo $fetch['status']; ?></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </body>
</html>

