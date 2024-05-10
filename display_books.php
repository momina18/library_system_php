<?php
// Include the header file
include('header.php');
?>

<div class="page-title">
    <div class="title_left">
        <h3>
            <small>Home / Books /</small> Book Details
        </h3>
    </div>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-plus"></i> Book Details</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!-- Content starts here -->
                <form method="post" action="detailbooks_detail.php" class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-4" for="category">Category <span class="required" style="color:red;">*</span></label>
                        <div class="col-md-4">
                            <select name="category_id" id="category" class="form-control" required>
                                <option value="">Select Category</option>
                                <!-- Populate categories dynamically from the database if needed -->
                                <option value="1">TextBook</option>
                                <option value="2">Arts & Photography</option>
                                <!-- Add more categories as needed -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="subcategory">Subcategory <span class="required" style="color:red;">*</span></label>
                        <div class="col-md-4">
                            <select name="subcategory_id" id="subcategory" class="form-control" required>
                                <option value="">Select Subcategory</option>
                                <!-- Populate subcategories dynamically based on the selected category using JavaScript or fetch them from the database if needed -->
                                <option value="1">TextBook 1</option>
                                <option value="2">TextBook 1</option>
                                <!-- Add more subcategories as needed -->
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </div>
                </form>
                <!-- Content ends here -->
            </div>
        </div>
    </div>
</div>

<?php
// Include the footer file
include('footer.php');
?>
