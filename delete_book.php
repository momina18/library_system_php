<?php
// Include your database connection file
include('include/dbcon.php');

// Check if the book ID is provided
if(isset($_GET['book_id'])) {
    // Sanitize the input to prevent SQL injection
    $book_id = mysqli_real_escape_string($con, $_GET['book_id']);

    // Delete the book from the database
    $delete_query = "DELETE FROM book WHERE book_id = '$book_id'";

    if(mysqli_query($con, $delete_query)) {
        // Book deleted successfully
        echo "Book deleted successfully.";
        // Redirect to a page displaying book list or any other appropriate page
        header("Location: book.php");
        exit(); // Stop further execution
    } else {
        // Error occurred while deleting the book
        echo "Error: " . mysqli_error($con);
    }
} else {
    // No book ID provided, handle the error accordingly
    echo "Book ID not provided.";
}
?>
