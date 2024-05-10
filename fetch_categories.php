<?php
// Include your database connection file
include('include/dbcon.php');

// Fetch categories from database
$sql = "SELECT * FROM category";
$result = mysqli_query($con, $sql);

// Display categories
while($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?php echo $row['category_id']; ?></td>
    <td><?php echo $row['category_name']; ?></td>
    <td>
        <a href="edit_category.php?id=<?php echo $row['category_id']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
        <a href="delete_category.php?id=<?php echo $row['category_id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
    </td>
</tr>
<?php endwhile;

// Close the database connection
mysqli_close($con);
?>
