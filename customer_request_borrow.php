<?php
include "database_connect.php";
require_once 'customer_auth.php';
require 'customer_value.php';

if (isset($_POST['btn_request_borrow'])) {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $status = "pending";
    $book_price = $_POST['book_price'];
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_contact = $_POST['customer_contact'];
    $date_borrow = $_POST['date_borrow'];
    $date_return = $_POST['date_return'];
    $sql = "INSERT INTO reservation (book_id, book_name, status, book_price, customer_id, customer_name, customer_address, customer_contact, date_borrow, date_return)
            VALUES ('$book_id', '$book_name', '$status', '$book_price', '$customer_id', '$customer_name', '$customer_address', '$customer_contact', '$date_borrow', '$date_return')";

    if ($conn->query($sql) === true) {
        echo '<script type="text/javascript"> alert("Request success"); location="customer_dashboard.php"; </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
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
                <a href="logout_customer.php">Logout</a>
            </ul>
            <h2>Welcome, <?php echo $fetch['customer_name']; ?></h2>
        </div>

        <div class="div_display_selected_book">
            <?php 
          require_once 'database_connect.php';
          $query = $conn->query("SELECT * FROM `book` WHERE `book_id` = '$_REQUEST[book_id]'") or die(mysql_error()); $fetch = $query->fetch_array(); ?>

            <h2><?php echo $fetch['book_name'];?></h2>
            <h2>
                RM
                <?php echo $fetch['book_price'];?>
            </h2>
            <img src="admin/photo/<?php echo $fetch['book_photo']?>" />
        </div>

        <div class="form_request_borrow">
            <form method="post" id="request_borrow">
                <input type="number" name="book_id" hidden value="<?php echo $fetch['book_id'];?>" />
                <input type="text" name="book_name" hidden value="<?php echo $fetch['book_name']?>" />
                <input type="number" name="book_price" hidden value="<?php echo $fetch['book_price'];?>" />

                <?php
                require 'customer_value.php'; ?>
                <input type="number" name="customer_id" hidden="" value="<?php echo $fetch['customer_id']?>" />

                <label>Name</label>
                <input type="text" name="customer_name" value="<?php echo $fetch['customer_name']?>" readonly />

                <label>Address to be deliver</label>
                <input type="text" name="customer_address" required />

                <label>Contact Number</label>
                <input type="text" name="customer_contact" required />

                <label>Start borrow</label>
                <input data-date-format="dd mmmm yyyy" type="date" name="date_borrow" required />

                <label>Wish to return</label>
                <input type="date" name="date_return" required />

                <button type="submit" name="btn_request_borrow" form="request_borrow" value="Submit">Request Borrow</button>
            </form>
        </div>
    </body>
</html>

