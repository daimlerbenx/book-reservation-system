# Book Reservation System

**Book Reservation System** is a web system designed to manage book reservations and customer interactions. It allows users to search for books, request to borrow them, and manage their reservations. The system also includes an administrative interface for managing user accounts and book information.

## Technology Stack

- **Front-End:** HTML, JavaScript
- **Back-End:** PHP
- **Database:** SQL (via phpMyAdmin)
- **Development Environment:** Sublime Text 3, XAMPP

## File Structure

- **customer_auth.php**: Handles customer authentication and user login.
- **customer_book_search_result.php**: Displays search results for book queries made by customers.
- **customer_dashboard.php**: Provides a dashboard for customers to view and manage their reservations.
- **customer_homepage.php**: The homepage for customer interactions with the system.
- **customer_insert_contact.php**: Allows customers to insert or update their contact information.
- **customer_request_borrow.php**: Manages customer requests to borrow books.
- **customer_value.php**: Contains logic for handling customer-specific values and actions.
- **database_connect.php**: Manages the connection to the MySQL database.
- **index.php**: The main entry point of the application.
- **index_search_result.php**: Displays search results for book queries on the main page.
- **login_admin.php**: Provides an interface for administrators to log in.
- **login_customer.php**: Provides an interface for customers to log in.
- **logout_customer.php**: Handles customer logout functionality.

## Setup and Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/yourusername/Book-Reservation-System.git
   ```

2. **Set Up the Development Environment:**
   - Install XAMPP to run the local server and MySQL.
   - Start Apache and MySQL services in XAMPP.

3. **Database Configuration:**
   - Create a new database in phpMyAdmin.
   - Import the provided SQL file to set up the database schema.

4. **Configuration:**
   - Update the database connection details in `database_connect.php` to match your local database credentials.

5. **Access the Application:**
   - Place the project files in the `htdocs` directory of your XAMPP installation.
   - Navigate to `http://localhost/Book-Reservation-System` in your web browser to access the application.

## Usage

- **Customers** can browse books, request to borrow them, and manage their reservations.
- **Administrators** can log in to manage users and book information.

## Contributing

Feel free to submit issues and pull requests to improve the system.
