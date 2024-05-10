<?php
// Include your database connection file here


if(isset($_GET['title'])) {
    // Connect to your database
    include('include/dbcon.php');; // Adjust the filename as per your actual file
    
    // Sanitize the title to prevent SQL injection
    $title = mysqli_real_escape_string($con, $_GET['title']);
    
    // Query to fetch book details based on title
    $query = "SELECT * FROM book WHERE book_title = '$title'";
    
    // Execute the query
    $result = mysqli_query($con, $query);
    
    // Check if query executed successfully
    if($result) {
        // Check if any rows are returned
        if(mysqli_num_rows($result) > 0) {
            // Fetch and display book details
            $row = mysqli_fetch_assoc($result);
            echo "<p>Title: " . $row['book_title'] . "</p>";
            echo "<p>ISBN: " . $row['isbn'] . "</p>";
            echo "<p>Author: " . $row['author'] . "</p>";
            // Add more details as needed
        } else {
            // No matching book found
            echo "No book details found for the given title.";
        }
    } else {
        // Error executing query
        echo "Error: " . mysqli_error($con);
    }
} else {
    // Title parameter not set
    echo "Title parameter is missing.";
}
?>