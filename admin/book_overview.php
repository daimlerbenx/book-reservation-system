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
            <h2>Welcome, <?php echo $fetch['admin_name']; ?> </h2>
        </div>

        <div class="div_book_list">
            <h2>Book list</h2>
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $query = $conn->query("SELECT * FROM `book`") or die(mysqli_error()); while($fetch = $query->fetch_array()){ 
                     ?>
                    <tr>
                        <td><img src="photo/<?php echo $fetch['book_photo']?>" /></td>
                        <td><?php echo $fetch['book_name']; ?></td>
                        <td><?php echo $fetch['book_author']; ?></td>
                        <td><?php echo $fetch['book_price']; ?></td>
                        <td><?php echo $fetch['book_category']; ?></td>
                        <td><?php echo $fetch['book_status']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>


