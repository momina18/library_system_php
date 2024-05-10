<?php
// Include your database connection file
include('include/dbcon.php');

if(isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    // Insert category into database
    $sql = "INSERT INTO category (category_name) VALUES ('$category_name')";
    if (mysqli_query($con, $sql)) {
        // Category added successfully
        header("Location: category.php");
        exit();
    } else {
        // Error adding category
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>
