<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Your custom CSS file -->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Category Management</h3>
                    </div>
                    <div class="panel-body">
                        <!-- Form to add new category -->
                        <form method="post" action="add_category.php" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="category_name" class="form-control" placeholder="Enter category name" required>
                            </div>
                            <button type="submit" name="add_category" class="btn btn-primary"><i class="fa fa-plus"></i> Add Category</button>
                        </form>
                        <hr>
                        <!-- Display existing categories -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP code to fetch and display categories -->
                                <?php include('fetch_categories.php'); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
