<?php
// Include the header file
include('header.php');

// Include the database connection file
include('include/dbcon.php');

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve the selected category and subcategory IDs from the form
    $category_id = $_POST['category_id'];
    $subcategory_id = $_POST['subcategory_id'];

    // Query to fetch books based on the selected category and subcategory
    $query = "SELECT * FROM books WHERE category_id = '$category_id' AND subcategory_id = '$subcategory_id'";
    $result = mysqli_query($con, $query);

    // Display fetched books
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<h4>Title: " . $row['title'] . "</h4>";
            echo "<p>Edition: " . $row['edition'] . "</p>";
            echo "<p>Status: " . $row['status'] . "</p>";
            // Add more book details as needed
            echo "<hr>";
        }
    } else {
        echo "No books found for the selected category and subcategory.";
    }
}

// Include the footer file
include('footer.php');
?>
