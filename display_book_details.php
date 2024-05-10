<?php include ('header.php'); ?>

<div class="page-title">
    <div class="title_left">
        <h3>
            <small>Home / Books /</small> Display Book Details
        </h3>
    </div>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-book"></i> Book Details</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!-- Display book details here -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <!-- <th>Book ID</th> -->
                            <th>Book Name</th>
                            <th>Edition</th>
                            <th>Status</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Include the database connection file
                        include('include/dbcon.php');

                        // Fetch book details from the database
                        $query = "SELECT * FROM bookdetails";
                        $result = mysqli_query($con, $query);

                        // Loop through each row in the result set
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            // echo "<td>{$row['book_id']}</td>";
                            echo "<td>{$row['book_name']}</td>";
                            echo "<td>{$row['edition']}</td>";
                            echo "<td>{$row['status']}</td>";
                            echo "<td>{$row['notes']}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include ('footer.php'); ?>
