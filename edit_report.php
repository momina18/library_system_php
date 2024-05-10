<?php
// Include your database connection file
include('include/dbcon.php');

// Check if the report_id is set in the URL
if(isset($_GET['id'])) {
    $report_id = $_GET['id'];

    // Fetch the report details from the database based on the report_id
    $query = "SELECT * FROM report WHERE report_id = $report_id";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // You can use $row array to display the report details in your edit form
    } else {
        echo "Report not found.";
    }
} else {
    echo "Invalid request.";
}
?>

<!-- HTML form for editing report details -->
<form method="post" action="update_report.php">
    <!-- Display the report details fetched from the database -->
    <!-- For example, you can use input fields with current report details -->

    <!-- Add input fields for editing report details here -->

    <!-- Add a submit button to update the report -->
    <button type="submit" name="update" class="btn btn-primary">Update Report</button>
</form>
