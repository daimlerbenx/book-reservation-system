<?php
include "../database_connect.php";
require_once 'admin_auth.php';
require 'admin_value.php';

if (isset($_POST['btn_accept_reservation'])) {
    $status = "accept";
    mysqli_query($conn, "UPDATE `reservation` SET `status` = '$status' WHERE `reservation_id` = '$_REQUEST[reservation_id]'") or die(mysqli_error());

    echo '<script type="text/javascript"> alert("Successfully accepted"); location="admin_homepage.php"; </script>';
}

if (isset($_POST['btn_reject_reservation'])) {
    $status = "reject";
    mysqli_query($conn, "UPDATE `reservation` SET `status` = '$status' WHERE `reservation_id` = '$_REQUEST[reservation_id]'") or die(mysqli_error());
    echo '<script type="text/javascript"> alert("Successfully rejected"); location="admin_homepage.php"; </script>';
}

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
        $query = $conn->query("SELECT * FROM `reservation` WHERE `reservation_id` = '$_REQUEST[reservation_id];'") or die(mysqli_error()); $fetch = $query->fetch_array(); 
        ?>

        <div class="div_accept_reservation">
            <h2>Commit reservation</h2>
            <p>Accept or Reject?</p>

            <form method="post" id="commit_reservation">
                <input type="text" name="status" hidden />
                <input type="text" name="book_name" hidden value="<?php echo $fetch['book_name']; ?>" />
                <input type="text" name="customer_name" hidden value="<?php echo $fetch['customer_name']; ?>" />
                <input type="number" name="book_price" hidden value="<?php echo $fetch['book_price']; ?>" />

                <button type="submit" name="btn_accept_reservation" form="commit_reservation" value="Submit">Accept</button>
                <button type="submit" name="btn_reject_reservation" form="commit_reservation" value="Submit">Reject</button>

                <a href="admin_homepage.php">Cancel</a>
            </form>
        </div>
    </body>
</html>
