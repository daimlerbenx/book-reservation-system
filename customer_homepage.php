<?php
include "database_connect.php";
require_once 'customer_auth.php';
require 'customer_value.php';

if (isset($_POST['btn_feedback'])) {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $feedback_message = $_POST['feedback_message'];

    $sql = "INSERT INTO feedback (customer_name, customer_email, feedback_message)
            VALUES ('$customer_name', '$customer_email', '$feedback_message')";

    if ($conn->query($sql) === true) {
        echo '<script type="text/javascript"> alert("Submit successfully"); location="customer_homepage.php"; </script>';
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
        <div class="div_header">
            <ul>
                <li><a href="#section_book_search">Search</a></li>
                <li><a href="#section_book_availability">Availability</a></li>
                <li><a href="customer_homepage.php">Home</a></li>
                <li><a href="logout_customer.php">Logout</a></li>
            </ul>
            <h2>Welcome, <?php echo $fetch['customer_name']; ?></h2>
        </div>

        <section id="section_welcome">
            <div class="div_welcome">
                <h1>Welcome to Book Reservation System</h1>
                <p>We organize a set of experiences in creative & intellectual endeavors by collaborating with the best in business. We bring this learning experience to communities throughout Malaysia.</p>
                <p>Rent a book instead of buying it online, because it’s more pocket friendly.</p>
            </div>
        </section>

        <section id="section_book_search">
            <div class="div_book_search">
                <h1>Book search</h1>
                <p>Using field search is the best method to make your search results more accurate and relevant. Books are searched based on availability in our database.</p>

                <form method="post" action="customer_book_search_result.php" id="book_search">
                    <input type="text" name="book_search" placeholder="Search by title/author/category" required />

                    <button type="submit" name="btn_book_search" form="book_search" value="Submit">Search</button>
                </form>
            </div>
        </section>

        <section id="section_book_availability">
            <div class="div_book_availability">
                <h1>Books available</h1>
                <ul>
                    <?php
                           include "database_connect.php";

                           $query = $conn->query("SELECT * FROM `book` WHERE book_status = 'available'") or die(mysql_error()); while($fetch = $query->fetch_array()){ ?>
                    <li>
                        <h2><?php echo $fetch['book_name']; ?></h2>
                        <img src="admin/photo/<?php echo $fetch['book_photo']; ?>" />
                        <h2><?php echo $fetch['book_author']; ?></h2>
                        <h2>RM<?php echo $fetch['book_price']; ?></h2>
                        <a href="customer_request_borrow.php?book_id=<?php echo $fetch['book_id']; ?>" class="mu-order-btn">Borrow now</a>
                    </li>
                    <?php
                        }
                        ?>
                </ul>
            </div>
        </section>

        <section id="section_feedback">
            <div class="div_feedback">
                <h1>Drop us a feedback</h1>
                <p>We appreciate your feedback as it helps us make this site more user-friendly on an ongoing basis. Suggestions, inquiries, comments and even criticism are most welcome</p>

                <?php
                require 'customer_value.php';
                ?>

                <form method="post" id="feedback">
                    <input type="text" name="customer_name" readonly value="<?php echo $fetch['customer_name']; ?>" />
                    <input type="email" name="customer_email" placeholder="Your email" required />
                    <textarea name="feedback_message" placeholder="Yoru message" required></textarea>

                    <button type="submit" name="btn_feedback" form="feedback" value="Submit">Submit</button>
                </form>
            </div>
        </section>
    </body>
</html>
