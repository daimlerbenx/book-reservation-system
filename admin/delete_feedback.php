<?php
include "../database_connect.php";

$sql = "DELETE FROM `feedback` WHERE `feedback_id` = '$_REQUEST[feedback_id]'";

if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript"> alert("feedback deleted successfully"); location="feedback.php"; </script>';
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>