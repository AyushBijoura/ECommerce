<!doctype>

<html>
	<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
	
	
	<body>
	
	<div class="main_wrapper">
	
	<div id="header"></div>
	<div id="right">
	<p id="h"><b>Manage Content<b></p>
	<a href="index.php">Home</a>
	<a href="insert_product.php">Insert New Product</a>
	<a href="view_products.php">View Products</a>
	<a href="insert_cat.php">Insert New Categories</a>
	<a href="view_cats.php">View All Categories</a>
	<a href="insert_brand.php">Insert New Brands</a>
	<a href="view_brands.php">View All Brands</a>
	<a href="view_customers.php">View Customers</a>
	<a href="view_orders.php">View Orders</a>
	<a href="view_payments.php">View Payments</a>
	<a href="view_feedback.php">View Feedback</a>
	<a href="logout.php">Admin Logout</a>
	
	
	</div>

<table width="795" align="center" bgcolor="pink">

<tr align="center">
<td colspan="6"><h2><font style="font-weight:bold;">View All Categories Here</font></h2></td>
</tr>

<tr align="center" colspan="6" bgcolor="skyblue">
	<th><font style="font-weight:bold;">Category ID</font></th>
	<th><font style="font-weight:bold;">Category Title</font></th>
	<th><font style="font-weight:bold;">Edit</font></th>
	<th><font style="font-weight:bold;">Delete</font></th>
	</tr>

<tr>
<?php
include("includes/db.php");

$get_cat = "select * from categories";

$run_cat = mysqli_query($con,$get_cat);

$i = 0;

while($row_cat = mysqli_fetch_array($run_cat))
{
	$cat_id = $row_cat['cat_id'];
	$cat_title = $row_cat['cat_title'];
	
	$i++;
	

?>
<tr align="center">
	<td><?php echo $i;?></td>
	<td><?php echo $cat_title;?></td>
	<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
	<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
</tr>

<?php } ?>




</table>