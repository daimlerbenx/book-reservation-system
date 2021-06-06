<?php
include "../database_connect.php";
require_once 'admin_auth.php';
require 'admin_value.php';

if (isset($_POST['btn_add_book'])) {
    $book_name = $_POST['book_name'];
    $book_status = $_POST['book_status'];
    $book_author = $_POST['book_author'];
    $book_price = $_POST['book_price'];
    $book_category = $_POST['book_category'];

    $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $book_photo = addslashes($_FILES['photo']['name']);
    $photo_size = getimagesize($_FILES['photo']['tmp_name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], "photo/" . $_FILES['photo']['name']);

    $conn->query("INSERT INTO `book` (book_name, book_status, book_author, book_price, book_category, book_photo) VALUES('$book_name', '$book_status', '$book_author', '$book_price', '$book_category', '$book_photo')") or die(mysqli_error());
    echo '<script type="text/javascript"> alert("Book created successfully"); location="add_book.php"; </script>';
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

        <div class="div_add_book">
            <form method="post" enctype="multipart/form-data" id="add_book">
                <input type="text" name="book_status" value="available" hidden />

                <label>Book name</label>
                <input type="text" name="book_name" required />

                <label>Author</label>
                <input type="text" name="book_author" required />

                <label>Price</label>
                <input type="number" name="book_price" required />

                <label>Category</label>
                <select name="book_category" required>
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

                <label>Picture upload</label>
                <input type="file" name="photo" required />

                <button type="submit" name="btn_add_book" form="add_book" value="Submit">Confirm add</button>
                <button type="Reset">Reset</button>
            </form>
        </div>
    </body>
</html>