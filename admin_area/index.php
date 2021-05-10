<?php
session_start();
if(!isset($_SESSION['user_email']))
{
	echo"<script>window.open('login.php?not_admin=Invalid login','_self')</script>";
}
else{
?>
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
	<div id="left">
	<?php
	/*if(isset($_GET['insert_product']))
	{
		include("insert_product.php");
	}
	if(isset($_GET['view_products']))
	{
		include("view_products.php");
	}*/
	if(isset($_GET['edit_pro']))
	{
		include("edit_pro.php");
	}
   /*	if(isset($_GET['insert_cats']))
	{
		include("insert_cat.php");
	}
	if(isset($_GET['view_cats']))
	{
		include("view_cats.php");
	}*/
	if(isset($_GET['edit_cat']))
	{
		include("edit_cat.php");
	}
	/*if(isset($_GET['insert_brand']))
	{
		include("insert_brand.php");
	}*/
	/*if(isset($_GET['view_brands']))
	{
		include("view_brands.php");
	}*/
	if(isset($_GET['edit_brand']))
	{
		include("edit_brand.php");
	}
   /*	if(isset($_GET['view_customers']))
	{
		include("view_customers.php");
	}*/
	/*if(isset($_GET['view_orders']))
	{
		include("view_orders.php");
	}*/
	/*if(isset($_GET['view_payments']))
	{
		include("view_payments.php");
	}*/

	?>
	
	
	</div>
	
	</div>
	</body>
	</html>
	<?php } ?>