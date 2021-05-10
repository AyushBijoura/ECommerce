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
<form action="" method="post">
	<table align="center" width="795" height="500" border="2" bgcolor="#187eae">
<tr>
<td colspan="5" align="center"><h2>Insert New Categories here</h2></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>Insert New Category</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="new_cat"required="required" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="add_cat" value="Add Category"/></td>
</tr>
<tr>

</tr>
</table>
</form>
<?php
include("includes/db.php");

if(isset($_POST['add_cat']))
{
$new_cat = $_POST['new_cat'];

$insert_cat = "insert into categories(cat_title) values ('$new_cat')";

$run_cat = mysqli_query($con,$insert_cat);

if($run_cat)
{
	echo "<script>alert('New category has been added')</script>";
	echo "<script>window.open('index.php?view_cats','_self')</script>";
}
}
?>