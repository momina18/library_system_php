<?php
// Include your database connection file
include('include/dbcon.php');

if(isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Delete category from the database
    $sql = "DELETE FROM category WHERE category_id = '$category_id'";
    if (mysqli_query($con, $sql)) {
        // Category deleted successfully
        header("Location: category.php");
        exit();
    } else {
        // Error deleting category
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>
