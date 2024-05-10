
<?php
include('include/dbcon.php');

$query = mysqli_query($con, "SELECT * FROM `barcode` ORDER BY mid_barcode DESC ") or die(mysqli_error());
$fetch = mysqli_fetch_array($query);
$mid_barcode = $fetch['mid_barcode'];

$new_barcode = $mid_barcode + 1;
$pre_barcode = "VNHS";
$suf_barcode = "LMS";
$generate_barcode = $pre_barcode . $new_barcode . $suf_barcode;

if (isset($_POST['submit'])) {
    $book_title = $_POST['book_title'];
    $category_id = $_POST['category_id'];
    $author = $_POST['author'];

    if (!isset($_FILES['image']['tmp_name'])) {
        echo "";
    } else {
        $file = $_FILES['image']['tmp_name'];
        $image = $_FILES["image"]["name"];
        $image_name = addslashes($_FILES['image']['name']);
        $size = $_FILES["image"]["size"];
        $error = $_FILES["image"]["error"];

        if ($size > 10000000) {
            die("Format is not allowed or file size is too big!");
        } else {
            move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
            $book_image = $_FILES["image"]["name"];

            mysqli_query($con, "INSERT INTO book (book_title, category_id, author, book_image, date_added, remarks)
                                VALUES ('$book_title', '$category_id', '$author', '$book_image', NOW(), 'Available')") or die(mysqli_error());

            mysqli_query($con, "INSERT INTO barcode (pre_barcode, mid_barcode, suf_barcode) VALUES ('$pre_barcode', '$new_barcode', '$suf_barcode') ") or die(mysqli_error($con));

          // Add success message here
          echo '<div class="alert alert-success" role="alert">Book details added successfully!</div>';

          // Modify this line to include the book title as a query parameter
          header("refresh:2;url=detailbooks.php?code=" . $generate_barcode . "&title=" . urlencode($book_title));
      }
  }
}
?>

<?php include ('header.php'); ?>

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
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <!-- If needed 
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
						-->
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

                            <form method="POST" action="" enctype="multipart/form-data" class="form-horizontal form-label-left" >
							<input type="hidden" name="new_barcode" value="<?php echo $new_barcode; ?>">
							
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Title <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="book_title" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
    <label class="control-label col-md-4" for="category">Category <span class="required" style="color:red;">*</span></label>
    <div class="col-md-4">
        <select name="category_id" id="category" class="form-control" required>
            <option value="">Select Category</option>
            <option value="TextBook">TextBook</option>
            <option value="Arts & Photography">Arts & Photography</option>
            <option value="Biographies">Biographies</option>
            <option value="Children's Books">Children's Books</option>
            <option value="History">History</option>
            <option value="Law">Law</option>
            <option value="Reference">Reference</option>
            <option value="Fiction">Fiction</option>
            <option value="Nonfiction">Nonfiction</option>


            <?php foreach ($categories as $category_id => $category) { ?>
                <option value="<?php echo $category_id; ?>"><?php echo $category['category_name']; ?></option>
            <?php } ?>
            <!-- <?php
            // $result = mysqli_query($con, "SELECT * FROM `category`") or die(mysqli_error());
            // while ($row = mysqli_fetch_array($result)) {
            //     echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
            // }
            ?> -->
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-4" for="category">Sub Category <span class="required" style="color:red;">*</span></label>
    <div class="col-md-4">
        <select name="category_id" id="category" class="form-control" required>
            <option value="">Textbook1</option>
            <option value="TextBook">Textbook2</option>
            <option value="Arts & Photography">Textbook3</option>
            <option value="Biographies">Textbook4</option>
            <option value="Children's Books">Textbook5</option>
            <option value="Arts & Photography">Arts & Photography 1</option>
            <option value="Arts & Photography">Arts & Photography 2</option>
            <option value="Arts & Photography">Arts & Photography 3</option>
            <option value="Arts & Photography">Arts & Photography 4</option>
            <option value="Arts & Photography">Arts & Photography 5</option>
            <option value="Biographies">Biographies 1</option>
            <option value="Biographies">Biographies 2</option>
            <option value="Biographies">Biographies 3</option>
            <option value="Biographies">Biographies 4</option>
            <option value="Biographies">Biographies 5</option>







            <option value="History">History</option>
            <option value="Law">Law</option>
            <option value="Reference">Reference</option>
            <option value="Fiction">Fiction</option>
            <option value="Nonfiction">Nonfiction</option>

            <!-- <?php
            // $result = mysqli_query($con, "SELECT * FROM `category`") or die(mysqli_error());
            // while ($row = mysqli_fetch_array($result)) {
            //     echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
            // }
            ?> -->




<?php foreach ($categories as $category_id => $category) { ?>
                <?php foreach ($category['subcategories'] as $subcategory) { ?>
                    <option value="<?php echo $subcategory['subcategory_id']; ?>"><?php echo $subcategory['subcategory_name']; ?></option>
                <?php } ?>
            <?php } ?>
        </select>
    </div>
</div>
                    



<!-- <div class="form-group">
    <label class="control-label col-md-4" for="category">Category <span class="required" style="color:red;">*</span></label>
    <div class="col-md-4">
        <select name="category_id" id="category" class="form-control" required>
            <option value="">Select Category</option>
            <optgroup label="Main Categories">
                <option value="TextBook">TextBook</option>
                <option value="Arts & Photography">Arts & Photography</option>
               Add other main categories here
            </optgroup>
            <optgroup label="Subcategories">
                <option value="Subcategory1">Subcategory 1</option>
                <option value="Subcategory2">Subcategory 2</option>
              Add other subcategories here 
            </optgroup>
        </select>
    </div>
</div> -->




<!-- HTML form with category and subcategory dropdowns -->
<!-- <div class="form-group">
    <label class="control-label col-md-4" for="category">Category <span class="required" style="color:red;">*</span></label>
    <div class="col-md-4">
        <select name="category_id" id="category" class="form-control" required>
            <option value="">english</option>
            <option value="">hindi</option>
            <option value="">science</option>
            <option value="">maths</option>

            Main categories will be populated dynamically 
        </select>
    </div>
</div> -->

<!-- <div class="form-group">
    <label class="control-label col-md-4" for="subcategory">Subcategory <span class="required" style="color:red;">*</span></label>
    <div class="col-md-4">
        <select name="subcategory_id" id="subcategory" class="form-control" required>
            <option value="">english1</option>
            <option value="">english2</option>
            <option value="">Select Subcategory</option>
            <option value="">Select Subcategory</option>

            Subcategories will be populated dynamically 
        </select>
    </div>
</div> -->




                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Category <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="category_id" class="select2_single form-control" tabindex="-1" required="required">
									
                                        </select>
                                    </div>
                                </div> -->



                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Sub Category <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="category_id" class="select2_single form-control" tabindex="-1" required="required">
										
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 2
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_2" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 3
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_3" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 4
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_4" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 5
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_5" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Price
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="book_pub" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Publisher
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="publisher_name" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">ISBN <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="isbn" id="last-name2" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Copyright
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="copyright_year" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Copies <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-1">
                                        <input type="number" name="book_copies" step="1" min="0" max="1000" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Status <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="status" class="select2_single form-control" tabindex="-1" required="required">
											<option value="New">New</option>
											<option value="Old">Old</option>
											<option value="Lost">Lost</option>
											<option value="Damaged">Damaged</option>
											<option value="Replacement">Replacement</option>
											<option value="Hardbound">Hardbound</option>
                                        </select>
                                    </div>
                                </div> -->
                             
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Book Image
                                    </label>
                                    <div class="col-md-4">
                                        <!-- <input type="file" style="height:44px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12"> -->

                                        <input type="file" style="height:44px;" name="image" id="image" class="form-control col-md-7 col-xs-12" onchange="previewImage()">
        <img id="preview" src="#" alt="Book Image Preview" style="display: none; max-width: 100px; margin-top: 10px;">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="book.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
							
            <?php

			include ('include/dbcon.php');
			if (!isset($_FILES['image']['tmp_name'])) {
			echo "";
			}else{
			$file=$_FILES['image']['tmp_name'];
			$image = $_FILES["image"] ["name"];
			$image_name= addslashes($_FILES['image']['name']);
			$size = $_FILES["image"] ["size"];
			$error = $_FILES["image"] ["error"];
			{
						if($size > 10000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
						
					else
						{

					move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
					$book_image=$_FILES["image"]["name"];
					
					$book_title=$_POST['book_title'];

					$category_id=$_POST['category_id'];
					$author=$_POST['author'];
					// $author_2=$_POST['author_2'];
					// $author_3=$_POST['author_3'];
					// $author_4=$_POST['author_4'];
					// $author_5=$_POST['author_5'];
					// $book_copies=$_POST['book_copies'];
					// $book_pub=$_POST['book_pub'];
					// $publisher_name=$_POST['publisher_name'];
					// $isbn=$_POST['isbn'];
					// $copyright_year=$_POST['copyright_year'];
					// $status=$_POST['status'];
					
					
					$pre = "VNHS";
					$mid = $_POST['new_barcode'];
					$suf = "LMS";
					$gen = $pre.$mid.$suf;
					
					if ($status == 'Lost') {
						$remark = 'Not Available';
					} elseif ($status == 'Damaged') {
						$remark = 'Not Available';
					} else {
						$remark = 'Available';
					}
					
					{



			mysqli_query($con,"insert into book (book_title,category_id,author,book_copies,book_pub,publisher_name,isbn,copyright_year,status,book_barcode,book_image,date_added,remarks)

            
					
            values('$book_title','$category_id','$author',''$book_image',NOW(),'$remark')")or die(mysqli_error());
			
            
            echo $book_title;
            
					mysqli_query($con,"insert into barcode (pre_barcode,mid_barcode,suf_barcode) values ('$pre', '$mid', '$suf') ") or die (mysqli_error($con));
					}
					header("location: view_barcode.php?code=".$gen);

                    
					}
                }
            }
            ?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>



        <script>
    function previewImage() {
        var preview = document.getElementById('preview');
        var fileInput = document.getElementById('image');

        // Display the selected image preview if a file is selected
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>

<?php include ('footer.php'); ?>

