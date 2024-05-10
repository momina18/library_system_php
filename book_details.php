
<?php include ('header.php'); ?>

<div class="page-title">
    <div class="title_left">
        <h3>
            <small>Home / Books /</small> Book Details Record
        </h3>
    </div>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-plus"></i> Book Details record</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!-- Display the submitted form data here -->
                <div class="row">
                    <div class="col-md-3">
                        <strong>Book Title:</strong> <?php echo $_POST['book_title']; ?>
                    </div>
                    <div class="col-md-3">
                        <strong>ISBN:</strong> <?php echo $_POST['isbn']; ?>
                    </div>
                    <div class="col-md-3">
                        <strong>Copies:</strong> <?php echo $_POST['book_copies']; ?>
                    </div>
                    <div class="col-md-3">
                        <strong>Status:</strong> <?php echo $_POST['status']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('footer.php'); ?>
