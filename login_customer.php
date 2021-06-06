<?php
include "database_connect.php";

if (isset($_POST['btn_login'])) {
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    ($query = $conn->query("SELECT * FROM `customer` WHERE `customer_username` = '$login_username' && `customer_password` = '$login_password'")) or die(mysqli_error());
    $fetch = $query->fetch_array();
    $row = $query->num_rows;

    if ($row > 0) {
        session_start();
        $_SESSION['customer_id'] = $fetch['customer_id'];
        header('location:customer_homepage.php');
    } else {
        echo '<script type="text/javascript"> alert("Error"); location="login_customer.php"; </script>';
    }
}

if (isset($_POST['btn_register'])) {
    $register_name = $_POST['register_name'];
    $register_username = $_POST['register_username'];
    $register_password = $_POST['register_password'];

    $sql = "INSERT INTO customer (customer_name, customer_username, customer_password)
            VALUES ('$register_name', '$register_username', '$register_password')";

    if ($conn->query($sql) === true) {
        echo '<script type="text/javascript"> alert("Register successfully, try login"); location="login_customer.php"; </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
        <div class="div_login_customer">
            <h1>login</h1>

            <form method="post" id="login_customer">
                <input type="text" name="login_username" placeholder="Username" required />
                <input type="password" name="login_password" placeholder="Password" required />

                <button type="submit" name="btn_login" form="login_customer" value="Submit">Login</button>
                <a href="index.php">Homepage</a>
            </form>

        </div>

        <div class="div_register_customer">
            <h1>Register</h1>

            <form method="post" id="register_customer">
                <input type="text" name="register_name" placeholder="Name" required />
                <input type="text" name="register_username" placeholder="Username" required />
                <input type="password" name="register_password" placeholder="Password" required />

                <button type="submit" name="btn_register" form="register_customer" value="Submit">Register</button>
            </form>
            
        </div>
    </body>
</html>
