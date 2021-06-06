<?php
include "database_connect.php";
require_once 'customer_auth.php';
require 'customer_value.php';

if (isset($_POST['btn_book_search'])) {
    $search_value = $_POST['book_search'];

    $query = "SELECT * FROM `book` WHERE book_status = 'available' AND CONCAT(`book_name`, `book_author`, `book_category`) LIKE '%" . $search_value . "%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM `book`";
    $search_result = filterTable($query);
}

function filterTable($query) {
    $conn = new mysqli("localhost", "root", "", "book_reservation_system");
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
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
                <li><a href="logout_customer.php">Logout</a></li>
            </ul>
            <h2>Welcome, <?php echo $fetch['customer_name']; ?></h2>
        </div>

        <div class="div_search_result">
            <h1>Search result</h1>
            <table>
                <tr>
                    <th>Book Name</th>
                    <th>Book Author</th>
                    <th>Book Category</th>
                    <th>Book Price</th>
                </tr>

                <?php
                                 while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['book_name']; ?></td>
                    <td><?php echo $row['book_author']; ?></td>
                    <td><?php echo $row['book_category']; ?></td>
                    <td><?php echo $row['book_price']; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </body>
</html>