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
                <li><a href="#book_search">Search</a></li>
                <li><a href="#availability">Availability</a></li>
                <li><a href="login_customer.php">Customer</a></li>
                <li><a href="login_admin.php">Admin</a></li>
            </ul>
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

                <form method="post" action="index_search_result.php" id="book_search">
                    <input type="text" name="book_search" placeholder="Search by title/author/category" required>

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
                        <img src="admin/photo/<?php echo $fetch['book_photo']?>" />
                        <h2><?php echo $fetch['book_author']; ?></h2>
                        <h2>
                            RM
                            <?php echo $fetch['book_price']; ?>
                        </h2>
                    </li>
                    <?php
                        }
                        ?>
                </ul>
                <a href="login_customer.php">Borrow now</a>
            </div>
        </section>
    </body>
</html>
