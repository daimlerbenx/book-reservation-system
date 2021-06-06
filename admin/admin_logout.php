<?php
include "../database_connect.php";

	session_start();
	session_unset(admin_id);
	header("location:../login_admin.php");
?>