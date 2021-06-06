<?php 
include "database_connect.php";

	session_start();
	if(!ISSET($_SESSION['customer_id'])){
		header("location:login_customer.php");
	}