<?php
include "../database_connect.php";

$sql = "DELETE FROM `reservation` WHERE `customer_id` = '$_REQUEST[customer_id]'";

if ($conn->query($sql) === true) {
    echo '<script type="text/javascript"> alert("Reservation deleted successfully"); location="customer_list.php"; </script>';
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>