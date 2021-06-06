<?php
include "../database_connect.php";
require_once 'admin_auth.php';
require 'admin_value.php';

if (isset($_POST['btn_update_book'])) {
    $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
    $book_author = mysqli_real_escape_string($conn, $_POST['book_author']);
    $book_price = $_POST['book_price'];
    $book_category = mysqli_real_escape_string($conn, $_POST['book_category']);
    $book_status = mysqli_real_escape_string($conn, $_POST['book_status']);

    mysqli_query(
        $conn,
        "UPDATE `book` SET `book_name` = '$book_name', `book_author` = '$book_author', `book_price` = '$book_price', `book_category` = '$book_category', `book_status` = '$book_status' WHERE `book_id` = '$_REQUEST[book_id]'"
    ) or die(mysqli_error());
    echo '<script type="text/javascript"> alert("Book updated successfully"); location="update_book.php"; </script>';
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

        <div class="div_update_book_commit">
            <h2>Update book</h2>

            <?php
            $query = $conn->query("SELECT * FROM `book` WHERE `book_id` = '$_REQUEST[book_id]'") or die(mysqli_error()); $fetch = $query->fetch_array(); ?>

            <form method="post" id="update_book_commit">
                <label>Name</label>
                <input type="text" name="book_name" value="<?php echo $fetch['book_name']; ?>" />

                <label>Author</label>
                <input type="text" name="book_author" value="<?php echo $fetch['book_author']; ?>" />

                <label>Price</label>
                <input type="number" name="book_price" value="<?php echo $fetch['book_price']; ?>" />

                <label>Category</label>
                <select name="book_category" required>
                    <option value="<?php echo $fetch['book_category']; ?>"><?php echo $fetch['book_category']; ?></option>
                    <option value="Arts and crafts">Arts and crafts</option>
                    <option value="Business and marketing">Business and marketing</option>
                    <option value="Science">Science</option>
                    <option value="Psychology">Psychology</option>
                    <option value="Travel">Travel</option>
                    <option value="Sports">Sports</option>
                    <option value="Comics">Comics</option>
                    <option value="Medical">Medical</option>
                    <option value="History">History</option>
                </select>

                <label>Book Status</label>
                <select name="book_status" required>
                    <?php echo $fetch['book_status']; ?>
                    <option value="available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>

                <button type="submit" name="btn_update_book" form="update_book_commit" value="Submit">Confirm update</button>
            </form>
        </div>
    </body>
</html>
