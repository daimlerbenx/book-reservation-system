<?php 
include "../database_connect.php";

	session_start();
	if(!ISSET($_SESSION['admin_id'])){
		header("location:login_admin.php");
	}