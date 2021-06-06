<?php
include "database_connect.php";

if (isset($_POST['btn_login'])) {
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    ($query = $conn->query("SELECT * FROM `admin` WHERE `admin_username` = '$login_username' && `admin_password` = '$login_password'")) or die(mysqli_error());
    $fetch = $query->fetch_array();
    $row = $query->num_rows;

    if ($row > 0) {
        session_start();
        $_SESSION['admin_id'] = $fetch['admin_id'];
        header('location:admin/admin_homepage.php');
    } else {
        echo '<script type="text/javascript"> alert("Error"); location="login_admin.php"; </script>';
    }
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
        <div class="div_login_admin">
            <h1>login</h1>

            <form method="post" id="login_admin">
                <input type="text" name="login_username" placeholder="Username" required />
                <input type="password" name="login_password" placeholder="Password" required />

                <button type="submit" name="btn_login" form="login_admin" value="Submit">Login</button>
                <a href="index.php">Homepage</a>
            </form>
        </div>
    </body>
</html>
