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

    // Construct and execute DELETE SQL query
    $sql_delete_book = "DELETE FROM books WHERE book_id = $book_id";

    if ($con->query($sql_delete_book) === TRUE) {
        // Redirect to a specific page (e.g., back to the book list page)
        header("Location: book.php");
        exit();
    } else {
        echo "Error deleting book: " . $con->error;
    }
} else {
    echo "Invalid request.";
}

// Close MySQL connection
$con->close();

include('footer.php');
?>
