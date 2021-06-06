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

        <div class="div_view_feedback">
            <h2>Customer View Message</h2>
            <?php
            $query = $conn->query("SELECT * FROM `feedback` WHERE `feedback_id` = '$_REQUEST[feedback_id]'") or die(mysqli_error()); $fetch = $query->fetch_array(); ?>

            <form>
                <label>Name</label>
                <input type="text" disabled value="<?php echo $fetch['customer_name']; ?>" />

                <label>Email address</label>
                <input type="email" disabled value="<?php echo $fetch['customer_email']; ?>" />

                <label>Message</label>
                <textarea rows="4" disabled><?php echo $fetch['feedback_message']; ?></textarea>

                <a href="feedback.php">Back</a>
            </form>
            
        </div>
    </body>
</html>
