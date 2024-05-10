<?php
// Include your database connection file
include('include/dbcon.php');

// Check if the report_id is set in the URL
if(isset($_GET['id'])) {
    $report_id = $_GET['id'];

    // Delete the report from the database based on the report_id
    $query = "DELETE FROM report WHERE report_id = $report_id";
    $result = mysqli_query($con, $query);

    if($result) {
        // Redirect back to the report listing page after successful deletion
        header("Location: report.php");
        exit();
    } else {
        echo "Error deleting report: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
