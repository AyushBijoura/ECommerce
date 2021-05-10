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
<td colspan="5" align="center"><h2>Insert New Brands here</h2></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>Insert New Brand</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="new_brand"required="required" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="add_brand" value="Add Brand"/>
</td>
</tr>
<tr>
<td></td>
</tr>
</table>
</form>
<?php
include("includes/db.php");

if(isset($_POST['add_brand']))
{
$new_brand = $_POST['new_brand'];

$insert_brand = "insert into brands(brand_title) values ('$new_brand')";

$run_brand = mysqli_query($con,$insert_brand);

if($run_brand)
{
	echo "<script>alert('New brand has been added')</script>";
	echo "<script>window.open('index.php?view_brands','_self')</script>";
}
}
?>