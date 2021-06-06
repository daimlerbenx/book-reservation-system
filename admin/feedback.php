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
            <h2>Welcome, <?php echo $fetch['admin_name']; ?></h2>
        </div>

        <div class="div_feedback_list">
            <h2>Customer History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $conn->query("SELECT * FROM `feedback`") or die(mysqli_error()); while($fetch = $query->fetch_array()){ ?>
                    <tr>
                        <td><?php echo $fetch['customer_name']?></td>
                        <td><?php echo $fetch['customer_email']?></td>
                        <td><?php echo $fetch['feedback_message']?></td>
                        <td class="text-right">
                            <a href="view_feedback.php?feedback_id=<?php echo $fetch['feedback_id']?>">View</a>
                            <a href="delete_feedback.php?feedback_id=<?php echo $fetch['feedback_id']?>">Delete</a>
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
