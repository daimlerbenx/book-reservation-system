<?php
include "../database_connect.php";

$sql = "DELETE FROM `book` WHERE `book_id` = '$_REQUEST[book_id]'";

if ($conn->query($sql) === true) {
    echo '<script type="text/javascript"> alert("Book deleted successfully"); location="delete_book.php"; </script>';
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>