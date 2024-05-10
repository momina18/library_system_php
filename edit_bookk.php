<?php
include('header.php');

// Connect to MySQL database (replace dbname, username, password with your actual credentials)
$con = new mysqli("localhost", "root", "", "lms");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Retrieve book ID from the query string
if(isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];

    // Fetch book details based on the provided book ID
    $sql_select_book = "SELECT * FROM books WHERE book_id = $book_id";
    $result = $con->query($sql_select_book);

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
        // Display edit form with book details populated
        // Form submission handling should be added here
    } else {
        echo "Book not found.";
    }
} else {
    echo "Invalid request.";
}

// Close MySQL connection
$con->close();

include('footer.php');
?>
