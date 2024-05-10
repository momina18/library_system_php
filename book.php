<?php include ('header.php'); ?>

<div class="page-title">
    <div class="title_left">
        <h3>
            <small>Home /</small> Books
        </h3>
    </div>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- Buttons for printing -->
            <a href="book_print.php" target="_blank" style="background:none;">
                <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Books List</button>
            </a>
            <a href="print_barcode1.php" target="_blank" style="background:none;">
                <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Books Barcode</button>
            </a>
            <br /><br />
            <div class="x_title">
                <!-- Title and navigation links -->
                <h2><i class="fa fa-book"></i> Book List</h2>
                <!-- Add Book button -->
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a href="add_book.php" style="background:none;">
                            <button class="btn btn-primary"><i class="fa fa-plus"></i> Add Book</button>
                        </a>
                    </li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
                <!-- Navigation links -->
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="book.php">All</a></li>
                    <li role="presentation"><a href="new_books.php">New Books</a></li>
                    <li role="presentation"><a href="old_books.php">Old Books</a></li>
                    <li role="presentation"><a href="lost_books.php">Lost Books</a></li>
                    <li role="presentation"><a href="damage_books.php">Damaged Books</a></li>
                    <li role="presentation"><a href="sub_rep.php">Subject for Replacement Books</a></li>
                    <li role="presentation"><a href="hard_bound.php">Hardbound Books</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!-- content starts here -->

                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th style="width:100px;">Book Image</th>
                                <th>Title</th>
                                <th>Barcode</th>
                                <th>ISBN</th>
                                <th>Author/s</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Copies</th> <!-- New column for displaying copies -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            // Fetch all books from the database
                            $result = mysqli_query($con,"SELECT * FROM book ORDER BY book_id DESC") or die (mysqli_error());

                            // Iterate through each book
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php if(!empty($row['book_image'])): ?>
                                            <img src="upload/<?php echo $row['book_image']; ?>" class="img-thumbnail" width="75px" height="50px">
                                        <?php else: ?>
                                            <img src="images/book_image.jpg" class="img-thumbnail" width="75px" height="50px">
                                        <?php endif; ?>
                                    </td>
                                    <td class="book-title">
                                        <!-- Display title and set data attribute with book details -->
                                        <a href="#" class="title-link" data-book='<?php echo json_encode($row); ?>'><?php echo $row['book_title']; ?></a>
                                    </td>
                                    <td>
                                        <a target="_blank" href="print_barcode_individual1.php?code=<?php echo $row['book_barcode']; ?>"><?php echo $row['book_barcode']; ?></a>
                                    </td>
                                    <td><?php echo $row['isbn']; ?></td>
                                    <td><?php echo $row['author']; ?></td>
                                    <td><?php echo $row['category_id']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['remarks']; ?></td>
                                    <td>1</td> <!-- Since we are not grouping, there's only one copy of each book -->
                                    <td>
                                        <!-- Buttons for view, edit, and delete -->
                                        <a class="btn btn-primary" href="view_book.php<?php echo '?book_id='.$row['book_id']; ?>"><i class="fa fa-search"></i></a>
                                        <a class="btn btn-warning" href="edit_book.php<?php echo '?book_id='.$row['book_id']; ?>"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['book_id']; ?>"><i class="glyphicon glyphicon-trash icon-white"></i></button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-title="<?php echo $row['book_title']; ?>">View</button>
                                        <!-- Delete modal -->
                                        <div class="modal fade" id="delete<?php echo $row['book_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Delete Book</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert alert-danger">
                                                            Are you sure you want to delete this book?
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <a href="delete_book.php<?php echo '?book_id='.$row['book_id']; ?>" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Content to be loaded dynamically -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    $(document).ready(function () {
        $('button[data-target="#exampleModal"]').click(function () {
            var title = $(this).data('title');
            $('#exampleModal').find('.modal-body').load('fetch_book_details.php?title=' + title);
        });
    });
</script>
