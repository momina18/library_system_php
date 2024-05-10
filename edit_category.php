<?php
// Include your database connection file
include('include/dbcon.php');

if(isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Fetch category details from the database
    $sql = "SELECT * FROM category WHERE category_id = '$category_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST['edit_category'])) {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    // Update category in the database
    $sql = "UPDATE category SET category_name = '$category_name' WHERE category_id = '$category_id'";
    if (mysqli_query($con, $sql)) {
        // Category updated successfully
        header("Location: category.php");
        exit();
    } else {
        // Error updating category
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>
