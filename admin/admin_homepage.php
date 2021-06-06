<?php
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

        <?php
        $query = "SELECT SUM(book_price) AS 'revanue' FROM reservation  WHERE `status` = 'accept'";
        $res = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($res);
        ?>

        <h2>Overall revanue RM<?php echo $data['revanue']?></h2>

        <div class="div_pending_customer">
            <h2>Pending customer</h2>

            <table>
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Book name</th>
                        <th>Date borrowed</th>
                        <th>Date return</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include "../database_connect.php"; 
                    $query = $conn->query("SELECT * FROM `reservation` WHERE status = 'pending' ") or die(mysqli_error()); while($fetch = $query->fetch_array()) { 
                    ?>

                    <tr>
                        <td><?php echo $fetch['customer_name']; ?></td>
                        <td><?php echo $fetch['book_name']; ?></td>
                        <td><?php echo $fetch['date_borrow']; ?></td>
                        <td><?php echo $fetch['date_return']; ?></td>
                        <td>
                            <a href="reservation_commit.php?reservation_id=<?php echo $fetch['reservation_id']; ?>">Commit</a>
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
