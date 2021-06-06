<?php
include "../database_connect.php";
require_once 'admin_auth.php';
require 'admin_value.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Admin | Book Reservation System</title>
    </head>
    <body>
        <div class="div_header">
            <ul>
                <li><a href="book_overview.php">Book overiew</a></li>
                <li><a href="add_book.php">Add book</a></li>
                <li><a href="update_book.php">Update book</a></li>
                <li><a href="delete_book.php">Delete book</a></li>
                <li><a href="customer_list.php">Customer list</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="admin_logout.php">Logout</a></li>
            </ul>
            <h2>
                Welcome,
                <?php echo $fetch['admin_name']; ?>
            </h2>
        </div>

        <div class="div_customer_list">
            <h2>Reservation history</h2>
            <table>
                <thead>
                    <tr>
                        <th>Customer name</th>
                        <th>Book name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Customer address</th>
                        <th>Customer contact</th>
                        <th>Date borrow</th>
                        <th>Date return</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                          $query = $conn->query("SELECT * FROM `reservation`") or die(mysqli_error()); while($fetch = $query->fetch_array()){ ?>
                    <tr>
                        <td><?php echo $fetch['customer_name']?></td>
                        <td><?php echo $fetch['book_name']?></td>
                        <td><?php echo $fetch['book_price']?></td>
                        <td><?php echo $fetch['status']?></td>
                        <td><?php echo $fetch['customer_address']?></td>
                        <td><?php echo $fetch['customer_contact']?></td>
                        <td><?php echo $fetch['date_borrow']?></td>
                        <td><?php echo $fetch['date_return']?></td>
                        <td>
                            <a href="delete_reservation_commit.php?customer_id=<?php echo $fetch['customer_id']?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                          }
                          ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
