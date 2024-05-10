<?php
// Include the database connection file
include('include/dbcon.php');

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data and sanitize if necessary
    $book_name = $_POST['book_name'];
    $edition = $_POST['edition'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];

    // Insert the data into the database
    $insert_query = "INSERT INTO bookdetails (book_name, edition, status, notes) VALUES ('$book_name', '$edition', '$status', '$notes')";
    $result = mysqli_query($con, $insert_query);
    if($result) {
        // Data inserted successfully
        // Redirect to display page
        header("Location: display_book_details.php");
        exit();
    } else {
        // Error occurred during insertion
        echo "Error: " . mysqli_error($con);
    }
}
?>

<?php include ('header.php'); ?>

<div class="page-title">
    <div class="title_left">
        <h3>
            <small>Home / Books /</small> Add Book Details
        </h3>
    </div>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-plus"></i> Add Book Details</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!-- content starts here -->
                <form method="post" action="add_book_details.php" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <!-- Add your form fields here -->
                    <div class="form-group">
                        <label class="control-label col-md-4" for="book_name">Book Name</label>
                        <div class="col-md-4">
                            <input type="text" name="book_name" id="book_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="edition">Edition</label>
                        <div class="col-md-4">
                            <input type="text" name="edition" id="edition" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="status">Status</label>
                        <div class="col-md-4">
                            <select name="status" id="status" class="form-control">
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="notes">Notes</label>
                        <div class="col-md-4">
                            <textarea name="notes" id="notes" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                        </div>
                    </div>
                </form>
                <!-- content ends here -->
            </div>
        </div>
    </div>
</div>

<?php include ('footer.php'); ?>
