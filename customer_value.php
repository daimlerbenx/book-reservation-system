<?php
include "database_connect.php";

	$query = $conn->query("SELECT * FROM `customer` WHERE `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
	$customer_name = $fetch['customer_name'];
	$customer_username = $fetch['customer_username'];
	$customer_password = $fetch['customer_password'];
?>